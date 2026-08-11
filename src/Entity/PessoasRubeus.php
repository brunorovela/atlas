<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasRubeusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasRubeusRepository::class)]
#[ORM\Table(
    name: 'pessoas_rubeus',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PessoasRubeus
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_pessoa_rubeus', type: 'integer', nullable: true)]
    private ?int $cdPessoaRubeus = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdPessoaRubeus = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdPessoaRubeus = $cdPessoaRubeus;
        $this->dtBase = $dtBase;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdPessoaRubeus(): ?int
    {
        return $this->cdPessoaRubeus;
    }

    public function setCdPessoaRubeus(?int $cdPessoaRubeus): self
    {
        $this->cdPessoaRubeus = $cdPessoaRubeus;
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
