<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TmpMensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TmpMensalidadesRepository::class)]
#[ORM\Table(
    name: 'tmp_mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_CD_RESP', columns: ['cd_resp'])]
class TmpMensalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensa = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'nr_parcela', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'vl_bruto', type: 'float', nullable: true)]
    private ?float $vlBruto = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'vl_bolsa', type: 'float', nullable: true)]
    private ?float $vlBolsa = null;

    #[ORM\Column(name: 'vl_extra', type: 'float', nullable: true)]
    private ?float $vlExtra = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'sn_credito', type: 'boolean', nullable: true)]
    private ?bool $snCredito = null;

    #[ORM\Column(name: 'nr_credito', type: 'float', nullable: true)]
    private ?float $nrCredito = null;

    #[ORM\Column(name: 'cd_tipo_parcela', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoParcela = null;

    #[ORM\Column(name: 'cd_planocontas', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPlanocontas = null;

    #[ORM\Column(name: 'ds_mensa', type: 'string', length: 150, nullable: true, options: ['default' => '0'])]
    private ?string $dsMensa = '0';

    #[ORM\Column(name: 'sn_recibo', type: 'boolean', nullable: true)]
    private ?bool $snRecibo = null;

    #[ORM\Column(name: 'cd_bolsa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdBolsa = null;

    public function __construct(
        ?int $cdAluno = null,
        ?int $cdResp = null,
        ?int $nrParcela = null,
        ?float $vlBruto = null,
        ?float $vlDesconto = null,
        ?float $vlBolsa = null,
        ?float $vlExtra = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?bool $snCredito = null,
        ?float $nrCredito = null,
        ?int $cdTipoParcela = null,
        ?int $cdPlanocontas = null,
        ?string $dsMensa = '0',
        ?bool $snRecibo = null,
        ?int $cdBolsa = null
    ) {
        $this->cdAluno = $cdAluno;
        $this->cdResp = $cdResp;
        $this->nrParcela = $nrParcela;
        $this->vlBruto = $vlBruto;
        $this->vlDesconto = $vlDesconto;
        $this->vlBolsa = $vlBolsa;
        $this->vlExtra = $vlExtra;
        $this->dtVencimento = $dtVencimento;
        $this->snCredito = $snCredito;
        $this->nrCredito = $nrCredito;
        $this->cdTipoParcela = $cdTipoParcela;
        $this->cdPlanocontas = $cdPlanocontas;
        $this->dsMensa = $dsMensa;
        $this->snRecibo = $snRecibo;
        $this->cdBolsa = $cdBolsa;
    }

    public function getCdMensa(): ?int
    {
        return $this->cdMensa;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getCdResp(): ?int
    {
        return $this->cdResp;
    }

    public function setCdResp(?int $cdResp): self
    {
        $this->cdResp = $cdResp;
        return $this;
    }

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlBruto(): ?float
    {
        return $this->vlBruto;
    }

    public function setVlBruto(?float $vlBruto): self
    {
        $this->vlBruto = $vlBruto;
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

    public function getVlBolsa(): ?float
    {
        return $this->vlBolsa;
    }

    public function setVlBolsa(?float $vlBolsa): self
    {
        $this->vlBolsa = $vlBolsa;
        return $this;
    }

    public function getVlExtra(): ?float
    {
        return $this->vlExtra;
    }

    public function setVlExtra(?float $vlExtra): self
    {
        $this->vlExtra = $vlExtra;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function isSnCredito(): ?bool
    {
        return $this->snCredito;
    }

    public function setSnCredito(?bool $snCredito): self
    {
        $this->snCredito = $snCredito;
        return $this;
    }

    public function getNrCredito(): ?float
    {
        return $this->nrCredito;
    }

    public function setNrCredito(?float $nrCredito): self
    {
        $this->nrCredito = $nrCredito;
        return $this;
    }

    public function getCdTipoParcela(): ?int
    {
        return $this->cdTipoParcela;
    }

    public function setCdTipoParcela(?int $cdTipoParcela): self
    {
        $this->cdTipoParcela = $cdTipoParcela;
        return $this;
    }

    public function getCdPlanocontas(): ?int
    {
        return $this->cdPlanocontas;
    }

    public function setCdPlanocontas(?int $cdPlanocontas): self
    {
        $this->cdPlanocontas = $cdPlanocontas;
        return $this;
    }

    public function getDsMensa(): ?string
    {
        return $this->dsMensa;
    }

    public function setDsMensa(?string $dsMensa): self
    {
        $this->dsMensa = $dsMensa;
        return $this;
    }

    public function isSnRecibo(): ?bool
    {
        return $this->snRecibo;
    }

    public function setSnRecibo(?bool $snRecibo): self
    {
        $this->snRecibo = $snRecibo;
        return $this;
    }

    public function getCdBolsa(): ?int
    {
        return $this->cdBolsa;
    }

    public function setCdBolsa(?int $cdBolsa): self
    {
        $this->cdBolsa = $cdBolsa;
        return $this;
    }
}
