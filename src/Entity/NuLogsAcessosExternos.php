<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuLogsAcessosExternosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuLogsAcessosExternosRepository::class)]
#[ORM\Table(
    name: 'nu_logs_acessos_externos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class NuLogsAcessosExternos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log_acesso', type: 'integer')]
    private ?int $cdLogAcesso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'tp_acesso', type: 'text', length: 16777215, nullable: true)]
    private ?string $tpAcesso = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $tpAcesso = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtLog = $dtLog;
        $this->tpAcesso = $tpAcesso;
    }

    public function getCdLogAcesso(): ?int
    {
        return $this->cdLogAcesso;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getTpAcesso(): ?string
    {
        return $this->tpAcesso;
    }

    public function setTpAcesso(?string $tpAcesso): self
    {
        $this->tpAcesso = $tpAcesso;
        return $this;
    }
}
