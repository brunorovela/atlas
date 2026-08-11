<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BancoRetornoMotivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BancoRetornoMotivosRepository::class)]
#[ORM\Table(
    name: 'banco_retorno_motivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_BANCO', columns: ['cd_banco'])]
#[ORM\Index(name: 'IX_CD_MOTIVO', columns: ['cd_motivo'])]
#[ORM\Index(name: 'IX_CD_GRUPO_MOTIVOS', columns: ['cd_grupo_motivos'])]
class BancoRetornoMotivos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_banco', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $cdBanco = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_motivo', type: 'string', length: 10, options: ['default' => ''])]
    private string $cdMotivo = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo_motivos', type: 'smallint', options: ['default' => '1'])]
    private int $cdGrupoMotivos = 1;

    #[ORM\Column(name: 'cd_origem', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1', 'comment' => '1 = Contas a Receber; 2 = Contas a Pagar'])]
    private ?int $cdOrigem = 1;

    #[ORM\Column(name: 'ds_motivo', type: 'string', length: 100, nullable: true)]
    private ?string $dsMotivo = null;

    public function __construct(
        string $cdBanco = '',
        string $cdMotivo = '',
        int $cdGrupoMotivos = 1,
        ?int $cdOrigem = 1,
        ?string $dsMotivo = null
    ) {
        $this->cdBanco = $cdBanco;
        $this->cdMotivo = $cdMotivo;
        $this->cdGrupoMotivos = $cdGrupoMotivos;
        $this->cdOrigem = $cdOrigem;
        $this->dsMotivo = $dsMotivo;
    }

    public function getCdBanco(): string
    {
        return $this->cdBanco;
    }

    public function setCdBanco(string $cdBanco): self
    {
        $this->cdBanco = $cdBanco;
        return $this;
    }

    public function getCdMotivo(): string
    {
        return $this->cdMotivo;
    }

    public function setCdMotivo(string $cdMotivo): self
    {
        $this->cdMotivo = $cdMotivo;
        return $this;
    }

    public function getCdGrupoMotivos(): int
    {
        return $this->cdGrupoMotivos;
    }

    public function setCdGrupoMotivos(int $cdGrupoMotivos): self
    {
        $this->cdGrupoMotivos = $cdGrupoMotivos;
        return $this;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getDsMotivo(): ?string
    {
        return $this->dsMotivo;
    }

    public function setDsMotivo(?string $dsMotivo): self
    {
        $this->dsMotivo = $dsMotivo;
        return $this;
    }
}
