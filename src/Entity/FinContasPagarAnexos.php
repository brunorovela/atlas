<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinContasPagarAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinContasPagarAnexosRepository::class)]
#[ORM\Table(
    name: 'fin_contas_pagar_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_fin_contas_pagar_anexos_titulo', columns: ['CD_TITULO'])]
class FinContasPagarAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ANEXO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'CD_TITULO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'CD_COLIGADA', type: 'smallint')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'DT_INCLUSAO', type: 'datetime')]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'BB_ANEXO', type: 'blob', nullable: true)]
    private ?string $bbAnexo = null;

    #[ORM\Column(name: 'DS_EXTENSAO', type: 'string', length: 255, nullable: true)]
    private ?string $dsExtensao = null;

    public function __construct(
        ?int $cdTitulo = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?string $dsObservacao = null,
        ?string $bbAnexo = null,
        ?string $dsExtensao = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdColigada = $cdColigada;
        $this->dtInclusao = $dtInclusao;
        $this->dsObservacao = $dsObservacao;
        $this->bbAnexo = $bbAnexo;
        $this->dsExtensao = $dsExtensao;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
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

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
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

    public function getBbAnexo(): ?string
    {
        return $this->bbAnexo;
    }

    public function setBbAnexo(?string $bbAnexo): self
    {
        $this->bbAnexo = $bbAnexo;
        return $this;
    }

    public function getDsExtensao(): ?string
    {
        return $this->dsExtensao;
    }

    public function setDsExtensao(?string $dsExtensao): self
    {
        $this->dsExtensao = $dsExtensao;
        return $this;
    }
}
