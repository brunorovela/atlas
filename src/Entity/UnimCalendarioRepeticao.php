<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimCalendarioRepeticaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimCalendarioRepeticaoRepository::class)]
#[ORM\Table(
    name: 'unim_calendario_repeticao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimCalendarioRepeticao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_repeticao', type: 'integer')]
    private ?int $cdTipoRepeticao = null;

    #[ORM\Column(name: 'ds_tipo_repeticao', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoRepeticao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsTipoRepeticao = null,
        ?string $dsChave = null
    ) {
        $this->dsTipoRepeticao = $dsTipoRepeticao;
        $this->dsChave = $dsChave;
    }

    public function getCdTipoRepeticao(): ?int
    {
        return $this->cdTipoRepeticao;
    }

    public function getDsTipoRepeticao(): ?string
    {
        return $this->dsTipoRepeticao;
    }

    public function setDsTipoRepeticao(?string $dsTipoRepeticao): self
    {
        $this->dsTipoRepeticao = $dsTipoRepeticao;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}
