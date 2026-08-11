<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmiePessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmiePessoaRepository::class)]
#[ORM\Table(
    name: 'omie_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_OMIE_PESSOA_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_OMIE_PESSOA_INTEGRACAO', columns: ['cd_integracao_omie', 'cd_pessoa'])]
class OmiePessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_pessoa', type: 'integer')]
    private ?int $cdOmiePessoa = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint')]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_pessoa_omie', type: 'bigint')]
    private ?string $cdPessoaOmie = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?int $cdPessoa = null,
        ?string $cdPessoaOmie = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->cdPessoa = $cdPessoa;
        $this->cdPessoaOmie = $cdPessoaOmie;
        $this->dtBase = $dtBase;
    }

    public function getCdOmiePessoa(): ?int
    {
        return $this->cdOmiePessoa;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
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

    public function getCdPessoaOmie(): ?string
    {
        return $this->cdPessoaOmie;
    }

    public function setCdPessoaOmie(?string $cdPessoaOmie): self
    {
        $this->cdPessoaOmie = $cdPessoaOmie;
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
