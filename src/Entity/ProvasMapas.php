<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProvasMapasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvasMapasRepository::class)]
#[ORM\Table(
    name: 'provas_mapas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_provas_mapas', columns: ['cd_provas_mapas'])]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['cd_pessoa', 'cd_posicao', 'cd_prova'])]
#[ORM\UniqueConstraint(name: 'idxChaveMapa', columns: ['cd_chave_mapa'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_POSICAO', columns: ['cd_posicao'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_CHAVE_MAPA', columns: ['cd_chave_mapa'])]
#[ORM\Index(name: 'IX_DS_TIPO', columns: ['ds_tipo'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'], options: ['lengths' => [20]])]
class ProvasMapas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_provas_mapas', type: 'integer')]
    private ?int $cdProvasMapas = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_dec', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDec = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'cd_posicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPosicao = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 2, nullable: true, options: ['fixed' => true])]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'sn_resposta', type: 'boolean', nullable: true)]
    private ?bool $snResposta = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 32, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_situacao', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'cd_chave_mapa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdChaveMapa = null;

    public function __construct(
        ?int $cdProva = null,
        ?int $cdDec = null,
        ?int $cdPessoa = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null,
        ?int $cdPosicao = null,
        ?string $dsTipo = null,
        ?bool $snResposta = null,
        ?string $dsChave = null,
        ?int $cdSituacao = null,
        ?int $cdChaveMapa = null
    ) {
        $this->cdProva = $cdProva;
        $this->cdDec = $cdDec;
        $this->cdPessoa = $cdPessoa;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdPosicao = $cdPosicao;
        $this->dsTipo = $dsTipo;
        $this->snResposta = $snResposta;
        $this->dsChave = $dsChave;
        $this->cdSituacao = $cdSituacao;
        $this->cdChaveMapa = $cdChaveMapa;
    }

    public function getCdProvasMapas(): ?int
    {
        return $this->cdProvasMapas;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdDec(): ?int
    {
        return $this->cdDec;
    }

    public function setCdDec(?int $cdDec): self
    {
        $this->cdDec = $cdDec;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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

    public function getCdPosicao(): ?int
    {
        return $this->cdPosicao;
    }

    public function setCdPosicao(?int $cdPosicao): self
    {
        $this->cdPosicao = $cdPosicao;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function isSnResposta(): ?bool
    {
        return $this->snResposta;
    }

    public function setSnResposta(?bool $snResposta): self
    {
        $this->snResposta = $snResposta;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdChaveMapa(): ?int
    {
        return $this->cdChaveMapa;
    }

    public function setCdChaveMapa(?int $cdChaveMapa): self
    {
        $this->cdChaveMapa = $cdChaveMapa;
        return $this;
    }
}
