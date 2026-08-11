<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasEmentasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasEmentasRepository::class)]
#[ORM\Table(
    name: 'disciplinas_ementas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CODIGO', columns: ['codigo'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
class DisciplinasEmentas
{
    #[ORM\Id]
    #[ORM\Column(name: 'codigo', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $codigo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15, options: ['default' => ''])]
    private string $curso = '';

    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Column(name: 'ementa', type: 'text', length: 16777215, nullable: true)]
    private ?string $ementa = null;

    #[ORM\Column(name: 'BIBLIOGRAFIA_BASICA', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bibliografiaBasica = null;

    #[ORM\Column(name: 'BIBLIOGRAFIA_COMPLEMENTAR', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bibliografiaComplementar = null;

    #[ORM\Column(name: 'BIBLIOGRAFIA_SUPLEMENTAR', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bibliografiaSuplementar = null;

    #[ORM\Column(name: 'objetivo', type: 'text', length: 16777215, nullable: true)]
    private ?string $objetivo = null;

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
        int $codigo = 0,
        string $curso = '',
        int $anosemestre = 0,
        ?string $ementa = null,
        ?string $bibliografiaBasica = null,
        ?string $bibliografiaComplementar = null,
        ?string $bibliografiaSuplementar = null,
        ?string $objetivo = null,
        ?string $txBibBasicaHtml = null,
        ?string $txBibCompHtml = null,
        ?string $txBibSupHtml = null,
        ?string $meJustificativa = null,
        ?string $meHabilidadesCompet = null,
        ?string $txJustificativaHtml = null,
        ?string $txHabilidadesCompetHtml = null
    ) {
        $this->codigo = $codigo;
        $this->curso = $curso;
        $this->anosemestre = $anosemestre;
        $this->ementa = $ementa;
        $this->bibliografiaBasica = $bibliografiaBasica;
        $this->bibliografiaComplementar = $bibliografiaComplementar;
        $this->bibliografiaSuplementar = $bibliografiaSuplementar;
        $this->objetivo = $objetivo;
        $this->txBibBasicaHtml = $txBibBasicaHtml;
        $this->txBibCompHtml = $txBibCompHtml;
        $this->txBibSupHtml = $txBibSupHtml;
        $this->meJustificativa = $meJustificativa;
        $this->meHabilidadesCompet = $meHabilidadesCompet;
        $this->txJustificativaHtml = $txJustificativaHtml;
        $this->txHabilidadesCompetHtml = $txHabilidadesCompetHtml;
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getAnosemestre(): int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getEmenta(): ?string
    {
        return $this->ementa;
    }

    public function setEmenta(?string $ementa): self
    {
        $this->ementa = $ementa;
        return $this;
    }

    public function getBibliografiaBasica(): ?string
    {
        return $this->bibliografiaBasica;
    }

    public function setBibliografiaBasica(?string $bibliografiaBasica): self
    {
        $this->bibliografiaBasica = $bibliografiaBasica;
        return $this;
    }

    public function getBibliografiaComplementar(): ?string
    {
        return $this->bibliografiaComplementar;
    }

    public function setBibliografiaComplementar(?string $bibliografiaComplementar): self
    {
        $this->bibliografiaComplementar = $bibliografiaComplementar;
        return $this;
    }

    public function getBibliografiaSuplementar(): ?string
    {
        return $this->bibliografiaSuplementar;
    }

    public function setBibliografiaSuplementar(?string $bibliografiaSuplementar): self
    {
        $this->bibliografiaSuplementar = $bibliografiaSuplementar;
        return $this;
    }

    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(?string $objetivo): self
    {
        $this->objetivo = $objetivo;
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
