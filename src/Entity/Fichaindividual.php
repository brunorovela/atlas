<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FichaindividualRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaindividualRepository::class)]
#[ORM\Table(
    name: 'fichaindividual',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'id_fichaindividual', columns: ['id_fichaindividual'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_DISCIPLINA', columns: ['disciplina'])]
#[ORM\Index(name: 'IX_SERIE', columns: ['serie'])]
#[ORM\Index(name: 'IX_TURMAMATRICULA', columns: ['turmamatricula'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CURSO', columns: ['curso'])]
#[ORM\Index(name: 'IX_CODIGOALUNO_CURSO_DISCIPLINA', columns: ['codigoaluno', 'curso', 'disciplina'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE_TURMA_DISCIPLINA', columns: ['anosemestre', 'turma', 'disciplina'])]
#[ORM\Index(name: 'IX_SITUACAO', columns: ['situacao'])]
#[ORM\Index(name: 'IX_CURSO_CODIGOALUNO', columns: ['curso', 'codigoaluno'])]
#[ORM\Index(name: 'IX_FICHAINDIVIDUAL', columns: ['id_fichaindividual'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'FK_fichaindividual_unim_categoria_componente_curricular', columns: ['cd_categoria_componente_curricular'])]
#[ORM\Index(name: 'FK_fichaindividual_id_turma_itinerario_obrigatorio', columns: ['id_turma_itinerario_obrigatorio'])]
#[ORM\Index(name: 'FK_fichaindividual_id_turma_itinerario_opcional', columns: ['id_turma_itinerario_opcional'])]
#[ORM\Index(name: 'idx_fi_cobrimento_total', columns: ['codigoaluno', 'curso', 'disciplina', 'anosemestre', 'situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_fichaindividual_id_turma_itinerario_obrigatorio', 'colunas' => ['id_turma_itinerario_obrigatorio'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_fichaindividual_id_turma_itinerario_opcional', 'colunas' => ['id_turma_itinerario_opcional'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_fichaindividual_unim_categoria_componente_curricular', 'colunas' => ['cd_categoria_componente_curricular'], 'tabelaAlvo' => 'unim_categoria_componente_curricular', 'colunasAlvo' => ['cd_categoria_componente_curricular'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['id_fichaindividual']
)]
class Fichaindividual
{
    #[ORM\Id]
    #[ORM\Column(name: 'codigoaluno', type: 'integer')]
    private ?int $codigoaluno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'smallint')]
    private ?int $anosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'disciplina', type: 'integer')]
    private ?int $disciplina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'curso', type: 'string', length: 15)]
    private ?string $curso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'serie', type: 'smallint')]
    private ?int $serie = null;

    #[ORM\Column(name: 'id_fichaindividual', type: 'integer', options: ['unsigned' => true])]
    private ?int $idFichaindividual = null;

    #[ORM\Column(name: 'CODIGOGRADE', type: 'string', length: 50, nullable: true, options: ['default' => ''])]
    private ?string $codigograde = '';

    #[ORM\Column(name: 'grau', type: 'smallint', nullable: true)]
    private ?int $grau = null;

    #[ORM\Column(name: 'nota1', type: 'float', nullable: true)]
    private ?float $nota1 = null;

    #[ORM\Column(name: 'nota_sa1', type: 'float', nullable: true)]
    private ?float $notaSa1 = null;

    #[ORM\Column(name: 'ajuste1', type: 'float', nullable: true)]
    private ?float $ajuste1 = null;

    #[ORM\Column(name: 'falta1', type: 'float', nullable: true)]
    private ?float $falta1 = null;

    #[ORM\Column(name: 'exame1', type: 'float', nullable: true)]
    private ?float $exame1 = null;

    #[ORM\Column(name: 'nota2', type: 'float', nullable: true)]
    private ?float $nota2 = null;

    #[ORM\Column(name: 'nota_sa2', type: 'float', nullable: true)]
    private ?float $notaSa2 = null;

    #[ORM\Column(name: 'ajuste2', type: 'float', nullable: true)]
    private ?float $ajuste2 = null;

    #[ORM\Column(name: 'falta2', type: 'float', nullable: true)]
    private ?float $falta2 = null;

    #[ORM\Column(name: 'exame2', type: 'float', nullable: true)]
    private ?float $exame2 = null;

    #[ORM\Column(name: 'nota3', type: 'float', nullable: true)]
    private ?float $nota3 = null;

    #[ORM\Column(name: 'nota_sa3', type: 'float', nullable: true)]
    private ?float $notaSa3 = null;

    #[ORM\Column(name: 'ajuste3', type: 'float', nullable: true)]
    private ?float $ajuste3 = null;

    #[ORM\Column(name: 'falta3', type: 'float', nullable: true)]
    private ?float $falta3 = null;

    #[ORM\Column(name: 'exame3', type: 'float', nullable: true)]
    private ?float $exame3 = null;

    #[ORM\Column(name: 'nota4', type: 'float', nullable: true)]
    private ?float $nota4 = null;

    #[ORM\Column(name: 'nota_sa4', type: 'float', nullable: true)]
    private ?float $notaSa4 = null;

    #[ORM\Column(name: 'ajuste4', type: 'float', nullable: true)]
    private ?float $ajuste4 = null;

    #[ORM\Column(name: 'falta4', type: 'float', nullable: true)]
    private ?float $falta4 = null;

    #[ORM\Column(name: 'exame4', type: 'float', nullable: true)]
    private ?float $exame4 = null;

    #[ORM\Column(name: 'notaexame', type: 'float', nullable: true)]
    private ?float $notaexame = null;

    #[ORM\Column(name: 'segunda_epoca', type: 'float', nullable: true)]
    private ?float $segundaEpoca = null;

    #[ORM\Column(name: 'mediaanual', type: 'float', nullable: true)]
    private ?float $mediaanual = null;

    #[ORM\Column(name: 'mediaFinal', type: 'float', nullable: true)]
    private ?float $mediafinal = null;

    #[ORM\Column(name: 'frequencia', type: 'float', nullable: true)]
    private ?float $frequencia = null;

    #[ORM\Column(name: 'totalfaltas', type: 'float', nullable: true)]
    private ?float $totalfaltas = null;

    #[ORM\Column(name: 'situacao', type: 'smallint', options: ['default' => '1'])]
    private int $situacao = 1;

    #[ORM\Column(name: 'usuario', type: 'integer', nullable: true)]
    private ?int $usuario = null;

    #[ORM\Column(name: 'codigoescola', type: 'smallint', nullable: true)]
    private ?int $codigoescola = null;

    #[ORM\Column(name: 'aproveitamento', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $aproveitamento = 'N';

    #[ORM\Column(name: 'turmamatricula', type: 'string', length: 50)]
    private ?string $turmamatricula = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma_itinerario_obrigatorio', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurmaItinerarioObrigatorio = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma_itinerario_opcional', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurmaItinerarioOpcional = null;

    #[ORM\Column(name: 'nota5', type: 'float', nullable: true)]
    private ?float $nota5 = null;

    #[ORM\Column(name: 'nota_sa5', type: 'float', nullable: true)]
    private ?float $notaSa5 = null;

    #[ORM\Column(name: 'ajuste5', type: 'float', nullable: true)]
    private ?float $ajuste5 = null;

    #[ORM\Column(name: 'falta5', type: 'float', nullable: true)]
    private ?float $falta5 = null;

    #[ORM\Column(name: 'exame5', type: 'float', nullable: true)]
    private ?float $exame5 = null;

    #[ORM\Column(name: 'nota6', type: 'float', nullable: true)]
    private ?float $nota6 = null;

    #[ORM\Column(name: 'nota_sa6', type: 'float', nullable: true)]
    private ?float $notaSa6 = null;

    #[ORM\Column(name: 'ajuste6', type: 'float', nullable: true)]
    private ?float $ajuste6 = null;

    #[ORM\Column(name: 'falta6', type: 'float', nullable: true)]
    private ?float $falta6 = null;

    #[ORM\Column(name: 'exame6', type: 'float', nullable: true)]
    private ?float $exame6 = null;

    #[ORM\Column(name: 'nota7', type: 'float', nullable: true)]
    private ?float $nota7 = null;

    #[ORM\Column(name: 'nota_sa7', type: 'float', nullable: true)]
    private ?float $notaSa7 = null;

    #[ORM\Column(name: 'ajuste7', type: 'float', nullable: true)]
    private ?float $ajuste7 = null;

    #[ORM\Column(name: 'falta7', type: 'float', nullable: true)]
    private ?float $falta7 = null;

    #[ORM\Column(name: 'exame7', type: 'float', nullable: true)]
    private ?float $exame7 = null;

    #[ORM\Column(name: 'nota8', type: 'float', nullable: true)]
    private ?float $nota8 = null;

    #[ORM\Column(name: 'nota_sa8', type: 'float', nullable: true)]
    private ?float $notaSa8 = null;

    #[ORM\Column(name: 'ajuste8', type: 'float', nullable: true)]
    private ?float $ajuste8 = null;

    #[ORM\Column(name: 'falta8', type: 'float', nullable: true)]
    private ?float $falta8 = null;

    #[ORM\Column(name: 'exame8', type: 'float', nullable: true)]
    private ?float $exame8 = null;

    #[ORM\Column(name: 'nota9', type: 'float', nullable: true)]
    private ?float $nota9 = null;

    #[ORM\Column(name: 'nota_sa9', type: 'float', nullable: true)]
    private ?float $notaSa9 = null;

    #[ORM\Column(name: 'ajuste9', type: 'float', nullable: true)]
    private ?float $ajuste9 = null;

    #[ORM\Column(name: 'falta9', type: 'float', nullable: true)]
    private ?float $falta9 = null;

    #[ORM\Column(name: 'exame9', type: 'float', nullable: true)]
    private ?float $exame9 = null;

    #[ORM\Column(name: 'nota10', type: 'float', nullable: true)]
    private ?float $nota10 = null;

    #[ORM\Column(name: 'nota_sa10', type: 'float', nullable: true)]
    private ?float $notaSa10 = null;

    #[ORM\Column(name: 'ajuste10', type: 'float', nullable: true)]
    private ?float $ajuste10 = null;

    #[ORM\Column(name: 'falta10', type: 'float', nullable: true)]
    private ?float $falta10 = null;

    #[ORM\Column(name: 'exame10', type: 'float', nullable: true)]
    private ?float $exame10 = null;

    #[ORM\Column(name: 'arrumardiario', type: 'string', length: 50, nullable: true)]
    private ?string $arrumardiario = null;

    #[ORM\Column(name: 'nota_d1', type: 'float', nullable: true)]
    private ?float $notaD1 = null;

    #[ORM\Column(name: 'nota_d2', type: 'float', nullable: true)]
    private ?float $notaD2 = null;

    #[ORM\Column(name: 'nota_d3', type: 'float', nullable: true)]
    private ?float $notaD3 = null;

    #[ORM\Column(name: 'nota_d4', type: 'float', nullable: true)]
    private ?float $notaD4 = null;

    #[ORM\Column(name: 'nota_d5', type: 'float', nullable: true)]
    private ?float $notaD5 = null;

    #[ORM\Column(name: 'nota_d6', type: 'float', nullable: true)]
    private ?float $notaD6 = null;

    #[ORM\Column(name: 'nota_d7', type: 'float', nullable: true)]
    private ?float $notaD7 = null;

    #[ORM\Column(name: 'nota_d8', type: 'float', nullable: true)]
    private ?float $notaD8 = null;

    #[ORM\Column(name: 'nota_d9', type: 'float', nullable: true)]
    private ?float $notaD9 = null;

    #[ORM\Column(name: 'nota_d10', type: 'float', nullable: true)]
    private ?float $notaD10 = null;

    #[ORM\Column(name: 'simbolo_obs', type: 'string', length: 5, nullable: true)]
    private ?string $simboloObs = null;

    #[ORM\Column(name: 'carga_horaria', type: 'float', nullable: true)]
    private ?float $cargaHoraria = null;

    #[ORM\Column(name: 'sn_bloqueado1', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado1 = false;

    #[ORM\Column(name: 'sn_bloqueado2', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado2 = false;

    #[ORM\Column(name: 'sn_bloqueado3', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado3 = false;

    #[ORM\Column(name: 'sn_bloqueado4', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado4 = false;

    #[ORM\Column(name: 'sn_bloqueado5', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado5 = false;

    #[ORM\Column(name: 'sn_bloqueado6', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado6 = false;

    #[ORM\Column(name: 'sn_bloqueado7', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado7 = false;

    #[ORM\Column(name: 'sn_bloqueado8', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado8 = false;

    #[ORM\Column(name: 'sn_bloqueado9', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado9 = false;

    #[ORM\Column(name: 'sn_bloqueado10', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado10 = false;

    #[ORM\Column(name: 'dt_saida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'db_media_periodo1', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo1 = null;

    #[ORM\Column(name: 'cd_situacao_periodo1', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo1 = null;

    #[ORM\Column(name: 'db_media_periodo2', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo2 = null;

    #[ORM\Column(name: 'cd_situacao_periodo2', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo2 = null;

    #[ORM\Column(name: 'db_media_periodo3', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo3 = null;

    #[ORM\Column(name: 'cd_situacao_periodo3', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo3 = null;

    #[ORM\Column(name: 'db_media_periodo4', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo4 = null;

    #[ORM\Column(name: 'cd_situacao_periodo4', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo4 = null;

    #[ORM\Column(name: 'db_media_periodo5', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo5 = null;

    #[ORM\Column(name: 'cd_situacao_periodo5', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo5 = null;

    #[ORM\Column(name: 'db_media_periodo6', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo6 = null;

    #[ORM\Column(name: 'cd_situacao_periodo6', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo6 = null;

    #[ORM\Column(name: 'db_media_periodo7', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo7 = null;

    #[ORM\Column(name: 'cd_situacao_periodo7', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo7 = null;

    #[ORM\Column(name: 'db_media_periodo8', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo8 = null;

    #[ORM\Column(name: 'cd_situacao_periodo8', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo8 = null;

    #[ORM\Column(name: 'db_media_periodo9', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo9 = null;

    #[ORM\Column(name: 'cd_situacao_periodo9', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo9 = null;

    #[ORM\Column(name: 'db_media_periodo10', type: 'float', nullable: true)]
    private ?float $dbMediaPeriodo10 = null;

    #[ORM\Column(name: 'cd_situacao_periodo10', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPeriodo10 = null;

    #[ORM\Column(name: 'dt_matricula', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMatricula = null;

    #[ORM\Column(name: 'ds_media', type: 'string', length: 10, nullable: true)]
    private ?string $dsMedia = null;

    #[ORM\Column(name: 'sn_faltou_exame', type: 'boolean', nullable: true)]
    private ?bool $snFaltouExame = null;

    #[ORM\Column(name: 'sn_bloqueio_nota_exame', type: 'boolean', options: ['default' => '0', 'comment' => 'Define se a nota de exame desse aluno se encontra bloqueada para alteração.'])]
    private bool $snBloqueioNotaExame = false;

    #[ORM\Column(name: 'sn_bloq_freq1', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq1 = false;

    #[ORM\Column(name: 'sn_bloq_freq2', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq2 = false;

    #[ORM\Column(name: 'sn_bloq_freq3', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq3 = false;

    #[ORM\Column(name: 'sn_bloq_freq4', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq4 = false;

    #[ORM\Column(name: 'sn_bloq_freq5', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq5 = false;

    #[ORM\Column(name: 'sn_bloq_freq6', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq6 = false;

    #[ORM\Column(name: 'sn_bloq_freq7', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq7 = false;

    #[ORM\Column(name: 'sn_bloq_freq8', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq8 = false;

    #[ORM\Column(name: 'sn_bloq_freq9', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq9 = false;

    #[ORM\Column(name: 'sn_bloq_freq10', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreq10 = false;

    #[ORM\Column(name: 'sn_bloq_freq_global', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqFreqGlobal = false;

    #[ORM\Column(name: 'media_ajustada', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $mediaAjustada = null;

    #[ORM\Column(name: 'sn_bloqueio_2epoca', type: 'boolean', options: ['default' => '0', 'comment' => 'Define se a nota de segunda epoca desse aluno se encontra bloqueada para alteração.'])]
    private bool $snBloqueio2epoca = false;

    #[ORM\Column(name: 'sn_faltou_2epoca', type: 'boolean', options: ['default' => '0'])]
    private bool $snFaltou2epoca = false;

    #[ORM\Column(name: 'cd_mensalidade_exame', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMensalidadeExame = null;

    #[ORM\Column(name: 'sn_possui_compl', type: 'boolean', options: ['default' => '0'])]
    private bool $snPossuiCompl = false;

    #[ORM\Column(name: 'sn_aprovado_proficiencia', type: 'boolean', options: ['default' => '0'])]
    private bool $snAprovadoProficiencia = false;

    #[ORM\Column(name: 'sn_possui_adap', type: 'boolean', nullable: true)]
    private ?bool $snPossuiAdap = null;

    #[ORM\Column(name: 'sn_possui_depen', type: 'boolean', nullable: true)]
    private ?bool $snPossuiDepen = null;

    #[ORM\Column(name: 'NR_CR_FIN', type: 'float', nullable: true)]
    private ?float $nrCrFin = null;

    #[ORM\Column(name: 'sn_bloqueio_ds_media', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snBloqueioDsMedia = 0;

    #[ORM\Column(name: 'sn_dispensado_pi', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snDispensadoPi = 0;

    #[ORM\ManyToOne(targetEntity: UnimCategoriaComponenteCurricular::class)]
    #[ORM\JoinColumn(name: 'cd_categoria_componente_curricular', referencedColumnName: 'cd_categoria_componente_curricular', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimCategoriaComponenteCurricular $cdCategoriaComponenteCurricular = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'frequencia_personalizado', type: 'string', length: 7, nullable: true)]
    private ?string $frequenciaPersonalizado = null;

    #[ORM\Column(name: 'carga_horaria_personalizado', type: 'string', length: 7, nullable: true)]
    private ?string $cargaHorariaPersonalizado = null;

    // Sem construtor: 147 propriedades. Use os setters encadeados.

    public function getCodigoaluno(): ?int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(?int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
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

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
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

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(?string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(?int $serie): self
    {
        $this->serie = $serie;
        return $this;
    }

    public function getIdFichaindividual(): ?int
    {
        return $this->idFichaindividual;
    }

    public function setIdFichaindividual(?int $idFichaindividual): self
    {
        $this->idFichaindividual = $idFichaindividual;
        return $this;
    }

    public function getCodigograde(): ?string
    {
        return $this->codigograde;
    }

    public function setCodigograde(?string $codigograde): self
    {
        $this->codigograde = $codigograde;
        return $this;
    }

    public function getGrau(): ?int
    {
        return $this->grau;
    }

    public function setGrau(?int $grau): self
    {
        $this->grau = $grau;
        return $this;
    }

    public function getNota1(): ?float
    {
        return $this->nota1;
    }

    public function setNota1(?float $nota1): self
    {
        $this->nota1 = $nota1;
        return $this;
    }

    public function getNotaSa1(): ?float
    {
        return $this->notaSa1;
    }

    public function setNotaSa1(?float $notaSa1): self
    {
        $this->notaSa1 = $notaSa1;
        return $this;
    }

    public function getAjuste1(): ?float
    {
        return $this->ajuste1;
    }

    public function setAjuste1(?float $ajuste1): self
    {
        $this->ajuste1 = $ajuste1;
        return $this;
    }

    public function getFalta1(): ?float
    {
        return $this->falta1;
    }

    public function setFalta1(?float $falta1): self
    {
        $this->falta1 = $falta1;
        return $this;
    }

    public function getExame1(): ?float
    {
        return $this->exame1;
    }

    public function setExame1(?float $exame1): self
    {
        $this->exame1 = $exame1;
        return $this;
    }

    public function getNota2(): ?float
    {
        return $this->nota2;
    }

    public function setNota2(?float $nota2): self
    {
        $this->nota2 = $nota2;
        return $this;
    }

    public function getNotaSa2(): ?float
    {
        return $this->notaSa2;
    }

    public function setNotaSa2(?float $notaSa2): self
    {
        $this->notaSa2 = $notaSa2;
        return $this;
    }

    public function getAjuste2(): ?float
    {
        return $this->ajuste2;
    }

    public function setAjuste2(?float $ajuste2): self
    {
        $this->ajuste2 = $ajuste2;
        return $this;
    }

    public function getFalta2(): ?float
    {
        return $this->falta2;
    }

    public function setFalta2(?float $falta2): self
    {
        $this->falta2 = $falta2;
        return $this;
    }

    public function getExame2(): ?float
    {
        return $this->exame2;
    }

    public function setExame2(?float $exame2): self
    {
        $this->exame2 = $exame2;
        return $this;
    }

    public function getNota3(): ?float
    {
        return $this->nota3;
    }

    public function setNota3(?float $nota3): self
    {
        $this->nota3 = $nota3;
        return $this;
    }

    public function getNotaSa3(): ?float
    {
        return $this->notaSa3;
    }

    public function setNotaSa3(?float $notaSa3): self
    {
        $this->notaSa3 = $notaSa3;
        return $this;
    }

    public function getAjuste3(): ?float
    {
        return $this->ajuste3;
    }

    public function setAjuste3(?float $ajuste3): self
    {
        $this->ajuste3 = $ajuste3;
        return $this;
    }

    public function getFalta3(): ?float
    {
        return $this->falta3;
    }

    public function setFalta3(?float $falta3): self
    {
        $this->falta3 = $falta3;
        return $this;
    }

    public function getExame3(): ?float
    {
        return $this->exame3;
    }

    public function setExame3(?float $exame3): self
    {
        $this->exame3 = $exame3;
        return $this;
    }

    public function getNota4(): ?float
    {
        return $this->nota4;
    }

    public function setNota4(?float $nota4): self
    {
        $this->nota4 = $nota4;
        return $this;
    }

    public function getNotaSa4(): ?float
    {
        return $this->notaSa4;
    }

    public function setNotaSa4(?float $notaSa4): self
    {
        $this->notaSa4 = $notaSa4;
        return $this;
    }

    public function getAjuste4(): ?float
    {
        return $this->ajuste4;
    }

    public function setAjuste4(?float $ajuste4): self
    {
        $this->ajuste4 = $ajuste4;
        return $this;
    }

    public function getFalta4(): ?float
    {
        return $this->falta4;
    }

    public function setFalta4(?float $falta4): self
    {
        $this->falta4 = $falta4;
        return $this;
    }

    public function getExame4(): ?float
    {
        return $this->exame4;
    }

    public function setExame4(?float $exame4): self
    {
        $this->exame4 = $exame4;
        return $this;
    }

    public function getNotaexame(): ?float
    {
        return $this->notaexame;
    }

    public function setNotaexame(?float $notaexame): self
    {
        $this->notaexame = $notaexame;
        return $this;
    }

    public function getSegundaEpoca(): ?float
    {
        return $this->segundaEpoca;
    }

    public function setSegundaEpoca(?float $segundaEpoca): self
    {
        $this->segundaEpoca = $segundaEpoca;
        return $this;
    }

    public function getMediaanual(): ?float
    {
        return $this->mediaanual;
    }

    public function setMediaanual(?float $mediaanual): self
    {
        $this->mediaanual = $mediaanual;
        return $this;
    }

    public function getMediafinal(): ?float
    {
        return $this->mediafinal;
    }

    public function setMediafinal(?float $mediafinal): self
    {
        $this->mediafinal = $mediafinal;
        return $this;
    }

    public function getFrequencia(): ?float
    {
        return $this->frequencia;
    }

    public function setFrequencia(?float $frequencia): self
    {
        $this->frequencia = $frequencia;
        return $this;
    }

    public function getTotalfaltas(): ?float
    {
        return $this->totalfaltas;
    }

    public function setTotalfaltas(?float $totalfaltas): self
    {
        $this->totalfaltas = $totalfaltas;
        return $this;
    }

    public function getSituacao(): int
    {
        return $this->situacao;
    }

    public function setSituacao(int $situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }

    public function getUsuario(): ?int
    {
        return $this->usuario;
    }

    public function setUsuario(?int $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getCodigoescola(): ?int
    {
        return $this->codigoescola;
    }

    public function setCodigoescola(?int $codigoescola): self
    {
        $this->codigoescola = $codigoescola;
        return $this;
    }

    public function getAproveitamento(): ?string
    {
        return $this->aproveitamento;
    }

    public function setAproveitamento(?string $aproveitamento): self
    {
        $this->aproveitamento = $aproveitamento;
        return $this;
    }

    public function getTurmamatricula(): ?string
    {
        return $this->turmamatricula;
    }

    public function setTurmamatricula(?string $turmamatricula): self
    {
        $this->turmamatricula = $turmamatricula;
        return $this;
    }

    public function getIdTurmaItinerarioObrigatorio(): ?Turmas
    {
        return $this->idTurmaItinerarioObrigatorio;
    }

    public function setIdTurmaItinerarioObrigatorio(?Turmas $idTurmaItinerarioObrigatorio): self
    {
        $this->idTurmaItinerarioObrigatorio = $idTurmaItinerarioObrigatorio;
        return $this;
    }

    public function getIdTurmaItinerarioOpcional(): ?Turmas
    {
        return $this->idTurmaItinerarioOpcional;
    }

    public function setIdTurmaItinerarioOpcional(?Turmas $idTurmaItinerarioOpcional): self
    {
        $this->idTurmaItinerarioOpcional = $idTurmaItinerarioOpcional;
        return $this;
    }

    public function getNota5(): ?float
    {
        return $this->nota5;
    }

    public function setNota5(?float $nota5): self
    {
        $this->nota5 = $nota5;
        return $this;
    }

    public function getNotaSa5(): ?float
    {
        return $this->notaSa5;
    }

    public function setNotaSa5(?float $notaSa5): self
    {
        $this->notaSa5 = $notaSa5;
        return $this;
    }

    public function getAjuste5(): ?float
    {
        return $this->ajuste5;
    }

    public function setAjuste5(?float $ajuste5): self
    {
        $this->ajuste5 = $ajuste5;
        return $this;
    }

    public function getFalta5(): ?float
    {
        return $this->falta5;
    }

    public function setFalta5(?float $falta5): self
    {
        $this->falta5 = $falta5;
        return $this;
    }

    public function getExame5(): ?float
    {
        return $this->exame5;
    }

    public function setExame5(?float $exame5): self
    {
        $this->exame5 = $exame5;
        return $this;
    }

    public function getNota6(): ?float
    {
        return $this->nota6;
    }

    public function setNota6(?float $nota6): self
    {
        $this->nota6 = $nota6;
        return $this;
    }

    public function getNotaSa6(): ?float
    {
        return $this->notaSa6;
    }

    public function setNotaSa6(?float $notaSa6): self
    {
        $this->notaSa6 = $notaSa6;
        return $this;
    }

    public function getAjuste6(): ?float
    {
        return $this->ajuste6;
    }

    public function setAjuste6(?float $ajuste6): self
    {
        $this->ajuste6 = $ajuste6;
        return $this;
    }

    public function getFalta6(): ?float
    {
        return $this->falta6;
    }

    public function setFalta6(?float $falta6): self
    {
        $this->falta6 = $falta6;
        return $this;
    }

    public function getExame6(): ?float
    {
        return $this->exame6;
    }

    public function setExame6(?float $exame6): self
    {
        $this->exame6 = $exame6;
        return $this;
    }

    public function getNota7(): ?float
    {
        return $this->nota7;
    }

    public function setNota7(?float $nota7): self
    {
        $this->nota7 = $nota7;
        return $this;
    }

    public function getNotaSa7(): ?float
    {
        return $this->notaSa7;
    }

    public function setNotaSa7(?float $notaSa7): self
    {
        $this->notaSa7 = $notaSa7;
        return $this;
    }

    public function getAjuste7(): ?float
    {
        return $this->ajuste7;
    }

    public function setAjuste7(?float $ajuste7): self
    {
        $this->ajuste7 = $ajuste7;
        return $this;
    }

    public function getFalta7(): ?float
    {
        return $this->falta7;
    }

    public function setFalta7(?float $falta7): self
    {
        $this->falta7 = $falta7;
        return $this;
    }

    public function getExame7(): ?float
    {
        return $this->exame7;
    }

    public function setExame7(?float $exame7): self
    {
        $this->exame7 = $exame7;
        return $this;
    }

    public function getNota8(): ?float
    {
        return $this->nota8;
    }

    public function setNota8(?float $nota8): self
    {
        $this->nota8 = $nota8;
        return $this;
    }

    public function getNotaSa8(): ?float
    {
        return $this->notaSa8;
    }

    public function setNotaSa8(?float $notaSa8): self
    {
        $this->notaSa8 = $notaSa8;
        return $this;
    }

    public function getAjuste8(): ?float
    {
        return $this->ajuste8;
    }

    public function setAjuste8(?float $ajuste8): self
    {
        $this->ajuste8 = $ajuste8;
        return $this;
    }

    public function getFalta8(): ?float
    {
        return $this->falta8;
    }

    public function setFalta8(?float $falta8): self
    {
        $this->falta8 = $falta8;
        return $this;
    }

    public function getExame8(): ?float
    {
        return $this->exame8;
    }

    public function setExame8(?float $exame8): self
    {
        $this->exame8 = $exame8;
        return $this;
    }

    public function getNota9(): ?float
    {
        return $this->nota9;
    }

    public function setNota9(?float $nota9): self
    {
        $this->nota9 = $nota9;
        return $this;
    }

    public function getNotaSa9(): ?float
    {
        return $this->notaSa9;
    }

    public function setNotaSa9(?float $notaSa9): self
    {
        $this->notaSa9 = $notaSa9;
        return $this;
    }

    public function getAjuste9(): ?float
    {
        return $this->ajuste9;
    }

    public function setAjuste9(?float $ajuste9): self
    {
        $this->ajuste9 = $ajuste9;
        return $this;
    }

    public function getFalta9(): ?float
    {
        return $this->falta9;
    }

    public function setFalta9(?float $falta9): self
    {
        $this->falta9 = $falta9;
        return $this;
    }

    public function getExame9(): ?float
    {
        return $this->exame9;
    }

    public function setExame9(?float $exame9): self
    {
        $this->exame9 = $exame9;
        return $this;
    }

    public function getNota10(): ?float
    {
        return $this->nota10;
    }

    public function setNota10(?float $nota10): self
    {
        $this->nota10 = $nota10;
        return $this;
    }

    public function getNotaSa10(): ?float
    {
        return $this->notaSa10;
    }

    public function setNotaSa10(?float $notaSa10): self
    {
        $this->notaSa10 = $notaSa10;
        return $this;
    }

    public function getAjuste10(): ?float
    {
        return $this->ajuste10;
    }

    public function setAjuste10(?float $ajuste10): self
    {
        $this->ajuste10 = $ajuste10;
        return $this;
    }

    public function getFalta10(): ?float
    {
        return $this->falta10;
    }

    public function setFalta10(?float $falta10): self
    {
        $this->falta10 = $falta10;
        return $this;
    }

    public function getExame10(): ?float
    {
        return $this->exame10;
    }

    public function setExame10(?float $exame10): self
    {
        $this->exame10 = $exame10;
        return $this;
    }

    public function getArrumardiario(): ?string
    {
        return $this->arrumardiario;
    }

    public function setArrumardiario(?string $arrumardiario): self
    {
        $this->arrumardiario = $arrumardiario;
        return $this;
    }

    public function getNotaD1(): ?float
    {
        return $this->notaD1;
    }

    public function setNotaD1(?float $notaD1): self
    {
        $this->notaD1 = $notaD1;
        return $this;
    }

    public function getNotaD2(): ?float
    {
        return $this->notaD2;
    }

    public function setNotaD2(?float $notaD2): self
    {
        $this->notaD2 = $notaD2;
        return $this;
    }

    public function getNotaD3(): ?float
    {
        return $this->notaD3;
    }

    public function setNotaD3(?float $notaD3): self
    {
        $this->notaD3 = $notaD3;
        return $this;
    }

    public function getNotaD4(): ?float
    {
        return $this->notaD4;
    }

    public function setNotaD4(?float $notaD4): self
    {
        $this->notaD4 = $notaD4;
        return $this;
    }

    public function getNotaD5(): ?float
    {
        return $this->notaD5;
    }

    public function setNotaD5(?float $notaD5): self
    {
        $this->notaD5 = $notaD5;
        return $this;
    }

    public function getNotaD6(): ?float
    {
        return $this->notaD6;
    }

    public function setNotaD6(?float $notaD6): self
    {
        $this->notaD6 = $notaD6;
        return $this;
    }

    public function getNotaD7(): ?float
    {
        return $this->notaD7;
    }

    public function setNotaD7(?float $notaD7): self
    {
        $this->notaD7 = $notaD7;
        return $this;
    }

    public function getNotaD8(): ?float
    {
        return $this->notaD8;
    }

    public function setNotaD8(?float $notaD8): self
    {
        $this->notaD8 = $notaD8;
        return $this;
    }

    public function getNotaD9(): ?float
    {
        return $this->notaD9;
    }

    public function setNotaD9(?float $notaD9): self
    {
        $this->notaD9 = $notaD9;
        return $this;
    }

    public function getNotaD10(): ?float
    {
        return $this->notaD10;
    }

    public function setNotaD10(?float $notaD10): self
    {
        $this->notaD10 = $notaD10;
        return $this;
    }

    public function getSimboloObs(): ?string
    {
        return $this->simboloObs;
    }

    public function setSimboloObs(?string $simboloObs): self
    {
        $this->simboloObs = $simboloObs;
        return $this;
    }

    public function getCargaHoraria(): ?float
    {
        return $this->cargaHoraria;
    }

    public function setCargaHoraria(?float $cargaHoraria): self
    {
        $this->cargaHoraria = $cargaHoraria;
        return $this;
    }

    public function isSnBloqueado1(): bool
    {
        return $this->snBloqueado1;
    }

    public function setSnBloqueado1(bool $snBloqueado1): self
    {
        $this->snBloqueado1 = $snBloqueado1;
        return $this;
    }

    public function isSnBloqueado2(): bool
    {
        return $this->snBloqueado2;
    }

    public function setSnBloqueado2(bool $snBloqueado2): self
    {
        $this->snBloqueado2 = $snBloqueado2;
        return $this;
    }

    public function isSnBloqueado3(): bool
    {
        return $this->snBloqueado3;
    }

    public function setSnBloqueado3(bool $snBloqueado3): self
    {
        $this->snBloqueado3 = $snBloqueado3;
        return $this;
    }

    public function isSnBloqueado4(): bool
    {
        return $this->snBloqueado4;
    }

    public function setSnBloqueado4(bool $snBloqueado4): self
    {
        $this->snBloqueado4 = $snBloqueado4;
        return $this;
    }

    public function isSnBloqueado5(): bool
    {
        return $this->snBloqueado5;
    }

    public function setSnBloqueado5(bool $snBloqueado5): self
    {
        $this->snBloqueado5 = $snBloqueado5;
        return $this;
    }

    public function isSnBloqueado6(): bool
    {
        return $this->snBloqueado6;
    }

    public function setSnBloqueado6(bool $snBloqueado6): self
    {
        $this->snBloqueado6 = $snBloqueado6;
        return $this;
    }

    public function isSnBloqueado7(): bool
    {
        return $this->snBloqueado7;
    }

    public function setSnBloqueado7(bool $snBloqueado7): self
    {
        $this->snBloqueado7 = $snBloqueado7;
        return $this;
    }

    public function isSnBloqueado8(): bool
    {
        return $this->snBloqueado8;
    }

    public function setSnBloqueado8(bool $snBloqueado8): self
    {
        $this->snBloqueado8 = $snBloqueado8;
        return $this;
    }

    public function isSnBloqueado9(): bool
    {
        return $this->snBloqueado9;
    }

    public function setSnBloqueado9(bool $snBloqueado9): self
    {
        $this->snBloqueado9 = $snBloqueado9;
        return $this;
    }

    public function isSnBloqueado10(): bool
    {
        return $this->snBloqueado10;
    }

    public function setSnBloqueado10(bool $snBloqueado10): self
    {
        $this->snBloqueado10 = $snBloqueado10;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
        return $this;
    }

    public function getDbMediaPeriodo1(): ?float
    {
        return $this->dbMediaPeriodo1;
    }

    public function setDbMediaPeriodo1(?float $dbMediaPeriodo1): self
    {
        $this->dbMediaPeriodo1 = $dbMediaPeriodo1;
        return $this;
    }

    public function getCdSituacaoPeriodo1(): ?int
    {
        return $this->cdSituacaoPeriodo1;
    }

    public function setCdSituacaoPeriodo1(?int $cdSituacaoPeriodo1): self
    {
        $this->cdSituacaoPeriodo1 = $cdSituacaoPeriodo1;
        return $this;
    }

    public function getDbMediaPeriodo2(): ?float
    {
        return $this->dbMediaPeriodo2;
    }

    public function setDbMediaPeriodo2(?float $dbMediaPeriodo2): self
    {
        $this->dbMediaPeriodo2 = $dbMediaPeriodo2;
        return $this;
    }

    public function getCdSituacaoPeriodo2(): ?int
    {
        return $this->cdSituacaoPeriodo2;
    }

    public function setCdSituacaoPeriodo2(?int $cdSituacaoPeriodo2): self
    {
        $this->cdSituacaoPeriodo2 = $cdSituacaoPeriodo2;
        return $this;
    }

    public function getDbMediaPeriodo3(): ?float
    {
        return $this->dbMediaPeriodo3;
    }

    public function setDbMediaPeriodo3(?float $dbMediaPeriodo3): self
    {
        $this->dbMediaPeriodo3 = $dbMediaPeriodo3;
        return $this;
    }

    public function getCdSituacaoPeriodo3(): ?int
    {
        return $this->cdSituacaoPeriodo3;
    }

    public function setCdSituacaoPeriodo3(?int $cdSituacaoPeriodo3): self
    {
        $this->cdSituacaoPeriodo3 = $cdSituacaoPeriodo3;
        return $this;
    }

    public function getDbMediaPeriodo4(): ?float
    {
        return $this->dbMediaPeriodo4;
    }

    public function setDbMediaPeriodo4(?float $dbMediaPeriodo4): self
    {
        $this->dbMediaPeriodo4 = $dbMediaPeriodo4;
        return $this;
    }

    public function getCdSituacaoPeriodo4(): ?int
    {
        return $this->cdSituacaoPeriodo4;
    }

    public function setCdSituacaoPeriodo4(?int $cdSituacaoPeriodo4): self
    {
        $this->cdSituacaoPeriodo4 = $cdSituacaoPeriodo4;
        return $this;
    }

    public function getDbMediaPeriodo5(): ?float
    {
        return $this->dbMediaPeriodo5;
    }

    public function setDbMediaPeriodo5(?float $dbMediaPeriodo5): self
    {
        $this->dbMediaPeriodo5 = $dbMediaPeriodo5;
        return $this;
    }

    public function getCdSituacaoPeriodo5(): ?int
    {
        return $this->cdSituacaoPeriodo5;
    }

    public function setCdSituacaoPeriodo5(?int $cdSituacaoPeriodo5): self
    {
        $this->cdSituacaoPeriodo5 = $cdSituacaoPeriodo5;
        return $this;
    }

    public function getDbMediaPeriodo6(): ?float
    {
        return $this->dbMediaPeriodo6;
    }

    public function setDbMediaPeriodo6(?float $dbMediaPeriodo6): self
    {
        $this->dbMediaPeriodo6 = $dbMediaPeriodo6;
        return $this;
    }

    public function getCdSituacaoPeriodo6(): ?int
    {
        return $this->cdSituacaoPeriodo6;
    }

    public function setCdSituacaoPeriodo6(?int $cdSituacaoPeriodo6): self
    {
        $this->cdSituacaoPeriodo6 = $cdSituacaoPeriodo6;
        return $this;
    }

    public function getDbMediaPeriodo7(): ?float
    {
        return $this->dbMediaPeriodo7;
    }

    public function setDbMediaPeriodo7(?float $dbMediaPeriodo7): self
    {
        $this->dbMediaPeriodo7 = $dbMediaPeriodo7;
        return $this;
    }

    public function getCdSituacaoPeriodo7(): ?int
    {
        return $this->cdSituacaoPeriodo7;
    }

    public function setCdSituacaoPeriodo7(?int $cdSituacaoPeriodo7): self
    {
        $this->cdSituacaoPeriodo7 = $cdSituacaoPeriodo7;
        return $this;
    }

    public function getDbMediaPeriodo8(): ?float
    {
        return $this->dbMediaPeriodo8;
    }

    public function setDbMediaPeriodo8(?float $dbMediaPeriodo8): self
    {
        $this->dbMediaPeriodo8 = $dbMediaPeriodo8;
        return $this;
    }

    public function getCdSituacaoPeriodo8(): ?int
    {
        return $this->cdSituacaoPeriodo8;
    }

    public function setCdSituacaoPeriodo8(?int $cdSituacaoPeriodo8): self
    {
        $this->cdSituacaoPeriodo8 = $cdSituacaoPeriodo8;
        return $this;
    }

    public function getDbMediaPeriodo9(): ?float
    {
        return $this->dbMediaPeriodo9;
    }

    public function setDbMediaPeriodo9(?float $dbMediaPeriodo9): self
    {
        $this->dbMediaPeriodo9 = $dbMediaPeriodo9;
        return $this;
    }

    public function getCdSituacaoPeriodo9(): ?int
    {
        return $this->cdSituacaoPeriodo9;
    }

    public function setCdSituacaoPeriodo9(?int $cdSituacaoPeriodo9): self
    {
        $this->cdSituacaoPeriodo9 = $cdSituacaoPeriodo9;
        return $this;
    }

    public function getDbMediaPeriodo10(): ?float
    {
        return $this->dbMediaPeriodo10;
    }

    public function setDbMediaPeriodo10(?float $dbMediaPeriodo10): self
    {
        $this->dbMediaPeriodo10 = $dbMediaPeriodo10;
        return $this;
    }

    public function getCdSituacaoPeriodo10(): ?int
    {
        return $this->cdSituacaoPeriodo10;
    }

    public function setCdSituacaoPeriodo10(?int $cdSituacaoPeriodo10): self
    {
        $this->cdSituacaoPeriodo10 = $cdSituacaoPeriodo10;
        return $this;
    }

    public function getDtMatricula(): ?\DateTimeInterface
    {
        return $this->dtMatricula;
    }

    public function setDtMatricula(?\DateTimeInterface $dtMatricula): self
    {
        $this->dtMatricula = $dtMatricula;
        return $this;
    }

    public function getDsMedia(): ?string
    {
        return $this->dsMedia;
    }

    public function setDsMedia(?string $dsMedia): self
    {
        $this->dsMedia = $dsMedia;
        return $this;
    }

    public function isSnFaltouExame(): ?bool
    {
        return $this->snFaltouExame;
    }

    public function setSnFaltouExame(?bool $snFaltouExame): self
    {
        $this->snFaltouExame = $snFaltouExame;
        return $this;
    }

    public function isSnBloqueioNotaExame(): bool
    {
        return $this->snBloqueioNotaExame;
    }

    public function setSnBloqueioNotaExame(bool $snBloqueioNotaExame): self
    {
        $this->snBloqueioNotaExame = $snBloqueioNotaExame;
        return $this;
    }

    public function isSnBloqFreq1(): ?bool
    {
        return $this->snBloqFreq1;
    }

    public function setSnBloqFreq1(?bool $snBloqFreq1): self
    {
        $this->snBloqFreq1 = $snBloqFreq1;
        return $this;
    }

    public function isSnBloqFreq2(): ?bool
    {
        return $this->snBloqFreq2;
    }

    public function setSnBloqFreq2(?bool $snBloqFreq2): self
    {
        $this->snBloqFreq2 = $snBloqFreq2;
        return $this;
    }

    public function isSnBloqFreq3(): ?bool
    {
        return $this->snBloqFreq3;
    }

    public function setSnBloqFreq3(?bool $snBloqFreq3): self
    {
        $this->snBloqFreq3 = $snBloqFreq3;
        return $this;
    }

    public function isSnBloqFreq4(): ?bool
    {
        return $this->snBloqFreq4;
    }

    public function setSnBloqFreq4(?bool $snBloqFreq4): self
    {
        $this->snBloqFreq4 = $snBloqFreq4;
        return $this;
    }

    public function isSnBloqFreq5(): ?bool
    {
        return $this->snBloqFreq5;
    }

    public function setSnBloqFreq5(?bool $snBloqFreq5): self
    {
        $this->snBloqFreq5 = $snBloqFreq5;
        return $this;
    }

    public function isSnBloqFreq6(): ?bool
    {
        return $this->snBloqFreq6;
    }

    public function setSnBloqFreq6(?bool $snBloqFreq6): self
    {
        $this->snBloqFreq6 = $snBloqFreq6;
        return $this;
    }

    public function isSnBloqFreq7(): ?bool
    {
        return $this->snBloqFreq7;
    }

    public function setSnBloqFreq7(?bool $snBloqFreq7): self
    {
        $this->snBloqFreq7 = $snBloqFreq7;
        return $this;
    }

    public function isSnBloqFreq8(): ?bool
    {
        return $this->snBloqFreq8;
    }

    public function setSnBloqFreq8(?bool $snBloqFreq8): self
    {
        $this->snBloqFreq8 = $snBloqFreq8;
        return $this;
    }

    public function isSnBloqFreq9(): ?bool
    {
        return $this->snBloqFreq9;
    }

    public function setSnBloqFreq9(?bool $snBloqFreq9): self
    {
        $this->snBloqFreq9 = $snBloqFreq9;
        return $this;
    }

    public function isSnBloqFreq10(): ?bool
    {
        return $this->snBloqFreq10;
    }

    public function setSnBloqFreq10(?bool $snBloqFreq10): self
    {
        $this->snBloqFreq10 = $snBloqFreq10;
        return $this;
    }

    public function isSnBloqFreqGlobal(): ?bool
    {
        return $this->snBloqFreqGlobal;
    }

    public function setSnBloqFreqGlobal(?bool $snBloqFreqGlobal): self
    {
        $this->snBloqFreqGlobal = $snBloqFreqGlobal;
        return $this;
    }

    public function getMediaAjustada(): ?float
    {
        return $this->mediaAjustada;
    }

    public function setMediaAjustada(?float $mediaAjustada): self
    {
        $this->mediaAjustada = $mediaAjustada;
        return $this;
    }

    public function isSnBloqueio2epoca(): bool
    {
        return $this->snBloqueio2epoca;
    }

    public function setSnBloqueio2epoca(bool $snBloqueio2epoca): self
    {
        $this->snBloqueio2epoca = $snBloqueio2epoca;
        return $this;
    }

    public function isSnFaltou2epoca(): bool
    {
        return $this->snFaltou2epoca;
    }

    public function setSnFaltou2epoca(bool $snFaltou2epoca): self
    {
        $this->snFaltou2epoca = $snFaltou2epoca;
        return $this;
    }

    public function getCdMensalidadeExame(): ?int
    {
        return $this->cdMensalidadeExame;
    }

    public function setCdMensalidadeExame(?int $cdMensalidadeExame): self
    {
        $this->cdMensalidadeExame = $cdMensalidadeExame;
        return $this;
    }

    public function isSnPossuiCompl(): bool
    {
        return $this->snPossuiCompl;
    }

    public function setSnPossuiCompl(bool $snPossuiCompl): self
    {
        $this->snPossuiCompl = $snPossuiCompl;
        return $this;
    }

    public function isSnAprovadoProficiencia(): bool
    {
        return $this->snAprovadoProficiencia;
    }

    public function setSnAprovadoProficiencia(bool $snAprovadoProficiencia): self
    {
        $this->snAprovadoProficiencia = $snAprovadoProficiencia;
        return $this;
    }

    public function isSnPossuiAdap(): ?bool
    {
        return $this->snPossuiAdap;
    }

    public function setSnPossuiAdap(?bool $snPossuiAdap): self
    {
        $this->snPossuiAdap = $snPossuiAdap;
        return $this;
    }

    public function isSnPossuiDepen(): ?bool
    {
        return $this->snPossuiDepen;
    }

    public function setSnPossuiDepen(?bool $snPossuiDepen): self
    {
        $this->snPossuiDepen = $snPossuiDepen;
        return $this;
    }

    public function getNrCrFin(): ?float
    {
        return $this->nrCrFin;
    }

    public function setNrCrFin(?float $nrCrFin): self
    {
        $this->nrCrFin = $nrCrFin;
        return $this;
    }

    public function getSnBloqueioDsMedia(): int
    {
        return $this->snBloqueioDsMedia;
    }

    public function setSnBloqueioDsMedia(int $snBloqueioDsMedia): self
    {
        $this->snBloqueioDsMedia = $snBloqueioDsMedia;
        return $this;
    }

    public function getSnDispensadoPi(): int
    {
        return $this->snDispensadoPi;
    }

    public function setSnDispensadoPi(int $snDispensadoPi): self
    {
        $this->snDispensadoPi = $snDispensadoPi;
        return $this;
    }

    public function getCdCategoriaComponenteCurricular(): ?UnimCategoriaComponenteCurricular
    {
        return $this->cdCategoriaComponenteCurricular;
    }

    public function setCdCategoriaComponenteCurricular(?UnimCategoriaComponenteCurricular $cdCategoriaComponenteCurricular): self
    {
        $this->cdCategoriaComponenteCurricular = $cdCategoriaComponenteCurricular;
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

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getFrequenciaPersonalizado(): ?string
    {
        return $this->frequenciaPersonalizado;
    }

    public function setFrequenciaPersonalizado(?string $frequenciaPersonalizado): self
    {
        $this->frequenciaPersonalizado = $frequenciaPersonalizado;
        return $this;
    }

    public function getCargaHorariaPersonalizado(): ?string
    {
        return $this->cargaHorariaPersonalizado;
    }

    public function setCargaHorariaPersonalizado(?string $cargaHorariaPersonalizado): self
    {
        $this->cargaHorariaPersonalizado = $cargaHorariaPersonalizado;
        return $this;
    }
}
