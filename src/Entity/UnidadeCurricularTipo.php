<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnidadeCurricularTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnidadeCurricularTipoRepository::class)]
#[ORM\Table(
    name: 'unidade_curricular_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_NOME', columns: ['ds_nome'])]
#[ORM\UniqueConstraint(name: 'UK_SIGLA', columns: ['ds_sigla'])]
class UnidadeCurricularTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 50)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 50)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsSigla = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsSigla = $dsSigla;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
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
