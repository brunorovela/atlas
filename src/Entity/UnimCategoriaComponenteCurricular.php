<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimCategoriaComponenteCurricularRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimCategoriaComponenteCurricularRepository::class)]
#[ORM\Table(
    name: 'unim_categoria_componente_curricular',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
class UnimCategoriaComponenteCurricular
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria_componente_curricular', type: 'integer')]
    private ?int $cdCategoriaComponenteCurricular = null;

    #[ORM\Column(name: 'ds_categoria_componente_curricular', type: 'string', length: 50)]
    private ?string $dsCategoriaComponenteCurricular = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsCategoriaComponenteCurricular = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsCategoriaComponenteCurricular = $dsCategoriaComponenteCurricular;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdCategoriaComponenteCurricular(): ?int
    {
        return $this->cdCategoriaComponenteCurricular;
    }

    public function getDsCategoriaComponenteCurricular(): ?string
    {
        return $this->dsCategoriaComponenteCurricular;
    }

    public function setDsCategoriaComponenteCurricular(?string $dsCategoriaComponenteCurricular): self
    {
        $this->dsCategoriaComponenteCurricular = $dsCategoriaComponenteCurricular;
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
