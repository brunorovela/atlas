<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PleTurmasprofessoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleTurmasprofessoresRepository::class)]
#[ORM\Table(
    name: 'ple_turmasprofessores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TURMASPROFESSORES', columns: ['cd_turmasprofessores'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_TIPO_DOCUMENTO', columns: ['cd_tipo_documento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PLETP_PROFESSOR', 'colunas' => ['cd_turmasprofessores'], 'tabelaAlvo' => 'turmasprofessores', 'colunasAlvo' => ['cd_turmaprofessor'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PleTurmasprofessores
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_turmasprofessores', type: 'integer', options: ['default' => '0'])]
    private int $cdTurmasprofessores = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer', options: ['default' => '0'])]
    private int $cdTipoDocumento = 0;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['default' => '2'])]
    private int $cdSituacao = 2;

    #[ORM\Column(name: 'sn_bloqueado', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado = false;

    public function __construct(
        int $cdTurmasprofessores = 0,
        int $cdTipoDocumento = 0,
        int $cdSituacao = 2,
        bool $snBloqueado = false
    ) {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        $this->cdTipoDocumento = $cdTipoDocumento;
        $this->cdSituacao = $cdSituacao;
        $this->snBloqueado = $snBloqueado;
    }

    public function getCdTurmasprofessores(): int
    {
        return $this->cdTurmasprofessores;
    }

    public function setCdTurmasprofessores(int $cdTurmasprofessores): self
    {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        return $this;
    }

    public function getCdTipoDocumento(): int
    {
        return $this->cdTipoDocumento;
    }

    public function setCdTipoDocumento(int $cdTipoDocumento): self
    {
        $this->cdTipoDocumento = $cdTipoDocumento;
        return $this;
    }

    public function getCdSituacao(): int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function isSnBloqueado(): bool
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(bool $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }
}
