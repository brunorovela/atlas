<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\SituacoesFinanceirasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SituacoesFinanceirasRepository::class)]
#[ORM\Table(
    name: 'situacoes_financeiras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SituacoesFinanceiras
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['default' => '0'])]
    private int $cdSituacao = 0;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 15, nullable: true)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'ds_sigla_situacao', type: 'string', length: 10, nullable: true)]
    private ?string $dsSiglaSituacao = null;

    #[ORM\Column(name: 'sn_protesto', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snProtesto = 0;

    #[ORM\Column(name: 'ds_cor_background', type: 'string', length: 7, options: ['default' => '#FFFFFF'])]
    private string $dsCorBackground = '#FFFFFF';

    #[ORM\Column(name: 'ds_cor_fonte', type: 'string', length: 7, options: ['default' => '#000000'])]
    private string $dsCorFonte = '#000000';

    #[ORM\Column(name: 'ds_situacao_repasse', type: 'string', length: 15, nullable: true)]
    private ?string $dsSituacaoRepasse = null;

    #[ORM\Column(name: 'sn_imprime_boleto', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snImprimeBoleto = 0;

    public function __construct(
        int $cdSituacao = 0,
        ?string $dsSituacao = null,
        ?string $dsSiglaSituacao = null,
        ?int $snProtesto = 0,
        string $dsCorBackground = '#FFFFFF',
        string $dsCorFonte = '#000000',
        ?string $dsSituacaoRepasse = null,
        ?int $snImprimeBoleto = 0
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->dsSituacao = $dsSituacao;
        $this->dsSiglaSituacao = $dsSiglaSituacao;
        $this->snProtesto = $snProtesto;
        $this->dsCorBackground = $dsCorBackground;
        $this->dsCorFonte = $dsCorFonte;
        $this->dsSituacaoRepasse = $dsSituacaoRepasse;
        $this->snImprimeBoleto = $snImprimeBoleto;
    }

    public function getCdSituacao(): int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }

    public function getDsSiglaSituacao(): ?string
    {
        return $this->dsSiglaSituacao;
    }

    public function setDsSiglaSituacao(?string $dsSiglaSituacao): self
    {
        $this->dsSiglaSituacao = $dsSiglaSituacao;
        return $this;
    }

    public function getSnProtesto(): ?int
    {
        return $this->snProtesto;
    }

    public function setSnProtesto(?int $snProtesto): self
    {
        $this->snProtesto = $snProtesto;
        return $this;
    }

    public function getDsCorBackground(): string
    {
        return $this->dsCorBackground;
    }

    public function setDsCorBackground(string $dsCorBackground): self
    {
        $this->dsCorBackground = $dsCorBackground;
        return $this;
    }

    public function getDsCorFonte(): string
    {
        return $this->dsCorFonte;
    }

    public function setDsCorFonte(string $dsCorFonte): self
    {
        $this->dsCorFonte = $dsCorFonte;
        return $this;
    }

    public function getDsSituacaoRepasse(): ?string
    {
        return $this->dsSituacaoRepasse;
    }

    public function setDsSituacaoRepasse(?string $dsSituacaoRepasse): self
    {
        $this->dsSituacaoRepasse = $dsSituacaoRepasse;
        return $this;
    }

    public function getSnImprimeBoleto(): ?int
    {
        return $this->snImprimeBoleto;
    }

    public function setSnImprimeBoleto(?int $snImprimeBoleto): self
    {
        $this->snImprimeBoleto = $snImprimeBoleto;
        return $this;
    }
}
