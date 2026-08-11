<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvaPastasPermissoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaPastasPermissoesRepository::class)]
#[ORM\Table(
    name: 'ava_pastas_permissoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'pastas_permissoes_uniques', columns: ['cd_grupo', 'cd_pasta'])]
#[ORM\Index(name: 'IX_CD_PASTA', columns: ['cd_pasta'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class AvaPastasPermissoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ava_permissao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAvaPermissao = null;

    #[ORM\Column(name: 'cd_pasta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPasta = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'ds_filtro', type: 'text', length: 16777215)]
    private ?string $dsFiltro = null;

    public function __construct(
        ?int $cdPasta = null,
        ?int $cdGrupo = null,
        ?string $dsFiltro = null
    ) {
        $this->cdPasta = $cdPasta;
        $this->cdGrupo = $cdGrupo;
        $this->dsFiltro = $dsFiltro;
    }

    public function getCdAvaPermissao(): ?int
    {
        return $this->cdAvaPermissao;
    }

    public function getCdPasta(): ?int
    {
        return $this->cdPasta;
    }

    public function setCdPasta(?int $cdPasta): self
    {
        $this->cdPasta = $cdPasta;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }
}
