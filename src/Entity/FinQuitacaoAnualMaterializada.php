<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinQuitacaoAnualMaterializadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinQuitacaoAnualMaterializadaRepository::class)]
#[ORM\Table(
    name: 'fin_quitacao_anual_materializada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinQuitacaoAnualMaterializada
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer', nullable: true)]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true)]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    public function __construct(
        ?int $nrAno = null,
        ?int $cdResp = null,
        ?int $cdPessoa = null
    ) {
        $this->nrAno = $nrAno;
        $this->cdResp = $cdResp;
        $this->cdPessoa = $cdPessoa;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getCdResp(): ?int
    {
        return $this->cdResp;
    }

    public function setCdResp(?int $cdResp): self
    {
        $this->cdResp = $cdResp;
        return $this;
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
}
