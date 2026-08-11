<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinIndicadoresFavoritosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinIndicadoresFavoritosRepository::class)]
#[ORM\Table(
    name: 'fin_indicadores_favoritos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class FinIndicadoresFavoritos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_indicador_favorito', type: 'integer')]
    private ?int $cdIndicadorFavorito = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_indicadores', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsIndicadores = null;

    #[ORM\Column(name: 'sn_principal', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snPrincipal = false;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsTitulo = null,
        ?string $dsIndicadores = null,
        ?bool $snPrincipal = false
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsTitulo = $dsTitulo;
        $this->dsIndicadores = $dsIndicadores;
        $this->snPrincipal = $snPrincipal;
    }

    public function getCdIndicadorFavorito(): ?int
    {
        return $this->cdIndicadorFavorito;
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

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsIndicadores(): ?string
    {
        return $this->dsIndicadores;
    }

    public function setDsIndicadores(?string $dsIndicadores): self
    {
        $this->dsIndicadores = $dsIndicadores;
        return $this;
    }

    public function isSnPrincipal(): ?bool
    {
        return $this->snPrincipal;
    }

    public function setSnPrincipal(?bool $snPrincipal): self
    {
        $this->snPrincipal = $snPrincipal;
        return $this;
    }
}
