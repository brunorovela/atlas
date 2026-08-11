<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasAnexosRepository::class)]
#[ORM\Table(
    name: 'monografias_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'monografias_anexos_unique', columns: ['ds_caminho'])]
#[ORM\Index(name: 'IX_CD_SOLICITACAO', columns: ['cd_solicitacao'])]
#[ORM\Index(name: 'IX_CD_MONOGRAFIA', columns: ['cd_monografia'])]
class MonografiasAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer')]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'cd_solicitacao', type: 'integer', nullable: true)]
    private ?int $cdSolicitacao = null;

    #[ORM\Column(name: 'cd_monografia', type: 'integer', nullable: true)]
    private ?int $cdMonografia = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 255)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'cd_entrega_parcial', type: 'integer', nullable: true)]
    private ?int $cdEntregaParcial = null;

    #[ORM\Column(name: 'sn_entrega_final', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEntregaFinal = false;

    #[ORM\Column(name: 'ds_caminho', type: 'string', length: 100, nullable: true)]
    private ?string $dsCaminho = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?int $cdSolicitacao = null,
        ?int $cdMonografia = null,
        ?string $nmArquivo = null,
        ?string $nmOriginal = null,
        ?int $cdEntregaParcial = null,
        ?bool $snEntregaFinal = false,
        ?string $dsCaminho = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->cdSolicitacao = $cdSolicitacao;
        $this->cdMonografia = $cdMonografia;
        $this->nmArquivo = $nmArquivo;
        $this->nmOriginal = $nmOriginal;
        $this->cdEntregaParcial = $cdEntregaParcial;
        $this->snEntregaFinal = $snEntregaFinal;
        $this->dsCaminho = $dsCaminho;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdSolicitacao(): ?int
    {
        return $this->cdSolicitacao;
    }

    public function setCdSolicitacao(?int $cdSolicitacao): self
    {
        $this->cdSolicitacao = $cdSolicitacao;
        return $this;
    }

    public function getCdMonografia(): ?int
    {
        return $this->cdMonografia;
    }

    public function setCdMonografia(?int $cdMonografia): self
    {
        $this->cdMonografia = $cdMonografia;
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

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getCdEntregaParcial(): ?int
    {
        return $this->cdEntregaParcial;
    }

    public function setCdEntregaParcial(?int $cdEntregaParcial): self
    {
        $this->cdEntregaParcial = $cdEntregaParcial;
        return $this;
    }

    public function isSnEntregaFinal(): ?bool
    {
        return $this->snEntregaFinal;
    }

    public function setSnEntregaFinal(?bool $snEntregaFinal): self
    {
        $this->snEntregaFinal = $snEntregaFinal;
        return $this;
    }

    public function getDsCaminho(): ?string
    {
        return $this->dsCaminho;
    }

    public function setDsCaminho(?string $dsCaminho): self
    {
        $this->dsCaminho = $dsCaminho;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }
}
