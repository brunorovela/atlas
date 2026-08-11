<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProvasDecSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvasDecSituacaoRepository::class)]
#[ORM\Table(
    name: 'provas_dec_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['cd_prova', 'cd_declaracao'])]
#[ORM\Index(name: 'IX_CD_DECLARACAO', columns: ['cd_declaracao'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class ProvasDecSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_dec_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDecSituacao = null;

    #[ORM\Column(name: 'cd_declaracao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDeclaracao = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_situacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $cdSituacao = false;

    #[ORM\Column(name: 'sn_lida', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snLida = false;

    #[ORM\Column(name: 'sn_aprovada', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAprovada = false;

    public function __construct(
        ?int $cdDeclaracao = null,
        ?int $cdProva = null,
        ?bool $cdSituacao = false,
        ?bool $snLida = false,
        ?bool $snAprovada = false
    ) {
        $this->cdDeclaracao = $cdDeclaracao;
        $this->cdProva = $cdProva;
        $this->cdSituacao = $cdSituacao;
        $this->snLida = $snLida;
        $this->snAprovada = $snAprovada;
    }

    public function getCdDecSituacao(): ?int
    {
        return $this->cdDecSituacao;
    }

    public function getCdDeclaracao(): ?int
    {
        return $this->cdDeclaracao;
    }

    public function setCdDeclaracao(?int $cdDeclaracao): self
    {
        $this->cdDeclaracao = $cdDeclaracao;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function isCdSituacao(): ?bool
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?bool $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function isSnLida(): ?bool
    {
        return $this->snLida;
    }

    public function setSnLida(?bool $snLida): self
    {
        $this->snLida = $snLida;
        return $this;
    }

    public function isSnAprovada(): ?bool
    {
        return $this->snAprovada;
    }

    public function setSnAprovada(?bool $snAprovada): self
    {
        $this->snAprovada = $snAprovada;
        return $this;
    }
}
