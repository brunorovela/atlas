<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleImagensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleImagensRepository::class)]
#[ORM\Table(
    name: 'ple_imagens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'chave', columns: ['ds_chave'])]
class PleImagens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_imagem', type: 'integer')]
    private ?int $cdImagem = null;

    #[ORM\Column(name: 'ds_nome_imagem_original', type: 'string', length: 60, nullable: true)]
    private ?string $dsNomeImagemOriginal = null;

    #[ORM\Column(name: 'ds_nome_imagem_servidor', type: 'string', length: 60, nullable: true)]
    private ?string $dsNomeImagemServidor = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsChave = '';

    public function __construct(
        ?string $dsNomeImagemOriginal = null,
        ?string $dsNomeImagemServidor = null,
        string $dsChave = ''
    ) {
        $this->dsNomeImagemOriginal = $dsNomeImagemOriginal;
        $this->dsNomeImagemServidor = $dsNomeImagemServidor;
        $this->dsChave = $dsChave;
    }

    public function getCdImagem(): ?int
    {
        return $this->cdImagem;
    }

    public function getDsNomeImagemOriginal(): ?string
    {
        return $this->dsNomeImagemOriginal;
    }

    public function setDsNomeImagemOriginal(?string $dsNomeImagemOriginal): self
    {
        $this->dsNomeImagemOriginal = $dsNomeImagemOriginal;
        return $this;
    }

    public function getDsNomeImagemServidor(): ?string
    {
        return $this->dsNomeImagemServidor;
    }

    public function setDsNomeImagemServidor(?string $dsNomeImagemServidor): self
    {
        $this->dsNomeImagemServidor = $dsNomeImagemServidor;
        return $this;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}
