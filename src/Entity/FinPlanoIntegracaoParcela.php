<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoIntegracaoParcelaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoIntegracaoParcelaRepository::class)]
#[ORM\Table(
    name: 'fin_plano_integracao_parcela',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'UK_UNIQUE', columns: ['cd_plano_integracao', 'nr_parcela_paga'])]
class FinPlanoIntegracaoParcela
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_integracao_parcela', type: 'integer')]
    private ?int $cdPlanoIntegracaoParcela = null;

    #[ORM\Column(name: 'cd_plano_integracao', type: 'integer')]
    private ?int $cdPlanoIntegracao = null;

    #[ORM\Column(name: 'nr_parcela_paga', type: 'smallint')]
    private ?int $nrParcelaPaga = null;

    #[ORM\Column(name: 'nr_disciplina', type: 'smallint', nullable: true)]
    private ?int $nrDisciplina = null;

    public function __construct(
        ?int $cdPlanoIntegracao = null,
        ?int $nrParcelaPaga = null,
        ?int $nrDisciplina = null
    ) {
        $this->cdPlanoIntegracao = $cdPlanoIntegracao;
        $this->nrParcelaPaga = $nrParcelaPaga;
        $this->nrDisciplina = $nrDisciplina;
    }

    public function getCdPlanoIntegracaoParcela(): ?int
    {
        return $this->cdPlanoIntegracaoParcela;
    }

    public function getCdPlanoIntegracao(): ?int
    {
        return $this->cdPlanoIntegracao;
    }

    public function setCdPlanoIntegracao(?int $cdPlanoIntegracao): self
    {
        $this->cdPlanoIntegracao = $cdPlanoIntegracao;
        return $this;
    }

    public function getNrParcelaPaga(): ?int
    {
        return $this->nrParcelaPaga;
    }

    public function setNrParcelaPaga(?int $nrParcelaPaga): self
    {
        $this->nrParcelaPaga = $nrParcelaPaga;
        return $this;
    }

    public function getNrDisciplina(): ?int
    {
        return $this->nrDisciplina;
    }

    public function setNrDisciplina(?int $nrDisciplina): self
    {
        $this->nrDisciplina = $nrDisciplina;
        return $this;
    }
}
