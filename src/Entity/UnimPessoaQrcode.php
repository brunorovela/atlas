<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimPessoaQrcodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimPessoaQrcodeRepository::class)]
#[ORM\Table(
    name: 'unim_pessoa_qrcode',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_unim_pqrcode', columns: ['cd_pessoa', 'cd_modulo'])]
class UnimPessoaQrcode
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_qr_code', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQrCode = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'me_imagem', type: 'blob', nullable: true)]
    private ?string $meImagem = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdModulo = null,
        ?string $meImagem = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdModulo = $cdModulo;
        $this->meImagem = $meImagem;
    }

    public function getCdQrCode(): ?int
    {
        return $this->cdQrCode;
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

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getMeImagem(): ?string
    {
        return $this->meImagem;
    }

    public function setMeImagem(?string $meImagem): self
    {
        $this->meImagem = $meImagem;
        return $this;
    }
}
