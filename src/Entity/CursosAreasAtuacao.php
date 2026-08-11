<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CursosAreasAtuacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosAreasAtuacaoRepository::class)]
#[ORM\Table(
    name: 'cursos_areas_atuacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CursosAreasAtuacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'ds_area', type: 'string', length: 255, nullable: true)]
    private ?string $dsArea = null;

    #[ORM\Column(name: 'me_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacoes = null;

    #[ORM\Column(name: 'sn_extracurricular', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snExtracurricular = 0;

    public function __construct(
        ?string $dsArea = null,
        ?string $meObservacoes = null,
        int $snExtracurricular = 0
    ) {
        $this->dsArea = $dsArea;
        $this->meObservacoes = $meObservacoes;
        $this->snExtracurricular = $snExtracurricular;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function getDsArea(): ?string
    {
        return $this->dsArea;
    }

    public function setDsArea(?string $dsArea): self
    {
        $this->dsArea = $dsArea;
        return $this;
    }

    public function getMeObservacoes(): ?string
    {
        return $this->meObservacoes;
    }

    public function setMeObservacoes(?string $meObservacoes): self
    {
        $this->meObservacoes = $meObservacoes;
        return $this;
    }

    public function getSnExtracurricular(): int
    {
        return $this->snExtracurricular;
    }

    public function setSnExtracurricular(int $snExtracurricular): self
    {
        $this->snExtracurricular = $snExtracurricular;
        return $this;
    }
}
