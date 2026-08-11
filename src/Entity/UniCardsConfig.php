<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniCardsConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniCardsConfigRepository::class)]
#[ORM\Table(
    name: 'uni_cards_config',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CHAVE_CARD', columns: ['ds_chave_card'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'uni_home_card_cd_layout', 'colunas' => ['cd_layout'], 'tabelaAlvo' => 'uni_cards', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniCardsConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_configuracao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConfiguracao = null;

    #[ORM\ManyToOne(targetEntity: UniCards::class)]
    #[ORM\JoinColumn(name: 'cd_layout', referencedColumnName: 'cd_layout', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?UniCards $cdLayout = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer')]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsSql = null;

    #[ORM\Column(name: 'ds_chave_permissao', type: 'string', length: 255)]
    private ?string $dsChavePermissao = null;

    #[ORM\Column(name: 'ds_nome_card', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeCard = null;

    #[ORM\Column(name: 'ds_chave_card', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveCard = null;

    public function __construct(
        ?UniCards $cdLayout = null,
        ?int $cdModulo = null,
        ?string $dsSql = null,
        ?string $dsChavePermissao = null,
        ?string $dsNomeCard = null,
        ?string $dsChaveCard = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->cdModulo = $cdModulo;
        $this->dsSql = $dsSql;
        $this->dsChavePermissao = $dsChavePermissao;
        $this->dsNomeCard = $dsNomeCard;
        $this->dsChaveCard = $dsChaveCard;
    }

    public function getCdConfiguracao(): ?int
    {
        return $this->cdConfiguracao;
    }

    public function getCdLayout(): ?UniCards
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?UniCards $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getDsSql(): ?string
    {
        return $this->dsSql;
    }

    public function setDsSql(?string $dsSql): self
    {
        $this->dsSql = $dsSql;
        return $this;
    }

    public function getDsChavePermissao(): ?string
    {
        return $this->dsChavePermissao;
    }

    public function setDsChavePermissao(?string $dsChavePermissao): self
    {
        $this->dsChavePermissao = $dsChavePermissao;
        return $this;
    }

    public function getDsNomeCard(): ?string
    {
        return $this->dsNomeCard;
    }

    public function setDsNomeCard(?string $dsNomeCard): self
    {
        $this->dsNomeCard = $dsNomeCard;
        return $this;
    }

    public function getDsChaveCard(): ?string
    {
        return $this->dsChaveCard;
    }

    public function setDsChaveCard(?string $dsChaveCard): self
    {
        $this->dsChaveCard = $dsChaveCard;
        return $this;
    }
}
