<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasParecerItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasParecerItensRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_parecer_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PARECER', columns: ['cd_parecer'])]
#[ORM\Index(name: 'IX_CD_OCORRENCIA', columns: ['cd_ocorrencia'])]
class OcorrenciasParecerItens
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_parecer', type: 'integer', options: ['default' => '0'])]
    private int $cdParecer = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer', options: ['default' => '0'])]
    private int $cdOcorrencia = 0;

    public function __construct(
        int $cdParecer = 0,
        int $cdOcorrencia = 0
    ) {
        $this->cdParecer = $cdParecer;
        $this->cdOcorrencia = $cdOcorrencia;
    }

    public function getCdParecer(): int
    {
        return $this->cdParecer;
    }

    public function setCdParecer(int $cdParecer): self
    {
        $this->cdParecer = $cdParecer;
        return $this;
    }

    public function getCdOcorrencia(): int
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(int $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }
}
