<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CenLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CenLogsRepository::class)]
#[ORM\Table(
    name: 'cen_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DS_LOG', columns: ['ds_log'], options: ['lengths' => [255]])]
class CenLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_log', type: 'text', length: 16777215)]
    private ?string $dsLog = null;

    #[ORM\Column(name: 'ds_log_resumo', type: 'text', length: 16777215)]
    private ?string $dsLogResumo = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsChave = null,
        ?string $dsLog = null,
        ?string $dsLogResumo = null,
        ?\DateTimeInterface $dtLog = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsChave = $dsChave;
        $this->dsLog = $dsLog;
        $this->dsLogResumo = $dsLogResumo;
        $this->dtLog = $dtLog;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsLog(): ?string
    {
        return $this->dsLog;
    }

    public function setDsLog(?string $dsLog): self
    {
        $this->dsLog = $dsLog;
        return $this;
    }

    public function getDsLogResumo(): ?string
    {
        return $this->dsLogResumo;
    }

    public function setDsLogResumo(?string $dsLogResumo): self
    {
        $this->dsLogResumo = $dsLogResumo;
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
}
