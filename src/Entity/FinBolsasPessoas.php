<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinBolsasPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinBolsasPessoasRepository::class)]
#[ORM\Table(
    name: 'fin_bolsas_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_bolsa_pessoa', columns: ['cd_bolsa_pessoa'])]
#[ORM\Index(name: 'IX_CD_BOLSA', columns: ['cd_bolsa'])]
#[ORM\Index(name: 'IX_CD_ALUNO', columns: ['cd_aluno'])]
#[ORM\Index(name: 'IX_CD_RESP', columns: ['cd_resp'])]
class FinBolsasPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bolsa_pessoa', type: 'integer')]
    private ?int $cdBolsaPessoa = null;

    #[ORM\Column(name: 'cd_bolsa', type: 'integer', nullable: true)]
    private ?int $cdBolsa = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_termino', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtTermino = null;

    #[ORM\Column(name: 'vl_percentual', type: 'float', nullable: true)]
    private ?float $vlPercentual = null;

    #[ORM\Column(name: 'vl_fixo', type: 'float', nullable: true)]
    private ?float $vlFixo = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 100, nullable: true)]
    private ?string $dsHistorico = null;

    public function __construct(
        ?int $cdBolsa = null,
        ?int $cdAluno = null,
        ?int $cdResp = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtTermino = null,
        ?float $vlPercentual = null,
        ?float $vlFixo = null,
        ?string $dsHistorico = null
    ) {
        $this->cdBolsa = $cdBolsa;
        $this->cdAluno = $cdAluno;
        $this->cdResp = $cdResp;
        $this->dtInicio = $dtInicio;
        $this->dtTermino = $dtTermino;
        $this->vlPercentual = $vlPercentual;
        $this->vlFixo = $vlFixo;
        $this->dsHistorico = $dsHistorico;
    }

    public function getCdBolsaPessoa(): ?int
    {
        return $this->cdBolsaPessoa;
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

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtTermino(): ?\DateTimeInterface
    {
        return $this->dtTermino;
    }

    public function setDtTermino(?\DateTimeInterface $dtTermino): self
    {
        $this->dtTermino = $dtTermino;
        return $this;
    }

    public function getVlPercentual(): ?float
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(?float $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }

    public function getVlFixo(): ?float
    {
        return $this->vlFixo;
    }

    public function setVlFixo(?float $vlFixo): self
    {
        $this->vlFixo = $vlFixo;
        return $this;
    }

    public function getDsHistorico(): ?string
    {
        return $this->dsHistorico;
    }

    public function setDsHistorico(?string $dsHistorico): self
    {
        $this->dsHistorico = $dsHistorico;
        return $this;
    }
}
