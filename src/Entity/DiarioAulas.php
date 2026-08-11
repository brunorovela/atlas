<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiarioAulasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAulasRepository::class)]
#[ORM\Table(
    name: 'diario_aulas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['turma', 'anosemestre', 'disciplina', 'bimestre', 'nro_aula'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_BIMESTRE', columns: ['bimestre'])]
#[ORM\Index(name: 'IX_NRO_AULA', columns: ['nro_aula'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'FK_CD_PLE_APRENDIZAGEM_EMENTA', columns: ['cd_ple_aprendizagem_ementa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_PLE_APRENDIZAGEM_EMENTA', 'colunas' => ['cd_ple_aprendizagem_ementa'], 'tabelaAlvo' => 'ple_aprendizagem_ementa', 'colunasAlvo' => ['cd_ple_aprendizagem_ementa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiarioAulas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diario_aula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDiarioAula = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50, nullable: true)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'disciplina', type: 'integer', nullable: true)]
    private ?int $disciplina = null;

    #[ORM\Column(name: 'bimestre', type: 'smallint', nullable: true)]
    private ?int $bimestre = null;

    #[ORM\Column(name: 'nro_aula', type: 'smallint', nullable: true)]
    private ?int $nroAula = null;

    #[ORM\Column(name: 'data', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(name: 'qtd_aulas', type: 'smallint', nullable: true)]
    private ?int $qtdAulas = null;

    #[ORM\Column(name: 'conteudo', type: 'text', length: 16777215, nullable: true)]
    private ?string $conteudo = null;

    #[ORM\Column(name: 'sn_bloqueado', type: 'integer', options: ['default' => '0'])]
    private int $snBloqueado = 0;

    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'me_material_aula', type: 'text', length: 16777215, nullable: true)]
    private ?string $meMaterialAula = null;

    #[ORM\Column(name: 'me_transporte', type: 'text', length: 16777215, nullable: true)]
    private ?string $meTransporte = null;

    #[ORM\Column(name: 'me_local_aula', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLocalAula = null;

    #[ORM\Column(name: 'me_hospedagem', type: 'text', length: 16777215, nullable: true)]
    private ?string $meHospedagem = null;

    #[ORM\Column(name: 'me_gerenc_prof', type: 'text', length: 16777215, nullable: true)]
    private ?string $meGerencProf = null;

    #[ORM\Column(name: 'me_gerenc_gest', type: 'text', length: 16777215, nullable: true)]
    private ?string $meGerencGest = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Este campo deve ser ligado com a tabela de situações, quando o cd_modulo (tabela situacoes) for 1029.'])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'cd_situacao_material_aula', type: 'integer', nullable: true)]
    private ?int $cdSituacaoMaterialAula = null;

    #[ORM\Column(name: 'cd_situacao_transporte', type: 'integer', nullable: true)]
    private ?int $cdSituacaoTransporte = null;

    #[ORM\Column(name: 'cd_situacao_local_aula', type: 'integer', nullable: true)]
    private ?int $cdSituacaoLocalAula = null;

    #[ORM\Column(name: 'cd_situacao_hospedagem', type: 'integer', nullable: true)]
    private ?int $cdSituacaoHospedagem = null;

    #[ORM\Column(name: 'cd_situacao_gerenc_prof', type: 'integer', nullable: true)]
    private ?int $cdSituacaoGerencProf = null;

    #[ORM\Column(name: 'cd_situacao_gerenc_gest', type: 'integer', nullable: true)]
    private ?int $cdSituacaoGerencGest = null;

    #[ORM\Column(name: 'nr_quilometragem', type: 'float', nullable: true)]
    private ?float $nrQuilometragem = null;

    #[ORM\Column(name: 'vl_km', type: 'float', nullable: true)]
    private ?float $vlKm = null;

    #[ORM\Column(name: 'vl_total_transporte', type: 'float', nullable: true)]
    private ?float $vlTotalTransporte = null;

    #[ORM\Column(name: 'nr_qtd_diarias_material', type: 'float', nullable: true)]
    private ?float $nrQtdDiariasMaterial = null;

    #[ORM\Column(name: 'vl_diaria_material', type: 'float', nullable: true)]
    private ?float $vlDiariaMaterial = null;

    #[ORM\Column(name: 'vl_total_material', type: 'float', nullable: true)]
    private ?float $vlTotalMaterial = null;

    #[ORM\Column(name: 'nr_qtd_diarias_hospedagem', type: 'float', nullable: true)]
    private ?float $nrQtdDiariasHospedagem = null;

    #[ORM\Column(name: 'vl_diaria_hospedagem', type: 'float', nullable: true)]
    private ?float $vlDiariaHospedagem = null;

    #[ORM\Column(name: 'vl_total_hospedagem', type: 'float', nullable: true)]
    private ?float $vlTotalHospedagem = null;

    #[ORM\Column(name: 'nr_qtd_diarias_local', type: 'float', nullable: true)]
    private ?float $nrQtdDiariasLocal = null;

    #[ORM\Column(name: 'vl_diaria_local', type: 'float', nullable: true)]
    private ?float $vlDiariaLocal = null;

    #[ORM\Column(name: 'vl_total_local', type: 'float', nullable: true)]
    private ?float $vlTotalLocal = null;

    #[ORM\Column(name: 'cd_cronograma', type: 'integer', nullable: true)]
    private ?int $cdCronograma = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'sn_aula_compartilhada', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAulaCompartilhada = false;

    #[ORM\Column(name: 'cd_aula_tipo', type: 'integer', nullable: true)]
    private ?int $cdAulaTipo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\ManyToOne(targetEntity: PleAprendizagemEmenta::class)]
    #[ORM\JoinColumn(name: 'cd_ple_aprendizagem_ementa', referencedColumnName: 'cd_ple_aprendizagem_ementa', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PleAprendizagemEmenta $cdPleAprendizagemEmenta = null;

    // Sem construtor: 43 propriedades. Use os setters encadeados.

    public function getCdDiarioAula(): ?int
    {
        return $this->cdDiarioAula;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getDisciplina(): ?int
    {
        return $this->disciplina;
    }

    public function setDisciplina(?int $disciplina): self
    {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function getBimestre(): ?int
    {
        return $this->bimestre;
    }

    public function setBimestre(?int $bimestre): self
    {
        $this->bimestre = $bimestre;
        return $this;
    }

    public function getNroAula(): ?int
    {
        return $this->nroAula;
    }

    public function setNroAula(?int $nroAula): self
    {
        $this->nroAula = $nroAula;
        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getQtdAulas(): ?int
    {
        return $this->qtdAulas;
    }

    public function setQtdAulas(?int $qtdAulas): self
    {
        $this->qtdAulas = $qtdAulas;
        return $this;
    }

    public function getConteudo(): ?string
    {
        return $this->conteudo;
    }

    public function setConteudo(?string $conteudo): self
    {
        $this->conteudo = $conteudo;
        return $this;
    }

    public function getSnBloqueado(): int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(int $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function getCdProfessor(): int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getMeMaterialAula(): ?string
    {
        return $this->meMaterialAula;
    }

    public function setMeMaterialAula(?string $meMaterialAula): self
    {
        $this->meMaterialAula = $meMaterialAula;
        return $this;
    }

    public function getMeTransporte(): ?string
    {
        return $this->meTransporte;
    }

    public function setMeTransporte(?string $meTransporte): self
    {
        $this->meTransporte = $meTransporte;
        return $this;
    }

    public function getMeLocalAula(): ?string
    {
        return $this->meLocalAula;
    }

    public function setMeLocalAula(?string $meLocalAula): self
    {
        $this->meLocalAula = $meLocalAula;
        return $this;
    }

    public function getMeHospedagem(): ?string
    {
        return $this->meHospedagem;
    }

    public function setMeHospedagem(?string $meHospedagem): self
    {
        $this->meHospedagem = $meHospedagem;
        return $this;
    }

    public function getMeGerencProf(): ?string
    {
        return $this->meGerencProf;
    }

    public function setMeGerencProf(?string $meGerencProf): self
    {
        $this->meGerencProf = $meGerencProf;
        return $this;
    }

    public function getMeGerencGest(): ?string
    {
        return $this->meGerencGest;
    }

    public function setMeGerencGest(?string $meGerencGest): self
    {
        $this->meGerencGest = $meGerencGest;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdSituacaoMaterialAula(): ?int
    {
        return $this->cdSituacaoMaterialAula;
    }

    public function setCdSituacaoMaterialAula(?int $cdSituacaoMaterialAula): self
    {
        $this->cdSituacaoMaterialAula = $cdSituacaoMaterialAula;
        return $this;
    }

    public function getCdSituacaoTransporte(): ?int
    {
        return $this->cdSituacaoTransporte;
    }

    public function setCdSituacaoTransporte(?int $cdSituacaoTransporte): self
    {
        $this->cdSituacaoTransporte = $cdSituacaoTransporte;
        return $this;
    }

    public function getCdSituacaoLocalAula(): ?int
    {
        return $this->cdSituacaoLocalAula;
    }

    public function setCdSituacaoLocalAula(?int $cdSituacaoLocalAula): self
    {
        $this->cdSituacaoLocalAula = $cdSituacaoLocalAula;
        return $this;
    }

    public function getCdSituacaoHospedagem(): ?int
    {
        return $this->cdSituacaoHospedagem;
    }

    public function setCdSituacaoHospedagem(?int $cdSituacaoHospedagem): self
    {
        $this->cdSituacaoHospedagem = $cdSituacaoHospedagem;
        return $this;
    }

    public function getCdSituacaoGerencProf(): ?int
    {
        return $this->cdSituacaoGerencProf;
    }

    public function setCdSituacaoGerencProf(?int $cdSituacaoGerencProf): self
    {
        $this->cdSituacaoGerencProf = $cdSituacaoGerencProf;
        return $this;
    }

    public function getCdSituacaoGerencGest(): ?int
    {
        return $this->cdSituacaoGerencGest;
    }

    public function setCdSituacaoGerencGest(?int $cdSituacaoGerencGest): self
    {
        $this->cdSituacaoGerencGest = $cdSituacaoGerencGest;
        return $this;
    }

    public function getNrQuilometragem(): ?float
    {
        return $this->nrQuilometragem;
    }

    public function setNrQuilometragem(?float $nrQuilometragem): self
    {
        $this->nrQuilometragem = $nrQuilometragem;
        return $this;
    }

    public function getVlKm(): ?float
    {
        return $this->vlKm;
    }

    public function setVlKm(?float $vlKm): self
    {
        $this->vlKm = $vlKm;
        return $this;
    }

    public function getVlTotalTransporte(): ?float
    {
        return $this->vlTotalTransporte;
    }

    public function setVlTotalTransporte(?float $vlTotalTransporte): self
    {
        $this->vlTotalTransporte = $vlTotalTransporte;
        return $this;
    }

    public function getNrQtdDiariasMaterial(): ?float
    {
        return $this->nrQtdDiariasMaterial;
    }

    public function setNrQtdDiariasMaterial(?float $nrQtdDiariasMaterial): self
    {
        $this->nrQtdDiariasMaterial = $nrQtdDiariasMaterial;
        return $this;
    }

    public function getVlDiariaMaterial(): ?float
    {
        return $this->vlDiariaMaterial;
    }

    public function setVlDiariaMaterial(?float $vlDiariaMaterial): self
    {
        $this->vlDiariaMaterial = $vlDiariaMaterial;
        return $this;
    }

    public function getVlTotalMaterial(): ?float
    {
        return $this->vlTotalMaterial;
    }

    public function setVlTotalMaterial(?float $vlTotalMaterial): self
    {
        $this->vlTotalMaterial = $vlTotalMaterial;
        return $this;
    }

    public function getNrQtdDiariasHospedagem(): ?float
    {
        return $this->nrQtdDiariasHospedagem;
    }

    public function setNrQtdDiariasHospedagem(?float $nrQtdDiariasHospedagem): self
    {
        $this->nrQtdDiariasHospedagem = $nrQtdDiariasHospedagem;
        return $this;
    }

    public function getVlDiariaHospedagem(): ?float
    {
        return $this->vlDiariaHospedagem;
    }

    public function setVlDiariaHospedagem(?float $vlDiariaHospedagem): self
    {
        $this->vlDiariaHospedagem = $vlDiariaHospedagem;
        return $this;
    }

    public function getVlTotalHospedagem(): ?float
    {
        return $this->vlTotalHospedagem;
    }

    public function setVlTotalHospedagem(?float $vlTotalHospedagem): self
    {
        $this->vlTotalHospedagem = $vlTotalHospedagem;
        return $this;
    }

    public function getNrQtdDiariasLocal(): ?float
    {
        return $this->nrQtdDiariasLocal;
    }

    public function setNrQtdDiariasLocal(?float $nrQtdDiariasLocal): self
    {
        $this->nrQtdDiariasLocal = $nrQtdDiariasLocal;
        return $this;
    }

    public function getVlDiariaLocal(): ?float
    {
        return $this->vlDiariaLocal;
    }

    public function setVlDiariaLocal(?float $vlDiariaLocal): self
    {
        $this->vlDiariaLocal = $vlDiariaLocal;
        return $this;
    }

    public function getVlTotalLocal(): ?float
    {
        return $this->vlTotalLocal;
    }

    public function setVlTotalLocal(?float $vlTotalLocal): self
    {
        $this->vlTotalLocal = $vlTotalLocal;
        return $this;
    }

    public function getCdCronograma(): ?int
    {
        return $this->cdCronograma;
    }

    public function setCdCronograma(?int $cdCronograma): self
    {
        $this->cdCronograma = $cdCronograma;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function isSnAulaCompartilhada(): ?bool
    {
        return $this->snAulaCompartilhada;
    }

    public function setSnAulaCompartilhada(?bool $snAulaCompartilhada): self
    {
        $this->snAulaCompartilhada = $snAulaCompartilhada;
        return $this;
    }

    public function getCdAulaTipo(): ?int
    {
        return $this->cdAulaTipo;
    }

    public function setCdAulaTipo(?int $cdAulaTipo): self
    {
        $this->cdAulaTipo = $cdAulaTipo;
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

    public function getCdPleAprendizagemEmenta(): ?PleAprendizagemEmenta
    {
        return $this->cdPleAprendizagemEmenta;
    }

    public function setCdPleAprendizagemEmenta(?PleAprendizagemEmenta $cdPleAprendizagemEmenta): self
    {
        $this->cdPleAprendizagemEmenta = $cdPleAprendizagemEmenta;
        return $this;
    }
}
