<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncEmpresasPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncEmpresasPessoasRepository::class)]
#[ORM\Table(
    name: 'estnc_empresas_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_NC_EP', columns: ['CD_EMPRESA', 'CD_PESSOA', 'CD_GRUPO'])]
#[ORM\Index(name: 'IX_NC_EP_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_EMPRESA', columns: ['CD_EMPRESA'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_EMPRESAS_CD_GRUPO', 'colunas' => ['CD_GRUPO'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_EMPRESAS_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncEmpresasPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_EMPRESA', type: 'integer')]
    private ?int $cdEmpresa = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'CD_GRUPO', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    public function __construct(
        ?int $cdEmpresa = null,
        ?Pessoas $cdPessoa = null,
        ?NuGrupos $cdGrupo = null
    ) {
        $this->cdEmpresa = $cdEmpresa;
        $this->cdPessoa = $cdPessoa;
        $this->cdGrupo = $cdGrupo;
    }

    public function getCdEmpresa(): ?int
    {
        return $this->cdEmpresa;
    }

    public function setCdEmpresa(?int $cdEmpresa): self
    {
        $this->cdEmpresa = $cdEmpresa;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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
}
