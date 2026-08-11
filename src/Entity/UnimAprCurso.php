<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimAprCursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAprCursoRepository::class)]
#[ORM\Table(
    name: 'unim_apr_curso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_UNIM_APR_CURSO_CD_APP_PERFIL', columns: ['cd_app_perfil'])]
#[ORM\Index(name: 'IX_UNIM_APR_CURSO_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_UNIM_APR_CURSO_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[ORM\Index(name: 'IX_UNIM_APR_CURSO_CD_CURSO', columns: ['cd_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_apr_curso_ibfk_2', 'colunas' => ['cd_app_perfil'], 'tabelaAlvo' => 'unim_app_perfil', 'colunasAlvo' => ['cd_app_perfil'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_apr_curso_ibfk_3', 'colunas' => ['cd_departamento'], 'tabelaAlvo' => 'departamentos', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_apr_curso_ibfk_4', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_apr_curso_ibfk_5', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'cursos_mestre', 'colunasAlvo' => ['CD_CURSO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimAprCurso
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UnimAppPerfil::class)]
    #[ORM\JoinColumn(name: 'cd_app_perfil', referencedColumnName: 'cd_app_perfil', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppPerfil $cdAppPerfil = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_departamento', type: 'smallint')]
    private ?int $cdDepartamento = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CursosMestre::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'CD_CURSO', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CursosMestre $cdCurso = null;

    public function __construct(
        ?UnimAppPerfil $cdAppPerfil = null,
        ?Coligadas $cdColigada = null,
        ?int $cdDepartamento = null,
        ?CursosMestre $cdCurso = null
    ) {
        $this->cdAppPerfil = $cdAppPerfil;
        $this->cdColigada = $cdColigada;
        $this->cdDepartamento = $cdDepartamento;
        $this->cdCurso = $cdCurso;
    }

    public function getCdAppPerfil(): ?UnimAppPerfil
    {
        return $this->cdAppPerfil;
    }

    public function setCdAppPerfil(?UnimAppPerfil $cdAppPerfil): self
    {
        $this->cdAppPerfil = $cdAppPerfil;
        return $this;
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

    public function getCdDepartamento(): ?int
    {
        return $this->cdDepartamento;
    }

    public function setCdDepartamento(?int $cdDepartamento): self
    {
        $this->cdDepartamento = $cdDepartamento;
        return $this;
    }

    public function getCdCurso(): ?CursosMestre
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?CursosMestre $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }
}
