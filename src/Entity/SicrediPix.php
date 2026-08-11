<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SicrediPixRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SicrediPixRepository::class)]
#[ORM\Table(
    name: 'sicredi_pix',
    options: ['charset' => 'utf8mb3', 'collation' => 'utf8mb3_general_ci']
)]
class SicrediPix
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_sicredi_conta_configuracao', type: 'integer', nullable: true)]
    private ?int $cdSicrediContaConfiguracao = null;

    #[ORM\Column(name: 'ds_txid', type: 'string', length: 50, nullable: true)]
    private ?string $dsTxid = null;

    #[ORM\Column(name: 'ds_chave_evp', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveEvp = null;

    #[ORM\Column(name: 'ds_pix_copia_e_cola', type: 'string', length: 255, nullable: true)]
    private ?string $dsPixCopiaECola = null;

    public function __construct(
        ?int $cdSicrediContaConfiguracao = null,
        ?string $dsTxid = null,
        ?string $dsChaveEvp = null,
        ?string $dsPixCopiaECola = null
    ) {
        $this->cdSicrediContaConfiguracao = $cdSicrediContaConfiguracao;
        $this->dsTxid = $dsTxid;
        $this->dsChaveEvp = $dsChaveEvp;
        $this->dsPixCopiaECola = $dsPixCopiaECola;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdSicrediContaConfiguracao(): ?int
    {
        return $this->cdSicrediContaConfiguracao;
    }

    public function setCdSicrediContaConfiguracao(?int $cdSicrediContaConfiguracao): self
    {
        $this->cdSicrediContaConfiguracao = $cdSicrediContaConfiguracao;
        return $this;
    }

    public function getDsTxid(): ?string
    {
        return $this->dsTxid;
    }

    public function setDsTxid(?string $dsTxid): self
    {
        $this->dsTxid = $dsTxid;
        return $this;
    }

    public function getDsChaveEvp(): ?string
    {
        return $this->dsChaveEvp;
    }

    public function setDsChaveEvp(?string $dsChaveEvp): self
    {
        $this->dsChaveEvp = $dsChaveEvp;
        return $this;
    }

    public function getDsPixCopiaECola(): ?string
    {
        return $this->dsPixCopiaECola;
    }

    public function setDsPixCopiaECola(?string $dsPixCopiaECola): self
    {
        $this->dsPixCopiaECola = $dsPixCopiaECola;
        return $this;
    }
}
