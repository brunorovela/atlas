<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FuncionariosCursosNdeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuncionariosCursosNdeRepository::class)]
#[ORM\Table(
    name: 'funcionarios_cursos_nde',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
class FuncionariosCursosNde
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_admissao', type: 'integer')]
    private ?int $cdAdmissao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'sn_membro_nde', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snMembroNde = false;

    #[ORM\Column(name: 'sn_coordenacao_nde', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCoordenacaoNde = false;

    public function __construct(
        ?int $cdAdmissao = null,
        ?string $cdCurso = null,
        ?bool $snMembroNde = false,
        ?bool $snCoordenacaoNde = false
    ) {
        $this->cdAdmissao = $cdAdmissao;
        $this->cdCurso = $cdCurso;
        $this->snMembroNde = $snMembroNde;
        $this->snCoordenacaoNde = $snCoordenacaoNde;
    }

    public function getCdAdmissao(): ?int
    {
        return $this->cdAdmissao;
    }

    public function setCdAdmissao(?int $cdAdmissao): self
    {
        $this->cdAdmissao = $cdAdmissao;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function isSnMembroNde(): ?bool
    {
        return $this->snMembroNde;
    }

    public function setSnMembroNde(?bool $snMembroNde): self
    {
        $this->snMembroNde = $snMembroNde;
        return $this;
    }

    public function isSnCoordenacaoNde(): ?bool
    {
        return $this->snCoordenacaoNde;
    }

    public function setSnCoordenacaoNde(?bool $snCoordenacaoNde): self
    {
        $this->snCoordenacaoNde = $snCoordenacaoNde;
        return $this;
    }
}
