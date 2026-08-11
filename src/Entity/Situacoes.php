<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SituacoesRepository::class)]
#[ORM\Table(
    name: 'situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'codigo', columns: ['codigo'])]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['cd_modulo', 'cd_situacao'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class Situacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer', options: ['unsigned' => true])]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true)]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 50, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 65535, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'cd_auxiliar', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAuxiliar = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    public function __construct(
        ?int $cdModulo = null,
        ?int $cdSituacao = null,
        ?string $dsValor = null,
        ?string $dsSigla = null,
        ?string $meDescricao = null,
        ?int $cdAuxiliar = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $nrOrdem = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->cdSituacao = $cdSituacao;
        $this->dsValor = $dsValor;
        $this->dsSigla = $dsSigla;
        $this->meDescricao = $meDescricao;
        $this->cdAuxiliar = $cdAuxiliar;
        $this->dtBase = $dtBase;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getCdAuxiliar(): ?int
    {
        return $this->cdAuxiliar;
    }

    public function setCdAuxiliar(?int $cdAuxiliar): self
    {
        $this->cdAuxiliar = $cdAuxiliar;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
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
}
