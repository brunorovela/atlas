<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AcrvPermissaoGrupoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvPermissaoGrupoRepository::class)]
#[ORM\Table(
    name: 'acrv_permissao_grupo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_siga', columns: ['cd_siga'])]
#[ORM\Index(name: 'cd_grupo', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_permissao_grupo_ibfk_1', 'colunas' => ['cd_siga'], 'tabelaAlvo' => 'siga_tabela', 'colunasAlvo' => ['cd_siga'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'acrv_permissao_grupo_ibfk_2', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AcrvPermissaoGrupo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_permissao_acao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPermissaoAcao = 0;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'cd_grupo', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: SigaTabela::class)]
    #[ORM\JoinColumn(name: 'cd_siga', referencedColumnName: 'cd_siga', nullable: false, options: ['default' => '0', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaTabela $cdSiga = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPermissaoAcao = 0,
        ?NuGrupos $cdGrupo = null,
        ?SigaTabela $cdSiga = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPermissaoAcao = $cdPermissaoAcao;
        $this->cdGrupo = $cdGrupo;
        $this->cdSiga = $cdSiga;
        $this->dtBase = $dtBase;
    }

    public function getCdPermissaoAcao(): int
    {
        return $this->cdPermissaoAcao;
    }

    public function setCdPermissaoAcao(int $cdPermissaoAcao): self
    {
        $this->cdPermissaoAcao = $cdPermissaoAcao;
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

    public function getCdSiga(): ?SigaTabela
    {
        return $this->cdSiga;
    }

    public function setCdSiga(?SigaTabela $cdSiga): self
    {
        $this->cdSiga = $cdSiga;
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
