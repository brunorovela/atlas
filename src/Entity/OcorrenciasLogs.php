<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasLogsRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_OCORRENCIA', columns: ['cd_ocorrencia'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
class OcorrenciasLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer')]
    private ?int $cdOcorrencia = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdOcorrencia = null,
        ?int $cdAcao = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $dsDescricao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->cdAcao = $cdAcao;
        $this->dtLog = $dtLog;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
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

    public function getCdOcorrencia(): ?int
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?int $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
