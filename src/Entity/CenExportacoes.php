<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CenExportacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CenExportacoesRepository::class)]
#[ORM\Table(
    name: 'cen_exportacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
class CenExportacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_exportacao', type: 'integer')]
    private ?int $cdExportacao = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'nr_exportacao', type: 'integer')]
    private ?int $nrExportacao = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'nm_usuario', type: 'string', length: 100)]
    private ?string $nmUsuario = null;

    #[ORM\Column(name: 'ds_conteudo_exportado', type: 'text', length: 16777215)]
    private ?string $dsConteudoExportado = null;

    #[ORM\Column(name: 'dt_exportacao', type: 'datetime')]
    private ?\DateTimeInterface $dtExportacao = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $nrExportacao = null,
        ?string $nmArquivo = null,
        ?string $nmUsuario = null,
        ?string $dsConteudoExportado = null,
        ?\DateTimeInterface $dtExportacao = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->nrExportacao = $nrExportacao;
        $this->nmArquivo = $nmArquivo;
        $this->nmUsuario = $nmUsuario;
        $this->dsConteudoExportado = $dsConteudoExportado;
        $this->dtExportacao = $dtExportacao;
    }

    public function getCdExportacao(): ?int
    {
        return $this->cdExportacao;
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

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNmUsuario(): ?string
    {
        return $this->nmUsuario;
    }

    public function setNmUsuario(?string $nmUsuario): self
    {
        $this->nmUsuario = $nmUsuario;
        return $this;
    }

    public function getDsConteudoExportado(): ?string
    {
        return $this->dsConteudoExportado;
    }

    public function setDsConteudoExportado(?string $dsConteudoExportado): self
    {
        $this->dsConteudoExportado = $dsConteudoExportado;
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
}
