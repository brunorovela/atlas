<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ProvasDecTurmasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvasDecTurmasRepository::class)]
#[ORM\Table(
    name: 'provas_dec_turmas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['cd_declaracao', 'cd_provas_turmas'])]
#[ORM\Index(name: 'IX_CD_DECLARACAO', columns: ['cd_declaracao'])]
#[ORM\Index(name: 'IX_CD_PROVAS_TURMAS', columns: ['cd_provas_turmas'])]
class ProvasDecTurmas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pdt', type: 'integer')]
    private ?int $cdPdt = null;

    #[ORM\Column(name: 'cd_declaracao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdDeclaracao = 0;

    #[ORM\Column(name: 'cd_provas_turmas', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProvasTurmas = null;

    #[ORM\Column(name: 'sn_anulada', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAnulada = 0;

    public function __construct(
        ?int $cdDeclaracao = 0,
        ?int $cdProvasTurmas = null,
        int $snAnulada = 0
    ) {
        $this->cdDeclaracao = $cdDeclaracao;
        $this->cdProvasTurmas = $cdProvasTurmas;
        $this->snAnulada = $snAnulada;
    }

    public function getCdPdt(): ?int
    {
        return $this->cdPdt;
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

    public function getCdProvasTurmas(): ?int
    {
        return $this->cdProvasTurmas;
    }

    public function setCdProvasTurmas(?int $cdProvasTurmas): self
    {
        $this->cdProvasTurmas = $cdProvasTurmas;
        return $this;
    }

    public function getSnAnulada(): int
    {
        return $this->snAnulada;
    }

    public function setSnAnulada(int $snAnulada): self
    {
        $this->snAnulada = $snAnulada;
        return $this;
    }
}
