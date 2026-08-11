<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\LgtcDespesaSituacaoFluxoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcDespesaSituacaoFluxoRepository::class)]
#[ORM\Table(
    name: 'lgtc_despesa_situacao_fluxo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_SITUACAO_FLUXO_CD_SITUACAO_ORIGEM_CD_SITUACAO_DESTINO', columns: ['CD_SITUACAO_ORIGEM', 'CD_SITUACAO_DESTINO'])]
#[ORM\Index(name: 'FK_SITUACAO_CD_SITUACAO_SITUACAO_FLUXO_CD_SITUACAO_DESTINO', columns: ['CD_SITUACAO_DESTINO'])]
#[ORM\Index(name: 'IDX_806C8B0D66F87371', columns: ['CD_SITUACAO_ORIGEM'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_SITUACAO_CD_SITUACAO_SITUACAO_FLUXO_CD_SITUACAO_DESTINO', 'colunas' => ['CD_SITUACAO_DESTINO'], 'tabelaAlvo' => 'lgtc_despesa_situacao', 'colunasAlvo' => ['CD_SITUACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_SITUACAO_CD_SITUACAO_SITUACAO_FLUXO_CD_SITUACAO_ORIGEM', 'colunas' => ['CD_SITUACAO_ORIGEM'], 'tabelaAlvo' => 'lgtc_despesa_situacao', 'colunasAlvo' => ['CD_SITUACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class LgtcDespesaSituacaoFluxo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_SITUACAO_FLUXO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacaoFluxo = null;

    #[ORM\ManyToOne(targetEntity: LgtcDespesaSituacao::class)]
    #[ORM\JoinColumn(name: 'CD_SITUACAO_ORIGEM', referencedColumnName: 'CD_SITUACAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcDespesaSituacao $cdSituacaoOrigem = null;

    #[ORM\ManyToOne(targetEntity: LgtcDespesaSituacao::class)]
    #[ORM\JoinColumn(name: 'CD_SITUACAO_DESTINO', referencedColumnName: 'CD_SITUACAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcDespesaSituacao $cdSituacaoDestino = null;

    public function __construct(
        ?LgtcDespesaSituacao $cdSituacaoOrigem = null,
        ?LgtcDespesaSituacao $cdSituacaoDestino = null
    ) {
        $this->cdSituacaoOrigem = $cdSituacaoOrigem;
        $this->cdSituacaoDestino = $cdSituacaoDestino;
    }

    public function getCdSituacaoFluxo(): ?int
    {
        return $this->cdSituacaoFluxo;
    }

    public function getCdSituacaoOrigem(): ?LgtcDespesaSituacao
    {
        return $this->cdSituacaoOrigem;
    }

    public function setCdSituacaoOrigem(?LgtcDespesaSituacao $cdSituacaoOrigem): self
    {
        $this->cdSituacaoOrigem = $cdSituacaoOrigem;
        return $this;
    }

    public function getCdSituacaoDestino(): ?LgtcDespesaSituacao
    {
        return $this->cdSituacaoDestino;
    }

    public function setCdSituacaoDestino(?LgtcDespesaSituacao $cdSituacaoDestino): self
    {
        $this->cdSituacaoDestino = $cdSituacaoDestino;
        return $this;
    }
}
