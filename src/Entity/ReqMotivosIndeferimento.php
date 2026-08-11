<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ReqMotivosIndeferimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqMotivosIndeferimentoRepository::class)]
#[ORM\Table(
    name: 'req_motivos_indeferimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ReqMotivosIndeferimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req_motivo_indeferimento', type: 'integer')]
    private ?int $cdReqMotivoIndeferimento = null;

    #[ORM\Column(name: 'ds_motivo_indeferimento', type: 'string', length: 255, nullable: true)]
    private ?string $dsMotivoIndeferimento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsMotivoIndeferimento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsMotivoIndeferimento = $dsMotivoIndeferimento;
        $this->dtBase = $dtBase;
    }

    public function getCdReqMotivoIndeferimento(): ?int
    {
        return $this->cdReqMotivoIndeferimento;
    }

    public function getDsMotivoIndeferimento(): ?string
    {
        return $this->dsMotivoIndeferimento;
    }

    public function setDsMotivoIndeferimento(?string $dsMotivoIndeferimento): self
    {
        $this->dsMotivoIndeferimento = $dsMotivoIndeferimento;
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
