<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniMigrationComErroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniMigrationComErroRepository::class)]
#[ORM\Table(
    name: 'uni_migration_com_erro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniMigrationComErro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_migration_com_erro', type: 'string', length: 255, nullable: true)]
    private ?string $dsMigrationComErro = null;

    #[ORM\Column(name: 'ds_erro_gerado', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsErroGerado = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsMigrationComErro = null,
        ?string $dsErroGerado = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsMigrationComErro = $dsMigrationComErro;
        $this->dsErroGerado = $dsErroGerado;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsMigrationComErro(): ?string
    {
        return $this->dsMigrationComErro;
    }

    public function setDsMigrationComErro(?string $dsMigrationComErro): self
    {
        $this->dsMigrationComErro = $dsMigrationComErro;
        return $this;
    }

    public function getDsErroGerado(): ?string
    {
        return $this->dsErroGerado;
    }

    public function setDsErroGerado(?string $dsErroGerado): self
    {
        $this->dsErroGerado = $dsErroGerado;
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
