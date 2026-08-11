<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UnimDocumentoDigitalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimDocumentoDigitalRepository::class)]
#[ORM\Table(
    name: 'unim_documento_digital',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimDocumentoDigital
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_digital', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoDigital = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nm_tabela_origem', type: 'string', length: 64)]
    private ?string $nmTabelaOrigem = null;

    #[ORM\Column(name: 'cd_codigo_origem', type: 'string', length: 20)]
    private ?string $cdCodigoOrigem = null;

    #[ORM\Column(name: 'ds_info', type: 'text', length: 65535, nullable: true)]
    private ?string $dsInfo = null;

    #[ORM\Column(name: 'ds_codigo_documento', type: 'string', length: 255, nullable: true, options: ['fixed' => true])]
    private ?string $dsCodigoDocumento = null;

    #[ORM\Column(name: 'nr_status', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $nrStatus = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $nmTabelaOrigem = null,
        ?string $cdCodigoOrigem = null,
        ?string $dsInfo = null,
        ?string $dsCodigoDocumento = null,
        int $nrStatus = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nmTabelaOrigem = $nmTabelaOrigem;
        $this->cdCodigoOrigem = $cdCodigoOrigem;
        $this->dsInfo = $dsInfo;
        $this->dsCodigoDocumento = $dsCodigoDocumento;
        $this->nrStatus = $nrStatus;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumentoDigital(): ?int
    {
        return $this->cdDocumentoDigital;
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

    public function getNmTabelaOrigem(): ?string
    {
        return $this->nmTabelaOrigem;
    }

    public function setNmTabelaOrigem(?string $nmTabelaOrigem): self
    {
        $this->nmTabelaOrigem = $nmTabelaOrigem;
        return $this;
    }

    public function getCdCodigoOrigem(): ?string
    {
        return $this->cdCodigoOrigem;
    }

    public function setCdCodigoOrigem(?string $cdCodigoOrigem): self
    {
        $this->cdCodigoOrigem = $cdCodigoOrigem;
        return $this;
    }

    public function getDsInfo(): ?string
    {
        return $this->dsInfo;
    }

    public function setDsInfo(?string $dsInfo): self
    {
        $this->dsInfo = $dsInfo;
        return $this;
    }

    public function getDsCodigoDocumento(): ?string
    {
        return $this->dsCodigoDocumento;
    }

    public function setDsCodigoDocumento(?string $dsCodigoDocumento): self
    {
        $this->dsCodigoDocumento = $dsCodigoDocumento;
        return $this;
    }

    public function getNrStatus(): int
    {
        return $this->nrStatus;
    }

    public function setNrStatus(int $nrStatus): self
    {
        $this->nrStatus = $nrStatus;
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
