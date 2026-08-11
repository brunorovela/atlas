<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgvtApiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtApiRepository::class)]
#[ORM\Table(
    name: 'agvt_api',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
class AgvtApi
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_api', type: 'integer')]
    private ?int $cdApi = null;

    #[ORM\Column(name: 'ds_api', type: 'string', length: 255, nullable: true)]
    private ?string $dsApi = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_hash', type: 'string', length: 255, nullable: true)]
    private ?string $dsHash = null;

    #[ORM\Column(name: 'ds_mensagem', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMensagem = null;

    public function __construct(
        ?string $dsApi = null,
        ?string $dsChave = null,
        ?string $dsHash = null,
        ?string $dsMensagem = null
    ) {
        $this->dsApi = $dsApi;
        $this->dsChave = $dsChave;
        $this->dsHash = $dsHash;
        $this->dsMensagem = $dsMensagem;
    }

    public function getCdApi(): ?int
    {
        return $this->cdApi;
    }

    public function getDsApi(): ?string
    {
        return $this->dsApi;
    }

    public function setDsApi(?string $dsApi): self
    {
        $this->dsApi = $dsApi;
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

    public function getDsHash(): ?string
    {
        return $this->dsHash;
    }

    public function setDsHash(?string $dsHash): self
    {
        $this->dsHash = $dsHash;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }
}
