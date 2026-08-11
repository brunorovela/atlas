<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoFormatosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoFormatosRepository::class)]
#[ORM\Table(
    name: 'rgo_formatos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_FORMATO', columns: ['ds_formato'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_ORIENTACAO', columns: ['cd_orientacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_rgo_formatos_rgo_orientacoes', 'colunas' => ['cd_orientacao'], 'tabelaAlvo' => 'rgo_orientacoes', 'colunasAlvo' => ['cd_orientacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoFormatos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_formato', type: 'integer')]
    private ?int $cdFormato = null;

    #[ORM\Column(name: 'ds_formato', type: 'string', length: 255)]
    private ?string $dsFormato = null;

    #[ORM\ManyToOne(targetEntity: RgoOrientacoes::class)]
    #[ORM\JoinColumn(name: 'cd_orientacao', referencedColumnName: 'cd_orientacao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoOrientacoes $cdOrientacao = null;

    #[ORM\Column(name: 'sn_padrao', type: 'boolean', options: ['default' => '0'])]
    private bool $snPadrao = false;

    #[ORM\Column(name: 'ds_margem_superior', type: 'float')]
    private ?float $dsMargemSuperior = null;

    #[ORM\Column(name: 'ds_margem_direita', type: 'float')]
    private ?float $dsMargemDireita = null;

    #[ORM\Column(name: 'ds_margem_inferior', type: 'float')]
    private ?float $dsMargemInferior = null;

    #[ORM\Column(name: 'ds_margem_esquerda', type: 'float')]
    private ?float $dsMargemEsquerda = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsFormato = null,
        ?RgoOrientacoes $cdOrientacao = null,
        bool $snPadrao = false,
        ?float $dsMargemSuperior = null,
        ?float $dsMargemDireita = null,
        ?float $dsMargemInferior = null,
        ?float $dsMargemEsquerda = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsFormato = $dsFormato;
        $this->cdOrientacao = $cdOrientacao;
        $this->snPadrao = $snPadrao;
        $this->dsMargemSuperior = $dsMargemSuperior;
        $this->dsMargemDireita = $dsMargemDireita;
        $this->dsMargemInferior = $dsMargemInferior;
        $this->dsMargemEsquerda = $dsMargemEsquerda;
        $this->dtBase = $dtBase;
    }

    public function getCdFormato(): ?int
    {
        return $this->cdFormato;
    }

    public function getDsFormato(): ?string
    {
        return $this->dsFormato;
    }

    public function setDsFormato(?string $dsFormato): self
    {
        $this->dsFormato = $dsFormato;
        return $this;
    }

    public function getCdOrientacao(): ?RgoOrientacoes
    {
        return $this->cdOrientacao;
    }

    public function setCdOrientacao(?RgoOrientacoes $cdOrientacao): self
    {
        $this->cdOrientacao = $cdOrientacao;
        return $this;
    }

    public function isSnPadrao(): bool
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(bool $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }

    public function getDsMargemSuperior(): ?float
    {
        return $this->dsMargemSuperior;
    }

    public function setDsMargemSuperior(?float $dsMargemSuperior): self
    {
        $this->dsMargemSuperior = $dsMargemSuperior;
        return $this;
    }

    public function getDsMargemDireita(): ?float
    {
        return $this->dsMargemDireita;
    }

    public function setDsMargemDireita(?float $dsMargemDireita): self
    {
        $this->dsMargemDireita = $dsMargemDireita;
        return $this;
    }

    public function getDsMargemInferior(): ?float
    {
        return $this->dsMargemInferior;
    }

    public function setDsMargemInferior(?float $dsMargemInferior): self
    {
        $this->dsMargemInferior = $dsMargemInferior;
        return $this;
    }

    public function getDsMargemEsquerda(): ?float
    {
        return $this->dsMargemEsquerda;
    }

    public function setDsMargemEsquerda(?float $dsMargemEsquerda): self
    {
        $this->dsMargemEsquerda = $dsMargemEsquerda;
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
}
