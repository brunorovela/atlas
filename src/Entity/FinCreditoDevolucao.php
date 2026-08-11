<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinCreditoDevolucaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCreditoDevolucaoRepository::class)]
#[ORM\Table(
    name: 'fin_credito_devolucao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_CREDITO_DEVOLUCAO_CD_MOV_TE_FIN_MOV_TESOURARIA_CD_MOV_TE', columns: ['CD_MOVIMENTO_TE'])]
#[ORM\Index(name: 'FK_FIN_CREDITO_DEVOLUCAO_CD_CREDITO_FIN_CREDITO_CD_CREDITO', columns: ['CD_CREDITO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FIN_CREDITO_DEVOLUCAO_CD_CREDITO_FIN_CREDITO_CD_CREDITO', 'colunas' => ['CD_CREDITO'], 'tabelaAlvo' => 'fin_credito', 'colunasAlvo' => ['cd_credito'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FIN_CREDITO_DEVOLUCAO_CD_MOV_TE_FIN_MOV_TESOURARIA_CD_MOV_TE', 'colunas' => ['CD_MOVIMENTO_TE'], 'tabelaAlvo' => 'fin_mov_tesouraria', 'colunasAlvo' => ['cd_movimento_te'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinCreditoDevolucao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CREDITO_DEVOLUCAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCreditoDevolucao = null;

    #[ORM\ManyToOne(targetEntity: FinMovTesouraria::class)]
    #[ORM\JoinColumn(name: 'CD_MOVIMENTO_TE', referencedColumnName: 'cd_movimento_te', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinMovTesouraria $cdMovimentoTe = null;

    #[ORM\ManyToOne(targetEntity: FinCredito::class)]
    #[ORM\JoinColumn(name: 'CD_CREDITO', referencedColumnName: 'cd_credito', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinCredito $cdCredito = null;

    #[ORM\Column(name: 'VL_DEVOLVIDO', type: 'decimal', precision: 15, scale: 9)]
    private ?string $vlDevolvido = null;

    #[ORM\Column(name: 'DT_INCLUSAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?FinMovTesouraria $cdMovimentoTe = null,
        ?FinCredito $cdCredito = null,
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

    public function getCdMovimentoTe(): ?FinMovTesouraria
    {
        return $this->cdMovimentoTe;
    }

    public function setCdMovimentoTe(?FinMovTesouraria $cdMovimentoTe): self
    {
        $this->cdMovimentoTe = $cdMovimentoTe;
        return $this;
    }

    public function getCdCredito(): ?FinCredito
    {
        return $this->cdCredito;
    }

    public function setCdCredito(?FinCredito $cdCredito): self
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
