<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimAppRegraSqlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAppRegraSqlRepository::class)]
#[ORM\Table(
    name: 'unim_app_regra_sql',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimAppRegraSql
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_regra_sql', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRegraSql = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 65535, nullable: true)]
    private ?string $meSql = null;

    public function __construct(
        ?string $dsTitulo = null,
        ?string $meSql = null
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->meSql = $meSql;
    }

    public function getCdRegraSql(): ?int
    {
        return $this->cdRegraSql;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
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
}
