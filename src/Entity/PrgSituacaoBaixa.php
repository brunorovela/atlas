<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PrgSituacaoBaixaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgSituacaoBaixaRepository::class)]
#[ORM\Table(
    name: 'prg_situacao_baixa',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_ds_chave', columns: ['ds_chave'])]
class PrgSituacaoBaixa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsTitulo = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
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
