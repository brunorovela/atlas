<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibGruposRepository::class)]
#[ORM\Table(
    name: 'bib_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'FK_bib_grupos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_grupos_ibfk_1', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_bib_grupos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bib_grupo', type: 'integer')]
    private ?int $cdBibGrupo = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Column(name: 'nr_ordem_importancia', type: 'integer', options: ['unsigned' => true, 'default' => '999'])]
    private int $nrOrdemImportancia = 999;

    #[ORM\Column(name: 'nr_emprestimos_simultaneos', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '999'])]
    private ?int $nrEmprestimosSimultaneos = 999;

    #[ORM\Column(name: 'sn_financeiro_remoto', type: 'boolean', options: ['default' => '0'])]
    private bool $snFinanceiroRemoto = false;

    #[ORM\Column(name: 'sn_empresta_com_atraso', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snEmprestaComAtraso = 1;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?NuGrupos $cdGrupo = null,
        int $nrOrdemImportancia = 999,
        ?int $nrEmprestimosSimultaneos = 999,
        bool $snFinanceiroRemoto = false,
        ?int $snEmprestaComAtraso = 1,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->nrOrdemImportancia = $nrOrdemImportancia;
        $this->nrEmprestimosSimultaneos = $nrEmprestimosSimultaneos;
        $this->snFinanceiroRemoto = $snFinanceiroRemoto;
        $this->snEmprestaComAtraso = $snEmprestaComAtraso;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdBibGrupo(): ?int
    {
        return $this->cdBibGrupo;
    }

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getNrOrdemImportancia(): int
    {
        return $this->nrOrdemImportancia;
    }

    public function setNrOrdemImportancia(int $nrOrdemImportancia): self
    {
        $this->nrOrdemImportancia = $nrOrdemImportancia;
        return $this;
    }

    public function getNrEmprestimosSimultaneos(): ?int
    {
        return $this->nrEmprestimosSimultaneos;
    }

    public function setNrEmprestimosSimultaneos(?int $nrEmprestimosSimultaneos): self
    {
        $this->nrEmprestimosSimultaneos = $nrEmprestimosSimultaneos;
        return $this;
    }

    public function isSnFinanceiroRemoto(): bool
    {
        return $this->snFinanceiroRemoto;
    }

    public function setSnFinanceiroRemoto(bool $snFinanceiroRemoto): self
    {
        $this->snFinanceiroRemoto = $snFinanceiroRemoto;
        return $this;
    }

    public function getSnEmprestaComAtraso(): ?int
    {
        return $this->snEmprestaComAtraso;
    }

    public function setSnEmprestaComAtraso(?int $snEmprestaComAtraso): self
    {
        $this->snEmprestaComAtraso = $snEmprestaComAtraso;
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
