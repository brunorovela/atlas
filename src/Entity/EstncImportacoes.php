<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncImportacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncImportacoesRepository::class)]
#[ORM\Table(
    name: 'estnc_importacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA_INICIOU', columns: ['cd_pessoa_iniciou'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_INSTITUICAO_IMPORTACAO', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOA_INI', 'colunas' => ['cd_pessoa_iniciou'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncImportacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdImportacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_iniciou', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaIniciou = null;

    #[ORM\Column(name: 'cd_pessoa_finalizou', type: 'integer')]
    private ?int $cdPessoaFinalizou = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'qtd_alunos_inclusao', type: 'integer', nullable: true)]
    private ?int $qtdAlunosInclusao = null;

    #[ORM\Column(name: 'qtd_alunos_alteracao', type: 'integer', nullable: true)]
    private ?int $qtdAlunosAlteracao = null;

    #[ORM\Column(name: 'qtd_alunos_erro', type: 'integer', nullable: true)]
    private ?int $qtdAlunosErro = null;

    #[ORM\Column(name: 'qtd_cursos_inclusao', type: 'integer', nullable: true)]
    private ?int $qtdCursosInclusao = null;

    #[ORM\Column(name: 'qtd_cursos_erro', type: 'integer', nullable: true)]
    private ?int $qtdCursosErro = null;

    #[ORM\Column(name: 'nr_passo', type: 'string', length: 50, nullable: true)]
    private ?string $nrPasso = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    #[ORM\Column(name: 'qtd_registros', type: 'integer', nullable: true)]
    private ?int $qtdRegistros = null;

    #[ORM\Column(name: 'nm_arquivo_original', type: 'string', length: 255, nullable: true)]
    private ?string $nmArquivoOriginal = null;

    public function __construct(
        ?Pessoas $cdPessoaIniciou = null,
        ?int $cdPessoaFinalizou = null,
        ?InstituicoesEnsino $cdInstituicao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $qtdAlunosInclusao = null,
        ?int $qtdAlunosAlteracao = null,
        ?int $qtdAlunosErro = null,
        ?int $qtdCursosInclusao = null,
        ?int $qtdCursosErro = null,
        ?string $nrPasso = null,
        ?string $dsArquivo = null,
        ?int $qtdRegistros = null,
        ?string $nmArquivoOriginal = null
    ) {
        $this->cdPessoaIniciou = $cdPessoaIniciou;
        $this->cdPessoaFinalizou = $cdPessoaFinalizou;
        $this->cdInstituicao = $cdInstituicao;
        $this->dtCadastro = $dtCadastro;
        $this->qtdAlunosInclusao = $qtdAlunosInclusao;
        $this->qtdAlunosAlteracao = $qtdAlunosAlteracao;
        $this->qtdAlunosErro = $qtdAlunosErro;
        $this->qtdCursosInclusao = $qtdCursosInclusao;
        $this->qtdCursosErro = $qtdCursosErro;
        $this->nrPasso = $nrPasso;
        $this->dsArquivo = $dsArquivo;
        $this->qtdRegistros = $qtdRegistros;
        $this->nmArquivoOriginal = $nmArquivoOriginal;
    }

    public function getCdImportacao(): ?int
    {
        return $this->cdImportacao;
    }

    public function getCdPessoaIniciou(): ?Pessoas
    {
        return $this->cdPessoaIniciou;
    }

    public function setCdPessoaIniciou(?Pessoas $cdPessoaIniciou): self
    {
        $this->cdPessoaIniciou = $cdPessoaIniciou;
        return $this;
    }

    public function getCdPessoaFinalizou(): ?int
    {
        return $this->cdPessoaFinalizou;
    }

    public function setCdPessoaFinalizou(?int $cdPessoaFinalizou): self
    {
        $this->cdPessoaFinalizou = $cdPessoaFinalizou;
        return $this;
    }

    public function getCdInstituicao(): ?InstituicoesEnsino
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?InstituicoesEnsino $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
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

    public function getQtdAlunosInclusao(): ?int
    {
        return $this->qtdAlunosInclusao;
    }

    public function setQtdAlunosInclusao(?int $qtdAlunosInclusao): self
    {
        $this->qtdAlunosInclusao = $qtdAlunosInclusao;
        return $this;
    }

    public function getQtdAlunosAlteracao(): ?int
    {
        return $this->qtdAlunosAlteracao;
    }

    public function setQtdAlunosAlteracao(?int $qtdAlunosAlteracao): self
    {
        $this->qtdAlunosAlteracao = $qtdAlunosAlteracao;
        return $this;
    }

    public function getQtdAlunosErro(): ?int
    {
        return $this->qtdAlunosErro;
    }

    public function setQtdAlunosErro(?int $qtdAlunosErro): self
    {
        $this->qtdAlunosErro = $qtdAlunosErro;
        return $this;
    }

    public function getQtdCursosInclusao(): ?int
    {
        return $this->qtdCursosInclusao;
    }

    public function setQtdCursosInclusao(?int $qtdCursosInclusao): self
    {
        $this->qtdCursosInclusao = $qtdCursosInclusao;
        return $this;
    }

    public function getQtdCursosErro(): ?int
    {
        return $this->qtdCursosErro;
    }

    public function setQtdCursosErro(?int $qtdCursosErro): self
    {
        $this->qtdCursosErro = $qtdCursosErro;
        return $this;
    }

    public function getNrPasso(): ?string
    {
        return $this->nrPasso;
    }

    public function setNrPasso(?string $nrPasso): self
    {
        $this->nrPasso = $nrPasso;
        return $this;
    }

    public function getDsArquivo(): ?string
    {
        return $this->dsArquivo;
    }

    public function setDsArquivo(?string $dsArquivo): self
    {
        $this->dsArquivo = $dsArquivo;
        return $this;
    }

    public function getQtdRegistros(): ?int
    {
        return $this->qtdRegistros;
    }

    public function setQtdRegistros(?int $qtdRegistros): self
    {
        $this->qtdRegistros = $qtdRegistros;
        return $this;
    }

    public function getNmArquivoOriginal(): ?string
    {
        return $this->nmArquivoOriginal;
    }

    public function setNmArquivoOriginal(?string $nmArquivoOriginal): self
    {
        $this->nmArquivoOriginal = $nmArquivoOriginal;
        return $this;
    }
}
