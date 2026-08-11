<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ReqSituacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqSituacoesRepository::class)]
#[ORM\Table(
    name: 'req_situacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ReqSituacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 45)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'sn_encerrar', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snEncerrar = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsSituacao = null,
        ?int $snEncerrar = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsSituacao = $dsSituacao;
        $this->snEncerrar = $snEncerrar;
        $this->dtBase = $dtBase;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
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

    public function getSnEncerrar(): ?int
    {
        return $this->snEncerrar;
    }

    public function setSnEncerrar(?int $snEncerrar): self
    {
        $this->snEncerrar = $snEncerrar;
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
