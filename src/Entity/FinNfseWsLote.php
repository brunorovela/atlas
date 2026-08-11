<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinNfseWsLoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseWsLoteRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_ws_lote',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_LOTE_SITUACAO_CD_SITUACAO', columns: ['CD_SITUACAO'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['CD_SITUACAO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_LOTE_SITUACAO_CD_SITUACAO', 'colunas' => ['CD_SITUACAO'], 'tabelaAlvo' => 'fin_nfse_ws_situacao', 'colunasAlvo' => ['CD_SITUACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinNfseWsLote
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_LOTE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLote = null;

    #[ORM\ManyToOne(targetEntity: FinNfseWsSituacao::class)]
    #[ORM\JoinColumn(name: 'CD_SITUACAO', referencedColumnName: 'CD_SITUACAO', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinNfseWsSituacao $cdSituacao = null;

    #[ORM\Column(name: 'NR_LOTE', type: 'bigint', nullable: true, options: ['unsigned' => true])]
    private ?string $nrLote = null;

    #[ORM\Column(name: 'NR_PROTOCOLO', type: 'string', length: 50, nullable: true, options: ['fixed' => true])]
    private ?string $nrProtocolo = null;

    #[ORM\Column(name: 'DT_RECEBIMENTO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRecebimento = null;

    #[ORM\Column(name: 'DT_ENVIO', type: 'datetime')]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'DT_CRIACAO', type: 'datetime')]
    private ?\DateTimeInterface $dtCriacao = null;

    #[ORM\Column(name: 'SN_EXCLUIDO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snExcluido = 0;

    public function __construct(
        ?FinNfseWsSituacao $cdSituacao = null,
        ?string $nrLote = null,
        ?string $nrProtocolo = null,
        ?\DateTimeInterface $dtRecebimento = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?\DateTimeInterface $dtCriacao = null,
        int $snExcluido = 0
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->nrLote = $nrLote;
        $this->nrProtocolo = $nrProtocolo;
        $this->dtRecebimento = $dtRecebimento;
        $this->dtEnvio = $dtEnvio;
        $this->dtCriacao = $dtCriacao;
        $this->snExcluido = $snExcluido;
    }

    public function getCdLote(): ?int
    {
        return $this->cdLote;
    }

    public function getCdSituacao(): ?FinNfseWsSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?FinNfseWsSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrLote(): ?string
    {
        return $this->nrLote;
    }

    public function setNrLote(?string $nrLote): self
    {
        $this->nrLote = $nrLote;
        return $this;
    }

    public function getNrProtocolo(): ?string
    {
        return $this->nrProtocolo;
    }

    public function setNrProtocolo(?string $nrProtocolo): self
    {
        $this->nrProtocolo = $nrProtocolo;
        return $this;
    }

    public function getDtRecebimento(): ?\DateTimeInterface
    {
        return $this->dtRecebimento;
    }

    public function setDtRecebimento(?\DateTimeInterface $dtRecebimento): self
    {
        $this->dtRecebimento = $dtRecebimento;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getDtCriacao(): ?\DateTimeInterface
    {
        return $this->dtCriacao;
    }

    public function setDtCriacao(?\DateTimeInterface $dtCriacao): self
    {
        $this->dtCriacao = $dtCriacao;
        return $this;
    }

    public function getSnExcluido(): int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
