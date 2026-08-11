<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanosPgtoReajusteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanosPgtoReajusteRepository::class)]
#[ORM\Table(
    name: 'fin_planos_pgto_reajuste',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_PLANOS_PGTO_REAJUSTE_CD_USUARIO', columns: ['cd_usuario'])]
class FinPlanosPgtoReajuste
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_reajuste', type: 'integer')]
    private ?int $cdReajuste = null;

    #[ORM\Column(name: 'ds_reajuste', type: 'string', length: 255)]
    private ?string $dsReajuste = null;

    #[ORM\Column(name: 'dt_inicio_reajuste', type: 'datetime')]
    private ?\DateTimeInterface $dtInicioReajuste = null;

    #[ORM\Column(name: 'dt_fim_reajuste', type: 'datetime')]
    private ?\DateTimeInterface $dtFimReajuste = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime')]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    public function __construct(
        ?string $dsReajuste = null,
        ?\DateTimeInterface $dtInicioReajuste = null,
        ?\DateTimeInterface $dtFimReajuste = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?int $cdUsuario = null
    ) {
        $this->dsReajuste = $dsReajuste;
        $this->dtInicioReajuste = $dtInicioReajuste;
        $this->dtFimReajuste = $dtFimReajuste;
        $this->dtInclusao = $dtInclusao;
        $this->cdUsuario = $cdUsuario;
    }

    public function getCdReajuste(): ?int
    {
        return $this->cdReajuste;
    }

    public function getDsReajuste(): ?string
    {
        return $this->dsReajuste;
    }

    public function setDsReajuste(?string $dsReajuste): self
    {
        $this->dsReajuste = $dsReajuste;
        return $this;
    }

    public function getDtInicioReajuste(): ?\DateTimeInterface
    {
        return $this->dtInicioReajuste;
    }

    public function setDtInicioReajuste(?\DateTimeInterface $dtInicioReajuste): self
    {
        $this->dtInicioReajuste = $dtInicioReajuste;
        return $this;
    }

    public function getDtFimReajuste(): ?\DateTimeInterface
    {
        return $this->dtFimReajuste;
    }

    public function setDtFimReajuste(?\DateTimeInterface $dtFimReajuste): self
    {
        $this->dtFimReajuste = $dtFimReajuste;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }
}
