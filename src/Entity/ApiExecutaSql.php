<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ApiExecutaSqlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiExecutaSqlRepository::class)]
#[ORM\Table(
    name: 'api_executa_sql',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ix_ds_chave', columns: ['ds_chave'])]
class ApiExecutaSql
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_consulta_sql', type: 'integer')]
    private ?int $cdConsultaSql = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 65535, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?string $dsChave = null,
        ?string $meSql = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->dsChave = $dsChave;
        $this->meSql = $meSql;
        $this->dtBase = $dtBase;
    }

    public function getCdConsultaSql(): ?int
    {
        return $this->cdConsultaSql;
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

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
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
