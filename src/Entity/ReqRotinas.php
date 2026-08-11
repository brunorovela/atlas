<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ReqRotinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRotinasRepository::class)]
#[ORM\Table(
    name: 'req_rotinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ReqRotinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rotina', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRotina = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_classe', type: 'string', length: 255, nullable: true)]
    private ?string $dsClasse = null;

    #[ORM\Column(name: 'cd_local', type: TinyIntType::NAME, nullable: true, options: ['default' => '2'])]
    private ?int $cdLocal = 2;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?string $dsChave = null,
        ?string $dsClasse = null,
        ?int $cdLocal = 2,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->dsChave = $dsChave;
        $this->dsClasse = $dsClasse;
        $this->cdLocal = $cdLocal;
        $this->dtBase = $dtBase;
    }

    public function getCdRotina(): ?int
    {
        return $this->cdRotina;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    public function setDsClasse(?string $dsClasse): self
    {
        $this->dsClasse = $dsClasse;
        return $this;
    }

    public function getCdLocal(): ?int
    {
        return $this->cdLocal;
    }

    public function setCdLocal(?int $cdLocal): self
    {
        $this->cdLocal = $cdLocal;
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
