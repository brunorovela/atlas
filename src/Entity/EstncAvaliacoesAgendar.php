<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncAvaliacoesAgendarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAvaliacoesAgendarRepository::class)]
#[ORM\Table(
    name: 'estnc_avaliacoes_agendar',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_AVAL_AGENDAR', columns: ['cd_estagio', 'cd_avaliacao', 'cd_grupo', 'dt_inicial'])]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'FK_NC_AVL_AGENDAR_PESSOAS_CD_PESSOA', columns: ['cd_avaliador'])]
#[ORM\Index(name: 'IX_CD_TEM', columns: ['cd_tem'])]
#[ORM\Index(name: 'IX_CD_AVALIADOR', columns: ['cd_avaliador'])]
#[ORM\Index(name: 'IX_CD_NOTIFICACAO', columns: ['cd_notificacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_AVL_AGENDAR_CD_AVALIACAO', 'colunas' => ['cd_avaliacao'], 'tabelaAlvo' => 'estnc_avaliacoes', 'colunasAlvo' => ['cd_avaliacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_AGENDAR_CD_ESTAGIO', 'colunas' => ['cd_estagio'], 'tabelaAlvo' => 'estnc_estagios', 'colunasAlvo' => ['cd_estagio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_AGENDAR_CD_GRUPO', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_AGENDAR_PESSOAS_CD_PESSOA', 'colunas' => ['cd_avaliador'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncAvaliacoesAgendar
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacao_agendar', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAvaliacaoAgendar = null;

    #[ORM\ManyToOne(targetEntity: EstncEstagios::class)]
    #[ORM\JoinColumn(name: 'cd_estagio', referencedColumnName: 'cd_estagio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncEstagios $cdEstagio = null;

    #[ORM\ManyToOne(targetEntity: EstncAvaliacoes::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao', referencedColumnName: 'cd_avaliacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncAvaliacoes $cdAvaliacao = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'sn_visualizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snVisualizado = null;

    #[ORM\Column(name: 'sn_email_enviado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEmailEnviado = false;

    #[ORM\Column(name: 'sn_respondido', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snRespondido = false;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'cd_tem', type: 'bigint', nullable: true)]
    private ?string $cdTem = null;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_avaliador', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdAvaliador = null;

    #[ORM\Column(name: 'cd_notificacao', type: 'integer', nullable: true)]
    private ?int $cdNotificacao = null;

    public function __construct(
        ?EstncEstagios $cdEstagio = null,
        ?EstncAvaliacoes $cdAvaliacao = null,
        ?NuGrupos $cdGrupo = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?int $snVisualizado = null,
        ?bool $snEmailEnviado = false,
        ?bool $snRespondido = false,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $cdTem = null,
        ?int $nrOrdem = null,
        ?Pessoas $cdAvaliador = null,
        ?int $cdNotificacao = null
    ) {
        $this->cdEstagio = $cdEstagio;
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdGrupo = $cdGrupo;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->snVisualizado = $snVisualizado;
        $this->snEmailEnviado = $snEmailEnviado;
        $this->snRespondido = $snRespondido;
        $this->dtCadastro = $dtCadastro;
        $this->cdTem = $cdTem;
        $this->nrOrdem = $nrOrdem;
        $this->cdAvaliador = $cdAvaliador;
        $this->cdNotificacao = $cdNotificacao;
    }

    public function getCdAvaliacaoAgendar(): ?int
    {
        return $this->cdAvaliacaoAgendar;
    }

    public function getCdEstagio(): ?EstncEstagios
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?EstncEstagios $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
        return $this;
    }

    public function getCdAvaliacao(): ?EstncAvaliacoes
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?EstncAvaliacoes $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
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

    public function isSnEmailEnviado(): ?bool
    {
        return $this->snEmailEnviado;
    }

    public function setSnEmailEnviado(?bool $snEmailEnviado): self
    {
        $this->snEmailEnviado = $snEmailEnviado;
        return $this;
    }

    public function isSnRespondido(): ?bool
    {
        return $this->snRespondido;
    }

    public function setSnRespondido(?bool $snRespondido): self
    {
        $this->snRespondido = $snRespondido;
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

    public function getCdTem(): ?string
    {
        return $this->cdTem;
    }

    public function setCdTem(?string $cdTem): self
    {
        $this->cdTem = $cdTem;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getCdAvaliador(): ?Pessoas
    {
        return $this->cdAvaliador;
    }

    public function setCdAvaliador(?Pessoas $cdAvaliador): self
    {
        $this->cdAvaliador = $cdAvaliador;
        return $this;
    }

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
    }

    public function setCdNotificacao(?int $cdNotificacao): self
    {
        $this->cdNotificacao = $cdNotificacao;
        return $this;
    }
}
