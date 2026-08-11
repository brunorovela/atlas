<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuMenusDinamicoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuMenusDinamicoRepository::class)]
#[ORM\Table(
    name: 'nu_menus_dinamico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Armazenar o conteudo das paginas dinamicas da nu_menu']
)]
class NuMenusDinamico
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_menu_dinamico', type: 'integer')]
    private ?int $cdMenuDinamico = null;

    #[ORM\Column(name: 'ds_texto', type: 'string', length: 255, nullable: true)]
    private ?string $dsTexto = null;

    #[ORM\Column(name: 'me_conteudo', type: 'text', length: 16777215, nullable: true)]
    private ?string $meConteudo = null;

    public function __construct(
        ?string $dsTexto = null,
        ?string $meConteudo = null
    ) {
        $this->dsTexto = $dsTexto;
        $this->meConteudo = $meConteudo;
    }

    public function getCdMenuDinamico(): ?int
    {
        return $this->cdMenuDinamico;
    }

    public function getDsTexto(): ?string
    {
        return $this->dsTexto;
    }

    public function setDsTexto(?string $dsTexto): self
    {
        $this->dsTexto = $dsTexto;
        return $this;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
        return $this;
    }
}
