<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniGrupoInscricaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniGrupoInscricaoRepository::class)]
#[ORM\Table(
    name: 'uni_grupo_inscricao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniGrupoInscricao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_uni_grupo_inscricao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdUniGrupoInscricao = null;

    #[ORM\Column(name: 'ds_nome_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeGrupo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNomeGrupo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNomeGrupo = $dsNomeGrupo;
        $this->dtBase = $dtBase;
    }

    public function getCdUniGrupoInscricao(): ?int
    {
        return $this->cdUniGrupoInscricao;
    }

    public function getDsNomeGrupo(): ?string
    {
        return $this->dsNomeGrupo;
    }

    public function setDsNomeGrupo(?string $dsNomeGrupo): self
    {
        $this->dsNomeGrupo = $dsNomeGrupo;
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
