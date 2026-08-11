<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpoProcessoLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoProcessoLogsRepository::class)]
#[ORM\Table(
    name: 'expo_processo_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_NR_EXPORTACAO', columns: ['nr_exportacao'])]
class ExpoProcessoLogs
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_exportacao', type: 'integer')]
    private ?int $nrExportacao = null;

    #[ORM\Column(name: 'dt_exportacao', type: 'datetime')]
    private ?\DateTimeInterface $dtExportacao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'sn_oficial', type: 'integer', options: ['default' => '0'])]
    private int $snOficial = 0;

    #[ORM\Column(name: 'me_arquivo', type: 'text', length: 16777215)]
    private ?string $meArquivo = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $nrExportacao = null,
        ?\DateTimeInterface $dtExportacao = null,
        ?int $cdUsuario = null,
        int $snOficial = 0,
        ?string $meArquivo = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->nrExportacao = $nrExportacao;
        $this->dtExportacao = $dtExportacao;
        $this->cdUsuario = $cdUsuario;
        $this->snOficial = $snOficial;
        $this->meArquivo = $meArquivo;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getNrExportacao(): ?int
    {
        return $this->nrExportacao;
    }

    public function setNrExportacao(?int $nrExportacao): self
    {
        $this->nrExportacao = $nrExportacao;
        return $this;
    }

    public function getDtExportacao(): ?\DateTimeInterface
    {
        return $this->dtExportacao;
    }

    public function setDtExportacao(?\DateTimeInterface $dtExportacao): self
    {
        $this->dtExportacao = $dtExportacao;
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

    public function getSnOficial(): int
    {
        return $this->snOficial;
    }

    public function setSnOficial(int $snOficial): self
    {
        $this->snOficial = $snOficial;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }
}
