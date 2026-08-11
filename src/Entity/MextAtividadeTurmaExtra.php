<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\MextAtividadeTurmaExtraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextAtividadeTurmaExtraRepository::class)]
#[ORM\Table(
    name: 'mext_atividade_turma_extra',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_atividade', columns: ['cd_atividade', 'cd_processo'])]
#[ORM\Index(name: 'nr_anosemestre', columns: ['nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_CATEGORIA_FILTRO', columns: ['cd_categoria_filtro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_atividade_turma_extra_ibfk_1', 'colunas' => ['cd_atividade', 'cd_processo'], 'tabelaAlvo' => 'mext_processo_atividade', 'colunasAlvo' => ['cd_atividade', 'cd_processo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_atividade_turma_extra_ibfk_2', 'colunas' => ['nr_anosemestre', 'cd_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['anosemestre', 'codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextAtividadeTurmaExtra
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atividade_turma_extra', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAtividadeTurmaExtra = null;

    #[ORM\ManyToOne(targetEntity: MextProcessoAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    #[ORM\JoinColumn(name: 'cd_processo', referencedColumnName: 'cd_processo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextProcessoAtividade $cdAtividade = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'ds_sexo', type: 'string', length: 1, options: ['fixed' => true])]
    private ?string $dsSexo = null;

    #[ORM\Column(name: 'sn_idade', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snIdade = null;

    #[ORM\Column(name: 'nr_idade_inicial', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrIdadeInicial = null;

    #[ORM\Column(name: 'nr_idade_final', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrIdadeFinal = null;

    #[ORM\Column(name: 'cd_categoria_filtro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCategoriaFiltro = null;

    public function __construct(
        ?MextProcessoAtividade $cdAtividade = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?string $dsSexo = null,
        ?int $snIdade = null,
        ?int $nrIdadeInicial = null,
        ?int $nrIdadeFinal = null,
        ?int $cdCategoriaFiltro = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->dsSexo = $dsSexo;
        $this->snIdade = $snIdade;
        $this->nrIdadeInicial = $nrIdadeInicial;
        $this->nrIdadeFinal = $nrIdadeFinal;
        $this->cdCategoriaFiltro = $cdCategoriaFiltro;
    }

    public function getCdAtividadeTurmaExtra(): ?int
    {
        return $this->cdAtividadeTurmaExtra;
    }

    public function getCdAtividade(): ?MextProcessoAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?MextProcessoAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getDsSexo(): ?string
    {
        return $this->dsSexo;
    }

    public function setDsSexo(?string $dsSexo): self
    {
        $this->dsSexo = $dsSexo;
        return $this;
    }

    public function getSnIdade(): ?int
    {
        return $this->snIdade;
    }

    public function setSnIdade(?int $snIdade): self
    {
        $this->snIdade = $snIdade;
        return $this;
    }

    public function getNrIdadeInicial(): ?int
    {
        return $this->nrIdadeInicial;
    }

    public function setNrIdadeInicial(?int $nrIdadeInicial): self
    {
        $this->nrIdadeInicial = $nrIdadeInicial;
        return $this;
    }

    public function getNrIdadeFinal(): ?int
    {
        return $this->nrIdadeFinal;
    }

    public function setNrIdadeFinal(?int $nrIdadeFinal): self
    {
        $this->nrIdadeFinal = $nrIdadeFinal;
        return $this;
    }

    public function getCdCategoriaFiltro(): ?int
    {
        return $this->cdCategoriaFiltro;
    }

    public function setCdCategoriaFiltro(?int $cdCategoriaFiltro): self
    {
        $this->cdCategoriaFiltro = $cdCategoriaFiltro;
        return $this;
    }
}
