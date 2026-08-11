<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioImpressoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioImpressoesRepository::class)]
#[ORM\Table(
    name: 'diario_impressoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DiarioImpressoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diario_impressao', type: 'integer')]
    private ?int $cdDiarioImpressao = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'sn_paginacao', type: 'boolean', nullable: true)]
    private ?bool $snPaginacao = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snDisponivel = true;

    public function __construct(
        ?string $dsArquivo = null,
        ?string $dsTitulo = null,
        ?bool $snPaginacao = null,
        ?bool $snDisponivel = true
    ) {
        $this->dsArquivo = $dsArquivo;
        $this->dsTitulo = $dsTitulo;
        $this->snPaginacao = $snPaginacao;
        $this->snDisponivel = $snDisponivel;
    }

    public function getCdDiarioImpressao(): ?int
    {
        return $this->cdDiarioImpressao;
    }

    public function getDsArquivo(): ?string
    {
        return $this->dsArquivo;
    }

    public function setDsArquivo(?string $dsArquivo): self
    {
        $this->dsArquivo = $dsArquivo;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function isSnPaginacao(): ?bool
    {
        return $this->snPaginacao;
    }

    public function setSnPaginacao(?bool $snPaginacao): self
    {
        $this->snPaginacao = $snPaginacao;
        return $this;
    }

    public function isSnDisponivel(): ?bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(?bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }
}
