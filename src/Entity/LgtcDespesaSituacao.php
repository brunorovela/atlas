<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LgtcDespesaSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcDespesaSituacaoRepository::class)]
#[ORM\Table(
    name: 'lgtc_despesa_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DESPESA_SITUACAO_DS_SITUACAO', columns: ['DS_SITUACAO'])]
#[ORM\UniqueConstraint(name: 'UK_DESPESA_SITUACAO_DS_CHAVE', columns: ['DS_CHAVE'])]
class LgtcDespesaSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_SITUACAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'DS_SITUACAO', type: 'string', length: 64)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 16)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'DS_COR', type: 'string', length: 6, nullable: true, options: ['fixed' => true])]
    private ?string $dsCor = null;

    public function __construct(
        ?string $dsSituacao = null,
        ?string $dsChave = null,
        ?string $dsCor = null
    ) {
        $this->dsSituacao = $dsSituacao;
        $this->dsChave = $dsChave;
        $this->dsCor = $dsCor;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }
}
