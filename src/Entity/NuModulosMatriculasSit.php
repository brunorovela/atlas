<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuModulosMatriculasSitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuModulosMatriculasSitRepository::class)]
#[ORM\Table(
    name: 'nu_modulos_matriculas_sit',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_MOD_MAT_SIT_MODULO_SITUACAO', columns: ['cd_modulo', 'cd_situacao'])]
#[ORM\UniqueConstraint(name: 'UK_mod_sit_sn_aceita', columns: ['cd_situacao', 'sn_aceita', 'cd_modulo'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class NuModulosMatriculasSit
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_modulos_matriculas_sit', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdModulosMatriculasSit = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'sn_aceita', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $snAceita = null;

    public function __construct(
        ?int $cdModulo = null,
        ?int $cdSituacao = null,
        ?int $snAceita = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->cdSituacao = $cdSituacao;
        $this->snAceita = $snAceita;
    }

    public function getCdModulosMatriculasSit(): ?int
    {
        return $this->cdModulosMatriculasSit;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getSnAceita(): ?int
    {
        return $this->snAceita;
    }

    public function setSnAceita(?int $snAceita): self
    {
        $this->snAceita = $snAceita;
        return $this;
    }
}
