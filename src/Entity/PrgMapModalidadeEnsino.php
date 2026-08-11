<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgMapModalidadeEnsinoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgMapModalidadeEnsinoRepository::class)]
#[ORM\Table(
    name: 'prg_map_modalidade_ensino',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_situacao_modalidade_ensino', columns: ['cd_situacao', 'cd_prg_modalidade_ensino'])]
#[ORM\Index(name: 'idx_cd_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'idx_cd_prg_modalidade_ensino', columns: ['cd_prg_modalidade_ensino'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_map_modalidade_ensino_situacao', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'fk_map_prg_modalidade_ensino', 'colunas' => ['cd_prg_modalidade_ensino'], 'tabelaAlvo' => 'prg_modalidade_ensino', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]]
    ],
    autoIncremento: []
)]
class PrgMapModalidadeEnsino
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: PrgModalidadeEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_prg_modalidade_ensino', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgModalidadeEnsino $cdPrgModalidadeEnsino = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdSituacao = null,
        ?PrgModalidadeEnsino $cdPrgModalidadeEnsino = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->cdPrgModalidadeEnsino = $cdPrgModalidadeEnsino;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCdPrgModalidadeEnsino(): ?PrgModalidadeEnsino
    {
        return $this->cdPrgModalidadeEnsino;
    }

    public function setCdPrgModalidadeEnsino(?PrgModalidadeEnsino $cdPrgModalidadeEnsino): self
    {
        $this->cdPrgModalidadeEnsino = $cdPrgModalidadeEnsino;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
