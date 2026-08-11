<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvlQuestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlQuestoesRepository::class)]
#[ORM\Table(
    name: 'avl_questoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Quest?es das avalia??es']
)]
#[ORM\UniqueConstraint(name: 'cd_questao', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
class AvlQuestoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', options: ['default' => '0'])]
    private int $nrOrdem = 0;

    #[ORM\Column(name: 'ds_questao', type: 'text', length: 16777215)]
    private ?string $dsQuestao = null;

    #[ORM\Column(name: 'ds_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true)]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'cd_enumeracao', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdEnumeracao = 1;

    #[ORM\Column(name: 'cd_tipo_visualiza_alternativas', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $cdTipoVisualizaAlternativas = 1;

    #[ORM\Column(name: 'nr_alternativas_por_linha', type: 'integer', options: ['unsigned' => true, 'default' => '5'])]
    private int $nrAlternativasPorLinha = 5;

    #[ORM\Column(name: 'sn_obrigatoria', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snObrigatoria = 0;

    #[ORM\Column(name: 'ds_nome_alternativas_backup', type: 'string', length: 50, nullable: true, options: ['comment' => 'Backup dos valores anteriores de enumeração das alternativas das questões'])]
    private ?string $dsNomeAlternativasBackup = null;

    public function __construct(
        int $cdGrupo = 0,
        int $nrOrdem = 0,
        ?string $dsQuestao = null,
        ?string $dsObservacoes = null,
        bool $snDisponivel = true,
        ?int $cdTipo = null,
        ?int $cdEnumeracao = 1,
        int $cdTipoVisualizaAlternativas = 1,
        int $nrAlternativasPorLinha = 5,
        int $snObrigatoria = 0,
        ?string $dsNomeAlternativasBackup = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->nrOrdem = $nrOrdem;
        $this->dsQuestao = $dsQuestao;
        $this->dsObservacoes = $dsObservacoes;
        $this->snDisponivel = $snDisponivel;
        $this->cdTipo = $cdTipo;
        $this->cdEnumeracao = $cdEnumeracao;
        $this->cdTipoVisualizaAlternativas = $cdTipoVisualizaAlternativas;
        $this->nrAlternativasPorLinha = $nrAlternativasPorLinha;
        $this->snObrigatoria = $snObrigatoria;
        $this->dsNomeAlternativasBackup = $dsNomeAlternativasBackup;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function getDsQuestao(): ?string
    {
        return $this->dsQuestao;
    }

    public function setDsQuestao(?string $dsQuestao): self
    {
        $this->dsQuestao = $dsQuestao;
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

    public function isSnDisponivel(): bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
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

    public function getCdTipoVisualizaAlternativas(): int
    {
        return $this->cdTipoVisualizaAlternativas;
    }

    public function setCdTipoVisualizaAlternativas(int $cdTipoVisualizaAlternativas): self
    {
        $this->cdTipoVisualizaAlternativas = $cdTipoVisualizaAlternativas;
        return $this;
    }

    public function getNrAlternativasPorLinha(): int
    {
        return $this->nrAlternativasPorLinha;
    }

    public function setNrAlternativasPorLinha(int $nrAlternativasPorLinha): self
    {
        $this->nrAlternativasPorLinha = $nrAlternativasPorLinha;
        return $this;
    }

    public function getSnObrigatoria(): int
    {
        return $this->snObrigatoria;
    }

    public function setSnObrigatoria(int $snObrigatoria): self
    {
        $this->snObrigatoria = $snObrigatoria;
        return $this;
    }

    public function getDsNomeAlternativasBackup(): ?string
    {
        return $this->dsNomeAlternativasBackup;
    }

    public function setDsNomeAlternativasBackup(?string $dsNomeAlternativasBackup): self
    {
        $this->dsNomeAlternativasBackup = $dsNomeAlternativasBackup;
        return $this;
    }
}
