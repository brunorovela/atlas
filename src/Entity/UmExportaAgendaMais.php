<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UmExportaAgendaMaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UmExportaAgendaMaisRepository::class)]
#[ORM\Table(
    name: 'um_exporta_agenda_mais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UmExportaAgendaMais
{
    #[ORM\Id]
    #[ORM\Column(name: 'ra_aluno', type: 'string', length: 11)]
    private ?string $raAluno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nome_responsavel', type: 'string', length: 128)]
    private ?string $nomeResponsavel = null;

    #[ORM\Id]
    #[ORM\Column(name: 'marca', type: 'string', length: 128)]
    private ?string $marca = null;

    #[ORM\Column(name: 'unidade', type: 'string', length: 128, nullable: true)]
    private ?string $unidade = null;

    #[ORM\Column(name: 'anoletivo', type: 'string', length: 4, options: ['default' => ''])]
    private string $anoletivo = '';

    #[ORM\Column(name: 'segmento', type: 'string', length: 128, nullable: true)]
    private ?string $segmento = null;

    #[ORM\Column(name: 'serie', type: 'string', length: 20, options: ['default' => '0'])]
    private string $serie = '0';

    #[ORM\Column(name: 'turma', type: 'string', length: 128, nullable: true)]
    private ?string $turma = null;

    #[ORM\Column(name: 'nome_aluno', type: 'string', length: 128, nullable: true)]
    private ?string $nomeAluno = null;

    #[ORM\Column(name: 'sobrenome', type: 'string', length: 128, nullable: true)]
    private ?string $sobrenome = null;

    #[ORM\Column(name: 'Login_Aluno', type: 'string', length: 100, nullable: true)]
    private ?string $loginAluno = null;

    #[ORM\Column(name: 'perfil', type: 'string', length: 33, options: ['default' => ''])]
    private string $perfil = '';

    #[ORM\Column(name: 'sobrenome_resp', type: 'string', length: 128, nullable: true)]
    private ?string $sobrenomeResp = null;

    #[ORM\Column(name: 'login', type: 'string', length: 100, nullable: true)]
    private ?string $login = null;

    #[ORM\Column(name: 'senha', type: 'string', length: 11, options: ['default' => ''])]
    private string $senha = '';

    #[ORM\Column(name: 'cod_coligada', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $codColigada = 1;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'id_curso', type: 'integer')]
    private ?int $idCurso = null;

    #[ORM\Column(name: 'cod_turma', type: 'string', length: 50)]
    private ?string $codTurma = null;

    #[ORM\Column(name: 'cod_situacao', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $codSituacao = 0;

    public function __construct(
        ?string $raAluno = null,
        ?string $nomeResponsavel = null,
        ?string $marca = null,
        ?string $unidade = null,
        string $anoletivo = '',
        ?string $segmento = null,
        string $serie = '0',
        ?string $turma = null,
        ?string $nomeAluno = null,
        ?string $sobrenome = null,
        ?string $loginAluno = null,
        string $perfil = '',
        ?string $sobrenomeResp = null,
        ?string $login = null,
        string $senha = '',
        int $codColigada = 1,
        ?int $nrAnosemestre = null,
        ?int $idCurso = null,
        ?string $codTurma = null,
        ?int $codSituacao = 0
    ) {
        $this->raAluno = $raAluno;
        $this->nomeResponsavel = $nomeResponsavel;
        $this->marca = $marca;
        $this->unidade = $unidade;
        $this->anoletivo = $anoletivo;
        $this->segmento = $segmento;
        $this->serie = $serie;
        $this->turma = $turma;
        $this->nomeAluno = $nomeAluno;
        $this->sobrenome = $sobrenome;
        $this->loginAluno = $loginAluno;
        $this->perfil = $perfil;
        $this->sobrenomeResp = $sobrenomeResp;
        $this->login = $login;
        $this->senha = $senha;
        $this->codColigada = $codColigada;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->idCurso = $idCurso;
        $this->codTurma = $codTurma;
        $this->codSituacao = $codSituacao;
    }

    public function getRaAluno(): ?string
    {
        return $this->raAluno;
    }

    public function setRaAluno(?string $raAluno): self
    {
        $this->raAluno = $raAluno;
        return $this;
    }

    public function getNomeResponsavel(): ?string
    {
        return $this->nomeResponsavel;
    }

    public function setNomeResponsavel(?string $nomeResponsavel): self
    {
        $this->nomeResponsavel = $nomeResponsavel;
        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(?string $marca): self
    {
        $this->marca = $marca;
        return $this;
    }

    public function getUnidade(): ?string
    {
        return $this->unidade;
    }

    public function setUnidade(?string $unidade): self
    {
        $this->unidade = $unidade;
        return $this;
    }

    public function getAnoletivo(): string
    {
        return $this->anoletivo;
    }

    public function setAnoletivo(string $anoletivo): self
    {
        $this->anoletivo = $anoletivo;
        return $this;
    }

    public function getSegmento(): ?string
    {
        return $this->segmento;
    }

    public function setSegmento(?string $segmento): self
    {
        $this->segmento = $segmento;
        return $this;
    }

    public function getSerie(): string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;
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

    public function getNomeAluno(): ?string
    {
        return $this->nomeAluno;
    }

    public function setNomeAluno(?string $nomeAluno): self
    {
        $this->nomeAluno = $nomeAluno;
        return $this;
    }

    public function getSobrenome(): ?string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(?string $sobrenome): self
    {
        $this->sobrenome = $sobrenome;
        return $this;
    }

    public function getLoginAluno(): ?string
    {
        return $this->loginAluno;
    }

    public function setLoginAluno(?string $loginAluno): self
    {
        $this->loginAluno = $loginAluno;
        return $this;
    }

    public function getPerfil(): string
    {
        return $this->perfil;
    }

    public function setPerfil(string $perfil): self
    {
        $this->perfil = $perfil;
        return $this;
    }

    public function getSobrenomeResp(): ?string
    {
        return $this->sobrenomeResp;
    }

    public function setSobrenomeResp(?string $sobrenomeResp): self
    {
        $this->sobrenomeResp = $sobrenomeResp;
        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;
        return $this;
    }

    public function getCodColigada(): int
    {
        return $this->codColigada;
    }

    public function setCodColigada(int $codColigada): self
    {
        $this->codColigada = $codColigada;
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

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
    }

    public function setIdCurso(?int $idCurso): self
    {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function getCodTurma(): ?string
    {
        return $this->codTurma;
    }

    public function setCodTurma(?string $codTurma): self
    {
        $this->codTurma = $codTurma;
        return $this;
    }

    public function getCodSituacao(): ?int
    {
        return $this->codSituacao;
    }

    public function setCodSituacao(?int $codSituacao): self
    {
        $this->codSituacao = $codSituacao;
        return $this;
    }
}
