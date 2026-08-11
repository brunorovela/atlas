<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PessoasAtendimentosProcedimentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasAtendimentosProcedimentosRepository::class)]
#[ORM\Table(
    name: 'pessoas_atendimentos_procedimentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_MOTIVO_PROCEDIMENTO', columns: ['cd_procedimento', 'cd_motivo'])]
#[ORM\Index(name: 'IX_CD_PROCEDIMENTO', columns: ['cd_procedimento'])]
#[ORM\Index(name: 'IX_CD_MOTIVO', columns: ['cd_motivo'])]
class PessoasAtendimentosProcedimentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_procedimento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProcedimento = null;

    #[ORM\Column(name: 'cd_motivo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdMotivo = null;

    #[ORM\Column(name: 'ds_procedimento', type: 'string', length: 100, nullable: true, options: ['default' => ''])]
    private ?string $dsProcedimento = '';

    public function __construct(
        ?int $cdMotivo = null,
        ?string $dsProcedimento = ''
    ) {
        $this->cdMotivo = $cdMotivo;
        $this->dsProcedimento = $dsProcedimento;
    }

    public function getCdProcedimento(): ?int
    {
        return $this->cdProcedimento;
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

    public function getDsProcedimento(): ?string
    {
        return $this->dsProcedimento;
    }

    public function setDsProcedimento(?string $dsProcedimento): self
    {
        $this->dsProcedimento = $dsProcedimento;
        return $this;
    }
}
