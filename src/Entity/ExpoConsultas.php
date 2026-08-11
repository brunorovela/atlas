<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExpoConsultasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoConsultasRepository::class)]
#[ORM\Table(
    name: 'expo_consultas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['nm_consulta'])]
class ExpoConsultas
{
    #[ORM\Id]
    #[ORM\Column(name: 'nm_consulta', type: 'string', length: 50, options: ['default' => ''])]
    private string $nmConsulta = '';

    #[ORM\Column(name: 'ds_consulta', type: 'string', length: 255, nullable: true)]
    private ?string $dsConsulta = null;

    #[ORM\Column(name: 'me_sql', type: 'blob', length: 65535, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', nullable: true)]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    public function __construct(
        string $nmConsulta = '',
        ?string $dsConsulta = null,
        ?string $meSql = null,
        ?int $cdCategoria = null,
        ?int $snAtivo = 1
    ) {
        $this->nmConsulta = $nmConsulta;
        $this->dsConsulta = $dsConsulta;
        $this->meSql = $meSql;
        $this->cdCategoria = $cdCategoria;
        $this->snAtivo = $snAtivo;
    }

    public function getNmConsulta(): string
    {
        return $this->nmConsulta;
    }

    public function setNmConsulta(string $nmConsulta): self
    {
        $this->nmConsulta = $nmConsulta;
        return $this;
    }

    public function getDsConsulta(): ?string
    {
        return $this->dsConsulta;
    }

    public function setDsConsulta(?string $dsConsulta): self
    {
        $this->dsConsulta = $dsConsulta;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
