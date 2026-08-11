<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauPlanoFeedbackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauPlanoFeedbackRepository::class)]
#[ORM\Table(
    name: 'plau_plano_feedback',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_PRIORIDADE', columns: ['cd_prioridade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_plano_feedback_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_feedback_ibfk_2', 'colunas' => ['cd_prioridade'], 'tabelaAlvo' => 'plau_feedb_prioridade', 'colunasAlvo' => ['cd_prioridade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_feedback_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'plau_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plano_feedback_ibfk_4', 'colunas' => ['cd_plano'], 'tabelaAlvo' => 'plau_plano', 'colunasAlvo' => ['cd_plano'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauPlanoFeedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_feedback', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFeedback = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: PlauFeedbPrioridade::class)]
    #[ORM\JoinColumn(name: 'cd_prioridade', referencedColumnName: 'cd_prioridade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauFeedbPrioridade $cdPrioridade = null;

    #[ORM\ManyToOne(targetEntity: PlauSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauSituacao $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: PlauPlano::class)]
    #[ORM\JoinColumn(name: 'cd_plano', referencedColumnName: 'cd_plano', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauPlano $cdPlano = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'sn_visualizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snVisualizado = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?PlauFeedbPrioridade $cdPrioridade = null,
        ?PlauSituacao $cdSituacao = null,
        ?PlauPlano $cdPlano = null,
        ?string $meDescricao = null,
        ?int $snVisualizado = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdPrioridade = $cdPrioridade;
        $this->cdSituacao = $cdSituacao;
        $this->cdPlano = $cdPlano;
        $this->meDescricao = $meDescricao;
        $this->snVisualizado = $snVisualizado;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdFeedback(): ?int
    {
        return $this->cdFeedback;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdPrioridade(): ?PlauFeedbPrioridade
    {
        return $this->cdPrioridade;
    }

    public function setCdPrioridade(?PlauFeedbPrioridade $cdPrioridade): self
    {
        $this->cdPrioridade = $cdPrioridade;
        return $this;
    }

    public function getCdSituacao(): ?PlauSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?PlauSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdPlano(): ?PlauPlano
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?PlauPlano $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getSnVisualizado(): ?int
    {
        return $this->snVisualizado;
    }

    public function setSnVisualizado(?int $snVisualizado): self
    {
        $this->snVisualizado = $snVisualizado;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
