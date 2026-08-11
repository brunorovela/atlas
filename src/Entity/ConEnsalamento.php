<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ConEnsalamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConEnsalamentoRepository::class)]
#[ORM\Table(
    name: 'con_ensalamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_ensalamento', columns: ['cd_ensalamento'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'IX_CD_CONCURSO_SALA', columns: ['cd_concurso_sala'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ENSALAMENTO', 'colunas' => ['cd_concurso_sala'], 'tabelaAlvo' => 'con_concurso_salas', 'colunasAlvo' => ['cd_concurso_sala'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class ConEnsalamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ensalamento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEnsalamento = null;

    #[ORM\Column(name: 'cd_inscricao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricao = null;

    #[ORM\ManyToOne(targetEntity: ConConcursoSalas::class)]
    #[ORM\JoinColumn(name: 'cd_concurso_sala', referencedColumnName: 'cd_concurso_sala', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ConConcursoSalas $cdConcursoSala = null;

    #[ORM\Column(name: 'nr_posicao', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrPosicao = null;

    public function __construct(
        ?int $cdInscricao = null,
        ?ConConcursoSalas $cdConcursoSala = null,
        ?int $nrPosicao = null
    ) {
        $this->cdInscricao = $cdInscricao;
        $this->cdConcursoSala = $cdConcursoSala;
        $this->nrPosicao = $nrPosicao;
    }

    public function getCdEnsalamento(): ?int
    {
        return $this->cdEnsalamento;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?int $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }

    public function getCdConcursoSala(): ?ConConcursoSalas
    {
        return $this->cdConcursoSala;
    }

    public function setCdConcursoSala(?ConConcursoSalas $cdConcursoSala): self
    {
        $this->cdConcursoSala = $cdConcursoSala;
        return $this;
    }

    public function getNrPosicao(): ?int
    {
        return $this->nrPosicao;
    }

    public function setNrPosicao(?int $nrPosicao): self
    {
        $this->nrPosicao = $nrPosicao;
        return $this;
    }
}
