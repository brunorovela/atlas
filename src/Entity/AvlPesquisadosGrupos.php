<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlPesquisadosGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlPesquisadosGruposRepository::class)]
#[ORM\Table(
    name: 'avl_pesquisados_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Grupos de Pessoas que responder?o a pesquisa']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_TIPO_GRUPO', columns: ['cd_tipo_grupo'])]
#[ORM\Index(name: 'IX_CD_DEPTO', columns: ['cd_depto'])]
class AvlPesquisadosGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', options: ['default' => '0'])]
    private int $cdAvaliacao = 0;

    #[ORM\Column(name: 'ds_nome_grupo', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsNomeGrupo = '';

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean', options: ['default' => '1'])]
    private bool $snDisponivel = true;

    #[ORM\Column(name: 'cd_tipo_grupo', type: 'integer', options: ['default' => '0'])]
    private int $cdTipoGrupo = 0;

    #[ORM\Column(name: 'cd_depto', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDepto = null;

    public function __construct(
        int $cdAvaliacao = 0,
        string $dsNomeGrupo = '',
        bool $snDisponivel = true,
        int $cdTipoGrupo = 0,
        ?int $cdDepto = null
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->dsNomeGrupo = $dsNomeGrupo;
        $this->snDisponivel = $snDisponivel;
        $this->cdTipoGrupo = $cdTipoGrupo;
        $this->cdDepto = $cdDepto;
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

    public function getDsNomeGrupo(): string
    {
        return $this->dsNomeGrupo;
    }

    public function setDsNomeGrupo(string $dsNomeGrupo): self
    {
        $this->dsNomeGrupo = $dsNomeGrupo;
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

    public function getCdTipoGrupo(): int
    {
        return $this->cdTipoGrupo;
    }

    public function setCdTipoGrupo(int $cdTipoGrupo): self
    {
        $this->cdTipoGrupo = $cdTipoGrupo;
        return $this;
    }

    public function getCdDepto(): ?int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(?int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
        return $this;
    }
}
