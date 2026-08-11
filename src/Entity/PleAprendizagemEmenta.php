<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PleAprendizagemEmentaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleAprendizagemEmentaRepository::class)]
#[ORM\Table(
    name: 'ple_aprendizagem_ementa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ple_aprendizagem_ementa_ibfk_1', columns: ['cd_ple_aprendizagem'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ple_aprendizagem_ementa_ibfk_1', 'colunas' => ['cd_ple_aprendizagem'], 'tabelaAlvo' => 'ple_aprendizagem', 'colunasAlvo' => ['cd_ple_aprendizagem'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PleAprendizagemEmenta
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ple_aprendizagem_ementa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPleAprendizagemEmenta = null;

    #[ORM\ManyToOne(targetEntity: PleAprendizagem::class)]
    #[ORM\JoinColumn(name: 'cd_ple_aprendizagem', referencedColumnName: 'cd_ple_aprendizagem', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PleAprendizagem $cdPleAprendizagem = null;

    #[ORM\Column(name: 'nr_sequencia', type: 'smallint', nullable: true)]
    private ?int $nrSequencia = null;

    #[ORM\Column(name: 'me_ementa', type: 'text', length: 16777215, nullable: true)]
    private ?string $meEmenta = null;

    public function __construct(
        ?PleAprendizagem $cdPleAprendizagem = null,
        ?int $nrSequencia = null,
        ?string $meEmenta = null
    ) {
        $this->cdPleAprendizagem = $cdPleAprendizagem;
        $this->nrSequencia = $nrSequencia;
        $this->meEmenta = $meEmenta;
    }

    public function getCdPleAprendizagemEmenta(): ?int
    {
        return $this->cdPleAprendizagemEmenta;
    }

    public function getCdPleAprendizagem(): ?PleAprendizagem
    {
        return $this->cdPleAprendizagem;
    }

    public function setCdPleAprendizagem(?PleAprendizagem $cdPleAprendizagem): self
    {
        $this->cdPleAprendizagem = $cdPleAprendizagem;
        return $this;
    }

    public function getNrSequencia(): ?int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(?int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getMeEmenta(): ?string
    {
        return $this->meEmenta;
    }

    public function setMeEmenta(?string $meEmenta): self
    {
        $this->meEmenta = $meEmenta;
        return $this;
    }
}
