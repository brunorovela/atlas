<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CenProcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CenProcessosRepository::class)]
#[ORM\Table(
    name: 'cen_processos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'nr_ano', columns: ['nr_ano', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class CenProcessos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_layout', type: 'integer', nullable: true)]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer')]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'sn_bloqueado', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snBloqueado = 0;

    #[ORM\Column(name: 'dt_ultima_exportacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaExportacao = null;

    #[ORM\Column(name: 'dt_ultima_atualizacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaAtualizacao = null;

    #[ORM\Column(name: 'dt_ultimo_bloqueio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimoBloqueio = null;

    public function __construct(
        ?int $cdLayout = null,
        ?int $nrAno = null,
        ?int $cdColigada = null,
        int $snBloqueado = 0,
        ?\DateTimeInterface $dtUltimaExportacao = null,
        ?\DateTimeInterface $dtUltimaAtualizacao = null,
        ?\DateTimeInterface $dtUltimoBloqueio = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->nrAno = $nrAno;
        $this->cdColigada = $cdColigada;
        $this->snBloqueado = $snBloqueado;
        $this->dtUltimaExportacao = $dtUltimaExportacao;
        $this->dtUltimaAtualizacao = $dtUltimaAtualizacao;
        $this->dtUltimoBloqueio = $dtUltimoBloqueio;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getSnBloqueado(): int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(int $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function getDtUltimaExportacao(): ?\DateTimeInterface
    {
        return $this->dtUltimaExportacao;
    }

    public function setDtUltimaExportacao(?\DateTimeInterface $dtUltimaExportacao): self
    {
        $this->dtUltimaExportacao = $dtUltimaExportacao;
        return $this;
    }

    public function getDtUltimaAtualizacao(): ?\DateTimeInterface
    {
        return $this->dtUltimaAtualizacao;
    }

    public function setDtUltimaAtualizacao(?\DateTimeInterface $dtUltimaAtualizacao): self
    {
        $this->dtUltimaAtualizacao = $dtUltimaAtualizacao;
        return $this;
    }

    public function getDtUltimoBloqueio(): ?\DateTimeInterface
    {
        return $this->dtUltimoBloqueio;
    }

    public function setDtUltimoBloqueio(?\DateTimeInterface $dtUltimoBloqueio): self
    {
        $this->dtUltimoBloqueio = $dtUltimoBloqueio;
        return $this;
    }
}
