<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponenteDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteDocumentoRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_documento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'FK_cd_jornada_componente_id_documento', columns: ['cd_jornada_etapa_componente_id'])]
#[ORM\Index(name: 'FK_cap_jornada_etapa_componente_documento_cd_relatorio_template', columns: ['cd_relatorio_template'])]
#[ORM\Index(name: 'FK_cap_jornada_etapa_componente_documento_clicksign_ambientes', columns: ['cd_clicksign_ambiente'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_etapa_componente_documento_cd_relatorio_template', 'colunas' => ['cd_relatorio_template'], 'tabelaAlvo' => 'uni_relatorio_template', 'colunasAlvo' => ['cd_relatorio_template'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_jornada_etapa_componente_documento_clicksign_ambientes', 'colunas' => ['cd_clicksign_ambiente'], 'tabelaAlvo' => 'integracao_clicksign_ambientes', 'colunasAlvo' => ['cd_clicksign_ambiente'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_jornada_componente_id_documento', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\ManyToOne(targetEntity: UniRelatorioTemplate::class)]
    #[ORM\JoinColumn(name: 'cd_relatorio_template', referencedColumnName: 'cd_relatorio_template', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniRelatorioTemplate $cdRelatorioTemplate = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoClicksignAmbientes::class)]
    #[ORM\JoinColumn(name: 'cd_clicksign_ambiente', referencedColumnName: 'cd_clicksign_ambiente', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoClicksignAmbientes $cdClicksignAmbiente = null;

    #[ORM\Column(name: 'ds_nome_documento', type: 'string', length: 50)]
    private ?string $dsNomeDocumento = null;

    #[ORM\Column(name: 'sn_assinatura_autentique', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAssinaturaAutentique = false;

    #[ORM\Column(name: 'sn_assinatura_clicksign', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAssinaturaClicksign = false;

    #[ORM\Column(name: 'sn_obrigatorio_aceite', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snObrigatorioAceite = true;

    #[ORM\Column(name: 'ds_opcao_aceitar', type: 'string', length: 50, nullable: true)]
    private ?string $dsOpcaoAceitar = null;

    #[ORM\Column(name: 'ds_opcao_rejeitar', type: 'string', length: 50, nullable: true)]
    private ?string $dsOpcaoRejeitar = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?UniRelatorioTemplate $cdRelatorioTemplate = null,
        ?IntegracaoClicksignAmbientes $cdClicksignAmbiente = null,
        ?string $dsNomeDocumento = null,
        ?bool $snAssinaturaAutentique = false,
        ?bool $snAssinaturaClicksign = false,
        ?bool $snObrigatorioAceite = true,
        ?string $dsOpcaoAceitar = null,
        ?string $dsOpcaoRejeitar = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->cdRelatorioTemplate = $cdRelatorioTemplate;
        $this->cdClicksignAmbiente = $cdClicksignAmbiente;
        $this->dsNomeDocumento = $dsNomeDocumento;
        $this->snAssinaturaAutentique = $snAssinaturaAutentique;
        $this->snAssinaturaClicksign = $snAssinaturaClicksign;
        $this->snObrigatorioAceite = $snObrigatorioAceite;
        $this->dsOpcaoAceitar = $dsOpcaoAceitar;
        $this->dsOpcaoRejeitar = $dsOpcaoRejeitar;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCdRelatorioTemplate(): ?UniRelatorioTemplate
    {
        return $this->cdRelatorioTemplate;
    }

    public function setCdRelatorioTemplate(?UniRelatorioTemplate $cdRelatorioTemplate): self
    {
        $this->cdRelatorioTemplate = $cdRelatorioTemplate;
        return $this;
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

    public function getDsNomeDocumento(): ?string
    {
        return $this->dsNomeDocumento;
    }

    public function setDsNomeDocumento(?string $dsNomeDocumento): self
    {
        $this->dsNomeDocumento = $dsNomeDocumento;
        return $this;
    }

    public function isSnAssinaturaAutentique(): ?bool
    {
        return $this->snAssinaturaAutentique;
    }

    public function setSnAssinaturaAutentique(?bool $snAssinaturaAutentique): self
    {
        $this->snAssinaturaAutentique = $snAssinaturaAutentique;
        return $this;
    }

    public function isSnAssinaturaClicksign(): ?bool
    {
        return $this->snAssinaturaClicksign;
    }

    public function setSnAssinaturaClicksign(?bool $snAssinaturaClicksign): self
    {
        $this->snAssinaturaClicksign = $snAssinaturaClicksign;
        return $this;
    }

    public function isSnObrigatorioAceite(): ?bool
    {
        return $this->snObrigatorioAceite;
    }

    public function setSnObrigatorioAceite(?bool $snObrigatorioAceite): self
    {
        $this->snObrigatorioAceite = $snObrigatorioAceite;
        return $this;
    }

    public function getDsOpcaoAceitar(): ?string
    {
        return $this->dsOpcaoAceitar;
    }

    public function setDsOpcaoAceitar(?string $dsOpcaoAceitar): self
    {
        $this->dsOpcaoAceitar = $dsOpcaoAceitar;
        return $this;
    }

    public function getDsOpcaoRejeitar(): ?string
    {
        return $this->dsOpcaoRejeitar;
    }

    public function setDsOpcaoRejeitar(?string $dsOpcaoRejeitar): self
    {
        $this->dsOpcaoRejeitar = $dsOpcaoRejeitar;
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
