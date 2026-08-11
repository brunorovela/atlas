<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinFinanciamentoMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinFinanciamentoMensalidadeRepository::class)]
#[ORM\Table(
    name: 'fin_financiamento_mensalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_FINANCIAMENTO_MENSALIDADE_MENSALIDADES_CD_MENSALIDADE', columns: ['CD_MENSALIDADE'])]
#[ORM\Index(name: 'FK_FIN_FINANC_MENS_CD_MENSALIDADE_ORIGEM_MENS_CD_MENSALIDADE', columns: ['CD_MENSALIDADE_ORIGEM'])]
#[ORM\Index(name: 'IDX_3393DF98BBF5157D', columns: ['CD_FINANCIAMENTO_PESSOA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FIN_FINANC_MENS_CD_MENSALIDADE_ORIGEM_MENS_CD_MENSALIDADE', 'colunas' => ['CD_MENSALIDADE_ORIGEM'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FIN_FINANC_MENS_FIN_FINANC_PESSOA_CD_FINANCIAMENTO_PESSOA', 'colunas' => ['CD_FINANCIAMENTO_PESSOA'], 'tabelaAlvo' => 'fin_financiamento_pessoa', 'colunasAlvo' => ['CD_FINANCIAMENTO_PESSOA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FIN_FINANCIAMENTO_MENSALIDADE_MENSALIDADES_CD_MENSALIDADE', 'colunas' => ['CD_MENSALIDADE'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinFinanciamentoMensalidade
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: FinFinanciamentoPessoa::class)]
    #[ORM\JoinColumn(name: 'CD_FINANCIAMENTO_PESSOA', referencedColumnName: 'CD_FINANCIAMENTO_PESSOA', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinFinanciamentoPessoa $cdFinanciamentoPessoa = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'CD_MENSALIDADE', referencedColumnName: 'cd_mensalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'CD_MENSALIDADE_ORIGEM', referencedColumnName: 'cd_mensalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidadeOrigem = null;

    #[ORM\Column(name: 'DT_INCLUSAO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?FinFinanciamentoPessoa $cdFinanciamentoPessoa = null,
        ?Mensalidades $cdMensalidade = null,
        ?Mensalidades $cdMensalidadeOrigem = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->cdFinanciamentoPessoa = $cdFinanciamentoPessoa;
        $this->cdMensalidade = $cdMensalidade;
        $this->cdMensalidadeOrigem = $cdMensalidadeOrigem;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdFinanciamentoPessoa(): ?FinFinanciamentoPessoa
    {
        return $this->cdFinanciamentoPessoa;
    }

    public function setCdFinanciamentoPessoa(?FinFinanciamentoPessoa $cdFinanciamentoPessoa): self
    {
        $this->cdFinanciamentoPessoa = $cdFinanciamentoPessoa;
        return $this;
    }

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdMensalidadeOrigem(): ?Mensalidades
    {
        return $this->cdMensalidadeOrigem;
    }

    public function setCdMensalidadeOrigem(?Mensalidades $cdMensalidadeOrigem): self
    {
        $this->cdMensalidadeOrigem = $cdMensalidadeOrigem;
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
