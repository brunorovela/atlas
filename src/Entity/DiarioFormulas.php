<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioFormulasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioFormulasRepository::class)]
#[ORM\Table(
    name: 'diario_formulas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE_FORMULA', columns: ['ds_chave_formula'], options: ['lengths' => [20]])]
class DiarioFormulas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_formula', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFormula = null;

    #[ORM\Column(name: 'ds_chave_formula', type: 'string', length: 60, options: ['default' => '\'\''])]
    private string $dsChaveFormula = '\'\'';

    #[ORM\Column(name: 'me_conteudo_formula', type: 'text', length: 16777215)]
    private ?string $meConteudoFormula = null;

    public function __construct(
        string $dsChaveFormula = '\'\'',
        ?string $meConteudoFormula = null
    ) {
        $this->dsChaveFormula = $dsChaveFormula;
        $this->meConteudoFormula = $meConteudoFormula;
    }

    public function getCdFormula(): ?int
    {
        return $this->cdFormula;
    }

    public function getDsChaveFormula(): string
    {
        return $this->dsChaveFormula;
    }

    public function setDsChaveFormula(string $dsChaveFormula): self
    {
        $this->dsChaveFormula = $dsChaveFormula;
        return $this;
    }

    public function getMeConteudoFormula(): ?string
    {
        return $this->meConteudoFormula;
    }

    public function setMeConteudoFormula(?string $meConteudoFormula): self
    {
        $this->meConteudoFormula = $meConteudoFormula;
        return $this;
    }
}
