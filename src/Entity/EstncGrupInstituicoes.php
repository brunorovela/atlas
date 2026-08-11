<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGrupInstituicoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGrupInstituicoesRepository::class)]
#[ORM\Table(
    name: 'estnc_grup_instituicoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['CD_INSTITUICAO'])]
class EstncGrupInstituicoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_INSTITUICAO', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdInstituicao = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdInstituicao = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdInstituicao = $cdInstituicao;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }
}
