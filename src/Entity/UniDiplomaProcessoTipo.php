<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniDiplomaProcessoTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoTipoRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave_diploma_processo_tipo'])]
class UniDiplomaProcessoTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diploma_processo_tipo', type: 'integer')]
    private ?int $cdDiplomaProcessoTipo = null;

    #[ORM\Column(name: 'ds_diploma_processo_tipo', type: 'string', length: 50, nullable: true)]
    private ?string $dsDiplomaProcessoTipo = null;

    #[ORM\Column(name: 'ds_chave_diploma_processo_tipo', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveDiplomaProcessoTipo = null;

    public function __construct(
        ?string $dsDiplomaProcessoTipo = null,
        ?string $dsChaveDiplomaProcessoTipo = null
    ) {
        $this->dsDiplomaProcessoTipo = $dsDiplomaProcessoTipo;
        $this->dsChaveDiplomaProcessoTipo = $dsChaveDiplomaProcessoTipo;
    }

    public function getCdDiplomaProcessoTipo(): ?int
    {
        return $this->cdDiplomaProcessoTipo;
    }

    public function getDsDiplomaProcessoTipo(): ?string
    {
        return $this->dsDiplomaProcessoTipo;
    }

    public function setDsDiplomaProcessoTipo(?string $dsDiplomaProcessoTipo): self
    {
        $this->dsDiplomaProcessoTipo = $dsDiplomaProcessoTipo;
        return $this;
    }

    public function getDsChaveDiplomaProcessoTipo(): ?string
    {
        return $this->dsChaveDiplomaProcessoTipo;
    }

    public function setDsChaveDiplomaProcessoTipo(?string $dsChaveDiplomaProcessoTipo): self
    {
        $this->dsChaveDiplomaProcessoTipo = $dsChaveDiplomaProcessoTipo;
        return $this;
    }
}
