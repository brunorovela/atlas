<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LoginsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoginsRepository::class)]
#[ORM\Table(
    name: 'logins',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class Logins
{
    #[ORM\Id]
    #[ORM\Column(name: 'ds_ip', type: 'string', length: 255)]
    private ?string $dsIp = null;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_login', type: 'string', length: 255)]
    private ?string $dsLogin = null;

    #[ORM\Column(name: 'dt_bloqueio', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBloqueio = null;

    #[ORM\Column(name: 'nr_tentativas', type: 'integer', nullable: true)]
    private ?int $nrTentativas = null;

    #[ORM\Column(name: 'ds_ip_proxy', type: 'string', length: 40, nullable: true)]
    private ?string $dsIpProxy = null;

    public function __construct(
        ?string $dsIp = null,
        ?string $dsLogin = null,
        ?\DateTimeInterface $dtBloqueio = null,
        ?int $nrTentativas = null,
        ?string $dsIpProxy = null
    ) {
        $this->dsIp = $dsIp;
        $this->dsLogin = $dsLogin;
        $this->dtBloqueio = $dtBloqueio;
        $this->nrTentativas = $nrTentativas;
        $this->dsIpProxy = $dsIpProxy;
    }

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }

    public function getDsLogin(): ?string
    {
        return $this->dsLogin;
    }

    public function setDsLogin(?string $dsLogin): self
    {
        $this->dsLogin = $dsLogin;
        return $this;
    }

    public function getDtBloqueio(): ?\DateTimeInterface
    {
        return $this->dtBloqueio;
    }

    public function setDtBloqueio(?\DateTimeInterface $dtBloqueio): self
    {
        $this->dtBloqueio = $dtBloqueio;
        return $this;
    }

    public function getNrTentativas(): ?int
    {
        return $this->nrTentativas;
    }

    public function setNrTentativas(?int $nrTentativas): self
    {
        $this->nrTentativas = $nrTentativas;
        return $this;
    }

    public function getDsIpProxy(): ?string
    {
        return $this->dsIpProxy;
    }

    public function setDsIpProxy(?string $dsIpProxy): self
    {
        $this->dsIpProxy = $dsIpProxy;
        return $this;
    }
}
