<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogsDiarioEnvioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsDiarioEnvioRepository::class)]
#[ORM\Table(
    name: 'logs_diario_envio',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_DT_ENVIO', columns: ['dt_envio'])]
class LogsDiarioEnvio
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'dt_envio', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 100, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'nm_arquivo_diario', type: 'string', length: 100, nullable: true)]
    private ?string $nmArquivoDiario = null;

    #[ORM\Column(name: 'sn_envio_critico', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEnvioCritico = null;

    #[ORM\Column(name: 'sn_envio_fora_prazo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snEnvioForaPrazo = null;

    public function __construct(
        int $cdProfessor = 0,
        ?\DateTimeInterface $dtEnvio = null,
        ?string $nmArquivo = null,
        ?string $nmArquivoDiario = null,
        ?string $snEnvioCritico = null,
        ?string $snEnvioForaPrazo = null
    ) {
        $this->cdProfessor = $cdProfessor;
        $this->dtEnvio = $dtEnvio;
        $this->nmArquivo = $nmArquivo;
        $this->nmArquivoDiario = $nmArquivoDiario;
        $this->snEnvioCritico = $snEnvioCritico;
        $this->snEnvioForaPrazo = $snEnvioForaPrazo;
    }

    public function getCdProfessor(): int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNmArquivoDiario(): ?string
    {
        return $this->nmArquivoDiario;
    }

    public function setNmArquivoDiario(?string $nmArquivoDiario): self
    {
        $this->nmArquivoDiario = $nmArquivoDiario;
        return $this;
    }

    public function getSnEnvioCritico(): ?string
    {
        return $this->snEnvioCritico;
    }

    public function setSnEnvioCritico(?string $snEnvioCritico): self
    {
        $this->snEnvioCritico = $snEnvioCritico;
        return $this;
    }

    public function getSnEnvioForaPrazo(): ?string
    {
        return $this->snEnvioForaPrazo;
    }

    public function setSnEnvioForaPrazo(?string $snEnvioForaPrazo): self
    {
        $this->snEnvioForaPrazo = $snEnvioForaPrazo;
        return $this;
    }
}
