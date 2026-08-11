<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieMensalidadePagamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieMensalidadePagamentoRepository::class)]
#[ORM\Table(
    name: 'omie_mensalidade_pagamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_MOVIMENTO_TE', columns: ['cd_movimento_te'])]
#[ORM\Index(name: 'IX_OMIE_MENSALIDADE_INTEGRACAO', columns: ['cd_integracao_omie', 'cd_mensalidade'])]
#[ORM\Index(name: 'IX_OMIE_MENSALIDADE_PAGAMENTO_INTEGRACAO', columns: ['cd_integracao_omie', 'cd_movimento_te'])]
class OmieMensalidadePagamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_mensalidade_pagamento', type: 'integer')]
    private ?int $cdOmieMensalidadePagamento = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint', nullable: true)]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 10, nullable: true)]
    private ?string $cdChave = null;

    #[ORM\Column(name: 'cd_movimento_te', type: 'integer', nullable: true)]
    private ?int $cdMovimentoTe = null;

    #[ORM\Column(name: 'cd_movimento_te_omie', type: 'bigint')]
    private ?string $cdMovimentoTeOmie = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?int $cdMensalidade = null,
        ?string $cdChave = null,
        ?int $cdMovimentoTe = null,
        ?string $cdMovimentoTeOmie = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->cdMensalidade = $cdMensalidade;
        $this->cdChave = $cdChave;
        $this->cdMovimentoTe = $cdMovimentoTe;
        $this->cdMovimentoTeOmie = $cdMovimentoTeOmie;
        $this->dtBase = $dtBase;
    }

    public function getCdOmieMensalidadePagamento(): ?int
    {
        return $this->cdOmieMensalidadePagamento;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdChave(): ?string
    {
        return $this->cdChave;
    }

    public function setCdChave(?string $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getCdMovimentoTe(): ?int
    {
        return $this->cdMovimentoTe;
    }

    public function setCdMovimentoTe(?int $cdMovimentoTe): self
    {
        $this->cdMovimentoTe = $cdMovimentoTe;
        return $this;
    }

    public function getCdMovimentoTeOmie(): ?string
    {
        return $this->cdMovimentoTeOmie;
    }

    public function setCdMovimentoTeOmie(?string $cdMovimentoTeOmie): self
    {
        $this->cdMovimentoTeOmie = $cdMovimentoTeOmie;
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
