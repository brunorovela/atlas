<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauConteudoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauConteudoRepository::class)]
#[ORM\Table(
    name: 'plau_conteudo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_curso', columns: ['cd_curso'])]
#[ORM\Index(name: 'cd_pessoa_cadastro', columns: ['cd_pessoa_cadastro'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_CD_CURSO', columns: ['cd_disciplina', 'cd_curso'])]
#[ORM\Index(name: 'IDX_2B615E9DED06CCD7', columns: ['cd_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_conteudo_ibfk_1', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_conteudo_ibfk_2', 'colunas' => ['cd_disciplina'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_conteudo_ibfk_3', 'colunas' => ['cd_pessoa_cadastro'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauConteudo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conteudo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConteudo = null;

    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_cadastro', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaCadastro = null;

    #[ORM\Column(name: 'nr_serie', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrSerie = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snObrigatorio = null;

    public function __construct(
        ?CursosMestre $cdCurso = null,
        ?int $cdDisciplina = null,
        ?Pessoas $cdPessoaCadastro = null,
        ?int $nrSerie = null,
        ?string $dsTitulo = null,
        ?string $meDescricao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?int $snAtivo = null,
        ?int $snObrigatorio = null
    ) {
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdPessoaCadastro = $cdPessoaCadastro;
        $this->nrSerie = $nrSerie;
        $this->dsTitulo = $dsTitulo;
        $this->meDescricao = $meDescricao;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
        $this->snAtivo = $snAtivo;
        $this->snObrigatorio = $snObrigatorio;
    }

    public function getCdConteudo(): ?int
    {
        return $this->cdConteudo;
    }

    public function getCdCurso(): ?CursosMestre
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosMestre $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getCdPessoaCadastro(): ?Pessoas
    {
        return $this->cdPessoaCadastro;
    }

    public function setCdPessoaCadastro(?Pessoas $cdPessoaCadastro): self
    {
        $this->cdPessoaCadastro = $cdPessoaCadastro;
        return $this;
    }

    public function getNrSerie(): ?int
    {
        return $this->nrSerie;
    }

    public function setNrSerie(?int $nrSerie): self
    {
        $this->nrSerie = $nrSerie;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
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

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnObrigatorio(): ?int
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(?int $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }
}
