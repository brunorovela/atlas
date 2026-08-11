<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoMinhaBibliotecaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoMinhaBibliotecaRepository::class)]
#[ORM\Table(
    name: 'integracao_minha_biblioteca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UNQ_DS_USERNAME', columns: ['ds_username'])]
#[ORM\UniqueConstraint(name: 'UNQ_CD_PESSOA', columns: ['cd_pessoa'])]
class IntegracaoMinhaBiblioteca
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_minha_biblioteca', type: 'integer')]
    private ?int $cdMinhaBiblioteca = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_username', type: 'string', length: 255, nullable: true)]
    private ?string $dsUsername = null;

    #[ORM\Column(name: 'ds_firstname', type: 'string', length: 255, nullable: true)]
    private ?string $dsFirstname = null;

    #[ORM\Column(name: 'ds_lastname', type: 'string', length: 255, nullable: true)]
    private ?string $dsLastname = null;

    #[ORM\Column(name: 'ds_usergroupid', type: 'string', length: 255, nullable: true)]
    private ?string $dsUsergroupid = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_verificacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVerificacao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsUsername = null,
        ?string $dsFirstname = null,
        ?string $dsLastname = null,
        ?string $dsUsergroupid = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtVerificacao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsUsername = $dsUsername;
        $this->dsFirstname = $dsFirstname;
        $this->dsLastname = $dsLastname;
        $this->dsUsergroupid = $dsUsergroupid;
        $this->dtCadastro = $dtCadastro;
        $this->dtVerificacao = $dtVerificacao;
    }

    public function getCdMinhaBiblioteca(): ?int
    {
        return $this->cdMinhaBiblioteca;
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

    public function getDsUsername(): ?string
    {
        return $this->dsUsername;
    }

    public function setDsUsername(?string $dsUsername): self
    {
        $this->dsUsername = $dsUsername;
        return $this;
    }

    public function getDsFirstname(): ?string
    {
        return $this->dsFirstname;
    }

    public function setDsFirstname(?string $dsFirstname): self
    {
        $this->dsFirstname = $dsFirstname;
        return $this;
    }

    public function getDsLastname(): ?string
    {
        return $this->dsLastname;
    }

    public function setDsLastname(?string $dsLastname): self
    {
        $this->dsLastname = $dsLastname;
        return $this;
    }

    public function getDsUsergroupid(): ?string
    {
        return $this->dsUsergroupid;
    }

    public function setDsUsergroupid(?string $dsUsergroupid): self
    {
        $this->dsUsergroupid = $dsUsergroupid;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getDtVerificacao(): ?\DateTimeInterface
    {
        return $this->dtVerificacao;
    }

    public function setDtVerificacao(?\DateTimeInterface $dtVerificacao): self
    {
        $this->dtVerificacao = $dtVerificacao;
        return $this;
    }
}
