<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinIuguSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinIuguSituacaoRepository::class)]
#[ORM\Table(
    name: 'fin_iugu_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UNQ_CD_SITUACAO', columns: ['ds_chave'])]
class FinIuguSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_iugu_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdIuguSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 255)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsSituacao = null,
        ?string $dsChave = null
    ) {
        $this->dsSituacao = $dsSituacao;
        $this->dsChave = $dsChave;
    }

    public function getCdIuguSituacao(): ?int
    {
        return $this->cdIuguSituacao;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }
}
