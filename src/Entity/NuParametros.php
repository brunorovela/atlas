<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuParametrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuParametrosRepository::class)]
#[ORM\Table(
    name: 'nu_parametros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_parametro', columns: ['cd_parametro'])]
#[ORM\UniqueConstraint(name: 'uk_cd_parametro', columns: ['ds_parametro', 'cd_modulo', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class NuParametros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro', type: 'integer')]
    private ?int $cdParametro = null;

    #[ORM\Column(name: 'ds_parametro', type: 'string', length: 255, options: ['default' => '0'])]
    private string $dsParametro = '0';

    #[ORM\Column(name: 'ds_valor', type: 'text', length: 65535, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'cd_modulos_acoes', type: 'integer', options: ['default' => '0'])]
    private int $cdModulosAcoes = 0;

    #[ORM\Column(name: 'ds_observacao', type: 'text', nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_ereg_validacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsEregValidacao = null;

    #[ORM\Column(name: 'cd_validacao', type: 'integer', options: ['default' => '0'])]
    private int $cdValidacao = 0;

    #[ORM\Column(name: 'ds_validacao_valores', type: 'string', length: 50, nullable: true)]
    private ?string $dsValidacaoValores = null;

    #[ORM\Column(name: 'cd_parametro_tipo', type: 'integer', options: ['default' => '0'])]
    private int $cdParametroTipo = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $cdColigada = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_coligada_matriz', type: 'string', length: 1, nullable: true)]
    private ?string $snColigadaMatriz = null;

    #[ORM\Column(name: 'sn_restrito', type: 'integer', options: ['default' => '0'])]
    private int $snRestrito = 0;

    public function __construct(
        string $dsParametro = '0',
        ?string $dsValor = null,
        int $cdModulosAcoes = 0,
        ?string $dsObservacao = null,
        ?int $cdModulo = null,
        ?string $dsEregValidacao = null,
        int $cdValidacao = 0,
        ?string $dsValidacaoValores = null,
        int $cdParametroTipo = 0,
        ?int $cdColigada = 0,
        ?\DateTimeInterface $dtBase = null,
        ?string $snColigadaMatriz = null,
        int $snRestrito = 0
    ) {
        $this->dsParametro = $dsParametro;
        $this->dsValor = $dsValor;
        $this->cdModulosAcoes = $cdModulosAcoes;
        $this->dsObservacao = $dsObservacao;
        $this->cdModulo = $cdModulo;
        $this->dsEregValidacao = $dsEregValidacao;
        $this->cdValidacao = $cdValidacao;
        $this->dsValidacaoValores = $dsValidacaoValores;
        $this->cdParametroTipo = $cdParametroTipo;
        $this->cdColigada = $cdColigada;
        $this->dtBase = $dtBase;
        $this->snColigadaMatriz = $snColigadaMatriz;
        $this->snRestrito = $snRestrito;
    }

    public function getCdParametro(): ?int
    {
        return $this->cdParametro;
    }

    public function getDsParametro(): string
    {
        return $this->dsParametro;
    }

    public function setDsParametro(string $dsParametro): self
    {
        $this->dsParametro = $dsParametro;
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

    public function getCdModulosAcoes(): int
    {
        return $this->cdModulosAcoes;
    }

    public function setCdModulosAcoes(int $cdModulosAcoes): self
    {
        $this->cdModulosAcoes = $cdModulosAcoes;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
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

    public function getDsEregValidacao(): ?string
    {
        return $this->dsEregValidacao;
    }

    public function setDsEregValidacao(?string $dsEregValidacao): self
    {
        $this->dsEregValidacao = $dsEregValidacao;
        return $this;
    }

    public function getCdValidacao(): int
    {
        return $this->cdValidacao;
    }

    public function setCdValidacao(int $cdValidacao): self
    {
        $this->cdValidacao = $cdValidacao;
        return $this;
    }

    public function getDsValidacaoValores(): ?string
    {
        return $this->dsValidacaoValores;
    }

    public function setDsValidacaoValores(?string $dsValidacaoValores): self
    {
        $this->dsValidacaoValores = $dsValidacaoValores;
        return $this;
    }

    public function getCdParametroTipo(): int
    {
        return $this->cdParametroTipo;
    }

    public function setCdParametroTipo(int $cdParametroTipo): self
    {
        $this->cdParametroTipo = $cdParametroTipo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
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

    public function getSnColigadaMatriz(): ?string
    {
        return $this->snColigadaMatriz;
    }

    public function setSnColigadaMatriz(?string $snColigadaMatriz): self
    {
        $this->snColigadaMatriz = $snColigadaMatriz;
        return $this;
    }

    public function getSnRestrito(): int
    {
        return $this->snRestrito;
    }

    public function setSnRestrito(int $snRestrito): self
    {
        $this->snRestrito = $snRestrito;
        return $this;
    }
}
