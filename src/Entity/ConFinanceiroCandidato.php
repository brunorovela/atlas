<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConFinanceiroCandidatoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConFinanceiroCandidatoRepository::class)]
#[ORM\Table(
    name: 'con_financeiro_candidato',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_candidado_fin', columns: ['cd_financeiro_candidato'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
class ConFinanceiroCandidato
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_financeiro_candidato', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinanceiroCandidato = null;

    #[ORM\Column(name: 'cd_inscricao', type: 'integer', nullable: true)]
    private ?int $cdInscricao = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?int $cdInscricao = null,
        ?int $cdMensalidade = null
    ) {
        $this->cdInscricao = $cdInscricao;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdFinanceiroCandidato(): ?int
    {
        return $this->cdFinanceiroCandidato;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?int $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
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
}
