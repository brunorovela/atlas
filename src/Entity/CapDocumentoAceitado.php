<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapDocumentoAceitadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapDocumentoAceitadoRepository::class)]
#[ORM\Table(
    name: 'cap_documento_aceitado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_JORNADA_ETAPA_COMPONENTE', columns: ['cd_inscricao', 'cd_jornada_etapa_componente_id'])]
#[ORM\Index(name: 'FK_DOCUMENTO_ACEITADO_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'FK_DOCUMENTO_ACEITADO_CD_DOCUMENTO', columns: ['cd_documento'])]
#[ORM\Index(name: 'FK_DOCUMENTO_ACEITADO_CD_DOCUMENTO_AUTENTIQUE', columns: ['cd_documento_autentique'])]
#[ORM\Index(name: 'FK_cd_jornada_etapa_componente_id', columns: ['cd_jornada_etapa_componente_id'])]
#[ORM\Index(name: 'FK_cd_inscricao', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'FK_cd_documento', columns: ['cd_documento'])]
#[ORM\Index(name: 'FK_cap_documento_aceitado_integracao_clicksign_documentos', columns: ['cd_documento_clicksign'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_documento_aceitado_integracao_clicksign_documentos', 'colunas' => ['cd_documento_clicksign'], 'tabelaAlvo' => 'integracao_clicksign_documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_jornada_etapa_componente_id', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DOCUMENTO_ACEITADO_CD_DOCUMENTO', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'uni_relatorio_template', 'colunasAlvo' => ['cd_relatorio_template'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DOCUMENTO_ACEITADO_CD_DOCUMENTO_AUTENTIQUE', 'colunas' => ['cd_documento_autentique'], 'tabelaAlvo' => 'integracao_autentique_documento', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DOCUMENTO_ACEITADO_CD_INSCRICAO', 'colunas' => ['cd_inscricao'], 'tabelaAlvo' => 'cap_inscricao', 'colunasAlvo' => ['cd_inscricao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapDocumentoAceitado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_aceitado', type: 'integer')]
    private ?int $cdDocumentoAceitado = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\ManyToOne(targetEntity: CapInscricao::class)]
    #[ORM\JoinColumn(name: 'cd_inscricao', referencedColumnName: 'cd_inscricao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapInscricao $cdInscricao = null;

    #[ORM\ManyToOne(targetEntity: UniRelatorioTemplate::class)]
    #[ORM\JoinColumn(name: 'cd_documento', referencedColumnName: 'cd_relatorio_template', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniRelatorioTemplate $cdDocumento = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'sn_li_aceito', type: 'integer')]
    private ?int $snLiAceito = null;

    #[ORM\Column(name: 'ds_opcao_selecionada', type: 'string', length: 50, nullable: true)]
    private ?string $dsOpcaoSelecionada = null;

    #[ORM\Column(name: 'ds_ip', type: 'string', length: 255, nullable: true)]
    private ?string $dsIp = null;

    #[ORM\Column(name: 'dt_aceite', type: 'datetime')]
    private ?\DateTimeInterface $dtAceite = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoAutentiqueDocumento::class)]
    #[ORM\JoinColumn(name: 'cd_documento_autentique', referencedColumnName: 'cd_documento', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoAutentiqueDocumento $cdDocumentoAutentique = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoClicksignDocumentos::class)]
    #[ORM\JoinColumn(name: 'cd_documento_clicksign', referencedColumnName: 'cd_documento', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoClicksignDocumentos $cdDocumentoClicksign = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?CapInscricao $cdInscricao = null,
        ?UniRelatorioTemplate $cdDocumento = null,
        ?string $dsUrl = null,
        ?int $snLiAceito = null,
        ?string $dsOpcaoSelecionada = null,
        ?string $dsIp = null,
        ?\DateTimeInterface $dtAceite = null,
        ?\DateTimeInterface $dtBase = null,
        ?IntegracaoAutentiqueDocumento $cdDocumentoAutentique = null,
        ?IntegracaoClicksignDocumentos $cdDocumentoClicksign = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->cdInscricao = $cdInscricao;
        $this->cdDocumento = $cdDocumento;
        $this->dsUrl = $dsUrl;
        $this->snLiAceito = $snLiAceito;
        $this->dsOpcaoSelecionada = $dsOpcaoSelecionada;
        $this->dsIp = $dsIp;
        $this->dtAceite = $dtAceite;
        $this->dtBase = $dtBase;
        $this->cdDocumentoAutentique = $cdDocumentoAutentique;
        $this->cdDocumentoClicksign = $cdDocumentoClicksign;
    }

    public function getCdDocumentoAceitado(): ?int
    {
        return $this->cdDocumentoAceitado;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function getCdInscricao(): ?CapInscricao
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?CapInscricao $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }

    public function getCdDocumento(): ?UniRelatorioTemplate
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?UniRelatorioTemplate $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getSnLiAceito(): ?int
    {
        return $this->snLiAceito;
    }

    public function setSnLiAceito(?int $snLiAceito): self
    {
        $this->snLiAceito = $snLiAceito;
        return $this;
    }

    public function getDsOpcaoSelecionada(): ?string
    {
        return $this->dsOpcaoSelecionada;
    }

    public function setDsOpcaoSelecionada(?string $dsOpcaoSelecionada): self
    {
        $this->dsOpcaoSelecionada = $dsOpcaoSelecionada;
        return $this;
    }

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }

    public function getDtAceite(): ?\DateTimeInterface
    {
        return $this->dtAceite;
    }

    public function setDtAceite(?\DateTimeInterface $dtAceite): self
    {
        $this->dtAceite = $dtAceite;
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

    public function getCdDocumentoAutentique(): ?IntegracaoAutentiqueDocumento
    {
        return $this->cdDocumentoAutentique;
    }

    public function setCdDocumentoAutentique(?IntegracaoAutentiqueDocumento $cdDocumentoAutentique): self
    {
        $this->cdDocumentoAutentique = $cdDocumentoAutentique;
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
}
