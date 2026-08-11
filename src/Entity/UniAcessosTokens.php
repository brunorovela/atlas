<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniAcessosTokensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniAcessosTokensRepository::class)]
#[ORM\Table(
    name: 'uni_acessos_tokens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_GERACAO', columns: ['dt_geracao'])]
#[ORM\Index(name: 'IX_DS_TOKEN', columns: ['ds_token'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class UniAcessosTokens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_acesso_token', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdAcessoToken = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_token', type: 'string', length: 255)]
    private ?string $dsToken = null;

    #[ORM\Column(name: 'dt_geracao', type: 'datetime')]
    private ?\DateTimeInterface $dtGeracao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsToken = null,
        ?\DateTimeInterface $dtGeracao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsToken = $dsToken;
        $this->dtGeracao = $dtGeracao;
    }

    public function getCdAcessoToken(): ?string
    {
        return $this->cdAcessoToken;
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

    public function getDsToken(): ?string
    {
        return $this->dsToken;
    }

    public function setDsToken(?string $dsToken): self
    {
        $this->dsToken = $dsToken;
        return $this;
    }

    public function getDtGeracao(): ?\DateTimeInterface
    {
        return $this->dtGeracao;
    }

    public function setDtGeracao(?\DateTimeInterface $dtGeracao): self
    {
        $this->dtGeracao = $dtGeracao;
        return $this;
    }
}
