<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PintTipoAnulacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintTipoAnulacaoRepository::class)]
#[ORM\Table(
    name: 'pint_tipo_anulacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PintTipoAnulacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_anulacao', type: 'integer')]
    private ?int $cdTipoAnulacao = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?int $snAtivo = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdTipoAnulacao(): ?int
    {
        return $this->cdTipoAnulacao;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
