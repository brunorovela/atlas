<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfseRpsXmlSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseRpsXmlSituacaoRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_rps_xml_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfseRpsXmlSituacao
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 50, options: ['fixed' => true])]
    private ?string $dsSituacao = null;

    public function __construct(
        ?int $cdSituacao = null,
        ?string $dsSituacao = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
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
}
