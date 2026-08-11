<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinPlanosItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosItensRepository::class)]
#[ORM\Table(
    name: 'fin_planos_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_PLANOS_TURMAS_CD_PLANO', columns: ['CD_PLANO'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['CD_PLANO'])]
#[ORM\Index(name: 'IX_NR_PARCELA', columns: ['NR_PARCELA'])]
#[ORM\Index(name: 'IX_NR_DIA', columns: ['NR_DIA'])]
#[ORM\Index(name: 'IX_NR_MES', columns: ['NR_MES'])]
#[ORM\Index(name: 'IX_NR_ANO', columns: ['NR_ANO'])]
#[ORM\Index(name: 'IX_CD_TIPO_PARCELA', columns: ['CD_TIPO_PARCELA'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fin_planos_itens_ibfk_1', 'colunas' => ['CD_PLANO'], 'tabelaAlvo' => 'fin_planos', 'colunasAlvo' => ['CD_PLANO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinPlanosItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PLANO_ITEM', type: 'integer')]
    private ?int $cdPlanoItem = null;

    #[ORM\ManyToOne(targetEntity: FinPlanos::class)]
    #[ORM\JoinColumn(name: 'CD_PLANO', referencedColumnName: 'CD_PLANO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinPlanos $cdPlano = null;

    #[ORM\Column(name: 'NR_PARCELA', type: 'smallint')]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'VL_BRUTO', type: 'float', nullable: true)]
    private ?float $vlBruto = null;

    #[ORM\Column(name: 'VL_DESCONTO', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'VL_EXTRA', type: 'float', nullable: true)]
    private ?float $vlExtra = null;

    #[ORM\Column(name: 'VL_DESCONTO_EXTRA', type: 'float', nullable: true)]
    private ?float $vlDescontoExtra = null;

    #[ORM\Column(name: 'VL_TOTAL', type: 'float', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'NR_DIA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $nrDia = 1;

    #[ORM\Column(name: 'NR_MES', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrMes = 0;

    #[ORM\Column(name: 'NR_ANO', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAno = 0;

    #[ORM\Column(name: 'NR_CREDITOS_MINIMOS', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $nrCreditosMinimos = 0.0;

    #[ORM\Column(name: 'SN_CREDITO_PARCELA', type: 'boolean', options: ['default' => '0'])]
    private bool $snCreditoParcela = false;

    #[ORM\Column(name: 'CD_TIPO_PARCELA', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipoParcela = 0;

    #[ORM\Column(name: 'SN_DIVISIVEL', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snDivisivel = 0;

    #[ORM\Column(name: 'NR_FORMULA_VENCTO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrFormulaVencto = null;

    #[ORM\Column(name: 'NR_FORMULA_OPERADOR', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrFormulaOperador = null;

    #[ORM\Column(name: 'NR_FORMULA_DIAS', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrFormulaDias = null;

    #[ORM\Column(name: 'SN_BLOQUEADO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snBloqueado = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinPlanos $cdPlano = null,
        ?int $nrParcela = null,
        ?float $vlBruto = null,
        ?float $vlDesconto = null,
        ?float $vlExtra = null,
        ?float $vlDescontoExtra = null,
        ?float $vlTotal = null,
        int $nrDia = 1,
        int $nrMes = 0,
        int $nrAno = 0,
        ?float $nrCreditosMinimos = 0.0,
        bool $snCreditoParcela = false,
        int $cdTipoParcela = 0,
        int $snDivisivel = 0,
        ?int $nrFormulaVencto = null,
        ?int $nrFormulaOperador = null,
        ?int $nrFormulaDias = null,
        int $snBloqueado = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->nrParcela = $nrParcela;
        $this->vlBruto = $vlBruto;
        $this->vlDesconto = $vlDesconto;
        $this->vlExtra = $vlExtra;
        $this->vlDescontoExtra = $vlDescontoExtra;
        $this->vlTotal = $vlTotal;
        $this->nrDia = $nrDia;
        $this->nrMes = $nrMes;
        $this->nrAno = $nrAno;
        $this->nrCreditosMinimos = $nrCreditosMinimos;
        $this->snCreditoParcela = $snCreditoParcela;
        $this->cdTipoParcela = $cdTipoParcela;
        $this->snDivisivel = $snDivisivel;
        $this->nrFormulaVencto = $nrFormulaVencto;
        $this->nrFormulaOperador = $nrFormulaOperador;
        $this->nrFormulaDias = $nrFormulaDias;
        $this->snBloqueado = $snBloqueado;
        $this->dtBase = $dtBase;
    }

    public function getCdPlanoItem(): ?int
    {
        return $this->cdPlanoItem;
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

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlBruto(): ?float
    {
        return $this->vlBruto;
    }

    public function setVlBruto(?float $vlBruto): self
    {
        $this->vlBruto = $vlBruto;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getVlExtra(): ?float
    {
        return $this->vlExtra;
    }

    public function setVlExtra(?float $vlExtra): self
    {
        $this->vlExtra = $vlExtra;
        return $this;
    }

    public function getVlDescontoExtra(): ?float
    {
        return $this->vlDescontoExtra;
    }

    public function setVlDescontoExtra(?float $vlDescontoExtra): self
    {
        $this->vlDescontoExtra = $vlDescontoExtra;
        return $this;
    }

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getNrDia(): int
    {
        return $this->nrDia;
    }

    public function setNrDia(int $nrDia): self
    {
        $this->nrDia = $nrDia;
        return $this;
    }

    public function getNrMes(): int
    {
        return $this->nrMes;
    }

    public function setNrMes(int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getNrAno(): int
    {
        return $this->nrAno;
    }

    public function setNrAno(int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getNrCreditosMinimos(): ?float
    {
        return $this->nrCreditosMinimos;
    }

    public function setNrCreditosMinimos(?float $nrCreditosMinimos): self
    {
        $this->nrCreditosMinimos = $nrCreditosMinimos;
        return $this;
    }

    public function isSnCreditoParcela(): bool
    {
        return $this->snCreditoParcela;
    }

    public function setSnCreditoParcela(bool $snCreditoParcela): self
    {
        $this->snCreditoParcela = $snCreditoParcela;
        return $this;
    }

    public function getCdTipoParcela(): int
    {
        return $this->cdTipoParcela;
    }

    public function setCdTipoParcela(int $cdTipoParcela): self
    {
        $this->cdTipoParcela = $cdTipoParcela;
        return $this;
    }

    public function getSnDivisivel(): int
    {
        return $this->snDivisivel;
    }

    public function setSnDivisivel(int $snDivisivel): self
    {
        $this->snDivisivel = $snDivisivel;
        return $this;
    }

    public function getNrFormulaVencto(): ?int
    {
        return $this->nrFormulaVencto;
    }

    public function setNrFormulaVencto(?int $nrFormulaVencto): self
    {
        $this->nrFormulaVencto = $nrFormulaVencto;
        return $this;
    }

    public function getNrFormulaOperador(): ?int
    {
        return $this->nrFormulaOperador;
    }

    public function setNrFormulaOperador(?int $nrFormulaOperador): self
    {
        $this->nrFormulaOperador = $nrFormulaOperador;
        return $this;
    }

    public function getNrFormulaDias(): ?int
    {
        return $this->nrFormulaDias;
    }

    public function setNrFormulaDias(?int $nrFormulaDias): self
    {
        $this->nrFormulaDias = $nrFormulaDias;
        return $this;
    }

    public function getSnBloqueado(): int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(int $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
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
