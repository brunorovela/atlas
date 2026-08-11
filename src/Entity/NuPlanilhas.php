<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuPlanilhasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuPlanilhasRepository::class)]
#[ORM\Table(
    name: 'nu_planilhas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_UNIQUE', columns: ['cd_pessoa', 'ds_chave', 'ds_coluna'])]
class NuPlanilhas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_planilha', type: 'integer')]
    private ?int $cdPlanilha = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_coluna', type: 'string', length: 100)]
    private ?string $dsColuna = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer')]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer')]
    private ?int $nrOrdem = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsChave = null,
        ?string $dsColuna = null,
        ?int $nrTamanho = null,
        ?int $nrOrdem = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsChave = $dsChave;
        $this->dsColuna = $dsColuna;
        $this->nrTamanho = $nrTamanho;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdPlanilha(): ?int
    {
        return $this->cdPlanilha;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsColuna(): ?string
    {
        return $this->dsColuna;
    }

    public function setDsColuna(?string $dsColuna): self
    {
        $this->dsColuna = $dsColuna;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
