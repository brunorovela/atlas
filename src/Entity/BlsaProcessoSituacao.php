<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BlsaProcessoSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlsaProcessoSituacaoRepository::class)]
#[ORM\Table(
    name: 'blsa_processo_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UNIQUE_DS_CHAVE', columns: ['ds_chave'])]
class BlsaProcessoSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsNome = '';

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsChave = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        string $dsNome = '',
        string $dsChave = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function getDsNome(): string
    {
        return $this->dsNome;
    }

    public function setDsNome(string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
