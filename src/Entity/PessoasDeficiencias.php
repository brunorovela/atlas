<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasDeficienciasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasDeficienciasRepository::class)]
#[ORM\Table(
    name: 'pessoas_deficiencias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_DEFICIENCIA', columns: ['cd_deficiencia'])]
class PessoasDeficiencias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_deficiencia', type: 'integer')]
    private ?int $cdPessoaDeficiencia = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_deficiencia', type: 'integer', nullable: true)]
    private ?int $cdDeficiencia = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdDeficiencia = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdDeficiencia = $cdDeficiencia;
    }

    public function getCdPessoaDeficiencia(): ?int
    {
        return $this->cdPessoaDeficiencia;
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

    public function getCdDeficiencia(): ?int
    {
        return $this->cdDeficiencia;
    }

    public function setCdDeficiencia(?int $cdDeficiencia): self
    {
        $this->cdDeficiencia = $cdDeficiencia;
        return $this;
    }
}
