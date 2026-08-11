<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamGruposVagasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamGruposVagasRepository::class)]
#[ORM\Table(
    name: 'tam_grupos_vagas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_grupos_vagas_ibfk_1', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'tam_atividades', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class TamGruposVagas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: TamAtividades::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamAtividades $cdAtividade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'nr_vagas', type: 'integer', nullable: true)]
    private ?int $nrVagas = null;

    public function __construct(
        ?TamAtividades $cdAtividade = null,
        ?int $cdGrupo = null,
        ?int $nrVagas = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->cdGrupo = $cdGrupo;
        $this->nrVagas = $nrVagas;
    }

    public function getCdAtividade(): ?TamAtividades
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?TamAtividades $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getNrVagas(): ?int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(?int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
        return $this;
    }
}
