<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCategoriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCategoriaRepository::class)]
#[ORM\Table(
    name: 'cmpr_categoria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_CATEGORIA_CD_CATEGORIA_PAI', columns: ['cd_categoria_pai'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_categoria_ibfk_1', 'colunas' => ['cd_categoria_pai'], 'tabelaAlvo' => 'cmpr_categoria', 'colunasAlvo' => ['cd_categoria'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCategoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCategoria = null;

    #[ORM\ManyToOne(targetEntity: CmprCategoria::class)]
    #[ORM\JoinColumn(name: 'cd_categoria_pai', referencedColumnName: 'cd_categoria', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCategoria $cdCategoriaPai = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'sn_autoriza_cotacao', type: 'boolean', options: ['default' => '1'])]
    private bool $snAutorizaCotacao = true;

    #[ORM\Column(name: 'sn_autoriza_compras', type: 'boolean', options: ['default' => '1'])]
    private bool $snAutorizaCompras = true;

    public function __construct(
        ?CmprCategoria $cdCategoriaPai = null,
        ?string $dsNome = null,
        ?int $snAtivo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        bool $snAutorizaCotacao = true,
        bool $snAutorizaCompras = true
    ) {
        $this->cdCategoriaPai = $cdCategoriaPai;
        $this->dsNome = $dsNome;
        $this->snAtivo = $snAtivo;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
        $this->snAutorizaCotacao = $snAutorizaCotacao;
        $this->snAutorizaCompras = $snAutorizaCompras;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function getCdCategoriaPai(): ?CmprCategoria
    {
        return $this->cdCategoriaPai;
    }

    public function setCdCategoriaPai(?CmprCategoria $cdCategoriaPai): self
    {
        $this->cdCategoriaPai = $cdCategoriaPai;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
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

    public function isSnAutorizaCotacao(): bool
    {
        return $this->snAutorizaCotacao;
    }

    public function setSnAutorizaCotacao(bool $snAutorizaCotacao): self
    {
        $this->snAutorizaCotacao = $snAutorizaCotacao;
        return $this;
    }

    public function isSnAutorizaCompras(): bool
    {
        return $this->snAutorizaCompras;
    }

    public function setSnAutorizaCompras(bool $snAutorizaCompras): self
    {
        $this->snAutorizaCompras = $snAutorizaCompras;
        return $this;
    }
}
