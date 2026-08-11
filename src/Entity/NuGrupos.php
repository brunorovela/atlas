<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\NuGruposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuGruposRepository::class)]
#[ORM\Table(
    name: 'nu_grupos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_grupo', columns: ['cd_grupo'])]
#[ORM\UniqueConstraint(name: 'UK_name', columns: ['ds_nome_grupo'])]
#[ORM\Index(name: 'IX_DS_PAPEL', columns: ['ds_papel'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_nu_grupos_nu_papeis', 'colunas' => ['ds_papel'], 'tabelaAlvo' => 'nu_papeis', 'colunasAlvo' => ['ds_papel'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuGrupos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'ds_nome_grupo', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsNomeGrupo = '';

    #[ORM\Column(name: 'sn_bloqueado', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueado = false;

    #[ORM\Column(name: 'sn_fixo', type: 'boolean', options: ['default' => '0'])]
    private bool $snFixo = false;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dn_papel', type: 'string', length: 15, nullable: true)]
    private ?string $dnPapel = null;

    #[ORM\ManyToOne(targetEntity: NuPapeis::class)]
    #[ORM\JoinColumn(name: 'ds_papel', referencedColumnName: 'ds_papel', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuPapeis $dsPapel = null;

    #[ORM\Column(name: 'cd_menu_inicial', type: 'integer', nullable: true)]
    private ?int $cdMenuInicial = null;

    #[ORM\Column(name: 'id', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'sn_acesso_help_center', type: 'boolean', options: ['default' => '1'])]
    private bool $snAcessoHelpCenter = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        string $dsNomeGrupo = '',
        bool $snBloqueado = false,
        bool $snFixo = false,
        ?int $cdPessoa = null,
        ?string $dnPapel = null,
        ?NuPapeis $dsPapel = null,
        ?int $cdMenuInicial = null,
        ?int $id = null,
        bool $snAcessoHelpCenter = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNomeGrupo = $dsNomeGrupo;
        $this->snBloqueado = $snBloqueado;
        $this->snFixo = $snFixo;
        $this->cdPessoa = $cdPessoa;
        $this->dnPapel = $dnPapel;
        $this->dsPapel = $dsPapel;
        $this->cdMenuInicial = $cdMenuInicial;
        $this->id = $id;
        $this->snAcessoHelpCenter = $snAcessoHelpCenter;
        $this->dtBase = $dtBase;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function getDsNomeGrupo(): string
    {
        return $this->dsNomeGrupo;
    }

    public function setDsNomeGrupo(string $dsNomeGrupo): self
    {
        $this->dsNomeGrupo = $dsNomeGrupo;
        return $this;
    }

    public function isSnBloqueado(): bool
    {
        return $this->snBloqueado;
    }

    public function setSnBloqueado(bool $snBloqueado): self
    {
        $this->snBloqueado = $snBloqueado;
        return $this;
    }

    public function isSnFixo(): bool
    {
        return $this->snFixo;
    }

    public function setSnFixo(bool $snFixo): self
    {
        $this->snFixo = $snFixo;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDnPapel(): ?string
    {
        return $this->dnPapel;
    }

    public function setDnPapel(?string $dnPapel): self
    {
        $this->dnPapel = $dnPapel;
        return $this;
    }

    public function getDsPapel(): ?NuPapeis
    {
        return $this->dsPapel;
    }

    public function setDsPapel(?NuPapeis $dsPapel): self
    {
        $this->dsPapel = $dsPapel;
        return $this;
    }

    public function getCdMenuInicial(): ?int
    {
        return $this->cdMenuInicial;
    }

    public function setCdMenuInicial(?int $cdMenuInicial): self
    {
        $this->cdMenuInicial = $cdMenuInicial;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function isSnAcessoHelpCenter(): bool
    {
        return $this->snAcessoHelpCenter;
    }

    public function setSnAcessoHelpCenter(bool $snAcessoHelpCenter): self
    {
        $this->snAcessoHelpCenter = $snAcessoHelpCenter;
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
