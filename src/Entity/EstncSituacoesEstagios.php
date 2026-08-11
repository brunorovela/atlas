<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncSituacoesEstagiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncSituacoesEstagiosRepository::class)]
#[ORM\Table(
    name: 'estnc_situacoes_estagios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class EstncSituacoesEstagios
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_situacao_estagio', type: 'integer')]
    private ?int $cdSituacaoEstagio = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 255)]
    private ?string $dsSituacao = null;

    public function __construct(
        ?int $cdSituacaoEstagio = null,
        ?string $dsChave = null,
        ?string $dsSituacao = null
    ) {
        $this->cdSituacaoEstagio = $cdSituacaoEstagio;
        $this->dsChave = $dsChave;
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdSituacaoEstagio(): ?int
    {
        return $this->cdSituacaoEstagio;
    }

    public function setCdSituacaoEstagio(?int $cdSituacaoEstagio): self
    {
        $this->cdSituacaoEstagio = $cdSituacaoEstagio;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
