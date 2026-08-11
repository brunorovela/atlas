<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinContasPagarAutorizaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinContasPagarAutorizaRepository::class)]
#[ORM\Table(
    name: 'fin_contas_pagar_autoriza',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_AUTORIZA_SITU', columns: ['cd_autoriza_situ'])]
#[ORM\Index(name: 'IX_CD_AUTORIZA_USUARIO', columns: ['cd_autoriza_usuario'])]
class FinContasPagarAutoriza
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_autoriza', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAutoriza = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'cd_autoriza_situ', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdAutorizaSitu = 0;

    #[ORM\Column(name: 'cd_autoriza_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAutorizaUsuario = null;

    #[ORM\Column(name: 'dt_autoriza', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAutoriza = null;

    #[ORM\Column(name: 'me_autoriza', type: 'text', nullable: true)]
    private ?string $meAutoriza = null;

    #[ORM\Column(name: 'me_resposta', type: 'text', nullable: true)]
    private ?string $meResposta = null;

    public function __construct(
        ?int $cdTitulo = null,
        ?int $cdColigada = null,
        ?int $cdAutorizaSitu = 0,
        ?int $cdAutorizaUsuario = null,
        ?\DateTimeInterface $dtAutoriza = null,
        ?string $meAutoriza = null,
        ?string $meResposta = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdColigada = $cdColigada;
        $this->cdAutorizaSitu = $cdAutorizaSitu;
        $this->cdAutorizaUsuario = $cdAutorizaUsuario;
        $this->dtAutoriza = $dtAutoriza;
        $this->meAutoriza = $meAutoriza;
        $this->meResposta = $meResposta;
    }

    public function getCdAutoriza(): ?int
    {
        return $this->cdAutoriza;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdAutorizaSitu(): ?int
    {
        return $this->cdAutorizaSitu;
    }

    public function setCdAutorizaSitu(?int $cdAutorizaSitu): self
    {
        $this->cdAutorizaSitu = $cdAutorizaSitu;
        return $this;
    }

    public function getCdAutorizaUsuario(): ?int
    {
        return $this->cdAutorizaUsuario;
    }

    public function setCdAutorizaUsuario(?int $cdAutorizaUsuario): self
    {
        $this->cdAutorizaUsuario = $cdAutorizaUsuario;
        return $this;
    }

    public function getDtAutoriza(): ?\DateTimeInterface
    {
        return $this->dtAutoriza;
    }

    public function setDtAutoriza(?\DateTimeInterface $dtAutoriza): self
    {
        $this->dtAutoriza = $dtAutoriza;
        return $this;
    }

    public function getMeAutoriza(): ?string
    {
        return $this->meAutoriza;
    }

    public function setMeAutoriza(?string $meAutoriza): self
    {
        $this->meAutoriza = $meAutoriza;
        return $this;
    }

    public function getMeResposta(): ?string
    {
        return $this->meResposta;
    }

    public function setMeResposta(?string $meResposta): self
    {
        $this->meResposta = $meResposta;
        return $this;
    }
}
