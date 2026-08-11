<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ClassificadosVestibularRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassificadosVestibularRepository::class)]
#[ORM\Table(
    name: 'classificados_vestibular',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ClassificadosVestibular
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_candidato', type: 'integer')]
    private ?int $cdCandidato = null;

    #[ORM\Column(name: 'nm_pessoa', type: 'string', length: 255, nullable: true)]
    private ?string $nmPessoa = null;

    #[ORM\Column(name: 'cd_inst_vestibular', type: 'integer', nullable: true)]
    private ?int $cdInstVestibular = null;

    #[ORM\Column(name: 'nr_classificacao', type: 'integer', nullable: true)]
    private ?int $nrClassificacao = null;

    #[ORM\Column(name: 'ds_primeiro_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsPrimeiroNome = null;

    public function __construct(
        ?string $nmPessoa = null,
        ?int $cdInstVestibular = null,
        ?int $nrClassificacao = null,
        ?string $dsPrimeiroNome = null
    ) {
        $this->nmPessoa = $nmPessoa;
        $this->cdInstVestibular = $cdInstVestibular;
        $this->nrClassificacao = $nrClassificacao;
        $this->dsPrimeiroNome = $dsPrimeiroNome;
    }

    public function getCdCandidato(): ?int
    {
        return $this->cdCandidato;
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

    public function getCdInstVestibular(): ?int
    {
        return $this->cdInstVestibular;
    }

    public function setCdInstVestibular(?int $cdInstVestibular): self
    {
        $this->cdInstVestibular = $cdInstVestibular;
        return $this;
    }

    public function getNrClassificacao(): ?int
    {
        return $this->nrClassificacao;
    }

    public function setNrClassificacao(?int $nrClassificacao): self
    {
        $this->nrClassificacao = $nrClassificacao;
        return $this;
    }

    public function getDsPrimeiroNome(): ?string
    {
        return $this->dsPrimeiroNome;
    }

    public function setDsPrimeiroNome(?string $dsPrimeiroNome): self
    {
        $this->dsPrimeiroNome = $dsPrimeiroNome;
        return $this;
    }
}
