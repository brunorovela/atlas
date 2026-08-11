<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PassosInscricaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassosInscricaoRepository::class)]
#[ORM\Table(
    name: 'passos_inscricao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_PASSO_INSCRICAO', columns: ['ds_chave_passo_inscricao'])]
class PassosInscricao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_passo_inscricao', type: 'integer')]
    private ?int $cdPassoInscricao = null;

    #[ORM\Column(name: 'ds_passo_inscricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsPassoInscricao = null;

    #[ORM\Column(name: 'ds_chave_passo_inscricao', type: 'string', length: 30, nullable: true)]
    private ?string $dsChavePassoInscricao = null;

    public function __construct(
        ?string $dsPassoInscricao = null,
        ?string $dsChavePassoInscricao = null
    ) {
        $this->dsPassoInscricao = $dsPassoInscricao;
        $this->dsChavePassoInscricao = $dsChavePassoInscricao;
    }

    public function getCdPassoInscricao(): ?int
    {
        return $this->cdPassoInscricao;
    }

    public function getDsPassoInscricao(): ?string
    {
        return $this->dsPassoInscricao;
    }

    public function setDsPassoInscricao(?string $dsPassoInscricao): self
    {
        $this->dsPassoInscricao = $dsPassoInscricao;
        return $this;
    }

    public function getDsChavePassoInscricao(): ?string
    {
        return $this->dsChavePassoInscricao;
    }

    public function setDsChavePassoInscricao(?string $dsChavePassoInscricao): self
    {
        $this->dsChavePassoInscricao = $dsChavePassoInscricao;
        return $this;
    }
}
