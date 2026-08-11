<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppPessoaAcessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppPessoaAcessoRepository::class)]
#[ORM\Table(
    name: 'app_pessoa_acesso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_pa_cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'ix_app_pa_dtacesso', columns: ['dt_acesso'])]
class AppPessoaAcesso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_app_pessoa_acesso', type: 'integer')]
    private ?int $cdAppPessoaAcesso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_acesso', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAcesso = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtAcesso = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtAcesso = $dtAcesso;
        $this->dtBase = $dtBase;
    }

    public function getCdAppPessoaAcesso(): ?int
    {
        return $this->cdAppPessoaAcesso;
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

    public function getDtAcesso(): ?\DateTimeInterface
    {
        return $this->dtAcesso;
    }

    public function setDtAcesso(?\DateTimeInterface $dtAcesso): self
    {
        $this->dtAcesso = $dtAcesso;
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
