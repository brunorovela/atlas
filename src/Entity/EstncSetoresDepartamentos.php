<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncSetoresDepartamentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncSetoresDepartamentosRepository::class)]
#[ORM\Table(
    name: 'estnc_setores_departamentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_SETOR', columns: ['cd_setor'])]
#[ORM\Index(name: 'IX_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_SETORES_DEPTO_CD_DEPTO', 'colunas' => ['cd_departamento'], 'tabelaAlvo' => 'estnc_departamentos', 'colunasAlvo' => ['cd_departamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_SETORES_DEPTO_CD_SETOR', 'colunas' => ['cd_setor'], 'tabelaAlvo' => 'estnc_setores', 'colunasAlvo' => ['cd_setor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncSetoresDepartamentos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncSetores::class)]
    #[ORM\JoinColumn(name: 'cd_setor', referencedColumnName: 'cd_setor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncSetores $cdSetor = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncDepartamentos::class)]
    #[ORM\JoinColumn(name: 'cd_departamento', referencedColumnName: 'cd_departamento', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncDepartamentos $cdDepartamento = null;

    public function __construct(
        ?EstncSetores $cdSetor = null,
        ?EstncDepartamentos $cdDepartamento = null
    ) {
        $this->cdSetor = $cdSetor;
        $this->cdDepartamento = $cdDepartamento;
    }

    public function getCdSetor(): ?EstncSetores
    {
        return $this->cdSetor;
    }

    public function setCdSetor(?EstncSetores $cdSetor): self
    {
        $this->cdSetor = $cdSetor;
        return $this;
    }

    public function getCdDepartamento(): ?EstncDepartamentos
    {
        return $this->cdDepartamento;
    }

    public function setCdDepartamento(?EstncDepartamentos $cdDepartamento): self
    {
        $this->cdDepartamento = $cdDepartamento;
        return $this;
    }
}
