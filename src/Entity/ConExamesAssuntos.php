<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConExamesAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConExamesAssuntosRepository::class)]
#[ORM\Table(
    name: 'con_exames_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EXAME', columns: ['cd_exame'])]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['cd_assunto'])]
class ConExamesAssuntos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_assunto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAssunto = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_exame', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExame = null;

    public function __construct(
        ?int $cdAssunto = null,
        ?int $cdExame = null
    ) {
        $this->cdAssunto = $cdAssunto;
        $this->cdExame = $cdExame;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function setCdAssunto(?int $cdAssunto): self
    {
        $this->cdAssunto = $cdAssunto;
        return $this;
    }

    public function getCdExame(): ?int
    {
        return $this->cdExame;
    }

    public function setCdExame(?int $cdExame): self
    {
        $this->cdExame = $cdExame;
        return $this;
    }
}
