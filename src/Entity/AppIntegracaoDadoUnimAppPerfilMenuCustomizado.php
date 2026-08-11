<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoUnimAppPerfilMenuCustomizadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoUnimAppPerfilMenuCustomizadoRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_unim_app_perfil_menu_customizado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_unim_app_perfil_menu_customizado_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_unim_app_perfil_menu_customizado_pk', columns: ['cd_app_perfil_menu_customizado', 'cd_app_perfil'])]
class AppIntegracaoDadoUnimAppPerfilMenuCustomizado
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_app_perfil_menu_customizado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAppPerfilMenuCustomizado = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_app_perfil', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAppPerfil = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdAppPerfilMenuCustomizado = null,
        ?int $cdAppPerfil = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdAppPerfilMenuCustomizado = $cdAppPerfilMenuCustomizado;
        $this->cdAppPerfil = $cdAppPerfil;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdAppPerfilMenuCustomizado(): ?int
    {
        return $this->cdAppPerfilMenuCustomizado;
    }

    public function setCdAppPerfilMenuCustomizado(?int $cdAppPerfilMenuCustomizado): self
    {
        $this->cdAppPerfilMenuCustomizado = $cdAppPerfilMenuCustomizado;
        return $this;
    }

    public function getCdAppPerfil(): ?int
    {
        return $this->cdAppPerfil;
    }

    public function setCdAppPerfil(?int $cdAppPerfil): self
    {
        $this->cdAppPerfil = $cdAppPerfil;
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
