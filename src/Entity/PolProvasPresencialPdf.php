<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasPresencialPdfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasPresencialPdfRepository::class)]
#[ORM\Table(
    name: 'pol_provas_presencial_pdf',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
class PolProvasPresencialPdf
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_prova_turma', type: 'integer')]
    private ?int $cdProvaTurma = null;

    #[ORM\Column(name: 'me_arquivo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meArquivo = null;

    public function __construct(
        ?int $cdProvaTurma = null,
        ?string $meArquivo = null
    ) {
        $this->cdProvaTurma = $cdProvaTurma;
        $this->meArquivo = $meArquivo;
    }

    public function getCdProvaTurma(): ?int
    {
        return $this->cdProvaTurma;
    }

    public function setCdProvaTurma(?int $cdProvaTurma): self
    {
        $this->cdProvaTurma = $cdProvaTurma;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }
}
