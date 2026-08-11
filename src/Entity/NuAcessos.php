<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuAcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuAcessosRepository::class)]
#[ORM\Table(
    name: 'nu_acessos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_acesso', columns: ['cd_acesso'])]
#[ORM\Index(name: 'IX_DS_SESSION_ID', columns: ['ds_session_id'], options: ['lengths' => [12]])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MODULO_DT_ENTRADA', columns: ['cd_modulo', 'dt_entrada'])]
class NuAcessos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_acesso', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdAcesso = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_tipo_senha', type: 'string', length: 20, nullable: true)]
    private ?string $cdTipoSenha = null;

    #[ORM\Column(name: 'dt_entrada', type: 'datetime')]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'dt_saida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'ds_ip', type: 'string', length: 40, nullable: true)]
    private ?string $dsIp = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'ds_session_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsSessionId = null;

    #[ORM\Column(name: 'ds_ip_proxy', type: 'string', length: 40, nullable: true)]
    private ?string $dsIpProxy = null;

    public function __construct(
        ?int $cdModulo = null,
        ?int $cdPessoa = null,
        ?string $cdTipoSenha = null,
        ?\DateTimeInterface $dtEntrada = null,
        ?\DateTimeInterface $dtSaida = null,
        ?string $dsIp = null,
        ?string $dsObservacao = null,
        ?string $dsSessionId = null,
        ?string $dsIpProxy = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->cdPessoa = $cdPessoa;
        $this->cdTipoSenha = $cdTipoSenha;
        $this->dtEntrada = $dtEntrada;
        $this->dtSaida = $dtSaida;
        $this->dsIp = $dsIp;
        $this->dsObservacao = $dsObservacao;
        $this->dsSessionId = $dsSessionId;
        $this->dsIpProxy = $dsIpProxy;
    }

    public function getCdAcesso(): ?string
    {
        return $this->cdAcesso;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdTipoSenha(): ?string
    {
        return $this->cdTipoSenha;
    }

    public function setCdTipoSenha(?string $cdTipoSenha): self
    {
        $this->cdTipoSenha = $cdTipoSenha;
        return $this;
    }

    public function getDtEntrada(): ?\DateTimeInterface
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada(?\DateTimeInterface $dtEntrada): self
    {
        $this->dtEntrada = $dtEntrada;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
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

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getDsSessionId(): ?string
    {
        return $this->dsSessionId;
    }

    public function setDsSessionId(?string $dsSessionId): self
    {
        $this->dsSessionId = $dsSessionId;
        return $this;
    }

    public function getDsIpProxy(): ?string
    {
        return $this->dsIpProxy;
    }

    public function setDsIpProxy(?string $dsIpProxy): self
    {
        $this->dsIpProxy = $dsIpProxy;
        return $this;
    }
}
