<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BoletosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoletosRepository::class)]
#[ORM\Table(
    name: 'boletos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Layouts do codigo de barras de boletos']
)]
#[ORM\UniqueConstraint(name: 'cd_boleto', columns: ['cd_boleto'])]
#[ORM\Index(name: 'IX_CD_LAYOUT_PADRAO', columns: ['cd_layout_padrao'])]
class Boletos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_boleto', type: 'integer')]
    private ?int $cdBoleto = null;

    #[ORM\Column(name: 'cd_layout_padrao', type: 'integer', options: ['default' => '0'])]
    private int $cdLayoutPadrao = 0;

    #[ORM\Column(name: 'ds_boleto', type: 'string', length: 150, options: ['default' => ''])]
    private string $dsBoleto = '';

    #[ORM\Column(name: 'me_linha_digitavel', type: 'text', length: 16777215)]
    private ?string $meLinhaDigitavel = null;

    #[ORM\Column(name: 'me_codigo_barras', type: 'text', length: 16777215)]
    private ?string $meCodigoBarras = null;

    #[ORM\Column(name: 'me_html', type: 'text', length: 16777215, nullable: true)]
    private ?string $meHtml = null;

    public function __construct(
        int $cdLayoutPadrao = 0,
        string $dsBoleto = '',
        ?string $meLinhaDigitavel = null,
        ?string $meCodigoBarras = null,
        ?string $meHtml = null
    ) {
        $this->cdLayoutPadrao = $cdLayoutPadrao;
        $this->dsBoleto = $dsBoleto;
        $this->meLinhaDigitavel = $meLinhaDigitavel;
        $this->meCodigoBarras = $meCodigoBarras;
        $this->meHtml = $meHtml;
    }

    public function getCdBoleto(): ?int
    {
        return $this->cdBoleto;
    }

    public function getCdLayoutPadrao(): int
    {
        return $this->cdLayoutPadrao;
    }

    public function setCdLayoutPadrao(int $cdLayoutPadrao): self
    {
        $this->cdLayoutPadrao = $cdLayoutPadrao;
        return $this;
    }

    public function getDsBoleto(): string
    {
        return $this->dsBoleto;
    }

    public function setDsBoleto(string $dsBoleto): self
    {
        $this->dsBoleto = $dsBoleto;
        return $this;
    }

    public function getMeLinhaDigitavel(): ?string
    {
        return $this->meLinhaDigitavel;
    }

    public function setMeLinhaDigitavel(?string $meLinhaDigitavel): self
    {
        $this->meLinhaDigitavel = $meLinhaDigitavel;
        return $this;
    }

    public function getMeCodigoBarras(): ?string
    {
        return $this->meCodigoBarras;
    }

    public function setMeCodigoBarras(?string $meCodigoBarras): self
    {
        $this->meCodigoBarras = $meCodigoBarras;
        return $this;
    }

    public function getMeHtml(): ?string
    {
        return $this->meHtml;
    }

    public function setMeHtml(?string $meHtml): self
    {
        $this->meHtml = $meHtml;
        return $this;
    }
}
