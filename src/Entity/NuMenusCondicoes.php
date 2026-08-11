<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuMenusCondicoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuMenusCondicoesRepository::class)]
#[ORM\Table(
    name: 'nu_menus_condicoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuMenusCondicoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_menu_condicao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMenuCondicao = null;

    #[ORM\Column(name: 'ds_menu_condicao', type: 'string', length: 255, options: ['default' => '0'])]
    private string $dsMenuCondicao = '0';

    #[ORM\Column(name: 'me_menu_condicao', type: 'text', length: 16777215)]
    private ?string $meMenuCondicao = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 16777215)]
    private ?string $meSql = null;

    public function __construct(
        string $dsMenuCondicao = '0',
        ?string $meMenuCondicao = null,
        ?string $meSql = null
    ) {
        $this->dsMenuCondicao = $dsMenuCondicao;
        $this->meMenuCondicao = $meMenuCondicao;
        $this->meSql = $meSql;
    }

    public function getCdMenuCondicao(): ?int
    {
        return $this->cdMenuCondicao;
    }

    public function getDsMenuCondicao(): string
    {
        return $this->dsMenuCondicao;
    }

    public function setDsMenuCondicao(string $dsMenuCondicao): self
    {
        $this->dsMenuCondicao = $dsMenuCondicao;
        return $this;
    }

    public function getMeMenuCondicao(): ?string
    {
        return $this->meMenuCondicao;
    }

    public function setMeMenuCondicao(?string $meMenuCondicao): self
    {
        $this->meMenuCondicao = $meMenuCondicao;
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
}
