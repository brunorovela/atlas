<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfePessoasConveniadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfePessoasConveniadasRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_pessoas_conveniadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONVENIO_CRITERIO', columns: ['cd_convenio_criterio'])]
class FinNfePessoasConveniadas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_convenio_criterio', type: 'integer')]
    private ?int $cdConvenioCriterio = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdConvenioCriterio = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdConvenioCriterio = $cdConvenioCriterio;
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

    public function getCdConvenioCriterio(): ?int
    {
        return $this->cdConvenioCriterio;
    }

    public function setCdConvenioCriterio(?int $cdConvenioCriterio): self
    {
        $this->cdConvenioCriterio = $cdConvenioCriterio;
        return $this;
    }
}
