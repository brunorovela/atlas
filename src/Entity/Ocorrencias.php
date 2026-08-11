<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\OcorrenciasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasRepository::class)]
#[ORM\Table(
    name: 'ocorrencias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'tabela de ocorrencias']
)]
#[ORM\UniqueConstraint(name: 'cd_ocorrencia', columns: ['cd_ocorrencia'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
#[ORM\Index(name: 'IX_CD_CARTA', columns: ['cd_carta'])]
class Ocorrencias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOcorrencia = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_aluno_destino', type: 'integer', options: ['default' => '0'])]
    private int $cdAlunoDestino = 0;

    #[ORM\Column(name: 'cd_aluno_ocorrencia', type: 'integer', nullable: true)]
    private ?int $cdAlunoOcorrencia = null;

    #[ORM\Column(name: 'ds_ocorrencia', type: 'text', length: 16777215)]
    private ?string $dsOcorrencia = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdDisciplina = 0;

    #[ORM\Column(name: 'turmamat', type: 'string', length: 50)]
    private ?string $turmamat = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $nrAnosemestre = 0;

    #[ORM\Column(name: 'sn_liberado', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snLiberado = 'N';

    #[ORM\Column(name: 'cd_professor', type: 'integer', options: ['default' => '0'])]
    private int $cdProfessor = 0;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'dt_lancamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLancamento = null;

    #[ORM\Column(name: 'cd_situacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdSituacao = 0;

    #[ORM\Column(name: 'cd_carta', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCarta = null;

    #[ORM\Column(name: 'sn_parecer', type: 'smallint', options: ['default' => '0'])]
    private int $snParecer = 0;

    #[ORM\Column(name: 'sn_email', type: 'smallint', options: ['default' => '0'])]
    private int $snEmail = 0;

    #[ORM\Column(name: 'sn_carta', type: 'smallint', options: ['default' => '0'])]
    private int $snCarta = 0;

    #[ORM\Column(name: 'ds_papel_grupo', type: 'string', length: 15, nullable: true, options: ['default' => 'ALUNO'])]
    private ?string $dsPapelGrupo = 'ALUNO';

    #[ORM\Column(name: 'tp_enviou_coordenacao', type: 'boolean', nullable: true, options: ['default' => '0', 'comment' => '1 = auxiliar de coordenação 2 = coordenado 3 = Direção 0=professor'])]
    private ?bool $tpEnviouCoordenacao = false;

    #[ORM\Column(name: 'sn_interno', type: 'smallint')]
    private ?int $snInterno = null;

    #[ORM\Column(name: 'dt_baixa', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBaixa = null;

    // Sem construtor: 21 propriedades. Use os setters encadeados.

    public function getCdOcorrencia(): ?int
    {
        return $this->cdOcorrencia;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdAlunoDestino(): int
    {
        return $this->cdAlunoDestino;
    }

    public function setCdAlunoDestino(int $cdAlunoDestino): self
    {
        $this->cdAlunoDestino = $cdAlunoDestino;
        return $this;
    }

    public function getCdAlunoOcorrencia(): ?int
    {
        return $this->cdAlunoOcorrencia;
    }

    public function setCdAlunoOcorrencia(?int $cdAlunoOcorrencia): self
    {
        $this->cdAlunoOcorrencia = $cdAlunoOcorrencia;
        return $this;
    }

    public function getDsOcorrencia(): ?string
    {
        return $this->dsOcorrencia;
    }

    public function setDsOcorrencia(?string $dsOcorrencia): self
    {
        $this->dsOcorrencia = $dsOcorrencia;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getTurmamat(): ?string
    {
        return $this->turmamat;
    }

    public function setTurmamat(?string $turmamat): self
    {
        $this->turmamat = $turmamat;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getSnLiberado(): string
    {
        return $this->snLiberado;
    }

    public function setSnLiberado(string $snLiberado): self
    {
        $this->snLiberado = $snLiberado;
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

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getDtLancamento(): ?\DateTimeInterface
    {
        return $this->dtLancamento;
    }

    public function setDtLancamento(?\DateTimeInterface $dtLancamento): self
    {
        $this->dtLancamento = $dtLancamento;
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

    public function getCdCarta(): ?int
    {
        return $this->cdCarta;
    }

    public function setCdCarta(?int $cdCarta): self
    {
        $this->cdCarta = $cdCarta;
        return $this;
    }

    public function getSnParecer(): int
    {
        return $this->snParecer;
    }

    public function setSnParecer(int $snParecer): self
    {
        $this->snParecer = $snParecer;
        return $this;
    }

    public function getSnEmail(): int
    {
        return $this->snEmail;
    }

    public function setSnEmail(int $snEmail): self
    {
        $this->snEmail = $snEmail;
        return $this;
    }

    public function getSnCarta(): int
    {
        return $this->snCarta;
    }

    public function setSnCarta(int $snCarta): self
    {
        $this->snCarta = $snCarta;
        return $this;
    }

    public function getDsPapelGrupo(): ?string
    {
        return $this->dsPapelGrupo;
    }

    public function setDsPapelGrupo(?string $dsPapelGrupo): self
    {
        $this->dsPapelGrupo = $dsPapelGrupo;
        return $this;
    }

    public function isTpEnviouCoordenacao(): ?bool
    {
        return $this->tpEnviouCoordenacao;
    }

    public function setTpEnviouCoordenacao(?bool $tpEnviouCoordenacao): self
    {
        $this->tpEnviouCoordenacao = $tpEnviouCoordenacao;
        return $this;
    }

    public function getSnInterno(): ?int
    {
        return $this->snInterno;
    }

    public function setSnInterno(?int $snInterno): self
    {
        $this->snInterno = $snInterno;
        return $this;
    }

    public function getDtBaixa(): ?\DateTimeInterface
    {
        return $this->dtBaixa;
    }

    public function setDtBaixa(?\DateTimeInterface $dtBaixa): self
    {
        $this->dtBaixa = $dtBaixa;
        return $this;
    }
}
