<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncTitulosVisualizadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncTitulosVisualizadosRepository::class)]
#[ORM\Table(
    name: 'estnc_titulos_visualizados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TITULOS_VISUALIZADOS_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'FK_TITULOS_VISUALIZADOS_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'FK_TITULOS_VISUALIZADOS_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'FK_TITULOS_VISUALIZADOS_TITULO_SITUACAO', columns: ['cd_titulo_situacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO_SITUACAO', columns: ['cd_titulo_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TITULOS_VISUALIZADOS_GRUPO', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TITULOS_VISUALIZADOS_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TITULOS_VISUALIZADOS_TITULO', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'estnc_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TITULOS_VISUALIZADOS_TITULO_SITUACAO', 'colunas' => ['cd_titulo_situacao'], 'tabelaAlvo' => 'estnc_titulos_situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncTitulosVisualizados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_visualizacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVisualizacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\ManyToOne(targetEntity: EstncTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncTitulos $cdTitulo = null;

    #[ORM\Column(name: 'dt_visualizacao', type: 'datetime')]
    private ?\DateTimeInterface $dtVisualizacao = null;

    #[ORM\ManyToOne(targetEntity: EstncTitulosSituacoes::class)]
    #[ORM\JoinColumn(name: 'cd_titulo_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncTitulosSituacoes $cdTituloSituacao = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?NuGrupos $cdGrupo = null,
        ?EstncTitulos $cdTitulo = null,
        ?\DateTimeInterface $dtVisualizacao = null,
        ?EstncTitulosSituacoes $cdTituloSituacao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdGrupo = $cdGrupo;
        $this->cdTitulo = $cdTitulo;
        $this->dtVisualizacao = $dtVisualizacao;
        $this->cdTituloSituacao = $cdTituloSituacao;
    }

    public function getCdVisualizacao(): ?int
    {
        return $this->cdVisualizacao;
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

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdTitulo(): ?EstncTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?EstncTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getDtVisualizacao(): ?\DateTimeInterface
    {
        return $this->dtVisualizacao;
    }

    public function setDtVisualizacao(?\DateTimeInterface $dtVisualizacao): self
    {
        $this->dtVisualizacao = $dtVisualizacao;
        return $this;
    }

    public function getCdTituloSituacao(): ?EstncTitulosSituacoes
    {
        return $this->cdTituloSituacao;
    }

    public function setCdTituloSituacao(?EstncTitulosSituacoes $cdTituloSituacao): self
    {
        $this->cdTituloSituacao = $cdTituloSituacao;
        return $this;
    }
}
