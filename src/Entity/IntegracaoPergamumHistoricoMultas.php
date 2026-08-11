<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoPergamumHistoricoMultasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPergamumHistoricoMultasRepository::class)]
#[ORM\Table(
    name: 'integracao_pergamum_historico_multas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoPergamumHistoricoMultas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'vl_multa', type: 'float', nullable: true)]
    private ?float $vlMulta = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime')]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'dt_emprestimo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEmprestimo = null;

    #[ORM\Column(name: 'dt_multa', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMulta = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?float $vlMulta = null,
        ?float $vlDesconto = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?\DateTimeInterface $dtEmprestimo = null,
        ?\DateTimeInterface $dtMulta = null,
        ?string $dsObservacao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->vlMulta = $vlMulta;
        $this->vlDesconto = $vlDesconto;
        $this->dtRegistro = $dtRegistro;
        $this->dtEmprestimo = $dtEmprestimo;
        $this->dtMulta = $dtMulta;
        $this->dsObservacao = $dsObservacao;
    }

    public function getCdIntegracao(): ?int
    {
        return $this->cdIntegracao;
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

    public function getVlMulta(): ?float
    {
        return $this->vlMulta;
    }

    public function setVlMulta(?float $vlMulta): self
    {
        $this->vlMulta = $vlMulta;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getDtEmprestimo(): ?\DateTimeInterface
    {
        return $this->dtEmprestimo;
    }

    public function setDtEmprestimo(?\DateTimeInterface $dtEmprestimo): self
    {
        $this->dtEmprestimo = $dtEmprestimo;
        return $this;
    }

    public function getDtMulta(): ?\DateTimeInterface
    {
        return $this->dtMulta;
    }

    public function setDtMulta(?\DateTimeInterface $dtMulta): self
    {
        $this->dtMulta = $dtMulta;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }
}
