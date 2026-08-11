<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ItauBoletoLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItauBoletoLogsRepository::class)]
#[ORM\Table(
    name: 'itau_boleto_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ix_itau_boleto_logs_nossonumero_md5_log', columns: ['nr_nossonumero', 'ds_md5_log'])]
class ItauBoletoLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'nr_nossonumero', type: 'string', length: 50)]
    private ?string $nrNossonumero = null;

    #[ORM\Column(name: 'ds_md5_log', type: 'string', length: 32)]
    private ?string $dsMd5Log = null;

    #[ORM\Column(name: 'ds_json_log', type: 'text', length: 65535)]
    private ?string $dsJsonLog = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $nrNossonumero = null,
        ?string $dsMd5Log = null,
        ?string $dsJsonLog = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->nrNossonumero = $nrNossonumero;
        $this->dsMd5Log = $dsMd5Log;
        $this->dsJsonLog = $dsJsonLog;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNrNossonumero(): ?string
    {
        return $this->nrNossonumero;
    }

    public function setNrNossonumero(?string $nrNossonumero): self
    {
        $this->nrNossonumero = $nrNossonumero;
        return $this;
    }

    public function getDsMd5Log(): ?string
    {
        return $this->dsMd5Log;
    }

    public function setDsMd5Log(?string $dsMd5Log): self
    {
        $this->dsMd5Log = $dsMd5Log;
        return $this;
    }

    public function getDsJsonLog(): ?string
    {
        return $this->dsJsonLog;
    }

    public function setDsJsonLog(?string $dsJsonLog): self
    {
        $this->dsJsonLog = $dsJsonLog;
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
