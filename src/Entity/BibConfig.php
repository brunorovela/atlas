<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibConfigRepository::class)]
#[ORM\Table(
    name: 'bib_config',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'FK_bib_config_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_config_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_config', type: 'integer')]
    private ?int $cdConfig = null;

    #[ORM\Column(name: 'sn_importado', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snImportado = 0;

    #[ORM\Column(name: 'ds_tipos_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTiposArquivo = null;

    #[ORM\Column(name: 'nr_recomendado_alunos_exemplar', type: 'integer', nullable: true)]
    private ?int $nrRecomendadoAlunosExemplar = null;

    #[ORM\Column(name: 'sn_recibo_automatico', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snReciboAutomatico = null;

    #[ORM\Column(name: 'nr_dias_proximo_emprestimo', type: 'integer', nullable: true)]
    private ?int $nrDiasProximoEmprestimo = null;

    #[ORM\Column(name: 'nr_maximo_renovacoes_local', type: 'integer', nullable: true)]
    private ?int $nrMaximoRenovacoesLocal = null;

    #[ORM\Column(name: 'nr_dias_expira_reserva', type: 'integer', nullable: true)]
    private ?int $nrDiasExpiraReserva = null;

    #[ORM\Column(name: 'nr_dias_antecipados_recados', type: 'integer', nullable: true)]
    private ?int $nrDiasAntecipadosRecados = null;

    #[ORM\Column(name: 'nr_maximo_renovacoes_online', type: 'integer', nullable: true)]
    private ?int $nrMaximoRenovacoesOnline = null;

    #[ORM\Column(name: 'sn_movimento_seguro', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMovimentoSeguro = null;

    #[ORM\Column(name: 'sn_reserva_apenas_emprestados', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snReservaApenasEmprestados = null;

    #[ORM\Column(name: 'sn_enviar_recados', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEnviarRecados = null;

    #[ORM\Column(name: 'sn_codigo_barras_autoinc', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCodigoBarrasAutoinc = null;

    #[ORM\Column(name: 'sn_expirar_reservas_automatico', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snExpirarReservasAutomatico = null;

    #[ORM\Column(name: 'tx_recado_reserva_disponivel', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoReservaDisponivel = null;

    #[ORM\Column(name: 'tx_recado_reserva_cancelada', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoReservaCancelada = null;

    #[ORM\Column(name: 'tx_recado_reserva_antecipado', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoReservaAntecipado = null;

    #[ORM\Column(name: 'tx_recado_reserva_dia', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoReservaDia = null;

    #[ORM\Column(name: 'tx_recado_reserva_ate_expirar', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoReservaAteExpirar = null;

    #[ORM\Column(name: 'tx_recado_emprestimo_antes', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoEmprestimoAntes = null;

    #[ORM\Column(name: 'tx_recado_emprestimo_dia', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoEmprestimoDia = null;

    #[ORM\Column(name: 'tx_recado_emprestimo_atrasado', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoEmprestimoAtrasado = null;

    #[ORM\Column(name: 'nr_multa_parcela', type: 'integer', nullable: true)]
    private ?int $nrMultaParcela = null;

    #[ORM\Column(name: 'sn_multa_avisa_financeiro', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMultaAvisaFinanceiro = null;

    #[ORM\Column(name: 'sn_multa_cobranca_biblioteca', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMultaCobrancaBiblioteca = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'sn_multa_incrementar_titulos', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMultaIncrementarTitulos = null;

    #[ORM\Column(name: 'nr_multa_dia_mensalidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMultaDiaMensalidade = null;

    #[ORM\Column(name: 'nr_multa_qtd_dias_mensalidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMultaQtdDiasMensalidade = null;

    #[ORM\Column(name: 'ds_multa_turma', type: 'string', length: 50)]
    private ?string $dsMultaTurma = null;

    #[ORM\Column(name: 'ds_multa_curso', type: 'string', length: 15, nullable: true)]
    private ?string $dsMultaCurso = null;

    #[ORM\Column(name: 'cd_multa_departamento', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMultaDepartamento = null;

    #[ORM\Column(name: 'nr_emprestimos_simultaneos', type: 'integer', nullable: true)]
    private ?int $nrEmprestimosSimultaneos = null;

    #[ORM\Column(name: 'ds_url_upload_arquivos', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlUploadArquivos = null;

    #[ORM\Column(name: 'nr_horas_emprestimo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrHorasEmprestimo = null;

    #[ORM\Column(name: 'sn_codigo_barras_usar_registro', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCodigoBarrasUsarRegistro = null;

    #[ORM\Column(name: 'sn_renovar_atrasados', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snRenovarAtrasados = null;

    #[ORM\Column(name: 'sn_emprestimo_dias_uteis', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEmprestimoDiasUteis = null;

    #[ORM\Column(name: 'sn_reserva_dias_uteis', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snReservaDiasUteis = null;

    #[ORM\Column(name: 'db_multa_minima_bloquear', type: 'float', nullable: true, options: ['default' => '999.000'])]
    private ?float $dbMultaMinimaBloquear = 999.0;

    #[ORM\Column(name: 'db_multa_minima_bloq_res', type: 'float', nullable: true, options: ['default' => '999.000'])]
    private ?float $dbMultaMinimaBloqRes = 999.0;

    #[ORM\Column(name: 'sn_caddisc_apenas_cursos', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCaddiscApenasCursos = 0;

    #[ORM\Column(name: 'sn_multa_bloqueio_dt_vencto', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snMultaBloqueioDtVencto = 0;

    #[ORM\Column(name: 'sn_notificar_todas', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snNotificarTodas = 0;

    #[ORM\Column(name: 'tx_recado_multa_aberta', type: 'text', length: 65535, nullable: true)]
    private ?string $txRecadoMultaAberta = null;

    #[ORM\Column(name: 'sn_manter_zero', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snManterZero = 0;

    #[ORM\Column(name: 'ds_proxy_upload', type: 'string', length: 255, nullable: true)]
    private ?string $dsProxyUpload = null;

    #[ORM\Column(name: 'ds_porta_upload', type: 'string', length: 255, nullable: true)]
    private ?string $dsPortaUpload = null;

    #[ORM\Column(name: 'sn_emprestar_com_atraso', type: 'boolean', nullable: true)]
    private ?bool $snEmprestarComAtraso = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    // Sem construtor: 50 propriedades. Use os setters encadeados.

    public function getCdConfig(): ?int
    {
        return $this->cdConfig;
    }

    public function getSnImportado(): int
    {
        return $this->snImportado;
    }

    public function setSnImportado(int $snImportado): self
    {
        $this->snImportado = $snImportado;
        return $this;
    }

    public function getDsTiposArquivo(): ?string
    {
        return $this->dsTiposArquivo;
    }

    public function setDsTiposArquivo(?string $dsTiposArquivo): self
    {
        $this->dsTiposArquivo = $dsTiposArquivo;
        return $this;
    }

    public function getNrRecomendadoAlunosExemplar(): ?int
    {
        return $this->nrRecomendadoAlunosExemplar;
    }

    public function setNrRecomendadoAlunosExemplar(?int $nrRecomendadoAlunosExemplar): self
    {
        $this->nrRecomendadoAlunosExemplar = $nrRecomendadoAlunosExemplar;
        return $this;
    }

    public function getSnReciboAutomatico(): ?int
    {
        return $this->snReciboAutomatico;
    }

    public function setSnReciboAutomatico(?int $snReciboAutomatico): self
    {
        $this->snReciboAutomatico = $snReciboAutomatico;
        return $this;
    }

    public function getNrDiasProximoEmprestimo(): ?int
    {
        return $this->nrDiasProximoEmprestimo;
    }

    public function setNrDiasProximoEmprestimo(?int $nrDiasProximoEmprestimo): self
    {
        $this->nrDiasProximoEmprestimo = $nrDiasProximoEmprestimo;
        return $this;
    }

    public function getNrMaximoRenovacoesLocal(): ?int
    {
        return $this->nrMaximoRenovacoesLocal;
    }

    public function setNrMaximoRenovacoesLocal(?int $nrMaximoRenovacoesLocal): self
    {
        $this->nrMaximoRenovacoesLocal = $nrMaximoRenovacoesLocal;
        return $this;
    }

    public function getNrDiasExpiraReserva(): ?int
    {
        return $this->nrDiasExpiraReserva;
    }

    public function setNrDiasExpiraReserva(?int $nrDiasExpiraReserva): self
    {
        $this->nrDiasExpiraReserva = $nrDiasExpiraReserva;
        return $this;
    }

    public function getNrDiasAntecipadosRecados(): ?int
    {
        return $this->nrDiasAntecipadosRecados;
    }

    public function setNrDiasAntecipadosRecados(?int $nrDiasAntecipadosRecados): self
    {
        $this->nrDiasAntecipadosRecados = $nrDiasAntecipadosRecados;
        return $this;
    }

    public function getNrMaximoRenovacoesOnline(): ?int
    {
        return $this->nrMaximoRenovacoesOnline;
    }

    public function setNrMaximoRenovacoesOnline(?int $nrMaximoRenovacoesOnline): self
    {
        $this->nrMaximoRenovacoesOnline = $nrMaximoRenovacoesOnline;
        return $this;
    }

    public function getSnMovimentoSeguro(): ?int
    {
        return $this->snMovimentoSeguro;
    }

    public function setSnMovimentoSeguro(?int $snMovimentoSeguro): self
    {
        $this->snMovimentoSeguro = $snMovimentoSeguro;
        return $this;
    }

    public function getSnReservaApenasEmprestados(): ?int
    {
        return $this->snReservaApenasEmprestados;
    }

    public function setSnReservaApenasEmprestados(?int $snReservaApenasEmprestados): self
    {
        $this->snReservaApenasEmprestados = $snReservaApenasEmprestados;
        return $this;
    }

    public function getSnEnviarRecados(): ?int
    {
        return $this->snEnviarRecados;
    }

    public function setSnEnviarRecados(?int $snEnviarRecados): self
    {
        $this->snEnviarRecados = $snEnviarRecados;
        return $this;
    }

    public function getSnCodigoBarrasAutoinc(): ?int
    {
        return $this->snCodigoBarrasAutoinc;
    }

    public function setSnCodigoBarrasAutoinc(?int $snCodigoBarrasAutoinc): self
    {
        $this->snCodigoBarrasAutoinc = $snCodigoBarrasAutoinc;
        return $this;
    }

    public function getSnExpirarReservasAutomatico(): ?int
    {
        return $this->snExpirarReservasAutomatico;
    }

    public function setSnExpirarReservasAutomatico(?int $snExpirarReservasAutomatico): self
    {
        $this->snExpirarReservasAutomatico = $snExpirarReservasAutomatico;
        return $this;
    }

    public function getTxRecadoReservaDisponivel(): ?string
    {
        return $this->txRecadoReservaDisponivel;
    }

    public function setTxRecadoReservaDisponivel(?string $txRecadoReservaDisponivel): self
    {
        $this->txRecadoReservaDisponivel = $txRecadoReservaDisponivel;
        return $this;
    }

    public function getTxRecadoReservaCancelada(): ?string
    {
        return $this->txRecadoReservaCancelada;
    }

    public function setTxRecadoReservaCancelada(?string $txRecadoReservaCancelada): self
    {
        $this->txRecadoReservaCancelada = $txRecadoReservaCancelada;
        return $this;
    }

    public function getTxRecadoReservaAntecipado(): ?string
    {
        return $this->txRecadoReservaAntecipado;
    }

    public function setTxRecadoReservaAntecipado(?string $txRecadoReservaAntecipado): self
    {
        $this->txRecadoReservaAntecipado = $txRecadoReservaAntecipado;
        return $this;
    }

    public function getTxRecadoReservaDia(): ?string
    {
        return $this->txRecadoReservaDia;
    }

    public function setTxRecadoReservaDia(?string $txRecadoReservaDia): self
    {
        $this->txRecadoReservaDia = $txRecadoReservaDia;
        return $this;
    }

    public function getTxRecadoReservaAteExpirar(): ?string
    {
        return $this->txRecadoReservaAteExpirar;
    }

    public function setTxRecadoReservaAteExpirar(?string $txRecadoReservaAteExpirar): self
    {
        $this->txRecadoReservaAteExpirar = $txRecadoReservaAteExpirar;
        return $this;
    }

    public function getTxRecadoEmprestimoAntes(): ?string
    {
        return $this->txRecadoEmprestimoAntes;
    }

    public function setTxRecadoEmprestimoAntes(?string $txRecadoEmprestimoAntes): self
    {
        $this->txRecadoEmprestimoAntes = $txRecadoEmprestimoAntes;
        return $this;
    }

    public function getTxRecadoEmprestimoDia(): ?string
    {
        return $this->txRecadoEmprestimoDia;
    }

    public function setTxRecadoEmprestimoDia(?string $txRecadoEmprestimoDia): self
    {
        $this->txRecadoEmprestimoDia = $txRecadoEmprestimoDia;
        return $this;
    }

    public function getTxRecadoEmprestimoAtrasado(): ?string
    {
        return $this->txRecadoEmprestimoAtrasado;
    }

    public function setTxRecadoEmprestimoAtrasado(?string $txRecadoEmprestimoAtrasado): self
    {
        $this->txRecadoEmprestimoAtrasado = $txRecadoEmprestimoAtrasado;
        return $this;
    }

    public function getNrMultaParcela(): ?int
    {
        return $this->nrMultaParcela;
    }

    public function setNrMultaParcela(?int $nrMultaParcela): self
    {
        $this->nrMultaParcela = $nrMultaParcela;
        return $this;
    }

    public function getSnMultaAvisaFinanceiro(): ?int
    {
        return $this->snMultaAvisaFinanceiro;
    }

    public function setSnMultaAvisaFinanceiro(?int $snMultaAvisaFinanceiro): self
    {
        $this->snMultaAvisaFinanceiro = $snMultaAvisaFinanceiro;
        return $this;
    }

    public function getSnMultaCobrancaBiblioteca(): ?int
    {
        return $this->snMultaCobrancaBiblioteca;
    }

    public function setSnMultaCobrancaBiblioteca(?int $snMultaCobrancaBiblioteca): self
    {
        $this->snMultaCobrancaBiblioteca = $snMultaCobrancaBiblioteca;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getSnMultaIncrementarTitulos(): ?int
    {
        return $this->snMultaIncrementarTitulos;
    }

    public function setSnMultaIncrementarTitulos(?int $snMultaIncrementarTitulos): self
    {
        $this->snMultaIncrementarTitulos = $snMultaIncrementarTitulos;
        return $this;
    }

    public function getNrMultaDiaMensalidade(): ?int
    {
        return $this->nrMultaDiaMensalidade;
    }

    public function setNrMultaDiaMensalidade(?int $nrMultaDiaMensalidade): self
    {
        $this->nrMultaDiaMensalidade = $nrMultaDiaMensalidade;
        return $this;
    }

    public function getNrMultaQtdDiasMensalidade(): ?int
    {
        return $this->nrMultaQtdDiasMensalidade;
    }

    public function setNrMultaQtdDiasMensalidade(?int $nrMultaQtdDiasMensalidade): self
    {
        $this->nrMultaQtdDiasMensalidade = $nrMultaQtdDiasMensalidade;
        return $this;
    }

    public function getDsMultaTurma(): ?string
    {
        return $this->dsMultaTurma;
    }

    public function setDsMultaTurma(?string $dsMultaTurma): self
    {
        $this->dsMultaTurma = $dsMultaTurma;
        return $this;
    }

    public function getDsMultaCurso(): ?string
    {
        return $this->dsMultaCurso;
    }

    public function setDsMultaCurso(?string $dsMultaCurso): self
    {
        $this->dsMultaCurso = $dsMultaCurso;
        return $this;
    }

    public function getCdMultaDepartamento(): ?int
    {
        return $this->cdMultaDepartamento;
    }

    public function setCdMultaDepartamento(?int $cdMultaDepartamento): self
    {
        $this->cdMultaDepartamento = $cdMultaDepartamento;
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

    public function getDsUrlUploadArquivos(): ?string
    {
        return $this->dsUrlUploadArquivos;
    }

    public function setDsUrlUploadArquivos(?string $dsUrlUploadArquivos): self
    {
        $this->dsUrlUploadArquivos = $dsUrlUploadArquivos;
        return $this;
    }

    public function getNrHorasEmprestimo(): ?int
    {
        return $this->nrHorasEmprestimo;
    }

    public function setNrHorasEmprestimo(?int $nrHorasEmprestimo): self
    {
        $this->nrHorasEmprestimo = $nrHorasEmprestimo;
        return $this;
    }

    public function getSnCodigoBarrasUsarRegistro(): ?int
    {
        return $this->snCodigoBarrasUsarRegistro;
    }

    public function setSnCodigoBarrasUsarRegistro(?int $snCodigoBarrasUsarRegistro): self
    {
        $this->snCodigoBarrasUsarRegistro = $snCodigoBarrasUsarRegistro;
        return $this;
    }

    public function getSnRenovarAtrasados(): ?int
    {
        return $this->snRenovarAtrasados;
    }

    public function setSnRenovarAtrasados(?int $snRenovarAtrasados): self
    {
        $this->snRenovarAtrasados = $snRenovarAtrasados;
        return $this;
    }

    public function getSnEmprestimoDiasUteis(): ?int
    {
        return $this->snEmprestimoDiasUteis;
    }

    public function setSnEmprestimoDiasUteis(?int $snEmprestimoDiasUteis): self
    {
        $this->snEmprestimoDiasUteis = $snEmprestimoDiasUteis;
        return $this;
    }

    public function getSnReservaDiasUteis(): ?int
    {
        return $this->snReservaDiasUteis;
    }

    public function setSnReservaDiasUteis(?int $snReservaDiasUteis): self
    {
        $this->snReservaDiasUteis = $snReservaDiasUteis;
        return $this;
    }

    public function getDbMultaMinimaBloquear(): ?float
    {
        return $this->dbMultaMinimaBloquear;
    }

    public function setDbMultaMinimaBloquear(?float $dbMultaMinimaBloquear): self
    {
        $this->dbMultaMinimaBloquear = $dbMultaMinimaBloquear;
        return $this;
    }

    public function getDbMultaMinimaBloqRes(): ?float
    {
        return $this->dbMultaMinimaBloqRes;
    }

    public function setDbMultaMinimaBloqRes(?float $dbMultaMinimaBloqRes): self
    {
        $this->dbMultaMinimaBloqRes = $dbMultaMinimaBloqRes;
        return $this;
    }

    public function getSnCaddiscApenasCursos(): ?int
    {
        return $this->snCaddiscApenasCursos;
    }

    public function setSnCaddiscApenasCursos(?int $snCaddiscApenasCursos): self
    {
        $this->snCaddiscApenasCursos = $snCaddiscApenasCursos;
        return $this;
    }

    public function getSnMultaBloqueioDtVencto(): int
    {
        return $this->snMultaBloqueioDtVencto;
    }

    public function setSnMultaBloqueioDtVencto(int $snMultaBloqueioDtVencto): self
    {
        $this->snMultaBloqueioDtVencto = $snMultaBloqueioDtVencto;
        return $this;
    }

    public function getSnNotificarTodas(): int
    {
        return $this->snNotificarTodas;
    }

    public function setSnNotificarTodas(int $snNotificarTodas): self
    {
        $this->snNotificarTodas = $snNotificarTodas;
        return $this;
    }

    public function getTxRecadoMultaAberta(): ?string
    {
        return $this->txRecadoMultaAberta;
    }

    public function setTxRecadoMultaAberta(?string $txRecadoMultaAberta): self
    {
        $this->txRecadoMultaAberta = $txRecadoMultaAberta;
        return $this;
    }

    public function getSnManterZero(): ?int
    {
        return $this->snManterZero;
    }

    public function setSnManterZero(?int $snManterZero): self
    {
        $this->snManterZero = $snManterZero;
        return $this;
    }

    public function getDsProxyUpload(): ?string
    {
        return $this->dsProxyUpload;
    }

    public function setDsProxyUpload(?string $dsProxyUpload): self
    {
        $this->dsProxyUpload = $dsProxyUpload;
        return $this;
    }

    public function getDsPortaUpload(): ?string
    {
        return $this->dsPortaUpload;
    }

    public function setDsPortaUpload(?string $dsPortaUpload): self
    {
        $this->dsPortaUpload = $dsPortaUpload;
        return $this;
    }

    public function isSnEmprestarComAtraso(): ?bool
    {
        return $this->snEmprestarComAtraso;
    }

    public function setSnEmprestarComAtraso(?bool $snEmprestarComAtraso): self
    {
        $this->snEmprestarComAtraso = $snEmprestarComAtraso;
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
