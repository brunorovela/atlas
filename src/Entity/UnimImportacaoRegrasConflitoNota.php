<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimImportacaoRegrasConflitoNotaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimImportacaoRegrasConflitoNotaRepository::class)]
#[ORM\Table(
    name: 'unim_importacao_regras_conflito_nota',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
class UnimImportacaoRegrasConflitoNota
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra_conflito_nota', type: 'integer')]
    private ?int $cdRegraConflitoNota = null;

    #[ORM\Column(name: 'ds_regra', type: 'string', length: 255)]
    private ?string $dsRegra = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsRegra = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsRegra = $dsRegra;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdRegraConflitoNota(): ?int
    {
        return $this->cdRegraConflitoNota;
    }

    public function getDsRegra(): ?string
    {
        return $this->dsRegra;
    }

    public function setDsRegra(?string $dsRegra): self
    {
        $this->dsRegra = $dsRegra;
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
