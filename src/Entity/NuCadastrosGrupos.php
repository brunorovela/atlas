<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuCadastrosGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastrosGruposRepository::class)]
#[ORM\Table(
    name: 'nu_cadastros_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_cadastro_campo_grupo', columns: ['cd_cadastro_campo_grupo'])]
#[ORM\Index(name: 'IX_CD_CADASTRO', columns: ['cd_cadastro'])]
class NuCadastrosGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro_campo_grupo', type: 'integer')]
    private ?int $cdCadastroCampoGrupo = null;

    #[ORM\Column(name: 'ds_grupo', type: 'string', length: 50)]
    private ?string $dsGrupo = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'cd_cadastro', type: 'integer')]
    private ?int $cdCadastro = null;

    #[ORM\Column(name: 'sn_fixo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snFixo = 0;

    public function __construct(
        ?string $dsGrupo = null,
        ?int $nrOrdem = null,
        ?int $cdCadastro = null,
        int $snFixo = 0
    ) {
        $this->dsGrupo = $dsGrupo;
        $this->nrOrdem = $nrOrdem;
        $this->cdCadastro = $cdCadastro;
        $this->snFixo = $snFixo;
    }

    public function getCdCadastroCampoGrupo(): ?int
    {
        return $this->cdCadastroCampoGrupo;
    }

    public function getDsGrupo(): ?string
    {
        return $this->dsGrupo;
    }

    public function setDsGrupo(?string $dsGrupo): self
    {
        $this->dsGrupo = $dsGrupo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getCdCadastro(): ?int
    {
        return $this->cdCadastro;
    }

    public function setCdCadastro(?int $cdCadastro): self
    {
        $this->cdCadastro = $cdCadastro;
        return $this;
    }

    public function getSnFixo(): int
    {
        return $this->snFixo;
    }

    public function setSnFixo(int $snFixo): self
    {
        $this->snFixo = $snFixo;
        return $this;
    }
}
