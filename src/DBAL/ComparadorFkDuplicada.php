<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\DBAL\Platforms\MySQL\Comparator;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\TableDiff;

/**
 * Corrige o falso positivo do Comparator quando a tabela tem FK duplicada.
 *
 * O pareamento em `Comparator::compareTables()` compara FKs por definição,
 * ignorando o nome, e dá `unset` no array do loop interno. Quando duas
 * constraints têm a mesma coluna e o mesmo alvo — o `onboarding` tem 12 grupos
 * assim, ex.: `bib_emprestimos_ibfk_2` e `_ibfk_3` em `cd_situacao` — a primeira
 * FK antiga casa com as duas novas e esvazia o array; a segunda antiga fica sem
 * par e é reportada como removida, mesmo existindo nos dois lados.
 *
 * Aqui a remoção é descartada quando o outro lado tem uma FK de mesmo nome
 * **e** definição idêntica. A checagem de definição é o que impede mascarar
 * divergência real: FK de mesmo nome com colunas ou onDelete diferentes segue
 * sendo reportada.
 */
final class ComparadorFkDuplicada extends Comparator
{
    public function compareTables(Table $oldTable, Table $newTable): TableDiff
    {
        $diff = parent::compareTables($oldTable, $newTable);

        $removidas = $diff->getDroppedForeignKeys();
        $novas = $newTable->getForeignKeys();
        $mantidas = [];

        foreach ($removidas as $removida) {
            $falsoPositivo = false;

            foreach ($novas as $nova) {
                if (
                    strtolower($removida->getName()) === strtolower($nova->getName())
                    && $this->diffForeignKey($removida, $nova) === false
                ) {
                    $falsoPositivo = true;
                    break;
                }
            }

            if (!$falsoPositivo) {
                $mantidas[] = $removida;
            }
        }

        // O mesmo pareamento defeituoso também esconde o caso inverso: se o
        // outro lado tem só uma de um par duplicado, a que falta não é
        // reportada. A checagem por nome cobre isso — e é o critério certo
        // aqui, já que a constraint é identificada pelo nome no banco modelo.
        $nomesAntigos = [];
        foreach ($oldTable->getForeignKeys() as $antiga) {
            $nomesAntigos[strtolower($antiga->getName())] = true;
        }

        $adicionadas = $diff->getAddedForeignKeys();
        $nomesAdicionados = [];
        foreach ($adicionadas as $adicionada) {
            $nomesAdicionados[strtolower($adicionada->getName())] = true;
        }

        foreach ($novas as $nova) {
            $nome = strtolower($nova->getName());
            if (!isset($nomesAntigos[$nome]) && !isset($nomesAdicionados[$nome])) {
                $adicionadas[] = $nova;
            }
        }

        if (count($mantidas) === count($removidas) && count($adicionadas) === count($diff->getAddedForeignKeys())) {
            return $diff;
        }

        return new TableDiff(
            oldTable: $diff->getOldTable(),
            addedColumns: $diff->getAddedColumns(),
            changedColumns: $diff->getChangedColumns(),
            droppedColumns: $diff->getDroppedColumns(),
            addedIndexes: $diff->getAddedIndexes(),
            droppedIndexes: $diff->getDroppedIndexes(),
            renamedIndexes: $diff->getRenamedIndexes(),
            addedForeignKeys: $adicionadas,
            modifiedForeignKeys: $diff->getModifiedForeignKeys(),
            droppedForeignKeys: $mantidas,
        );
    }
}
