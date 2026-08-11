<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RecAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecAnexoRepository::class)]
#[ORM\Table(
    name: 'rec_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'idx_rec_anexo_cd_recado', columns: ['cd_recado'])]
class RecAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'bigint', options: ['unsigned' => true, 'comment' => 'Codigo unico'])]
    private ?string $cdAnexo = null;

    #[ORM\Column(name: 'cd_recado', type: 'bigint', nullable: true, options: ['unsigned' => true, 'comment' => 'Codigo que cria vinculo com o anexo da tabela rec_recados'])]
    private ?string $cdRecado = null;

    #[ORM\Column(name: 'mb_anexo', type: 'blob', nullable: true, options: ['comment' => 'Arquivo de anexo'])]
    private ?string $mbAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome original do arquivo'])]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_tamanho', type: 'string', length: 30, nullable: true, options: ['comment' => 'Tamanho do arquivo'])]
    private ?string $dsTamanho = null;

    public function __construct(
        ?string $cdRecado = null,
        ?string $mbAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsTamanho = null
    ) {
        $this->cdRecado = $cdRecado;
        $this->mbAnexo = $mbAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsTamanho = $dsTamanho;
    }

    public function getCdAnexo(): ?string
    {
        return $this->cdAnexo;
    }

    public function getCdRecado(): ?string
    {
        return $this->cdRecado;
    }

    public function setCdRecado(?string $cdRecado): self
    {
        $this->cdRecado = $cdRecado;
        return $this;
    }

    public function getMbAnexo(): ?string
    {
        return $this->mbAnexo;
    }

    public function setMbAnexo(?string $mbAnexo): self
    {
        $this->mbAnexo = $mbAnexo;
        return $this;
    }

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getDsTamanho(): ?string
    {
        return $this->dsTamanho;
    }

    public function setDsTamanho(?string $dsTamanho): self
    {
        $this->dsTamanho = $dsTamanho;
        return $this;
    }
}
