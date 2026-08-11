<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AcrvCampoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvCampoRepository::class)]
#[ORM\Table(
    name: 'acrv_campo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave'])]
class AcrvCampo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_campo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCampo = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_label_padrao', type: 'string', length: 255, nullable: true)]
    private ?string $dsLabelPadrao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsLabelPadrao = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsLabelPadrao = $dsLabelPadrao;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdCampo(): ?int
    {
        return $this->cdCampo;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsLabelPadrao(): ?string
    {
        return $this->dsLabelPadrao;
    }

    public function setDsLabelPadrao(?string $dsLabelPadrao): self
    {
        $this->dsLabelPadrao = $dsLabelPadrao;
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
