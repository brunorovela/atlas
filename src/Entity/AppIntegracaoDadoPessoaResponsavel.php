<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoPessoaResponsavelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoPessoaResponsavelRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_pessoa_responsavel',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_pessoa_responsavel_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_pessoa_responsavel_cd_responsavel_cd_aluno', columns: ['cd_responsavel', 'cd_aluno'])]
#[ORM\Index(name: 'idx_app_integracao_pessoa_responsavel_cd_aluno', columns: ['cd_aluno'])]
#[ORM\Index(name: 'idx_app_integracao_pessoa_responsavel_ds_campo_responsavel', columns: ['ds_campo_responsavel'])]
class AppIntegracaoDadoPessoaResponsavel
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_responsavel', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdResponsavel = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_aluno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'sn_financeiro', type: 'boolean', options: ['default' => '0'])]
    private bool $snFinanceiro = false;

    #[ORM\Column(name: 'ds_campo_responsavel', type: 'string', length: 15)]
    private ?string $dsCampoResponsavel = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdResponsavel = null,
        ?int $cdAluno = null,
        bool $snFinanceiro = false,
        ?string $dsCampoResponsavel = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdResponsavel = $cdResponsavel;
        $this->cdAluno = $cdAluno;
        $this->snFinanceiro = $snFinanceiro;
        $this->dsCampoResponsavel = $dsCampoResponsavel;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function isSnFinanceiro(): bool
    {
        return $this->snFinanceiro;
    }

    public function setSnFinanceiro(bool $snFinanceiro): self
    {
        $this->snFinanceiro = $snFinanceiro;
        return $this;
    }

    public function getDsCampoResponsavel(): ?string
    {
        return $this->dsCampoResponsavel;
    }

    public function setDsCampoResponsavel(?string $dsCampoResponsavel): self
    {
        $this->dsCampoResponsavel = $dsCampoResponsavel;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
