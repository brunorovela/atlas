<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinPlanosDistratosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosDistratosRepository::class)]
#[ORM\Table(
    name: 'fin_planos_distratos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_PLANO_DISTRATO_CD_PLANO', columns: ['CD_PLANO'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['CD_PLANO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fin_planos_distratos_ibfk_1', 'colunas' => ['CD_PLANO'], 'tabelaAlvo' => 'fin_planos', 'colunasAlvo' => ['CD_PLANO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinPlanosDistratos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_DISTRATO', type: 'integer')]
    private ?int $cdDistrato = null;

    #[ORM\ManyToOne(targetEntity: FinPlanos::class)]
    #[ORM\JoinColumn(name: 'CD_PLANO', referencedColumnName: 'CD_PLANO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinPlanos $cdPlano = null;

    #[ORM\Column(name: 'VL_COBRANCA', type: 'float', nullable: true)]
    private ?float $vlCobranca = null;

    #[ORM\Column(name: 'SN_ATIVO', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    #[ORM\Column(name: 'CD_TIPO_VALOR', type: 'boolean', options: ['default' => '1'])]
    private bool $cdTipoValor = true;

    #[ORM\Column(name: 'NR_DIAS_VENCIMENTO', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrDiasVencimento = 1;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'SN_TIPO_PARCELA', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snTipoParcela = 0;

    public function __construct(
        ?FinPlanos $cdPlano = null,
        ?float $vlCobranca = null,
        bool $snAtivo = false,
        bool $cdTipoValor = true,
        int $nrDiasVencimento = 1,
        ?int $cdTipoTitulo = null,
        int $snTipoParcela = 0
    ) {
        $this->cdPlano = $cdPlano;
        $this->vlCobranca = $vlCobranca;
        $this->snAtivo = $snAtivo;
        $this->cdTipoValor = $cdTipoValor;
        $this->nrDiasVencimento = $nrDiasVencimento;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->snTipoParcela = $snTipoParcela;
    }

    public function getCdDistrato(): ?int
    {
        return $this->cdDistrato;
    }

    public function getCdPlano(): ?FinPlanos
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?FinPlanos $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getVlCobranca(): ?float
    {
        return $this->vlCobranca;
    }

    public function setVlCobranca(?float $vlCobranca): self
    {
        $this->vlCobranca = $vlCobranca;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function isCdTipoValor(): bool
    {
        return $this->cdTipoValor;
    }

    public function setCdTipoValor(bool $cdTipoValor): self
    {
        $this->cdTipoValor = $cdTipoValor;
        return $this;
    }

    public function getNrDiasVencimento(): int
    {
        return $this->nrDiasVencimento;
    }

    public function setNrDiasVencimento(int $nrDiasVencimento): self
    {
        $this->nrDiasVencimento = $nrDiasVencimento;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getSnTipoParcela(): int
    {
        return $this->snTipoParcela;
    }

    public function setSnTipoParcela(int $snTipoParcela): self
    {
        $this->snTipoParcela = $snTipoParcela;
        return $this;
    }
}
