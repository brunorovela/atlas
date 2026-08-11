<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TamEventosModelosCertificadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosModelosCertificadosRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_modelos_certificados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class TamEventosModelosCertificados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_modelo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdModelo = null;

    #[ORM\Column(name: 'nm_modelo', type: 'string', length: 100)]
    private ?string $nmModelo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_texto', type: 'text', length: 65535)]
    private ?string $dsTexto = null;

    #[ORM\Column(name: 'ds_texto_editado', type: 'text', length: 65535)]
    private ?string $dsTextoEditado = null;

    #[ORM\Column(name: 'ds_texto_verso', type: 'text', length: 65535, nullable: true)]
    private ?string $dsTextoVerso = null;

    #[ORM\Column(name: 'ds_texto_verso_editado', type: 'text', length: 65535, nullable: true)]
    private ?string $dsTextoVersoEditado = null;

    public function __construct(
        ?string $nmModelo = null,
        ?int $cdPessoa = null,
        ?string $dsTexto = null,
        ?string $dsTextoEditado = null,
        ?string $dsTextoVerso = null,
        ?string $dsTextoVersoEditado = null
    ) {
        $this->nmModelo = $nmModelo;
        $this->cdPessoa = $cdPessoa;
        $this->dsTexto = $dsTexto;
        $this->dsTextoEditado = $dsTextoEditado;
        $this->dsTextoVerso = $dsTextoVerso;
        $this->dsTextoVersoEditado = $dsTextoVersoEditado;
    }

    public function getCdModelo(): ?int
    {
        return $this->cdModelo;
    }

    public function getNmModelo(): ?string
    {
        return $this->nmModelo;
    }

    public function setNmModelo(?string $nmModelo): self
    {
        $this->nmModelo = $nmModelo;
        return $this;
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

    public function getDsTexto(): ?string
    {
        return $this->dsTexto;
    }

    public function setDsTexto(?string $dsTexto): self
    {
        $this->dsTexto = $dsTexto;
        return $this;
    }

    public function getDsTextoEditado(): ?string
    {
        return $this->dsTextoEditado;
    }

    public function setDsTextoEditado(?string $dsTextoEditado): self
    {
        $this->dsTextoEditado = $dsTextoEditado;
        return $this;
    }

    public function getDsTextoVerso(): ?string
    {
        return $this->dsTextoVerso;
    }

    public function setDsTextoVerso(?string $dsTextoVerso): self
    {
        $this->dsTextoVerso = $dsTextoVerso;
        return $this;
    }

    public function getDsTextoVersoEditado(): ?string
    {
        return $this->dsTextoVersoEditado;
    }

    public function setDsTextoVersoEditado(?string $dsTextoVersoEditado): self
    {
        $this->dsTextoVersoEditado = $dsTextoVersoEditado;
        return $this;
    }
}
