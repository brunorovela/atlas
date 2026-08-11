<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncCurriculosVariaveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCurriculosVariaveisRepository::class)]
#[ORM\Table(
    name: 'estnc_curriculos_variaveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_ORDEM', columns: ['cd_ordem'])]
class EstncCurriculosVariaveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curriculos_variaveis', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCurriculosVariaveis = null;

    #[ORM\Column(name: 'ds_nome', type: 'text', length: 16777215)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'cd_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdOrdem = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsNome = null,
        ?int $cdTipo = null,
        ?int $cdOrdem = null,
        ?int $snAtivo = null
    ) {
        $this->dsNome = $dsNome;
        $this->cdTipo = $cdTipo;
        $this->cdOrdem = $cdOrdem;
        $this->snAtivo = $snAtivo;
    }

    public function getCdCurriculosVariaveis(): ?int
    {
        return $this->cdCurriculosVariaveis;
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

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdOrdem(): ?int
    {
        return $this->cdOrdem;
    }

    public function setCdOrdem(?int $cdOrdem): self
    {
        $this->cdOrdem = $cdOrdem;
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
