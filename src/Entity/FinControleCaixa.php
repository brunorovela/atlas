<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinControleCaixaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinControleCaixaRepository::class)]
#[ORM\Table(
    name: 'fin_controle_caixa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONTA_BANCO', columns: ['cd_conta_banco'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_DT_ABERTURA', columns: ['dt_abertura'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
class FinControleCaixa
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_abertura_caixa', type: 'integer', options: ['default' => '0'])]
    private int $cdAberturaCaixa = 0;

    #[ORM\Column(name: 'dt_abertura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAbertura = null;

    #[ORM\Column(name: 'dt_fechamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFechamento = null;

    #[ORM\Column(name: 'cd_conta_banco', type: 'integer', nullable: true)]
    private ?int $cdContaBanco = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'vl_saldo_abertura', type: 'float', nullable: true)]
    private ?float $vlSaldoAbertura = null;

    #[ORM\Column(name: 'vl_saldo_fechamento', type: 'float', nullable: true)]
    private ?float $vlSaldoFechamento = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    public function __construct(
        int $cdAberturaCaixa = 0,
        ?\DateTimeInterface $dtAbertura = null,
        ?\DateTimeInterface $dtFechamento = null,
        ?int $cdContaBanco = null,
        int $cdColigada = 1,
        ?float $vlSaldoAbertura = null,
        ?float $vlSaldoFechamento = null,
        ?string $dsSituacao = null,
        ?int $cdUsuario = null
    ) {
        $this->cdAberturaCaixa = $cdAberturaCaixa;
        $this->dtAbertura = $dtAbertura;
        $this->dtFechamento = $dtFechamento;
        $this->cdContaBanco = $cdContaBanco;
        $this->cdColigada = $cdColigada;
        $this->vlSaldoAbertura = $vlSaldoAbertura;
        $this->vlSaldoFechamento = $vlSaldoFechamento;
        $this->dsSituacao = $dsSituacao;
        $this->cdUsuario = $cdUsuario;
    }

    public function getCdAberturaCaixa(): int
    {
        return $this->cdAberturaCaixa;
    }

    public function setCdAberturaCaixa(int $cdAberturaCaixa): self
    {
        $this->cdAberturaCaixa = $cdAberturaCaixa;
        return $this;
    }

    public function getDtAbertura(): ?\DateTimeInterface
    {
        return $this->dtAbertura;
    }

    public function setDtAbertura(?\DateTimeInterface $dtAbertura): self
    {
        $this->dtAbertura = $dtAbertura;
        return $this;
    }

    public function getDtFechamento(): ?\DateTimeInterface
    {
        return $this->dtFechamento;
    }

    public function setDtFechamento(?\DateTimeInterface $dtFechamento): self
    {
        $this->dtFechamento = $dtFechamento;
        return $this;
    }

    public function getCdContaBanco(): ?int
    {
        return $this->cdContaBanco;
    }

    public function setCdContaBanco(?int $cdContaBanco): self
    {
        $this->cdContaBanco = $cdContaBanco;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getVlSaldoAbertura(): ?float
    {
        return $this->vlSaldoAbertura;
    }

    public function setVlSaldoAbertura(?float $vlSaldoAbertura): self
    {
        $this->vlSaldoAbertura = $vlSaldoAbertura;
        return $this;
    }

    public function getVlSaldoFechamento(): ?float
    {
        return $this->vlSaldoFechamento;
    }

    public function setVlSaldoFechamento(?float $vlSaldoFechamento): self
    {
        $this->vlSaldoFechamento = $vlSaldoFechamento;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
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
}
