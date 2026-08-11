<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasLidasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasLidasRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_lidas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_OCORRENCIA_LIDA', columns: ['cd_pessoa', 'cd_ocorrencia'])]
class OcorrenciasLidas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ocorrencia_lida', type: 'integer')]
    private ?int $cdOcorrenciaLida = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer')]
    private ?int $cdOcorrencia = null;

    #[ORM\Column(name: 'dt_leitura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLeitura = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdOcorrencia = null,
        ?\DateTimeInterface $dtLeitura = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->dtLeitura = $dtLeitura;
    }

    public function getCdOcorrenciaLida(): ?int
    {
        return $this->cdOcorrenciaLida;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdOcorrencia(): ?int
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?int $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getDtLeitura(): ?\DateTimeInterface
    {
        return $this->dtLeitura;
    }

    public function setDtLeitura(?\DateTimeInterface $dtLeitura): self
    {
        $this->dtLeitura = $dtLeitura;
        return $this;
    }
}
