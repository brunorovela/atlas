<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfseWsSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseWsSituacaoRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_ws_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfseWsSituacao
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_SITUACAO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'NM_SITUACAO', type: 'string', length: 22, options: ['fixed' => true])]
    private ?string $nmSituacao = null;

    public function __construct(
        ?int $cdSituacao = null,
        ?string $nmSituacao = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->nmSituacao = $nmSituacao;
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

    public function getNmSituacao(): ?string
    {
        return $this->nmSituacao;
    }

    public function setNmSituacao(?string $nmSituacao): self
    {
        $this->nmSituacao = $nmSituacao;
        return $this;
    }
}
