<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MensaRecorrenciaOperacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensaRecorrenciaOperacaoRepository::class)]
#[ORM\Table(
    name: 'mensa_recorrencia_operacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MensaRecorrenciaOperacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_operacao', type: 'integer')]
    private ?int $cdOperacao = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_codigo_gateway', type: 'integer', nullable: true)]
    private ?int $cdCodigoGateway = null;

    #[ORM\Column(name: 'ds_hash_gateway', type: 'string', length: 255, nullable: true)]
    private ?string $dsHashGateway = null;

    #[ORM\Column(name: 'vl_valor', type: 'float', nullable: true)]
    private ?float $vlValor = null;

    #[ORM\Column(name: 'dt_recorrencia', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecorrencia = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?int $cdCodigoGateway = null,
        ?string $dsHashGateway = null,
        ?float $vlValor = null,
        ?\DateTimeInterface $dtRecorrencia = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->cdCodigoGateway = $cdCodigoGateway;
        $this->dsHashGateway = $dsHashGateway;
        $this->vlValor = $vlValor;
        $this->dtRecorrencia = $dtRecorrencia;
        $this->dtBase = $dtBase;
    }

    public function getCdOperacao(): ?int
    {
        return $this->cdOperacao;
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

    public function getCdCodigoGateway(): ?int
    {
        return $this->cdCodigoGateway;
    }

    public function setCdCodigoGateway(?int $cdCodigoGateway): self
    {
        $this->cdCodigoGateway = $cdCodigoGateway;
        return $this;
    }

    public function getDsHashGateway(): ?string
    {
        return $this->dsHashGateway;
    }

    public function setDsHashGateway(?string $dsHashGateway): self
    {
        $this->dsHashGateway = $dsHashGateway;
        return $this;
    }

    public function getVlValor(): ?float
    {
        return $this->vlValor;
    }

    public function setVlValor(?float $vlValor): self
    {
        $this->vlValor = $vlValor;
        return $this;
    }

    public function getDtRecorrencia(): ?\DateTimeInterface
    {
        return $this->dtRecorrencia;
    }

    public function setDtRecorrencia(?\DateTimeInterface $dtRecorrencia): self
    {
        $this->dtRecorrencia = $dtRecorrencia;
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
