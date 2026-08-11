<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintRegrasEnsalamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintRegrasEnsalamentoRepository::class)]
#[ORM\Table(
    name: 'pint_regras_ensalamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class PintRegrasEnsalamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra_ensalamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegraEnsalamento = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nm_regra', type: 'string', length: 255, nullable: true)]
    private ?string $nmRegra = null;

    #[ORM\Column(name: 'dt_regra', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRegra = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_logica', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdLogica = null;

    #[ORM\Column(name: 'cd_ordenacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdOrdenacao = null;

    #[ORM\Column(name: 'dt_libera_gabarito', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLiberaGabarito = null;

    #[ORM\Column(name: 'dt_libera_resultado', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLiberaResultado = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'dt_anula_aluno_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAnulaAlunoInicio = null;

    #[ORM\Column(name: 'dt_anula_aluno_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAnulaAlunoFim = null;

    #[ORM\Column(name: 'dt_anula_coordenador_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAnulaCoordenadorInicio = null;

    #[ORM\Column(name: 'dt_anula_coordenador_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAnulaCoordenadorFim = null;

    #[ORM\Column(name: 'sn_segunda_chamada', type: TinyIntType::NAME, nullable: true)]
    private ?int $snSegundaChamada = null;

    public function __construct(
        ?int $cdProva = null,
        ?string $nmRegra = null,
        ?\DateTimeInterface $dtRegra = null,
        ?int $nrAnosemestre = null,
        ?int $cdLogica = null,
        ?int $cdOrdenacao = null,
        ?\DateTimeInterface $dtLiberaGabarito = null,
        ?\DateTimeInterface $dtLiberaResultado = null,
        ?string $meObservacao = null,
        ?\DateTimeInterface $dtAnulaAlunoInicio = null,
        ?\DateTimeInterface $dtAnulaAlunoFim = null,
        ?\DateTimeInterface $dtAnulaCoordenadorInicio = null,
        ?\DateTimeInterface $dtAnulaCoordenadorFim = null,
        ?int $snSegundaChamada = null
    ) {
        $this->cdProva = $cdProva;
        $this->nmRegra = $nmRegra;
        $this->dtRegra = $dtRegra;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdLogica = $cdLogica;
        $this->cdOrdenacao = $cdOrdenacao;
        $this->dtLiberaGabarito = $dtLiberaGabarito;
        $this->dtLiberaResultado = $dtLiberaResultado;
        $this->meObservacao = $meObservacao;
        $this->dtAnulaAlunoInicio = $dtAnulaAlunoInicio;
        $this->dtAnulaAlunoFim = $dtAnulaAlunoFim;
        $this->dtAnulaCoordenadorInicio = $dtAnulaCoordenadorInicio;
        $this->dtAnulaCoordenadorFim = $dtAnulaCoordenadorFim;
        $this->snSegundaChamada = $snSegundaChamada;
    }

    public function getCdRegraEnsalamento(): ?int
    {
        return $this->cdRegraEnsalamento;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getNmRegra(): ?string
    {
        return $this->nmRegra;
    }

    public function setNmRegra(?string $nmRegra): self
    {
        $this->nmRegra = $nmRegra;
        return $this;
    }

    public function getDtRegra(): ?\DateTimeInterface
    {
        return $this->dtRegra;
    }

    public function setDtRegra(?\DateTimeInterface $dtRegra): self
    {
        $this->dtRegra = $dtRegra;
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

    public function getCdLogica(): ?int
    {
        return $this->cdLogica;
    }

    public function setCdLogica(?int $cdLogica): self
    {
        $this->cdLogica = $cdLogica;
        return $this;
    }

    public function getCdOrdenacao(): ?int
    {
        return $this->cdOrdenacao;
    }

    public function setCdOrdenacao(?int $cdOrdenacao): self
    {
        $this->cdOrdenacao = $cdOrdenacao;
        return $this;
    }

    public function getDtLiberaGabarito(): ?\DateTimeInterface
    {
        return $this->dtLiberaGabarito;
    }

    public function setDtLiberaGabarito(?\DateTimeInterface $dtLiberaGabarito): self
    {
        $this->dtLiberaGabarito = $dtLiberaGabarito;
        return $this;
    }

    public function getDtLiberaResultado(): ?\DateTimeInterface
    {
        return $this->dtLiberaResultado;
    }

    public function setDtLiberaResultado(?\DateTimeInterface $dtLiberaResultado): self
    {
        $this->dtLiberaResultado = $dtLiberaResultado;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getDtAnulaAlunoInicio(): ?\DateTimeInterface
    {
        return $this->dtAnulaAlunoInicio;
    }

    public function setDtAnulaAlunoInicio(?\DateTimeInterface $dtAnulaAlunoInicio): self
    {
        $this->dtAnulaAlunoInicio = $dtAnulaAlunoInicio;
        return $this;
    }

    public function getDtAnulaAlunoFim(): ?\DateTimeInterface
    {
        return $this->dtAnulaAlunoFim;
    }

    public function setDtAnulaAlunoFim(?\DateTimeInterface $dtAnulaAlunoFim): self
    {
        $this->dtAnulaAlunoFim = $dtAnulaAlunoFim;
        return $this;
    }

    public function getDtAnulaCoordenadorInicio(): ?\DateTimeInterface
    {
        return $this->dtAnulaCoordenadorInicio;
    }

    public function setDtAnulaCoordenadorInicio(?\DateTimeInterface $dtAnulaCoordenadorInicio): self
    {
        $this->dtAnulaCoordenadorInicio = $dtAnulaCoordenadorInicio;
        return $this;
    }

    public function getDtAnulaCoordenadorFim(): ?\DateTimeInterface
    {
        return $this->dtAnulaCoordenadorFim;
    }

    public function setDtAnulaCoordenadorFim(?\DateTimeInterface $dtAnulaCoordenadorFim): self
    {
        $this->dtAnulaCoordenadorFim = $dtAnulaCoordenadorFim;
        return $this;
    }

    public function getSnSegundaChamada(): ?int
    {
        return $this->snSegundaChamada;
    }

    public function setSnSegundaChamada(?int $snSegundaChamada): self
    {
        $this->snSegundaChamada = $snSegundaChamada;
        return $this;
    }
}
