<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinEstornosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinEstornosRepository::class)]
#[ORM\Table(
    name: 'fin_estornos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinEstornos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_movimento_te', type: 'integer')]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_baixa', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBaixa = null;

    #[ORM\Column(name: 'dt_estorno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEstorno = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'ds_estorno', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsEstorno = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', nullable: true)]
    private ?int $cdTitulo = null;

    public function __construct(
        ?int $cdCaixa = null,
        ?int $cdMensalidade = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtBaixa = null,
        ?\DateTimeInterface $dtEstorno = null,
        ?int $cdUsuario = null,
        ?string $dsEstorno = null,
        ?int $cdTitulo = null
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->cdMensalidade = $cdMensalidade;
        $this->cdColigada = $cdColigada;
        $this->dtBaixa = $dtBaixa;
        $this->dtEstorno = $dtEstorno;
        $this->cdUsuario = $cdUsuario;
        $this->dsEstorno = $dsEstorno;
        $this->cdTitulo = $cdTitulo;
    }

    public function getCdMovimentoTe(): ?int
    {
        return $this->cdMovimentoTe;
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

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
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

    public function getDtBaixa(): ?\DateTimeInterface
    {
        return $this->dtBaixa;
    }

    public function setDtBaixa(?\DateTimeInterface $dtBaixa): self
    {
        $this->dtBaixa = $dtBaixa;
        return $this;
    }

    public function getDtEstorno(): ?\DateTimeInterface
    {
        return $this->dtEstorno;
    }

    public function setDtEstorno(?\DateTimeInterface $dtEstorno): self
    {
        $this->dtEstorno = $dtEstorno;
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

    public function getDsEstorno(): ?string
    {
        return $this->dsEstorno;
    }

    public function setDsEstorno(?string $dsEstorno): self
    {
        $this->dsEstorno = $dsEstorno;
        return $this;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }
}
