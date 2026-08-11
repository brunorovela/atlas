<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PessoasAtendimentosFichaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasAtendimentosFichaRepository::class)]
#[ORM\Table(
    name: 'pessoas_atendimentos_ficha',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ATENDIMENTO', columns: ['cd_atendimento'])]
#[ORM\Index(name: 'IX_CD_MOTIVO', columns: ['cd_motivo'])]
#[ORM\Index(name: 'IX_CD_LOCAL', columns: ['cd_local'])]
#[ORM\Index(name: 'IX_CD_PROCEDIMENTO', columns: ['cd_procedimento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_motivo']
)]
class PessoasAtendimentosFicha
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_atendimento', type: 'integer')]
    private ?int $cdAtendimento = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_motivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMotivo = null;

    #[ORM\Column(name: 'cd_local', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdLocal = null;

    #[ORM\Column(name: 'cd_procedimento', type: TinyIntType::NAME, nullable: true)]
    private ?int $cdProcedimento = null;

    public function __construct(
        ?int $cdAtendimento = null,
        ?int $cdMotivo = null,
        ?int $cdLocal = null,
        ?int $cdProcedimento = null
    ) {
        $this->cdAtendimento = $cdAtendimento;
        $this->cdMotivo = $cdMotivo;
        $this->cdLocal = $cdLocal;
        $this->cdProcedimento = $cdProcedimento;
    }

    public function getCdAtendimento(): ?int
    {
        return $this->cdAtendimento;
    }

    public function setCdAtendimento(?int $cdAtendimento): self
    {
        $this->cdAtendimento = $cdAtendimento;
        return $this;
    }

    public function getCdMotivo(): ?int
    {
        return $this->cdMotivo;
    }

    public function setCdMotivo(?int $cdMotivo): self
    {
        $this->cdMotivo = $cdMotivo;
        return $this;
    }

    public function getCdLocal(): ?int
    {
        return $this->cdLocal;
    }

    public function setCdLocal(?int $cdLocal): self
    {
        $this->cdLocal = $cdLocal;
        return $this;
    }

    public function getCdProcedimento(): ?int
    {
        return $this->cdProcedimento;
    }

    public function setCdProcedimento(?int $cdProcedimento): self
    {
        $this->cdProcedimento = $cdProcedimento;
        return $this;
    }
}
