<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ConInscricoesAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricoesAreasRepository::class)]
#[ORM\Table(
    name: 'con_inscricoes_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_inscricoes_areas', columns: ['cd_inscricao_area'])]
#[ORM\UniqueConstraint(name: 'idx_unique', columns: ['cd_inscricao', 'cd_area'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_TIPO', columns: ['cd_inscricao_tipo'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'FK_CON_INSCRICOES_AREAS_UNIM_POLO', columns: ['cd_polo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CON_INSCRICOES_AREAS_UNIM_POLO', 'colunas' => ['cd_polo'], 'tabelaAlvo' => 'unim_polo', 'colunasAlvo' => ['cd_polo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ConInscricoesAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoArea = null;

    #[ORM\Column(name: 'cd_inscricao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricao = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'cd_inscricao_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoTipo = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdSituacao = 0;

    #[ORM\Column(name: 'nr_classificacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrClassificacao = null;

    #[ORM\Column(name: 'nr_media', type: 'float', nullable: true)]
    private ?float $nrMedia = null;

    #[ORM\Column(name: 'nr_colocacao', type: 'integer', nullable: true)]
    private ?int $nrColocacao = null;

    #[ORM\Column(name: 'nr_classificacao_interna', type: 'integer', nullable: true)]
    private ?int $nrClassificacaoInterna = null;

    #[ORM\ManyToOne(targetEntity: UnimPolo::class)]
    #[ORM\JoinColumn(name: 'cd_polo', referencedColumnName: 'cd_polo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimPolo $cdPolo = null;

    #[ORM\Column(name: 'cd_coligada', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'id_turma', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $idTurma = null;

    public function __construct(
        ?int $cdInscricao = null,
        ?int $cdArea = null,
        ?int $cdInscricaoTipo = null,
        int $cdSituacao = 0,
        ?int $nrClassificacao = null,
        ?float $nrMedia = null,
        ?int $nrColocacao = null,
        ?int $nrClassificacaoInterna = null,
        ?UnimPolo $cdPolo = null,
        ?int $cdColigada = null,
        ?int $idTurma = null
    ) {
        $this->cdInscricao = $cdInscricao;
        $this->cdArea = $cdArea;
        $this->cdInscricaoTipo = $cdInscricaoTipo;
        $this->cdSituacao = $cdSituacao;
        $this->nrClassificacao = $nrClassificacao;
        $this->nrMedia = $nrMedia;
        $this->nrColocacao = $nrColocacao;
        $this->nrClassificacaoInterna = $nrClassificacaoInterna;
        $this->cdPolo = $cdPolo;
        $this->cdColigada = $cdColigada;
        $this->idTurma = $idTurma;
    }

    public function getCdInscricaoArea(): ?int
    {
        return $this->cdInscricaoArea;
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

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getCdInscricaoTipo(): ?int
    {
        return $this->cdInscricaoTipo;
    }

    public function setCdInscricaoTipo(?int $cdInscricaoTipo): self
    {
        $this->cdInscricaoTipo = $cdInscricaoTipo;
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

    public function getNrClassificacao(): ?int
    {
        return $this->nrClassificacao;
    }

    public function setNrClassificacao(?int $nrClassificacao): self
    {
        $this->nrClassificacao = $nrClassificacao;
        return $this;
    }

    public function getNrMedia(): ?float
    {
        return $this->nrMedia;
    }

    public function setNrMedia(?float $nrMedia): self
    {
        $this->nrMedia = $nrMedia;
        return $this;
    }

    public function getNrColocacao(): ?int
    {
        return $this->nrColocacao;
    }

    public function setNrColocacao(?int $nrColocacao): self
    {
        $this->nrColocacao = $nrColocacao;
        return $this;
    }

    public function getNrClassificacaoInterna(): ?int
    {
        return $this->nrClassificacaoInterna;
    }

    public function setNrClassificacaoInterna(?int $nrClassificacaoInterna): self
    {
        $this->nrClassificacaoInterna = $nrClassificacaoInterna;
        return $this;
    }

    public function getCdPolo(): ?UnimPolo
    {
        return $this->cdPolo;
    }

    public function setCdPolo(?UnimPolo $cdPolo): self
    {
        $this->cdPolo = $cdPolo;
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

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
    }

    public function setIdTurma(?int $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }
}
