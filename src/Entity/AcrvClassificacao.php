<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AcrvClassificacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvClassificacaoRepository::class)]
#[ORM\Table(
    name: 'acrv_classificacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_pessoa_classificacao', columns: ['cd_pessoa_classificacao'])]
#[ORM\Index(name: 'cd_siga', columns: ['cd_siga'])]
#[ORM\Index(name: 'cd_local', columns: ['cd_local'])]
#[ORM\Index(name: 'IX_CD_DOCUMENTO_PESSOA', columns: ['cd_documento_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_classificacao_ibfk_1', 'colunas' => ['cd_pessoa_classificacao'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_classificacao_ibfk_2', 'colunas' => ['cd_siga'], 'tabelaAlvo' => 'siga_tabela', 'colunasAlvo' => ['cd_siga'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_classificacao_ibfk_3', 'colunas' => ['cd_local'], 'tabelaAlvo' => 'siga_locais', 'colunasAlvo' => ['cd_local'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AcrvClassificacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_classificacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoClassificacao = null;

    #[ORM\Column(name: 'cd_documento_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_classificacao', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaClassificacao = null;

    #[ORM\ManyToOne(targetEntity: SigaTabela::class)]
    #[ORM\JoinColumn(name: 'cd_siga', referencedColumnName: 'cd_siga', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaTabela $cdSiga = null;

    #[ORM\ManyToOne(targetEntity: SigaLocais::class)]
    #[ORM\JoinColumn(name: 'cd_local', referencedColumnName: 'cd_local', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaLocais $cdLocal = null;

    #[ORM\Column(name: 'me_dados_busca', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDadosBusca = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'ds_autor', type: 'string', length: 255, nullable: true)]
    private ?string $dsAutor = null;

    #[ORM\Column(name: 'ds_data_local_digitalizacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDataLocalDigitalizacao = null;

    #[ORM\Column(name: 'ds_responsavel_digitalizacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsResponsavelDigitalizacao = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_tipo_documental', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoDocumental = null;

    #[ORM\Column(name: 'ds_classe', type: 'string', length: 255, nullable: true)]
    private ?string $dsClasse = null;

    #[ORM\Column(name: 'ds_data_producao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDataProducao = null;

    #[ORM\Column(name: 'ds_destinacao_prevista', type: 'string', length: 255, nullable: true)]
    private ?string $dsDestinacaoPrevista = null;

    #[ORM\Column(name: 'ds_genero', type: 'string', length: 255, nullable: true)]
    private ?string $dsGenero = null;

    #[ORM\Column(name: 'ds_prazo_guarda', type: 'string', length: 255, nullable: true)]
    private ?string $dsPrazoGuarda = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdDocumentoPessoa = null,
        ?Pessoas $cdPessoaClassificacao = null,
        ?SigaTabela $cdSiga = null,
        ?SigaLocais $cdLocal = null,
        ?string $meDadosBusca = null,
        ?string $dsAssunto = null,
        ?string $dsAutor = null,
        ?string $dsDataLocalDigitalizacao = null,
        ?string $dsResponsavelDigitalizacao = null,
        ?string $dsTitulo = null,
        ?string $dsTipoDocumental = null,
        ?string $dsClasse = null,
        ?string $dsDataProducao = null,
        ?string $dsDestinacaoPrevista = null,
        ?string $dsGenero = null,
        ?string $dsPrazoGuarda = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        $this->cdPessoaClassificacao = $cdPessoaClassificacao;
        $this->cdSiga = $cdSiga;
        $this->cdLocal = $cdLocal;
        $this->meDadosBusca = $meDadosBusca;
        $this->dsAssunto = $dsAssunto;
        $this->dsAutor = $dsAutor;
        $this->dsDataLocalDigitalizacao = $dsDataLocalDigitalizacao;
        $this->dsResponsavelDigitalizacao = $dsResponsavelDigitalizacao;
        $this->dsTitulo = $dsTitulo;
        $this->dsTipoDocumental = $dsTipoDocumental;
        $this->dsClasse = $dsClasse;
        $this->dsDataProducao = $dsDataProducao;
        $this->dsDestinacaoPrevista = $dsDestinacaoPrevista;
        $this->dsGenero = $dsGenero;
        $this->dsPrazoGuarda = $dsPrazoGuarda;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumentoClassificacao(): ?int
    {
        return $this->cdDocumentoClassificacao;
    }

    public function getCdDocumentoPessoa(): ?int
    {
        return $this->cdDocumentoPessoa;
    }

    public function setCdDocumentoPessoa(?int $cdDocumentoPessoa): self
    {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        return $this;
    }

    public function getCdPessoaClassificacao(): ?Pessoas
    {
        return $this->cdPessoaClassificacao;
    }

    public function setCdPessoaClassificacao(?Pessoas $cdPessoaClassificacao): self
    {
        $this->cdPessoaClassificacao = $cdPessoaClassificacao;
        return $this;
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

    public function getCdLocal(): ?SigaLocais
    {
        return $this->cdLocal;
    }

    public function setCdLocal(?SigaLocais $cdLocal): self
    {
        $this->cdLocal = $cdLocal;
        return $this;
    }

    public function getMeDadosBusca(): ?string
    {
        return $this->meDadosBusca;
    }

    public function setMeDadosBusca(?string $meDadosBusca): self
    {
        $this->meDadosBusca = $meDadosBusca;
        return $this;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getDsAutor(): ?string
    {
        return $this->dsAutor;
    }

    public function setDsAutor(?string $dsAutor): self
    {
        $this->dsAutor = $dsAutor;
        return $this;
    }

    public function getDsDataLocalDigitalizacao(): ?string
    {
        return $this->dsDataLocalDigitalizacao;
    }

    public function setDsDataLocalDigitalizacao(?string $dsDataLocalDigitalizacao): self
    {
        $this->dsDataLocalDigitalizacao = $dsDataLocalDigitalizacao;
        return $this;
    }

    public function getDsResponsavelDigitalizacao(): ?string
    {
        return $this->dsResponsavelDigitalizacao;
    }

    public function setDsResponsavelDigitalizacao(?string $dsResponsavelDigitalizacao): self
    {
        $this->dsResponsavelDigitalizacao = $dsResponsavelDigitalizacao;
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

    public function getDsTipoDocumental(): ?string
    {
        return $this->dsTipoDocumental;
    }

    public function setDsTipoDocumental(?string $dsTipoDocumental): self
    {
        $this->dsTipoDocumental = $dsTipoDocumental;
        return $this;
    }

    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    public function setDsClasse(?string $dsClasse): self
    {
        $this->dsClasse = $dsClasse;
        return $this;
    }

    public function getDsDataProducao(): ?string
    {
        return $this->dsDataProducao;
    }

    public function setDsDataProducao(?string $dsDataProducao): self
    {
        $this->dsDataProducao = $dsDataProducao;
        return $this;
    }

    public function getDsDestinacaoPrevista(): ?string
    {
        return $this->dsDestinacaoPrevista;
    }

    public function setDsDestinacaoPrevista(?string $dsDestinacaoPrevista): self
    {
        $this->dsDestinacaoPrevista = $dsDestinacaoPrevista;
        return $this;
    }

    public function getDsGenero(): ?string
    {
        return $this->dsGenero;
    }

    public function setDsGenero(?string $dsGenero): self
    {
        $this->dsGenero = $dsGenero;
        return $this;
    }

    public function getDsPrazoGuarda(): ?string
    {
        return $this->dsPrazoGuarda;
    }

    public function setDsPrazoGuarda(?string $dsPrazoGuarda): self
    {
        $this->dsPrazoGuarda = $dsPrazoGuarda;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
