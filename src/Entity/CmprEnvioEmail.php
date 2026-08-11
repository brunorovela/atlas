<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CmprEnvioEmailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprEnvioEmailRepository::class)]
#[ORM\Table(
    name: 'cmpr_envio_email',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CmprEnvioEmail
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_envio_email', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEnvioEmail = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'cd_chave', type: 'integer', nullable: true)]
    private ?int $cdChave = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?string $dsAssunto = null,
        ?int $cdChave = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->dsAssunto = $dsAssunto;
        $this->cdChave = $cdChave;
        $this->dsChave = $dsChave;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdEnvioEmail(): ?int
    {
        return $this->cdEnvioEmail;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getCdChave(): ?int
    {
        return $this->cdChave;
    }

    public function setCdChave(?int $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
}
