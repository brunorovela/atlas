<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RetornoCpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetornoCpRepository::class)]
#[ORM\Table(
    name: 'retorno_cp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
class RetornoCp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_retorno', type: 'integer')]
    private ?int $cdRetorno = null;

    #[ORM\Column(name: 'dt_processamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtProcessamento = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 150, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_banco', type: 'string', length: 3, nullable: true)]
    private ?string $cdBanco = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    public function __construct(
        ?\DateTimeInterface $dtProcessamento = null,
        ?string $nmArquivo = null,
        ?int $cdUsuario = null,
        ?string $cdBanco = null,
        ?int $cdCaixa = null,
        ?int $cdColigada = null
    ) {
        $this->dtProcessamento = $dtProcessamento;
        $this->nmArquivo = $nmArquivo;
        $this->cdUsuario = $cdUsuario;
        $this->cdBanco = $cdBanco;
        $this->cdCaixa = $cdCaixa;
        $this->cdColigada = $cdColigada;
    }

    public function getCdRetorno(): ?int
    {
        return $this->cdRetorno;
    }

    public function getDtProcessamento(): ?\DateTimeInterface
    {
        return $this->dtProcessamento;
    }

    public function setDtProcessamento(?\DateTimeInterface $dtProcessamento): self
    {
        $this->dtProcessamento = $dtProcessamento;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getCdBanco(): ?string
    {
        return $this->cdBanco;
    }

    public function setCdBanco(?string $cdBanco): self
    {
        $this->cdBanco = $cdBanco;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
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
}
