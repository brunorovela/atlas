<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvlEnumeracoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlEnumeracoesRepository::class)]
#[ORM\Table(
    name: 'avl_enumeracoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_cd_enumeracao', columns: ['cd_enumeracao'])]
class AvlEnumeracoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_enumeracao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEnumeracao = null;

    #[ORM\Column(name: 'cd_tipo', type: TinyIntType::NAME, options: ['unsigned' => true, 'comment' => 'Código dos tipos de enumerações, 1 - Questões, 2 - Alternativas'])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_enumeracao', type: 'string', length: 50)]
    private ?string $dsEnumeracao = null;

    #[ORM\Column(name: 'ds_classe', type: 'string', length: 50, nullable: true)]
    private ?string $dsClasse = null;

    public function __construct(
        ?int $cdTipo = null,
        ?string $dsEnumeracao = null,
        ?string $dsClasse = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->dsEnumeracao = $dsEnumeracao;
        $this->dsClasse = $dsClasse;
    }

    public function getCdEnumeracao(): ?int
    {
        return $this->cdEnumeracao;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsEnumeracao(): ?string
    {
        return $this->dsEnumeracao;
    }

    public function setDsEnumeracao(?string $dsEnumeracao): self
    {
        $this->dsEnumeracao = $dsEnumeracao;
        return $this;
    }

    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    public function setDsClasse(?string $dsClasse): self
    {
        $this->dsClasse = $dsClasse;
        return $this;
    }
}
