<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OuvArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvArquivosRepository::class)]
#[ORM\Table(
    name: 'ouv_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ouv_arquivos_unique', columns: ['ds_chave'])]
class OuvArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ARQUIVO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArquivo = null;

    #[ORM\Column(name: 'NM_ARQUIVO', type: 'string', length: 255, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'NR_TAMANHO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'ME_ARQUIVO', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meArquivo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_tipo_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoArquivo = null;

    public function __construct(
        ?string $nmArquivo = null,
        ?int $nrTamanho = null,
        ?string $meArquivo = null,
        ?string $dsChave = null,
        ?string $dsTipoArquivo = null
    ) {
        $this->nmArquivo = $nmArquivo;
        $this->nrTamanho = $nrTamanho;
        $this->meArquivo = $meArquivo;
        $this->dsChave = $dsChave;
        $this->dsTipoArquivo = $dsTipoArquivo;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsTipoArquivo(): ?string
    {
        return $this->dsTipoArquivo;
    }

    public function setDsTipoArquivo(?string $dsTipoArquivo): self
    {
        $this->dsTipoArquivo = $dsTipoArquivo;
        return $this;
    }
}
