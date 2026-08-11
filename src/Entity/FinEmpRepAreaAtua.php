<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinEmpRepAreaAtuaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinEmpRepAreaAtuaRepository::class)]
#[ORM\Table(
    name: 'fin_emp_rep_area_atua',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_EMP_REP_AREA_ATUA', columns: ['cd_fin_empresa_repasse', 'cd_curso_area_atuacao'])]
#[ORM\Index(name: 'IX_CD_FIN_EMPRESA_REPASSE', columns: ['cd_fin_empresa_repasse'])]
#[ORM\Index(name: 'IX_CD_CURSO_AREA_ATUACAO', columns: ['cd_curso_area_atuacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_CURSO_AREA_ATUACAO', 'colunas' => ['cd_curso_area_atuacao'], 'tabelaAlvo' => 'cursos_areas_atuacao', 'colunasAlvo' => ['cd_area'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_CD_FIN_EMPRESA_REPASSE', 'colunas' => ['cd_fin_empresa_repasse'], 'tabelaAlvo' => 'fin_empresa_repasse', 'colunasAlvo' => ['cd_fin_empresa_repasse'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinEmpRepAreaAtua
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_fin_emp_rep_area_atua', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinEmpRepAreaAtua = null;

    #[ORM\ManyToOne(targetEntity: FinEmpresaRepasse::class)]
    #[ORM\JoinColumn(name: 'cd_fin_empresa_repasse', referencedColumnName: 'cd_fin_empresa_repasse', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinEmpresaRepasse $cdFinEmpresaRepasse = null;

    #[ORM\ManyToOne(targetEntity: CursosAreasAtuacao::class)]
    #[ORM\JoinColumn(name: 'cd_curso_area_atuacao', referencedColumnName: 'cd_area', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CursosAreasAtuacao $cdCursoAreaAtuacao = null;

    #[ORM\Column(name: 'vl_percentual', type: 'float', nullable: true)]
    private ?float $vlPercentual = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinEmpresaRepasse $cdFinEmpresaRepasse = null,
        ?CursosAreasAtuacao $cdCursoAreaAtuacao = null,
        ?float $vlPercentual = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdFinEmpresaRepasse = $cdFinEmpresaRepasse;
        $this->cdCursoAreaAtuacao = $cdCursoAreaAtuacao;
        $this->vlPercentual = $vlPercentual;
        $this->dtBase = $dtBase;
    }

    public function getCdFinEmpRepAreaAtua(): ?int
    {
        return $this->cdFinEmpRepAreaAtua;
    }

    public function getCdFinEmpresaRepasse(): ?FinEmpresaRepasse
    {
        return $this->cdFinEmpresaRepasse;
    }

    public function setCdFinEmpresaRepasse(?FinEmpresaRepasse $cdFinEmpresaRepasse): self
    {
        $this->cdFinEmpresaRepasse = $cdFinEmpresaRepasse;
        return $this;
    }

    public function getCdCursoAreaAtuacao(): ?CursosAreasAtuacao
    {
        return $this->cdCursoAreaAtuacao;
    }

    public function setCdCursoAreaAtuacao(?CursosAreasAtuacao $cdCursoAreaAtuacao): self
    {
        $this->cdCursoAreaAtuacao = $cdCursoAreaAtuacao;
        return $this;
    }

    public function getVlPercentual(): ?float
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(?float $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
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
