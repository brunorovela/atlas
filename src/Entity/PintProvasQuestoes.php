<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PintProvasQuestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProvasQuestoesRepository::class)]
#[ORM\Table(
    name: 'pint_provas_questoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PROVAS_QUESTOES_CD_DISC_CD_CURSO_DISCIPLINAS_CD_DIS_CD_CURSO', columns: ['CD_DISCIPLINA', 'CD_CURSO'])]
#[ORM\Index(name: 'FK_PROVAS_QUESTOES_CD_PROVA_PROVAS_CD_PROVA', columns: ['CD_PROVA'])]
#[ORM\Index(name: 'IDX_5AE64A566D81CFAF', columns: ['CD_QUESTAO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PROVAS_QUESTOES_CD_DISC_CD_CURSO_DISCIPLINAS_CD_DIS_CD_CURSO', 'colunas' => ['CD_DISCIPLINA', 'CD_CURSO'], 'tabelaAlvo' => 'disciplinas', 'colunasAlvo' => ['codigo', 'curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PROVAS_QUESTOES_CD_PROVA_PROVAS_CD_PROVA', 'colunas' => ['CD_PROVA'], 'tabelaAlvo' => 'pint_provas', 'colunasAlvo' => ['cd_prova'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PROVAS_QUESTOES_CD_QUESTAO_QUESTOES_CD_QUESTAO', 'colunas' => ['CD_QUESTAO'], 'tabelaAlvo' => 'pint_questoes', 'colunasAlvo' => ['cd_questao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PintProvasQuestoes
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PintQuestoes::class)]
    #[ORM\JoinColumn(name: 'CD_QUESTAO', referencedColumnName: 'cd_questao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PintQuestoes $cdQuestao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_DISCIPLINA', type: 'integer')]
    private ?int $cdDisciplina = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PintProvas::class)]
    #[ORM\JoinColumn(name: 'CD_PROVA', referencedColumnName: 'cd_prova', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PintProvas $cdProva = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_CURSO', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'SN_APROVADO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAprovado = 1;

    #[ORM\Column(name: 'SN_SELECIONADA_PRIMEIRA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snSelecionadaPrimeira = 0;

    #[ORM\Column(name: 'SN_SELECIONADA_SEGUNDA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snSelecionadaSegunda = 0;

    public function __construct(
        ?PintQuestoes $cdQuestao = null,
        ?int $cdDisciplina = null,
        ?PintProvas $cdProva = null,
        ?string $cdCurso = null,
        int $snAprovado = 1,
        int $snSelecionadaPrimeira = 0,
        int $snSelecionadaSegunda = 0
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdDisciplina = $cdDisciplina;
        $this->cdProva = $cdProva;
        $this->cdCurso = $cdCurso;
        $this->snAprovado = $snAprovado;
        $this->snSelecionadaPrimeira = $snSelecionadaPrimeira;
        $this->snSelecionadaSegunda = $snSelecionadaSegunda;
    }

    public function getCdQuestao(): ?PintQuestoes
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?PintQuestoes $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
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

    public function getCdProva(): ?PintProvas
    {
        return $this->cdProva;
    }

    public function setCdProva(?PintProvas $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getSnAprovado(): int
    {
        return $this->snAprovado;
    }

    public function setSnAprovado(int $snAprovado): self
    {
        $this->snAprovado = $snAprovado;
        return $this;
    }

    public function getSnSelecionadaPrimeira(): int
    {
        return $this->snSelecionadaPrimeira;
    }

    public function setSnSelecionadaPrimeira(int $snSelecionadaPrimeira): self
    {
        $this->snSelecionadaPrimeira = $snSelecionadaPrimeira;
        return $this;
    }

    public function getSnSelecionadaSegunda(): int
    {
        return $this->snSelecionadaSegunda;
    }

    public function setSnSelecionadaSegunda(int $snSelecionadaSegunda): self
    {
        $this->snSelecionadaSegunda = $snSelecionadaSegunda;
        return $this;
    }
}
