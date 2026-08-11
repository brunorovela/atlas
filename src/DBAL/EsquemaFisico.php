<?php

declare(strict_types=1);

namespace App\DBAL;

use Attribute;

/**
 * Fatos físicos da tabela que o mapeamento ORM não consegue expressar.
 *
 * O Doctrine não tem atributo para o nome de uma constraint de FK (o SchemaTool
 * gera `FK_<hash>`) nem para AUTO_INCREMENT fora do identificador. Sem registrar
 * isso, o schema:diff acusa ~250 diferenças que não são erro de mapeamento.
 *
 * Estes dados vêm do banco modelo no momento da geração e ficam **na entidade**,
 * de propósito: a entidade é o modelo de referência e precisa ser autocontida.
 * Se o reconciliador lesse os nomes do banco conectado, comparar contra o banco
 * de um cliente mascararia justamente as diferenças que se quer detectar.
 *
 * Aplicado por {@see ReconciliadorEsquema}.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class EsquemaFisico
{
    /**
     * @param list<array{nome: string, colunas: list<string>, tabelaAlvo: string, colunasAlvo: list<string>, opcoes: array<string, mixed>}> $chavesEstrangeiras
     *        Todas as FKs da tabela, inclusive as que não viraram associação.
     * @param list<string> $autoIncremento
     *        Colunas AUTO_INCREMENT que não são o identificador da entidade.
     */
    public function __construct(
        public readonly array $chavesEstrangeiras = [],
        public readonly array $autoIncremento = [],
    ) {
    }
}
