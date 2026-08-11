<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoPgtoContratoHtmlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoPgtoContratoHtmlRepository::class)]
#[ORM\Table(
    name: 'fin_plano_pgto_contrato_html',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cd_plano', columns: ['cd_plano'])]
class FinPlanoPgtoContratoHtml
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_pgto_contrato_html', type: 'integer')]
    private ?int $cdPlanoPgtoContratoHtml = null;

    #[ORM\Column(name: 'cd_plano', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'me_html', type: 'text', length: 16777215, nullable: true)]
    private ?string $meHtml = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPlano = null,
        ?string $meHtml = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->meHtml = $meHtml;
        $this->dtBase = $dtBase;
    }

    public function getCdPlanoPgtoContratoHtml(): ?int
    {
        return $this->cdPlanoPgtoContratoHtml;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
