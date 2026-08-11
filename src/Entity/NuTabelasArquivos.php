<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuTabelasArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTabelasArquivosRepository::class)]
#[ORM\Table(
    name: 'nu_tabelas_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_cd_banco_ds_tabela', columns: ['cd_banco', 'ds_tabela'])]
#[ORM\Index(name: 'fk_cd_modulo', columns: ['cd_modulo'])]
#[ORM\Index(name: 'fk_cd_banco', columns: ['cd_banco'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_BANCO', columns: ['cd_banco'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_banco', 'colunas' => ['cd_banco'], 'tabelaAlvo' => 'nu_tabelas_bancos', 'colunasAlvo' => ['cd_banco'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cd_modulo', 'colunas' => ['cd_modulo'], 'tabelaAlvo' => 'nu_modulos', 'colunasAlvo' => ['cd_modulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuTabelasArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tabela', type: 'integer')]
    private ?int $cdTabela = null;

    #[ORM\ManyToOne(targetEntity: NuModulos::class)]
    #[ORM\JoinColumn(name: 'cd_modulo', referencedColumnName: 'cd_modulo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuModulos $cdModulo = null;

    #[ORM\ManyToOne(targetEntity: NuTabelasBancos::class)]
    #[ORM\JoinColumn(name: 'cd_banco', referencedColumnName: 'cd_banco', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuTabelasBancos $cdBanco = null;

    #[ORM\Column(name: 'ds_tabela', type: 'string', length: 50, nullable: true)]
    private ?string $dsTabela = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    #[ORM\Column(name: 'sn_executando', type: 'boolean', nullable: true)]
    private ?bool $snExecutando = null;

    public function __construct(
        ?NuModulos $cdModulo = null,
        ?NuTabelasBancos $cdBanco = null,
        ?string $dsTabela = null,
        ?bool $snAtivo = null,
        ?bool $snExecutando = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->cdBanco = $cdBanco;
        $this->dsTabela = $dsTabela;
        $this->snAtivo = $snAtivo;
        $this->snExecutando = $snExecutando;
    }

    public function getCdTabela(): ?int
    {
        return $this->cdTabela;
    }

    public function getCdModulo(): ?NuModulos
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?NuModulos $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdBanco(): ?NuTabelasBancos
    {
        return $this->cdBanco;
    }

    public function setCdBanco(?NuTabelasBancos $cdBanco): self
    {
        $this->cdBanco = $cdBanco;
        return $this;
    }

    public function getDsTabela(): ?string
    {
        return $this->dsTabela;
    }

    public function setDsTabela(?string $dsTabela): self
    {
        $this->dsTabela = $dsTabela;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function isSnExecutando(): ?bool
    {
        return $this->snExecutando;
    }

    public function setSnExecutando(?bool $snExecutando): self
    {
        $this->snExecutando = $snExecutando;
        return $this;
    }
}
