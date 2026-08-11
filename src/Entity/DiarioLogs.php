<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioLogsRepository::class)]
#[ORM\Table(
    name: 'diario_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'codigo', columns: ['codigo'])]
#[ORM\Index(name: 'codigo_2', columns: ['codigo'])]
#[ORM\Index(name: 'idxDtlog', columns: ['dt_log'])]
#[ORM\Index(name: 'idxProfessor', columns: ['cd_professor'])]
class DiarioLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer')]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_atividade', type: 'integer')]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'cd_log_pai', type: 'integer', nullable: true)]
    private ?int $cdLogPai = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer')]
    private ?int $cdProfessor = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdAcao = null,
        ?int $cdAtividade = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $descricao = null,
        ?int $cdLogPai = null,
        ?int $cdProfessor = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdAcao = $cdAcao;
        $this->cdAtividade = $cdAtividade;
        $this->dtLog = $dtLog;
        $this->descricao = $descricao;
        $this->cdLogPai = $cdLogPai;
        $this->cdProfessor = $cdProfessor;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
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

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?int $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getCdLogPai(): ?int
    {
        return $this->cdLogPai;
    }

    public function setCdLogPai(?int $cdLogPai): self
    {
        $this->cdLogPai = $cdLogPai;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }
}
