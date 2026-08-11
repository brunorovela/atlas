<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasLogsRepository::class)]
#[ORM\Table(
    name: 'monografias_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CHAVE', columns: ['cd_chave'])]
class MonografiasLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'dt_log', type: 'date')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 255)]
    private ?string $cdChave = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215)]
    private ?string $dsObservacao = null;

    public function __construct(
        ?\DateTimeInterface $dtLog = null,
        ?int $cdPessoa = null,
        ?string $cdChave = null,
        ?string $dsObservacao = null
    ) {
        $this->dtLog = $dtLog;
        $this->cdPessoa = $cdPessoa;
        $this->cdChave = $cdChave;
        $this->dsObservacao = $dsObservacao;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
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

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}
