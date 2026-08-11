<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\AvaliacoesParametrosMatrizRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacoesParametrosMatrizRepository::class)]
#[ORM\Table(
    name: 'avaliacoes_parametros_matriz',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_DT_REVISAO', columns: ['dt_revisao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_AVALIACOES_PARAMETROS_MATRIZ', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AvaliacoesParametrosMatriz
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacao', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdAvaliacao = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'ds_avaliacao', type: 'string', length: 100, nullable: true)]
    private ?string $dsAvaliacao = null;

    #[ORM\Column(name: 'nr_avaliacoes', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrAvaliacoes = 0;

    #[ORM\Column(name: 'nr_maximo_aulas', type: 'integer', options: ['unsigned' => true, 'default' => '2'])]
    private int $nrMaximoAulas = 2;

    #[ORM\Column(name: 'cd_periodo_avaliacao', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPeriodoAvaliacao = 0;

    #[ORM\Column(name: 'ds_cond_aprov_direta', type: 'string', length: 250, nullable: true)]
    private ?string $dsCondAprovDireta = null;

    #[ORM\Column(name: 'ds_cond_repro_direta', type: 'string', length: 250, nullable: true)]
    private ?string $dsCondReproDireta = null;

    #[ORM\Column(name: 'ds_formula_media_anual', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFormulaMediaAnual = null;

    #[ORM\Column(name: 'ds_formula_media_final', type: 'string', length: 250, nullable: true)]
    private ?string $dsFormulaMediaFinal = null;

    #[ORM\Column(name: 'ds_formula_media_exame', type: 'string', length: 250, nullable: true)]
    private ?string $dsFormulaMediaExame = null;

    #[ORM\Column(name: 'ds_formula_media_segunda', type: 'string', length: 250, nullable: true)]
    private ?string $dsFormulaMediaSegunda = null;

    #[ORM\Column(name: 'ds_cond_aprov_exame', type: 'string', length: 250, nullable: true)]
    private ?string $dsCondAprovExame = null;

    #[ORM\Column(name: 'ds_cond_aprov_segunda', type: 'string', length: 250, nullable: true)]
    private ?string $dsCondAprovSegunda = null;

    #[ORM\Column(name: 'nr_max_disci_exame', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrMaxDisciExame = 0;

    #[ORM\Column(name: 'nr_max_disci_segunda', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrMaxDisciSegunda = 0;

    #[ORM\Column(name: 'sn_notas', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snNotas = 'N';

    #[ORM\Column(name: 'sn_conceitos', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snConceitos = 'N';

    #[ORM\Column(name: 'sn_conceitos_parciais', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snConceitosParciais = 'N';

    #[ORM\Column(name: 'sn_descricao', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snDescricao = 'N';

    #[ORM\Column(name: 'sn_exame', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snExame = 'N';

    #[ORM\Column(name: 'sn_pi', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snPi = 'N';

    #[ORM\Column(name: 'ds_formula_media_sem_pi', type: 'string', length: 250, nullable: true)]
    private ?string $dsFormulaMediaSemPi = null;

    #[ORM\Column(name: 'sn_segunda_epoca', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snSegundaEpoca = 'N';

    #[ORM\Column(name: 'sn_frequencia_global', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snFrequenciaGlobal = 'N';

    #[ORM\Column(name: 'ds_frequencia_tipo', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => '0'])]
    private ?string $dsFrequenciaTipo = '0';

    #[ORM\Column(name: 'cd_disci_frequencia', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdDisciFrequencia = 0;

    #[ORM\Column(name: 'sn_recuperacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snRecuperacao = null;

    #[ORM\Column(name: 'enum_recuperacao_periodo', type: 'enum', nullable: true, options: ['values' => ['nao_utilizar', 'todas_etapas', 'cada_duas_etapas']])]
    private ?string $enumRecuperacaoPeriodo = null;

    #[ORM\Column(name: 'ds_formula_recuperacao', type: 'string', length: 250, nullable: true)]
    private ?string $dsFormulaRecuperacao = null;

    #[ORM\Column(name: 'ds_criterio_recuperacao', type: 'string', length: 100, nullable: true)]
    private ?string $dsCriterioRecuperacao = null;

    #[ORM\Column(name: 'nr_casas_decimais', type: 'smallint', nullable: true)]
    private ?int $nrCasasDecimais = null;

    #[ORM\Column(name: 'ds_cond_recuperacao', type: 'string', length: 250, nullable: true)]
    private ?string $dsCondRecuperacao = null;

    #[ORM\Column(name: 'vl_arredondamento', type: 'float', nullable: true)]
    private ?float $vlArredondamento = null;

    #[ORM\Column(name: 'sn_notas_diario_online', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snNotasDiarioOnline = 'N';

    #[ORM\Column(name: 'sn_notas_diario', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snNotasDiario = 'N';

    #[ORM\Column(name: 'sn_desblo_coorde', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snDesbloCoorde = 'N';

    #[ORM\Column(name: 'sn_diario_imp_notas', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'S'])]
    private string $snDiarioImpNotas = 'S';

    #[ORM\Column(name: 'sn_diario_imp_freqs', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'S'])]
    private string $snDiarioImpFreqs = 'S';

    #[ORM\Column(name: 'sn_notas_truncar', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snNotasTruncar = 'N';

    #[ORM\Column(name: 'sn_anual_truncar', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snAnualTruncar = null;

    #[ORM\Column(name: 'sn_medias_truncar', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snMediasTruncar = null;

    #[ORM\Column(name: 'sn_diario_imp_contprog', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'S'])]
    private string $snDiarioImpContprog = 'S';

    #[ORM\Column(name: 'ds_nota_exame', type: 'string', length: 255, nullable: true)]
    private ?string $dsNotaExame = null;

    #[ORM\Column(name: 'ds_nota_segunda', type: 'string', length: 255, nullable: true)]
    private ?string $dsNotaSegunda = null;

    #[ORM\Column(name: 'sn_diario_online', type: 'smallint', options: ['default' => '0'])]
    private int $snDiarioOnline = 0;

    #[ORM\Column(name: 'sn_extra_classe', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snExtraClasse = 0;

    #[ORM\Column(name: 'sn_diario_eletro', type: 'integer', options: ['default' => '0'])]
    private int $snDiarioEletro = 0;

    #[ORM\Column(name: 'sn_diario_online_provas', type: 'smallint', options: ['default' => '0'])]
    private int $snDiarioOnlineProvas = 0;

    #[ORM\Column(name: 'sn_diario_online_aulas', type: 'smallint', options: ['default' => '0'])]
    private int $snDiarioOnlineAulas = 0;

    #[ORM\Column(name: 'sn_diario_online_recalc_medias', type: 'smallint', options: ['default' => '0'])]
    private int $snDiarioOnlineRecalcMedias = 0;

    #[ORM\Column(name: 'sn_diario_online_bloque_aulas', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snDiarioOnlineBloqueAulas = 1;

    #[ORM\Column(name: 'sn_diario_online_bloque_provas', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snDiarioOnlineBloqueProvas = 1;

    #[ORM\Column(name: 'nr_casas_decimais_forcado', type: 'integer', nullable: true)]
    private ?int $nrCasasDecimaisForcado = null;

    #[ORM\Column(name: 'tp_ajuste_forcado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $tpAjusteForcado = null;

    #[ORM\Column(name: 'nr_casas_forcado_media', type: 'integer', nullable: true)]
    private ?int $nrCasasForcadoMedia = null;

    #[ORM\Column(name: 'tp_ajuste_forcado_media', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $tpAjusteForcadoMedia = null;

    #[ORM\Column(name: 'sn_altera_notas_direta', type: 'integer', options: ['default' => '0'])]
    private int $snAlteraNotasDireta = 0;

    #[ORM\Column(name: 'sn_converter_notas_nulas', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snConverterNotasNulas = false;

    #[ORM\Column(name: 'sn_mostrar_alunos_curs_padrao', type: 'boolean', options: ['default' => '0'])]
    private bool $snMostrarAlunosCursPadrao = false;

    #[ORM\Column(name: 'sn_ins_aulas_semhorario', type: 'boolean', options: ['default' => '0'])]
    private bool $snInsAulasSemhorario = false;

    #[ORM\Column(name: 'sn_copiar_conteudo_pordata', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCopiarConteudoPordata = 0;

    #[ORM\Column(name: 'sn_ajuste_apos_recuperacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAjusteAposRecuperacao = 1;

    #[ORM\Column(name: 'ds_formula_padrao', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormulaPadrao = null;

    #[ORM\Column(name: 'sn_obrigar_formula_padrao', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snObrigarFormulaPadrao = 0;

    #[ORM\Column(name: 'ds_formula_media_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsFormulaMediaCurso = null;

    #[ORM\Column(name: 'nr_inicio_aulas_extras', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrInicioAulasExtras = null;

    #[ORM\Column(name: 'sn_usar_media_curso', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snUsarMediaCurso = false;

    #[ORM\Column(name: 'ds_sigla', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'ds_formula_periodo', type: 'string', length: 1000, nullable: true)]
    private ?string $dsFormulaPeriodo = null;

    #[ORM\Column(name: 'nr_periodos', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrPeriodos = 0;

    #[ORM\Column(name: 'ds_condicao_situacao_periodo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCondicaoSituacaoPeriodo = null;

    #[ORM\Column(name: 'sn_diario_online_mostra_ajuste', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snDiarioOnlineMostraAjuste = 1;

    #[ORM\Column(name: 'nr_dias_diario_bloq_provas', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrDiasDiarioBloqProvas = 0;

    #[ORM\Column(name: 'sn_descricao_fixa', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snDescricaoFixa = 'N';

    #[ORM\Column(name: 'sn_freque_pergunta', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snFrequePergunta = false;

    #[ORM\Column(name: 'sn_freque_pergunta_padrao', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snFrequePerguntaPadrao = true;

    #[ORM\Column(name: 'sn_professor_fecha_diario', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProfessorFechaDiario = false;

    #[ORM\Column(name: 'sn_profes_digita_peso', type: 'string', length: 50, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snProfesDigitaPeso = 'N';

    #[ORM\Column(name: 'cd_situacao_concluida', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoConcluida = null;

    #[ORM\Column(name: 'nr_qtd_aulas_impressao', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrQtdAulasImpressao = 0;

    #[ORM\Column(name: 'nr_notas_max_alteracoes', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrNotasMaxAlteracoes = null;

    #[ORM\Column(name: 'sn_digita_exame_diario_online', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snDigitaExameDiarioOnline = 0;

    #[ORM\Column(name: 'ds_formula_pi', type: 'string', length: 250, nullable: true)]
    private ?string $dsFormulaPi = null;

    #[ORM\Column(name: 'cd_tipo_horario', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $cdTipoHorario = 1;

    #[ORM\Column(name: 'cd_situacao_aprov_direta', type: 'integer', nullable: true)]
    private ?int $cdSituacaoAprovDireta = null;

    #[ORM\Column(name: 'cd_situacao_aprov_exame', type: 'integer', nullable: true)]
    private ?int $cdSituacaoAprovExame = null;

    #[ORM\Column(name: 'cd_situacao_aprov_2epoca', type: 'integer', nullable: true)]
    private ?int $cdSituacaoAprov2epoca = null;

    #[ORM\Column(name: 'sn_frequencia_turma', type: 'boolean', options: ['default' => '0'])]
    private bool $snFrequenciaTurma = false;

    #[ORM\Column(name: 'sn_diario_online_atividades', type: 'smallint', options: ['default' => '0'])]
    private int $snDiarioOnlineAtividades = 0;

    #[ORM\Column(name: 'nr_media_proficiencia', type: 'smallfloat', nullable: true, options: ['unsigned' => true])]
    private ?float $nrMediaProficiencia = null;

    #[ORM\Column(name: 'sn_alterar_nota_exame', type: 'boolean', options: ['default' => '1'])]
    private bool $snAlterarNotaExame = true;

    #[ORM\Column(name: 'sn_digita_todas_notas', type: 'smallint', options: ['default' => '0'])]
    private int $snDigitaTodasNotas = 0;

    #[ORM\Column(name: 'sn_ajuste_media', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snAjusteMedia = 'N';

    #[ORM\Column(name: 'sn_alterar_2epoca', type: 'boolean', options: ['default' => '1'])]
    private bool $snAlterar2epoca = true;

    #[ORM\Column(name: 'sn_calcular_media_aritmetica', type: 'boolean', options: ['default' => '1'])]
    private bool $snCalcularMediaAritmetica = true;

    #[ORM\Column(name: 'sn_falta_exame_forca_2epoca', type: 'boolean', options: ['default' => '0'])]
    private bool $snFaltaExameForca2epoca = false;

    #[ORM\Column(name: 'sn_digita_2epoca_diario_online', type: 'boolean', options: ['default' => '0'])]
    private bool $snDigita2epocaDiarioOnline = false;

    #[ORM\Column(name: 'nm_nome_exame_etapa', type: 'string', length: 50, nullable: true, options: ['fixed' => true])]
    private ?string $nmNomeExameEtapa = null;

    #[ORM\Column(name: 'nm_nome_exame_especial', type: 'string', length: 50, nullable: true, options: ['fixed' => true])]
    private ?string $nmNomeExameEspecial = null;

    #[ORM\Column(name: 'sn_gerar_taxa_recorrencia', type: 'boolean', options: ['default' => '0'])]
    private bool $snGerarTaxaRecorrencia = false;

    #[ORM\Column(name: 'cd_titulo_2epoca', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTitulo2epoca = null;

    #[ORM\Column(name: 'calcular_media_fecha_diario', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $calcularMediaFechaDiario = 0;

    #[ORM\Column(name: 'sn_aulas_datas', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAulasDatas = false;

    #[ORM\Column(name: 'sn_exibir_descricao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snExibirDescricao = false;

    #[ORM\Column(name: 'cd_situacao_proficiencia', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdSituacaoProficiencia = 0;

    #[ORM\Column(name: 'sn_agrupar_aulas_online', type: 'boolean', options: ['default' => '0'])]
    private bool $snAgruparAulasOnline = false;

    #[ORM\Column(name: 'ds_cronograma_visualiza_inicio', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaVisualizaInicio = null;

    #[ORM\Column(name: 'ds_cronograma_visualiza_fim', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaVisualizaFim = null;

    #[ORM\Column(name: 'ds_cronograma_notas_inicio', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaNotasInicio = null;

    #[ORM\Column(name: 'ds_cronograma_notas_fim', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaNotasFim = null;

    #[ORM\Column(name: 'ds_cronograma_aulas_inicio', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaAulasInicio = null;

    #[ORM\Column(name: 'ds_cronograma_aulas_fim', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaAulasFim = null;

    #[ORM\Column(name: 'ds_cronograma_liberacao', type: 'string', length: 100, nullable: true)]
    private ?string $dsCronogramaLiberacao = null;

    #[ORM\Column(name: 'nr_casas_decimais_frequencia', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $nrCasasDecimaisFrequencia = 0;

    #[ORM\Column(name: 'ds_frequencia_registro', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'A'])]
    private string $dsFrequenciaRegistro = 'A';

    #[ORM\Column(name: 'sn_calculo_media_automatico', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCalculoMediaAutomatico = 0;

    #[ORM\Column(name: 'sn_observacao_nota', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snObservacaoNota = 0;

    #[ORM\Column(name: 'sn_agrupar_avaliacao_tipo', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snAgruparAvaliacaoTipo = 0;

    #[ORM\Column(name: 'sn_media_notas_digitadas', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snMediaNotasDigitadas = 1;

    #[ORM\Column(name: 'sn_notas_calcular_medias', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snNotasCalcularMedias = 0;

    #[ORM\Column(name: 'vl_ajuste_min', type: 'float', nullable: true)]
    private ?float $vlAjusteMin = null;

    #[ORM\Column(name: 'vl_ajuste_max', type: 'float', nullable: true)]
    private ?float $vlAjusteMax = null;

    #[ORM\Column(name: 'sn_falta_cancela_taxa', type: 'boolean', options: ['default' => '0'])]
    private bool $snFaltaCancelaTaxa = false;

    #[ORM\Column(name: 'sn_verificar_data_matricula', type: 'boolean', options: ['default' => '1'])]
    private bool $snVerificarDataMatricula = true;

    #[ORM\Column(name: 'sn_arred_forcado_antes_ajuste', type: 'boolean', options: ['default' => '0'])]
    private bool $snArredForcadoAntesAjuste = false;

    #[ORM\Column(name: 'vl_media_arredondamento', type: 'float', nullable: true)]
    private ?float $vlMediaArredondamento = null;

    #[ORM\Column(name: 'vl_media_arredondamento_exame', type: 'float', nullable: true)]
    private ?float $vlMediaArredondamentoExame = null;

    #[ORM\Column(name: 'vl_media_arredondamento_2epoca', type: 'float', nullable: true)]
    private ?float $vlMediaArredondamento2epoca = null;

    #[ORM\Column(name: 'sn_libera_freq_apos_fim_etapa', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snLiberaFreqAposFimEtapa = 0;

    #[ORM\Column(name: 'sn_preencher_notas_nulas_zero', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snPreencherNotasNulasZero = 0;

    #[ORM\Column(name: 'ds_sintese_avaliacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSinteseAvaliacao = null;

    #[ORM\Column(name: 'vl_hora_aula', type: 'float', options: ['default' => '1'])]
    private float $vlHoraAula = 1.0;

    #[ORM\Column(name: 'sn_bloquear_diario', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloquearDiario = false;

    #[ORM\Column(name: 'sn_valida_fecha_diario', type: 'boolean', options: ['default' => '0'])]
    private bool $snValidaFechaDiario = false;

    #[ORM\Column(name: 'sn_alterar_provas', type: 'boolean', options: ['default' => '1'])]
    private bool $snAlterarProvas = true;

    #[ORM\Column(name: 'sn_deferir_notas_diario', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snDeferirNotasDiario = 0;

    #[ORM\Column(name: 'sn_diario_online_bloque_cont', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snDiarioOnlineBloqueCont = 1;

    #[ORM\Column(name: 'cd_situacao_reprov_direta', type: 'integer', nullable: true)]
    private ?int $cdSituacaoReprovDireta = null;

    #[ORM\Column(name: 'cd_situacao_reprov_exame', type: 'integer', nullable: true)]
    private ?int $cdSituacaoReprovExame = null;

    #[ORM\Column(name: 'cd_situacao_reprov_2epoca', type: 'integer', nullable: true)]
    private ?int $cdSituacaoReprov2epoca = null;

    #[ORM\Column(name: 'sn_agrupar_aulas_mesma_data', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snAgruparAulasMesmaData = 0;

    #[ORM\Column(name: 'sn_falta_sem_nota_2epoca', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snFaltaSemNota2epoca = false;

    #[ORM\Column(name: 'sn_faltas_justificadas', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snFaltasJustificadas = 0;

    #[ORM\Column(name: 'sn_comportamento', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snComportamento = 0;

    #[ORM\Column(name: 'sn_diario_online_freq_bloq_cont', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snDiarioOnlineFreqBloqCont = 0;

    #[ORM\Column(name: 'sn_diario_online_freq_bloq_digi', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snDiarioOnlineFreqBloqDigi = 0;

    #[ORM\Column(name: 'sn_diario_online_compart_aula', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snDiarioOnlineCompartAula = 0;

    #[ORM\Column(name: 'sn_diario_online_mostra_resp', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snDiarioOnlineMostraResp = 0;

    #[ORM\Column(name: 'sn_permitir_justificar', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snPermitirJustificar = 0;

    #[ORM\Column(name: 'sn_professor_informar_motivo_media', type: 'integer', nullable: true)]
    private ?int $snProfessorInformarMotivoMedia = null;

    #[ORM\Column(name: 'ds_cond_repro_falta', type: 'string', length: 255, nullable: true)]
    private ?string $dsCondReproFalta = null;

    #[ORM\Column(name: 'cd_situacao_reprov_falta', type: 'integer', nullable: true)]
    private ?int $cdSituacaoReprovFalta = null;

    #[ORM\Column(name: 'sn_converter_frequencias_nulas', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snConverterFrequenciasNulas = 0;

    #[ORM\Column(name: 'sn_ocultar_conteudo_portal', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snOcultarConteudoPortal = false;

    #[ORM\Column(name: 'SN_FREQUENCIAS_CALCULAR_MEDIAS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snFrequenciasCalcularMedias = 0;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'sn_libera_notas_apos_fim_etapa', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snLiberaNotasAposFimEtapa = 0;

    #[ORM\Column(name: 'sn_profes_digita_nota_max', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snProfesDigitaNotaMax = 0;

    #[ORM\Column(name: 'sn_esconder_notas_parciais', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snEsconderNotasParciais = 0;

    #[ORM\Column(name: 'sn_disc_frente_media', type: 'boolean', options: ['default' => '0', 'comment' => '0 - Soma das notas por tipo, 1 - Cópia das notas'])]
    private bool $snDiscFrenteMedia = false;

    #[ORM\Column(name: 'sn_unificar_diarios', type: 'boolean', options: ['default' => '0'])]
    private bool $snUnificarDiarios = false;

    #[ORM\Column(name: 'ds_nome_atividade', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeAtividade = null;

    #[ORM\Column(name: 'ds_condicao_digitar_re', type: 'string', length: 255, nullable: true, options: ['comment' => 'Condição para permitir a digitação da nota de recuperação. Ex: NOTAP < 6'])]
    private ?string $dsCondicaoDigitarRe = null;

    #[ORM\Column(name: 'vl_maximo_media_final', type: 'float', nullable: true)]
    private ?float $vlMaximoMediaFinal = null;

    #[ORM\Column(name: 'vl_maximo_media_etapa', type: 'float', nullable: true)]
    private ?float $vlMaximoMediaEtapa = null;

    #[ORM\Column(name: 'vl_diario_digita_nota_max', type: 'float', nullable: true)]
    private ?float $vlDiarioDigitaNotaMax = null;

    #[ORM\Column(name: 'ds_legenda', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsLegenda = null;

    #[ORM\Column(name: 'sn_obriga_ementa_plano_aprendizagem', type: 'boolean', options: ['default' => '0'])]
    private bool $snObrigaEmentaPlanoAprendizagem = false;

    // Sem construtor: 168 propriedades. Use os setters encadeados.

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
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

    public function getDsAvaliacao(): ?string
    {
        return $this->dsAvaliacao;
    }

    public function setDsAvaliacao(?string $dsAvaliacao): self
    {
        $this->dsAvaliacao = $dsAvaliacao;
        return $this;
    }

    public function getNrAvaliacoes(): ?int
    {
        return $this->nrAvaliacoes;
    }

    public function setNrAvaliacoes(?int $nrAvaliacoes): self
    {
        $this->nrAvaliacoes = $nrAvaliacoes;
        return $this;
    }

    public function getNrMaximoAulas(): int
    {
        return $this->nrMaximoAulas;
    }

    public function setNrMaximoAulas(int $nrMaximoAulas): self
    {
        $this->nrMaximoAulas = $nrMaximoAulas;
        return $this;
    }

    public function getCdPeriodoAvaliacao(): ?int
    {
        return $this->cdPeriodoAvaliacao;
    }

    public function setCdPeriodoAvaliacao(?int $cdPeriodoAvaliacao): self
    {
        $this->cdPeriodoAvaliacao = $cdPeriodoAvaliacao;
        return $this;
    }

    public function getDsCondAprovDireta(): ?string
    {
        return $this->dsCondAprovDireta;
    }

    public function setDsCondAprovDireta(?string $dsCondAprovDireta): self
    {
        $this->dsCondAprovDireta = $dsCondAprovDireta;
        return $this;
    }

    public function getDsCondReproDireta(): ?string
    {
        return $this->dsCondReproDireta;
    }

    public function setDsCondReproDireta(?string $dsCondReproDireta): self
    {
        $this->dsCondReproDireta = $dsCondReproDireta;
        return $this;
    }

    public function getDsFormulaMediaAnual(): ?string
    {
        return $this->dsFormulaMediaAnual;
    }

    public function setDsFormulaMediaAnual(?string $dsFormulaMediaAnual): self
    {
        $this->dsFormulaMediaAnual = $dsFormulaMediaAnual;
        return $this;
    }

    public function getDsFormulaMediaFinal(): ?string
    {
        return $this->dsFormulaMediaFinal;
    }

    public function setDsFormulaMediaFinal(?string $dsFormulaMediaFinal): self
    {
        $this->dsFormulaMediaFinal = $dsFormulaMediaFinal;
        return $this;
    }

    public function getDsFormulaMediaExame(): ?string
    {
        return $this->dsFormulaMediaExame;
    }

    public function setDsFormulaMediaExame(?string $dsFormulaMediaExame): self
    {
        $this->dsFormulaMediaExame = $dsFormulaMediaExame;
        return $this;
    }

    public function getDsFormulaMediaSegunda(): ?string
    {
        return $this->dsFormulaMediaSegunda;
    }

    public function setDsFormulaMediaSegunda(?string $dsFormulaMediaSegunda): self
    {
        $this->dsFormulaMediaSegunda = $dsFormulaMediaSegunda;
        return $this;
    }

    public function getDsCondAprovExame(): ?string
    {
        return $this->dsCondAprovExame;
    }

    public function setDsCondAprovExame(?string $dsCondAprovExame): self
    {
        $this->dsCondAprovExame = $dsCondAprovExame;
        return $this;
    }

    public function getDsCondAprovSegunda(): ?string
    {
        return $this->dsCondAprovSegunda;
    }

    public function setDsCondAprovSegunda(?string $dsCondAprovSegunda): self
    {
        $this->dsCondAprovSegunda = $dsCondAprovSegunda;
        return $this;
    }

    public function getNrMaxDisciExame(): ?int
    {
        return $this->nrMaxDisciExame;
    }

    public function setNrMaxDisciExame(?int $nrMaxDisciExame): self
    {
        $this->nrMaxDisciExame = $nrMaxDisciExame;
        return $this;
    }

    public function getNrMaxDisciSegunda(): ?int
    {
        return $this->nrMaxDisciSegunda;
    }

    public function setNrMaxDisciSegunda(?int $nrMaxDisciSegunda): self
    {
        $this->nrMaxDisciSegunda = $nrMaxDisciSegunda;
        return $this;
    }

    public function getSnNotas(): ?string
    {
        return $this->snNotas;
    }

    public function setSnNotas(?string $snNotas): self
    {
        $this->snNotas = $snNotas;
        return $this;
    }

    public function getSnConceitos(): ?string
    {
        return $this->snConceitos;
    }

    public function setSnConceitos(?string $snConceitos): self
    {
        $this->snConceitos = $snConceitos;
        return $this;
    }

    public function getSnConceitosParciais(): ?string
    {
        return $this->snConceitosParciais;
    }

    public function setSnConceitosParciais(?string $snConceitosParciais): self
    {
        $this->snConceitosParciais = $snConceitosParciais;
        return $this;
    }

    public function getSnDescricao(): ?string
    {
        return $this->snDescricao;
    }

    public function setSnDescricao(?string $snDescricao): self
    {
        $this->snDescricao = $snDescricao;
        return $this;
    }

    public function getSnExame(): ?string
    {
        return $this->snExame;
    }

    public function setSnExame(?string $snExame): self
    {
        $this->snExame = $snExame;
        return $this;
    }

    public function getSnPi(): ?string
    {
        return $this->snPi;
    }

    public function setSnPi(?string $snPi): self
    {
        $this->snPi = $snPi;
        return $this;
    }

    public function getDsFormulaMediaSemPi(): ?string
    {
        return $this->dsFormulaMediaSemPi;
    }

    public function setDsFormulaMediaSemPi(?string $dsFormulaMediaSemPi): self
    {
        $this->dsFormulaMediaSemPi = $dsFormulaMediaSemPi;
        return $this;
    }

    public function getSnSegundaEpoca(): ?string
    {
        return $this->snSegundaEpoca;
    }

    public function setSnSegundaEpoca(?string $snSegundaEpoca): self
    {
        $this->snSegundaEpoca = $snSegundaEpoca;
        return $this;
    }

    public function getSnFrequenciaGlobal(): ?string
    {
        return $this->snFrequenciaGlobal;
    }

    public function setSnFrequenciaGlobal(?string $snFrequenciaGlobal): self
    {
        $this->snFrequenciaGlobal = $snFrequenciaGlobal;
        return $this;
    }

    public function getDsFrequenciaTipo(): ?string
    {
        return $this->dsFrequenciaTipo;
    }

    public function setDsFrequenciaTipo(?string $dsFrequenciaTipo): self
    {
        $this->dsFrequenciaTipo = $dsFrequenciaTipo;
        return $this;
    }

    public function getCdDisciFrequencia(): ?int
    {
        return $this->cdDisciFrequencia;
    }

    public function setCdDisciFrequencia(?int $cdDisciFrequencia): self
    {
        $this->cdDisciFrequencia = $cdDisciFrequencia;
        return $this;
    }

    public function getSnRecuperacao(): ?string
    {
        return $this->snRecuperacao;
    }

    public function setSnRecuperacao(?string $snRecuperacao): self
    {
        $this->snRecuperacao = $snRecuperacao;
        return $this;
    }

    public function getEnumRecuperacaoPeriodo(): ?string
    {
        return $this->enumRecuperacaoPeriodo;
    }

    public function setEnumRecuperacaoPeriodo(?string $enumRecuperacaoPeriodo): self
    {
        $this->enumRecuperacaoPeriodo = $enumRecuperacaoPeriodo;
        return $this;
    }

    public function getDsFormulaRecuperacao(): ?string
    {
        return $this->dsFormulaRecuperacao;
    }

    public function setDsFormulaRecuperacao(?string $dsFormulaRecuperacao): self
    {
        $this->dsFormulaRecuperacao = $dsFormulaRecuperacao;
        return $this;
    }

    public function getDsCriterioRecuperacao(): ?string
    {
        return $this->dsCriterioRecuperacao;
    }

    public function setDsCriterioRecuperacao(?string $dsCriterioRecuperacao): self
    {
        $this->dsCriterioRecuperacao = $dsCriterioRecuperacao;
        return $this;
    }

    public function getNrCasasDecimais(): ?int
    {
        return $this->nrCasasDecimais;
    }

    public function setNrCasasDecimais(?int $nrCasasDecimais): self
    {
        $this->nrCasasDecimais = $nrCasasDecimais;
        return $this;
    }

    public function getDsCondRecuperacao(): ?string
    {
        return $this->dsCondRecuperacao;
    }

    public function setDsCondRecuperacao(?string $dsCondRecuperacao): self
    {
        $this->dsCondRecuperacao = $dsCondRecuperacao;
        return $this;
    }

    public function getVlArredondamento(): ?float
    {
        return $this->vlArredondamento;
    }

    public function setVlArredondamento(?float $vlArredondamento): self
    {
        $this->vlArredondamento = $vlArredondamento;
        return $this;
    }

    public function getSnNotasDiarioOnline(): string
    {
        return $this->snNotasDiarioOnline;
    }

    public function setSnNotasDiarioOnline(string $snNotasDiarioOnline): self
    {
        $this->snNotasDiarioOnline = $snNotasDiarioOnline;
        return $this;
    }

    public function getSnNotasDiario(): string
    {
        return $this->snNotasDiario;
    }

    public function setSnNotasDiario(string $snNotasDiario): self
    {
        $this->snNotasDiario = $snNotasDiario;
        return $this;
    }

    public function getSnDesbloCoorde(): ?string
    {
        return $this->snDesbloCoorde;
    }

    public function setSnDesbloCoorde(?string $snDesbloCoorde): self
    {
        $this->snDesbloCoorde = $snDesbloCoorde;
        return $this;
    }

    public function getSnDiarioImpNotas(): string
    {
        return $this->snDiarioImpNotas;
    }

    public function setSnDiarioImpNotas(string $snDiarioImpNotas): self
    {
        $this->snDiarioImpNotas = $snDiarioImpNotas;
        return $this;
    }

    public function getSnDiarioImpFreqs(): string
    {
        return $this->snDiarioImpFreqs;
    }

    public function setSnDiarioImpFreqs(string $snDiarioImpFreqs): self
    {
        $this->snDiarioImpFreqs = $snDiarioImpFreqs;
        return $this;
    }

    public function getSnNotasTruncar(): string
    {
        return $this->snNotasTruncar;
    }

    public function setSnNotasTruncar(string $snNotasTruncar): self
    {
        $this->snNotasTruncar = $snNotasTruncar;
        return $this;
    }

    public function getSnAnualTruncar(): ?string
    {
        return $this->snAnualTruncar;
    }

    public function setSnAnualTruncar(?string $snAnualTruncar): self
    {
        $this->snAnualTruncar = $snAnualTruncar;
        return $this;
    }

    public function getSnMediasTruncar(): ?string
    {
        return $this->snMediasTruncar;
    }

    public function setSnMediasTruncar(?string $snMediasTruncar): self
    {
        $this->snMediasTruncar = $snMediasTruncar;
        return $this;
    }

    public function getSnDiarioImpContprog(): string
    {
        return $this->snDiarioImpContprog;
    }

    public function setSnDiarioImpContprog(string $snDiarioImpContprog): self
    {
        $this->snDiarioImpContprog = $snDiarioImpContprog;
        return $this;
    }

    public function getDsNotaExame(): ?string
    {
        return $this->dsNotaExame;
    }

    public function setDsNotaExame(?string $dsNotaExame): self
    {
        $this->dsNotaExame = $dsNotaExame;
        return $this;
    }

    public function getDsNotaSegunda(): ?string
    {
        return $this->dsNotaSegunda;
    }

    public function setDsNotaSegunda(?string $dsNotaSegunda): self
    {
        $this->dsNotaSegunda = $dsNotaSegunda;
        return $this;
    }

    public function getSnDiarioOnline(): int
    {
        return $this->snDiarioOnline;
    }

    public function setSnDiarioOnline(int $snDiarioOnline): self
    {
        $this->snDiarioOnline = $snDiarioOnline;
        return $this;
    }

    public function getSnExtraClasse(): int
    {
        return $this->snExtraClasse;
    }

    public function setSnExtraClasse(int $snExtraClasse): self
    {
        $this->snExtraClasse = $snExtraClasse;
        return $this;
    }

    public function getSnDiarioEletro(): int
    {
        return $this->snDiarioEletro;
    }

    public function setSnDiarioEletro(int $snDiarioEletro): self
    {
        $this->snDiarioEletro = $snDiarioEletro;
        return $this;
    }

    public function getSnDiarioOnlineProvas(): int
    {
        return $this->snDiarioOnlineProvas;
    }

    public function setSnDiarioOnlineProvas(int $snDiarioOnlineProvas): self
    {
        $this->snDiarioOnlineProvas = $snDiarioOnlineProvas;
        return $this;
    }

    public function getSnDiarioOnlineAulas(): int
    {
        return $this->snDiarioOnlineAulas;
    }

    public function setSnDiarioOnlineAulas(int $snDiarioOnlineAulas): self
    {
        $this->snDiarioOnlineAulas = $snDiarioOnlineAulas;
        return $this;
    }

    public function getSnDiarioOnlineRecalcMedias(): int
    {
        return $this->snDiarioOnlineRecalcMedias;
    }

    public function setSnDiarioOnlineRecalcMedias(int $snDiarioOnlineRecalcMedias): self
    {
        $this->snDiarioOnlineRecalcMedias = $snDiarioOnlineRecalcMedias;
        return $this;
    }

    public function getSnDiarioOnlineBloqueAulas(): ?int
    {
        return $this->snDiarioOnlineBloqueAulas;
    }

    public function setSnDiarioOnlineBloqueAulas(?int $snDiarioOnlineBloqueAulas): self
    {
        $this->snDiarioOnlineBloqueAulas = $snDiarioOnlineBloqueAulas;
        return $this;
    }

    public function getSnDiarioOnlineBloqueProvas(): ?int
    {
        return $this->snDiarioOnlineBloqueProvas;
    }

    public function setSnDiarioOnlineBloqueProvas(?int $snDiarioOnlineBloqueProvas): self
    {
        $this->snDiarioOnlineBloqueProvas = $snDiarioOnlineBloqueProvas;
        return $this;
    }

    public function getNrCasasDecimaisForcado(): ?int
    {
        return $this->nrCasasDecimaisForcado;
    }

    public function setNrCasasDecimaisForcado(?int $nrCasasDecimaisForcado): self
    {
        $this->nrCasasDecimaisForcado = $nrCasasDecimaisForcado;
        return $this;
    }

    public function getTpAjusteForcado(): ?int
    {
        return $this->tpAjusteForcado;
    }

    public function setTpAjusteForcado(?int $tpAjusteForcado): self
    {
        $this->tpAjusteForcado = $tpAjusteForcado;
        return $this;
    }

    public function getNrCasasForcadoMedia(): ?int
    {
        return $this->nrCasasForcadoMedia;
    }

    public function setNrCasasForcadoMedia(?int $nrCasasForcadoMedia): self
    {
        $this->nrCasasForcadoMedia = $nrCasasForcadoMedia;
        return $this;
    }

    public function getTpAjusteForcadoMedia(): ?int
    {
        return $this->tpAjusteForcadoMedia;
    }

    public function setTpAjusteForcadoMedia(?int $tpAjusteForcadoMedia): self
    {
        $this->tpAjusteForcadoMedia = $tpAjusteForcadoMedia;
        return $this;
    }

    public function getSnAlteraNotasDireta(): int
    {
        return $this->snAlteraNotasDireta;
    }

    public function setSnAlteraNotasDireta(int $snAlteraNotasDireta): self
    {
        $this->snAlteraNotasDireta = $snAlteraNotasDireta;
        return $this;
    }

    public function isSnConverterNotasNulas(): ?bool
    {
        return $this->snConverterNotasNulas;
    }

    public function setSnConverterNotasNulas(?bool $snConverterNotasNulas): self
    {
        $this->snConverterNotasNulas = $snConverterNotasNulas;
        return $this;
    }

    public function isSnMostrarAlunosCursPadrao(): bool
    {
        return $this->snMostrarAlunosCursPadrao;
    }

    public function setSnMostrarAlunosCursPadrao(bool $snMostrarAlunosCursPadrao): self
    {
        $this->snMostrarAlunosCursPadrao = $snMostrarAlunosCursPadrao;
        return $this;
    }

    public function isSnInsAulasSemhorario(): bool
    {
        return $this->snInsAulasSemhorario;
    }

    public function setSnInsAulasSemhorario(bool $snInsAulasSemhorario): self
    {
        $this->snInsAulasSemhorario = $snInsAulasSemhorario;
        return $this;
    }

    public function getSnCopiarConteudoPordata(): ?int
    {
        return $this->snCopiarConteudoPordata;
    }

    public function setSnCopiarConteudoPordata(?int $snCopiarConteudoPordata): self
    {
        $this->snCopiarConteudoPordata = $snCopiarConteudoPordata;
        return $this;
    }

    public function getSnAjusteAposRecuperacao(): ?int
    {
        return $this->snAjusteAposRecuperacao;
    }

    public function setSnAjusteAposRecuperacao(?int $snAjusteAposRecuperacao): self
    {
        $this->snAjusteAposRecuperacao = $snAjusteAposRecuperacao;
        return $this;
    }

    public function getDsFormulaPadrao(): ?string
    {
        return $this->dsFormulaPadrao;
    }

    public function setDsFormulaPadrao(?string $dsFormulaPadrao): self
    {
        $this->dsFormulaPadrao = $dsFormulaPadrao;
        return $this;
    }

    public function getSnObrigarFormulaPadrao(): int
    {
        return $this->snObrigarFormulaPadrao;
    }

    public function setSnObrigarFormulaPadrao(int $snObrigarFormulaPadrao): self
    {
        $this->snObrigarFormulaPadrao = $snObrigarFormulaPadrao;
        return $this;
    }

    public function getDsFormulaMediaCurso(): ?string
    {
        return $this->dsFormulaMediaCurso;
    }

    public function setDsFormulaMediaCurso(?string $dsFormulaMediaCurso): self
    {
        $this->dsFormulaMediaCurso = $dsFormulaMediaCurso;
        return $this;
    }

    public function getNrInicioAulasExtras(): ?int
    {
        return $this->nrInicioAulasExtras;
    }

    public function setNrInicioAulasExtras(?int $nrInicioAulasExtras): self
    {
        $this->nrInicioAulasExtras = $nrInicioAulasExtras;
        return $this;
    }

    public function isSnUsarMediaCurso(): ?bool
    {
        return $this->snUsarMediaCurso;
    }

    public function setSnUsarMediaCurso(?bool $snUsarMediaCurso): self
    {
        $this->snUsarMediaCurso = $snUsarMediaCurso;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getDsFormulaPeriodo(): ?string
    {
        return $this->dsFormulaPeriodo;
    }

    public function setDsFormulaPeriodo(?string $dsFormulaPeriodo): self
    {
        $this->dsFormulaPeriodo = $dsFormulaPeriodo;
        return $this;
    }

    public function getNrPeriodos(): int
    {
        return $this->nrPeriodos;
    }

    public function setNrPeriodos(int $nrPeriodos): self
    {
        $this->nrPeriodos = $nrPeriodos;
        return $this;
    }

    public function getDsCondicaoSituacaoPeriodo(): ?string
    {
        return $this->dsCondicaoSituacaoPeriodo;
    }

    public function setDsCondicaoSituacaoPeriodo(?string $dsCondicaoSituacaoPeriodo): self
    {
        $this->dsCondicaoSituacaoPeriodo = $dsCondicaoSituacaoPeriodo;
        return $this;
    }

    public function getSnDiarioOnlineMostraAjuste(): int
    {
        return $this->snDiarioOnlineMostraAjuste;
    }

    public function setSnDiarioOnlineMostraAjuste(int $snDiarioOnlineMostraAjuste): self
    {
        $this->snDiarioOnlineMostraAjuste = $snDiarioOnlineMostraAjuste;
        return $this;
    }

    public function getNrDiasDiarioBloqProvas(): ?int
    {
        return $this->nrDiasDiarioBloqProvas;
    }

    public function setNrDiasDiarioBloqProvas(?int $nrDiasDiarioBloqProvas): self
    {
        $this->nrDiasDiarioBloqProvas = $nrDiasDiarioBloqProvas;
        return $this;
    }

    public function getSnDescricaoFixa(): ?string
    {
        return $this->snDescricaoFixa;
    }

    public function setSnDescricaoFixa(?string $snDescricaoFixa): self
    {
        $this->snDescricaoFixa = $snDescricaoFixa;
        return $this;
    }

    public function isSnFrequePergunta(): ?bool
    {
        return $this->snFrequePergunta;
    }

    public function setSnFrequePergunta(?bool $snFrequePergunta): self
    {
        $this->snFrequePergunta = $snFrequePergunta;
        return $this;
    }

    public function isSnFrequePerguntaPadrao(): ?bool
    {
        return $this->snFrequePerguntaPadrao;
    }

    public function setSnFrequePerguntaPadrao(?bool $snFrequePerguntaPadrao): self
    {
        $this->snFrequePerguntaPadrao = $snFrequePerguntaPadrao;
        return $this;
    }

    public function isSnProfessorFechaDiario(): ?bool
    {
        return $this->snProfessorFechaDiario;
    }

    public function setSnProfessorFechaDiario(?bool $snProfessorFechaDiario): self
    {
        $this->snProfessorFechaDiario = $snProfessorFechaDiario;
        return $this;
    }

    public function getSnProfesDigitaPeso(): ?string
    {
        return $this->snProfesDigitaPeso;
    }

    public function setSnProfesDigitaPeso(?string $snProfesDigitaPeso): self
    {
        $this->snProfesDigitaPeso = $snProfesDigitaPeso;
        return $this;
    }

    public function getCdSituacaoConcluida(): ?int
    {
        return $this->cdSituacaoConcluida;
    }

    public function setCdSituacaoConcluida(?int $cdSituacaoConcluida): self
    {
        $this->cdSituacaoConcluida = $cdSituacaoConcluida;
        return $this;
    }

    public function getNrQtdAulasImpressao(): ?int
    {
        return $this->nrQtdAulasImpressao;
    }

    public function setNrQtdAulasImpressao(?int $nrQtdAulasImpressao): self
    {
        $this->nrQtdAulasImpressao = $nrQtdAulasImpressao;
        return $this;
    }

    public function getNrNotasMaxAlteracoes(): ?int
    {
        return $this->nrNotasMaxAlteracoes;
    }

    public function setNrNotasMaxAlteracoes(?int $nrNotasMaxAlteracoes): self
    {
        $this->nrNotasMaxAlteracoes = $nrNotasMaxAlteracoes;
        return $this;
    }

    public function getSnDigitaExameDiarioOnline(): ?int
    {
        return $this->snDigitaExameDiarioOnline;
    }

    public function setSnDigitaExameDiarioOnline(?int $snDigitaExameDiarioOnline): self
    {
        $this->snDigitaExameDiarioOnline = $snDigitaExameDiarioOnline;
        return $this;
    }

    public function getDsFormulaPi(): ?string
    {
        return $this->dsFormulaPi;
    }

    public function setDsFormulaPi(?string $dsFormulaPi): self
    {
        $this->dsFormulaPi = $dsFormulaPi;
        return $this;
    }

    public function getCdTipoHorario(): ?int
    {
        return $this->cdTipoHorario;
    }

    public function setCdTipoHorario(?int $cdTipoHorario): self
    {
        $this->cdTipoHorario = $cdTipoHorario;
        return $this;
    }

    public function getCdSituacaoAprovDireta(): ?int
    {
        return $this->cdSituacaoAprovDireta;
    }

    public function setCdSituacaoAprovDireta(?int $cdSituacaoAprovDireta): self
    {
        $this->cdSituacaoAprovDireta = $cdSituacaoAprovDireta;
        return $this;
    }

    public function getCdSituacaoAprovExame(): ?int
    {
        return $this->cdSituacaoAprovExame;
    }

    public function setCdSituacaoAprovExame(?int $cdSituacaoAprovExame): self
    {
        $this->cdSituacaoAprovExame = $cdSituacaoAprovExame;
        return $this;
    }

    public function getCdSituacaoAprov2epoca(): ?int
    {
        return $this->cdSituacaoAprov2epoca;
    }

    public function setCdSituacaoAprov2epoca(?int $cdSituacaoAprov2epoca): self
    {
        $this->cdSituacaoAprov2epoca = $cdSituacaoAprov2epoca;
        return $this;
    }

    public function isSnFrequenciaTurma(): bool
    {
        return $this->snFrequenciaTurma;
    }

    public function setSnFrequenciaTurma(bool $snFrequenciaTurma): self
    {
        $this->snFrequenciaTurma = $snFrequenciaTurma;
        return $this;
    }

    public function getSnDiarioOnlineAtividades(): int
    {
        return $this->snDiarioOnlineAtividades;
    }

    public function setSnDiarioOnlineAtividades(int $snDiarioOnlineAtividades): self
    {
        $this->snDiarioOnlineAtividades = $snDiarioOnlineAtividades;
        return $this;
    }

    public function getNrMediaProficiencia(): ?float
    {
        return $this->nrMediaProficiencia;
    }

    public function setNrMediaProficiencia(?float $nrMediaProficiencia): self
    {
        $this->nrMediaProficiencia = $nrMediaProficiencia;
        return $this;
    }

    public function isSnAlterarNotaExame(): bool
    {
        return $this->snAlterarNotaExame;
    }

    public function setSnAlterarNotaExame(bool $snAlterarNotaExame): self
    {
        $this->snAlterarNotaExame = $snAlterarNotaExame;
        return $this;
    }

    public function getSnDigitaTodasNotas(): int
    {
        return $this->snDigitaTodasNotas;
    }

    public function setSnDigitaTodasNotas(int $snDigitaTodasNotas): self
    {
        $this->snDigitaTodasNotas = $snDigitaTodasNotas;
        return $this;
    }

    public function getSnAjusteMedia(): ?string
    {
        return $this->snAjusteMedia;
    }

    public function setSnAjusteMedia(?string $snAjusteMedia): self
    {
        $this->snAjusteMedia = $snAjusteMedia;
        return $this;
    }

    public function isSnAlterar2epoca(): bool
    {
        return $this->snAlterar2epoca;
    }

    public function setSnAlterar2epoca(bool $snAlterar2epoca): self
    {
        $this->snAlterar2epoca = $snAlterar2epoca;
        return $this;
    }

    public function isSnCalcularMediaAritmetica(): bool
    {
        return $this->snCalcularMediaAritmetica;
    }

    public function setSnCalcularMediaAritmetica(bool $snCalcularMediaAritmetica): self
    {
        $this->snCalcularMediaAritmetica = $snCalcularMediaAritmetica;
        return $this;
    }

    public function isSnFaltaExameForca2epoca(): bool
    {
        return $this->snFaltaExameForca2epoca;
    }

    public function setSnFaltaExameForca2epoca(bool $snFaltaExameForca2epoca): self
    {
        $this->snFaltaExameForca2epoca = $snFaltaExameForca2epoca;
        return $this;
    }

    public function isSnDigita2epocaDiarioOnline(): bool
    {
        return $this->snDigita2epocaDiarioOnline;
    }

    public function setSnDigita2epocaDiarioOnline(bool $snDigita2epocaDiarioOnline): self
    {
        $this->snDigita2epocaDiarioOnline = $snDigita2epocaDiarioOnline;
        return $this;
    }

    public function getNmNomeExameEtapa(): ?string
    {
        return $this->nmNomeExameEtapa;
    }

    public function setNmNomeExameEtapa(?string $nmNomeExameEtapa): self
    {
        $this->nmNomeExameEtapa = $nmNomeExameEtapa;
        return $this;
    }

    public function getNmNomeExameEspecial(): ?string
    {
        return $this->nmNomeExameEspecial;
    }

    public function setNmNomeExameEspecial(?string $nmNomeExameEspecial): self
    {
        $this->nmNomeExameEspecial = $nmNomeExameEspecial;
        return $this;
    }

    public function isSnGerarTaxaRecorrencia(): bool
    {
        return $this->snGerarTaxaRecorrencia;
    }

    public function setSnGerarTaxaRecorrencia(bool $snGerarTaxaRecorrencia): self
    {
        $this->snGerarTaxaRecorrencia = $snGerarTaxaRecorrencia;
        return $this;
    }

    public function getCdTitulo2epoca(): ?int
    {
        return $this->cdTitulo2epoca;
    }

    public function setCdTitulo2epoca(?int $cdTitulo2epoca): self
    {
        $this->cdTitulo2epoca = $cdTitulo2epoca;
        return $this;
    }

    public function getCalcularMediaFechaDiario(): ?int
    {
        return $this->calcularMediaFechaDiario;
    }

    public function setCalcularMediaFechaDiario(?int $calcularMediaFechaDiario): self
    {
        $this->calcularMediaFechaDiario = $calcularMediaFechaDiario;
        return $this;
    }

    public function isSnAulasDatas(): ?bool
    {
        return $this->snAulasDatas;
    }

    public function setSnAulasDatas(?bool $snAulasDatas): self
    {
        $this->snAulasDatas = $snAulasDatas;
        return $this;
    }

    public function isSnExibirDescricao(): ?bool
    {
        return $this->snExibirDescricao;
    }

    public function setSnExibirDescricao(?bool $snExibirDescricao): self
    {
        $this->snExibirDescricao = $snExibirDescricao;
        return $this;
    }

    public function getCdSituacaoProficiencia(): ?int
    {
        return $this->cdSituacaoProficiencia;
    }

    public function setCdSituacaoProficiencia(?int $cdSituacaoProficiencia): self
    {
        $this->cdSituacaoProficiencia = $cdSituacaoProficiencia;
        return $this;
    }

    public function isSnAgruparAulasOnline(): bool
    {
        return $this->snAgruparAulasOnline;
    }

    public function setSnAgruparAulasOnline(bool $snAgruparAulasOnline): self
    {
        $this->snAgruparAulasOnline = $snAgruparAulasOnline;
        return $this;
    }

    public function getDsCronogramaVisualizaInicio(): ?string
    {
        return $this->dsCronogramaVisualizaInicio;
    }

    public function setDsCronogramaVisualizaInicio(?string $dsCronogramaVisualizaInicio): self
    {
        $this->dsCronogramaVisualizaInicio = $dsCronogramaVisualizaInicio;
        return $this;
    }

    public function getDsCronogramaVisualizaFim(): ?string
    {
        return $this->dsCronogramaVisualizaFim;
    }

    public function setDsCronogramaVisualizaFim(?string $dsCronogramaVisualizaFim): self
    {
        $this->dsCronogramaVisualizaFim = $dsCronogramaVisualizaFim;
        return $this;
    }

    public function getDsCronogramaNotasInicio(): ?string
    {
        return $this->dsCronogramaNotasInicio;
    }

    public function setDsCronogramaNotasInicio(?string $dsCronogramaNotasInicio): self
    {
        $this->dsCronogramaNotasInicio = $dsCronogramaNotasInicio;
        return $this;
    }

    public function getDsCronogramaNotasFim(): ?string
    {
        return $this->dsCronogramaNotasFim;
    }

    public function setDsCronogramaNotasFim(?string $dsCronogramaNotasFim): self
    {
        $this->dsCronogramaNotasFim = $dsCronogramaNotasFim;
        return $this;
    }

    public function getDsCronogramaAulasInicio(): ?string
    {
        return $this->dsCronogramaAulasInicio;
    }

    public function setDsCronogramaAulasInicio(?string $dsCronogramaAulasInicio): self
    {
        $this->dsCronogramaAulasInicio = $dsCronogramaAulasInicio;
        return $this;
    }

    public function getDsCronogramaAulasFim(): ?string
    {
        return $this->dsCronogramaAulasFim;
    }

    public function setDsCronogramaAulasFim(?string $dsCronogramaAulasFim): self
    {
        $this->dsCronogramaAulasFim = $dsCronogramaAulasFim;
        return $this;
    }

    public function getDsCronogramaLiberacao(): ?string
    {
        return $this->dsCronogramaLiberacao;
    }

    public function setDsCronogramaLiberacao(?string $dsCronogramaLiberacao): self
    {
        $this->dsCronogramaLiberacao = $dsCronogramaLiberacao;
        return $this;
    }

    public function getNrCasasDecimaisFrequencia(): int
    {
        return $this->nrCasasDecimaisFrequencia;
    }

    public function setNrCasasDecimaisFrequencia(int $nrCasasDecimaisFrequencia): self
    {
        $this->nrCasasDecimaisFrequencia = $nrCasasDecimaisFrequencia;
        return $this;
    }

    public function getDsFrequenciaRegistro(): string
    {
        return $this->dsFrequenciaRegistro;
    }

    public function setDsFrequenciaRegistro(string $dsFrequenciaRegistro): self
    {
        $this->dsFrequenciaRegistro = $dsFrequenciaRegistro;
        return $this;
    }

    public function getSnCalculoMediaAutomatico(): int
    {
        return $this->snCalculoMediaAutomatico;
    }

    public function setSnCalculoMediaAutomatico(int $snCalculoMediaAutomatico): self
    {
        $this->snCalculoMediaAutomatico = $snCalculoMediaAutomatico;
        return $this;
    }

    public function getSnObservacaoNota(): ?int
    {
        return $this->snObservacaoNota;
    }

    public function setSnObservacaoNota(?int $snObservacaoNota): self
    {
        $this->snObservacaoNota = $snObservacaoNota;
        return $this;
    }

    public function getSnAgruparAvaliacaoTipo(): int
    {
        return $this->snAgruparAvaliacaoTipo;
    }

    public function setSnAgruparAvaliacaoTipo(int $snAgruparAvaliacaoTipo): self
    {
        $this->snAgruparAvaliacaoTipo = $snAgruparAvaliacaoTipo;
        return $this;
    }

    public function getSnMediaNotasDigitadas(): int
    {
        return $this->snMediaNotasDigitadas;
    }

    public function setSnMediaNotasDigitadas(int $snMediaNotasDigitadas): self
    {
        $this->snMediaNotasDigitadas = $snMediaNotasDigitadas;
        return $this;
    }

    public function getSnNotasCalcularMedias(): int
    {
        return $this->snNotasCalcularMedias;
    }

    public function setSnNotasCalcularMedias(int $snNotasCalcularMedias): self
    {
        $this->snNotasCalcularMedias = $snNotasCalcularMedias;
        return $this;
    }

    public function getVlAjusteMin(): ?float
    {
        return $this->vlAjusteMin;
    }

    public function setVlAjusteMin(?float $vlAjusteMin): self
    {
        $this->vlAjusteMin = $vlAjusteMin;
        return $this;
    }

    public function getVlAjusteMax(): ?float
    {
        return $this->vlAjusteMax;
    }

    public function setVlAjusteMax(?float $vlAjusteMax): self
    {
        $this->vlAjusteMax = $vlAjusteMax;
        return $this;
    }

    public function isSnFaltaCancelaTaxa(): bool
    {
        return $this->snFaltaCancelaTaxa;
    }

    public function setSnFaltaCancelaTaxa(bool $snFaltaCancelaTaxa): self
    {
        $this->snFaltaCancelaTaxa = $snFaltaCancelaTaxa;
        return $this;
    }

    public function isSnVerificarDataMatricula(): bool
    {
        return $this->snVerificarDataMatricula;
    }

    public function setSnVerificarDataMatricula(bool $snVerificarDataMatricula): self
    {
        $this->snVerificarDataMatricula = $snVerificarDataMatricula;
        return $this;
    }

    public function isSnArredForcadoAntesAjuste(): bool
    {
        return $this->snArredForcadoAntesAjuste;
    }

    public function setSnArredForcadoAntesAjuste(bool $snArredForcadoAntesAjuste): self
    {
        $this->snArredForcadoAntesAjuste = $snArredForcadoAntesAjuste;
        return $this;
    }

    public function getVlMediaArredondamento(): ?float
    {
        return $this->vlMediaArredondamento;
    }

    public function setVlMediaArredondamento(?float $vlMediaArredondamento): self
    {
        $this->vlMediaArredondamento = $vlMediaArredondamento;
        return $this;
    }

    public function getVlMediaArredondamentoExame(): ?float
    {
        return $this->vlMediaArredondamentoExame;
    }

    public function setVlMediaArredondamentoExame(?float $vlMediaArredondamentoExame): self
    {
        $this->vlMediaArredondamentoExame = $vlMediaArredondamentoExame;
        return $this;
    }

    public function getVlMediaArredondamento2epoca(): ?float
    {
        return $this->vlMediaArredondamento2epoca;
    }

    public function setVlMediaArredondamento2epoca(?float $vlMediaArredondamento2epoca): self
    {
        $this->vlMediaArredondamento2epoca = $vlMediaArredondamento2epoca;
        return $this;
    }

    public function getSnLiberaFreqAposFimEtapa(): int
    {
        return $this->snLiberaFreqAposFimEtapa;
    }

    public function setSnLiberaFreqAposFimEtapa(int $snLiberaFreqAposFimEtapa): self
    {
        $this->snLiberaFreqAposFimEtapa = $snLiberaFreqAposFimEtapa;
        return $this;
    }

    public function getSnPreencherNotasNulasZero(): int
    {
        return $this->snPreencherNotasNulasZero;
    }

    public function setSnPreencherNotasNulasZero(int $snPreencherNotasNulasZero): self
    {
        $this->snPreencherNotasNulasZero = $snPreencherNotasNulasZero;
        return $this;
    }

    public function getDsSinteseAvaliacao(): ?string
    {
        return $this->dsSinteseAvaliacao;
    }

    public function setDsSinteseAvaliacao(?string $dsSinteseAvaliacao): self
    {
        $this->dsSinteseAvaliacao = $dsSinteseAvaliacao;
        return $this;
    }

    public function getVlHoraAula(): float
    {
        return $this->vlHoraAula;
    }

    public function setVlHoraAula(float $vlHoraAula): self
    {
        $this->vlHoraAula = $vlHoraAula;
        return $this;
    }

    public function isSnBloquearDiario(): bool
    {
        return $this->snBloquearDiario;
    }

    public function setSnBloquearDiario(bool $snBloquearDiario): self
    {
        $this->snBloquearDiario = $snBloquearDiario;
        return $this;
    }

    public function isSnValidaFechaDiario(): bool
    {
        return $this->snValidaFechaDiario;
    }

    public function setSnValidaFechaDiario(bool $snValidaFechaDiario): self
    {
        $this->snValidaFechaDiario = $snValidaFechaDiario;
        return $this;
    }

    public function isSnAlterarProvas(): bool
    {
        return $this->snAlterarProvas;
    }

    public function setSnAlterarProvas(bool $snAlterarProvas): self
    {
        $this->snAlterarProvas = $snAlterarProvas;
        return $this;
    }

    public function getSnDeferirNotasDiario(): int
    {
        return $this->snDeferirNotasDiario;
    }

    public function setSnDeferirNotasDiario(int $snDeferirNotasDiario): self
    {
        $this->snDeferirNotasDiario = $snDeferirNotasDiario;
        return $this;
    }

    public function getSnDiarioOnlineBloqueCont(): ?int
    {
        return $this->snDiarioOnlineBloqueCont;
    }

    public function setSnDiarioOnlineBloqueCont(?int $snDiarioOnlineBloqueCont): self
    {
        $this->snDiarioOnlineBloqueCont = $snDiarioOnlineBloqueCont;
        return $this;
    }

    public function getCdSituacaoReprovDireta(): ?int
    {
        return $this->cdSituacaoReprovDireta;
    }

    public function setCdSituacaoReprovDireta(?int $cdSituacaoReprovDireta): self
    {
        $this->cdSituacaoReprovDireta = $cdSituacaoReprovDireta;
        return $this;
    }

    public function getCdSituacaoReprovExame(): ?int
    {
        return $this->cdSituacaoReprovExame;
    }

    public function setCdSituacaoReprovExame(?int $cdSituacaoReprovExame): self
    {
        $this->cdSituacaoReprovExame = $cdSituacaoReprovExame;
        return $this;
    }

    public function getCdSituacaoReprov2epoca(): ?int
    {
        return $this->cdSituacaoReprov2epoca;
    }

    public function setCdSituacaoReprov2epoca(?int $cdSituacaoReprov2epoca): self
    {
        $this->cdSituacaoReprov2epoca = $cdSituacaoReprov2epoca;
        return $this;
    }

    public function getSnAgruparAulasMesmaData(): int
    {
        return $this->snAgruparAulasMesmaData;
    }

    public function setSnAgruparAulasMesmaData(int $snAgruparAulasMesmaData): self
    {
        $this->snAgruparAulasMesmaData = $snAgruparAulasMesmaData;
        return $this;
    }

    public function isSnFaltaSemNota2epoca(): ?bool
    {
        return $this->snFaltaSemNota2epoca;
    }

    public function setSnFaltaSemNota2epoca(?bool $snFaltaSemNota2epoca): self
    {
        $this->snFaltaSemNota2epoca = $snFaltaSemNota2epoca;
        return $this;
    }

    public function getSnFaltasJustificadas(): int
    {
        return $this->snFaltasJustificadas;
    }

    public function setSnFaltasJustificadas(int $snFaltasJustificadas): self
    {
        $this->snFaltasJustificadas = $snFaltasJustificadas;
        return $this;
    }

    public function getSnComportamento(): int
    {
        return $this->snComportamento;
    }

    public function setSnComportamento(int $snComportamento): self
    {
        $this->snComportamento = $snComportamento;
        return $this;
    }

    public function getSnDiarioOnlineFreqBloqCont(): ?int
    {
        return $this->snDiarioOnlineFreqBloqCont;
    }

    public function setSnDiarioOnlineFreqBloqCont(?int $snDiarioOnlineFreqBloqCont): self
    {
        $this->snDiarioOnlineFreqBloqCont = $snDiarioOnlineFreqBloqCont;
        return $this;
    }

    public function getSnDiarioOnlineFreqBloqDigi(): ?int
    {
        return $this->snDiarioOnlineFreqBloqDigi;
    }

    public function setSnDiarioOnlineFreqBloqDigi(?int $snDiarioOnlineFreqBloqDigi): self
    {
        $this->snDiarioOnlineFreqBloqDigi = $snDiarioOnlineFreqBloqDigi;
        return $this;
    }

    public function getSnDiarioOnlineCompartAula(): ?int
    {
        return $this->snDiarioOnlineCompartAula;
    }

    public function setSnDiarioOnlineCompartAula(?int $snDiarioOnlineCompartAula): self
    {
        $this->snDiarioOnlineCompartAula = $snDiarioOnlineCompartAula;
        return $this;
    }

    public function getSnDiarioOnlineMostraResp(): ?int
    {
        return $this->snDiarioOnlineMostraResp;
    }

    public function setSnDiarioOnlineMostraResp(?int $snDiarioOnlineMostraResp): self
    {
        $this->snDiarioOnlineMostraResp = $snDiarioOnlineMostraResp;
        return $this;
    }

    public function getSnPermitirJustificar(): ?int
    {
        return $this->snPermitirJustificar;
    }

    public function setSnPermitirJustificar(?int $snPermitirJustificar): self
    {
        $this->snPermitirJustificar = $snPermitirJustificar;
        return $this;
    }

    public function getSnProfessorInformarMotivoMedia(): ?int
    {
        return $this->snProfessorInformarMotivoMedia;
    }

    public function setSnProfessorInformarMotivoMedia(?int $snProfessorInformarMotivoMedia): self
    {
        $this->snProfessorInformarMotivoMedia = $snProfessorInformarMotivoMedia;
        return $this;
    }

    public function getDsCondReproFalta(): ?string
    {
        return $this->dsCondReproFalta;
    }

    public function setDsCondReproFalta(?string $dsCondReproFalta): self
    {
        $this->dsCondReproFalta = $dsCondReproFalta;
        return $this;
    }

    public function getCdSituacaoReprovFalta(): ?int
    {
        return $this->cdSituacaoReprovFalta;
    }

    public function setCdSituacaoReprovFalta(?int $cdSituacaoReprovFalta): self
    {
        $this->cdSituacaoReprovFalta = $cdSituacaoReprovFalta;
        return $this;
    }

    public function getSnConverterFrequenciasNulas(): int
    {
        return $this->snConverterFrequenciasNulas;
    }

    public function setSnConverterFrequenciasNulas(int $snConverterFrequenciasNulas): self
    {
        $this->snConverterFrequenciasNulas = $snConverterFrequenciasNulas;
        return $this;
    }

    public function isSnOcultarConteudoPortal(): ?bool
    {
        return $this->snOcultarConteudoPortal;
    }

    public function setSnOcultarConteudoPortal(?bool $snOcultarConteudoPortal): self
    {
        $this->snOcultarConteudoPortal = $snOcultarConteudoPortal;
        return $this;
    }

    public function getSnFrequenciasCalcularMedias(): int
    {
        return $this->snFrequenciasCalcularMedias;
    }

    public function setSnFrequenciasCalcularMedias(int $snFrequenciasCalcularMedias): self
    {
        $this->snFrequenciasCalcularMedias = $snFrequenciasCalcularMedias;
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

    public function getSnLiberaNotasAposFimEtapa(): int
    {
        return $this->snLiberaNotasAposFimEtapa;
    }

    public function setSnLiberaNotasAposFimEtapa(int $snLiberaNotasAposFimEtapa): self
    {
        $this->snLiberaNotasAposFimEtapa = $snLiberaNotasAposFimEtapa;
        return $this;
    }

    public function getSnProfesDigitaNotaMax(): int
    {
        return $this->snProfesDigitaNotaMax;
    }

    public function setSnProfesDigitaNotaMax(int $snProfesDigitaNotaMax): self
    {
        $this->snProfesDigitaNotaMax = $snProfesDigitaNotaMax;
        return $this;
    }

    public function getSnEsconderNotasParciais(): int
    {
        return $this->snEsconderNotasParciais;
    }

    public function setSnEsconderNotasParciais(int $snEsconderNotasParciais): self
    {
        $this->snEsconderNotasParciais = $snEsconderNotasParciais;
        return $this;
    }

    public function isSnDiscFrenteMedia(): bool
    {
        return $this->snDiscFrenteMedia;
    }

    public function setSnDiscFrenteMedia(bool $snDiscFrenteMedia): self
    {
        $this->snDiscFrenteMedia = $snDiscFrenteMedia;
        return $this;
    }

    public function isSnUnificarDiarios(): bool
    {
        return $this->snUnificarDiarios;
    }

    public function setSnUnificarDiarios(bool $snUnificarDiarios): self
    {
        $this->snUnificarDiarios = $snUnificarDiarios;
        return $this;
    }

    public function getDsNomeAtividade(): ?string
    {
        return $this->dsNomeAtividade;
    }

    public function setDsNomeAtividade(?string $dsNomeAtividade): self
    {
        $this->dsNomeAtividade = $dsNomeAtividade;
        return $this;
    }

    public function getDsCondicaoDigitarRe(): ?string
    {
        return $this->dsCondicaoDigitarRe;
    }

    public function setDsCondicaoDigitarRe(?string $dsCondicaoDigitarRe): self
    {
        $this->dsCondicaoDigitarRe = $dsCondicaoDigitarRe;
        return $this;
    }

    public function getVlMaximoMediaFinal(): ?float
    {
        return $this->vlMaximoMediaFinal;
    }

    public function setVlMaximoMediaFinal(?float $vlMaximoMediaFinal): self
    {
        $this->vlMaximoMediaFinal = $vlMaximoMediaFinal;
        return $this;
    }

    public function getVlMaximoMediaEtapa(): ?float
    {
        return $this->vlMaximoMediaEtapa;
    }

    public function setVlMaximoMediaEtapa(?float $vlMaximoMediaEtapa): self
    {
        $this->vlMaximoMediaEtapa = $vlMaximoMediaEtapa;
        return $this;
    }

    public function getVlDiarioDigitaNotaMax(): ?float
    {
        return $this->vlDiarioDigitaNotaMax;
    }

    public function setVlDiarioDigitaNotaMax(?float $vlDiarioDigitaNotaMax): self
    {
        $this->vlDiarioDigitaNotaMax = $vlDiarioDigitaNotaMax;
        return $this;
    }

    public function getDsLegenda(): ?string
    {
        return $this->dsLegenda;
    }

    public function setDsLegenda(?string $dsLegenda): self
    {
        $this->dsLegenda = $dsLegenda;
        return $this;
    }

    public function isSnObrigaEmentaPlanoAprendizagem(): bool
    {
        return $this->snObrigaEmentaPlanoAprendizagem;
    }

    public function setSnObrigaEmentaPlanoAprendizagem(bool $snObrigaEmentaPlanoAprendizagem): self
    {
        $this->snObrigaEmentaPlanoAprendizagem = $snObrigaEmentaPlanoAprendizagem;
        return $this;
    }
}
