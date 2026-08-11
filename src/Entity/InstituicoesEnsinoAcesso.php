<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\InstituicoesEnsinoAcessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstituicoesEnsinoAcessoRepository::class)]
#[ORM\Table(
    name: 'instituicoes_ensino_acesso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_SISTEMA_INTEGRACAO', columns: ['cd_sistema_integracao'])]
class InstituicoesEnsinoAcesso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_instituicao_ensino_acesso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInstituicaoEnsinoAcesso = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'cd_sistema_integracao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSistemaIntegracao = null;

    #[ORM\Column(name: 'ds_ip_acesso', type: 'string', length: 255, nullable: true)]
    private ?string $dsIpAcesso = null;

    #[ORM\Column(name: 'ds_usuario', type: 'string', length: 255, nullable: true)]
    private ?string $dsUsuario = null;

    #[ORM\Column(name: 'ds_senha', type: 'string', length: 255, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'ds_base_dados', type: 'string', length: 255, nullable: true)]
    private ?string $dsBaseDados = null;

    #[ORM\Column(name: 'sn_ativo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snAtivo = null;

    #[ORM\Column(name: 'sn_unimestre', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snUnimestre = false;

    public function __construct(
        ?int $cdInstituicao = null,
        ?int $cdSistemaIntegracao = null,
        ?string $dsIpAcesso = null,
        ?string $dsUsuario = null,
        ?string $dsSenha = null,
        ?string $dsBaseDados = null,
        ?string $snAtivo = null,
        ?bool $snUnimestre = false
    ) {
        $this->cdInstituicao = $cdInstituicao;
        $this->cdSistemaIntegracao = $cdSistemaIntegracao;
        $this->dsIpAcesso = $dsIpAcesso;
        $this->dsUsuario = $dsUsuario;
        $this->dsSenha = $dsSenha;
        $this->dsBaseDados = $dsBaseDados;
        $this->snAtivo = $snAtivo;
        $this->snUnimestre = $snUnimestre;
    }

    public function getCdInstituicaoEnsinoAcesso(): ?int
    {
        return $this->cdInstituicaoEnsinoAcesso;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getCdSistemaIntegracao(): ?int
    {
        return $this->cdSistemaIntegracao;
    }

    public function setCdSistemaIntegracao(?int $cdSistemaIntegracao): self
    {
        $this->cdSistemaIntegracao = $cdSistemaIntegracao;
        return $this;
    }

    public function getDsIpAcesso(): ?string
    {
        return $this->dsIpAcesso;
    }

    public function setDsIpAcesso(?string $dsIpAcesso): self
    {
        $this->dsIpAcesso = $dsIpAcesso;
        return $this;
    }

    public function getDsUsuario(): ?string
    {
        return $this->dsUsuario;
    }

    public function setDsUsuario(?string $dsUsuario): self
    {
        $this->dsUsuario = $dsUsuario;
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

    public function getDsBaseDados(): ?string
    {
        return $this->dsBaseDados;
    }

    public function setDsBaseDados(?string $dsBaseDados): self
    {
        $this->dsBaseDados = $dsBaseDados;
        return $this;
    }

    public function getSnAtivo(): ?string
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?string $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function isSnUnimestre(): ?bool
    {
        return $this->snUnimestre;
    }

    public function setSnUnimestre(?bool $snUnimestre): self
    {
        $this->snUnimestre = $snUnimestre;
        return $this;
    }
}
