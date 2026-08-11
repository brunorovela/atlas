<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ConFinanceiroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConFinanceiroRepository::class)]
#[ORM\Table(
    name: 'con_financeiro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_financeiro', columns: ['cd_financeiro'])]
#[ORM\UniqueConstraint(name: 'cd_concurso', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
class ConFinanceiro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_financeiro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinanceiro = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'nr_dias_vencimento', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrDiasVencimento = 0;

    #[ORM\Column(name: 'nr_valor_inscricao', type: 'float', nullable: true, options: ['default' => '0.000'])]
    private ?float $nrValorInscricao = 0.0;

    #[ORM\Column(name: 'sn_requerido', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snRequerido = 0;

    #[ORM\Column(name: 'sn_dias_uteis', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snDiasUteis = 0;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?int $nrDiasVencimento = 0,
        ?float $nrValorInscricao = 0.0,
        int $snRequerido = 0,
        ?int $snDiasUteis = 0,
        ?int $cdTipoTitulo = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->dtVencimento = $dtVencimento;
        $this->nrDiasVencimento = $nrDiasVencimento;
        $this->nrValorInscricao = $nrValorInscricao;
        $this->snRequerido = $snRequerido;
        $this->snDiasUteis = $snDiasUteis;
        $this->cdTipoTitulo = $cdTipoTitulo;
    }

    public function getCdFinanceiro(): ?int
    {
        return $this->cdFinanceiro;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function getNrDiasVencimento(): ?int
    {
        return $this->nrDiasVencimento;
    }

    public function setNrDiasVencimento(?int $nrDiasVencimento): self
    {
        $this->nrDiasVencimento = $nrDiasVencimento;
        return $this;
    }

    public function getNrValorInscricao(): ?float
    {
        return $this->nrValorInscricao;
    }

    public function setNrValorInscricao(?float $nrValorInscricao): self
    {
        $this->nrValorInscricao = $nrValorInscricao;
        return $this;
    }

    public function getSnRequerido(): int
    {
        return $this->snRequerido;
    }

    public function setSnRequerido(int $snRequerido): self
    {
        $this->snRequerido = $snRequerido;
        return $this;
    }

    public function getSnDiasUteis(): ?int
    {
        return $this->snDiasUteis;
    }

    public function setSnDiasUteis(?int $snDiasUteis): self
    {
        $this->snDiasUteis = $snDiasUteis;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }
}
