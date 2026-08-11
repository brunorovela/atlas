<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncMensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncMensalidadesRepository::class)]
#[ORM\Table(
    name: 'estnc_mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
class EstncMensalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_estnc_mensalidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstncMensalidade = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?int $cdTitulo = null,
        ?int $cdMensalidade = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdEstncMensalidade(): ?int
    {
        return $this->cdEstncMensalidade;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
