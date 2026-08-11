<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MatriculasIngressoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculasIngressoRepository::class)]
#[ORM\Table(
    name: 'matriculas_ingresso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ds_chave', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_INGRESSO', columns: ['cd_ingresso'])]
class MatriculasIngresso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ingresso', type: 'integer')]
    private ?int $cdIngresso = null;

    #[ORM\Column(name: 'ds_ingresso', type: 'string', length: 50, nullable: true)]
    private ?string $dsIngresso = null;

    #[ORM\Column(name: 'cd_padrao', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPadrao = 0;

    #[ORM\Column(name: 'cd_auxiliar', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAuxiliar = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_ativo', type: 'smallint', nullable: true, options: ['default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsIngresso = null,
        ?int $cdPadrao = 0,
        ?int $cdAuxiliar = null,
        ?string $dsChave = null,
        ?int $snAtivo = 1,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsIngresso = $dsIngresso;
        $this->cdPadrao = $cdPadrao;
        $this->cdAuxiliar = $cdAuxiliar;
        $this->dsChave = $dsChave;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdIngresso(): ?int
    {
        return $this->cdIngresso;
    }

    public function getDsIngresso(): ?string
    {
        return $this->dsIngresso;
    }

    public function setDsIngresso(?string $dsIngresso): self
    {
        $this->dsIngresso = $dsIngresso;
        return $this;
    }

    public function getCdPadrao(): ?int
    {
        return $this->cdPadrao;
    }

    public function setCdPadrao(?int $cdPadrao): self
    {
        $this->cdPadrao = $cdPadrao;
        return $this;
    }

    public function getCdAuxiliar(): ?int
    {
        return $this->cdAuxiliar;
    }

    public function setCdAuxiliar(?int $cdAuxiliar): self
    {
        $this->cdAuxiliar = $cdAuxiliar;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
