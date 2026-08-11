<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuGruposPessoasPolosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposPessoasPolosRepository::class)]
#[ORM\Table(
    name: 'nu_grupos_pessoas_polos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_CD_GRUPO_PESSOA_CD_POLO', columns: ['cd_grupo_pessoa', 'cd_polo'])]
#[ORM\Index(name: 'IX_CD_POLO_UNIM_POLO', columns: ['cd_polo'])]
#[ORM\Index(name: 'IX_CD_GRUPO_PESSOA', columns: ['cd_grupo_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_GRUPO_PESSOA_NU_GRUPOS_PESSOAS', 'colunas' => ['cd_grupo_pessoa'], 'tabelaAlvo' => 'nu_grupos_pessoas', 'colunasAlvo' => ['cd_grupo_pessoa'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'FK_CD_POLO_UNIM_POLO', 'colunas' => ['cd_polo'], 'tabelaAlvo' => 'unim_polo', 'colunasAlvo' => ['cd_polo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuGruposPessoasPolos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_pessoa_polo', type: 'integer')]
    private ?int $cdGrupoPessoaPolo = null;

    #[ORM\ManyToOne(targetEntity: NuGruposPessoas::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_pessoa', referencedColumnName: 'cd_grupo_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGruposPessoas $cdGrupoPessoa = null;

    #[ORM\ManyToOne(targetEntity: UnimPolo::class)]
    #[ORM\JoinColumn(name: 'cd_polo', referencedColumnName: 'cd_polo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimPolo $cdPolo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?NuGruposPessoas $cdGrupoPessoa = null,
        ?UnimPolo $cdPolo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdGrupoPessoa = $cdGrupoPessoa;
        $this->cdPolo = $cdPolo;
        $this->dtBase = $dtBase;
    }

    public function getCdGrupoPessoaPolo(): ?int
    {
        return $this->cdGrupoPessoaPolo;
    }

    public function getCdGrupoPessoa(): ?NuGruposPessoas
    {
        return $this->cdGrupoPessoa;
    }

    public function setCdGrupoPessoa(?NuGruposPessoas $cdGrupoPessoa): self
    {
        $this->cdGrupoPessoa = $cdGrupoPessoa;
        return $this;
    }

    public function getCdPolo(): ?UnimPolo
    {
        return $this->cdPolo;
    }

    public function setCdPolo(?UnimPolo $cdPolo): self
    {
        $this->cdPolo = $cdPolo;
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
