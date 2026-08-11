<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\AvlAvaliadores;
use App\Repository\AvlAvaliadoresRepository;

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/bootstrap.php';

// -----------------------------------------------------------------------------
// 1. INSERIR NOVO REGISTRO
// -----------------------------------------------------------------------------
$avaliador = new AvlAvaliadores(
    cdAvaliacao: 10,
    cdPessoa: 50,
    snAvaliador: true
);

$entityManager->persist($avaliador);
$entityManager->flush();

echo "✅ Avaliador criado com sucesso! ID: " . $avaliador->getCdAvaliador() . "\n\n";

// -----------------------------------------------------------------------------
// 2. OBTENDO O REPOSITÓRIO
// -----------------------------------------------------------------------------
/** @var AvlAvaliadoresRepository $repository */
$repository = $entityManager->getRepository(AvlAvaliadores::class);

// -----------------------------------------------------------------------------
// 3. CONSULTAS NATIVAS (Já vêm prontas no Doctrine)
// -----------------------------------------------------------------------------
echo "--- 🔍 Consultas Nativas ---\n";

// A) Busca por ID (Chave Primária)
$buscaPorId = $repository->find($avaliador->getCdAvaliador());
echo "Find por ID: " . ($buscaPorId ? "Encontrado" : "Não encontrado") . "\n";

// B) Busca simples por coluna (findOneBy)
$buscaUmaPessoa = $repository->findOneBy(['cdPessoa' => 50]);
echo "FindOneBy Pessoa 50: ID " . ($buscaUmaPessoa ? $buscaUmaPessoa->getCdAvaliador() : 'N/A') . "\n";

// C) Busca lista por critérios (findBy)
$listaAvaliadores = $repository->findBy(['snAvaliador' => true], ['cdAvaliador' => 'DESC'], 5);
echo "Total de avaliadores ativos encontrados: " . count($listaAvaliadores) . "\n\n";

// -----------------------------------------------------------------------------
// 4. CONSULTAS CUSTOMIZADAS (Métodos criados na classe AvlAvaliadoresRepository)
// -----------------------------------------------------------------------------
echo "--- 🚀 Consultas Customizadas (QueryBuilder) ---\n";

// Usando o método customizado: buscarAvaliadoresAtivosPorPessoa()
$meusAvaliadores = $repository->buscarAvaliadoresAtivosPorPessoa(cdPessoa: 50);

foreach ($meusAvaliadores as $item) {
    echo "Avaliador ID: {$item->getCdAvaliador()} | Avaliação: {$item->getCdAvaliacao()} | Ativo: " . ($item->isSnAvaliador() ? 'Sim' : 'Não') . "\n";
}

// Usando o método customizado: buscarPorPessoaEAvaliacao()
$especifico = $repository->buscarPorPessoaEAvaliacao(cdPessoa: 50, cdAvaliacao: 10);
if ($especifico) {
    echo "Encontrado registro combinado exato! ID: " . $especifico->getCdAvaliador() . "\n";
}