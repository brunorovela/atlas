<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvasRepository::class)]
#[ORM\Table(
    name: 'provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_NR_PROVA', columns: ['nr_prova'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class Provas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 255, nullable: true)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'nr_prova', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrProva = 0;

    #[ORM\Column(name: 'dt_cad_inicio', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadInicio = null;

    #[ORM\Column(name: 'dt_cad_fim', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadFim = null;

    #[ORM\Column(name: 'dt_prova_inicio', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtProvaInicio = null;

    #[ORM\Column(name: 'dt_prova_fim', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtProvaFim = null;

    #[ORM\Column(name: 'nr_duracao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrDuracao = 0;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', nullable: true)]
    private ?int $cdAvaliacao = null;

    #[ORM\Column(name: 'cd_ajuste', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdAjuste = 0;

    #[ORM\Column(name: 'nr_etapa_ajuste', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrEtapaAjuste = 0;

    #[ORM\Column(name: 'vl_peso', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlPeso = 0.0;

    public function __construct(
        int $cdGrupo = 0,
        ?string $dsProva = null,
        ?int $nrProva = 0,
        ?\DateTimeInterface $dtCadInicio = null,
        ?\DateTimeInterface $dtCadFim = null,
        ?\DateTimeInterface $dtProvaInicio = null,
        ?\DateTimeInterface $dtProvaFim = null,
        ?int $nrDuracao = 0,
        ?int $nrAnosemestre = null,
        ?int $cdAvaliacao = null,
        ?int $cdAjuste = 0,
        ?int $nrEtapaAjuste = 0,
        ?float $vlPeso = 0.0
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->dsProva = $dsProva;
        $this->nrProva = $nrProva;
        $this->dtCadInicio = $dtCadInicio;
        $this->dtCadFim = $dtCadFim;
        $this->dtProvaInicio = $dtProvaInicio;
        $this->dtProvaFim = $dtProvaFim;
        $this->nrDuracao = $nrDuracao;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdAjuste = $cdAjuste;
        $this->nrEtapaAjuste = $nrEtapaAjuste;
        $this->vlPeso = $vlPeso;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
        return $this;
    }

    public function getNrProva(): ?int
    {
        return $this->nrProva;
    }

    public function setNrProva(?int $nrProva): self
    {
        $this->nrProva = $nrProva;
        return $this;
    }

    public function getDtCadInicio(): ?\DateTimeInterface
    {
        return $this->dtCadInicio;
    }

    public function setDtCadInicio(?\DateTimeInterface $dtCadInicio): self
    {
        $this->dtCadInicio = $dtCadInicio;
        return $this;
    }

    public function getDtCadFim(): ?\DateTimeInterface
    {
        return $this->dtCadFim;
    }

    public function setDtCadFim(?\DateTimeInterface $dtCadFim): self
    {
        $this->dtCadFim = $dtCadFim;
        return $this;
    }

    public function getDtProvaInicio(): ?\DateTimeInterface
    {
        return $this->dtProvaInicio;
    }

    public function setDtProvaInicio(?\DateTimeInterface $dtProvaInicio): self
    {
        $this->dtProvaInicio = $dtProvaInicio;
        return $this;
    }

    public function getDtProvaFim(): ?\DateTimeInterface
    {
        return $this->dtProvaFim;
    }

    public function setDtProvaFim(?\DateTimeInterface $dtProvaFim): self
    {
        $this->dtProvaFim = $dtProvaFim;
        return $this;
    }

    public function getNrDuracao(): ?int
    {
        return $this->nrDuracao;
    }

    public function setNrDuracao(?int $nrDuracao): self
    {
        $this->nrDuracao = $nrDuracao;
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

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getCdAjuste(): ?int
    {
        return $this->cdAjuste;
    }

    public function setCdAjuste(?int $cdAjuste): self
    {
        $this->cdAjuste = $cdAjuste;
        return $this;
    }

    public function getNrEtapaAjuste(): ?int
    {
        return $this->nrEtapaAjuste;
    }

    public function setNrEtapaAjuste(?int $nrEtapaAjuste): self
    {
        $this->nrEtapaAjuste = $nrEtapaAjuste;
        return $this;
    }

    public function getVlPeso(): ?float
    {
        return $this->vlPeso;
    }

    public function setVlPeso(?float $vlPeso): self
    {
        $this->vlPeso = $vlPeso;
        return $this;
    }
}
