<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BlsaProcessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlsaProcessoRepository::class)]
#[ORM\Table(
    name: 'blsa_processo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BlsaProcesso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo', type: 'integer')]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'nr_total_vagas', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrTotalVagas = 0;

    #[ORM\Column(name: 'vl_salario_minimo_vigente', type: 'smallfloat', nullable: true, options: ['default' => '0'])]
    private ?float $vlSalarioMinimoVigente = 0.0;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snAtivo = 0;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?int $nrTotalVagas = 0,
        ?float $vlSalarioMinimoVigente = 0.0,
        int $snAtivo = 0,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->nrTotalVagas = $nrTotalVagas;
        $this->vlSalarioMinimoVigente = $vlSalarioMinimoVigente;
        $this->snAtivo = $snAtivo;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
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

    public function getNrTotalVagas(): ?int
    {
        return $this->nrTotalVagas;
    }

    public function setNrTotalVagas(?int $nrTotalVagas): self
    {
        $this->nrTotalVagas = $nrTotalVagas;
        return $this;
    }

    public function getVlSalarioMinimoVigente(): ?float
    {
        return $this->vlSalarioMinimoVigente;
    }

    public function setVlSalarioMinimoVigente(?float $vlSalarioMinimoVigente): self
    {
        $this->vlSalarioMinimoVigente = $vlSalarioMinimoVigente;
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

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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
