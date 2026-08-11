<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CensoQuadroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CensoQuadroRepository::class)]
#[ORM\Table(
    name: 'censo_quadro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CensoQuadro
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_quadro', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdQuadro = 0;

    #[ORM\Column(name: 'ds_quadro', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsQuadro = null;

    #[ORM\Column(name: 'sn_instituicao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snInstituicao = 'N';

    #[ORM\Column(name: 'sn_curso', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snCurso = 'N';

    #[ORM\Column(name: 'sn_habilitacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snHabilitacao = 'N';

    #[ORM\Column(name: 'sn_grau', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snGrau = 'N';

    public function __construct(
        int $cdQuadro = 0,
        ?string $dsQuadro = null,
        ?string $snInstituicao = 'N',
        ?string $snCurso = 'N',
        ?string $snHabilitacao = 'N',
        ?string $snGrau = 'N'
    ) {
        $this->cdQuadro = $cdQuadro;
        $this->dsQuadro = $dsQuadro;
        $this->snInstituicao = $snInstituicao;
        $this->snCurso = $snCurso;
        $this->snHabilitacao = $snHabilitacao;
        $this->snGrau = $snGrau;
    }

    public function getCdQuadro(): int
    {
        return $this->cdQuadro;
    }

    public function setCdQuadro(int $cdQuadro): self
    {
        $this->cdQuadro = $cdQuadro;
        return $this;
    }

    public function getDsQuadro(): ?string
    {
        return $this->dsQuadro;
    }

    public function setDsQuadro(?string $dsQuadro): self
    {
        $this->dsQuadro = $dsQuadro;
        return $this;
    }

    public function getSnInstituicao(): ?string
    {
        return $this->snInstituicao;
    }

    public function setSnInstituicao(?string $snInstituicao): self
    {
        $this->snInstituicao = $snInstituicao;
        return $this;
    }

    public function getSnCurso(): ?string
    {
        return $this->snCurso;
    }

    public function setSnCurso(?string $snCurso): self
    {
        $this->snCurso = $snCurso;
        return $this;
    }

    public function getSnHabilitacao(): ?string
    {
        return $this->snHabilitacao;
    }

    public function setSnHabilitacao(?string $snHabilitacao): self
    {
        $this->snHabilitacao = $snHabilitacao;
        return $this;
    }

    public function getSnGrau(): ?string
    {
        return $this->snGrau;
    }

    public function setSnGrau(?string $snGrau): self
    {
        $this->snGrau = $snGrau;
        return $this;
    }
}
