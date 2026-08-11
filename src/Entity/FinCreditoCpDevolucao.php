<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCreditoCpDevolucaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCreditoCpDevolucaoRepository::class)]
#[ORM\Table(
    name: 'fin_credito_cp_devolucao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinCreditoCpDevolucao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CREDITO_DEVOLUCAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCreditoDevolucao = null;

    #[ORM\Column(name: 'CD_MOVIMENTO_TE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'CD_CREDITO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCredito = null;

    #[ORM\Column(name: 'VL_DEVOLVIDO', type: 'decimal', precision: 15, scale: 9)]
    private ?string $vlDevolvido = null;

    #[ORM\Column(name: 'DT_INCLUSAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?int $cdMovimentoTe = null,
        ?int $cdCredito = null,
        ?string $vlDevolvido = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdMovimentoTe = $cdMovimentoTe;
        $this->cdCredito = $cdCredito;
        $this->vlDevolvido = $vlDevolvido;
        $this->dtInclusao = $dtInclusao;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdCreditoDevolucao(): ?int
    {
        return $this->cdCreditoDevolucao;
    }

    public function getCdMovimentoTe(): ?int
    {
        return $this->cdMovimentoTe;
    }

    public function setCdMovimentoTe(?int $cdMovimentoTe): self
    {
        $this->cdMovimentoTe = $cdMovimentoTe;
        return $this;
    }

    public function getCdCredito(): ?int
    {
        return $this->cdCredito;
    }

    public function setCdCredito(?int $cdCredito): self
    {
        $this->cdCredito = $cdCredito;
        return $this;
    }

    public function getVlDevolvido(): ?string
    {
        return $this->vlDevolvido;
    }

    public function setVlDevolvido(?string $vlDevolvido): self
    {
        $this->vlDevolvido = $vlDevolvido;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }
}
