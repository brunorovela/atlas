<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AlimAlimentoRefeicaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimAlimentoRefeicaoRepository::class)]
#[ORM\Table(
    name: 'alim_alimento_refeicao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_refeicao_alim_alimento', columns: ['cd_alimento'])]
#[ORM\Index(name: 'FK_refeicao_alim_refeicao', columns: ['cd_refeicao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_refeicao_alim_alimento', 'colunas' => ['cd_alimento'], 'tabelaAlvo' => 'alim_alimento', 'colunasAlvo' => ['cd_alimento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_refeicao_alim_refeicao', 'colunas' => ['cd_refeicao'], 'tabelaAlvo' => 'alim_refeicao', 'colunasAlvo' => ['cd_refeicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AlimAlimentoRefeicao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_alimento_refeicao', type: 'integer')]
    private ?int $cdAlimentoRefeicao = null;

    #[ORM\ManyToOne(targetEntity: AlimAlimento::class)]
    #[ORM\JoinColumn(name: 'cd_alimento', referencedColumnName: 'cd_alimento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AlimAlimento $cdAlimento = null;

    #[ORM\ManyToOne(targetEntity: AlimRefeicao::class)]
    #[ORM\JoinColumn(name: 'cd_refeicao', referencedColumnName: 'cd_refeicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AlimRefeicao $cdRefeicao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_disponivel', type: 'boolean')]
    private ?bool $snDisponivel = null;

    public function __construct(
        ?AlimAlimento $cdAlimento = null,
        ?AlimRefeicao $cdRefeicao = null,
        ?\DateTimeInterface $dtBase = null,
        ?bool $snDisponivel = null
    ) {
        $this->cdAlimento = $cdAlimento;
        $this->cdRefeicao = $cdRefeicao;
        $this->dtBase = $dtBase;
        $this->snDisponivel = $snDisponivel;
    }

    public function getCdAlimentoRefeicao(): ?int
    {
        return $this->cdAlimentoRefeicao;
    }

    public function getCdAlimento(): ?AlimAlimento
    {
        return $this->cdAlimento;
    }

    public function setCdAlimento(?AlimAlimento $cdAlimento): self
    {
        $this->cdAlimento = $cdAlimento;
        return $this;
    }

    public function getCdRefeicao(): ?AlimRefeicao
    {
        return $this->cdRefeicao;
    }

    public function setCdRefeicao(?AlimRefeicao $cdRefeicao): self
    {
        $this->cdRefeicao = $cdRefeicao;
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

    public function isSnDisponivel(): ?bool
    {
        return $this->snDisponivel;
    }

    public function setSnDisponivel(?bool $snDisponivel): self
    {
        $this->snDisponivel = $snDisponivel;
        return $this;
    }
}
