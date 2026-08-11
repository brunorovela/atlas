<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimAprDepartamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAprDepartamentoRepository::class)]
#[ORM\Table(
    name: 'unim_apr_departamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_UNIM_APR_DEPARTAMENTO_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[ORM\Index(name: 'IX_UNIM_APR_DEPARTAMENTO_CD_APP_PERFIL', columns: ['cd_app_perfil'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_apr_departamento_ibfk_2', 'colunas' => ['cd_app_perfil'], 'tabelaAlvo' => 'unim_app_perfil', 'colunasAlvo' => ['cd_app_perfil'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_apr_departamento_ibfk_3', 'colunas' => ['cd_departamento'], 'tabelaAlvo' => 'departamentos', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimAprDepartamento
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UnimAppPerfil::class)]
    #[ORM\JoinColumn(name: 'cd_app_perfil', referencedColumnName: 'cd_app_perfil', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppPerfil $cdAppPerfil = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_departamento', type: 'smallint')]
    private ?int $cdDepartamento = null;

    public function __construct(
        ?UnimAppPerfil $cdAppPerfil = null,
        ?int $cdDepartamento = null
    ) {
        $this->cdAppPerfil = $cdAppPerfil;
        $this->cdDepartamento = $cdDepartamento;
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

    public function getCdDepartamento(): ?int
    {
        return $this->cdDepartamento;
    }

    public function setCdDepartamento(?int $cdDepartamento): self
    {
        $this->cdDepartamento = $cdDepartamento;
        return $this;
    }
}
