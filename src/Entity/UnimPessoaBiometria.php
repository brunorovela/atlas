<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UnimPessoaBiometriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimPessoaBiometriaRepository::class)]
#[ORM\Table(
    name: 'unim_pessoa_biometria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimPessoaBiometria
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_biometria', type: 'integer')]
    private ?int $cdPessoaBiometria = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_dedo', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrDedo = null;

    #[ORM\Column(name: 'me_biometria', type: 'text', nullable: true)]
    private ?string $meBiometria = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $nrDedo = null,
        ?string $meBiometria = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrDedo = $nrDedo;
        $this->meBiometria = $meBiometria;
        $this->dtBase = $dtBase;
    }

    public function getCdPessoaBiometria(): ?int
    {
        return $this->cdPessoaBiometria;
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

    public function getNrDedo(): ?int
    {
        return $this->nrDedo;
    }

    public function setNrDedo(?int $nrDedo): self
    {
        $this->nrDedo = $nrDedo;
        return $this;
    }

    public function getMeBiometria(): ?string
    {
        return $this->meBiometria;
    }

    public function setMeBiometria(?string $meBiometria): self
    {
        $this->meBiometria = $meBiometria;
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
