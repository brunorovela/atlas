<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProdAnexosProfessoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdAnexosProfessoresRepository::class)]
#[ORM\Table(
    name: 'prod_anexos_professores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'prod_anexos_professores_unique', columns: ['ds_chave'])]
class ProdAnexosProfessores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer')]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'me_anexo', type: 'blob')]
    private ?string $meAnexo = null;

    #[ORM\Column(name: 'ds_nome_arquivo', type: 'string', length: 150)]
    private ?string $dsNomeArquivo = null;

    #[ORM\Column(name: 'ds_tipo_anexo', type: 'string', length: 100)]
    private ?string $dsTipoAnexo = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime')]
    private ?\DateTimeInterface $dtEnvio = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $meAnexo = null,
        ?string $dsNomeArquivo = null,
        ?string $dsTipoAnexo = null,
        ?\DateTimeInterface $dtEnvio = null
    ) {
        $this->dsChave = $dsChave;
        $this->meAnexo = $meAnexo;
        $this->dsNomeArquivo = $dsNomeArquivo;
        $this->dsTipoAnexo = $dsTipoAnexo;
        $this->dtEnvio = $dtEnvio;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getMeAnexo(): ?string
    {
        return $this->meAnexo;
    }

    public function setMeAnexo(?string $meAnexo): self
    {
        $this->meAnexo = $meAnexo;
        return $this;
    }

    public function getDsNomeArquivo(): ?string
    {
        return $this->dsNomeArquivo;
    }

    public function setDsNomeArquivo(?string $dsNomeArquivo): self
    {
        $this->dsNomeArquivo = $dsNomeArquivo;
        return $this;
    }

    public function getDsTipoAnexo(): ?string
    {
        return $this->dsTipoAnexo;
    }

    public function setDsTipoAnexo(?string $dsTipoAnexo): self
    {
        $this->dsTipoAnexo = $dsTipoAnexo;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }
}
