<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LeitoraProvasAlunosRespSitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasAlunosRespSitRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_alunos_resp_sit',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_situacao', columns: ['cd_situacao'])]
class LeitoraProvasAlunosRespSit
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_situacao', type: 'smallint', options: ['default' => '0'])]
    private int $cdSituacao = 0;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 50, nullable: true)]
    private ?string $dsSituacao = null;

    public function __construct(
        int $cdSituacao = 0,
        ?string $dsSituacao = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdSituacao(): int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }
}
