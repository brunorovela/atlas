<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimAppMenuVariavelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAppMenuVariavelRepository::class)]
#[ORM\Table(
    name: 'unim_app_menu_variavel',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_UNIM_APP_MENU_VARIAVEL_CD_APP_MENU', columns: ['cd_app_menu'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_app_menu_variavel_ibfk_2', 'colunas' => ['cd_app_menu'], 'tabelaAlvo' => 'unim_app_menu', 'colunasAlvo' => ['cd_app_menu'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimAppMenuVariavel
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_variavel', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVariavel = null;

    #[ORM\ManyToOne(targetEntity: UnimAppMenu::class)]
    #[ORM\JoinColumn(name: 'cd_app_menu', referencedColumnName: 'cd_app_menu', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UnimAppMenu $cdAppMenu = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?UnimAppMenu $cdAppMenu = null,
        ?string $dsNome = null,
        ?string $dsDescricao = null
    ) {
        $this->cdAppMenu = $cdAppMenu;
        $this->dsNome = $dsNome;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdVariavel(): ?int
    {
        return $this->cdVariavel;
    }

    public function getCdAppMenu(): ?UnimAppMenu
    {
        return $this->cdAppMenu;
    }

    public function setCdAppMenu(?UnimAppMenu $cdAppMenu): self
    {
        $this->cdAppMenu = $cdAppMenu;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
