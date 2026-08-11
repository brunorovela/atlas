<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasParentescoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasParentescoRepository::class)]
#[ORM\Table(
    name: 'pessoas_parentesco',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['cd_pessoa', 'cd_parentesco_tipo', 'cd_parente'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PARENTE', columns: ['cd_parente'])]
#[ORM\Index(name: 'IX_CD_PARENTESCO_TIPO', columns: ['cd_parentesco_tipo'])]
class PessoasParentesco
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parentesco', type: 'integer')]
    private ?int $cdParentesco = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_parente', type: 'integer', options: ['default' => '0'])]
    private int $cdParente = 0;

    #[ORM\Column(name: 'cd_parentesco_tipo', type: 'integer', options: ['default' => '0'])]
    private int $cdParentescoTipo = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPessoa = 0,
        int $cdParente = 0,
        int $cdParentescoTipo = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdParente = $cdParente;
        $this->cdParentescoTipo = $cdParentescoTipo;
        $this->dtBase = $dtBase;
    }

    public function getCdParentesco(): ?int
    {
        return $this->cdParentesco;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdParente(): int
    {
        return $this->cdParente;
    }

    public function setCdParente(int $cdParente): self
    {
        $this->cdParente = $cdParente;
        return $this;
    }

    public function getCdParentescoTipo(): int
    {
        return $this->cdParentescoTipo;
    }

    public function setCdParentescoTipo(int $cdParentescoTipo): self
    {
        $this->cdParentescoTipo = $cdParentescoTipo;
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
