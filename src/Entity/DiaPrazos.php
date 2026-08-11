<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiaPrazosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiaPrazosRepository::class)]
#[ORM\Table(
    name: 'dia_prazos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PRAZO', columns: ['CD_PRAZO'])]
#[ORM\Index(name: 'IX_CD_TIPO_PRAZO', columns: ['CD_TIPO_PRAZO'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['NR_ANOSEMESTRE'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class DiaPrazos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PRAZO', type: 'integer')]
    private ?int $cdPrazo = null;

    #[ORM\Column(name: 'NM_PRAZO', type: 'string', length: 255)]
    private ?string $nmPrazo = null;

    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'CD_TIPO_PRAZO', type: 'integer')]
    private ?int $cdTipoPrazo = null;

    #[ORM\Column(name: 'DT_INICIO_ETAPA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioEtapa = null;

    #[ORM\Column(name: 'DT_FIM_ETAPA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimEtapa = null;

    #[ORM\Column(name: 'DT_INICIO_FREQUENCIA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioFrequencia = null;

    #[ORM\Column(name: 'DT_FIM_FREQUENCIA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimFrequencia = null;

    #[ORM\Column(name: 'DT_INICIO_NOTAS', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioNotas = null;

    #[ORM\Column(name: 'DT_FIM_NOTAS', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimNotas = null;

    #[ORM\Column(name: 'DT_LIBERACAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacao = null;

    #[ORM\Column(name: 'DT_LIBERACAO_RE', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacaoRe = null;

    #[ORM\Column(name: 'DT_LIBERACAO_NP', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacaoNp = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'integer', nullable: true)]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $nmPrazo = null,
        ?int $nrAnosemestre = null,
        ?int $cdTipoPrazo = null,
        ?\DateTimeInterface $dtInicioEtapa = null,
        ?\DateTimeInterface $dtFimEtapa = null,
        ?\DateTimeInterface $dtInicioFrequencia = null,
        ?\DateTimeInterface $dtFimFrequencia = null,
        ?\DateTimeInterface $dtInicioNotas = null,
        ?\DateTimeInterface $dtFimNotas = null,
        ?\DateTimeInterface $dtLiberacao = null,
        ?\DateTimeInterface $dtLiberacaoRe = null,
        ?\DateTimeInterface $dtLiberacaoNp = null,
        ?int $cdColigadaMatriz = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nmPrazo = $nmPrazo;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTipoPrazo = $cdTipoPrazo;
        $this->dtInicioEtapa = $dtInicioEtapa;
        $this->dtFimEtapa = $dtFimEtapa;
        $this->dtInicioFrequencia = $dtInicioFrequencia;
        $this->dtFimFrequencia = $dtFimFrequencia;
        $this->dtInicioNotas = $dtInicioNotas;
        $this->dtFimNotas = $dtFimNotas;
        $this->dtLiberacao = $dtLiberacao;
        $this->dtLiberacaoRe = $dtLiberacaoRe;
        $this->dtLiberacaoNp = $dtLiberacaoNp;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dtBase = $dtBase;
    }

    public function getCdPrazo(): ?int
    {
        return $this->cdPrazo;
    }

    public function getNmPrazo(): ?string
    {
        return $this->nmPrazo;
    }

    public function setNmPrazo(?string $nmPrazo): self
    {
        $this->nmPrazo = $nmPrazo;
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

    public function getCdTipoPrazo(): ?int
    {
        return $this->cdTipoPrazo;
    }

    public function setCdTipoPrazo(?int $cdTipoPrazo): self
    {
        $this->cdTipoPrazo = $cdTipoPrazo;
        return $this;
    }

    public function getDtInicioEtapa(): ?\DateTimeInterface
    {
        return $this->dtInicioEtapa;
    }

    public function setDtInicioEtapa(?\DateTimeInterface $dtInicioEtapa): self
    {
        $this->dtInicioEtapa = $dtInicioEtapa;
        return $this;
    }

    public function getDtFimEtapa(): ?\DateTimeInterface
    {
        return $this->dtFimEtapa;
    }

    public function setDtFimEtapa(?\DateTimeInterface $dtFimEtapa): self
    {
        $this->dtFimEtapa = $dtFimEtapa;
        return $this;
    }

    public function getDtInicioFrequencia(): ?\DateTimeInterface
    {
        return $this->dtInicioFrequencia;
    }

    public function setDtInicioFrequencia(?\DateTimeInterface $dtInicioFrequencia): self
    {
        $this->dtInicioFrequencia = $dtInicioFrequencia;
        return $this;
    }

    public function getDtFimFrequencia(): ?\DateTimeInterface
    {
        return $this->dtFimFrequencia;
    }

    public function setDtFimFrequencia(?\DateTimeInterface $dtFimFrequencia): self
    {
        $this->dtFimFrequencia = $dtFimFrequencia;
        return $this;
    }

    public function getDtInicioNotas(): ?\DateTimeInterface
    {
        return $this->dtInicioNotas;
    }

    public function setDtInicioNotas(?\DateTimeInterface $dtInicioNotas): self
    {
        $this->dtInicioNotas = $dtInicioNotas;
        return $this;
    }

    public function getDtFimNotas(): ?\DateTimeInterface
    {
        return $this->dtFimNotas;
    }

    public function setDtFimNotas(?\DateTimeInterface $dtFimNotas): self
    {
        $this->dtFimNotas = $dtFimNotas;
        return $this;
    }

    public function getDtLiberacao(): ?\DateTimeInterface
    {
        return $this->dtLiberacao;
    }

    public function setDtLiberacao(?\DateTimeInterface $dtLiberacao): self
    {
        $this->dtLiberacao = $dtLiberacao;
        return $this;
    }

    public function getDtLiberacaoRe(): ?\DateTimeInterface
    {
        return $this->dtLiberacaoRe;
    }

    public function setDtLiberacaoRe(?\DateTimeInterface $dtLiberacaoRe): self
    {
        $this->dtLiberacaoRe = $dtLiberacaoRe;
        return $this;
    }

    public function getDtLiberacaoNp(): ?\DateTimeInterface
    {
        return $this->dtLiberacaoNp;
    }

    public function setDtLiberacaoNp(?\DateTimeInterface $dtLiberacaoNp): self
    {
        $this->dtLiberacaoNp = $dtLiberacaoNp;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
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
