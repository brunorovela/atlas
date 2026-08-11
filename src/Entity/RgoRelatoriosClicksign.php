<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RgoRelatoriosClicksignRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RgoRelatoriosClicksignRepository::class)]
#[ORM\Table(
    name: 'rgo_relatorios_clicksign',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_rgo_relatorios', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'FK_integracao_clicksign_documentos', columns: ['cd_documento_clicksign'])]
#[ORM\Index(name: 'IX_CD_PESSOA_SOLICITANTE', columns: ['cd_pessoa_solicitante'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_integracao_clicksign_documentos', 'colunas' => ['cd_documento_clicksign'], 'tabelaAlvo' => 'integracao_clicksign_documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rgo_relatorios', 'colunas' => ['cd_relatorio'], 'tabelaAlvo' => 'rgo_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RgoRelatoriosClicksign
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: RgoRelatorios::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoRelatorios $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoClicksignDocumentos::class)]
    #[ORM\JoinColumn(name: 'cd_documento_clicksign', referencedColumnName: 'cd_documento', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoClicksignDocumentos $cdDocumentoClicksign = null;

    #[ORM\Column(name: 'cd_pessoa_solicitante', type: 'integer', nullable: true)]
    private ?int $cdPessoaSolicitante = null;

    #[ORM\Column(name: 'me_filtros', type: 'text', length: 65535, nullable: true)]
    private ?string $meFiltros = null;

    #[ORM\Column(name: 'ds_link_documento_original', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsLinkDocumentoOriginal = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?RgoRelatorios $cdRelatorio = null,
        ?IntegracaoClicksignDocumentos $cdDocumentoClicksign = null,
        ?int $cdPessoaSolicitante = null,
        ?string $meFiltros = null,
        string $dsLinkDocumentoOriginal = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdDocumentoClicksign = $cdDocumentoClicksign;
        $this->cdPessoaSolicitante = $cdPessoaSolicitante;
        $this->meFiltros = $meFiltros;
        $this->dsLinkDocumentoOriginal = $dsLinkDocumentoOriginal;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdRelatorio(): ?RgoRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?RgoRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getCdDocumentoClicksign(): ?IntegracaoClicksignDocumentos
    {
        return $this->cdDocumentoClicksign;
    }

    public function setCdDocumentoClicksign(?IntegracaoClicksignDocumentos $cdDocumentoClicksign): self
    {
        $this->cdDocumentoClicksign = $cdDocumentoClicksign;
        return $this;
    }

    public function getCdPessoaSolicitante(): ?int
    {
        return $this->cdPessoaSolicitante;
    }

    public function setCdPessoaSolicitante(?int $cdPessoaSolicitante): self
    {
        $this->cdPessoaSolicitante = $cdPessoaSolicitante;
        return $this;
    }

    public function getMeFiltros(): ?string
    {
        return $this->meFiltros;
    }

    public function setMeFiltros(?string $meFiltros): self
    {
        $this->meFiltros = $meFiltros;
        return $this;
    }

    public function getDsLinkDocumentoOriginal(): string
    {
        return $this->dsLinkDocumentoOriginal;
    }

    public function setDsLinkDocumentoOriginal(string $dsLinkDocumentoOriginal): self
    {
        $this->dsLinkDocumentoOriginal = $dsLinkDocumentoOriginal;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
