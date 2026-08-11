<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DisciplinasTiposReqRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasTiposReqRepository::class)]
#[ORM\Table(
    name: 'disciplinas_tipos_req',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_tipo_req', columns: ['ds_tipo_req'])]
class DisciplinasTiposReq
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_req', type: 'integer')]
    private ?int $cdTipoReq = null;

    #[ORM\Column(name: 'ds_tipo_req', type: 'string', length: 100)]
    private ?string $dsTipoReq = null;

    #[ORM\Column(name: 'me_tipo_sql', type: 'text', length: 16777215)]
    private ?string $meTipoSql = null;

    public function __construct(
        ?string $dsTipoReq = null,
        ?string $meTipoSql = null
    ) {
        $this->dsTipoReq = $dsTipoReq;
        $this->meTipoSql = $meTipoSql;
    }

    public function getCdTipoReq(): ?int
    {
        return $this->cdTipoReq;
    }

    public function getDsTipoReq(): ?string
    {
        return $this->dsTipoReq;
    }

    public function setDsTipoReq(?string $dsTipoReq): self
    {
        $this->dsTipoReq = $dsTipoReq;
        return $this;
    }

    public function getMeTipoSql(): ?string
    {
        return $this->meTipoSql;
    }

    public function setMeTipoSql(?string $meTipoSql): self
    {
        $this->meTipoSql = $meTipoSql;
        return $this;
    }
}
