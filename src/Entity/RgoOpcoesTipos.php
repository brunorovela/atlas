<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RgoOpcoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoOpcoesTiposRepository::class)]
#[ORM\Table(
    name: 'rgo_opcoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_TAG_OPCAO', columns: ['ds_tag_opcao'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RgoOpcoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_opcao_tipo', type: 'integer')]
    private ?int $cdOpcaoTipo = null;

    #[ORM\Column(name: 'ds_opcao_tipo', type: 'string', length: 255)]
    private ?string $dsOpcaoTipo = null;

    #[ORM\Column(name: 'ds_tag_opcao', type: 'string', length: 255)]
    private ?string $dsTagOpcao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsOpcaoTipo = null,
        ?string $dsTagOpcao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsOpcaoTipo = $dsOpcaoTipo;
        $this->dsTagOpcao = $dsTagOpcao;
        $this->dtBase = $dtBase;
    }

    public function getCdOpcaoTipo(): ?int
    {
        return $this->cdOpcaoTipo;
    }

    public function getDsOpcaoTipo(): ?string
    {
        return $this->dsOpcaoTipo;
    }

    public function setDsOpcaoTipo(?string $dsOpcaoTipo): self
    {
        $this->dsOpcaoTipo = $dsOpcaoTipo;
        return $this;
    }

    public function getDsTagOpcao(): ?string
    {
        return $this->dsTagOpcao;
    }

    public function setDsTagOpcao(?string $dsTagOpcao): self
    {
        $this->dsTagOpcao = $dsTagOpcao;
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
