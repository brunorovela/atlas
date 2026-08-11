<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PedTemplatesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedTemplatesRepository::class)]
#[ORM\Table(
    name: 'ped_templates',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_ped_templates_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ped_templates_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedTemplates
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_template', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTemplate = null;

    #[ORM\Column(name: 'nm_template', type: 'string', length: 255)]
    private ?string $nmTemplate = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'sn_turma', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snTurma = false;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $nmTemplate = null,
        ?string $meObservacao = null,
        ?int $nrAnosemestre = null,
        ?bool $snTurma = false,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->nmTemplate = $nmTemplate;
        $this->meObservacao = $meObservacao;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->snTurma = $snTurma;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdTemplate(): ?int
    {
        return $this->cdTemplate;
    }

    public function getNmTemplate(): ?string
    {
        return $this->nmTemplate;
    }

    public function setNmTemplate(?string $nmTemplate): self
    {
        $this->nmTemplate = $nmTemplate;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
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

    public function isSnTurma(): ?bool
    {
        return $this->snTurma;
    }

    public function setSnTurma(?bool $snTurma): self
    {
        $this->snTurma = $snTurma;
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
