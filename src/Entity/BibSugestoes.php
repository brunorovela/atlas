<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibSugestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibSugestoesRepository::class)]
#[ORM\Table(
    name: 'bib_sugestoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class BibSugestoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_sugestao', type: 'integer')]
    private ?int $cdSugestao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nm_pessoa', type: 'string', length: 100, nullable: true)]
    private ?string $nmPessoa = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $nmPessoa = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nmPessoa = $nmPessoa;
    }

    public function getCdSugestao(): ?int
    {
        return $this->cdSugestao;
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

    public function getNmPessoa(): ?string
    {
        return $this->nmPessoa;
    }

    public function setNmPessoa(?string $nmPessoa): self
    {
        $this->nmPessoa = $nmPessoa;
        return $this;
    }
}
