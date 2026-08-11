<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AcrvDocumentoAssinadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvDocumentoAssinadoRepository::class)]
#[ORM\Table(
    name: 'acrv_documento_assinado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_assinatura_pessoa', columns: ['cd_assinatura_pessoa'])]
#[ORM\Index(name: 'cd_documento_pessoa', columns: ['cd_documento_pessoa'])]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_documento_assinado_ibfk_1', 'colunas' => ['cd_assinatura_pessoa'], 'tabelaAlvo' => 'acrv_assinatura_pessoa', 'colunasAlvo' => ['cd_assinatura_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_documento_assinado_ibfk_2', 'colunas' => ['cd_documento_pessoa'], 'tabelaAlvo' => 'acrv_documento_pessoa', 'colunasAlvo' => ['cd_documento_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_documento_assinado_ibfk_3', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AcrvDocumentoAssinado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_assinado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoAssinado = null;

    #[ORM\ManyToOne(targetEntity: AcrvAssinaturaPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_assinatura_pessoa', referencedColumnName: 'cd_assinatura_pessoa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvAssinaturaPessoa $cdAssinaturaPessoa = null;

    #[ORM\ManyToOne(targetEntity: AcrvDocumentoPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_documento_pessoa', referencedColumnName: 'cd_documento_pessoa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvDocumentoPessoa $cdDocumentoPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_nome_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeArquivo = null;

    #[ORM\Column(name: 'ds_key_amazon', type: 'string', length: 255, nullable: true)]
    private ?string $dsKeyAmazon = null;

    #[ORM\Column(name: 'ds_time_modificacao_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTimeModificacaoArquivo = null;

    #[ORM\Column(name: 'me_file_hash_sha1', type: 'text', length: 16777215, nullable: true)]
    private ?string $meFileHashSha1 = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?AcrvAssinaturaPessoa $cdAssinaturaPessoa = null,
        ?AcrvDocumentoPessoa $cdDocumentoPessoa = null,
        ?Pessoas $cdPessoa = null,
        ?string $dsNomeArquivo = null,
        ?string $dsKeyAmazon = null,
        ?string $dsTimeModificacaoArquivo = null,
        ?string $meFileHashSha1 = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAssinaturaPessoa = $cdAssinaturaPessoa;
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        $this->cdPessoa = $cdPessoa;
        $this->dsNomeArquivo = $dsNomeArquivo;
        $this->dsKeyAmazon = $dsKeyAmazon;
        $this->dsTimeModificacaoArquivo = $dsTimeModificacaoArquivo;
        $this->meFileHashSha1 = $meFileHashSha1;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumentoAssinado(): ?int
    {
        return $this->cdDocumentoAssinado;
    }

    public function getCdAssinaturaPessoa(): ?AcrvAssinaturaPessoa
    {
        return $this->cdAssinaturaPessoa;
    }

    public function setCdAssinaturaPessoa(?AcrvAssinaturaPessoa $cdAssinaturaPessoa): self
    {
        $this->cdAssinaturaPessoa = $cdAssinaturaPessoa;
        return $this;
    }

    public function getCdDocumentoPessoa(): ?AcrvDocumentoPessoa
    {
        return $this->cdDocumentoPessoa;
    }

    public function setCdDocumentoPessoa(?AcrvDocumentoPessoa $cdDocumentoPessoa): self
    {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
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

    public function getDsKeyAmazon(): ?string
    {
        return $this->dsKeyAmazon;
    }

    public function setDsKeyAmazon(?string $dsKeyAmazon): self
    {
        $this->dsKeyAmazon = $dsKeyAmazon;
        return $this;
    }

    public function getDsTimeModificacaoArquivo(): ?string
    {
        return $this->dsTimeModificacaoArquivo;
    }

    public function setDsTimeModificacaoArquivo(?string $dsTimeModificacaoArquivo): self
    {
        $this->dsTimeModificacaoArquivo = $dsTimeModificacaoArquivo;
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
