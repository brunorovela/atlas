<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniTermoGrupoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniTermoGrupoRepository::class)]
#[ORM\Table(
    name: 'uni_termo_grupo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_termo_aceite', columns: ['cd_termo_aceite'])]
#[ORM\Index(name: 'cd_grupo', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'uni_termo_grupo_ibfk_1', 'colunas' => ['cd_termo_aceite'], 'tabelaAlvo' => 'uni_termo_aceite', 'colunasAlvo' => ['cd_termo_aceite'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'uni_termo_grupo_ibfk_2', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniTermoGrupo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_termo_grupo', type: 'integer')]
    private ?int $cdTermoGrupo = null;

    #[ORM\ManyToOne(targetEntity: UniTermoAceite::class)]
    #[ORM\JoinColumn(name: 'cd_termo_aceite', referencedColumnName: 'cd_termo_aceite', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniTermoAceite $cdTermoAceite = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniTermoAceite $cdTermoAceite = null,
        ?NuGrupos $cdGrupo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTermoAceite = $cdTermoAceite;
        $this->cdGrupo = $cdGrupo;
        $this->dtBase = $dtBase;
    }

    public function getCdTermoGrupo(): ?int
    {
        return $this->cdTermoGrupo;
    }

    public function getCdTermoAceite(): ?UniTermoAceite
    {
        return $this->cdTermoAceite;
    }

    public function setCdTermoAceite(?UniTermoAceite $cdTermoAceite): self
    {
        $this->cdTermoAceite = $cdTermoAceite;
        return $this;
    }

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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
