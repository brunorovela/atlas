<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\DBAL\ReconciliadorEsquema;
use App\DBAL\TinyIntMiddleware;
use App\DBAL\TinyIntType;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\ToolEvents;

// 1. Configura as entidades via Atributos PHP
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true
);

// Mapeamento do tipo 'bit' do MySQL para não dar erro em colunas legadas
$config->setSchemaIgnoreClasses([]);

// Tipo TINYINT numérico + introspecção que separa tinyint(1) (flag) de
// tinyint (número). Sem isso o schema:diff nunca fecha limpo — ver src/DBAL.
if (!Type::hasType(TinyIntType::NAME)) {
    Type::addType(TinyIntType::NAME, TinyIntType::class);
}
$config->setMiddlewares([new TinyIntMiddleware()]);

// 2. Parâmetros de conexão do MySQL
$connectionParams = [
    'dbname'   => 'onboarding',
    'user'     => 'root',
    'password' => 'AnB8pypclXD031yk',
    'host'     => '143.0.122.7',
    'port'     => 3306,
    'driver'   => 'pdo_mysql',
];

// 3. Cria a conexão e o EntityManager
$connection = DriverManager::getConnection($connectionParams, $config);

// Registra tipos especiais se o banco tiver colunas 'bit'
$connection->getDatabasePlatform()->registerDoctrineTypeMapping('bit', 'boolean');

// Reconcilia o schema gerado com o físico (nome de FK, AUTO_INCREMENT fora da
// PK, índices redundantes). Sem isso o schema:diff acusa ~250 diferenças que
// não são erro de mapeamento — ver src/DBAL/ReconciliadorEsquema.php.
$eventManager = new EventManager();
$eventManager->addEventListener([ToolEvents::postGenerateSchema], new ReconciliadorEsquema());

$entityManager = new EntityManager($connection, $config, $eventManager);

// Restringe a introspecção às tabelas que têm entidade. Sem isso, schema:diff
// enxerga também as 139 tabelas sem identificador e as 87 views, e emite
// DROP TABLE para cada uma — ruído perigoso, porque o onboarding é o banco
// modelo e não deve ser alterado. Com o filtro, o diff só fala das tabelas
// mapeadas. O gerador sobrepõe este filtro, senão nunca descobriria tabela nova.
$tabelasMapeadas = null;
$config->setSchemaAssetsFilter(
    static function (string $tabela) use (&$tabelasMapeadas, $entityManager): bool {
        if ($tabelasMapeadas === null) {
            $tabelasMapeadas = [];
            foreach ($entityManager->getMetadataFactory()->getAllMetadata() as $metadata) {
                $tabelasMapeadas[strtolower($metadata->getTableName())] = true;
            }
        }

        return isset($tabelasMapeadas[strtolower($tabela)]);
    }
);

return $entityManager;
