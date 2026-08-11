<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\OuvAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvAssuntosRepository::class)]
#[ORM\Table(
    name: 'ouv_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class OuvAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ASSUNTO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'NM_ASSUNTO', type: 'string', length: 255, nullable: true)]
    private ?string $nmAssunto = null;

    #[ORM\Column(name: 'NR_DIAS_PRAZO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiasPrazo = null;

    #[ORM\Column(name: 'SN_OUTRO_SETOR', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snOutroSetor = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'NR_ORDEM', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $nrOrdem = 0;

    public function __construct(
        ?string $nmAssunto = null,
        ?int $nrDiasPrazo = null,
        ?int $snOutroSetor = null,
        ?int $snAtivo = null,
        ?int $nrOrdem = 0
    ) {
        $this->nmAssunto = $nmAssunto;
        $this->nrDiasPrazo = $nrDiasPrazo;
        $this->snOutroSetor = $snOutroSetor;
        $this->snAtivo = $snAtivo;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function getNmAssunto(): ?string
    {
        return $this->nmAssunto;
    }

    public function setNmAssunto(?string $nmAssunto): self
    {
        $this->nmAssunto = $nmAssunto;
        return $this;
    }

    public function getNrDiasPrazo(): ?int
    {
        return $this->nrDiasPrazo;
    }

    public function setNrDiasPrazo(?int $nrDiasPrazo): self
    {
        $this->nrDiasPrazo = $nrDiasPrazo;
        return $this;
    }

    public function getSnOutroSetor(): ?int
    {
        return $this->snOutroSetor;
    }

    public function setSnOutroSetor(?int $snOutroSetor): self
    {
        $this->snOutroSetor = $snOutroSetor;
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

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
