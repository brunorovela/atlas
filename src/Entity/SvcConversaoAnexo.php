<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SvcConversaoAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcConversaoAnexoRepository::class)]
#[ORM\Table(
    name: 'svc_conversao_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_cd_tabela_anexo', columns: ['cd_tabela'])]
#[ORM\Index(name: 'fk_cd_tabela_conversao', columns: ['cd_tabela_conversao'])]
#[ORM\Index(name: 'IX_CD_TABELA', columns: ['cd_tabela'])]
#[ORM\Index(name: 'IX_CD_TABELA_CONVERSAO', columns: ['cd_tabela_conversao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_tabela_anexo', 'colunas' => ['cd_tabela'], 'tabelaAlvo' => 'nu_tabelas_arquivos', 'colunasAlvo' => ['cd_tabela'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cd_tabela_conversao', 'colunas' => ['cd_tabela_conversao'], 'tabelaAlvo' => 'nu_tabelas_arquivos', 'colunasAlvo' => ['cd_tabela'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SvcConversaoAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conversao_anexo', type: 'integer')]
    private ?int $cdConversaoAnexo = null;

    #[ORM\ManyToOne(targetEntity: NuTabelasArquivos::class)]
    #[ORM\JoinColumn(name: 'cd_tabela', referencedColumnName: 'cd_tabela', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuTabelasArquivos $cdTabela = null;

    #[ORM\ManyToOne(targetEntity: NuTabelasArquivos::class)]
    #[ORM\JoinColumn(name: 'cd_tabela_conversao', referencedColumnName: 'cd_tabela', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuTabelasArquivos $cdTabelaConversao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 100, nullable: true)]
    private ?string $dsEmail = null;

    public function __construct(
        ?NuTabelasArquivos $cdTabela = null,
        ?NuTabelasArquivos $cdTabelaConversao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsEmail = null
    ) {
        $this->cdTabela = $cdTabela;
        $this->cdTabelaConversao = $cdTabelaConversao;
        $this->dtCadastro = $dtCadastro;
        $this->dsEmail = $dsEmail;
    }

    public function getCdConversaoAnexo(): ?int
    {
        return $this->cdConversaoAnexo;
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

    public function getCdTabelaConversao(): ?NuTabelasArquivos
    {
        return $this->cdTabelaConversao;
    }

    public function setCdTabelaConversao(?NuTabelasArquivos $cdTabelaConversao): self
    {
        $this->cdTabelaConversao = $cdTabelaConversao;
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

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }
}
