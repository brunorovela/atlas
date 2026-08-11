<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuSmtpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuSmtpRepository::class)]
#[ORM\Table(
    name: 'nu_smtp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_NU_SMTP_NM_SMTP', columns: ['NM_SMTP'])]
#[ORM\UniqueConstraint(name: 'IX_NUSMTP_DS_CHAVE', columns: ['DS_CHAVE'])]
class NuSmtp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_SMTP', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSmtp = null;

    #[ORM\Column(name: 'NM_SMTP', type: 'string', length: 255)]
    private ?string $nmSmtp = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'DS_DOMINIO', type: 'string', length: 255)]
    private ?string $dsDominio = null;

    #[ORM\Column(name: 'NM_USUARIO', type: 'string', length: 255, nullable: true)]
    private ?string $nmUsuario = null;

    #[ORM\Column(name: 'DS_SENHA', type: 'string', length: 255)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'DS_EMAIL_REMETENTE', type: 'string', length: 255)]
    private ?string $dsEmailRemetente = null;

    #[ORM\Column(name: 'DS_RESPONDER_PARA', type: 'string', length: 255, nullable: true)]
    private ?string $dsResponderPara = null;

    #[ORM\Column(name: 'DS_NOME_REMETENTE', type: 'string', length: 255)]
    private ?string $dsNomeRemetente = null;

    #[ORM\Column(name: 'NR_PORTA', type: 'integer', options: ['unsigned' => true, 'default' => '25'])]
    private int $nrPorta = 25;

    #[ORM\Column(name: 'NM_PROTOCOLO', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $nmProtocolo = null;

    #[ORM\Column(name: 'SN_AUTENTICACAO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAutenticacao = 0;

    #[ORM\Column(name: 'NR_INTERVALO', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrIntervalo = 0;

    #[ORM\Column(name: 'NR_MAXIMO_MENSAGEM', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrMaximoMensagem = 0;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'qt_envio', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $qtEnvio = 0;

    #[ORM\Column(name: 'sn_servico', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snServico = 0;

    #[ORM\Column(name: 'sn_biblioteca', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snBiblioteca = 0;

    #[ORM\Column(name: 'enum_tipo_autenticacao', type: 'enum', options: ['default' => 'SMTP', 'values' => ['SMTP', 'OAuth2Google']])]
    private string $enumTipoAutenticacao = 'SMTP';

    #[ORM\Column(name: 'ds_token', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsToken = null;

    public function __construct(
        ?string $nmSmtp = null,
        ?string $dsChave = null,
        ?string $dsDominio = null,
        ?string $nmUsuario = null,
        ?string $dsSenha = null,
        ?string $dsEmailRemetente = null,
        ?string $dsResponderPara = null,
        ?string $dsNomeRemetente = null,
        int $nrPorta = 25,
        ?string $nmProtocolo = null,
        int $snAutenticacao = 0,
        int $nrIntervalo = 0,
        int $nrMaximoMensagem = 0,
        int $snAtivo = 1,
        ?int $qtEnvio = 0,
        ?int $snServico = 0,
        ?int $snBiblioteca = 0,
        string $enumTipoAutenticacao = 'SMTP',
        ?string $dsToken = null
    ) {
        $this->nmSmtp = $nmSmtp;
        $this->dsChave = $dsChave;
        $this->dsDominio = $dsDominio;
        $this->nmUsuario = $nmUsuario;
        $this->dsSenha = $dsSenha;
        $this->dsEmailRemetente = $dsEmailRemetente;
        $this->dsResponderPara = $dsResponderPara;
        $this->dsNomeRemetente = $dsNomeRemetente;
        $this->nrPorta = $nrPorta;
        $this->nmProtocolo = $nmProtocolo;
        $this->snAutenticacao = $snAutenticacao;
        $this->nrIntervalo = $nrIntervalo;
        $this->nrMaximoMensagem = $nrMaximoMensagem;
        $this->snAtivo = $snAtivo;
        $this->qtEnvio = $qtEnvio;
        $this->snServico = $snServico;
        $this->snBiblioteca = $snBiblioteca;
        $this->enumTipoAutenticacao = $enumTipoAutenticacao;
        $this->dsToken = $dsToken;
    }

    public function getCdSmtp(): ?int
    {
        return $this->cdSmtp;
    }

    public function getNmSmtp(): ?string
    {
        return $this->nmSmtp;
    }

    public function setNmSmtp(?string $nmSmtp): self
    {
        $this->nmSmtp = $nmSmtp;
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

    public function getDsDominio(): ?string
    {
        return $this->dsDominio;
    }

    public function setDsDominio(?string $dsDominio): self
    {
        $this->dsDominio = $dsDominio;
        return $this;
    }

    public function getNmUsuario(): ?string
    {
        return $this->nmUsuario;
    }

    public function setNmUsuario(?string $nmUsuario): self
    {
        $this->nmUsuario = $nmUsuario;
        return $this;
    }

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }

    public function getDsEmailRemetente(): ?string
    {
        return $this->dsEmailRemetente;
    }

    public function setDsEmailRemetente(?string $dsEmailRemetente): self
    {
        $this->dsEmailRemetente = $dsEmailRemetente;
        return $this;
    }

    public function getDsResponderPara(): ?string
    {
        return $this->dsResponderPara;
    }

    public function setDsResponderPara(?string $dsResponderPara): self
    {
        $this->dsResponderPara = $dsResponderPara;
        return $this;
    }

    public function getDsNomeRemetente(): ?string
    {
        return $this->dsNomeRemetente;
    }

    public function setDsNomeRemetente(?string $dsNomeRemetente): self
    {
        $this->dsNomeRemetente = $dsNomeRemetente;
        return $this;
    }

    public function getNrPorta(): int
    {
        return $this->nrPorta;
    }

    public function setNrPorta(int $nrPorta): self
    {
        $this->nrPorta = $nrPorta;
        return $this;
    }

    public function getNmProtocolo(): ?string
    {
        return $this->nmProtocolo;
    }

    public function setNmProtocolo(?string $nmProtocolo): self
    {
        $this->nmProtocolo = $nmProtocolo;
        return $this;
    }

    public function getSnAutenticacao(): int
    {
        return $this->snAutenticacao;
    }

    public function setSnAutenticacao(int $snAutenticacao): self
    {
        $this->snAutenticacao = $snAutenticacao;
        return $this;
    }

    public function getNrIntervalo(): int
    {
        return $this->nrIntervalo;
    }

    public function setNrIntervalo(int $nrIntervalo): self
    {
        $this->nrIntervalo = $nrIntervalo;
        return $this;
    }

    public function getNrMaximoMensagem(): int
    {
        return $this->nrMaximoMensagem;
    }

    public function setNrMaximoMensagem(int $nrMaximoMensagem): self
    {
        $this->nrMaximoMensagem = $nrMaximoMensagem;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getQtEnvio(): ?int
    {
        return $this->qtEnvio;
    }

    public function setQtEnvio(?int $qtEnvio): self
    {
        $this->qtEnvio = $qtEnvio;
        return $this;
    }

    public function getSnServico(): ?int
    {
        return $this->snServico;
    }

    public function setSnServico(?int $snServico): self
    {
        $this->snServico = $snServico;
        return $this;
    }

    public function getSnBiblioteca(): ?int
    {
        return $this->snBiblioteca;
    }

    public function setSnBiblioteca(?int $snBiblioteca): self
    {
        $this->snBiblioteca = $snBiblioteca;
        return $this;
    }

    public function getEnumTipoAutenticacao(): string
    {
        return $this->enumTipoAutenticacao;
    }

    public function setEnumTipoAutenticacao(string $enumTipoAutenticacao): self
    {
        $this->enumTipoAutenticacao = $enumTipoAutenticacao;
        return $this;
    }

    public function getDsToken(): ?string
    {
        return $this->dsToken;
    }

    public function setDsToken(?string $dsToken): self
    {
        $this->dsToken = $dsToken;
        return $this;
    }
}
