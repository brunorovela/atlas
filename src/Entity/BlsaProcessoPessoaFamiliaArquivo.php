<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BlsaProcessoPessoaFamiliaArquivoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlsaProcessoPessoaFamiliaArquivoRepository::class)]
#[ORM\Table(
    name: 'blsa_processo_pessoa_familia_arquivo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_blsa_processo_pessoa_familia_arquivo_documentos', columns: ['cd_processo_pessoa_familia'])]
#[ORM\Index(name: 'FK_cd_documento_documentos', columns: ['cd_documento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_blsa_processo_pessoa_familia_arquivo_documentos', 'colunas' => ['cd_processo_pessoa_familia'], 'tabelaAlvo' => 'blsa_processo_pessoa_familia', 'colunasAlvo' => ['cd_processo_pessoa_familia'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_documento_documentos', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BlsaProcessoPessoaFamiliaArquivo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo_pessoa_familia_arquivo', type: 'integer')]
    private ?int $cdProcessoPessoaFamiliaArquivo = null;

    #[ORM\ManyToOne(targetEntity: BlsaProcessoPessoaFamilia::class)]
    #[ORM\JoinColumn(name: 'cd_processo_pessoa_familia', referencedColumnName: 'cd_processo_pessoa_familia', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BlsaProcessoPessoaFamilia $cdProcessoPessoaFamilia = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'ds_path_amazon', type: 'string', length: 1000, nullable: true)]
    private ?string $dsPathAmazon = null;

    #[ORM\Column(name: 'vl_recebido', type: 'float', nullable: true)]
    private ?float $vlRecebido = null;

    #[ORM\Column(name: 'ds_outra_forma_renda', type: 'string', length: 255, nullable: true)]
    private ?string $dsOutraFormaRenda = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?BlsaProcessoPessoaFamilia $cdProcessoPessoaFamilia = null,
        ?int $cdDocumento = null,
        ?string $dsPathAmazon = null,
        ?float $vlRecebido = null,
        ?string $dsOutraFormaRenda = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdProcessoPessoaFamilia = $cdProcessoPessoaFamilia;
        $this->cdDocumento = $cdDocumento;
        $this->dsPathAmazon = $dsPathAmazon;
        $this->vlRecebido = $vlRecebido;
        $this->dsOutraFormaRenda = $dsOutraFormaRenda;
        $this->dtBase = $dtBase;
    }

    public function getCdProcessoPessoaFamiliaArquivo(): ?int
    {
        return $this->cdProcessoPessoaFamiliaArquivo;
    }

    public function getCdProcessoPessoaFamilia(): ?BlsaProcessoPessoaFamilia
    {
        return $this->cdProcessoPessoaFamilia;
    }

    public function setCdProcessoPessoaFamilia(?BlsaProcessoPessoaFamilia $cdProcessoPessoaFamilia): self
    {
        $this->cdProcessoPessoaFamilia = $cdProcessoPessoaFamilia;
        return $this;
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

    public function getDsPathAmazon(): ?string
    {
        return $this->dsPathAmazon;
    }

    public function setDsPathAmazon(?string $dsPathAmazon): self
    {
        $this->dsPathAmazon = $dsPathAmazon;
        return $this;
    }

    public function getVlRecebido(): ?float
    {
        return $this->vlRecebido;
    }

    public function setVlRecebido(?float $vlRecebido): self
    {
        $this->vlRecebido = $vlRecebido;
        return $this;
    }

    public function getDsOutraFormaRenda(): ?string
    {
        return $this->dsOutraFormaRenda;
    }

    public function setDsOutraFormaRenda(?string $dsOutraFormaRenda): self
    {
        $this->dsOutraFormaRenda = $dsOutraFormaRenda;
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
