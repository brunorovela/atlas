<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoNuParametrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoNuParametrosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_nu_parametros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_nu_parametros_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_nu_parametros_pk', columns: ['cd_parametro'])]
class AppIntegracaoDadoNuParametros
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_parametro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdParametro = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdParametro = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdParametro = $cdParametro;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdParametro(): ?int
    {
        return $this->cdParametro;
    }

    public function setCdParametro(?int $cdParametro): self
    {
        $this->cdParametro = $cdParametro;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
