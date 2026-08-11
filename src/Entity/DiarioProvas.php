<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioProvasRepository::class)]
#[ORM\Table(
    name: 'diario_provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Chave', columns: ['turma', 'anosemestre', 'nro_nota', 'disciplina', 'bimestre'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_BIMESTRE', columns: ['bimestre'])]
#[ORM\Index(name: 'IX_NRO_NOTA', columns: ['nro_nota'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_ID_ATIVIDADE_MOODLE', columns: ['id_atividade_moodle'])]
class DiarioProvas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'nro_nota', type: 'smallint', nullable: true)]
    private ?int $nroNota = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true)]
    private ?int $anosemestre = null;

    #[ORM\Column(name: 'disciplina', type: 'integer', nullable: true)]
    private ?int $disciplina = null;

    #[ORM\Column(name: 'bimestre', type: 'smallint', nullable: true)]
    private ?int $bimestre = null;

    #[ORM\Column(name: 'data', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(name: 'assunto', type: 'string', length: 255, nullable: true)]
    private ?string $assunto = null;

    #[ORM\Column(name: 'sn_bloqueado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snBloqueado = 0;

    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Column(name: 'sn_compoe', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snCompoe = 1;

    #[ORM\Column(name: 'sn_especial', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEspecial = 0;

    #[ORM\Column(name: 'cd_prova_leitora', type: 'integer', nullable: true)]
    private ?int $cdProvaLeitora = null;

    #[ORM\Column(name: 'nr_dias_bloqueio', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrDiasBloqueio = 0;

    #[ORM\Column(name: 'dt_primeira_digitacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrimeiraDigitacao = null;

    #[ORM\Column(name: 'sn_discursiva_leitora', type: 'smallint', nullable: true)]
    private ?int $snDiscursivaLeitora = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'vl_peso', type: 'float', nullable: true)]
    private ?float $vlPeso = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'sn_proficiencia', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snProficiencia = 0;

    #[ORM\Column(name: 'nr_nota_minima', type: 'float', nullable: true)]
    private ?float $nrNotaMinima = null;

    #[ORM\Column(name: 'nr_nota_maxima', type: 'float', nullable: true)]
    private ?float $nrNotaMaxima = null;

    #[ORM\Column(name: 'nr_tipo_digitacao', type: 'integer', nullable: true)]
    private ?int $nrTipoDigitacao = null;

    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdAvaliacaoTipo = 1;

    #[ORM\Column(name: 'id_atividade_moodle', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $idAtividadeMoodle = null;

    #[ORM\Column(name: 'tp_atividade_moodle', type: 'string', length: 50, nullable: true)]
    private ?string $tpAtividadeMoodle = null;

    #[ORM\Column(name: 'enum_modalidade_avaliacao', type: 'enum', options: ['values' => ['Presencial', 'Síncrona', 'Assíncrona']])]
    private ?string $enumModalidadeAvaliacao = null;

    #[ORM\Column(name: 'cd_polo_aplicacao', type: 'integer', nullable: true)]
    private ?int $cdPoloAplicacao = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'sn_bloqueado_conteudo', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snBloqueadoConteudo = 0;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_prova_origem', type: 'integer', nullable: true)]
    private ?int $cdProvaOrigem = null;

    // Sem construtor: 32 propriedades. Use os setters encadeados.

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getNroNota(): ?int
    {
        return $this->nroNota;
    }

    public function setNroNota(?int $nroNota): self
    {
        $this->nroNota = $nroNota;
        return $this;
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

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getAssunto(): ?string
    {
        return $this->assunto;
    }

    public function setAssunto(?string $assunto): self
    {
        $this->assunto = $assunto;
        return $this;
    }

    public function getSnBloqueado(): ?int
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(?int $snBloqueado): self
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

    public function getSnCompoe(): ?int
    {
        return $this->snCompoe;
    }

    public function setSnCompoe(?int $snCompoe): self
    {
        $this->snCompoe = $snCompoe;
        return $this;
    }

    public function getSnEspecial(): ?int
    {
        return $this->snEspecial;
    }

    public function setSnEspecial(?int $snEspecial): self
    {
        $this->snEspecial = $snEspecial;
        return $this;
    }

    public function getCdProvaLeitora(): ?int
    {
        return $this->cdProvaLeitora;
    }

    public function setCdProvaLeitora(?int $cdProvaLeitora): self
    {
        $this->cdProvaLeitora = $cdProvaLeitora;
        return $this;
    }

    public function getNrDiasBloqueio(): ?int
    {
        return $this->nrDiasBloqueio;
    }

    public function setNrDiasBloqueio(?int $nrDiasBloqueio): self
    {
        $this->nrDiasBloqueio = $nrDiasBloqueio;
        return $this;
    }

    public function getDtPrimeiraDigitacao(): ?\DateTimeInterface
    {
        return $this->dtPrimeiraDigitacao;
    }

    public function setDtPrimeiraDigitacao(?\DateTimeInterface $dtPrimeiraDigitacao): self
    {
        $this->dtPrimeiraDigitacao = $dtPrimeiraDigitacao;
        return $this;
    }

    public function getSnDiscursivaLeitora(): ?int
    {
        return $this->snDiscursivaLeitora;
    }

    public function setSnDiscursivaLeitora(?int $snDiscursivaLeitora): self
    {
        $this->snDiscursivaLeitora = $snDiscursivaLeitora;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getVlPeso(): ?float
    {
        return $this->vlPeso;
    }

    public function setVlPeso(?float $vlPeso): self
    {
        $this->vlPeso = $vlPeso;
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

    public function getSnProficiencia(): ?int
    {
        return $this->snProficiencia;
    }

    public function setSnProficiencia(?int $snProficiencia): self
    {
        $this->snProficiencia = $snProficiencia;
        return $this;
    }

    public function getNrNotaMinima(): ?float
    {
        return $this->nrNotaMinima;
    }

    public function setNrNotaMinima(?float $nrNotaMinima): self
    {
        $this->nrNotaMinima = $nrNotaMinima;
        return $this;
    }

    public function getNrNotaMaxima(): ?float
    {
        return $this->nrNotaMaxima;
    }

    public function setNrNotaMaxima(?float $nrNotaMaxima): self
    {
        $this->nrNotaMaxima = $nrNotaMaxima;
        return $this;
    }

    public function getNrTipoDigitacao(): ?int
    {
        return $this->nrTipoDigitacao;
    }

    public function setNrTipoDigitacao(?int $nrTipoDigitacao): self
    {
        $this->nrTipoDigitacao = $nrTipoDigitacao;
        return $this;
    }

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?int $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }

    public function getIdAtividadeMoodle(): ?int
    {
        return $this->idAtividadeMoodle;
    }

    public function setIdAtividadeMoodle(?int $idAtividadeMoodle): self
    {
        $this->idAtividadeMoodle = $idAtividadeMoodle;
        return $this;
    }

    public function getTpAtividadeMoodle(): ?string
    {
        return $this->tpAtividadeMoodle;
    }

    public function setTpAtividadeMoodle(?string $tpAtividadeMoodle): self
    {
        $this->tpAtividadeMoodle = $tpAtividadeMoodle;
        return $this;
    }

    public function getEnumModalidadeAvaliacao(): ?string
    {
        return $this->enumModalidadeAvaliacao;
    }

    public function setEnumModalidadeAvaliacao(?string $enumModalidadeAvaliacao): self
    {
        $this->enumModalidadeAvaliacao = $enumModalidadeAvaliacao;
        return $this;
    }

    public function getCdPoloAplicacao(): ?int
    {
        return $this->cdPoloAplicacao;
    }

    public function setCdPoloAplicacao(?int $cdPoloAplicacao): self
    {
        $this->cdPoloAplicacao = $cdPoloAplicacao;
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

    public function getSnBloqueadoConteudo(): ?int
    {
        return $this->snBloqueadoConteudo;
    }

    public function setSnBloqueadoConteudo(?int $snBloqueadoConteudo): self
    {
        $this->snBloqueadoConteudo = $snBloqueadoConteudo;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
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

    public function getCdProvaOrigem(): ?int
    {
        return $this->cdProvaOrigem;
    }

    public function setCdProvaOrigem(?int $cdProvaOrigem): self
    {
        $this->cdProvaOrigem = $cdProvaOrigem;
        return $this;
    }
}
