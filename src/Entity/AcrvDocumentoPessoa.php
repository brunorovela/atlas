<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AcrvDocumentoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvDocumentoPessoaRepository::class)]
#[ORM\Table(
    name: 'acrv_documento_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_documento', columns: ['cd_documento'])]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_documento_pessoa_ibfk_1', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_documento_pessoa_ibfk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AcrvDocumentoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoPessoa = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer', nullable: true)]
    private ?int $cdDocumento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_nome_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeArquivo = null;

    #[ORM\Column(name: 'ds_nome_cache', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeCache = null;

    #[ORM\Column(name: 'ds_key_amazon', type: 'string', length: 255, nullable: true)]
    private ?string $dsKeyAmazon = null;

    #[ORM\Column(name: 'me_file_hash_sha1', type: 'text', length: 16777215, nullable: true)]
    private ?string $meFileHashSha1 = null;

    #[ORM\Column(name: 'ds_metadados_prazo_guarda', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosPrazoGuarda = null;

    #[ORM\Column(name: 'ds_metadados_genero', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosGenero = null;

    #[ORM\Column(name: 'ds_metadados_destinacao_prevista', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosDestinacaoPrevista = null;

    #[ORM\Column(name: 'ds_metadados_data_producao', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosDataProducao = null;

    #[ORM\Column(name: 'ds_metadados_classe', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosClasse = null;

    #[ORM\Column(name: 'ds_metadados_tipo_documental', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosTipoDocumental = null;

    #[ORM\Column(name: 'ds_metadados_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosTitulo = null;

    #[ORM\Column(name: 'ds_metadados_responsavel_digitalizacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosResponsavelDigitalizacao = null;

    #[ORM\Column(name: 'ds_metadados_data_local_digitalizacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosDataLocalDigitalizacao = null;

    #[ORM\Column(name: 'ds_metadados_autor', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosAutor = null;

    #[ORM\Column(name: 'ds_metadados_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetadadosAssunto = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdDocumento = null,
        ?Pessoas $cdPessoa = null,
        ?string $dsNomeArquivo = null,
        ?string $dsNomeCache = null,
        ?string $dsKeyAmazon = null,
        ?string $meFileHashSha1 = null,
        ?string $dsMetadadosPrazoGuarda = null,
        ?string $dsMetadadosGenero = null,
        ?string $dsMetadadosDestinacaoPrevista = null,
        ?string $dsMetadadosDataProducao = null,
        ?string $dsMetadadosClasse = null,
        ?string $dsMetadadosTipoDocumental = null,
        ?string $dsMetadadosTitulo = null,
        ?string $dsMetadadosResponsavelDigitalizacao = null,
        ?string $dsMetadadosDataLocalDigitalizacao = null,
        ?string $dsMetadadosAutor = null,
        ?string $dsMetadadosAssunto = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $snExcluido = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->cdPessoa = $cdPessoa;
        $this->dsNomeArquivo = $dsNomeArquivo;
        $this->dsNomeCache = $dsNomeCache;
        $this->dsKeyAmazon = $dsKeyAmazon;
        $this->meFileHashSha1 = $meFileHashSha1;
        $this->dsMetadadosPrazoGuarda = $dsMetadadosPrazoGuarda;
        $this->dsMetadadosGenero = $dsMetadadosGenero;
        $this->dsMetadadosDestinacaoPrevista = $dsMetadadosDestinacaoPrevista;
        $this->dsMetadadosDataProducao = $dsMetadadosDataProducao;
        $this->dsMetadadosClasse = $dsMetadadosClasse;
        $this->dsMetadadosTipoDocumental = $dsMetadadosTipoDocumental;
        $this->dsMetadadosTitulo = $dsMetadadosTitulo;
        $this->dsMetadadosResponsavelDigitalizacao = $dsMetadadosResponsavelDigitalizacao;
        $this->dsMetadadosDataLocalDigitalizacao = $dsMetadadosDataLocalDigitalizacao;
        $this->dsMetadadosAutor = $dsMetadadosAutor;
        $this->dsMetadadosAssunto = $dsMetadadosAssunto;
        $this->dtCadastro = $dtCadastro;
        $this->snExcluido = $snExcluido;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumentoPessoa(): ?int
    {
        return $this->cdDocumentoPessoa;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
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

    public function getDsNomeArquivo(): ?string
    {
        return $this->dsNomeArquivo;
    }

    public function setDsNomeArquivo(?string $dsNomeArquivo): self
    {
        $this->dsNomeArquivo = $dsNomeArquivo;
        return $this;
    }

    public function getDsNomeCache(): ?string
    {
        return $this->dsNomeCache;
    }

    public function setDsNomeCache(?string $dsNomeCache): self
    {
        $this->dsNomeCache = $dsNomeCache;
        return $this;
    }

    public function getDsKeyAmazon(): ?string
    {
        return $this->dsKeyAmazon;
    }

    public function setDsKeyAmazon(?string $dsKeyAmazon): self
    {
        $this->dsKeyAmazon = $dsKeyAmazon;
        return $this;
    }

    public function getMeFileHashSha1(): ?string
    {
        return $this->meFileHashSha1;
    }

    public function setMeFileHashSha1(?string $meFileHashSha1): self
    {
        $this->meFileHashSha1 = $meFileHashSha1;
        return $this;
    }

    public function getDsMetadadosPrazoGuarda(): ?string
    {
        return $this->dsMetadadosPrazoGuarda;
    }

    public function setDsMetadadosPrazoGuarda(?string $dsMetadadosPrazoGuarda): self
    {
        $this->dsMetadadosPrazoGuarda = $dsMetadadosPrazoGuarda;
        return $this;
    }

    public function getDsMetadadosGenero(): ?string
    {
        return $this->dsMetadadosGenero;
    }

    public function setDsMetadadosGenero(?string $dsMetadadosGenero): self
    {
        $this->dsMetadadosGenero = $dsMetadadosGenero;
        return $this;
    }

    public function getDsMetadadosDestinacaoPrevista(): ?string
    {
        return $this->dsMetadadosDestinacaoPrevista;
    }

    public function setDsMetadadosDestinacaoPrevista(?string $dsMetadadosDestinacaoPrevista): self
    {
        $this->dsMetadadosDestinacaoPrevista = $dsMetadadosDestinacaoPrevista;
        return $this;
    }

    public function getDsMetadadosDataProducao(): ?string
    {
        return $this->dsMetadadosDataProducao;
    }

    public function setDsMetadadosDataProducao(?string $dsMetadadosDataProducao): self
    {
        $this->dsMetadadosDataProducao = $dsMetadadosDataProducao;
        return $this;
    }

    public function getDsMetadadosClasse(): ?string
    {
        return $this->dsMetadadosClasse;
    }

    public function setDsMetadadosClasse(?string $dsMetadadosClasse): self
    {
        $this->dsMetadadosClasse = $dsMetadadosClasse;
        return $this;
    }

    public function getDsMetadadosTipoDocumental(): ?string
    {
        return $this->dsMetadadosTipoDocumental;
    }

    public function setDsMetadadosTipoDocumental(?string $dsMetadadosTipoDocumental): self
    {
        $this->dsMetadadosTipoDocumental = $dsMetadadosTipoDocumental;
        return $this;
    }

    public function getDsMetadadosTitulo(): ?string
    {
        return $this->dsMetadadosTitulo;
    }

    public function setDsMetadadosTitulo(?string $dsMetadadosTitulo): self
    {
        $this->dsMetadadosTitulo = $dsMetadadosTitulo;
        return $this;
    }

    public function getDsMetadadosResponsavelDigitalizacao(): ?string
    {
        return $this->dsMetadadosResponsavelDigitalizacao;
    }

    public function setDsMetadadosResponsavelDigitalizacao(?string $dsMetadadosResponsavelDigitalizacao): self
    {
        $this->dsMetadadosResponsavelDigitalizacao = $dsMetadadosResponsavelDigitalizacao;
        return $this;
    }

    public function getDsMetadadosDataLocalDigitalizacao(): ?string
    {
        return $this->dsMetadadosDataLocalDigitalizacao;
    }

    public function setDsMetadadosDataLocalDigitalizacao(?string $dsMetadadosDataLocalDigitalizacao): self
    {
        $this->dsMetadadosDataLocalDigitalizacao = $dsMetadadosDataLocalDigitalizacao;
        return $this;
    }

    public function getDsMetadadosAutor(): ?string
    {
        return $this->dsMetadadosAutor;
    }

    public function setDsMetadadosAutor(?string $dsMetadadosAutor): self
    {
        $this->dsMetadadosAutor = $dsMetadadosAutor;
        return $this;
    }

    public function getDsMetadadosAssunto(): ?string
    {
        return $this->dsMetadadosAssunto;
    }

    public function setDsMetadadosAssunto(?string $dsMetadadosAssunto): self
    {
        $this->dsMetadadosAssunto = $dsMetadadosAssunto;
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

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
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
