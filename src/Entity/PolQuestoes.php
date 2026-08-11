<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PolQuestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolQuestoesRepository::class)]
#[ORM\Table(
    name: 'pol_questoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL', columns: ['cd_responsavel'])]
#[ORM\Index(name: 'IX_CD_NIVEL', columns: ['cd_nivel'])]
#[ORM\Index(name: 'IX_CD_ALTERNATIVA_CORRETA', columns: ['cd_alternativa_certa'])]
class PolQuestoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true)]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255, nullable: true)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'cd_nivel', type: 'integer', nullable: true)]
    private ?int $cdNivel = null;

    #[ORM\Column(name: 'cd_alternativa_certa', type: 'integer', nullable: true)]
    private ?int $cdAlternativaCerta = null;

    #[ORM\Column(name: 'ds_questao', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsQuestao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'sn_discursiva', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snDiscursiva = false;

    public function __construct(
        ?int $cdResponsavel = null,
        ?string $cdDisciplinaPai = null,
        ?int $cdNivel = null,
        ?int $cdAlternativaCerta = null,
        ?string $dsQuestao = null,
        ?int $snAtivo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?bool $snDiscursiva = false
    ) {
        $this->cdResponsavel = $cdResponsavel;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->cdNivel = $cdNivel;
        $this->cdAlternativaCerta = $cdAlternativaCerta;
        $this->dsQuestao = $dsQuestao;
        $this->snAtivo = $snAtivo;
        $this->dtCadastro = $dtCadastro;
        $this->snDiscursiva = $snDiscursiva;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
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

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getCdNivel(): ?int
    {
        return $this->cdNivel;
    }

    public function setCdNivel(?int $cdNivel): self
    {
        $this->cdNivel = $cdNivel;
        return $this;
    }

    public function getCdAlternativaCerta(): ?int
    {
        return $this->cdAlternativaCerta;
    }

    public function setCdAlternativaCerta(?int $cdAlternativaCerta): self
    {
        $this->cdAlternativaCerta = $cdAlternativaCerta;
        return $this;
    }

    public function getDsQuestao(): ?string
    {
        return $this->dsQuestao;
    }

    public function setDsQuestao(?string $dsQuestao): self
    {
        $this->dsQuestao = $dsQuestao;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

    public function isSnDiscursiva(): ?bool
    {
        return $this->snDiscursiva;
    }

    public function setSnDiscursiva(?bool $snDiscursiva): self
    {
        $this->snDiscursiva = $snDiscursiva;
        return $this;
    }
}
