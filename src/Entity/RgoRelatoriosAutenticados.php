<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoRelatoriosAutenticadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoRelatoriosAutenticadosRepository::class)]
#[ORM\Table(
    name: 'rgo_relatorios_autenticados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
class RgoRelatoriosAutenticados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    public function __construct(
        ?string $dsChave = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtExcluido = null
    ) {
        $this->dsChave = $dsChave;
        $this->dtInclusao = $dtInclusao;
        $this->dtExcluido = $dtExcluido;
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

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
        return $this;
    }
}
