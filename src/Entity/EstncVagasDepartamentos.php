<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncVagasDepartamentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncVagasDepartamentosRepository::class)]
#[ORM\Table(
    name: 'estnc_vagas_departamentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DEPARTAMENTO', columns: ['cd_departamento'])]
#[ORM\Index(name: 'IX_CD_VAGA', columns: ['cd_vaga'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_VAGAS_DEPTO_CD_DEPTO', 'colunas' => ['cd_departamento'], 'tabelaAlvo' => 'estnc_departamentos', 'colunasAlvo' => ['cd_departamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_VAGAS_DEPTO_CD_VAGA', 'colunas' => ['cd_vaga'], 'tabelaAlvo' => 'estnc_vagas', 'colunasAlvo' => ['cd_vaga'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncVagasDepartamentos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncVagas::class)]
    #[ORM\JoinColumn(name: 'cd_vaga', referencedColumnName: 'cd_vaga', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncVagas $cdVaga = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: EstncDepartamentos::class)]
    #[ORM\JoinColumn(name: 'cd_departamento', referencedColumnName: 'cd_departamento', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncDepartamentos $cdDepartamento = null;

    public function __construct(
        ?EstncVagas $cdVaga = null,
        ?EstncDepartamentos $cdDepartamento = null
    ) {
        $this->cdVaga = $cdVaga;
        $this->cdDepartamento = $cdDepartamento;
    }

    public function getCdVaga(): ?EstncVagas
    {
        return $this->cdVaga;
    }

    public function setCdVaga(?EstncVagas $cdVaga): self
    {
        $this->cdVaga = $cdVaga;
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
