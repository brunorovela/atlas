<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AtuComandosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtuComandosRepository::class)]
#[ORM\Table(
    name: 'atu_comandos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CDOS_ATULIZACS_CD_ATULIZCAO', columns: ['CD_ATUALIZACAO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CDOS_ATULIZACS_CD_ATULIZCAO', 'colunas' => ['CD_ATUALIZACAO'], 'tabelaAlvo' => 'atu_atualizacoes', 'colunasAlvo' => ['CD_ATUALIZACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AtuComandos
{
    #[ORM\Id]
    #[ORM\Column(name: 'NR_COMANDO', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrComando = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: AtuAtualizacoes::class)]
    #[ORM\JoinColumn(name: 'CD_ATUALIZACAO', referencedColumnName: 'CD_ATUALIZACAO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => true, 'comment' => ''])]
    private ?AtuAtualizacoes $cdAtualizacao = null;

    #[ORM\Column(name: 'SN_SUCESSO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snSucesso = 0;

    #[ORM\Column(name: 'TX_CONTEUDO', type: 'text', length: 65535)]
    private ?string $txConteudo = null;

    #[ORM\Column(name: 'DT_EXECUCAO', type: 'datetime')]
    private ?\DateTimeInterface $dtExecucao = null;

    #[ORM\Column(name: 'TX_ERRO', type: 'text', length: 65535, nullable: true)]
    private ?string $txErro = null;

    public function __construct(
        ?int $nrComando = null,
        ?AtuAtualizacoes $cdAtualizacao = null,
        int $snSucesso = 0,
        ?string $txConteudo = null,
        ?\DateTimeInterface $dtExecucao = null,
        ?string $txErro = null
    ) {
        $this->nrComando = $nrComando;
        $this->cdAtualizacao = $cdAtualizacao;
        $this->snSucesso = $snSucesso;
        $this->txConteudo = $txConteudo;
        $this->dtExecucao = $dtExecucao;
        $this->txErro = $txErro;
    }

    public function getNrComando(): ?int
    {
        return $this->nrComando;
    }

    public function setNrComando(?int $nrComando): self
    {
        $this->nrComando = $nrComando;
        return $this;
    }

    public function getCdAtualizacao(): ?AtuAtualizacoes
    {
        return $this->cdAtualizacao;
    }

    public function setCdAtualizacao(?AtuAtualizacoes $cdAtualizacao): self
    {
        $this->cdAtualizacao = $cdAtualizacao;
        return $this;
    }

    public function getSnSucesso(): int
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(int $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
        return $this;
    }

    public function getTxConteudo(): ?string
    {
        return $this->txConteudo;
    }

    public function setTxConteudo(?string $txConteudo): self
    {
        $this->txConteudo = $txConteudo;
        return $this;
    }

    public function getDtExecucao(): ?\DateTimeInterface
    {
        return $this->dtExecucao;
    }

    public function setDtExecucao(?\DateTimeInterface $dtExecucao): self
    {
        $this->dtExecucao = $dtExecucao;
        return $this;
    }

    public function getTxErro(): ?string
    {
        return $this->txErro;
    }

    public function setTxErro(?string $txErro): self
    {
        $this->txErro = $txErro;
        return $this;
    }
}
