<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinOrcamentoParecerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentoParecerRepository::class)]
#[ORM\Table(
    name: 'fin_orcamento_parecer',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ORCAMENTO_PARECER', columns: ['cd_orcamento_parecer'])]
#[ORM\Index(name: 'IX_CD_PERIODO', columns: ['cd_periodo'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_ORCAMENTO', columns: ['cd_orcamento'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_DS_GRUPO', columns: ['ds_grupo'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_SN_TOTAL_ANO', columns: ['sn_total_ano'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_orcamento_parecer']
)]
class FinOrcamentoParecer
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento_parecer', type: 'integer')]
    private ?int $cdOrcamentoParecer = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_periodo', type: 'string', length: 50)]
    private ?string $cdPeriodo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento', type: 'integer')]
    private ?int $cdOrcamento = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['default' => '0'])]
    private int $cdConta = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 30, options: ['default' => ''])]
    private string $dsGrupo = '';

    #[ORM\Id]
    #[ORM\Column(name: 'sn_total_ano', type: 'boolean', options: ['default' => '0'])]
    private bool $snTotalAno = false;

    #[ORM\Column(name: 'vl_orcado', type: 'float', nullable: true)]
    private ?float $vlOrcado = null;

    #[ORM\Column(name: 'vl_realizado', type: 'float', nullable: true)]
    private ?float $vlRealizado = null;

    #[ORM\Column(name: 'vl_saldo', type: 'float', nullable: true)]
    private ?float $vlSaldo = null;

    #[ORM\Column(name: 'vl_variacao', type: 'float', nullable: true)]
    private ?float $vlVariacao = null;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 30, nullable: true)]
    private ?string $dsCor = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_aberto', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAberto = false;

    #[ORM\Column(name: 'dt_limite_resposta', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtLimiteResposta = null;

    public function __construct(
        ?int $cdOrcamentoParecer = null,
        ?string $cdPeriodo = null,
        ?int $cdOrcamento = null,
        int $cdConta = 0,
        string $dsGrupo = '',
        bool $snTotalAno = false,
        ?float $vlOrcado = null,
        ?float $vlRealizado = null,
        ?float $vlSaldo = null,
        ?float $vlVariacao = null,
        ?string $dsCor = null,
        ?int $nrOrdem = null,
        ?bool $snAberto = false,
        ?\DateTimeInterface $dtLimiteResposta = null
    ) {
        $this->cdOrcamentoParecer = $cdOrcamentoParecer;
        $this->cdPeriodo = $cdPeriodo;
        $this->cdOrcamento = $cdOrcamento;
        $this->cdConta = $cdConta;
        $this->dsGrupo = $dsGrupo;
        $this->snTotalAno = $snTotalAno;
        $this->vlOrcado = $vlOrcado;
        $this->vlRealizado = $vlRealizado;
        $this->vlSaldo = $vlSaldo;
        $this->vlVariacao = $vlVariacao;
        $this->dsCor = $dsCor;
        $this->nrOrdem = $nrOrdem;
        $this->snAberto = $snAberto;
        $this->dtLimiteResposta = $dtLimiteResposta;
    }

    public function getCdOrcamentoParecer(): ?int
    {
        return $this->cdOrcamentoParecer;
    }

    public function setCdOrcamentoParecer(?int $cdOrcamentoParecer): self
    {
        $this->cdOrcamentoParecer = $cdOrcamentoParecer;
        return $this;
    }

    public function getCdPeriodo(): ?string
    {
        return $this->cdPeriodo;
    }

    public function setCdPeriodo(?string $cdPeriodo): self
    {
        $this->cdPeriodo = $cdPeriodo;
        return $this;
    }

    public function getCdOrcamento(): ?int
    {
        return $this->cdOrcamento;
    }

    public function setCdOrcamento(?int $cdOrcamento): self
    {
        $this->cdOrcamento = $cdOrcamento;
        return $this;
    }

    public function getCdConta(): int
    {
        return $this->cdConta;
    }

    public function setCdConta(int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getDsGrupo(): string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function isSnTotalAno(): bool
    {
        return $this->snTotalAno;
    }

    public function setSnTotalAno(bool $snTotalAno): self
    {
        $this->snTotalAno = $snTotalAno;
        return $this;
    }

    public function getVlOrcado(): ?float
    {
        return $this->vlOrcado;
    }

    public function setVlOrcado(?float $vlOrcado): self
    {
        $this->vlOrcado = $vlOrcado;
        return $this;
    }

    public function getVlRealizado(): ?float
    {
        return $this->vlRealizado;
    }

    public function setVlRealizado(?float $vlRealizado): self
    {
        $this->vlRealizado = $vlRealizado;
        return $this;
    }

    public function getVlSaldo(): ?float
    {
        return $this->vlSaldo;
    }

    public function setVlSaldo(?float $vlSaldo): self
    {
        $this->vlSaldo = $vlSaldo;
        return $this;
    }

    public function getVlVariacao(): ?float
    {
        return $this->vlVariacao;
    }

    public function setVlVariacao(?float $vlVariacao): self
    {
        $this->vlVariacao = $vlVariacao;
        return $this;
    }

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnAberto(): ?bool
    {
        return $this->snAberto;
    }

    public function setSnAberto(?bool $snAberto): self
    {
        $this->snAberto = $snAberto;
        return $this;
    }

    public function getDtLimiteResposta(): ?\DateTimeInterface
    {
        return $this->dtLimiteResposta;
    }

    public function setDtLimiteResposta(?\DateTimeInterface $dtLimiteResposta): self
    {
        $this->dtLimiteResposta = $dtLimiteResposta;
        return $this;
    }
}
