<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimCursosDivulgacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimCursosDivulgacaoRepository::class)]
#[ORM\Table(
    name: 'unim_cursos_divulgacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class UnimCursosDivulgacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCurso = null;

    #[ORM\Column(name: 'nm_curso', type: 'string', length: 255, nullable: true)]
    private ?string $nmCurso = null;

    #[ORM\Column(name: 'ds_grau', type: 'string', length: 255, nullable: true)]
    private ?string $dsGrau = null;

    #[ORM\Column(name: 'ds_link', type: 'string', length: 255, nullable: true)]
    private ?string $dsLink = null;

    #[ORM\Column(name: 'me_imagem', type: 'blob', nullable: true)]
    private ?string $meImagem = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $nmCurso = null,
        ?string $dsGrau = null,
        ?string $dsLink = null,
        ?string $meImagem = null,
        ?int $nrOrdem = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nmCurso = $nmCurso;
        $this->dsGrau = $dsGrau;
        $this->dsLink = $dsLink;
        $this->meImagem = $meImagem;
        $this->nrOrdem = $nrOrdem;
        $this->dtBase = $dtBase;
    }

    public function getCdCurso(): ?int
    {
        return $this->cdCurso;
    }

    public function getNmCurso(): ?string
    {
        return $this->nmCurso;
    }

    public function setNmCurso(?string $nmCurso): self
    {
        $this->nmCurso = $nmCurso;
        return $this;
    }

    public function getDsGrau(): ?string
    {
        return $this->dsGrau;
    }

    public function setDsGrau(?string $dsGrau): self
    {
        $this->dsGrau = $dsGrau;
        return $this;
    }

    public function getDsLink(): ?string
    {
        return $this->dsLink;
    }

    public function setDsLink(?string $dsLink): self
    {
        $this->dsLink = $dsLink;
        return $this;
    }

    public function getMeImagem(): ?string
    {
        return $this->meImagem;
    }

    public function setMeImagem(?string $meImagem): self
    {
        $this->meImagem = $meImagem;
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
