<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuBloqueiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuBloqueiosRepository::class)]
#[ORM\Table(
    name: 'nu_bloqueios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
class NuBloqueios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_bloqueio', type: 'integer')]
    private ?int $cdBloqueio = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true)]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'dt_bloqueio', type: 'datetime')]
    private ?\DateTimeInterface $dtBloqueio = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'sn_indeterminado', type: 'boolean')]
    private ?bool $snIndeterminado = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdPessoa = null,
        ?int $cdModulo = null,
        ?int $cdAcao = null,
        ?\DateTimeInterface $dtBloqueio = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?bool $snIndeterminado = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
        $this->cdModulo = $cdModulo;
        $this->cdAcao = $cdAcao;
        $this->dtBloqueio = $dtBloqueio;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->snIndeterminado = $snIndeterminado;
    }

    public function getCdBloqueio(): ?int
    {
        return $this->cdBloqueio;
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

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
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

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getDtBloqueio(): ?\DateTimeInterface
    {
        return $this->dtBloqueio;
    }

    public function setDtBloqueio(?\DateTimeInterface $dtBloqueio): self
    {
        $this->dtBloqueio = $dtBloqueio;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function isSnIndeterminado(): ?bool
    {
        return $this->snIndeterminado;
    }

    public function setSnIndeterminado(?bool $snIndeterminado): self
    {
        $this->snIndeterminado = $snIndeterminado;
        return $this;
    }
}
