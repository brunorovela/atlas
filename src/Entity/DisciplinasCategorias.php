<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DisciplinasCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinasCategoriasRepository::class)]
#[ORM\Table(
    name: 'disciplinas_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
class DisciplinasCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 20, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'sn_ocultar_do_historico', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snOcultarDoHistorico = 1;

    #[ORM\Column(name: 'sn_ocultar_do_diploma', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snOcultarDoDiploma = 0;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsCategoria = null,
        ?int $snOcultarDoHistorico = 1,
        ?int $snOcultarDoDiploma = 0
    ) {
        $this->dsChave = $dsChave;
        $this->dsCategoria = $dsCategoria;
        $this->snOcultarDoHistorico = $snOcultarDoHistorico;
        $this->snOcultarDoDiploma = $snOcultarDoDiploma;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
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

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }

    public function getSnOcultarDoHistorico(): ?int
    {
        return $this->snOcultarDoHistorico;
    }

    public function setSnOcultarDoHistorico(?int $snOcultarDoHistorico): self
    {
        $this->snOcultarDoHistorico = $snOcultarDoHistorico;
        return $this;
    }

    public function getSnOcultarDoDiploma(): ?int
    {
        return $this->snOcultarDoDiploma;
    }

    public function setSnOcultarDoDiploma(?int $snOcultarDoDiploma): self
    {
        $this->snOcultarDoDiploma = $snOcultarDoDiploma;
        return $this;
    }
}
