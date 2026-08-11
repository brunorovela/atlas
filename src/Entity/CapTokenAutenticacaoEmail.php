<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CapTokenAutenticacaoEmailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapTokenAutenticacaoEmailRepository::class)]
#[ORM\Table(
    name: 'cap_token_autenticacao_email',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CapTokenAutenticacaoEmail
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_hash', type: 'string', length: 8)]
    private ?string $dsHash = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_expiracao', type: 'datetime')]
    private ?\DateTimeInterface $dtExpiracao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsHash = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtExpiracao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsHash = $dsHash;
        $this->cdPessoa = $cdPessoa;
        $this->dtExpiracao = $dtExpiracao;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsHash(): ?string
    {
        return $this->dsHash;
    }

    public function setDsHash(?string $dsHash): self
    {
        $this->dsHash = $dsHash;
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

    public function getDtExpiracao(): ?\DateTimeInterface
    {
        return $this->dtExpiracao;
    }

    public function setDtExpiracao(?\DateTimeInterface $dtExpiracao): self
    {
        $this->dtExpiracao = $dtExpiracao;
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
