<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgvtApiIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtApiIntegracaoRepository::class)]
#[ORM\Table(
    name: 'agvt_api_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_API', columns: ['cd_api'])]
#[ORM\Index(name: 'IX_DS_HASH_MD5', columns: ['ds_hash_md5'])]
class AgvtApiIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'cd_api', type: 'integer')]
    private ?int $cdApi = null;

    #[ORM\Column(name: 'ds_hash', type: 'string', length: 255, nullable: true)]
    private ?string $dsHash = null;

    #[ORM\Column(name: 'ds_hash_md5', type: 'string', length: 255, nullable: true)]
    private ?string $dsHashMd5 = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_integracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIntegracao = null;

    #[ORM\Column(name: 'dt_consumo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtConsumo = null;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', nullable: true)]
    private ?bool $snExcluido = null;

    #[ORM\Column(name: 'sn_consumido', type: 'boolean', nullable: true)]
    private ?bool $snConsumido = null;

    #[ORM\Column(name: 'sn_sucesso', type: 'boolean', nullable: true)]
    private ?bool $snSucesso = null;

    #[ORM\Column(name: 'me_log', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLog = null;

    public function __construct(
        ?int $cdApi = null,
        ?string $dsHash = null,
        ?string $dsHashMd5 = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtIntegracao = null,
        ?\DateTimeInterface $dtConsumo = null,
        ?bool $snExcluido = null,
        ?bool $snConsumido = null,
        ?bool $snSucesso = null,
        ?string $meLog = null
    ) {
        $this->cdApi = $cdApi;
        $this->dsHash = $dsHash;
        $this->dsHashMd5 = $dsHashMd5;
        $this->dsChave = $dsChave;
        $this->dtIntegracao = $dtIntegracao;
        $this->dtConsumo = $dtConsumo;
        $this->snExcluido = $snExcluido;
        $this->snConsumido = $snConsumido;
        $this->snSucesso = $snSucesso;
        $this->meLog = $meLog;
    }

    public function getCdIntegracao(): ?int
    {
        return $this->cdIntegracao;
    }

    public function getCdApi(): ?int
    {
        return $this->cdApi;
    }

    public function setCdApi(?int $cdApi): self
    {
        $this->cdApi = $cdApi;
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

    public function getDsHashMd5(): ?string
    {
        return $this->dsHashMd5;
    }

    public function setDsHashMd5(?string $dsHashMd5): self
    {
        $this->dsHashMd5 = $dsHashMd5;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDtIntegracao(): ?\DateTimeInterface
    {
        return $this->dtIntegracao;
    }

    public function setDtIntegracao(?\DateTimeInterface $dtIntegracao): self
    {
        $this->dtIntegracao = $dtIntegracao;
        return $this;
    }

    public function getDtConsumo(): ?\DateTimeInterface
    {
        return $this->dtConsumo;
    }

    public function setDtConsumo(?\DateTimeInterface $dtConsumo): self
    {
        $this->dtConsumo = $dtConsumo;
        return $this;
    }

    public function isSnExcluido(): ?bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }

    public function isSnConsumido(): ?bool
    {
        return $this->snConsumido;
    }

    public function setSnConsumido(?bool $snConsumido): self
    {
        $this->snConsumido = $snConsumido;
        return $this;
    }

    public function isSnSucesso(): ?bool
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(?bool $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
        return $this;
    }

    public function getMeLog(): ?string
    {
        return $this->meLog;
    }

    public function setMeLog(?string $meLog): self
    {
        $this->meLog = $meLog;
        return $this;
    }
}
