<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedProcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedProcessosRepository::class)]
#[ORM\Table(
    name: 'ped_processos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PROCESSOS_CD_AVALIACAO_TIPO', columns: ['cd_avaliacao_tipo'])]
#[ORM\Index(name: 'FK_ped_processos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ped_processos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PROCESSOS_CD_AVALIACAO_TIPO', 'colunas' => ['cd_avaliacao_tipo'], 'tabelaAlvo' => 'avaliacoes_tipos', 'colunasAlvo' => ['cd_avaliacao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedProcessos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'nm_processo', type: 'string', length: 255)]
    private ?string $nmProcesso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'nr_etapa', type: 'smallint', nullable: true)]
    private ?int $nrEtapa = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime')]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'dt_liberacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLiberacao = null;

    #[ORM\Column(name: 'sn_liberar_coordenador', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snLiberarCoordenador = false;

    #[ORM\Column(name: 'sn_prova_diario_classe', type: 'boolean', options: ['default' => '0'])]
    private bool $snProvaDiarioClasse = false;

    #[ORM\ManyToOne(targetEntity: AvaliacoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_avaliacao_tipo', referencedColumnName: 'cd_avaliacao_tipo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AvaliacoesTipos $cdAvaliacaoTipo = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $nmProcesso = null,
        ?int $nrAnosemestre = null,
        ?int $nrEtapa = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?\DateTimeInterface $dtLiberacao = null,
        ?bool $snLiberarCoordenador = false,
        bool $snProvaDiarioClasse = false,
        ?AvaliacoesTipos $cdAvaliacaoTipo = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->nmProcesso = $nmProcesso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->nrEtapa = $nrEtapa;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dtLiberacao = $dtLiberacao;
        $this->snLiberarCoordenador = $snLiberarCoordenador;
        $this->snProvaDiarioClasse = $snProvaDiarioClasse;
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getNmProcesso(): ?string
    {
        return $this->nmProcesso;
    }

    public function setNmProcesso(?string $nmProcesso): self
    {
        $this->nmProcesso = $nmProcesso;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getNrEtapa(): ?int
    {
        return $this->nrEtapa;
    }

    public function setNrEtapa(?int $nrEtapa): self
    {
        $this->nrEtapa = $nrEtapa;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getDtLiberacao(): ?\DateTimeInterface
    {
        return $this->dtLiberacao;
    }

    public function setDtLiberacao(?\DateTimeInterface $dtLiberacao): self
    {
        $this->dtLiberacao = $dtLiberacao;
        return $this;
    }

    public function isSnLiberarCoordenador(): ?bool
    {
        return $this->snLiberarCoordenador;
    }

    public function setSnLiberarCoordenador(?bool $snLiberarCoordenador): self
    {
        $this->snLiberarCoordenador = $snLiberarCoordenador;
        return $this;
    }

    public function isSnProvaDiarioClasse(): bool
    {
        return $this->snProvaDiarioClasse;
    }

    public function setSnProvaDiarioClasse(bool $snProvaDiarioClasse): self
    {
        $this->snProvaDiarioClasse = $snProvaDiarioClasse;
        return $this;
    }

    public function getCdAvaliacaoTipo(): ?AvaliacoesTipos
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?AvaliacoesTipos $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
