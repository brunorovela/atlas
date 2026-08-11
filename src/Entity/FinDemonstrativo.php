<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinDemonstrativoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinDemonstrativoRepository::class)]
#[ORM\Table(
    name: 'fin_demonstrativo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Unicos', columns: ['ds_grupo', 'cd_conta', 'nr_mes', 'nr_ano', 'cd_demonstrativo'])]
#[ORM\Index(name: 'FK_DEMONSTRATIVO_CD_DEMONSTRA', columns: ['cd_demonstrativo'])]
#[ORM\Index(name: 'IX_CD_DEMONSTRATIVO', columns: ['cd_demonstrativo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DEMONSTRATIVO_CD_DEMONSTRA', 'colunas' => ['cd_demonstrativo'], 'tabelaAlvo' => 'fin_demonstrativos', 'colunasAlvo' => ['cd_demonstrativo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinDemonstrativo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_demonstrativo', type: 'integer')]
    private ?int $idDemonstrativo = null;

    #[ORM\ManyToOne(targetEntity: FinDemonstrativos::class)]
    #[ORM\JoinColumn(name: 'cd_demonstrativo', referencedColumnName: 'cd_demonstrativo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinDemonstrativos $cdDemonstrativo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'cd_conta', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConta = null;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'nr_mes', type: 'integer', nullable: true)]
    private ?int $nrMes = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer', nullable: true)]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'sn_totalizador', type: 'boolean', nullable: true)]
    private ?bool $snTotalizador = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'dt_atualizacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtAtualizacao = null;

    #[ORM\Column(name: 'cd_classificacao', type: 'string', length: 255, nullable: true)]
    private ?string $cdClassificacao = null;

    public function __construct(
        ?FinDemonstrativos $cdDemonstrativo = null,
        ?string $dsGrupo = null,
        ?int $cdConta = null,
        ?float $vlValor = null,
        ?int $nrMes = null,
        ?int $nrAno = null,
        ?bool $snTotalizador = null,
        ?int $nrOrdem = null,
        ?\DateTimeInterface $dtAtualizacao = null,
        ?string $cdClassificacao = null
    ) {
        $this->cdDemonstrativo = $cdDemonstrativo;
        $this->dsGrupo = $dsGrupo;
        $this->cdConta = $cdConta;
        $this->vlValor = $vlValor;
        $this->nrMes = $nrMes;
        $this->nrAno = $nrAno;
        $this->snTotalizador = $snTotalizador;
        $this->nrOrdem = $nrOrdem;
        $this->dtAtualizacao = $dtAtualizacao;
        $this->cdClassificacao = $cdClassificacao;
    }

    public function getIdDemonstrativo(): ?int
    {
        return $this->idDemonstrativo;
    }

    public function getCdDemonstrativo(): ?FinDemonstrativos
    {
        return $this->cdDemonstrativo;
    }

    public function setCdDemonstrativo(?FinDemonstrativos $cdDemonstrativo): self
    {
        $this->cdDemonstrativo = $cdDemonstrativo;
        return $this;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
        return $this;
    }

    public function getNrMes(): ?int
    {
        return $this->nrMes;
    }

    public function setNrMes(?int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function isSnTotalizador(): ?bool
    {
        return $this->snTotalizador;
    }

    public function setSnTotalizador(?bool $snTotalizador): self
    {
        $this->snTotalizador = $snTotalizador;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDtAtualizacao(): ?\DateTimeInterface
    {
        return $this->dtAtualizacao;
    }

    public function setDtAtualizacao(?\DateTimeInterface $dtAtualizacao): self
    {
        $this->dtAtualizacao = $dtAtualizacao;
        return $this;
    }

    public function getCdClassificacao(): ?string
    {
        return $this->cdClassificacao;
    }

    public function setCdClassificacao(?string $cdClassificacao): self
    {
        $this->cdClassificacao = $cdClassificacao;
        return $this;
    }
}
