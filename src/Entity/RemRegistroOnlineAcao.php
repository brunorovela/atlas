<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RemRegistroOnlineAcaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemRegistroOnlineAcaoRepository::class)]
#[ORM\Table(
    name: 'rem_registro_online_acao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class RemRegistroOnlineAcao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_registro_acao', type: 'integer')]
    private ?int $cdRegistroAcao = null;

    #[ORM\Column(name: 'ds_registro_acao', type: 'string', length: 255)]
    private ?string $dsRegistroAcao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsRegistroAcao = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsRegistroAcao = $dsRegistroAcao;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdRegistroAcao(): ?int
    {
        return $this->cdRegistroAcao;
    }

    public function getDsRegistroAcao(): ?string
    {
        return $this->dsRegistroAcao;
    }

    public function setDsRegistroAcao(?string $dsRegistroAcao): self
    {
        $this->dsRegistroAcao = $dsRegistroAcao;
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
