<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\DisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasRepository::class)]
#[ORM\Table(
    name: 'disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['codigo', 'curso'])]
#[ORM\Index(name: 'iddisciplina', columns: ['id_disciplina'])]
#[ORM\Index(name: 'IX_CODIGO', columns: ['codigo'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_ID_DISCIPLINA', columns: ['id_disciplina'])]
#[ORM\Index(name: 'IX_CODIGO_CURSO', columns: ['codigo', 'curso'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'FK_disciplinas_mec_areas', columns: ['cd_area'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_disciplinas_mec_areas', 'colunas' => ['cd_area'], 'tabelaAlvo' => 'mec_areas', 'colunasAlvo' => ['cd_area'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Disciplinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'codigo', type: 'integer', nullable: true)]
    private ?int $codigo = null;

    #[ORM\Column(name: 'ordem', type: 'smallint', nullable: true)]
    private ?int $ordem = null;

    #[ORM\Column(name: 'curso', type: 'string', length: 15, nullable: true)]
    private ?string $curso = null;

    #[ORM\Column(name: 'sigla', type: 'string', length: 10, nullable: true)]
    private ?string $sigla = null;

    #[ORM\Column(name: 'descricao', type: 'string', length: 150, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'ds_area_concentracao', type: 'string', length: 255, nullable: true)]
    private ?string $dsAreaConcentracao = null;

    #[ORM\Column(name: 'ementa_backup', type: 'text', length: 16777215, nullable: true)]
    private ?string $ementaBackup = null;

    #[ORM\ManyToOne(targetEntity: MecAreas::class)]
    #[ORM\JoinColumn(name: 'cd_area', referencedColumnName: 'cd_area', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?MecAreas $cdArea = null;

    #[ORM\Column(name: 'qtd_frases_fixas', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $qtdFrasesFixas = 0;

    #[ORM\Column(name: 'cd_disc_mec', type: 'integer', nullable: true)]
    private ?int $cdDiscMec = null;

    #[ORM\Column(name: 'sn_bloqueado', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snBloqueado = true;

    #[ORM\Column(name: 'sn_ementa_padrao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snEmentaPadrao = 1;

    #[ORM\Column(name: 'sn_exporta_moodle', type: 'boolean', options: ['default' => '1'])]
    private bool $snExportaMoodle = true;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_disciplina_ppc', type: 'integer', nullable: true)]
    private ?int $cdDisciplinaPpc = null;

    #[ORM\Column(name: 'ds_etiqueta', type: 'string', length: 255, nullable: true)]
    private ?string $dsEtiqueta = null;

    #[ORM\Column(name: 'sn_historico_anterior', type: 'boolean', options: ['default' => '0'])]
    private bool $snHistoricoAnterior = false;

    public function __construct(
        ?string $cdDisciplinaPai = null,
        ?int $codigo = null,
        ?int $ordem = null,
        ?string $curso = null,
        ?string $sigla = null,
        ?string $descricao = null,
        ?string $dsAreaConcentracao = null,
        ?string $ementaBackup = null,
        ?MecAreas $cdArea = null,
        ?int $qtdFrasesFixas = 0,
        ?int $cdDiscMec = null,
        ?bool $snBloqueado = true,
        ?int $snEmentaPadrao = 1,
        bool $snExportaMoodle = true,
        ?bool $snAtivo = true,
        ?\DateTimeInterface $dtRevisao = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $cdDisciplinaPpc = null,
        ?string $dsEtiqueta = null,
        bool $snHistoricoAnterior = false
    ) {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->codigo = $codigo;
        $this->ordem = $ordem;
        $this->curso = $curso;
        $this->sigla = $sigla;
        $this->descricao = $descricao;
        $this->dsAreaConcentracao = $dsAreaConcentracao;
        $this->ementaBackup = $ementaBackup;
        $this->cdArea = $cdArea;
        $this->qtdFrasesFixas = $qtdFrasesFixas;
        $this->cdDiscMec = $cdDiscMec;
        $this->snBloqueado = $snBloqueado;
        $this->snEmentaPadrao = $snEmentaPadrao;
        $this->snExportaMoodle = $snExportaMoodle;
        $this->snAtivo = $snAtivo;
        $this->dtRevisao = $dtRevisao;
        $this->dtBase = $dtBase;
        $this->cdDisciplinaPpc = $cdDisciplinaPpc;
        $this->dsEtiqueta = $dsEtiqueta;
        $this->snHistoricoAnterior = $snHistoricoAnterior;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(?int $codigo): self
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getOrdem(): ?int
    {
        return $this->ordem;
    }

    public function setOrdem(?int $ordem): self
    {
        $this->ordem = $ordem;
        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(?string $sigla): self
    {
        $this->sigla = $sigla;
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getDsAreaConcentracao(): ?string
    {
        return $this->dsAreaConcentracao;
    }

    public function setDsAreaConcentracao(?string $dsAreaConcentracao): self
    {
        $this->dsAreaConcentracao = $dsAreaConcentracao;
        return $this;
    }

    public function getEmentaBackup(): ?string
    {
        return $this->ementaBackup;
    }

    public function setEmentaBackup(?string $ementaBackup): self
    {
        $this->ementaBackup = $ementaBackup;
        return $this;
    }

    public function getCdArea(): ?MecAreas
    {
        return $this->cdArea;
    }

    public function setCdArea(?MecAreas $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getQtdFrasesFixas(): ?int
    {
        return $this->qtdFrasesFixas;
    }

    public function setQtdFrasesFixas(?int $qtdFrasesFixas): self
    {
        $this->qtdFrasesFixas = $qtdFrasesFixas;
        return $this;
    }

    public function getCdDiscMec(): ?int
    {
        return $this->cdDiscMec;
    }

    public function setCdDiscMec(?int $cdDiscMec): self
    {
        $this->cdDiscMec = $cdDiscMec;
        return $this;
    }

    public function isSnBloqueado(): ?bool
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(?bool $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function getSnEmentaPadrao(): ?int
    {
        return $this->snEmentaPadrao;
    }

    public function setSnEmentaPadrao(?int $snEmentaPadrao): self
    {
        $this->snEmentaPadrao = $snEmentaPadrao;
        return $this;
    }

    public function isSnExportaMoodle(): bool
    {
        return $this->snExportaMoodle;
    }

    public function setSnExportaMoodle(bool $snExportaMoodle): self
    {
        $this->snExportaMoodle = $snExportaMoodle;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDtRevisao(): ?\DateTimeInterface
    {
        return $this->dtRevisao;
    }

    public function setDtRevisao(?\DateTimeInterface $dtRevisao): self
    {
        $this->dtRevisao = $dtRevisao;
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

    public function getCdDisciplinaPpc(): ?int
    {
        return $this->cdDisciplinaPpc;
    }

    public function setCdDisciplinaPpc(?int $cdDisciplinaPpc): self
    {
        $this->cdDisciplinaPpc = $cdDisciplinaPpc;
        return $this;
    }

    public function getDsEtiqueta(): ?string
    {
        return $this->dsEtiqueta;
    }

    public function setDsEtiqueta(?string $dsEtiqueta): self
    {
        $this->dsEtiqueta = $dsEtiqueta;
        return $this;
    }

    public function isSnHistoricoAnterior(): bool
    {
        return $this->snHistoricoAnterior;
    }

    public function setSnHistoricoAnterior(bool $snHistoricoAnterior): self
    {
        $this->snHistoricoAnterior = $snHistoricoAnterior;
        return $this;
    }
}
