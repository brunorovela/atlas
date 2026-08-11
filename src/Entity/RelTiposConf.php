<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RelTiposConfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelTiposConfRepository::class)]
#[ORM\Table(
    name: 'rel_tipos_conf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_confs_ds_chave', columns: ['cd_tipo', 'ds_chave'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_tipos_cd_tipo', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'rel_tipos', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RelTiposConf
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo_conf', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipoConf = null;

    #[ORM\ManyToOne(targetEntity: RelTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RelTipos $cdTipo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 30)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'me_conteudo', type: 'text', length: 65535)]
    private ?string $meConteudo = null;

    public function __construct(
        ?int $cdTipoConf = null,
        ?RelTipos $cdTipo = null,
        ?string $dsChave = null,
        ?string $meConteudo = null
    ) {
        $this->cdTipoConf = $cdTipoConf;
        $this->cdTipo = $cdTipo;
        $this->dsChave = $dsChave;
        $this->meConteudo = $meConteudo;
    }

    public function getCdTipoConf(): ?int
    {
        return $this->cdTipoConf;
    }

    public function setCdTipoConf(?int $cdTipoConf): self
    {
        $this->cdTipoConf = $cdTipoConf;
        return $this;
    }

    public function getCdTipo(): ?RelTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?RelTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
        return $this;
    }
}
