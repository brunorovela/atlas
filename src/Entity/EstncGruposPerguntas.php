<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncGruposPerguntasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncGruposPerguntasRepository::class)]
#[ORM\Table(
    name: 'estnc_grupos_perguntas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncGruposPerguntas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_pergunta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupoPergunta = null;

    #[ORM\Column(name: 'nm_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $nmGrupo = null;

    public function __construct(
        ?string $nmGrupo = null
    ) {
        $this->nmGrupo = $nmGrupo;
    }

    public function getCdGrupoPergunta(): ?int
    {
        return $this->cdGrupoPergunta;
    }

    public function getNmGrupo(): ?string
    {
        return $this->nmGrupo;
    }

    public function setNmGrupo(?string $nmGrupo): self
    {
        $this->nmGrupo = $nmGrupo;
        return $this;
    }
}
