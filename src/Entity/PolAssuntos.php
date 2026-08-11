<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolAssuntosRepository::class)]
#[ORM\Table(
    name: 'pol_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL', columns: ['cd_responsavel'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
class PolAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_assunto', type: 'integer')]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true)]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255, nullable: true)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'cd_categoria_disciplina', type: 'integer', nullable: true)]
    private ?int $cdCategoriaDisciplina = null;

    #[ORM\Column(name: 'sn_prova_presencial', type: 'smallint', options: ['default' => '0'])]
    private int $snProvaPresencial = 0;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    public function __construct(
        ?int $cdResponsavel = null,
        ?string $cdDisciplinaPai = null,
        ?string $dsAssunto = null,
        ?int $cdCategoriaDisciplina = null,
        int $snProvaPresencial = 0,
        ?bool $snAtivo = true
    ) {
        $this->cdResponsavel = $cdResponsavel;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->dsAssunto = $dsAssunto;
        $this->cdCategoriaDisciplina = $cdCategoriaDisciplina;
        $this->snProvaPresencial = $snProvaPresencial;
        $this->snAtivo = $snAtivo;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getCdCategoriaDisciplina(): ?int
    {
        return $this->cdCategoriaDisciplina;
    }

    public function setCdCategoriaDisciplina(?int $cdCategoriaDisciplina): self
    {
        $this->cdCategoriaDisciplina = $cdCategoriaDisciplina;
        return $this;
    }

    public function getSnProvaPresencial(): int
    {
        return $this->snProvaPresencial;
    }

    public function setSnProvaPresencial(int $snProvaPresencial): self
    {
        $this->snProvaPresencial = $snProvaPresencial;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
