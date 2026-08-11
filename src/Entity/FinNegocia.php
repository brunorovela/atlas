<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNegociaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNegociaRepository::class)]
#[ORM\Table(
    name: 'fin_negocia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_negocia', columns: ['cd_negocia'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class FinNegocia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_negocia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNegocia = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'ds_negocia', type: 'string', length: 200, nullable: true)]
    private ?string $dsNegocia = null;

    #[ORM\Column(name: 'dt_negocia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNegocia = null;

    #[ORM\Column(name: 'vl_bruto_negocia', type: 'float', nullable: true)]
    private ?float $vlBrutoNegocia = null;

    #[ORM\Column(name: 'vl_juros_negocia', type: 'float', nullable: true)]
    private ?float $vlJurosNegocia = null;

    #[ORM\Column(name: 'vl_desconto_negocia', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlDescontoNegocia = null;

    #[ORM\Column(name: 'vl_entrada', type: 'float', nullable: true)]
    private ?float $vlEntrada = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'vl_creditos', type: 'float', nullable: true)]
    private ?float $vlCreditos = null;

    #[ORM\Column(name: 'cd_simulacao', type: 'integer', nullable: true)]
    private ?int $cdSimulacao = null;

    #[ORM\Column(name: 'vl_segunda_entrada', type: 'float', nullable: true)]
    private ?float $vlSegundaEntrada = null;

    public function __construct(
        int $cdPessoa = 0,
        ?string $dsNegocia = null,
        ?\DateTimeInterface $dtNegocia = null,
        ?float $vlBrutoNegocia = null,
        ?float $vlJurosNegocia = null,
        ?float $vlDescontoNegocia = null,
        ?float $vlEntrada = null,
        ?int $cdUsuario = null,
        ?float $vlCreditos = null,
        ?int $cdSimulacao = null,
        ?float $vlSegundaEntrada = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsNegocia = $dsNegocia;
        $this->dtNegocia = $dtNegocia;
        $this->vlBrutoNegocia = $vlBrutoNegocia;
        $this->vlJurosNegocia = $vlJurosNegocia;
        $this->vlDescontoNegocia = $vlDescontoNegocia;
        $this->vlEntrada = $vlEntrada;
        $this->cdUsuario = $cdUsuario;
        $this->vlCreditos = $vlCreditos;
        $this->cdSimulacao = $cdSimulacao;
        $this->vlSegundaEntrada = $vlSegundaEntrada;
    }

    public function getCdNegocia(): ?int
    {
        return $this->cdNegocia;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDsNegocia(): ?string
    {
        return $this->dsNegocia;
    }

    public function setDsNegocia(?string $dsNegocia): self
    {
        $this->dsNegocia = $dsNegocia;
        return $this;
    }

    public function getDtNegocia(): ?\DateTimeInterface
    {
        return $this->dtNegocia;
    }

    public function setDtNegocia(?\DateTimeInterface $dtNegocia): self
    {
        $this->dtNegocia = $dtNegocia;
        return $this;
    }

    public function getVlBrutoNegocia(): ?float
    {
        return $this->vlBrutoNegocia;
    }

    public function setVlBrutoNegocia(?float $vlBrutoNegocia): self
    {
        $this->vlBrutoNegocia = $vlBrutoNegocia;
        return $this;
    }

    public function getVlJurosNegocia(): ?float
    {
        return $this->vlJurosNegocia;
    }

    public function setVlJurosNegocia(?float $vlJurosNegocia): self
    {
        $this->vlJurosNegocia = $vlJurosNegocia;
        return $this;
    }

    public function getVlDescontoNegocia(): ?float
    {
        return $this->vlDescontoNegocia;
    }

    public function setVlDescontoNegocia(?float $vlDescontoNegocia): self
    {
        $this->vlDescontoNegocia = $vlDescontoNegocia;
        return $this;
    }

    public function getVlEntrada(): ?float
    {
        return $this->vlEntrada;
    }

    public function setVlEntrada(?float $vlEntrada): self
    {
        $this->vlEntrada = $vlEntrada;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getVlCreditos(): ?float
    {
        return $this->vlCreditos;
    }

    public function setVlCreditos(?float $vlCreditos): self
    {
        $this->vlCreditos = $vlCreditos;
        return $this;
    }

    public function getCdSimulacao(): ?int
    {
        return $this->cdSimulacao;
    }

    public function setCdSimulacao(?int $cdSimulacao): self
    {
        $this->cdSimulacao = $cdSimulacao;
        return $this;
    }

    public function getVlSegundaEntrada(): ?float
    {
        return $this->vlSegundaEntrada;
    }

    public function setVlSegundaEntrada(?float $vlSegundaEntrada): self
    {
        $this->vlSegundaEntrada = $vlSegundaEntrada;
        return $this;
    }
}
