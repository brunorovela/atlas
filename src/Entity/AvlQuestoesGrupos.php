<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvlQuestoesGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlQuestoesGruposRepository::class)]
#[ORM\Table(
    name: 'avl_questoes_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Grupo de quest?es de uma avalia??o']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_REPETICAO', columns: ['cd_repeticao'])]
#[ORM\Index(name: 'IX_CD_FILTRO_RESOLUCAO', columns: ['cd_filtro_resolucao'])]
class AvlQuestoesGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', options: ['default' => '0'])]
    private int $cdAvaliacao = 0;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsGrupo = '';

    #[ORM\Column(name: 'ds_anosemestre_resolucao', type: 'string', length: 10, nullable: true, options: ['fixed' => true])]
    private ?string $dsAnosemestreResolucao = null;

    #[ORM\Column(name: 'ds_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['default' => '0'])]
    private int $nrOrdem = 0;

    #[ORM\Column(name: 'cd_enumeracao', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdEnumeracao = 1;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'cd_repeticao', type: 'integer', options: ['default' => '0'])]
    private int $cdRepeticao = 0;

    #[ORM\Column(name: 'ds_anosemestre_repeticao', type: 'string', length: 10, nullable: true, options: ['fixed' => true])]
    private ?string $dsAnosemestreRepeticao = null;

    #[ORM\Column(name: 'ds_nome_questoes_backup', type: 'string', length: 50, nullable: true, options: ['comment' => 'Backup dos valores anteriores de enumeração dos grupos de questões'])]
    private ?string $dsNomeQuestoesBackup = null;

    #[ORM\Column(name: 'ds_filtros_repeticao_backup', type: 'string', length: 255, nullable: true, options: ['comment' => 'Backup dos valores anteriores de filtro de repetição das questões'])]
    private ?string $dsFiltrosRepeticaoBackup = null;

    #[ORM\Column(name: 'cd_filtro_resolucao', type: TinyIntType::NAME, nullable: true, options: ['default' => '1', 'comment' => 'Filtro de turmas para a resolução da avaliação, onde (1 - Todos, 2 - Grupo Definido)'])]
    private ?int $cdFiltroResolucao = 1;

    #[ORM\Column(name: 'sn_todas_disciplinas', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snTodasDisciplinas = true;

    #[ORM\Column(name: 'nr_disciplinas_repeticao', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $nrDisciplinasRepeticao = 1;

    public function __construct(
        int $cdAvaliacao = 0,
        string $dsGrupo = '',
        ?string $dsAnosemestreResolucao = null,
        ?string $dsObservacoes = null,
        int $nrOrdem = 0,
        ?int $cdEnumeracao = 1,
        bool $snDisponivel = true,
        int $cdRepeticao = 0,
        ?string $dsAnosemestreRepeticao = null,
        ?string $dsNomeQuestoesBackup = null,
        ?string $dsFiltrosRepeticaoBackup = null,
        ?int $cdFiltroResolucao = 1,
        ?bool $snTodasDisciplinas = true,
        ?int $nrDisciplinasRepeticao = 1
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->dsGrupo = $dsGrupo;
        $this->dsAnosemestreResolucao = $dsAnosemestreResolucao;
        $this->dsObservacoes = $dsObservacoes;
        $this->nrOrdem = $nrOrdem;
        $this->cdEnumeracao = $cdEnumeracao;
        $this->snDisponivel = $snDisponivel;
        $this->cdRepeticao = $cdRepeticao;
        $this->dsAnosemestreRepeticao = $dsAnosemestreRepeticao;
        $this->dsNomeQuestoesBackup = $dsNomeQuestoesBackup;
        $this->dsFiltrosRepeticaoBackup = $dsFiltrosRepeticaoBackup;
        $this->cdFiltroResolucao = $cdFiltroResolucao;
        $this->snTodasDisciplinas = $snTodasDisciplinas;
        $this->nrDisciplinasRepeticao = $nrDisciplinasRepeticao;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getCdAvaliacao(): int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getDsGrupo(): string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function getDsAnosemestreResolucao(): ?string
    {
        return $this->dsAnosemestreResolucao;
    }

    public function setDsAnosemestreResolucao(?string $dsAnosemestreResolucao): self
    {
        $this->dsAnosemestreResolucao = $dsAnosemestreResolucao;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getCdEnumeracao(): ?int
    {
        return $this->cdEnumeracao;
    }

    public function setCdEnumeracao(?int $cdEnumeracao): self
    {
        $this->cdEnumeracao = $cdEnumeracao;
        return $this;
    }

    public function isSnDisponivel(): bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function getCdRepeticao(): int
    {
        return $this->cdRepeticao;
    }

    public function setCdRepeticao(int $cdRepeticao): self
    {
        $this->cdRepeticao = $cdRepeticao;
        return $this;
    }

    public function getDsAnosemestreRepeticao(): ?string
    {
        return $this->dsAnosemestreRepeticao;
    }

    public function setDsAnosemestreRepeticao(?string $dsAnosemestreRepeticao): self
    {
        $this->dsAnosemestreRepeticao = $dsAnosemestreRepeticao;
        return $this;
    }

    public function getDsNomeQuestoesBackup(): ?string
    {
        return $this->dsNomeQuestoesBackup;
    }

    public function setDsNomeQuestoesBackup(?string $dsNomeQuestoesBackup): self
    {
        $this->dsNomeQuestoesBackup = $dsNomeQuestoesBackup;
        return $this;
    }

    public function getDsFiltrosRepeticaoBackup(): ?string
    {
        return $this->dsFiltrosRepeticaoBackup;
    }

    public function setDsFiltrosRepeticaoBackup(?string $dsFiltrosRepeticaoBackup): self
    {
        $this->dsFiltrosRepeticaoBackup = $dsFiltrosRepeticaoBackup;
        return $this;
    }

    public function getCdFiltroResolucao(): ?int
    {
        return $this->cdFiltroResolucao;
    }

    public function setCdFiltroResolucao(?int $cdFiltroResolucao): self
    {
        $this->cdFiltroResolucao = $cdFiltroResolucao;
        return $this;
    }

    public function isSnTodasDisciplinas(): ?bool
    {
        return $this->snTodasDisciplinas;
    }

    public function setSnTodasDisciplinas(?bool $snTodasDisciplinas): self
    {
        $this->snTodasDisciplinas = $snTodasDisciplinas;
        return $this;
    }

    public function getNrDisciplinasRepeticao(): ?int
    {
        return $this->nrDisciplinasRepeticao;
    }

    public function setNrDisciplinasRepeticao(?int $nrDisciplinasRepeticao): self
    {
        $this->nrDisciplinasRepeticao = $nrDisciplinasRepeticao;
        return $this;
    }
}
