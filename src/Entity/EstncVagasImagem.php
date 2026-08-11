<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncVagasImagemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncVagasImagemRepository::class)]
#[ORM\Table(
    name: 'estnc_vagas_imagem',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_VAGA', columns: ['cd_vaga'])]
class EstncVagasImagem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vaga_imagem', type: 'integer')]
    private ?int $cdVagaImagem = null;

    #[ORM\Column(name: 'cd_vaga', type: 'integer')]
    private ?int $cdVaga = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $nmArquivo = '';

    #[ORM\Column(name: 'bb_arquivo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bbArquivo = null;

    public function __construct(
        ?int $cdVaga = null,
        ?string $nmArquivo = '',
        ?string $bbArquivo = null
    ) {
        $this->cdVaga = $cdVaga;
        $this->nmArquivo = $nmArquivo;
        $this->bbArquivo = $bbArquivo;
    }

    public function getCdVagaImagem(): ?int
    {
        return $this->cdVagaImagem;
    }

    public function getCdVaga(): ?int
    {
        return $this->cdVaga;
    }

    public function setCdVaga(?int $cdVaga): self
    {
        $this->cdVaga = $cdVaga;
        return $this;
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

    public function getBbArquivo(): ?string
    {
        return $this->bbArquivo;
    }

    public function setBbArquivo(?string $bbArquivo): self
    {
        $this->bbArquivo = $bbArquivo;
        return $this;
    }
}
