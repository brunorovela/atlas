<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuMenusAvaliacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuMenusAvaliacaoRepository::class)]
#[ORM\Table(
    name: 'nu_menus_avaliacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_menu_avaliacao', columns: ['cd_menu_avaliacao'])]
#[ORM\UniqueConstraint(name: 'idxMenu', columns: ['cd_pessoa', 'cd_menu'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MENU', columns: ['cd_menu'])]
#[ORM\Index(name: 'IX_CD_MENU_AVALIACAO', columns: ['cd_menu_avaliacao'])]
class NuMenusAvaliacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_menu_avaliacao', type: 'integer')]
    private ?int $cdMenuAvaliacao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_menu', type: 'integer')]
    private ?int $cdMenu = null;

    #[ORM\Column(name: 'nr_nota', type: 'integer', options: ['default' => '3'])]
    private int $nrNota = 3;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdMenu = null,
        int $nrNota = 3
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdMenu = $cdMenu;
        $this->nrNota = $nrNota;
    }

    public function getCdMenuAvaliacao(): ?int
    {
        return $this->cdMenuAvaliacao;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdMenu(): ?int
    {
        return $this->cdMenu;
    }

    public function setCdMenu(?int $cdMenu): self
    {
        $this->cdMenu = $cdMenu;
        return $this;
    }

    public function getNrNota(): int
    {
        return $this->nrNota;
    }

    public function setNrNota(int $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }
}
