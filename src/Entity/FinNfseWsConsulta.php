<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinNfseWsConsultaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseWsConsultaRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_ws_consulta',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CONSULTA_SERVICO_CD_SERVICO', columns: ['CD_SERVICO'])]
#[ORM\Index(name: 'IX_CD_LOTE', columns: ['CD_LOTE'])]
#[ORM\Index(name: 'IX_CD_SERVICO', columns: ['CD_SERVICO'])]
#[ORM\Index(name: 'IX_DT_CONSULTA', columns: ['DT_CONSULTA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONSULTA_SERVICO_CD_SERVICO', 'colunas' => ['CD_SERVICO'], 'tabelaAlvo' => 'fin_nfse_ws_servico', 'colunasAlvo' => ['CD_SERVICO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_WS_CONSULTA_WS_LOTE_CD_LOTE', 'colunas' => ['CD_LOTE'], 'tabelaAlvo' => 'fin_nfse_ws_lote', 'colunasAlvo' => ['CD_LOTE'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinNfseWsConsulta
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: FinNfseWsLote::class)]
    #[ORM\JoinColumn(name: 'CD_LOTE', referencedColumnName: 'CD_LOTE', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinNfseWsLote $cdLote = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: FinNfseWsServico::class)]
    #[ORM\JoinColumn(name: 'CD_SERVICO', referencedColumnName: 'CD_SERVICO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinNfseWsServico $cdServico = null;

    #[ORM\Id]
    #[ORM\Column(name: 'DT_CONSULTA', type: 'datetime')]
    private ?\DateTimeInterface $dtConsulta = null;

    public function __construct(
        ?FinNfseWsLote $cdLote = null,
        ?FinNfseWsServico $cdServico = null,
        ?\DateTimeInterface $dtConsulta = null
    ) {
        $this->cdLote = $cdLote;
        $this->cdServico = $cdServico;
        $this->dtConsulta = $dtConsulta;
    }

    public function getCdLote(): ?FinNfseWsLote
    {
        return $this->cdLote;
    }

    public function setCdLote(?FinNfseWsLote $cdLote): self
    {
        $this->cdLote = $cdLote;
        return $this;
    }

    public function getCdServico(): ?FinNfseWsServico
    {
        return $this->cdServico;
    }

    public function setCdServico(?FinNfseWsServico $cdServico): self
    {
        $this->cdServico = $cdServico;
        return $this;
    }

    public function getDtConsulta(): ?\DateTimeInterface
    {
        return $this->dtConsulta;
    }

    public function setDtConsulta(?\DateTimeInterface $dtConsulta): self
    {
        $this->dtConsulta = $dtConsulta;
        return $this;
    }
}
