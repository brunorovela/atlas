<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimMoodleAgrupamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleAgrupamentoRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_agrupamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_unim_moodle_agrupamento_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_moodle_agrupamento_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimMoodleAgrupamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_moodle_agrupamento', type: 'integer')]
    private ?int $cdMoodleAgrupamento = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'nr_grau', type: 'smallint', nullable: true)]
    private ?int $nrGrau = null;

    #[ORM\Column(name: 'ds_nome_grupo', type: 'string', length: 255, options: ['default' => '0'])]
    private string $dsNomeGrupo = '0';

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ColigadasMatriz $cdColigadaMatriz = null,
        ?int $nrGrau = null,
        string $dsNomeGrupo = '0',
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->nrGrau = $nrGrau;
        $this->dsNomeGrupo = $dsNomeGrupo;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dtBase = $dtBase;
    }

    public function getCdMoodleAgrupamento(): ?int
    {
        return $this->cdMoodleAgrupamento;
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

    public function getNrGrau(): ?int
    {
        return $this->nrGrau;
    }

    public function setNrGrau(?int $nrGrau): self
    {
        $this->nrGrau = $nrGrau;
        return $this;
    }

    public function getDsNomeGrupo(): string
    {
        return $this->dsNomeGrupo;
    }

    public function setDsNomeGrupo(string $dsNomeGrupo): self
    {
        $this->dsNomeGrupo = $dsNomeGrupo;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
