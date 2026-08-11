<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaCurriculoDigitalCriteriosIntegralizacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaCurriculoDigitalCriteriosIntegralizacaoRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_curriculo_digital_criterios_integralizacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_id_curriculo_digital', columns: ['id_curriculo_digital'])]
#[ORM\Index(name: 'FK_id_unidade_curricular_tipo', columns: ['id_unidade_curricular_tipo'])]
#[ORM\Index(name: 'FK_id_unidade_curricular_etiqueta', columns: ['id_unidade_curricular_etiqueta'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_id_curriculo_digital', 'colunas' => ['id_curriculo_digital'], 'tabelaAlvo' => 'uni_diploma_curriculo_digital', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_id_unidade_curricular_etiqueta', 'colunas' => ['id_unidade_curricular_etiqueta'], 'tabelaAlvo' => 'unidade_curricular_etiqueta', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_id_unidade_curricular_tipo', 'colunas' => ['id_unidade_curricular_tipo'], 'tabelaAlvo' => 'unidade_curricular_tipo', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaCurriculoDigitalCriteriosIntegralizacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaCurriculoDigital::class)]
    #[ORM\JoinColumn(name: 'id_curriculo_digital', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaCurriculoDigital $idCurriculoDigital = null;

    #[ORM\ManyToOne(targetEntity: UnidadeCurricularTipo::class)]
    #[ORM\JoinColumn(name: 'id_unidade_curricular_tipo', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnidadeCurricularTipo $idUnidadeCurricularTipo = null;

    #[ORM\ManyToOne(targetEntity: UnidadeCurricularEtiqueta::class)]
    #[ORM\JoinColumn(name: 'id_unidade_curricular_etiqueta', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnidadeCurricularEtiqueta $idUnidadeCurricularEtiqueta = null;

    #[ORM\Column(name: 'vl_ch_minima', type: 'smallfloat', nullable: true)]
    private ?float $vlChMinima = null;

    #[ORM\Column(name: 'vl_ch_maxima', type: 'smallfloat', nullable: true)]
    private ?float $vlChMaxima = null;

    #[ORM\Column(name: 'vl_ch_total', type: 'smallfloat', nullable: true)]
    private ?float $vlChTotal = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniDiplomaCurriculoDigital $idCurriculoDigital = null,
        ?UnidadeCurricularTipo $idUnidadeCurricularTipo = null,
        ?UnidadeCurricularEtiqueta $idUnidadeCurricularEtiqueta = null,
        ?float $vlChMinima = null,
        ?float $vlChMaxima = null,
        ?float $vlChTotal = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idCurriculoDigital = $idCurriculoDigital;
        $this->idUnidadeCurricularTipo = $idUnidadeCurricularTipo;
        $this->idUnidadeCurricularEtiqueta = $idUnidadeCurricularEtiqueta;
        $this->vlChMinima = $vlChMinima;
        $this->vlChMaxima = $vlChMaxima;
        $this->vlChTotal = $vlChTotal;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCurriculoDigital(): ?UniDiplomaCurriculoDigital
    {
        return $this->idCurriculoDigital;
    }

    public function setIdCurriculoDigital(?UniDiplomaCurriculoDigital $idCurriculoDigital): self
    {
        $this->idCurriculoDigital = $idCurriculoDigital;
        return $this;
    }

    public function getIdUnidadeCurricularTipo(): ?UnidadeCurricularTipo
    {
        return $this->idUnidadeCurricularTipo;
    }

    public function setIdUnidadeCurricularTipo(?UnidadeCurricularTipo $idUnidadeCurricularTipo): self
    {
        $this->idUnidadeCurricularTipo = $idUnidadeCurricularTipo;
        return $this;
    }

    public function getIdUnidadeCurricularEtiqueta(): ?UnidadeCurricularEtiqueta
    {
        return $this->idUnidadeCurricularEtiqueta;
    }

    public function setIdUnidadeCurricularEtiqueta(?UnidadeCurricularEtiqueta $idUnidadeCurricularEtiqueta): self
    {
        $this->idUnidadeCurricularEtiqueta = $idUnidadeCurricularEtiqueta;
        return $this;
    }

    public function getVlChMinima(): ?float
    {
        return $this->vlChMinima;
    }

    public function setVlChMinima(?float $vlChMinima): self
    {
        $this->vlChMinima = $vlChMinima;
        return $this;
    }

    public function getVlChMaxima(): ?float
    {
        return $this->vlChMaxima;
    }

    public function setVlChMaxima(?float $vlChMaxima): self
    {
        $this->vlChMaxima = $vlChMaxima;
        return $this;
    }

    public function getVlChTotal(): ?float
    {
        return $this->vlChTotal;
    }

    public function setVlChTotal(?float $vlChTotal): self
    {
        $this->vlChTotal = $vlChTotal;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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
