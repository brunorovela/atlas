<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MultiacervoMensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MultiacervoMensalidadesRepository::class)]
#[ORM\Table(
    name: 'multiacervo_mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MultiacervoMensalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_multiacervo_mensalidade', type: 'integer')]
    private ?int $cdMultiacervoMensalidade = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'cd_numero_penalidade', type: 'integer', nullable: true)]
    private ?int $cdNumeroPenalidade = null;

    #[ORM\Column(name: 'cd_multiacervo_leitor', type: 'integer', nullable: true)]
    private ?int $cdMultiacervoLeitor = null;

    #[ORM\Column(name: 'dt_multiacervo_baixa', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMultiacervoBaixa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?int $cdNumeroPenalidade = null,
        ?int $cdMultiacervoLeitor = null,
        ?\DateTimeInterface $dtMultiacervoBaixa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->cdNumeroPenalidade = $cdNumeroPenalidade;
        $this->cdMultiacervoLeitor = $cdMultiacervoLeitor;
        $this->dtMultiacervoBaixa = $dtMultiacervoBaixa;
        $this->dtBase = $dtBase;
    }

    public function getCdMultiacervoMensalidade(): ?int
    {
        return $this->cdMultiacervoMensalidade;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getCdNumeroPenalidade(): ?int
    {
        return $this->cdNumeroPenalidade;
    }

    public function setCdNumeroPenalidade(?int $cdNumeroPenalidade): self
    {
        $this->cdNumeroPenalidade = $cdNumeroPenalidade;
        return $this;
    }

    public function getCdMultiacervoLeitor(): ?int
    {
        return $this->cdMultiacervoLeitor;
    }

    public function setCdMultiacervoLeitor(?int $cdMultiacervoLeitor): self
    {
        $this->cdMultiacervoLeitor = $cdMultiacervoLeitor;
        return $this;
    }

    public function getDtMultiacervoBaixa(): ?\DateTimeInterface
    {
        return $this->dtMultiacervoBaixa;
    }

    public function setDtMultiacervoBaixa(?\DateTimeInterface $dtMultiacervoBaixa): self
    {
        $this->dtMultiacervoBaixa = $dtMultiacervoBaixa;
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
