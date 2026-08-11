<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BackupHistoricoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BackupHistoricoRepository::class)]
#[ORM\Table(
    name: 'backup_historico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BackupHistorico
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_backup', type: 'integer')]
    private ?int $cdBackup = null;

    #[ORM\Column(name: 'dt_data_inicio', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtDataInicio = null;

    #[ORM\Column(name: 'dt_data_fim', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtDataFim = null;

    #[ORM\Column(name: 'nr_hora_inicio', type: 'time', nullable: true)]
    private ?\DateTimeInterface $nrHoraInicio = null;

    #[ORM\Column(name: 'nr_hora_fim', type: 'time', nullable: true)]
    private ?\DateTimeInterface $nrHoraFim = null;

    #[ORM\Column(name: 'sn_completo', type: 'boolean', nullable: true)]
    private ?bool $snCompleto = null;

    #[ORM\Column(name: 'nr_tamanho_backup', type: 'float', nullable: true)]
    private ?float $nrTamanhoBackup = null;

    #[ORM\Column(name: 'ds_ip_computador', type: 'string', length: 100, nullable: true)]
    private ?string $dsIpComputador = null;

    #[ORM\Column(name: 'ds_databases', type: 'string', length: 255, nullable: true)]
    private ?string $dsDatabases = null;

    #[ORM\Column(name: 'ds_mysqldump', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMysqldump = null;

    #[ORM\Column(name: 'sn_modulo_administracao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snModuloAdministracao = false;

    public function __construct(
        ?\DateTimeInterface $dtDataInicio = null,
        ?\DateTimeInterface $dtDataFim = null,
        ?\DateTimeInterface $nrHoraInicio = null,
        ?\DateTimeInterface $nrHoraFim = null,
        ?bool $snCompleto = null,
        ?float $nrTamanhoBackup = null,
        ?string $dsIpComputador = null,
        ?string $dsDatabases = null,
        ?string $dsMysqldump = null,
        ?bool $snModuloAdministracao = false
    ) {
        $this->dtDataInicio = $dtDataInicio;
        $this->dtDataFim = $dtDataFim;
        $this->nrHoraInicio = $nrHoraInicio;
        $this->nrHoraFim = $nrHoraFim;
        $this->snCompleto = $snCompleto;
        $this->nrTamanhoBackup = $nrTamanhoBackup;
        $this->dsIpComputador = $dsIpComputador;
        $this->dsDatabases = $dsDatabases;
        $this->dsMysqldump = $dsMysqldump;
        $this->snModuloAdministracao = $snModuloAdministracao;
    }

    public function getCdBackup(): ?int
    {
        return $this->cdBackup;
    }

    public function getDtDataInicio(): ?\DateTimeInterface
    {
        return $this->dtDataInicio;
    }

    public function setDtDataInicio(?\DateTimeInterface $dtDataInicio): self
    {
        $this->dtDataInicio = $dtDataInicio;
        return $this;
    }

    public function getDtDataFim(): ?\DateTimeInterface
    {
        return $this->dtDataFim;
    }

    public function setDtDataFim(?\DateTimeInterface $dtDataFim): self
    {
        $this->dtDataFim = $dtDataFim;
        return $this;
    }

    public function getNrHoraInicio(): ?\DateTimeInterface
    {
        return $this->nrHoraInicio;
    }

    public function setNrHoraInicio(?\DateTimeInterface $nrHoraInicio): self
    {
        $this->nrHoraInicio = $nrHoraInicio;
        return $this;
    }

    public function getNrHoraFim(): ?\DateTimeInterface
    {
        return $this->nrHoraFim;
    }

    public function setNrHoraFim(?\DateTimeInterface $nrHoraFim): self
    {
        $this->nrHoraFim = $nrHoraFim;
        return $this;
    }

    public function isSnCompleto(): ?bool
    {
        return $this->snCompleto;
    }

    public function setSnCompleto(?bool $snCompleto): self
    {
        $this->snCompleto = $snCompleto;
        return $this;
    }

    public function getNrTamanhoBackup(): ?float
    {
        return $this->nrTamanhoBackup;
    }

    public function setNrTamanhoBackup(?float $nrTamanhoBackup): self
    {
        $this->nrTamanhoBackup = $nrTamanhoBackup;
        return $this;
    }

    public function getDsIpComputador(): ?string
    {
        return $this->dsIpComputador;
    }

    public function setDsIpComputador(?string $dsIpComputador): self
    {
        $this->dsIpComputador = $dsIpComputador;
        return $this;
    }

    public function getDsDatabases(): ?string
    {
        return $this->dsDatabases;
    }

    public function setDsDatabases(?string $dsDatabases): self
    {
        $this->dsDatabases = $dsDatabases;
        return $this;
    }

    public function getDsMysqldump(): ?string
    {
        return $this->dsMysqldump;
    }

    public function setDsMysqldump(?string $dsMysqldump): self
    {
        $this->dsMysqldump = $dsMysqldump;
        return $this;
    }

    public function isSnModuloAdministracao(): ?bool
    {
        return $this->snModuloAdministracao;
    }

    public function setSnModuloAdministracao(?bool $snModuloAdministracao): self
    {
        $this->snModuloAdministracao = $snModuloAdministracao;
        return $this;
    }
}
