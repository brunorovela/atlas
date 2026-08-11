<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinNfeEmitidasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeEmitidasRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_emitidas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_NFE_EMITIDAS', columns: ['cd_mensalidade', 'ds_chave'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_EMITENTE', columns: ['cd_emitente'])]
#[ORM\Index(name: 'IX_NR_RPS', columns: ['nr_rps'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FIN_NFE_G2KA_COLIGADAS_CD_COLIGADA', 'colunas' => ['cd_emitente'], 'tabelaAlvo' => 'fin_nfe_g2ka_coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinNfeEmitidas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfe_emitida', type: 'integer')]
    private ?int $cdNfeEmitida = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 32, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_rps', type: 'integer')]
    private ?int $nrRps = null;

    #[ORM\ManyToOne(targetEntity: FinNfeG2kaColigadas::class)]
    #[ORM\JoinColumn(name: 'cd_emitente', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinNfeG2kaColigadas $cdEmitente = null;

    #[ORM\Column(name: 'sn_enviada', type: 'boolean')]
    private ?bool $snEnviada = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $dsChave = null,
        ?int $nrRps = null,
        ?FinNfeG2kaColigadas $cdEmitente = null,
        ?bool $snEnviada = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->dsChave = $dsChave;
        $this->nrRps = $nrRps;
        $this->cdEmitente = $cdEmitente;
        $this->snEnviada = $snEnviada;
    }

    public function getCdNfeEmitida(): ?int
    {
        return $this->cdNfeEmitida;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
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

    public function getNrRps(): ?int
    {
        return $this->nrRps;
    }

    public function setNrRps(?int $nrRps): self
    {
        $this->nrRps = $nrRps;
        return $this;
    }

    public function getCdEmitente(): ?FinNfeG2kaColigadas
    {
        return $this->cdEmitente;
    }

    public function setCdEmitente(?FinNfeG2kaColigadas $cdEmitente): self
    {
        $this->cdEmitente = $cdEmitente;
        return $this;
    }

    public function isSnEnviada(): ?bool
    {
        return $this->snEnviada;
    }

    public function setSnEnviada(?bool $snEnviada): self
    {
        $this->snEnviada = $snEnviada;
        return $this;
    }
}
