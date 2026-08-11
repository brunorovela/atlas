<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauPlanAtivAnexoImpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauPlanAtivAnexoImpRepository::class)]
#[ORM\Table(
    name: 'plau_plan_ativ_anexo_imp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_atividade', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_PLANO_CD_ATIVIDADE', columns: ['cd_plano', 'cd_atividade'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_anexo'])]
#[ORM\Index(name: 'IDX_91870E6B5E239966', columns: ['cd_plano'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_plan_ativ_anexo_imp_ibfk_1', 'colunas' => ['cd_anexo'], 'tabelaAlvo' => 'plau_anexo', 'colunasAlvo' => ['cd_anexo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plan_ativ_anexo_imp_ibfk_2', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'plau_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_plan_ativ_anexo_imp_ibfk_3', 'colunas' => ['cd_plano'], 'tabelaAlvo' => 'plau_plano', 'colunasAlvo' => ['cd_plano'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauPlanAtivAnexoImp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo_impressao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexoImpressao = null;

    #[ORM\ManyToOne(targetEntity: PlauAnexo::class)]
    #[ORM\JoinColumn(name: 'cd_anexo', referencedColumnName: 'cd_anexo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAnexo $cdAnexo = null;

    #[ORM\ManyToOne(targetEntity: PlauAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAtividade $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: PlauPlano::class)]
    #[ORM\JoinColumn(name: 'cd_plano', referencedColumnName: 'cd_plano', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauPlano $cdPlano = null;

    #[ORM\Column(name: 'sn_impresso', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snImpresso = null;

    #[ORM\Column(name: 'sn_retirado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snRetirado = null;

    #[ORM\Column(name: 'dt_uso', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUso = null;

    public function __construct(
        ?PlauAnexo $cdAnexo = null,
        ?PlauAtividade $cdAtividade = null,
        ?PlauPlano $cdPlano = null,
        ?int $snImpresso = null,
        ?int $snRetirado = null,
        ?\DateTimeInterface $dtUso = null
    ) {
        $this->cdAnexo = $cdAnexo;
        $this->cdAtividade = $cdAtividade;
        $this->cdPlano = $cdPlano;
        $this->snImpresso = $snImpresso;
        $this->snRetirado = $snRetirado;
        $this->dtUso = $dtUso;
    }

    public function getCdAnexoImpressao(): ?int
    {
        return $this->cdAnexoImpressao;
    }

    public function getCdAnexo(): ?PlauAnexo
    {
        return $this->cdAnexo;
    }

    public function setCdAnexo(?PlauAnexo $cdAnexo): self
    {
        $this->cdAnexo = $cdAnexo;
        return $this;
    }

    public function getCdAtividade(): ?PlauAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?PlauAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdPlano(): ?PlauPlano
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?PlauPlano $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getSnImpresso(): ?int
    {
        return $this->snImpresso;
    }

    public function setSnImpresso(?int $snImpresso): self
    {
        $this->snImpresso = $snImpresso;
        return $this;
    }

    public function getSnRetirado(): ?int
    {
        return $this->snRetirado;
    }

    public function setSnRetirado(?int $snRetirado): self
    {
        $this->snRetirado = $snRetirado;
        return $this;
    }

    public function getDtUso(): ?\DateTimeInterface
    {
        return $this->dtUso;
    }

    public function setDtUso(?\DateTimeInterface $dtUso): self
    {
        $this->dtUso = $dtUso;
        return $this;
    }
}
