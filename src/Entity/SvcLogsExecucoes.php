<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SvcLogsExecucoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcLogsExecucoesRepository::class)]
#[ORM\Table(
    name: 'svc_logs_execucoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SvcLogsExecucoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_execucao', type: 'datetime')]
    private ?\DateTimeInterface $dtExecucao = null;

    public function __construct(
        ?string $dsChave = null,
        ?\DateTimeInterface $dtExecucao = null
    ) {
        $this->dsChave = $dsChave;
        $this->dtExecucao = $dtExecucao;
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

    public function getDtExecucao(): ?\DateTimeInterface
    {
        return $this->dtExecucao;
    }

    public function setDtExecucao(?\DateTimeInterface $dtExecucao): self
    {
        $this->dtExecucao = $dtExecucao;
        return $this;
    }
}
