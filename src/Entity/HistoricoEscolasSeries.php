<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\HistoricoEscolasSeriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoricoEscolasSeriesRepository::class)]
#[ORM\Table(
    name: 'historico_escolas_series',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_GRAU', columns: ['grau'])]
#[ORM\Index(name: 'IX_SERIE', columns: ['serie'])]
class HistoricoEscolasSeries
{
    #[ORM\Id]
    #[ORM\Column(name: 'grau', type: 'smallint', options: ['default' => '0'])]
    private int $grau = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'serie', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $serie = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_escola', type: 'string', length: 150, options: ['default' => ''])]
    private string $dsEscola = '';

    #[ORM\Column(name: 'ano', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $ano = 0;

    #[ORM\Column(name: 'ds_escola_cidade', type: 'string', length: 40, options: ['fixed' => true, 'default' => ''])]
    private string $dsEscolaCidade = '';

    #[ORM\Column(name: 'ds_escola_estado', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $dsEscolaEstado = '';

    #[ORM\Column(name: 'ds_escola_observacao', type: 'string', length: 250, nullable: true)]
    private ?string $dsEscolaObservacao = null;

    #[ORM\Column(name: 'nr_dias_letivos', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiasLetivos = null;

    #[ORM\Column(name: 'nr_total_carga_horaria', type: 'float', nullable: true)]
    private ?float $nrTotalCargaHoraria = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'nr_mes_inicio', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrMesInicio = null;

    #[ORM\Column(name: 'nr_ano_inicio', type: 'smallint', nullable: true)]
    private ?int $nrAnoInicio = null;

    #[ORM\Column(name: 'nr_mes_conclusao', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrMesConclusao = null;

    #[ORM\Column(name: 'ds_total_carga_horaria_historico', type: 'string', length: 50, nullable: true)]
    private ?string $dsTotalCargaHorariaHistorico = null;

    #[ORM\Column(name: 'ds_total_faltas_historico', type: 'string', length: 50, nullable: true)]
    private ?string $dsTotalFaltasHistorico = null;

    public function __construct(
        int $grau = 0,
        int $codigoaluno = 0,
        int $serie = 0,
        string $dsEscola = '',
        int $ano = 0,
        string $dsEscolaCidade = '',
        string $dsEscolaEstado = '',
        ?string $dsEscolaObservacao = null,
        ?int $nrDiasLetivos = null,
        ?float $nrTotalCargaHoraria = null,
        ?int $cdInstituicao = null,
        ?int $nrMesInicio = null,
        ?int $nrAnoInicio = null,
        ?int $nrMesConclusao = null,
        ?string $dsTotalCargaHorariaHistorico = null,
        ?string $dsTotalFaltasHistorico = null
    ) {
        $this->grau = $grau;
        $this->codigoaluno = $codigoaluno;
        $this->serie = $serie;
        $this->dsEscola = $dsEscola;
        $this->ano = $ano;
        $this->dsEscolaCidade = $dsEscolaCidade;
        $this->dsEscolaEstado = $dsEscolaEstado;
        $this->dsEscolaObservacao = $dsEscolaObservacao;
        $this->nrDiasLetivos = $nrDiasLetivos;
        $this->nrTotalCargaHoraria = $nrTotalCargaHoraria;
        $this->cdInstituicao = $cdInstituicao;
        $this->nrMesInicio = $nrMesInicio;
        $this->nrAnoInicio = $nrAnoInicio;
        $this->nrMesConclusao = $nrMesConclusao;
        $this->dsTotalCargaHorariaHistorico = $dsTotalCargaHorariaHistorico;
        $this->dsTotalFaltasHistorico = $dsTotalFaltasHistorico;
    }

    public function getGrau(): int
    {
        return $this->grau;
    }

    public function setGrau(int $grau): self
    {
        $this->grau = $grau;
        return $this;
    }

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getSerie(): int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;
        return $this;
    }

    public function getDsEscola(): string
    {
        return $this->dsEscola;
    }

    public function setDsEscola(string $dsEscola): self
    {
        $this->dsEscola = $dsEscola;
        return $this;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;
        return $this;
    }

    public function getDsEscolaCidade(): string
    {
        return $this->dsEscolaCidade;
    }

    public function setDsEscolaCidade(string $dsEscolaCidade): self
    {
        $this->dsEscolaCidade = $dsEscolaCidade;
        return $this;
    }

    public function getDsEscolaEstado(): string
    {
        return $this->dsEscolaEstado;
    }

    public function setDsEscolaEstado(string $dsEscolaEstado): self
    {
        $this->dsEscolaEstado = $dsEscolaEstado;
        return $this;
    }

    public function getDsEscolaObservacao(): ?string
    {
        return $this->dsEscolaObservacao;
    }

    public function setDsEscolaObservacao(?string $dsEscolaObservacao): self
    {
        $this->dsEscolaObservacao = $dsEscolaObservacao;
        return $this;
    }

    public function getNrDiasLetivos(): ?int
    {
        return $this->nrDiasLetivos;
    }

    public function setNrDiasLetivos(?int $nrDiasLetivos): self
    {
        $this->nrDiasLetivos = $nrDiasLetivos;
        return $this;
    }

    public function getNrTotalCargaHoraria(): ?float
    {
        return $this->nrTotalCargaHoraria;
    }

    public function setNrTotalCargaHoraria(?float $nrTotalCargaHoraria): self
    {
        $this->nrTotalCargaHoraria = $nrTotalCargaHoraria;
        return $this;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getNrMesInicio(): ?int
    {
        return $this->nrMesInicio;
    }

    public function setNrMesInicio(?int $nrMesInicio): self
    {
        $this->nrMesInicio = $nrMesInicio;
        return $this;
    }

    public function getNrAnoInicio(): ?int
    {
        return $this->nrAnoInicio;
    }

    public function setNrAnoInicio(?int $nrAnoInicio): self
    {
        $this->nrAnoInicio = $nrAnoInicio;
        return $this;
    }

    public function getNrMesConclusao(): ?int
    {
        return $this->nrMesConclusao;
    }

    public function setNrMesConclusao(?int $nrMesConclusao): self
    {
        $this->nrMesConclusao = $nrMesConclusao;
        return $this;
    }

    public function getDsTotalCargaHorariaHistorico(): ?string
    {
        return $this->dsTotalCargaHorariaHistorico;
    }

    public function setDsTotalCargaHorariaHistorico(?string $dsTotalCargaHorariaHistorico): self
    {
        $this->dsTotalCargaHorariaHistorico = $dsTotalCargaHorariaHistorico;
        return $this;
    }

    public function getDsTotalFaltasHistorico(): ?string
    {
        return $this->dsTotalFaltasHistorico;
    }

    public function setDsTotalFaltasHistorico(?string $dsTotalFaltasHistorico): self
    {
        $this->dsTotalFaltasHistorico = $dsTotalFaltasHistorico;
        return $this;
    }
}
