<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuGruposPermissoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposPermissoesRepository::class)]
#[ORM\Table(
    name: 'nu_grupos_permissoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_permissao', columns: ['cd_permissao'])]
#[ORM\UniqueConstraint(name: 'IDX_UNICO', columns: ['cd_grupo', 'cd_acao'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
class NuGruposPermissoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_permissao', type: 'integer')]
    private ?int $cdPermissao = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'cd_acao', type: 'integer', options: ['default' => '0'])]
    private int $cdAcao = 0;

    #[ORM\Column(name: 'nr_permissao', type: 'integer', options: ['default' => '0'])]
    private int $nrPermissao = 0;

    public function __construct(
        int $cdGrupo = 0,
        int $cdAcao = 0,
        int $nrPermissao = 0
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdAcao = $cdAcao;
        $this->nrPermissao = $nrPermissao;
    }

    public function getCdPermissao(): ?int
    {
        return $this->cdPermissao;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdAcao(): int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getNrPermissao(): int
    {
        return $this->nrPermissao;
    }

    public function setNrPermissao(int $nrPermissao): self
    {
        $this->nrPermissao = $nrPermissao;
        return $this;
    }
}
