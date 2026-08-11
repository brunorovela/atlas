<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CapInscricaoLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapInscricaoLogRepository::class)]
#[ORM\Table(
    name: 'cap_inscricao_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class CapInscricaoLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_inscricao', type: 'integer')]
    private ?int $cdInscricao = null;

    #[ORM\Column(name: 'enum_tipo_log', type: 'enum', nullable: true, options: ['values' => ['MUDANCA_DE_ETAPA']])]
    private ?string $enumTipoLog = null;

    #[ORM\Column(name: 'me_json_log', type: 'text', length: 65535, nullable: true)]
    private ?string $meJsonLog = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtLog = null;

    public function __construct(
        ?int $cdInscricao = null,
        ?string $enumTipoLog = null,
        ?string $meJsonLog = null,
        ?\DateTimeInterface $dtLog = null
    ) {
        $this->cdInscricao = $cdInscricao;
        $this->enumTipoLog = $enumTipoLog;
        $this->meJsonLog = $meJsonLog;
        $this->dtLog = $dtLog;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?int $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }

    public function getEnumTipoLog(): ?string
    {
        return $this->enumTipoLog;
    }

    public function setEnumTipoLog(?string $enumTipoLog): self
    {
        $this->enumTipoLog = $enumTipoLog;
        return $this;
    }

    public function getMeJsonLog(): ?string
    {
        return $this->meJsonLog;
    }

    public function setMeJsonLog(?string $meJsonLog): self
    {
        $this->meJsonLog = $meJsonLog;
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
