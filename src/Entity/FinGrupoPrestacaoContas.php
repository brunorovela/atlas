<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinGrupoPrestacaoContasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinGrupoPrestacaoContasRepository::class)]
#[ORM\Table(
    name: 'fin_grupo_prestacao_contas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class FinGrupoPrestacaoContas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_prestacao_conta', type: 'integer')]
    private ?int $cdGrupoPrestacaoConta = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'nr_nivel', type: 'integer', nullable: true)]
    private ?int $nrNivel = null;

    #[ORM\Column(name: 'sn_bloqueia_financeiro', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snBloqueiaFinanceiro = false;

    #[ORM\Column(name: 'sn_desbloqueia_financeiro', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snDesbloqueiaFinanceiro = false;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $nrNivel = null,
        ?bool $snBloqueiaFinanceiro = false,
        ?bool $snDesbloqueiaFinanceiro = false
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->nrNivel = $nrNivel;
        $this->snBloqueiaFinanceiro = $snBloqueiaFinanceiro;
        $this->snDesbloqueiaFinanceiro = $snDesbloqueiaFinanceiro;
    }

    public function getCdGrupoPrestacaoConta(): ?int
    {
        return $this->cdGrupoPrestacaoConta;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getNrNivel(): ?int
    {
        return $this->nrNivel;
    }

    public function setNrNivel(?int $nrNivel): self
    {
        $this->nrNivel = $nrNivel;
        return $this;
    }

    public function isSnBloqueiaFinanceiro(): ?bool
    {
        return $this->snBloqueiaFinanceiro;
    }

    public function setSnBloqueiaFinanceiro(?bool $snBloqueiaFinanceiro): self
    {
        $this->snBloqueiaFinanceiro = $snBloqueiaFinanceiro;
        return $this;
    }

    public function isSnDesbloqueiaFinanceiro(): ?bool
    {
        return $this->snDesbloqueiaFinanceiro;
    }

    public function setSnDesbloqueiaFinanceiro(?bool $snDesbloqueiaFinanceiro): self
    {
        $this->snDesbloqueiaFinanceiro = $snDesbloqueiaFinanceiro;
        return $this;
    }
}
