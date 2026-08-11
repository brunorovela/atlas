<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponentePagamentoExpressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponentePagamentoExpressRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_pagamento_express',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_cap_jornada_etapa_componente_pagamento_express', columns: ['cd_jornada_etapa_componente_id'])]
#[ORM\Index(name: 'cjec_pagamento_express_cap_jornada_etapa_componente_FK', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cjec_pagamento_express_cap_jornada_etapa_componente_FK', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponentePagamentoExpress
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'ds_forma_pagamento_boleto', type: 'string', length: 100)]
    private ?string $dsFormaPagamentoBoleto = null;

    #[ORM\Column(name: 'ds_forma_pagamento_pix', type: 'string', length: 100)]
    private ?string $dsFormaPagamentoPix = null;

    #[ORM\Column(name: 'ds_forma_pagamento_cartao', type: 'string', length: 100)]
    private ?string $dsFormaPagamentoCartao = null;

    #[ORM\Column(name: 'ds_forma_pagamento_recorrencia', type: 'string', length: 100)]
    private ?string $dsFormaPagamentoRecorrencia = null;

    #[ORM\Column(name: 'ds_forma_pagamento_parcelamento_operadora', type: 'string', length: 100)]
    private ?string $dsFormaPagamentoParcelamentoOperadora = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?string $dsFormaPagamentoBoleto = null,
        ?string $dsFormaPagamentoPix = null,
        ?string $dsFormaPagamentoCartao = null,
        ?string $dsFormaPagamentoRecorrencia = null,
        ?string $dsFormaPagamentoParcelamentoOperadora = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->dsFormaPagamentoBoleto = $dsFormaPagamentoBoleto;
        $this->dsFormaPagamentoPix = $dsFormaPagamentoPix;
        $this->dsFormaPagamentoCartao = $dsFormaPagamentoCartao;
        $this->dsFormaPagamentoRecorrencia = $dsFormaPagamentoRecorrencia;
        $this->dsFormaPagamentoParcelamentoOperadora = $dsFormaPagamentoParcelamentoOperadora;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function getDsFormaPagamentoBoleto(): ?string
    {
        return $this->dsFormaPagamentoBoleto;
    }

    public function setDsFormaPagamentoBoleto(?string $dsFormaPagamentoBoleto): self
    {
        $this->dsFormaPagamentoBoleto = $dsFormaPagamentoBoleto;
        return $this;
    }

    public function getDsFormaPagamentoPix(): ?string
    {
        return $this->dsFormaPagamentoPix;
    }

    public function setDsFormaPagamentoPix(?string $dsFormaPagamentoPix): self
    {
        $this->dsFormaPagamentoPix = $dsFormaPagamentoPix;
        return $this;
    }

    public function getDsFormaPagamentoCartao(): ?string
    {
        return $this->dsFormaPagamentoCartao;
    }

    public function setDsFormaPagamentoCartao(?string $dsFormaPagamentoCartao): self
    {
        $this->dsFormaPagamentoCartao = $dsFormaPagamentoCartao;
        return $this;
    }

    public function getDsFormaPagamentoRecorrencia(): ?string
    {
        return $this->dsFormaPagamentoRecorrencia;
    }

    public function setDsFormaPagamentoRecorrencia(?string $dsFormaPagamentoRecorrencia): self
    {
        $this->dsFormaPagamentoRecorrencia = $dsFormaPagamentoRecorrencia;
        return $this;
    }

    public function getDsFormaPagamentoParcelamentoOperadora(): ?string
    {
        return $this->dsFormaPagamentoParcelamentoOperadora;
    }

    public function setDsFormaPagamentoParcelamentoOperadora(?string $dsFormaPagamentoParcelamentoOperadora): self
    {
        $this->dsFormaPagamentoParcelamentoOperadora = $dsFormaPagamentoParcelamentoOperadora;
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
