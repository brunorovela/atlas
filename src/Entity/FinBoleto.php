<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinBoletoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinBoletoRepository::class)]
#[ORM\Table(
    name: 'fin_boleto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_boleto', columns: ['cd_boleto'])]
#[ORM\Index(name: 'IX_CD_RESP_FINAN', columns: ['cd_resp_finan'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class FinBoleto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_boleto', type: 'integer')]
    private ?int $cdBoleto = null;

    #[ORM\Column(name: 'cd_resp_finan', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdRespFinan = 0;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPessoa = 0;

    #[ORM\Column(name: 'nr_nossonumero', type: 'string', length: 50, nullable: true)]
    private ?string $nrNossonumero = null;

    #[ORM\Column(name: 'nr_nossonumero_real', type: 'string', length: 50, nullable: true)]
    private ?string $nrNossonumeroReal = null;

    #[ORM\Column(name: 'dt_impressao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtImpressao = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'vl_boleto', type: 'float', nullable: true)]
    private ?float $vlBoleto = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'cd_conta', type: 'integer', nullable: true)]
    private ?int $cdConta = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'me_log_requisicao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLogRequisicao = null;

    #[ORM\Column(name: 'me_log_resposta', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLogResposta = null;

    #[ORM\Column(name: 'ds_json_mensalidade', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsJsonMensalidade = null;

    public function __construct(
        ?int $cdRespFinan = 0,
        ?int $cdPessoa = 0,
        ?string $nrNossonumero = null,
        ?string $nrNossonumeroReal = null,
        ?\DateTimeInterface $dtImpressao = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?float $vlBoleto = null,
        ?float $vlDesconto = null,
        ?int $cdConta = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtBase = null,
        ?string $meLogRequisicao = null,
        ?string $meLogResposta = null,
        ?string $dsJsonMensalidade = null
    ) {
        $this->cdRespFinan = $cdRespFinan;
        $this->cdPessoa = $cdPessoa;
        $this->nrNossonumero = $nrNossonumero;
        $this->nrNossonumeroReal = $nrNossonumeroReal;
        $this->dtImpressao = $dtImpressao;
        $this->dtVencimento = $dtVencimento;
        $this->vlBoleto = $vlBoleto;
        $this->vlDesconto = $vlDesconto;
        $this->cdConta = $cdConta;
        $this->cdColigada = $cdColigada;
        $this->dtBase = $dtBase;
        $this->meLogRequisicao = $meLogRequisicao;
        $this->meLogResposta = $meLogResposta;
        $this->dsJsonMensalidade = $dsJsonMensalidade;
    }

    public function getCdBoleto(): ?int
    {
        return $this->cdBoleto;
    }

    public function getCdRespFinan(): ?int
    {
        return $this->cdRespFinan;
    }

    public function setCdRespFinan(?int $cdRespFinan): self
    {
        $this->cdRespFinan = $cdRespFinan;
        return $this;
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

    public function getNrNossonumero(): ?string
    {
        return $this->nrNossonumero;
    }

    public function setNrNossonumero(?string $nrNossonumero): self
    {
        $this->nrNossonumero = $nrNossonumero;
        return $this;
    }

    public function getNrNossonumeroReal(): ?string
    {
        return $this->nrNossonumeroReal;
    }

    public function setNrNossonumeroReal(?string $nrNossonumeroReal): self
    {
        $this->nrNossonumeroReal = $nrNossonumeroReal;
        return $this;
    }

    public function getDtImpressao(): ?\DateTimeInterface
    {
        return $this->dtImpressao;
    }

    public function setDtImpressao(?\DateTimeInterface $dtImpressao): self
    {
        $this->dtImpressao = $dtImpressao;
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

    public function getVlBoleto(): ?float
    {
        return $this->vlBoleto;
    }

    public function setVlBoleto(?float $vlBoleto): self
    {
        $this->vlBoleto = $vlBoleto;
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

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }

    public function getMeLogRequisicao(): ?string
    {
        return $this->meLogRequisicao;
    }

    public function setMeLogRequisicao(?string $meLogRequisicao): self
    {
        $this->meLogRequisicao = $meLogRequisicao;
        return $this;
    }

    public function getMeLogResposta(): ?string
    {
        return $this->meLogResposta;
    }

    public function setMeLogResposta(?string $meLogResposta): self
    {
        $this->meLogResposta = $meLogResposta;
        return $this;
    }

    public function getDsJsonMensalidade(): ?string
    {
        return $this->dsJsonMensalidade;
    }

    public function setDsJsonMensalidade(?string $dsJsonMensalidade): self
    {
        $this->dsJsonMensalidade = $dsJsonMensalidade;
        return $this;
    }
}
