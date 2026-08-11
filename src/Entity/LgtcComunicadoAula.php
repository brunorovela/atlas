<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\LgtcComunicadoAulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcComunicadoAulaRepository::class)]
#[ORM\Table(
    name: 'lgtc_comunicado_aula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_COMUNICADO_AULA_CD_DIARIO_AULA_DIARIO_AULAS_CD_DIARIO_AULA', columns: ['CD_DIARIO_AULA'])]
#[ORM\Index(name: 'IDX_42DFB20C8AFDE8D3', columns: ['CD_COMUNICADO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_COMUNICADO_AULA_CD_COMUNICADO_COMUNICADO_CD_COMUNICADO', 'colunas' => ['CD_COMUNICADO'], 'tabelaAlvo' => 'lgtc_comunicado', 'colunasAlvo' => ['CD_COMUNICADO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_COMUNICADO_AULA_CD_DIARIO_AULA_DIARIO_AULAS_CD_DIARIO_AULA', 'colunas' => ['CD_DIARIO_AULA'], 'tabelaAlvo' => 'diario_aulas', 'colunasAlvo' => ['cd_diario_aula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class LgtcComunicadoAula
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: LgtcComunicado::class)]
    #[ORM\JoinColumn(name: 'CD_COMUNICADO', referencedColumnName: 'CD_COMUNICADO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcComunicado $cdComunicado = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: DiarioAulas::class)]
    #[ORM\JoinColumn(name: 'CD_DIARIO_AULA', referencedColumnName: 'cd_diario_aula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?DiarioAulas $cdDiarioAula = null;

    public function __construct(
        ?LgtcComunicado $cdComunicado = null,
        ?DiarioAulas $cdDiarioAula = null
    ) {
        $this->cdComunicado = $cdComunicado;
        $this->cdDiarioAula = $cdDiarioAula;
    }

    public function getCdComunicado(): ?LgtcComunicado
    {
        return $this->cdComunicado;
    }

    public function setCdComunicado(?LgtcComunicado $cdComunicado): self
    {
        $this->cdComunicado = $cdComunicado;
        return $this;
    }

    public function getCdDiarioAula(): ?DiarioAulas
    {
        return $this->cdDiarioAula;
    }

    public function setCdDiarioAula(?DiarioAulas $cdDiarioAula): self
    {
        $this->cdDiarioAula = $cdDiarioAula;
        return $this;
    }
}
