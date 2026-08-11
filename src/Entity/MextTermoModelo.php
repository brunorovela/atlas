<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MextTermoModeloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextTermoModeloRepository::class)]
#[ORM\Table(
    name: 'mext_termo_modelo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MextTermoModelo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_termo_modelo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTermoModelo = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $meDescricao = null
    ) {
        $this->dsNome = $dsNome;
        $this->meDescricao = $meDescricao;
    }

    public function getCdTermoModelo(): ?int
    {
        return $this->cdTermoModelo;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }
}
