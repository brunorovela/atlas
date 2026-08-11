<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FuncionariosTiposAtuacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuncionariosTiposAtuacaoRepository::class)]
#[ORM\Table(
    name: 'funcionarios_tipos_atuacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Index_9C63B2E9_734C_4135', columns: ['cd_tipo_atuacao'])]
class FuncionariosTiposAtuacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_atuacao', type: 'smallint')]
    private ?int $cdTipoAtuacao = null;

    #[ORM\Column(name: 'ds_tipo_atuacao', type: 'string', length: 50, nullable: true)]
    private ?string $dsTipoAtuacao = null;

    public function __construct(
        ?string $dsTipoAtuacao = null
    ) {
        $this->dsTipoAtuacao = $dsTipoAtuacao;
    }

    public function getCdTipoAtuacao(): ?int
    {
        return $this->cdTipoAtuacao;
    }

    public function getDsTipoAtuacao(): ?string
    {
        return $this->dsTipoAtuacao;
    }

    public function setDsTipoAtuacao(?string $dsTipoAtuacao): self
    {
        $this->dsTipoAtuacao = $dsTipoAtuacao;
        return $this;
    }
}
