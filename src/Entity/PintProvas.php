<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasRepository::class)]
#[ORM\Table(
    name: 'pint_provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACAO_INSTITUCIONAL', columns: ['cd_avaliacao_institucional'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class PintProvas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 250, nullable: true)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_inicio_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicioCadastro = null;

    #[ORM\Column(name: 'dt_fim_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFimCadastro = null;

    #[ORM\Column(name: 'dt_prova', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtProva = null;

    #[ORM\Column(name: 'dt_divulgacao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtDivulgacao = null;

    #[ORM\Column(name: 'nr_questoes_minimo_professor', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrQuestoesMinimoProfessor = 0;

    #[ORM\Column(name: 'nr_questoes_minimo_prova', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrQuestoesMinimoProva = 0;

    #[ORM\Column(name: 'nr_questoes_disciplinas', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrQuestoesDisciplinas = 0;

    #[ORM\Column(name: 'sn_finalizada', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snFinalizada = 0;

    #[ORM\Column(name: 'cd_avaliacao_institucional', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdAvaliacaoInstitucional = 0;

    #[ORM\Column(name: 'vl_peso_pi', type: 'smallfloat', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?float $vlPesoPi = 0.0;

    #[ORM\Column(name: 'vl_peso_ai', type: 'smallfloat', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?float $vlPesoAi = 0.0;

    #[ORM\Column(name: 'vl_peso_media', type: 'smallfloat', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?float $vlPesoMedia = 0.0;

    #[ORM\Column(name: 'dt_ultima_geracao_primeira', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaGeracaoPrimeira = null;

    #[ORM\Column(name: 'cd_usuario_geracao_primeira', type: 'integer', nullable: true)]
    private ?int $cdUsuarioGeracaoPrimeira = null;

    #[ORM\Column(name: 'dt_ultima_geracao_segunda', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaGeracaoSegunda = null;

    #[ORM\Column(name: 'cd_usuario_geracao_segunda', type: 'integer', nullable: true)]
    private ?int $cdUsuarioGeracaoSegunda = null;

    #[ORM\Column(name: 'sn_atribuir_nota_automatico', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAtribuirNotaAutomatico = 0;

    #[ORM\Column(name: 'sn_credito', type: TinyIntType::NAME, nullable: true)]
    private ?int $snCredito = null;

    #[ORM\Column(name: 'nr_minimo_coordenador', type: 'smallint', nullable: true)]
    private ?int $nrMinimoCoordenador = null;

    #[ORM\Column(name: 'nr_maximo_coordenador', type: 'smallint', nullable: true)]
    private ?int $nrMaximoCoordenador = null;

    #[ORM\Column(name: 'dt_fim_conferencia_questao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimConferenciaQuestao = null;

    #[ORM\Column(name: 'SN_ATRIBUIR_NOTAS_PARCIAIS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAtribuirNotasParciais = 0;

    #[ORM\Column(name: 'NR_ETAPA_NOTAS_PARCIAIS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $nrEtapaNotasParciais = 1;

    // Sem construtor: 25 propriedades. Use os setters encadeados.

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDtInicioCadastro(): ?\DateTimeInterface
    {
        return $this->dtInicioCadastro;
    }

    public function setDtInicioCadastro(?\DateTimeInterface $dtInicioCadastro): self
    {
        $this->dtInicioCadastro = $dtInicioCadastro;
        return $this;
    }

    public function getDtFimCadastro(): ?\DateTimeInterface
    {
        return $this->dtFimCadastro;
    }

    public function setDtFimCadastro(?\DateTimeInterface $dtFimCadastro): self
    {
        $this->dtFimCadastro = $dtFimCadastro;
        return $this;
    }

    public function getDtProva(): ?\DateTimeInterface
    {
        return $this->dtProva;
    }

    public function setDtProva(?\DateTimeInterface $dtProva): self
    {
        $this->dtProva = $dtProva;
        return $this;
    }

    public function getDtDivulgacao(): ?\DateTimeInterface
    {
        return $this->dtDivulgacao;
    }

    public function setDtDivulgacao(?\DateTimeInterface $dtDivulgacao): self
    {
        $this->dtDivulgacao = $dtDivulgacao;
        return $this;
    }

    public function getNrQuestoesMinimoProfessor(): ?int
    {
        return $this->nrQuestoesMinimoProfessor;
    }

    public function setNrQuestoesMinimoProfessor(?int $nrQuestoesMinimoProfessor): self
    {
        $this->nrQuestoesMinimoProfessor = $nrQuestoesMinimoProfessor;
        return $this;
    }

    public function getNrQuestoesMinimoProva(): ?int
    {
        return $this->nrQuestoesMinimoProva;
    }

    public function setNrQuestoesMinimoProva(?int $nrQuestoesMinimoProva): self
    {
        $this->nrQuestoesMinimoProva = $nrQuestoesMinimoProva;
        return $this;
    }

    public function getNrQuestoesDisciplinas(): ?int
    {
        return $this->nrQuestoesDisciplinas;
    }

    public function setNrQuestoesDisciplinas(?int $nrQuestoesDisciplinas): self
    {
        $this->nrQuestoesDisciplinas = $nrQuestoesDisciplinas;
        return $this;
    }

    public function getSnFinalizada(): ?int
    {
        return $this->snFinalizada;
    }

    public function setSnFinalizada(?int $snFinalizada): self
    {
        $this->snFinalizada = $snFinalizada;
        return $this;
    }

    public function getCdAvaliacaoInstitucional(): ?int
    {
        return $this->cdAvaliacaoInstitucional;
    }

    public function setCdAvaliacaoInstitucional(?int $cdAvaliacaoInstitucional): self
    {
        $this->cdAvaliacaoInstitucional = $cdAvaliacaoInstitucional;
        return $this;
    }

    public function getVlPesoPi(): ?float
    {
        return $this->vlPesoPi;
    }

    public function setVlPesoPi(?float $vlPesoPi): self
    {
        $this->vlPesoPi = $vlPesoPi;
        return $this;
    }

    public function getVlPesoAi(): ?float
    {
        return $this->vlPesoAi;
    }

    public function setVlPesoAi(?float $vlPesoAi): self
    {
        $this->vlPesoAi = $vlPesoAi;
        return $this;
    }

    public function getVlPesoMedia(): ?float
    {
        return $this->vlPesoMedia;
    }

    public function setVlPesoMedia(?float $vlPesoMedia): self
    {
        $this->vlPesoMedia = $vlPesoMedia;
        return $this;
    }

    public function getDtUltimaGeracaoPrimeira(): ?\DateTimeInterface
    {
        return $this->dtUltimaGeracaoPrimeira;
    }

    public function setDtUltimaGeracaoPrimeira(?\DateTimeInterface $dtUltimaGeracaoPrimeira): self
    {
        $this->dtUltimaGeracaoPrimeira = $dtUltimaGeracaoPrimeira;
        return $this;
    }

    public function getCdUsuarioGeracaoPrimeira(): ?int
    {
        return $this->cdUsuarioGeracaoPrimeira;
    }

    public function setCdUsuarioGeracaoPrimeira(?int $cdUsuarioGeracaoPrimeira): self
    {
        $this->cdUsuarioGeracaoPrimeira = $cdUsuarioGeracaoPrimeira;
        return $this;
    }

    public function getDtUltimaGeracaoSegunda(): ?\DateTimeInterface
    {
        return $this->dtUltimaGeracaoSegunda;
    }

    public function setDtUltimaGeracaoSegunda(?\DateTimeInterface $dtUltimaGeracaoSegunda): self
    {
        $this->dtUltimaGeracaoSegunda = $dtUltimaGeracaoSegunda;
        return $this;
    }

    public function getCdUsuarioGeracaoSegunda(): ?int
    {
        return $this->cdUsuarioGeracaoSegunda;
    }

    public function setCdUsuarioGeracaoSegunda(?int $cdUsuarioGeracaoSegunda): self
    {
        $this->cdUsuarioGeracaoSegunda = $cdUsuarioGeracaoSegunda;
        return $this;
    }

    public function getSnAtribuirNotaAutomatico(): int
    {
        return $this->snAtribuirNotaAutomatico;
    }

    public function setSnAtribuirNotaAutomatico(int $snAtribuirNotaAutomatico): self
    {
        $this->snAtribuirNotaAutomatico = $snAtribuirNotaAutomatico;
        return $this;
    }

    public function getSnCredito(): ?int
    {
        return $this->snCredito;
    }

    public function setSnCredito(?int $snCredito): self
    {
        $this->snCredito = $snCredito;
        return $this;
    }

    public function getNrMinimoCoordenador(): ?int
    {
        return $this->nrMinimoCoordenador;
    }

    public function setNrMinimoCoordenador(?int $nrMinimoCoordenador): self
    {
        $this->nrMinimoCoordenador = $nrMinimoCoordenador;
        return $this;
    }

    public function getNrMaximoCoordenador(): ?int
    {
        return $this->nrMaximoCoordenador;
    }

    public function setNrMaximoCoordenador(?int $nrMaximoCoordenador): self
    {
        $this->nrMaximoCoordenador = $nrMaximoCoordenador;
        return $this;
    }

    public function getDtFimConferenciaQuestao(): ?\DateTimeInterface
    {
        return $this->dtFimConferenciaQuestao;
    }

    public function setDtFimConferenciaQuestao(?\DateTimeInterface $dtFimConferenciaQuestao): self
    {
        $this->dtFimConferenciaQuestao = $dtFimConferenciaQuestao;
        return $this;
    }

    public function getSnAtribuirNotasParciais(): int
    {
        return $this->snAtribuirNotasParciais;
    }

    public function setSnAtribuirNotasParciais(int $snAtribuirNotasParciais): self
    {
        $this->snAtribuirNotasParciais = $snAtribuirNotasParciais;
        return $this;
    }

    public function getNrEtapaNotasParciais(): int
    {
        return $this->nrEtapaNotasParciais;
    }

    public function setNrEtapaNotasParciais(int $nrEtapaNotasParciais): self
    {
        $this->nrEtapaNotasParciais = $nrEtapaNotasParciais;
        return $this;
    }
}
