<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoFinanceiroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoFinanceiroRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_financeiro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_mensalidades_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_mensalidades_pk', columns: ['nossonumero'])]
#[ORM\Index(name: 'idx_app_integracao_mensalidades_cd_mensalidade', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'idx_hash', columns: ['ds_hash'])]
class AppIntegracaoDadoFinanceiro
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'nossonumero', type: 'string', length: 30)]
    private ?string $nossonumero = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    #[ORM\Column(name: 'ds_hash', type: 'string', length: 32, nullable: true)]
    private ?string $dsHash = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $nossonumero = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false,
        ?string $dsHash = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->nossonumero = $nossonumero;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
        $this->dsHash = $dsHash;
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

    public function getNossonumero(): ?string
    {
        return $this->nossonumero;
    }

    public function setNossonumero(?string $nossonumero): self
    {
        $this->nossonumero = $nossonumero;
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

    public function getDsHash(): ?string
    {
        return $this->dsHash;
    }

    public function setDsHash(?string $dsHash): self
    {
        $this->dsHash = $dsHash;
        return $this;
    }
}
