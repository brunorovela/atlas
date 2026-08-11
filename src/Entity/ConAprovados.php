<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConAprovadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConAprovadosRepository::class)]
#[ORM\Table(
    name: 'con_aprovados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_aprovado', columns: ['cd_aprovado'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_AREA', columns: ['cd_inscricao_area'])]
class ConAprovados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aprovado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAprovado = null;

    #[ORM\Column(name: 'cd_inscricao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricao = null;

    #[ORM\Column(name: 'cd_inscricao_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoArea = null;

    #[ORM\Column(name: 'sn_matriculado', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $snMatriculado = 0;

    public function __construct(
        ?int $cdInscricao = null,
        ?int $cdInscricaoArea = null,
        int $snMatriculado = 0
    ) {
        $this->cdInscricao = $cdInscricao;
        $this->cdInscricaoArea = $cdInscricaoArea;
        $this->snMatriculado = $snMatriculado;
    }

    public function getCdAprovado(): ?int
    {
        return $this->cdAprovado;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?int $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }

    public function getCdInscricaoArea(): ?int
    {
        return $this->cdInscricaoArea;
    }

    public function setCdInscricaoArea(?int $cdInscricaoArea): self
    {
        $this->cdInscricaoArea = $cdInscricaoArea;
        return $this;
    }

    public function getSnMatriculado(): int
    {
        return $this->snMatriculado;
    }

    public function setSnMatriculado(int $snMatriculado): self
    {
        $this->snMatriculado = $snMatriculado;
        return $this;
    }
}
