<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\HistoricoEscolasGrauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoricoEscolasGrauRepository::class)]
#[ORM\Table(
    name: 'historico_escolas_grau',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CODIGOALUNO_GRAU', columns: ['codigoaluno', 'grau'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_GRAU', columns: ['grau'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
class HistoricoEscolasGrau
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Column(name: 'grau', type: 'smallint', options: ['default' => '0'])]
    private int $grau = 0;

    #[ORM\Column(name: 'ano', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $ano = 0;

    #[ORM\Column(name: 'ds_escola', type: 'string', length: 150, nullable: true)]
    private ?string $dsEscola = null;

    #[ORM\Column(name: 'ds_escola_cidade', type: 'string', length: 40, nullable: true)]
    private ?string $dsEscolaCidade = null;

    #[ORM\Column(name: 'ds_escola_estado', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsEscolaEstado = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 100, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'sn_automatico', type: 'boolean', nullable: true)]
    private ?bool $snAutomatico = null;

    #[ORM\Column(name: 'NR_MES_CONCLUSAO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrMesConclusao = null;

    public function __construct(
        int $codigoaluno = 0,
        int $grau = 0,
        int $ano = 0,
        ?string $dsEscola = null,
        ?string $dsEscolaCidade = null,
        ?string $dsEscolaEstado = null,
        ?string $dsCurso = null,
        ?int $cdInstituicao = null,
        ?bool $snAutomatico = null,
        ?int $nrMesConclusao = null
    ) {
        $this->codigoaluno = $codigoaluno;
        $this->grau = $grau;
        $this->ano = $ano;
        $this->dsEscola = $dsEscola;
        $this->dsEscolaCidade = $dsEscolaCidade;
        $this->dsEscolaEstado = $dsEscolaEstado;
        $this->dsCurso = $dsCurso;
        $this->cdInstituicao = $cdInstituicao;
        $this->snAutomatico = $snAutomatico;
        $this->nrMesConclusao = $nrMesConclusao;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getGrau(): int
    {
        return $this->grau;
    }

    public function setGrau(int $grau): self
    {
        $this->grau = $grau;
        return $this;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;
        return $this;
    }

    public function getDsEscola(): ?string
    {
        return $this->dsEscola;
    }

    public function setDsEscola(?string $dsEscola): self
    {
        $this->dsEscola = $dsEscola;
        return $this;
    }

    public function getDsEscolaCidade(): ?string
    {
        return $this->dsEscolaCidade;
    }

    public function setDsEscolaCidade(?string $dsEscolaCidade): self
    {
        $this->dsEscolaCidade = $dsEscolaCidade;
        return $this;
    }

    public function getDsEscolaEstado(): ?string
    {
        return $this->dsEscolaEstado;
    }

    public function setDsEscolaEstado(?string $dsEscolaEstado): self
    {
        $this->dsEscolaEstado = $dsEscolaEstado;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function isSnAutomatico(): ?bool
    {
        return $this->snAutomatico;
    }

    public function setSnAutomatico(?bool $snAutomatico): self
    {
        $this->snAutomatico = $snAutomatico;
        return $this;
    }

    public function getNrMesConclusao(): ?int
    {
        return $this->nrMesConclusao;
    }

    public function setNrMesConclusao(?int $nrMesConclusao): self
    {
        $this->nrMesConclusao = $nrMesConclusao;
        return $this;
    }
}
