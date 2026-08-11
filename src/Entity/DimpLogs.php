<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DimpLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DimpLogsRepository::class)]
#[ORM\Table(
    name: 'dimp_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DimpLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'dt_impressao', type: 'datetime')]
    private ?\DateTimeInterface $dtImpressao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    public function __construct(
        ?int $cdDocumento = null,
        ?\DateTimeInterface $dtImpressao = null,
        ?int $cdPessoa = null,
        ?int $cdUsuario = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->dtImpressao = $dtImpressao;
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getDtImpressao(): ?\DateTimeInterface
    {
        return $this->dtImpressao;
    }

    public function setDtImpressao(?\DateTimeInterface $dtImpressao): self
    {
        $this->dtImpressao = $dtImpressao;
        return $this;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }
}
