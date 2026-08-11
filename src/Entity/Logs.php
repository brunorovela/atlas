<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsRepository::class)]
#[ORM\Table(
    name: 'logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_LOG', columns: ['dt_log'])]
#[ORM\Index(name: 'IX_CD_CHAVE', columns: ['cd_chave'], options: ['lengths' => [20]])]
class Logs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'bigint')]
    private ?string $cdLog = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'ds_log', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsLog = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdTipo = 0;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 100, nullable: true)]
    private ?string $cdChave = null;

    public function __construct(
        ?\DateTimeInterface $dtLog = null,
        ?string $dsLog = null,
        ?int $cdTipo = 0,
        ?int $cdUsuario = null,
        ?string $cdChave = null
    ) {
        $this->dtLog = $dtLog;
        $this->dsLog = $dsLog;
        $this->cdTipo = $cdTipo;
        $this->cdUsuario = $cdUsuario;
        $this->cdChave = $cdChave;
    }

    public function getCdLog(): ?string
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

    public function getDsLog(): ?string
    {
        return $this->dsLog;
    }

    public function setDsLog(?string $dsLog): self
    {
        $this->dsLog = $dsLog;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
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

    public function getCdChave(): ?string
    {
        return $this->cdChave;
    }

    public function setCdChave(?string $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }
}
