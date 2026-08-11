<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CtnRefeicoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnRefeicoesRepository::class)]
#[ORM\Table(
    name: 'ctn_refeicoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_refeicao_tipo', columns: ['cd_refeicao_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ctn_refeicoes_ibfk_1', 'colunas' => ['cd_refeicao_tipo'], 'tabelaAlvo' => 'ctn_refeicoes_tipos', 'colunasAlvo' => ['cd_refeicao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CtnRefeicoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_refeicao', type: 'integer')]
    private ?int $cdRefeicao = null;

    #[ORM\ManyToOne(targetEntity: CtnRefeicoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_refeicao_tipo', referencedColumnName: 'cd_refeicao_tipo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CtnRefeicoesTipos $cdRefeicaoTipo = null;

    #[ORM\Column(name: 'dt_refeicao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRefeicao = null;

    #[ORM\Column(name: 'ds_refeicao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRefeicao = null;

    #[ORM\Column(name: 'nr_periodo', type: 'integer', nullable: true)]
    private ?int $nrPeriodo = null;

    public function __construct(
        ?CtnRefeicoesTipos $cdRefeicaoTipo = null,
        ?\DateTimeInterface $dtRefeicao = null,
        ?string $dsRefeicao = null,
        ?int $nrPeriodo = null
    ) {
        $this->cdRefeicaoTipo = $cdRefeicaoTipo;
        $this->dtRefeicao = $dtRefeicao;
        $this->dsRefeicao = $dsRefeicao;
        $this->nrPeriodo = $nrPeriodo;
    }

    public function getCdRefeicao(): ?int
    {
        return $this->cdRefeicao;
    }

    public function getCdRefeicaoTipo(): ?CtnRefeicoesTipos
    {
        return $this->cdRefeicaoTipo;
    }

    public function setCdRefeicaoTipo(?CtnRefeicoesTipos $cdRefeicaoTipo): self
    {
        $this->cdRefeicaoTipo = $cdRefeicaoTipo;
        return $this;
    }

    public function getDtRefeicao(): ?\DateTimeInterface
    {
        return $this->dtRefeicao;
    }

    public function setDtRefeicao(?\DateTimeInterface $dtRefeicao): self
    {
        $this->dtRefeicao = $dtRefeicao;
        return $this;
    }

    public function getDsRefeicao(): ?string
    {
        return $this->dsRefeicao;
    }

    public function setDsRefeicao(?string $dsRefeicao): self
    {
        $this->dsRefeicao = $dsRefeicao;
        return $this;
    }

    public function getNrPeriodo(): ?int
    {
        return $this->nrPeriodo;
    }

    public function setNrPeriodo(?int $nrPeriodo): self
    {
        $this->nrPeriodo = $nrPeriodo;
        return $this;
    }
}
