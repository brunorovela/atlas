<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PleTurmasprofessoresDadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleTurmasprofessoresDadosRepository::class)]
#[ORM\Table(
    name: 'ple_turmasprofessores_dados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Ordem', columns: ['cd_layout_variavel', 'cd_turmasprofessores', 'nr_ordem', 'cd_tipo_documento'])]
#[ORM\Index(name: 'IX_CD_TURMASPROFESSORES', columns: ['cd_turmasprofessores'])]
#[ORM\Index(name: 'IX_CD_LAYOUT_VARIAVEL', columns: ['cd_layout_variavel'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PLETPD_PROFESSOR', 'colunas' => ['cd_turmasprofessores'], 'tabelaAlvo' => 'ple_turmasprofessores', 'colunasAlvo' => ['cd_turmasprofessores'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PleTurmasprofessoresDados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_turmasprofessor_dados', type: 'integer')]
    private ?int $cdTurmasprofessorDados = null;

    #[ORM\Column(name: 'cd_turmasprofessores', type: 'integer', nullable: true)]
    private ?int $cdTurmasprofessores = null;

    #[ORM\Column(name: 'cd_layout_variavel', type: 'integer', nullable: true)]
    private ?int $cdLayoutVariavel = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'tx_valor', type: 'text', length: 16777215, nullable: true)]
    private ?string $txValor = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['default' => '1'])]
    private int $nrOrdem = 1;

    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer', nullable: true)]
    private ?int $cdTipoDocumento = null;

    public function __construct(
        ?int $cdTurmasprofessores = null,
        ?int $cdLayoutVariavel = null,
        ?string $dsValor = null,
        ?string $txValor = null,
        int $nrOrdem = 1,
        ?int $cdTipoDocumento = null
    ) {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        $this->cdLayoutVariavel = $cdLayoutVariavel;
        $this->dsValor = $dsValor;
        $this->txValor = $txValor;
        $this->nrOrdem = $nrOrdem;
        $this->cdTipoDocumento = $cdTipoDocumento;
    }

    public function getCdTurmasprofessorDados(): ?int
    {
        return $this->cdTurmasprofessorDados;
    }

    public function getCdTurmasprofessores(): ?int
    {
        return $this->cdTurmasprofessores;
    }

    public function setCdTurmasprofessores(?int $cdTurmasprofessores): self
    {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        return $this;
    }

    public function getCdLayoutVariavel(): ?int
    {
        return $this->cdLayoutVariavel;
    }

    public function setCdLayoutVariavel(?int $cdLayoutVariavel): self
    {
        $this->cdLayoutVariavel = $cdLayoutVariavel;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getTxValor(): ?string
    {
        return $this->txValor;
    }

    public function setTxValor(?string $txValor): self
    {
        $this->txValor = $txValor;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getCdTipoDocumento(): ?int
    {
        return $this->cdTipoDocumento;
    }

    public function setCdTipoDocumento(?int $cdTipoDocumento): self
    {
        $this->cdTipoDocumento = $cdTipoDocumento;
        return $this;
    }
}
