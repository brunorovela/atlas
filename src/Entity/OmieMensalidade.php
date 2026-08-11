<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieMensalidadeRepository::class)]
#[ORM\Table(
    name: 'omie_mensalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE_OMIE', columns: ['cd_mensalidade_omie'])]
#[ORM\Index(name: 'IX_OMIE_MENSALIDADE_INTEGRACAO', columns: ['cd_integracao_omie', 'cd_mensalidade'])]
#[ORM\Index(name: 'UK', columns: ['cd_mensalidade', 'cd_chave'])]
class OmieMensalidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_mensalidade', type: 'integer')]
    private ?int $cdOmieMensalidade = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint', nullable: true)]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 10, nullable: true)]
    private ?string $cdChave = null;

    #[ORM\Column(name: 'cd_mensalidade_omie', type: 'bigint')]
    private ?string $cdMensalidadeOmie = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?int $cdMensalidade = null,
        ?string $cdChave = null,
        ?string $cdMensalidadeOmie = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->cdMensalidade = $cdMensalidade;
        $this->cdChave = $cdChave;
        $this->cdMensalidadeOmie = $cdMensalidadeOmie;
        $this->dtBase = $dtBase;
    }

    public function getCdOmieMensalidade(): ?int
    {
        return $this->cdOmieMensalidade;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
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

    public function getCdChave(): ?string
    {
        return $this->cdChave;
    }

    public function setCdChave(?string $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getCdMensalidadeOmie(): ?string
    {
        return $this->cdMensalidadeOmie;
    }

    public function setCdMensalidadeOmie(?string $cdMensalidadeOmie): self
    {
        $this->cdMensalidadeOmie = $cdMensalidadeOmie;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
