<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleVariaveisTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleVariaveisTiposRepository::class)]
#[ORM\Table(
    name: 'ple_variaveis_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PleVariaveisTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_variavel_tipo', type: 'integer')]
    private ?int $cdVariavelTipo = null;

    #[ORM\Column(name: 'ds_chave_tipo', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsChaveTipo = '';

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsTipo = '';

    public function __construct(
        string $dsChaveTipo = '',
        string $dsTipo = ''
    ) {
        $this->dsChaveTipo = $dsChaveTipo;
        $this->dsTipo = $dsTipo;
    }

    public function getCdVariavelTipo(): ?int
    {
        return $this->cdVariavelTipo;
    }

    public function getDsChaveTipo(): string
    {
        return $this->dsChaveTipo;
    }

    public function setDsChaveTipo(string $dsChaveTipo): self
    {
        $this->dsChaveTipo = $dsChaveTipo;
        return $this;
    }

    public function getDsTipo(): string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }
}
