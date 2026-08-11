<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SigaDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigaDocumentosRepository::class)]
#[ORM\Table(
    name: 'siga_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_curso', columns: ['cd_curso', 'cd_coligada'])]
#[ORM\Index(name: 'IX_CD_SIGA', columns: ['cd_siga'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_LOCAL', columns: ['cd_local'])]
#[ORM\Index(name: 'IX_CD_UNI_DOCUMENTO', columns: ['cd_uni_documento'])]
#[ORM\Index(name: 'IX_CD_PESSOA_CADASTRO', columns: ['cd_pessoa_cadastro'])]
#[ORM\Index(name: 'IX_CD_PESSOA_DOC', columns: ['cd_pessoa_doc'])]
#[ORM\Index(name: 'IX_CD_PESSOA_RESP', columns: ['cd_pessoa_resp'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'siga_documentos_ibfk_1', 'colunas' => ['cd_uni_documento'], 'tabelaAlvo' => 'documentos', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_documentos_ibfk_2', 'colunas' => ['cd_local'], 'tabelaAlvo' => 'siga_locais', 'colunasAlvo' => ['cd_local'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_documentos_ibfk_3', 'colunas' => ['cd_siga'], 'tabelaAlvo' => 'siga_tabela', 'colunasAlvo' => ['cd_siga'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_documentos_ibfk_4', 'colunas' => ['cd_pessoa_cadastro'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_documentos_ibfk_5', 'colunas' => ['cd_pessoa_doc'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_documentos_ibfk_6', 'colunas' => ['cd_pessoa_resp'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_documentos_ibfk_7', 'colunas' => ['cd_curso', 'cd_coligada'], 'tabelaAlvo' => 'cursos_coligadas', 'colunasAlvo' => ['CD_CURSO', 'CD_COLIGADA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SigaDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumento = null;

    #[ORM\ManyToOne(targetEntity: SigaTabela::class)]
    #[ORM\JoinColumn(name: 'cd_siga', referencedColumnName: 'cd_siga', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaTabela $cdSiga = null;

    #[ORM\ManyToOne(targetEntity: CursosColigadas::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'CD_CURSO', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'CD_COLIGADA', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosColigadas $cdCurso = null;

    #[ORM\ManyToOne(targetEntity: SigaLocais::class)]
    #[ORM\JoinColumn(name: 'cd_local', referencedColumnName: 'cd_local', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaLocais $cdLocal = null;

    #[ORM\Column(name: 'cd_uni_documento', type: 'smallint', nullable: true)]
    private ?int $cdUniDocumento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_cadastro', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaCadastro = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_doc', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDoc = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_resp', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaResp = null;

    #[ORM\Column(name: 'nr_codigo_siga', type: 'integer', nullable: true)]
    private ?int $nrCodigoSiga = null;

    #[ORM\Column(name: 'ds_codigo_siga', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodigoSiga = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'cd_origem_documento', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $cdOrigemDocumento = true;

    #[ORM\Column(name: 'nm_arquivo_anexo', type: 'string', length: 255, nullable: true, options: ['comment' => 'Somente preenchido quando o campo cd_origem_anexo for 1'])]
    private ?string $nmArquivoAnexo = null;

    public function __construct(
        ?SigaTabela $cdSiga = null,
        ?CursosColigadas $cdCurso = null,
        ?SigaLocais $cdLocal = null,
        ?int $cdUniDocumento = null,
        ?Pessoas $cdPessoaCadastro = null,
        ?Pessoas $cdPessoaDoc = null,
        ?Pessoas $cdPessoaResp = null,
        ?int $nrCodigoSiga = null,
        ?string $dsCodigoSiga = null,
        ?string $meDescricao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?bool $cdOrigemDocumento = true,
        ?string $nmArquivoAnexo = null
    ) {
        $this->cdSiga = $cdSiga;
        $this->cdCurso = $cdCurso;
        $this->cdLocal = $cdLocal;
        $this->cdUniDocumento = $cdUniDocumento;
        $this->cdPessoaCadastro = $cdPessoaCadastro;
        $this->cdPessoaDoc = $cdPessoaDoc;
        $this->cdPessoaResp = $cdPessoaResp;
        $this->nrCodigoSiga = $nrCodigoSiga;
        $this->dsCodigoSiga = $dsCodigoSiga;
        $this->meDescricao = $meDescricao;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdOrigemDocumento = $cdOrigemDocumento;
        $this->nmArquivoAnexo = $nmArquivoAnexo;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function getCdSiga(): ?SigaTabela
    {
        return $this->cdSiga;
    }

    public function setCdSiga(?SigaTabela $cdSiga): self
    {
        $this->cdSiga = $cdSiga;
        return $this;
    }

    public function getCdCurso(): ?CursosColigadas
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosColigadas $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdLocal(): ?SigaLocais
    {
        return $this->cdLocal;
    }

    public function setCdLocal(?SigaLocais $cdLocal): self
    {
        $this->cdLocal = $cdLocal;
        return $this;
    }

    public function getCdUniDocumento(): ?int
    {
        return $this->cdUniDocumento;
    }

    public function setCdUniDocumento(?int $cdUniDocumento): self
    {
        $this->cdUniDocumento = $cdUniDocumento;
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

    public function getCdPessoaDoc(): ?Pessoas
    {
        return $this->cdPessoaDoc;
    }

    public function setCdPessoaDoc(?Pessoas $cdPessoaDoc): self
    {
        $this->cdPessoaDoc = $cdPessoaDoc;
        return $this;
    }

    public function getCdPessoaResp(): ?Pessoas
    {
        return $this->cdPessoaResp;
    }

    public function setCdPessoaResp(?Pessoas $cdPessoaResp): self
    {
        $this->cdPessoaResp = $cdPessoaResp;
        return $this;
    }

    public function getNrCodigoSiga(): ?int
    {
        return $this->nrCodigoSiga;
    }

    public function setNrCodigoSiga(?int $nrCodigoSiga): self
    {
        $this->nrCodigoSiga = $nrCodigoSiga;
        return $this;
    }

    public function getDsCodigoSiga(): ?string
    {
        return $this->dsCodigoSiga;
    }

    public function setDsCodigoSiga(?string $dsCodigoSiga): self
    {
        $this->dsCodigoSiga = $dsCodigoSiga;
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

    public function isCdOrigemDocumento(): ?bool
    {
        return $this->cdOrigemDocumento;
    }

    public function setCdOrigemDocumento(?bool $cdOrigemDocumento): self
    {
        $this->cdOrigemDocumento = $cdOrigemDocumento;
        return $this;
    }

    public function getNmArquivoAnexo(): ?string
    {
        return $this->nmArquivoAnexo;
    }

    public function setNmArquivoAnexo(?string $nmArquivoAnexo): self
    {
        $this->nmArquivoAnexo = $nmArquivoAnexo;
        return $this;
    }
}
