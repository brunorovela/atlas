<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RemRegistroOnlineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemRegistroOnlineRepository::class)]
#[ORM\Table(
    name: 'rem_registro_online',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_rem_registro_online', columns: ['CD_BOLETO', 'CD_INTEGRACAO', 'SN_ATIVO', 'cd_registro_acao'])]
#[ORM\Index(name: 'FK_REM_REGISTRO_ONLINE_CD_BOLETO_BOLETOS_CD_BOLETO', columns: ['CD_BOLETO'])]
#[ORM\Index(name: 'FK_REM_REGISTRO_ONLINE_CD_INTEGRACAO_UNIM_INTEGRACAO_CD_INTEGRA', columns: ['CD_INTEGRACAO'])]
#[ORM\Index(name: 'FK_rem_registro_online_rem_registro_online_acao', columns: ['cd_registro_acao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_REM_REGISTRO_ONLINE_CD_BOLETO_BOLETOS_CD_BOLETO', 'colunas' => ['CD_BOLETO'], 'tabelaAlvo' => 'boletos', 'colunasAlvo' => ['cd_boleto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_REM_REGISTRO_ONLINE_CD_INTEGRACAO_UNIM_INTEGRACAO_CD_INTEGRA', 'colunas' => ['CD_INTEGRACAO'], 'tabelaAlvo' => 'unim_integracao', 'colunasAlvo' => ['cd_integracao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_rem_registro_online_rem_registro_online_acao', 'colunas' => ['cd_registro_acao'], 'tabelaAlvo' => 'rem_registro_online_acao', 'colunasAlvo' => ['cd_registro_acao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RemRegistroOnline
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_REGISTRO_ONLINE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegistroOnline = null;

    #[ORM\ManyToOne(targetEntity: Boletos::class)]
    #[ORM\JoinColumn(name: 'CD_BOLETO', referencedColumnName: 'cd_boleto', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Boletos $cdBoleto = null;

    #[ORM\ManyToOne(targetEntity: UnimIntegracao::class)]
    #[ORM\JoinColumn(name: 'CD_INTEGRACAO', referencedColumnName: 'cd_integracao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimIntegracao $cdIntegracao = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAtivo = 0;

    #[ORM\Column(name: 'DS_URL', type: 'string', length: 255)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'DS_PROXY', type: 'string', length: 255)]
    private ?string $dsProxy = null;

    #[ORM\Column(name: 'ME_CONFIG', type: 'text', length: 65535)]
    private ?string $meConfig = null;

    #[ORM\Column(name: 'ME_CERTIFICADO', type: 'blob', length: 65535, nullable: true)]
    private ?string $meCertificado = null;

    #[ORM\Column(name: 'DS_SENHA', type: 'string', length: 255, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'DS_LOGIN', type: 'string', length: 255, nullable: true)]
    private ?string $dsLogin = null;

    #[ORM\Column(name: 'DS_URL_AUTENTICACAO', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlAutenticacao = null;

    #[ORM\ManyToOne(targetEntity: RemRegistroOnlineAcao::class)]
    #[ORM\JoinColumn(name: 'cd_registro_acao', referencedColumnName: 'cd_registro_acao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RemRegistroOnlineAcao $cdRegistroAcao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Boletos $cdBoleto = null,
        ?UnimIntegracao $cdIntegracao = null,
        int $snAtivo = 0,
        ?string $dsUrl = null,
        ?string $dsProxy = null,
        ?string $meConfig = null,
        ?string $meCertificado = null,
        ?string $dsSenha = null,
        ?string $dsLogin = null,
        ?string $dsUrlAutenticacao = null,
        ?RemRegistroOnlineAcao $cdRegistroAcao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdBoleto = $cdBoleto;
        $this->cdIntegracao = $cdIntegracao;
        $this->snAtivo = $snAtivo;
        $this->dsUrl = $dsUrl;
        $this->dsProxy = $dsProxy;
        $this->meConfig = $meConfig;
        $this->meCertificado = $meCertificado;
        $this->dsSenha = $dsSenha;
        $this->dsLogin = $dsLogin;
        $this->dsUrlAutenticacao = $dsUrlAutenticacao;
        $this->cdRegistroAcao = $cdRegistroAcao;
        $this->dtBase = $dtBase;
    }

    public function getCdRegistroOnline(): ?int
    {
        return $this->cdRegistroOnline;
    }

    public function getCdBoleto(): ?Boletos
    {
        return $this->cdBoleto;
    }

    public function setCdBoleto(?Boletos $cdBoleto): self
    {
        $this->cdBoleto = $cdBoleto;
        return $this;
    }

    public function getCdIntegracao(): ?UnimIntegracao
    {
        return $this->cdIntegracao;
    }

    public function setCdIntegracao(?UnimIntegracao $cdIntegracao): self
    {
        $this->cdIntegracao = $cdIntegracao;
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

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDsProxy(): ?string
    {
        return $this->dsProxy;
    }

    public function setDsProxy(?string $dsProxy): self
    {
        $this->dsProxy = $dsProxy;
        return $this;
    }

    public function getMeConfig(): ?string
    {
        return $this->meConfig;
    }

    public function setMeConfig(?string $meConfig): self
    {
        $this->meConfig = $meConfig;
        return $this;
    }

    public function getMeCertificado(): ?string
    {
        return $this->meCertificado;
    }

    public function setMeCertificado(?string $meCertificado): self
    {
        $this->meCertificado = $meCertificado;
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

    public function getDsLogin(): ?string
    {
        return $this->dsLogin;
    }

    public function setDsLogin(?string $dsLogin): self
    {
        $this->dsLogin = $dsLogin;
        return $this;
    }

    public function getDsUrlAutenticacao(): ?string
    {
        return $this->dsUrlAutenticacao;
    }

    public function setDsUrlAutenticacao(?string $dsUrlAutenticacao): self
    {
        $this->dsUrlAutenticacao = $dsUrlAutenticacao;
        return $this;
    }

    public function getCdRegistroAcao(): ?RemRegistroOnlineAcao
    {
        return $this->cdRegistroAcao;
    }

    public function setCdRegistroAcao(?RemRegistroOnlineAcao $cdRegistroAcao): self
    {
        $this->cdRegistroAcao = $cdRegistroAcao;
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
