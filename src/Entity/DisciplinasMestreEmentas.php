<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasMestreEmentasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasMestreEmentasRepository::class)]
#[ORM\Table(
    name: 'disciplinas_mestre_ementas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class DisciplinasMestreEmentas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdDisciplinaPai = '';

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'me_ementa', type: 'text', length: 16777215, nullable: true)]
    private ?string $meEmenta = null;

    #[ORM\Column(name: 'ME_BIBLIOGRAFIA_BASICA', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meBibliografiaBasica = null;

    #[ORM\Column(name: 'ME_BIBLIOGRAFIA_COMPLEMENTAR', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meBibliografiaComplementar = null;

    #[ORM\Column(name: 'ME_BIBLIOGRAFIA_SUPLEMENTAR', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meBibliografiaSuplementar = null;

    #[ORM\Column(name: 'me_objetivo', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObjetivo = null;

    #[ORM\Column(name: 'TX_BIB_BASICA_HTML', type: 'text', length: 16777215, nullable: true)]
    private ?string $txBibBasicaHtml = null;

    #[ORM\Column(name: 'TX_BIB_COMP_HTML', type: 'text', length: 16777215, nullable: true)]
    private ?string $txBibCompHtml = null;

    #[ORM\Column(name: 'TX_BIB_SUP_HTML', type: 'text', length: 16777215, nullable: true)]
    private ?string $txBibSupHtml = null;

    #[ORM\Column(name: 'ME_JUSTIFICATIVA', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meJustificativa = null;

    #[ORM\Column(name: 'ME_HABILIDADES_COMPET', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meHabilidadesCompet = null;

    #[ORM\Column(name: 'TX_JUSTIFICATIVA_HTML', type: 'text', length: 16777215, nullable: true)]
    private ?string $txJustificativaHtml = null;

    #[ORM\Column(name: 'TX_HABILIDADES_COMPET_HTML', type: 'text', length: 16777215, nullable: true)]
    private ?string $txHabilidadesCompetHtml = null;

    public function __construct(
        string $cdDisciplinaPai = '',
        ?int $nrAnosemestre = null,
        ?string $meEmenta = null,
        ?string $meBibliografiaBasica = null,
        ?string $meBibliografiaComplementar = null,
        ?string $meBibliografiaSuplementar = null,
        ?string $meObjetivo = null,
        ?string $txBibBasicaHtml = null,
        ?string $txBibCompHtml = null,
        ?string $txBibSupHtml = null,
        ?string $meJustificativa = null,
        ?string $meHabilidadesCompet = null,
        ?string $txJustificativaHtml = null,
        ?string $txHabilidadesCompetHtml = null
    ) {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->meEmenta = $meEmenta;
        $this->meBibliografiaBasica = $meBibliografiaBasica;
        $this->meBibliografiaComplementar = $meBibliografiaComplementar;
        $this->meBibliografiaSuplementar = $meBibliografiaSuplementar;
        $this->meObjetivo = $meObjetivo;
        $this->txBibBasicaHtml = $txBibBasicaHtml;
        $this->txBibCompHtml = $txBibCompHtml;
        $this->txBibSupHtml = $txBibSupHtml;
        $this->meJustificativa = $meJustificativa;
        $this->meHabilidadesCompet = $meHabilidadesCompet;
        $this->txJustificativaHtml = $txJustificativaHtml;
        $this->txHabilidadesCompetHtml = $txHabilidadesCompetHtml;
    }

    public function getCdDisciplinaPai(): string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
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

    public function getMeEmenta(): ?string
    {
        return $this->meEmenta;
    }

    public function setMeEmenta(?string $meEmenta): self
    {
        $this->meEmenta = $meEmenta;
        return $this;
    }

    public function getMeBibliografiaBasica(): ?string
    {
        return $this->meBibliografiaBasica;
    }

    public function setMeBibliografiaBasica(?string $meBibliografiaBasica): self
    {
        $this->meBibliografiaBasica = $meBibliografiaBasica;
        return $this;
    }

    public function getMeBibliografiaComplementar(): ?string
    {
        return $this->meBibliografiaComplementar;
    }

    public function setMeBibliografiaComplementar(?string $meBibliografiaComplementar): self
    {
        $this->meBibliografiaComplementar = $meBibliografiaComplementar;
        return $this;
    }

    public function getMeBibliografiaSuplementar(): ?string
    {
        return $this->meBibliografiaSuplementar;
    }

    public function setMeBibliografiaSuplementar(?string $meBibliografiaSuplementar): self
    {
        $this->meBibliografiaSuplementar = $meBibliografiaSuplementar;
        return $this;
    }

    public function getMeObjetivo(): ?string
    {
        return $this->meObjetivo;
    }

    public function setMeObjetivo(?string $meObjetivo): self
    {
        $this->meObjetivo = $meObjetivo;
        return $this;
    }

    public function getTxBibBasicaHtml(): ?string
    {
        return $this->txBibBasicaHtml;
    }

    public function setTxBibBasicaHtml(?string $txBibBasicaHtml): self
    {
        $this->txBibBasicaHtml = $txBibBasicaHtml;
        return $this;
    }

    public function getTxBibCompHtml(): ?string
    {
        return $this->txBibCompHtml;
    }

    public function setTxBibCompHtml(?string $txBibCompHtml): self
    {
        $this->txBibCompHtml = $txBibCompHtml;
        return $this;
    }

    public function getTxBibSupHtml(): ?string
    {
        return $this->txBibSupHtml;
    }

    public function setTxBibSupHtml(?string $txBibSupHtml): self
    {
        $this->txBibSupHtml = $txBibSupHtml;
        return $this;
    }

    public function getMeJustificativa(): ?string
    {
        return $this->meJustificativa;
    }

    public function setMeJustificativa(?string $meJustificativa): self
    {
        $this->meJustificativa = $meJustificativa;
        return $this;
    }

    public function getMeHabilidadesCompet(): ?string
    {
        return $this->meHabilidadesCompet;
    }

    public function setMeHabilidadesCompet(?string $meHabilidadesCompet): self
    {
        $this->meHabilidadesCompet = $meHabilidadesCompet;
        return $this;
    }

    public function getTxJustificativaHtml(): ?string
    {
        return $this->txJustificativaHtml;
    }

    public function setTxJustificativaHtml(?string $txJustificativaHtml): self
    {
        $this->txJustificativaHtml = $txJustificativaHtml;
        return $this;
    }

    public function getTxHabilidadesCompetHtml(): ?string
    {
        return $this->txHabilidadesCompetHtml;
    }

    public function setTxHabilidadesCompetHtml(?string $txHabilidadesCompetHtml): self
    {
        $this->txHabilidadesCompetHtml = $txHabilidadesCompetHtml;
        return $this;
    }
}
