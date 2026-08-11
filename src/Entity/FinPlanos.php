<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinPlanosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosRepository::class)]
#[ORM\Table(
    name: 'fin_planos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['CD_COLIGADA'])]
#[ORM\Index(name: 'IX_CD_TIPO_PLANO', columns: ['CD_TIPO_PLANO'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['NR_ANOSEMESTRE'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class FinPlanos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PLANO', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'CD_COLIGADA', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'CD_TIPO_PLANO', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdTipoPlano = 1;

    #[ORM\Column(name: 'DS_PLANO', type: 'string', length: 50, nullable: true)]
    private ?string $dsPlano = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'NR_PARCELAS', type: 'smallint', nullable: true)]
    private ?int $nrParcelas = null;

    #[ORM\Column(name: 'VL_COBRADO', type: 'float', nullable: true)]
    private ?float $vlCobrado = null;

    #[ORM\Column(name: 'VL_CONTRATO', type: 'float', nullable: true)]
    private ?float $vlContrato = null;

    #[ORM\Column(name: 'VL_TAXAMATERIAL', type: 'float', nullable: true)]
    private ?float $vlTaxamaterial = null;

    #[ORM\Column(name: 'VL_TAXAAPOSTILA', type: 'float', nullable: true)]
    private ?float $vlTaxaapostila = null;

    #[ORM\Column(name: 'VL_DESCONTO', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'VL_MATRICULA', type: 'float', nullable: true)]
    private ?float $vlMatricula = null;

    #[ORM\Column(name: 'DT_APARTIR', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtApartir = null;

    #[ORM\Column(name: 'NR_TAXASMATERIAL', type: 'smallint', nullable: true)]
    private ?int $nrTaxasmaterial = null;

    #[ORM\Column(name: 'DS_PARAGRAFO3', type: 'string', length: 150, nullable: true)]
    private ?string $dsParagrafo3 = null;

    #[ORM\Column(name: 'NR_DIAS_PARCELA_ZERO', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $nrDiasParcelaZero = 0;

    #[ORM\Column(name: 'SN_DIAS_UTEIS', type: 'boolean', options: ['default' => '1'])]
    private bool $snDiasUteis = true;

    #[ORM\Column(name: 'SN_CREDITOS', type: 'boolean', options: ['default' => '0'])]
    private bool $snCreditos = false;

    #[ORM\Column(name: 'NR_CREDITOS_BASE', type: 'float', options: ['default' => '0'])]
    private float $nrCreditosBase = 0.0;

    #[ORM\Column(name: 'NR_MAX_DISCIPLINAS', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMaxDisciplinas = null;

    #[ORM\Column(name: 'DS_DIAS_VENCTO', type: 'string', length: 31, options: ['fixed' => true, 'default' => '0000000000000000000000000000000'])]
    private string $dsDiasVencto = '0000000000000000000000000000000';

    #[ORM\Column(name: 'SN_PULAR_SABADOS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPularSabados = 0;

    #[ORM\Column(name: 'SN_PULAR_DOMINGOS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPularDomingos = 0;

    #[ORM\Column(name: 'SN_PULAR_FERIADOS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPularFeriados = 0;

    #[ORM\Column(name: 'dt_vigencia_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVigenciaInicio = null;

    #[ORM\Column(name: 'dt_vigencia_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVigenciaFim = null;

    #[ORM\Column(name: 'sn_vigencia', type: 'boolean')]
    private ?bool $snVigencia = null;

    #[ORM\Column(name: 'cd_acao_movimento_desc_cond', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcaoMovimentoDescCond = null;

    #[ORM\Column(name: 'cd_acao_movimento_desc_fixo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcaoMovimentoDescFixo = null;

    #[ORM\Column(name: 'SN_USAR_MATRICULA_ONLINE', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snUsarMatriculaOnline = 1;

    #[ORM\Column(name: 'NR_ORDEM', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'NR_TIPO_VENCTO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $nrTipoVencto = 0;

    #[ORM\Column(name: 'NR_FORMULA_VENCTO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrFormulaVencto = null;

    #[ORM\Column(name: 'NR_FORMULA_OPERADOR', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrFormulaOperador = null;

    #[ORM\Column(name: 'NR_FORMULA_DIAS', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrFormulaDias = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_plano_novo_equivalente', type: 'integer', nullable: true)]
    private ?int $cdPlanoNovoEquivalente = null;

    // Sem construtor: 37 propriedades. Use os setters encadeados.

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdTipoPlano(): int
    {
        return $this->cdTipoPlano;
    }

    public function setCdTipoPlano(int $cdTipoPlano): self
    {
        $this->cdTipoPlano = $cdTipoPlano;
        return $this;
    }

    public function getDsPlano(): ?string
    {
        return $this->dsPlano;
    }

    public function setDsPlano(?string $dsPlano): self
    {
        $this->dsPlano = $dsPlano;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getNrParcelas(): ?int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(?int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getVlCobrado(): ?float
    {
        return $this->vlCobrado;
    }

    public function setVlCobrado(?float $vlCobrado): self
    {
        $this->vlCobrado = $vlCobrado;
        return $this;
    }

    public function getVlContrato(): ?float
    {
        return $this->vlContrato;
    }

    public function setVlContrato(?float $vlContrato): self
    {
        $this->vlContrato = $vlContrato;
        return $this;
    }

    public function getVlTaxamaterial(): ?float
    {
        return $this->vlTaxamaterial;
    }

    public function setVlTaxamaterial(?float $vlTaxamaterial): self
    {
        $this->vlTaxamaterial = $vlTaxamaterial;
        return $this;
    }

    public function getVlTaxaapostila(): ?float
    {
        return $this->vlTaxaapostila;
    }

    public function setVlTaxaapostila(?float $vlTaxaapostila): self
    {
        $this->vlTaxaapostila = $vlTaxaapostila;
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

    public function getVlMatricula(): ?float
    {
        return $this->vlMatricula;
    }

    public function setVlMatricula(?float $vlMatricula): self
    {
        $this->vlMatricula = $vlMatricula;
        return $this;
    }

    public function getDtApartir(): ?\DateTimeInterface
    {
        return $this->dtApartir;
    }

    public function setDtApartir(?\DateTimeInterface $dtApartir): self
    {
        $this->dtApartir = $dtApartir;
        return $this;
    }

    public function getNrTaxasmaterial(): ?int
    {
        return $this->nrTaxasmaterial;
    }

    public function setNrTaxasmaterial(?int $nrTaxasmaterial): self
    {
        $this->nrTaxasmaterial = $nrTaxasmaterial;
        return $this;
    }

    public function getDsParagrafo3(): ?string
    {
        return $this->dsParagrafo3;
    }

    public function setDsParagrafo3(?string $dsParagrafo3): self
    {
        $this->dsParagrafo3 = $dsParagrafo3;
        return $this;
    }

    public function getNrDiasParcelaZero(): ?int
    {
        return $this->nrDiasParcelaZero;
    }

    public function setNrDiasParcelaZero(?int $nrDiasParcelaZero): self
    {
        $this->nrDiasParcelaZero = $nrDiasParcelaZero;
        return $this;
    }

    public function isSnDiasUteis(): bool
    {
        return $this->snDiasUteis;
    }

    public function setSnDiasUteis(bool $snDiasUteis): self
    {
        $this->snDiasUteis = $snDiasUteis;
        return $this;
    }

    public function isSnCreditos(): bool
    {
        return $this->snCreditos;
    }

    public function setSnCreditos(bool $snCreditos): self
    {
        $this->snCreditos = $snCreditos;
        return $this;
    }

    public function getNrCreditosBase(): float
    {
        return $this->nrCreditosBase;
    }

    public function setNrCreditosBase(float $nrCreditosBase): self
    {
        $this->nrCreditosBase = $nrCreditosBase;
        return $this;
    }

    public function getNrMaxDisciplinas(): ?int
    {
        return $this->nrMaxDisciplinas;
    }

    public function setNrMaxDisciplinas(?int $nrMaxDisciplinas): self
    {
        $this->nrMaxDisciplinas = $nrMaxDisciplinas;
        return $this;
    }

    public function getDsDiasVencto(): string
    {
        return $this->dsDiasVencto;
    }

    public function setDsDiasVencto(string $dsDiasVencto): self
    {
        $this->dsDiasVencto = $dsDiasVencto;
        return $this;
    }

    public function getSnPularSabados(): int
    {
        return $this->snPularSabados;
    }

    public function setSnPularSabados(int $snPularSabados): self
    {
        $this->snPularSabados = $snPularSabados;
        return $this;
    }

    public function getSnPularDomingos(): int
    {
        return $this->snPularDomingos;
    }

    public function setSnPularDomingos(int $snPularDomingos): self
    {
        $this->snPularDomingos = $snPularDomingos;
        return $this;
    }

    public function getSnPularFeriados(): int
    {
        return $this->snPularFeriados;
    }

    public function setSnPularFeriados(int $snPularFeriados): self
    {
        $this->snPularFeriados = $snPularFeriados;
        return $this;
    }

    public function getDtVigenciaInicio(): ?\DateTimeInterface
    {
        return $this->dtVigenciaInicio;
    }

    public function setDtVigenciaInicio(?\DateTimeInterface $dtVigenciaInicio): self
    {
        $this->dtVigenciaInicio = $dtVigenciaInicio;
        return $this;
    }

    public function getDtVigenciaFim(): ?\DateTimeInterface
    {
        return $this->dtVigenciaFim;
    }

    public function setDtVigenciaFim(?\DateTimeInterface $dtVigenciaFim): self
    {
        $this->dtVigenciaFim = $dtVigenciaFim;
        return $this;
    }

    public function isSnVigencia(): ?bool
    {
        return $this->snVigencia;
    }

    public function setSnVigencia(?bool $snVigencia): self
    {
        $this->snVigencia = $snVigencia;
        return $this;
    }

    public function getCdAcaoMovimentoDescCond(): ?int
    {
        return $this->cdAcaoMovimentoDescCond;
    }

    public function setCdAcaoMovimentoDescCond(?int $cdAcaoMovimentoDescCond): self
    {
        $this->cdAcaoMovimentoDescCond = $cdAcaoMovimentoDescCond;
        return $this;
    }

    public function getCdAcaoMovimentoDescFixo(): ?int
    {
        return $this->cdAcaoMovimentoDescFixo;
    }

    public function setCdAcaoMovimentoDescFixo(?int $cdAcaoMovimentoDescFixo): self
    {
        $this->cdAcaoMovimentoDescFixo = $cdAcaoMovimentoDescFixo;
        return $this;
    }

    public function getSnUsarMatriculaOnline(): int
    {
        return $this->snUsarMatriculaOnline;
    }

    public function setSnUsarMatriculaOnline(int $snUsarMatriculaOnline): self
    {
        $this->snUsarMatriculaOnline = $snUsarMatriculaOnline;
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

    public function getNrTipoVencto(): int
    {
        return $this->nrTipoVencto;
    }

    public function setNrTipoVencto(int $nrTipoVencto): self
    {
        $this->nrTipoVencto = $nrTipoVencto;
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

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

    public function getCdPlanoNovoEquivalente(): ?int
    {
        return $this->cdPlanoNovoEquivalente;
    }

    public function setCdPlanoNovoEquivalente(?int $cdPlanoNovoEquivalente): self
    {
        $this->cdPlanoNovoEquivalente = $cdPlanoNovoEquivalente;
        return $this;
    }
}
