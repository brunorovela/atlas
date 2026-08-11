<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimAppPerfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAppPerfilRepository::class)]
#[ORM\Table(
    name: 'unim_app_perfil',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_UNIM_APP_PERFIL_CD_REGRA_SQL', columns: ['cd_regra_sql'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_app_perfil_ibfk_2', 'colunas' => ['cd_regra_sql'], 'tabelaAlvo' => 'unim_app_regra_sql', 'colunasAlvo' => ['cd_regra_sql'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimAppPerfil
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_app_perfil', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAppPerfil = null;

    #[ORM\ManyToOne(targetEntity: UnimAppRegraSql::class)]
    #[ORM\JoinColumn(name: 'cd_regra_sql', referencedColumnName: 'cd_regra_sql', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppRegraSql $cdRegraSql = null;

    #[ORM\Column(name: 'ds_perfil', type: 'string', length: 255, nullable: true)]
    private ?string $dsPerfil = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UnimAppRegraSql $cdRegraSql = null,
        ?string $dsPerfil = null,
        ?int $snAtivo = 0,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdRegraSql = $cdRegraSql;
        $this->dsPerfil = $dsPerfil;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdAppPerfil(): ?int
    {
        return $this->cdAppPerfil;
    }

    public function getCdRegraSql(): ?UnimAppRegraSql
    {
        return $this->cdRegraSql;
    }

    public function setCdRegraSql(?UnimAppRegraSql $cdRegraSql): self
    {
        $this->cdRegraSql = $cdRegraSql;
        return $this;
    }

    public function getDsPerfil(): ?string
    {
        return $this->dsPerfil;
    }

    public function setDsPerfil(?string $dsPerfil): self
    {
        $this->dsPerfil = $dsPerfil;
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
