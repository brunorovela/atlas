<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauAtivTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauAtivTipoRepository::class)]
#[ORM\Table(
    name: 'plau_ativ_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_AVALIACAO', columns: ['cd_tipo_avaliacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_ativ_tipo_ibfk_1', 'colunas' => ['cd_tipo_avaliacao'], 'tabelaAlvo' => 'avaliacoes_tipos', 'colunasAlvo' => ['cd_avaliacao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauAtivTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\ManyToOne(targetEntity: AvaliacoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_avaliacao', referencedColumnName: 'cd_avaliacao_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AvaliacoesTipos $cdTipoAvaliacao = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?AvaliacoesTipos $cdTipoAvaliacao = null,
        ?string $dsDescricao = null,
        ?int $snAtivo = null
    ) {
        $this->cdTipoAvaliacao = $cdTipoAvaliacao;
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getCdTipoAvaliacao(): ?AvaliacoesTipos
    {
        return $this->cdTipoAvaliacao;
    }

    public function setCdTipoAvaliacao(?AvaliacoesTipos $cdTipoAvaliacao): self
    {
        $this->cdTipoAvaliacao = $cdTipoAvaliacao;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
