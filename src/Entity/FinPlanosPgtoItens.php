<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinPlanosPgtoItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoItensRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_plano_item', columns: ['cd_plano_item'])]
#[ORM\Index(name: 'IX_CD_PLANO', columns: ['cd_plano'])]
class FinPlanosPgtoItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_item', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPlanoItem = null;

    #[ORM\Column(name: 'cd_plano', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'nr_disc_min', type: 'smallint', nullable: true)]
    private ?int $nrDiscMin = null;

    #[ORM\Column(name: 'nr_disc_max', type: 'smallint', nullable: true)]
    private ?int $nrDiscMax = null;

    #[ORM\Column(name: 'sn_pode_repetir', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snPodeRepetir = 0;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'nr_parcelas', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrParcelas = null;

    #[ORM\Column(name: 'vl_parcela', type: 'float', nullable: true)]
    private ?float $vlParcela = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_primeira_parc', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrimeiraParc = null;

    #[ORM\Column(name: 'sn_dia_util', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snDiaUtil = 0;

    #[ORM\Column(name: 'sn_ultimo_dia_mes', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snUltimoDiaMes = false;

    #[ORM\Column(name: 'DT_SEGUNDA_PARC', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSegundaParc = null;

    public function __construct(
        ?int $cdPlano = null,
        ?int $nrDiscMin = null,
        ?int $nrDiscMax = null,
        ?int $snPodeRepetir = 0,
        ?int $cdTipoTitulo = null,
        ?int $nrParcelas = null,
        ?float $vlParcela = null,
        ?float $vlDesconto = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtPrimeiraParc = null,
        ?int $snDiaUtil = 0,
        ?bool $snUltimoDiaMes = false,
        ?\DateTimeInterface $dtSegundaParc = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->nrDiscMin = $nrDiscMin;
        $this->nrDiscMax = $nrDiscMax;
        $this->snPodeRepetir = $snPodeRepetir;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->nrParcelas = $nrParcelas;
        $this->vlParcela = $vlParcela;
        $this->vlDesconto = $vlDesconto;
        $this->dtInicial = $dtInicial;
        $this->dtPrimeiraParc = $dtPrimeiraParc;
        $this->snDiaUtil = $snDiaUtil;
        $this->snUltimoDiaMes = $snUltimoDiaMes;
        $this->dtSegundaParc = $dtSegundaParc;
    }

    public function getCdPlanoItem(): ?int
    {
        return $this->cdPlanoItem;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function getNrDiscMin(): ?int
    {
        return $this->nrDiscMin;
    }

    public function setNrDiscMin(?int $nrDiscMin): self
    {
        $this->nrDiscMin = $nrDiscMin;
        return $this;
    }

    public function getNrDiscMax(): ?int
    {
        return $this->nrDiscMax;
    }

    public function setNrDiscMax(?int $nrDiscMax): self
    {
        $this->nrDiscMax = $nrDiscMax;
        return $this;
    }

    public function getSnPodeRepetir(): ?int
    {
        return $this->snPodeRepetir;
    }

    public function setSnPodeRepetir(?int $snPodeRepetir): self
    {
        $this->snPodeRepetir = $snPodeRepetir;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getNrParcelas(): ?int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(?int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getVlParcela(): ?float
    {
        return $this->vlParcela;
    }

    public function setVlParcela(?float $vlParcela): self
    {
        $this->vlParcela = $vlParcela;
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

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtPrimeiraParc(): ?\DateTimeInterface
    {
        return $this->dtPrimeiraParc;
    }

    public function setDtPrimeiraParc(?\DateTimeInterface $dtPrimeiraParc): self
    {
        $this->dtPrimeiraParc = $dtPrimeiraParc;
        return $this;
    }

    public function getSnDiaUtil(): ?int
    {
        return $this->snDiaUtil;
    }

    public function setSnDiaUtil(?int $snDiaUtil): self
    {
        $this->snDiaUtil = $snDiaUtil;
        return $this;
    }

    public function isSnUltimoDiaMes(): ?bool
    {
        return $this->snUltimoDiaMes;
    }

    public function setSnUltimoDiaMes(?bool $snUltimoDiaMes): self
    {
        $this->snUltimoDiaMes = $snUltimoDiaMes;
        return $this;
    }

    public function getDtSegundaParc(): ?\DateTimeInterface
    {
        return $this->dtSegundaParc;
    }

    public function setDtSegundaParc(?\DateTimeInterface $dtSegundaParc): self
    {
        $this->dtSegundaParc = $dtSegundaParc;
        return $this;
    }
}
