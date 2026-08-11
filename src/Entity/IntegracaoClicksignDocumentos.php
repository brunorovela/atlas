<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoClicksignDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoClicksignDocumentosRepository::class)]
#[ORM\Table(
    name: 'integracao_clicksign_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_integracao_clicksign_documentos_ambientes', columns: ['cd_clicksign_ambiente'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_integracao_clicksign_documentos_ambientes', 'colunas' => ['cd_clicksign_ambiente'], 'tabelaAlvo' => 'integracao_clicksign_ambientes', 'colunasAlvo' => ['cd_clicksign_ambiente'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoClicksignDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoClicksignAmbientes::class)]
    #[ORM\JoinColumn(name: 'cd_clicksign_ambiente', referencedColumnName: 'cd_clicksign_ambiente', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoClicksignAmbientes $cdClicksignAmbiente = null;

    #[ORM\Column(name: 'ds_key', type: 'string', length: 50)]
    private ?string $dsKey = null;

    #[ORM\Column(name: 'dt_criacao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtCriacao = null;

    #[ORM\Column(name: 'dt_finalizacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinalizacao = null;

    #[ORM\Column(name: 'ds_url_documento_autenticado', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlDocumentoAutenticado = null;

    #[ORM\Column(name: 'sn_sandbox', type: 'boolean', options: ['default' => '0'])]
    private bool $snSandbox = false;

    #[ORM\Column(name: 'dt_cancelamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCancelamento = null;

    public function __construct(
        ?IntegracaoClicksignAmbientes $cdClicksignAmbiente = null,
        ?string $dsKey = null,
        ?\DateTimeInterface $dtCriacao = null,
        ?\DateTimeInterface $dtFinalizacao = null,
        ?string $dsUrlDocumentoAutenticado = null,
        bool $snSandbox = false,
        ?\DateTimeInterface $dtCancelamento = null
    ) {
        $this->cdClicksignAmbiente = $cdClicksignAmbiente;
        $this->dsKey = $dsKey;
        $this->dtCriacao = $dtCriacao;
        $this->dtFinalizacao = $dtFinalizacao;
        $this->dsUrlDocumentoAutenticado = $dsUrlDocumentoAutenticado;
        $this->snSandbox = $snSandbox;
        $this->dtCancelamento = $dtCancelamento;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function getCdClicksignAmbiente(): ?IntegracaoClicksignAmbientes
    {
        return $this->cdClicksignAmbiente;
    }

    public function setCdClicksignAmbiente(?IntegracaoClicksignAmbientes $cdClicksignAmbiente): self
    {
        $this->cdClicksignAmbiente = $cdClicksignAmbiente;
        return $this;
    }

    public function getDsKey(): ?string
    {
        return $this->dsKey;
    }

    public function setDsKey(?string $dsKey): self
    {
        $this->dsKey = $dsKey;
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

    public function getDtFinalizacao(): ?\DateTimeInterface
    {
        return $this->dtFinalizacao;
    }

    public function setDtFinalizacao(?\DateTimeInterface $dtFinalizacao): self
    {
        $this->dtFinalizacao = $dtFinalizacao;
        return $this;
    }

    public function getDsUrlDocumentoAutenticado(): ?string
    {
        return $this->dsUrlDocumentoAutenticado;
    }

    public function setDsUrlDocumentoAutenticado(?string $dsUrlDocumentoAutenticado): self
    {
        $this->dsUrlDocumentoAutenticado = $dsUrlDocumentoAutenticado;
        return $this;
    }

    public function isSnSandbox(): bool
    {
        return $this->snSandbox;
    }

    public function setSnSandbox(bool $snSandbox): self
    {
        $this->snSandbox = $snSandbox;
        return $this;
    }

    public function getDtCancelamento(): ?\DateTimeInterface
    {
        return $this->dtCancelamento;
    }

    public function setDtCancelamento(?\DateTimeInterface $dtCancelamento): self
    {
        $this->dtCancelamento = $dtCancelamento;
        return $this;
    }
}
