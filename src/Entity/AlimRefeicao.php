<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AlimRefeicaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimRefeicaoRepository::class)]
#[ORM\Table(
    name: 'alim_refeicao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class AlimRefeicao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_refeicao', type: 'integer')]
    private ?int $cdRefeicao = null;

    #[ORM\Column(name: 'ds_refeicao', type: 'string', length: 50)]
    private ?string $dsRefeicao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsRefeicao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsRefeicao = $dsRefeicao;
        $this->dtBase = $dtBase;
    }

    public function getCdRefeicao(): ?int
    {
        return $this->cdRefeicao;
    }

    public function getDsRefeicao(): ?string
    {
        return $this->dsRefeicao;
    }

    public function setDsRefeicao(?string $dsRefeicao): self
    {
        $this->dsRefeicao = $dsRefeicao;
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
