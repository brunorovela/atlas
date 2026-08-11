<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuTabelasArquivosCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTabelasArquivosCamposRepository::class)]
#[ORM\Table(
    name: 'nu_tabelas_arquivos_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'unique_cd_tabela', columns: ['cd_tabela'])]
#[ORM\Index(name: 'IX_CD_TABELA', columns: ['cd_tabela'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_tabela_tabelas_arquivos', 'colunas' => ['cd_tabela'], 'tabelaAlvo' => 'nu_tabelas_arquivos', 'colunasAlvo' => ['cd_tabela'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuTabelasArquivosCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_campo', type: 'integer')]
    private ?int $cdCampo = null;

    #[ORM\ManyToOne(targetEntity: NuTabelasArquivos::class)]
    #[ORM\JoinColumn(name: 'cd_tabela', referencedColumnName: 'cd_tabela', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuTabelasArquivos $cdTabela = null;

    #[ORM\Column(name: 'ds_campo_arquivo_real', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoArquivoReal = null;

    #[ORM\Column(name: 'ds_campo_nm_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoNmArquivo = null;

    #[ORM\Column(name: 'ds_campo_tam_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoTamArquivo = null;

    #[ORM\Column(name: 'ds_campo_tipo_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoTipoArquivo = null;

    #[ORM\Column(name: 'ds_campo_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoChave = null;

    #[ORM\Column(name: 'ds_campo_codigo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoCodigo = null;

    #[ORM\Column(name: 'ds_campo_criptografia', type: 'enum', options: ['default' => 'NENHUM', 'values' => ['BASE64', 'NENHUM']])]
    private string $dsCampoCriptografia = 'NENHUM';

    #[ORM\Column(name: 'me_configuracoes', type: 'text', length: 65535, nullable: true)]
    private ?string $meConfiguracoes = null;

    public function __construct(
        ?NuTabelasArquivos $cdTabela = null,
        ?string $dsCampoArquivoReal = null,
        ?string $dsCampoNmArquivo = null,
        ?string $dsCampoTamArquivo = null,
        ?string $dsCampoTipoArquivo = null,
        ?string $dsCampoChave = null,
        ?string $dsCampoCodigo = null,
        string $dsCampoCriptografia = 'NENHUM',
        ?string $meConfiguracoes = null
    ) {
        $this->cdTabela = $cdTabela;
        $this->dsCampoArquivoReal = $dsCampoArquivoReal;
        $this->dsCampoNmArquivo = $dsCampoNmArquivo;
        $this->dsCampoTamArquivo = $dsCampoTamArquivo;
        $this->dsCampoTipoArquivo = $dsCampoTipoArquivo;
        $this->dsCampoChave = $dsCampoChave;
        $this->dsCampoCodigo = $dsCampoCodigo;
        $this->dsCampoCriptografia = $dsCampoCriptografia;
        $this->meConfiguracoes = $meConfiguracoes;
    }

    public function getCdCampo(): ?int
    {
        return $this->cdCampo;
    }

    public function getCdTabela(): ?NuTabelasArquivos
    {
        return $this->cdTabela;
    }

    public function setCdTabela(?NuTabelasArquivos $cdTabela): self
    {
        $this->cdTabela = $cdTabela;
        return $this;
    }

    public function getDsCampoArquivoReal(): ?string
    {
        return $this->dsCampoArquivoReal;
    }

    public function setDsCampoArquivoReal(?string $dsCampoArquivoReal): self
    {
        $this->dsCampoArquivoReal = $dsCampoArquivoReal;
        return $this;
    }

    public function getDsCampoNmArquivo(): ?string
    {
        return $this->dsCampoNmArquivo;
    }

    public function setDsCampoNmArquivo(?string $dsCampoNmArquivo): self
    {
        $this->dsCampoNmArquivo = $dsCampoNmArquivo;
        return $this;
    }

    public function getDsCampoTamArquivo(): ?string
    {
        return $this->dsCampoTamArquivo;
    }

    public function setDsCampoTamArquivo(?string $dsCampoTamArquivo): self
    {
        $this->dsCampoTamArquivo = $dsCampoTamArquivo;
        return $this;
    }

    public function getDsCampoTipoArquivo(): ?string
    {
        return $this->dsCampoTipoArquivo;
    }

    public function setDsCampoTipoArquivo(?string $dsCampoTipoArquivo): self
    {
        $this->dsCampoTipoArquivo = $dsCampoTipoArquivo;
        return $this;
    }

    public function getDsCampoChave(): ?string
    {
        return $this->dsCampoChave;
    }

    public function setDsCampoChave(?string $dsCampoChave): self
    {
        $this->dsCampoChave = $dsCampoChave;
        return $this;
    }

    public function getDsCampoCodigo(): ?string
    {
        return $this->dsCampoCodigo;
    }

    public function setDsCampoCodigo(?string $dsCampoCodigo): self
    {
        $this->dsCampoCodigo = $dsCampoCodigo;
        return $this;
    }

    public function getDsCampoCriptografia(): string
    {
        return $this->dsCampoCriptografia;
    }

    public function setDsCampoCriptografia(string $dsCampoCriptografia): self
    {
        $this->dsCampoCriptografia = $dsCampoCriptografia;
        return $this;
    }

    public function getMeConfiguracoes(): ?string
    {
        return $this->meConfiguracoes;
    }

    public function setMeConfiguracoes(?string $meConfiguracoes): self
    {
        $this->meConfiguracoes = $meConfiguracoes;
        return $this;
    }
}
