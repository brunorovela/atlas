<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinNfceEnviadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfceEnviadasRepository::class)]
#[ORM\Table(
    name: 'fin_nfce_enviadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_NFCE_ENVIADAS_CD_COLIGADA_NFE_COLIGADAS_CD_COLIGADAS', columns: ['CD_COLIGADA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FIN_NFCE_ENVIADAS_CD_COLIGADA_NFE_COLIGADAS_CD_COLIGADAS', 'colunas' => ['CD_COLIGADA'], 'tabelaAlvo' => 'fin_nfe_g2ka_coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinNfceEnviadas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_NFCE_ENVIADA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNfceEnviada = null;

    #[ORM\ManyToOne(targetEntity: FinNfeG2kaColigadas::class)]
    #[ORM\JoinColumn(name: 'CD_COLIGADA', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FinNfeG2kaColigadas $cdColigada = null;

    #[ORM\Column(name: 'NR_NOTA', type: 'bigint', options: ['unsigned' => true])]
    private ?string $nrNota = null;

    #[ORM\Column(name: 'NR_ALEATORIO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAleatorio = null;

    #[ORM\Column(name: 'NR_CDV', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrCdv = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'VL_NOTA', type: 'decimal', precision: 15, scale: 9, nullable: true)]
    private ?string $vlNota = null;

    #[ORM\Column(name: 'CD_STATUS_PREFEITURA', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdStatusPrefeitura = null;

    #[ORM\Column(name: 'DS_RETORNO', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'DT_ENVIO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'DS_XML', type: 'text', nullable: true)]
    private ?string $dsXml = null;

    #[ORM\Column(name: 'SN_NFC_CPF_ENVIADO', type: 'boolean', options: ['default' => '0'])]
    private bool $snNfcCpfEnviado = false;

    public function __construct(
        ?FinNfeG2kaColigadas $cdColigada = null,
        ?string $nrNota = null,
        ?int $nrAleatorio = null,
        ?int $nrCdv = null,
        ?string $dsChave = null,
        ?string $vlNota = null,
        ?int $cdStatusPrefeitura = null,
        ?string $dsRetorno = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?string $dsXml = null,
        bool $snNfcCpfEnviado = false
    ) {
        $this->cdColigada = $cdColigada;
        $this->nrNota = $nrNota;
        $this->nrAleatorio = $nrAleatorio;
        $this->nrCdv = $nrCdv;
        $this->dsChave = $dsChave;
        $this->vlNota = $vlNota;
        $this->cdStatusPrefeitura = $cdStatusPrefeitura;
        $this->dsRetorno = $dsRetorno;
        $this->dtEnvio = $dtEnvio;
        $this->dsXml = $dsXml;
        $this->snNfcCpfEnviado = $snNfcCpfEnviado;
    }

    public function getCdNfceEnviada(): ?int
    {
        return $this->cdNfceEnviada;
    }

    public function getCdColigada(): ?FinNfeG2kaColigadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?FinNfeG2kaColigadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getNrNota(): ?string
    {
        return $this->nrNota;
    }

    public function setNrNota(?string $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }

    public function getNrAleatorio(): ?int
    {
        return $this->nrAleatorio;
    }

    public function setNrAleatorio(?int $nrAleatorio): self
    {
        $this->nrAleatorio = $nrAleatorio;
        return $this;
    }

    public function getNrCdv(): ?int
    {
        return $this->nrCdv;
    }

    public function setNrCdv(?int $nrCdv): self
    {
        $this->nrCdv = $nrCdv;
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

    public function getVlNota(): ?string
    {
        return $this->vlNota;
    }

    public function setVlNota(?string $vlNota): self
    {
        $this->vlNota = $vlNota;
        return $this;
    }

    public function getCdStatusPrefeitura(): ?int
    {
        return $this->cdStatusPrefeitura;
    }

    public function setCdStatusPrefeitura(?int $cdStatusPrefeitura): self
    {
        $this->cdStatusPrefeitura = $cdStatusPrefeitura;
        return $this;
    }

    public function getDsRetorno(): ?string
    {
        return $this->dsRetorno;
    }

    public function setDsRetorno(?string $dsRetorno): self
    {
        $this->dsRetorno = $dsRetorno;
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

    public function getDsXml(): ?string
    {
        return $this->dsXml;
    }

    public function setDsXml(?string $dsXml): self
    {
        $this->dsXml = $dsXml;
        return $this;
    }

    public function isSnNfcCpfEnviado(): bool
    {
        return $this->snNfcCpfEnviado;
    }

    public function setSnNfcCpfEnviado(bool $snNfcCpfEnviado): self
    {
        $this->snNfcCpfEnviado = $snNfcCpfEnviado;
        return $this;
    }
}
