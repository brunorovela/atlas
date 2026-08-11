<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoUnimAprTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoUnimAprTurmaRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_unim_apr_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_unim_apr_turma_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_unim_apr_turma_pk', columns: ['cd_app_perfil', 'cd_turma'])]
class AppIntegracaoDadoUnimAprTurma
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_app_perfil', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAppPerfil = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTurma = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdAppPerfil = null,
        ?int $cdTurma = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdAppPerfil = $cdAppPerfil;
        $this->cdTurma = $cdTurma;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
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

    public function getCdTurma(): ?int
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?int $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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
