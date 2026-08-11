<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoMensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoMensalidadesRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_mensalidades_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_mensalidades_pk', columns: ['nossonumero'])]
#[ORM\Index(name: 'idx_app_integracao_mensalidades_cd_mensalidade', columns: ['cd_mensalidade'])]
class AppIntegracaoDadoMensalidades
{
    #[ORM\Id]
    #[ORM\Column(name: 'nossonumero', type: 'string', length: 30)]
    private ?string $nossonumero = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?string $nossonumero = null,
        ?int $cdMensalidade = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->nossonumero = $nossonumero;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getNossonumero(): ?string
    {
        return $this->nossonumero;
    }

    public function setNossonumero(?string $nossonumero): self
    {
        $this->nossonumero = $nossonumero;
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
