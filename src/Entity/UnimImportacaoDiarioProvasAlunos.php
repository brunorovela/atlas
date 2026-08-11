<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimImportacaoDiarioProvasAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimImportacaoDiarioProvasAlunosRepository::class)]
#[ORM\Table(
    name: 'unim_importacao_diario_provas_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_unim_importacao_diario_provas_alunos_pessoas', columns: ['cd_pessoa_upload'])]
#[ORM\Index(name: 'FK_unim_importacao_diario_provas_alunos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[ORM\Index(name: 'FK_unim_importacao_diario_provas_alunos_regras_conflito_nota', columns: ['cd_regra_conflito_nota'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_importacao_diario_provas_alunos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_importacao_diario_provas_alunos_pessoas', 'colunas' => ['cd_pessoa_upload'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_importacao_diario_provas_alunos_regras_conflito_nota', 'colunas' => ['cd_regra_conflito_nota'], 'tabelaAlvo' => 'unim_importacao_regras_conflito_nota', 'colunasAlvo' => ['cd_regra_conflito_nota'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimImportacaoDiarioProvasAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importacao', type: 'integer')]
    private ?int $cdImportacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_upload', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaUpload = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\ManyToOne(targetEntity: UnimImportacaoRegrasConflitoNota::class)]
    #[ORM\JoinColumn(name: 'cd_regra_conflito_nota', referencedColumnName: 'cd_regra_conflito_nota', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimImportacaoRegrasConflitoNota $cdRegraConflitoNota = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    #[ORM\Column(name: 'ds_url_amazon_arquivo_original', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlAmazonArquivoOriginal = null;

    #[ORM\Column(name: 'ds_url_amazon_arquivo_retorno', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlAmazonArquivoRetorno = null;

    #[ORM\Column(name: 'sn_processando', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProcessando = false;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'dt_inicio_importacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioImportacao = null;

    #[ORM\Column(name: 'dt_fim_importacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimImportacao = null;

    #[ORM\Column(name: 'sn_calcular_media', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCalcularMedia = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoaUpload = null,
        ?ColigadasMatriz $cdColigadaMatriz = null,
        ?UnimImportacaoRegrasConflitoNota $cdRegraConflitoNota = null,
        ?string $dsArquivo = null,
        ?string $dsUrlAmazonArquivoOriginal = null,
        ?string $dsUrlAmazonArquivoRetorno = null,
        ?bool $snProcessando = false,
        ?string $meObservacao = null,
        ?\DateTimeInterface $dtInicioImportacao = null,
        ?\DateTimeInterface $dtFimImportacao = null,
        ?bool $snCalcularMedia = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoaUpload = $cdPessoaUpload;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->cdRegraConflitoNota = $cdRegraConflitoNota;
        $this->dsArquivo = $dsArquivo;
        $this->dsUrlAmazonArquivoOriginal = $dsUrlAmazonArquivoOriginal;
        $this->dsUrlAmazonArquivoRetorno = $dsUrlAmazonArquivoRetorno;
        $this->snProcessando = $snProcessando;
        $this->meObservacao = $meObservacao;
        $this->dtInicioImportacao = $dtInicioImportacao;
        $this->dtFimImportacao = $dtFimImportacao;
        $this->snCalcularMedia = $snCalcularMedia;
        $this->dtBase = $dtBase;
    }

    public function getCdImportacao(): ?int
    {
        return $this->cdImportacao;
    }

    public function getCdPessoaUpload(): ?Pessoas
    {
        return $this->cdPessoaUpload;
    }

    public function setCdPessoaUpload(?Pessoas $cdPessoaUpload): self
    {
        $this->cdPessoaUpload = $cdPessoaUpload;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getCdRegraConflitoNota(): ?UnimImportacaoRegrasConflitoNota
    {
        return $this->cdRegraConflitoNota;
    }

    public function setCdRegraConflitoNota(?UnimImportacaoRegrasConflitoNota $cdRegraConflitoNota): self
    {
        $this->cdRegraConflitoNota = $cdRegraConflitoNota;
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

    public function getDsUrlAmazonArquivoOriginal(): ?string
    {
        return $this->dsUrlAmazonArquivoOriginal;
    }

    public function setDsUrlAmazonArquivoOriginal(?string $dsUrlAmazonArquivoOriginal): self
    {
        $this->dsUrlAmazonArquivoOriginal = $dsUrlAmazonArquivoOriginal;
        return $this;
    }

    public function getDsUrlAmazonArquivoRetorno(): ?string
    {
        return $this->dsUrlAmazonArquivoRetorno;
    }

    public function setDsUrlAmazonArquivoRetorno(?string $dsUrlAmazonArquivoRetorno): self
    {
        $this->dsUrlAmazonArquivoRetorno = $dsUrlAmazonArquivoRetorno;
        return $this;
    }

    public function isSnProcessando(): ?bool
    {
        return $this->snProcessando;
    }

    public function setSnProcessando(?bool $snProcessando): self
    {
        $this->snProcessando = $snProcessando;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getDtInicioImportacao(): ?\DateTimeInterface
    {
        return $this->dtInicioImportacao;
    }

    public function setDtInicioImportacao(?\DateTimeInterface $dtInicioImportacao): self
    {
        $this->dtInicioImportacao = $dtInicioImportacao;
        return $this;
    }

    public function getDtFimImportacao(): ?\DateTimeInterface
    {
        return $this->dtFimImportacao;
    }

    public function setDtFimImportacao(?\DateTimeInterface $dtFimImportacao): self
    {
        $this->dtFimImportacao = $dtFimImportacao;
        return $this;
    }

    public function isSnCalcularMedia(): ?bool
    {
        return $this->snCalcularMedia;
    }

    public function setSnCalcularMedia(?bool $snCalcularMedia): self
    {
        $this->snCalcularMedia = $snCalcularMedia;
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
