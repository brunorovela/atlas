<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AcrvLogAcaoDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvLogAcaoDocumentoRepository::class)]
#[ORM\Table(
    name: 'acrv_log_acao_documento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AcrvLogAcaoDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log_acao_documento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLogAcaoDocumento = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_documento_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDocumentoPessoa = null;

    #[ORM\Column(name: 'ds_ip', type: 'string', length: 255, nullable: true)]
    private ?string $dsIp = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 255, nullable: true)]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdDocumentoPessoa = null,
        ?string $dsIp = null,
        ?string $dsAcao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        $this->dsIp = $dsIp;
        $this->dsAcao = $dsAcao;
        $this->dtBase = $dtBase;
    }

    public function getCdLogAcaoDocumento(): ?int
    {
        return $this->cdLogAcaoDocumento;
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

    public function getCdDocumentoPessoa(): ?int
    {
        return $this->cdDocumentoPessoa;
    }

    public function setCdDocumentoPessoa(?int $cdDocumentoPessoa): self
    {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        return $this;
    }

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
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
