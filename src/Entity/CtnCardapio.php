<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CtnCardapioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CtnCardapioRepository::class)]
#[ORM\Table(
    name: 'ctn_cardapio',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CtnCardapio
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cardapio', type: 'integer')]
    private ?int $cdCardapio = null;

    #[ORM\Column(name: 'ds_cardapio', type: 'string', length: 255, nullable: true)]
    private ?string $dsCardapio = null;

    #[ORM\Column(name: 'ds_caminho_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaminhoArquivo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?string $dsCardapio = null,
        ?string $dsCaminhoArquivo = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->dsCardapio = $dsCardapio;
        $this->dsCaminhoArquivo = $dsCaminhoArquivo;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdCardapio(): ?int
    {
        return $this->cdCardapio;
    }

    public function getDsCardapio(): ?string
    {
        return $this->dsCardapio;
    }

    public function setDsCardapio(?string $dsCardapio): self
    {
        $this->dsCardapio = $dsCardapio;
        return $this;
    }

    public function getDsCaminhoArquivo(): ?string
    {
        return $this->dsCaminhoArquivo;
    }

    public function setDsCaminhoArquivo(?string $dsCaminhoArquivo): self
    {
        $this->dsCaminhoArquivo = $dsCaminhoArquivo;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
