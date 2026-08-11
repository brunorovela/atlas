<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ApiSendgridEstatisticaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiSendgridEstatisticaRepository::class)]
#[ORM\Table(
    name: 'api_sendgrid_estatistica',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_sendgrid_evento', columns: ['cd_evento'])]
#[ORM\Index(name: 'idx_ds_categoria', columns: ['ds_categoria'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'api_sendgrid_estatistica_ibfk_1', 'colunas' => ['cd_evento'], 'tabelaAlvo' => 'api_sendgrid_eventos', 'colunasAlvo' => ['cd_evento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ApiSendgridEstatistica
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_estatistica', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstatistica = null;

    #[ORM\ManyToOne(targetEntity: ApiSendgridEventos::class)]
    #[ORM\JoinColumn(name: 'cd_evento', referencedColumnName: 'cd_evento', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ApiSendgridEventos $cdEvento = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'id_evento_sendgrid', type: 'string', length: 255)]
    private ?string $idEventoSendgrid = null;

    #[ORM\Column(name: 'id_mensagem_sendgrid', type: 'string', length: 255)]
    private ?string $idMensagemSendgrid = null;

    #[ORM\Column(name: 'id_smtp_sendgrid', type: 'string', length: 255)]
    private ?string $idSmtpSendgrid = null;

    #[ORM\Column(name: 'dt_envio_api', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtEnvioApi = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'ds_resposta_sendgrid', type: 'string', length: 255, nullable: true)]
    private ?string $dsRespostaSendgrid = null;

    #[ORM\Column(name: 'nr_tentativa_sendgrid', type: 'smallint', nullable: true)]
    private ?int $nrTentativaSendgrid = null;

    #[ORM\Column(name: 'ds_useragent', type: 'string', length: 255, nullable: true)]
    private ?string $dsUseragent = null;

    #[ORM\Column(name: 'ds_ip_usuario', type: 'string', length: 15, nullable: true, options: ['fixed' => true])]
    private ?string $dsIpUsuario = null;

    #[ORM\Column(name: 'ds_url', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'ds_razao', type: 'string', length: 255, nullable: true)]
    private ?string $dsRazao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?ApiSendgridEventos $cdEvento = null,
        ?string $dsEmail = null,
        ?string $idEventoSendgrid = null,
        ?string $idMensagemSendgrid = null,
        ?string $idSmtpSendgrid = null,
        ?\DateTimeInterface $dtEnvioApi = null,
        ?string $dsCategoria = null,
        ?string $dsRespostaSendgrid = null,
        ?int $nrTentativaSendgrid = null,
        ?string $dsUseragent = null,
        ?string $dsIpUsuario = null,
        ?string $dsUrl = null,
        ?string $dsRazao = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $cdMensalidade = null
    ) {
        $this->cdEvento = $cdEvento;
        $this->dsEmail = $dsEmail;
        $this->idEventoSendgrid = $idEventoSendgrid;
        $this->idMensagemSendgrid = $idMensagemSendgrid;
        $this->idSmtpSendgrid = $idSmtpSendgrid;
        $this->dtEnvioApi = $dtEnvioApi;
        $this->dsCategoria = $dsCategoria;
        $this->dsRespostaSendgrid = $dsRespostaSendgrid;
        $this->nrTentativaSendgrid = $nrTentativaSendgrid;
        $this->dsUseragent = $dsUseragent;
        $this->dsIpUsuario = $dsIpUsuario;
        $this->dsUrl = $dsUrl;
        $this->dsRazao = $dsRazao;
        $this->dtBase = $dtBase;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdEstatistica(): ?int
    {
        return $this->cdEstatistica;
    }

    public function getCdEvento(): ?ApiSendgridEventos
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?ApiSendgridEventos $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function getIdEventoSendgrid(): ?string
    {
        return $this->idEventoSendgrid;
    }

    public function setIdEventoSendgrid(?string $idEventoSendgrid): self
    {
        $this->idEventoSendgrid = $idEventoSendgrid;
        return $this;
    }

    public function getIdMensagemSendgrid(): ?string
    {
        return $this->idMensagemSendgrid;
    }

    public function setIdMensagemSendgrid(?string $idMensagemSendgrid): self
    {
        $this->idMensagemSendgrid = $idMensagemSendgrid;
        return $this;
    }

    public function getIdSmtpSendgrid(): ?string
    {
        return $this->idSmtpSendgrid;
    }

    public function setIdSmtpSendgrid(?string $idSmtpSendgrid): self
    {
        $this->idSmtpSendgrid = $idSmtpSendgrid;
        return $this;
    }

    public function getDtEnvioApi(): ?\DateTimeInterface
    {
        return $this->dtEnvioApi;
    }

    public function setDtEnvioApi(?\DateTimeInterface $dtEnvioApi): self
    {
        $this->dtEnvioApi = $dtEnvioApi;
        return $this;
    }

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }

    public function getDsRespostaSendgrid(): ?string
    {
        return $this->dsRespostaSendgrid;
    }

    public function setDsRespostaSendgrid(?string $dsRespostaSendgrid): self
    {
        $this->dsRespostaSendgrid = $dsRespostaSendgrid;
        return $this;
    }

    public function getNrTentativaSendgrid(): ?int
    {
        return $this->nrTentativaSendgrid;
    }

    public function setNrTentativaSendgrid(?int $nrTentativaSendgrid): self
    {
        $this->nrTentativaSendgrid = $nrTentativaSendgrid;
        return $this;
    }

    public function getDsUseragent(): ?string
    {
        return $this->dsUseragent;
    }

    public function setDsUseragent(?string $dsUseragent): self
    {
        $this->dsUseragent = $dsUseragent;
        return $this;
    }

    public function getDsIpUsuario(): ?string
    {
        return $this->dsIpUsuario;
    }

    public function setDsIpUsuario(?string $dsIpUsuario): self
    {
        $this->dsIpUsuario = $dsIpUsuario;
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

    public function getDsRazao(): ?string
    {
        return $this->dsRazao;
    }

    public function setDsRazao(?string $dsRazao): self
    {
        $this->dsRazao = $dsRazao;
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

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
