<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PrgSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgSituacoesRepository::class)]
#[ORM\Table(
    name: 'prg_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'prg_situacoes_ds_chave_IDX', columns: ['ds_chave', 'ds_tipo_situacao'])]
#[ORM\Index(name: 'idx_prg_situacoes_ds_chave', columns: ['ds_chave'])]
#[ORM\Index(name: 'idx_prg_situacoes_ds_tipo_situacao', columns: ['ds_tipo_situacao'])]
class PrgSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_tipo_situacao', type: 'string', length: 20, options: ['comment' => 'Tipo de situação do lote sendo lote ou mensalidade'])]
    private ?string $dsTipoSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 100)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'sn_pode_cancelar', type: 'integer', options: ['default' => '0', 'comment' => '0 - Não pode cancelar, 1 - Pode cancelar'])]
    private int $snPodeCancelar = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsTipoSituacao = null,
        ?string $dsSituacao = null,
        int $snPodeCancelar = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsChave = $dsChave;
        $this->dsTipoSituacao = $dsTipoSituacao;
        $this->dsSituacao = $dsSituacao;
        $this->snPodeCancelar = $snPodeCancelar;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsTipoSituacao(): ?string
    {
        return $this->dsTipoSituacao;
    }

    public function setDsTipoSituacao(?string $dsTipoSituacao): self
    {
        $this->dsTipoSituacao = $dsTipoSituacao;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }

    public function getSnPodeCancelar(): int
    {
        return $this->snPodeCancelar;
    }

    public function setSnPodeCancelar(int $snPodeCancelar): self
    {
        $this->snPodeCancelar = $snPodeCancelar;
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
