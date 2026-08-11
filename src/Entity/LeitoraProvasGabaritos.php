<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LeitoraProvasGabaritosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasGabaritosRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_gabaritos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_gabarito', columns: ['cd_prova_gabarito'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class LeitoraProvasGabaritos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_gabarito', type: 'integer')]
    private ?int $cdProvaGabarito = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['default' => '0'])]
    private int $cdProva = 0;

    #[ORM\Column(name: 'ds_nome_gabarito', type: 'string', length: 15, nullable: true)]
    private ?string $dsNomeGabarito = null;

    #[ORM\Column(name: 'cd_prova_gabarito_proximo', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaGabaritoProximo = 0;

    public function __construct(
        int $cdProva = 0,
        ?string $dsNomeGabarito = null,
        int $cdProvaGabaritoProximo = 0
    ) {
        $this->cdProva = $cdProva;
        $this->dsNomeGabarito = $dsNomeGabarito;
        $this->cdProvaGabaritoProximo = $cdProvaGabaritoProximo;
    }

    public function getCdProvaGabarito(): ?int
    {
        return $this->cdProvaGabarito;
    }

    public function getCdProva(): int
    {
        return $this->cdProva;
    }

    public function setCdProva(int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getDsNomeGabarito(): ?string
    {
        return $this->dsNomeGabarito;
    }

    public function setDsNomeGabarito(?string $dsNomeGabarito): self
    {
        $this->dsNomeGabarito = $dsNomeGabarito;
        return $this;
    }

    public function getCdProvaGabaritoProximo(): int
    {
        return $this->cdProvaGabaritoProximo;
    }

    public function setCdProvaGabaritoProximo(int $cdProvaGabaritoProximo): self
    {
        $this->cdProvaGabaritoProximo = $cdProvaGabaritoProximo;
        return $this;
    }
}
