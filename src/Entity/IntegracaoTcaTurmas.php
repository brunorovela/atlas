<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoTcaTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoTcaTurmasRepository::class)]
#[ORM\Table(
    name: 'integracao_tca_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class IntegracaoTcaTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_integracao', type: 'integer')]
    private ?int $idIntegracao = null;

    #[ORM\Column(name: 'id_turma_uni', type: 'integer', nullable: true)]
    private ?int $idTurmaUni = null;

    #[ORM\Column(name: 'id_turma_tca', type: 'integer')]
    private ?int $idTurmaTca = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'integer', nullable: true)]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    public function __construct(
        ?int $idTurmaUni = null,
        ?int $idTurmaTca = null,
        ?int $cdTipoTitulo = null,
        ?int $cdColigada = null
    ) {
        $this->idTurmaUni = $idTurmaUni;
        $this->idTurmaTca = $idTurmaTca;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdColigada = $cdColigada;
    }

    public function getIdIntegracao(): ?int
    {
        return $this->idIntegracao;
    }

    public function getIdTurmaUni(): ?int
    {
        return $this->idTurmaUni;
    }

    public function setIdTurmaUni(?int $idTurmaUni): self
    {
        $this->idTurmaUni = $idTurmaUni;
        return $this;
    }

    public function getIdTurmaTca(): ?int
    {
        return $this->idTurmaTca;
    }

    public function setIdTurmaTca(?int $idTurmaTca): self
    {
        $this->idTurmaTca = $idTurmaTca;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
