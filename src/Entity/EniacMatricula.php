<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EniacMatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EniacMatriculaRepository::class)]
#[ORM\Table(
    name: 'eniac_matricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EniacMatricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_matricula', type: 'integer')]
    private ?int $cdMatricula = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_usuario', type: 'string', length: 255, nullable: true)]
    private ?string $dsUsuario = null;

    #[ORM\Column(name: 'ds_senha', type: 'string', length: 255, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'ds_codigo_ticket', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodigoTicket = null;

    #[ORM\Column(name: 'ds_chave_ticket', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveTicket = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsUsuario = null,
        ?string $dsSenha = null,
        ?string $dsEmail = null,
        ?string $dsCodigoTicket = null,
        ?string $dsChaveTicket = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsUsuario = $dsUsuario;
        $this->dsSenha = $dsSenha;
        $this->dsEmail = $dsEmail;
        $this->dsCodigoTicket = $dsCodigoTicket;
        $this->dsChaveTicket = $dsChaveTicket;
    }

    public function getCdMatricula(): ?int
    {
        return $this->cdMatricula;
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

    public function getDsUsuario(): ?string
    {
        return $this->dsUsuario;
    }

    public function setDsUsuario(?string $dsUsuario): self
    {
        $this->dsUsuario = $dsUsuario;
        return $this;
    }

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function getDsCodigoTicket(): ?string
    {
        return $this->dsCodigoTicket;
    }

    public function setDsCodigoTicket(?string $dsCodigoTicket): self
    {
        $this->dsCodigoTicket = $dsCodigoTicket;
        return $this;
    }

    public function getDsChaveTicket(): ?string
    {
        return $this->dsChaveTicket;
    }

    public function setDsChaveTicket(?string $dsChaveTicket): self
    {
        $this->dsChaveTicket = $dsChaveTicket;
        return $this;
    }
}
