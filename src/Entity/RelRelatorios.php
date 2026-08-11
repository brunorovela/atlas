<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RelRelatoriosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelRelatoriosRepository::class)]
#[ORM\Table(
    name: 'rel_relatorios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_relatorios_grupo_descricao', columns: ['cd_grupo', 'ds_relatorio'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_grupo_cd_grupo', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'rel_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RelRelatorios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_relatorio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: RelGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RelGrupos $cdGrupo = null;

    #[ORM\Column(name: 'cd_cabecalho', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCabecalho = null;

    #[ORM\Column(name: 'ds_relatorio', type: 'string', length: 255)]
    private ?string $dsRelatorio = null;

    #[ORM\Column(name: 'ds_permissao', type: 'string', length: 50, nullable: true)]
    private ?string $dsPermissao = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 65535, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'me_sql_antes', type: 'text', length: 65535, nullable: true)]
    private ?string $meSqlAntes = null;

    #[ORM\Column(name: 'me_sql_depois', type: 'text', length: 65535, nullable: true)]
    private ?string $meSqlDepois = null;

    #[ORM\Column(name: 'ds_formula_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormulaGrupo = null;

    #[ORM\Column(name: 'ds_ordem', type: 'string', length: 255, nullable: true)]
    private ?string $dsOrdem = null;

    #[ORM\Column(name: 'me_relatorio', type: 'blob', length: 65535, nullable: true)]
    private ?string $meRelatorio = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    public function __construct(
        ?RelGrupos $cdGrupo = null,
        ?int $cdCabecalho = null,
        ?string $dsRelatorio = null,
        ?string $dsPermissao = null,
        ?string $meDescricao = null,
        ?string $meSqlAntes = null,
        ?string $meSqlDepois = null,
        ?string $dsFormulaGrupo = null,
        ?string $dsOrdem = null,
        ?string $meRelatorio = null,
        ?int $snAtivo = 1
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdCabecalho = $cdCabecalho;
        $this->dsRelatorio = $dsRelatorio;
        $this->dsPermissao = $dsPermissao;
        $this->meDescricao = $meDescricao;
        $this->meSqlAntes = $meSqlAntes;
        $this->meSqlDepois = $meSqlDepois;
        $this->dsFormulaGrupo = $dsFormulaGrupo;
        $this->dsOrdem = $dsOrdem;
        $this->meRelatorio = $meRelatorio;
        $this->snAtivo = $snAtivo;
    }

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
    }

    public function getCdGrupo(): ?RelGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?RelGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdCabecalho(): ?int
    {
        return $this->cdCabecalho;
    }

    public function setCdCabecalho(?int $cdCabecalho): self
    {
        $this->cdCabecalho = $cdCabecalho;
        return $this;
    }

    public function getDsRelatorio(): ?string
    {
        return $this->dsRelatorio;
    }

    public function setDsRelatorio(?string $dsRelatorio): self
    {
        $this->dsRelatorio = $dsRelatorio;
        return $this;
    }

    public function getDsPermissao(): ?string
    {
        return $this->dsPermissao;
    }

    public function setDsPermissao(?string $dsPermissao): self
    {
        $this->dsPermissao = $dsPermissao;
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

    public function getMeSqlAntes(): ?string
    {
        return $this->meSqlAntes;
    }

    public function setMeSqlAntes(?string $meSqlAntes): self
    {
        $this->meSqlAntes = $meSqlAntes;
        return $this;
    }

    public function getMeSqlDepois(): ?string
    {
        return $this->meSqlDepois;
    }

    public function setMeSqlDepois(?string $meSqlDepois): self
    {
        $this->meSqlDepois = $meSqlDepois;
        return $this;
    }

    public function getDsFormulaGrupo(): ?string
    {
        return $this->dsFormulaGrupo;
    }

    public function setDsFormulaGrupo(?string $dsFormulaGrupo): self
    {
        $this->dsFormulaGrupo = $dsFormulaGrupo;
        return $this;
    }

    public function getDsOrdem(): ?string
    {
        return $this->dsOrdem;
    }

    public function setDsOrdem(?string $dsOrdem): self
    {
        $this->dsOrdem = $dsOrdem;
        return $this;
    }

    public function getMeRelatorio(): ?string
    {
        return $this->meRelatorio;
    }

    public function setMeRelatorio(?string $meRelatorio): self
    {
        $this->meRelatorio = $meRelatorio;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
