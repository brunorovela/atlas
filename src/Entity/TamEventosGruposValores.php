<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamEventosGruposValoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosGruposValoresRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_grupos_valores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Mantem os valores cobrados aos grupos de um evento.']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_EVENTOS_GRUPOS_VALORES', columns: ['cd_grupo', 'cd_evento'])]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['cd_evento'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_eventos_grupos_valores_ibfk_1', 'colunas' => ['cd_evento'], 'tabelaAlvo' => 'tam_eventos', 'colunasAlvo' => ['CD_EVENTO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class TamEventosGruposValores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_evt_grupo_valor', type: 'integer', options: ['unsigned' => true, 'comment' => 'Chave primária'])]
    private ?int $cdEvtGrupoValor = null;

    #[ORM\ManyToOne(targetEntity: TamEventos::class)]
    #[ORM\JoinColumn(name: 'cd_evento', referencedColumnName: 'CD_EVENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => 'Código do evento'])]
    private ?TamEventos $cdEvento = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', options: ['unsigned' => true, 'default' => '0', 'comment' => 'Grupo na nu_grupos'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'vl_inscricao', type: 'float', options: ['default' => '0.00', 'comment' => 'Valor a ser cobrado.'])]
    private float $vlInscricao = 0.0;

    public function __construct(
        ?TamEventos $cdEvento = null,
        int $cdGrupo = 0,
        float $vlInscricao = 0.0
    ) {
        $this->cdEvento = $cdEvento;
        $this->cdGrupo = $cdGrupo;
        $this->vlInscricao = $vlInscricao;
    }

    public function getCdEvtGrupoValor(): ?int
    {
        return $this->cdEvtGrupoValor;
    }

    public function getCdEvento(): ?TamEventos
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?TamEventos $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getVlInscricao(): float
    {
        return $this->vlInscricao;
    }

    public function setVlInscricao(float $vlInscricao): self
    {
        $this->vlInscricao = $vlInscricao;
        return $this;
    }
}
