<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TamEventosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosRepository::class)]
#[ORM\Table(
    name: 'tam_eventos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'InnoDB free: 5120 kB']
)]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['CD_EVENTO'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['CD_TIPO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_tam_eventos_tam_eventos_tipos', 'colunas' => ['CD_TIPO'], 'tabelaAlvo' => 'tam_eventos_tipos', 'colunasAlvo' => ['CD_TIPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamEventos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_EVENTO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEvento = null;

    #[ORM\Column(name: 'CD_GESTOR', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGestor = null;

    #[ORM\Column(name: 'CD_RESPONSAVEL', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'DS_EVENTO', type: 'string', length: 255, nullable: true)]
    private ?string $dsEvento = null;

    #[ORM\Column(name: 'ME_EVENTO', type: 'text', length: 16777215, nullable: true)]
    private ?string $meEvento = null;

    #[ORM\Column(name: 'DT_EVENTO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEvento = null;

    #[ORM\Column(name: 'DT_EVENTO_FIM', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEventoFim = null;

    #[ORM\Column(name: 'ME_LOCAL', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLocal = null;

    #[ORM\Column(name: 'NR_VAGAS', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrVagas = null;

    #[ORM\Column(name: 'VL_INSCRICAO', type: 'smallfloat', nullable: true)]
    private ?float $vlInscricao = null;

    #[ORM\Column(name: 'VL_INSCRICAO_COMUNIDADE', type: 'smallfloat', nullable: true)]
    private ?float $vlInscricaoComunidade = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'DT_VENCIMENTO', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'DT_INICIO_INSCRICAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioInscricao = null;

    #[ORM\Column(name: 'DT_FIM_INSCRICAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimInscricao = null;

    #[ORM\Column(name: 'SN_BOLETO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snBoleto = null;

    #[ORM\Column(name: 'SN_CHECAR_FIN_INSCRICAO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snChecarFinInscricao = 0;

    #[ORM\Column(name: 'DS_SENHA', type: 'string', length: 50, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'DT_CADASTRO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'NR_PARCELA', type: 'smallint', nullable: true)]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'VL_PRESENCA', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '75'])]
    private ?int $vlPresenca = 75;

    #[ORM\Column(name: 'ME_CERTIFICADO', type: 'text', nullable: true)]
    private ?string $meCertificado = null;

    #[ORM\Column(name: 'SN_CONVALIDAR_ATIVIDADES', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snConvalidarAtividades = 0;

    #[ORM\Column(name: 'SN_CALCULO_CARGA_HORARIA', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCalculoCargaHoraria = 0;

    #[ORM\Column(name: 'ME_ASSINATURA_1', type: 'text', nullable: true)]
    private ?string $meAssinatura1 = null;

    #[ORM\Column(name: 'ME_ASSINATURA_2', type: 'text', nullable: true)]
    private ?string $meAssinatura2 = null;

    #[ORM\Column(name: 'ME_ASSINATURA_3', type: 'text', nullable: true)]
    private ?string $meAssinatura3 = null;

    #[ORM\Column(name: 'SN_LIBERAR_INSCRICOES', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snLiberarInscricoes = false;

    #[ORM\Column(name: 'SN_CHECAR_FIN_ACESSO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snChecarFinAcesso = 0;

    #[ORM\Column(name: 'CD_GE_ATIVIDADE', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGeAtividade = null;

    #[ORM\Column(name: 'SN_LIBERAR_PARA_COMUNIDADE', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snLiberarParaComunidade = false;

    #[ORM\Column(name: 'SN_CHECAR_FIN_CERTIFICADO', type: 'boolean', options: ['default' => '0'])]
    private bool $snChecarFinCertificado = false;

    #[ORM\Column(name: 'NR_REGISTRO', type: 'integer', nullable: true)]
    private ?int $nrRegistro = null;

    #[ORM\Column(name: 'SN_ATIVIDADE_UNICA', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtividadeUnica = 0;

    #[ORM\Column(name: 'SN_CERTIFICAR_PARCIAL', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCertificarParcial = 0;

    #[ORM\Column(name: 'CD_UNIDADE_BOLETO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUnidadeBoleto = null;

    #[ORM\Column(name: 'SN_FILA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snFila = 0;

    #[ORM\Column(name: 'SN_ALTERAR_INSCRICAO', type: 'boolean', nullable: true)]
    private ?bool $snAlterarInscricao = null;

    #[ORM\ManyToOne(targetEntity: TamEventosTipos::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO', referencedColumnName: 'CD_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventosTipos $cdTipo = null;

    #[ORM\Column(name: 'CD_TURMA_TITULO_GERAR', type: 'string', length: 255, nullable: true, options: ['default' => 'gerar_ultima_turma_matricula_aluno'])]
    private ?string $cdTurmaTituloGerar = 'gerar_ultima_turma_matricula_aluno';

    #[ORM\Column(name: 'ANOSEMESTRE_TURMA', type: 'integer', nullable: true)]
    private ?int $anosemestreTurma = null;

    #[ORM\Column(name: 'ME_CERTIFICADO_VERSO', type: 'text', nullable: true)]
    private ?string $meCertificadoVerso = null;

    #[ORM\Column(name: 'SN_CERTIFICADO_FRENTE_VERSO', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snCertificadoFrenteVerso = 0;

    #[ORM\Column(name: 'NR_DIAS_VENCIMENTO', type: 'integer', nullable: true)]
    private ?int $nrDiasVencimento = null;

    #[ORM\Column(name: 'SN_ACESSO_RAPIDO', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAcessoRapido = false;

    #[ORM\Column(name: 'SN_GERAR_ULTIMA_TURMA_ALUNO', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snGerarUltimaTurmaAluno = 0;

    // Sem construtor: 45 propriedades. Use os setters encadeados.

    public function getCdEvento(): ?int
    {
        return $this->cdEvento;
    }

    public function getCdGestor(): ?int
    {
        return $this->cdGestor;
    }

    public function setCdGestor(?int $cdGestor): self
    {
        $this->cdGestor = $cdGestor;
        return $this;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getDsEvento(): ?string
    {
        return $this->dsEvento;
    }

    public function setDsEvento(?string $dsEvento): self
    {
        $this->dsEvento = $dsEvento;
        return $this;
    }

    public function getMeEvento(): ?string
    {
        return $this->meEvento;
    }

    public function setMeEvento(?string $meEvento): self
    {
        $this->meEvento = $meEvento;
        return $this;
    }

    public function getDtEvento(): ?\DateTimeInterface
    {
        return $this->dtEvento;
    }

    public function setDtEvento(?\DateTimeInterface $dtEvento): self
    {
        $this->dtEvento = $dtEvento;
        return $this;
    }

    public function getDtEventoFim(): ?\DateTimeInterface
    {
        return $this->dtEventoFim;
    }

    public function setDtEventoFim(?\DateTimeInterface $dtEventoFim): self
    {
        $this->dtEventoFim = $dtEventoFim;
        return $this;
    }

    public function getMeLocal(): ?string
    {
        return $this->meLocal;
    }

    public function setMeLocal(?string $meLocal): self
    {
        $this->meLocal = $meLocal;
        return $this;
    }

    public function getNrVagas(): ?int
    {
        return $this->nrVagas;
    }

    public function setNrVagas(?int $nrVagas): self
    {
        $this->nrVagas = $nrVagas;
        return $this;
    }

    public function getVlInscricao(): ?float
    {
        return $this->vlInscricao;
    }

    public function setVlInscricao(?float $vlInscricao): self
    {
        $this->vlInscricao = $vlInscricao;
        return $this;
    }

    public function getVlInscricaoComunidade(): ?float
    {
        return $this->vlInscricaoComunidade;
    }

    public function setVlInscricaoComunidade(?float $vlInscricaoComunidade): self
    {
        $this->vlInscricaoComunidade = $vlInscricaoComunidade;
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

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function getDtInicioInscricao(): ?\DateTimeInterface
    {
        return $this->dtInicioInscricao;
    }

    public function setDtInicioInscricao(?\DateTimeInterface $dtInicioInscricao): self
    {
        $this->dtInicioInscricao = $dtInicioInscricao;
        return $this;
    }

    public function getDtFimInscricao(): ?\DateTimeInterface
    {
        return $this->dtFimInscricao;
    }

    public function setDtFimInscricao(?\DateTimeInterface $dtFimInscricao): self
    {
        $this->dtFimInscricao = $dtFimInscricao;
        return $this;
    }

    public function getSnBoleto(): ?int
    {
        return $this->snBoleto;
    }

    public function setSnBoleto(?int $snBoleto): self
    {
        $this->snBoleto = $snBoleto;
        return $this;
    }

    public function getSnChecarFinInscricao(): int
    {
        return $this->snChecarFinInscricao;
    }

    public function setSnChecarFinInscricao(int $snChecarFinInscricao): self
    {
        $this->snChecarFinInscricao = $snChecarFinInscricao;
        return $this;
    }

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
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

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlPresenca(): ?int
    {
        return $this->vlPresenca;
    }

    public function setVlPresenca(?int $vlPresenca): self
    {
        $this->vlPresenca = $vlPresenca;
        return $this;
    }

    public function getMeCertificado(): ?string
    {
        return $this->meCertificado;
    }

    public function setMeCertificado(?string $meCertificado): self
    {
        $this->meCertificado = $meCertificado;
        return $this;
    }

    public function getSnConvalidarAtividades(): ?int
    {
        return $this->snConvalidarAtividades;
    }

    public function setSnConvalidarAtividades(?int $snConvalidarAtividades): self
    {
        $this->snConvalidarAtividades = $snConvalidarAtividades;
        return $this;
    }

    public function getSnCalculoCargaHoraria(): ?int
    {
        return $this->snCalculoCargaHoraria;
    }

    public function setSnCalculoCargaHoraria(?int $snCalculoCargaHoraria): self
    {
        $this->snCalculoCargaHoraria = $snCalculoCargaHoraria;
        return $this;
    }

    public function getMeAssinatura1(): ?string
    {
        return $this->meAssinatura1;
    }

    public function setMeAssinatura1(?string $meAssinatura1): self
    {
        $this->meAssinatura1 = $meAssinatura1;
        return $this;
    }

    public function getMeAssinatura2(): ?string
    {
        return $this->meAssinatura2;
    }

    public function setMeAssinatura2(?string $meAssinatura2): self
    {
        $this->meAssinatura2 = $meAssinatura2;
        return $this;
    }

    public function getMeAssinatura3(): ?string
    {
        return $this->meAssinatura3;
    }

    public function setMeAssinatura3(?string $meAssinatura3): self
    {
        $this->meAssinatura3 = $meAssinatura3;
        return $this;
    }

    public function isSnLiberarInscricoes(): ?bool
    {
        return $this->snLiberarInscricoes;
    }

    public function setSnLiberarInscricoes(?bool $snLiberarInscricoes): self
    {
        $this->snLiberarInscricoes = $snLiberarInscricoes;
        return $this;
    }

    public function getSnChecarFinAcesso(): int
    {
        return $this->snChecarFinAcesso;
    }

    public function setSnChecarFinAcesso(int $snChecarFinAcesso): self
    {
        $this->snChecarFinAcesso = $snChecarFinAcesso;
        return $this;
    }

    public function getCdGeAtividade(): ?int
    {
        return $this->cdGeAtividade;
    }

    public function setCdGeAtividade(?int $cdGeAtividade): self
    {
        $this->cdGeAtividade = $cdGeAtividade;
        return $this;
    }

    public function isSnLiberarParaComunidade(): ?bool
    {
        return $this->snLiberarParaComunidade;
    }

    public function setSnLiberarParaComunidade(?bool $snLiberarParaComunidade): self
    {
        $this->snLiberarParaComunidade = $snLiberarParaComunidade;
        return $this;
    }

    public function isSnChecarFinCertificado(): bool
    {
        return $this->snChecarFinCertificado;
    }

    public function setSnChecarFinCertificado(bool $snChecarFinCertificado): self
    {
        $this->snChecarFinCertificado = $snChecarFinCertificado;
        return $this;
    }

    public function getNrRegistro(): ?int
    {
        return $this->nrRegistro;
    }

    public function setNrRegistro(?int $nrRegistro): self
    {
        $this->nrRegistro = $nrRegistro;
        return $this;
    }

    public function getSnAtividadeUnica(): ?int
    {
        return $this->snAtividadeUnica;
    }

    public function setSnAtividadeUnica(?int $snAtividadeUnica): self
    {
        $this->snAtividadeUnica = $snAtividadeUnica;
        return $this;
    }

    public function getSnCertificarParcial(): ?int
    {
        return $this->snCertificarParcial;
    }

    public function setSnCertificarParcial(?int $snCertificarParcial): self
    {
        $this->snCertificarParcial = $snCertificarParcial;
        return $this;
    }

    public function getCdUnidadeBoleto(): ?int
    {
        return $this->cdUnidadeBoleto;
    }

    public function setCdUnidadeBoleto(?int $cdUnidadeBoleto): self
    {
        $this->cdUnidadeBoleto = $cdUnidadeBoleto;
        return $this;
    }

    public function getSnFila(): int
    {
        return $this->snFila;
    }

    public function setSnFila(int $snFila): self
    {
        $this->snFila = $snFila;
        return $this;
    }

    public function isSnAlterarInscricao(): ?bool
    {
        return $this->snAlterarInscricao;
    }

    public function setSnAlterarInscricao(?bool $snAlterarInscricao): self
    {
        $this->snAlterarInscricao = $snAlterarInscricao;
        return $this;
    }

    public function getCdTipo(): ?TamEventosTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?TamEventosTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdTurmaTituloGerar(): ?string
    {
        return $this->cdTurmaTituloGerar;
    }

    public function setCdTurmaTituloGerar(?string $cdTurmaTituloGerar): self
    {
        $this->cdTurmaTituloGerar = $cdTurmaTituloGerar;
        return $this;
    }

    public function getAnosemestreTurma(): ?int
    {
        return $this->anosemestreTurma;
    }

    public function setAnosemestreTurma(?int $anosemestreTurma): self
    {
        $this->anosemestreTurma = $anosemestreTurma;
        return $this;
    }

    public function getMeCertificadoVerso(): ?string
    {
        return $this->meCertificadoVerso;
    }

    public function setMeCertificadoVerso(?string $meCertificadoVerso): self
    {
        $this->meCertificadoVerso = $meCertificadoVerso;
        return $this;
    }

    public function getSnCertificadoFrenteVerso(): ?int
    {
        return $this->snCertificadoFrenteVerso;
    }

    public function setSnCertificadoFrenteVerso(?int $snCertificadoFrenteVerso): self
    {
        $this->snCertificadoFrenteVerso = $snCertificadoFrenteVerso;
        return $this;
    }

    public function getNrDiasVencimento(): ?int
    {
        return $this->nrDiasVencimento;
    }

    public function setNrDiasVencimento(?int $nrDiasVencimento): self
    {
        $this->nrDiasVencimento = $nrDiasVencimento;
        return $this;
    }

    public function isSnAcessoRapido(): ?bool
    {
        return $this->snAcessoRapido;
    }

    public function setSnAcessoRapido(?bool $snAcessoRapido): self
    {
        $this->snAcessoRapido = $snAcessoRapido;
        return $this;
    }

    public function getSnGerarUltimaTurmaAluno(): ?int
    {
        return $this->snGerarUltimaTurmaAluno;
    }

    public function setSnGerarUltimaTurmaAluno(?int $snGerarUltimaTurmaAluno): self
    {
        $this->snGerarUltimaTurmaAluno = $snGerarUltimaTurmaAluno;
        return $this;
    }
}
