<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AgdRegrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgdRegrasRepository::class)]
#[ORM\Table(
    name: 'agd_regras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_AGD_REGRAS_CD_GRUPO_ORIGEM', columns: ['cd_grupo_origem'])]
#[ORM\Index(name: 'IDX_AGD_REGRAS_CD_GRUPO_DESTINO', columns: ['cd_grupo_destino'])]
#[ORM\Index(name: 'IX_CD_GRUPO_ORIGEM', columns: ['cd_grupo_origem'])]
#[ORM\Index(name: 'IX_CD_GRUPO_DESTINO', columns: ['cd_grupo_destino'])]
#[ORM\Index(name: 'cd_coligada', columns: ['cd_coligada'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'agd_regras_ibfk_1', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_AGD_REGRAS_NU_GRUPOS_CD_GRUPO_DESTINO', 'colunas' => ['cd_grupo_destino'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_AGD_REGRAS_NU_GRUPOS_CD_GRUPO_ORIGEM', 'colunas' => ['cd_grupo_origem'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AgdRegras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra', type: 'integer')]
    private ?int $cdRegra = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_origem', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupoOrigem = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_destino', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupoDestino = null;

    #[ORM\Column(name: 'sn_visualiza_orientador_monografia', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snVisualizaOrientadorMonografia = 0;

    #[ORM\Column(name: 'sn_visualiza_pessoas_curso', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snVisualizaPessoasCurso = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Coligadas $cdColigada = null,
        ?NuGrupos $cdGrupoOrigem = null,
        ?NuGrupos $cdGrupoDestino = null,
        int $snVisualizaOrientadorMonografia = 0,
        int $snVisualizaPessoasCurso = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdGrupoOrigem = $cdGrupoOrigem;
        $this->cdGrupoDestino = $cdGrupoDestino;
        $this->snVisualizaOrientadorMonografia = $snVisualizaOrientadorMonografia;
        $this->snVisualizaPessoasCurso = $snVisualizaPessoasCurso;
        $this->dtBase = $dtBase;
    }

    public function getCdRegra(): ?int
    {
        return $this->cdRegra;
    }

    public function getCdColigada(): ?Coligadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?Coligadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdGrupoOrigem(): ?NuGrupos
    {
        return $this->cdGrupoOrigem;
    }

    public function setCdGrupoOrigem(?NuGrupos $cdGrupoOrigem): self
    {
        $this->cdGrupoOrigem = $cdGrupoOrigem;
        return $this;
    }

    public function getCdGrupoDestino(): ?NuGrupos
    {
        return $this->cdGrupoDestino;
    }

    public function setCdGrupoDestino(?NuGrupos $cdGrupoDestino): self
    {
        $this->cdGrupoDestino = $cdGrupoDestino;
        return $this;
    }

    public function getSnVisualizaOrientadorMonografia(): int
    {
        return $this->snVisualizaOrientadorMonografia;
    }

    public function setSnVisualizaOrientadorMonografia(int $snVisualizaOrientadorMonografia): self
    {
        $this->snVisualizaOrientadorMonografia = $snVisualizaOrientadorMonografia;
        return $this;
    }

    public function getSnVisualizaPessoasCurso(): int
    {
        return $this->snVisualizaPessoasCurso;
    }

    public function setSnVisualizaPessoasCurso(int $snVisualizaPessoasCurso): self
    {
        $this->snVisualizaPessoasCurso = $snVisualizaPessoasCurso;
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
