<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncAvaliacoesRespondidasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAvaliacoesRespondidasRepository::class)]
#[ORM\Table(
    name: 'estnc_avaliacoes_respondidas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_AVAL_RESP', columns: ['cd_avaliacao_agendar'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA_RESPONDEU', columns: ['cd_pessoa_respondeu'])]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO_AGENDAR', columns: ['cd_avaliacao_agendar'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_AVAL_AGENDAR', 'colunas' => ['cd_avaliacao_agendar'], 'tabelaAlvo' => 'estnc_avaliacoes_agendar', 'colunasAlvo' => ['cd_avaliacao_agendar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_RESP_CD_AVL', 'colunas' => ['cd_avaliacao'], 'tabelaAlvo' => 'estnc_avaliacoes', 'colunasAlvo' => ['cd_avaliacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_RESP_CD_ESTAGIO', 'colunas' => ['cd_estagio'], 'tabelaAlvo' => 'estnc_estagios', 'colunasAlvo' => ['cd_estagio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_RESP_CD_GRUPO', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_AVL_RESP_CD_PESSOA', 'colunas' => ['cd_pessoa_respondeu'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncAvaliacoesRespondidas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacoes_respondidas', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAvaliacoesRespondidas = null;

    #[ORM\ManyToOne(targetEntity: EstncAvaliacoes::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao', referencedColumnName: 'cd_avaliacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncAvaliacoes $cdAvaliacao = null;

    #[ORM\ManyToOne(targetEntity: EstncEstagios::class)]
    #[ORM\JoinColumn(name: 'cd_estagio', referencedColumnName: 'cd_estagio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncEstagios $cdEstagio = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_respondeu', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaRespondeu = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Column(name: 'dt_avaliacao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAvaliacao = null;

    #[ORM\Column(name: 'vl_nota_final', type: 'float', nullable: true, options: ['default' => '0.00'])]
    private ?float $vlNotaFinal = 0.0;

    #[ORM\Column(name: 'me_comentarios_avaliador', type: 'blob', length: 65535, nullable: true)]
    private ?string $meComentariosAvaliador = null;

    #[ORM\Column(name: 'me_comentarios', type: 'blob', length: 65535, nullable: true)]
    private ?string $meComentarios = null;

    #[ORM\ManyToOne(targetEntity: EstncAvaliacoesAgendar::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao_agendar', referencedColumnName: 'cd_avaliacao_agendar', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncAvaliacoesAgendar $cdAvaliacaoAgendar = null;

    public function __construct(
        ?EstncAvaliacoes $cdAvaliacao = null,
        ?EstncEstagios $cdEstagio = null,
        ?Pessoas $cdPessoaRespondeu = null,
        ?NuGrupos $cdGrupo = null,
        ?\DateTimeInterface $dtAvaliacao = null,
        ?float $vlNotaFinal = 0.0,
        ?string $meComentariosAvaliador = null,
        ?string $meComentarios = null,
        ?EstncAvaliacoesAgendar $cdAvaliacaoAgendar = null
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdEstagio = $cdEstagio;
        $this->cdPessoaRespondeu = $cdPessoaRespondeu;
        $this->cdGrupo = $cdGrupo;
        $this->dtAvaliacao = $dtAvaliacao;
        $this->vlNotaFinal = $vlNotaFinal;
        $this->meComentariosAvaliador = $meComentariosAvaliador;
        $this->meComentarios = $meComentarios;
        $this->cdAvaliacaoAgendar = $cdAvaliacaoAgendar;
    }

    public function getCdAvaliacoesRespondidas(): ?int
    {
        return $this->cdAvaliacoesRespondidas;
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

    public function getCdEstagio(): ?EstncEstagios
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?EstncEstagios $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
        return $this;
    }

    public function getCdPessoaRespondeu(): ?Pessoas
    {
        return $this->cdPessoaRespondeu;
    }

    public function setCdPessoaRespondeu(?Pessoas $cdPessoaRespondeu): self
    {
        $this->cdPessoaRespondeu = $cdPessoaRespondeu;
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

    public function getDtAvaliacao(): ?\DateTimeInterface
    {
        return $this->dtAvaliacao;
    }

    public function setDtAvaliacao(?\DateTimeInterface $dtAvaliacao): self
    {
        $this->dtAvaliacao = $dtAvaliacao;
        return $this;
    }

    public function getVlNotaFinal(): ?float
    {
        return $this->vlNotaFinal;
    }

    public function setVlNotaFinal(?float $vlNotaFinal): self
    {
        $this->vlNotaFinal = $vlNotaFinal;
        return $this;
    }

    public function getMeComentariosAvaliador(): ?string
    {
        return $this->meComentariosAvaliador;
    }

    public function setMeComentariosAvaliador(?string $meComentariosAvaliador): self
    {
        $this->meComentariosAvaliador = $meComentariosAvaliador;
        return $this;
    }

    public function getMeComentarios(): ?string
    {
        return $this->meComentarios;
    }

    public function setMeComentarios(?string $meComentarios): self
    {
        $this->meComentarios = $meComentarios;
        return $this;
    }

    public function getCdAvaliacaoAgendar(): ?EstncAvaliacoesAgendar
    {
        return $this->cdAvaliacaoAgendar;
    }

    public function setCdAvaliacaoAgendar(?EstncAvaliacoesAgendar $cdAvaliacaoAgendar): self
    {
        $this->cdAvaliacaoAgendar = $cdAvaliacaoAgendar;
        return $this;
    }
}
