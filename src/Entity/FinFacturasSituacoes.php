<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinFacturasSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinFacturasSituacoesRepository::class)]
#[ORM\Table(
    name: 'fin_facturas_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinFacturasSituacoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_factura_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFacturaSituacao = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 100, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?int $cdFacturaSituacao = null,
        ?string $dsDescricao = null
    ) {
        $this->cdFacturaSituacao = $cdFacturaSituacao;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdFacturaSituacao(): ?int
    {
        return $this->cdFacturaSituacao;
    }

    public function setCdFacturaSituacao(?int $cdFacturaSituacao): self
    {
        $this->cdFacturaSituacao = $cdFacturaSituacao;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
