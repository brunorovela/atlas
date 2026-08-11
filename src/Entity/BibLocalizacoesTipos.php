<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibLocalizacoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibLocalizacoesTiposRepository::class)]
#[ORM\Table(
    name: 'bib_localizacoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_bib_localizacoes_tipos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_localizacoes_tipos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibLocalizacoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_localizacao_tipo', type: 'integer')]
    private ?int $cdLocalizacaoTipo = null;

    #[ORM\Column(name: 'ds_nome_localizacao', type: 'string', length: 50, nullable: true)]
    private ?string $dsNomeLocalizacao = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $dsNomeLocalizacao = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsNomeLocalizacao = $dsNomeLocalizacao;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdLocalizacaoTipo(): ?int
    {
        return $this->cdLocalizacaoTipo;
    }

    public function getDsNomeLocalizacao(): ?string
    {
        return $this->dsNomeLocalizacao;
    }

    public function setDsNomeLocalizacao(?string $dsNomeLocalizacao): self
    {
        $this->dsNomeLocalizacao = $dsNomeLocalizacao;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
