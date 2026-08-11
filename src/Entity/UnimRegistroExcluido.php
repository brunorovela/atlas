<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimRegistroExcluidoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimRegistroExcluidoRepository::class)]
#[ORM\Table(
    name: 'unim_registro_excluido',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_TABELA', columns: ['ds_tabela'])]
#[ORM\Index(name: 'IX_DT_EXCLUIDO', columns: ['dt_base'])]
class UnimRegistroExcluido
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_registro_excluido', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegistroExcluido = null;

    #[ORM\Column(name: 'ds_tabela', type: 'string', length: 255, nullable: true)]
    private ?string $dsTabela = null;

    #[ORM\Column(name: 'ds_pk', type: 'string', length: 255, nullable: true)]
    private ?string $dsPk = null;

    #[ORM\Column(name: 'ds_pk_info', type: 'string', length: 255, nullable: true)]
    private ?string $dsPkInfo = null;

    #[ORM\Column(name: 'ds_pk_robo', type: 'string', length: 255, nullable: true)]
    private ?string $dsPkRobo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsTabela = null,
        ?string $dsPk = null,
        ?string $dsPkInfo = null,
        ?string $dsPkRobo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsTabela = $dsTabela;
        $this->dsPk = $dsPk;
        $this->dsPkInfo = $dsPkInfo;
        $this->dsPkRobo = $dsPkRobo;
        $this->dtBase = $dtBase;
    }

    public function getCdRegistroExcluido(): ?int
    {
        return $this->cdRegistroExcluido;
    }

    public function getDsTabela(): ?string
    {
        return $this->dsTabela;
    }

    public function setDsTabela(?string $dsTabela): self
    {
        $this->dsTabela = $dsTabela;
        return $this;
    }

    public function getDsPk(): ?string
    {
        return $this->dsPk;
    }

    public function setDsPk(?string $dsPk): self
    {
        $this->dsPk = $dsPk;
        return $this;
    }

    public function getDsPkInfo(): ?string
    {
        return $this->dsPkInfo;
    }

    public function setDsPkInfo(?string $dsPkInfo): self
    {
        $this->dsPkInfo = $dsPkInfo;
        return $this;
    }

    public function getDsPkRobo(): ?string
    {
        return $this->dsPkRobo;
    }

    public function setDsPkRobo(?string $dsPkRobo): self
    {
        $this->dsPkRobo = $dsPkRobo;
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
