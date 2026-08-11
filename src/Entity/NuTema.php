<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuTemaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTemaRepository::class)]
#[ORM\Table(
    name: 'nu_tema',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'unique_cd_enum', columns: ['cd_coligada_matriz', 'enum_tipo'])]
class NuTema
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'integer', nullable: true)]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'enum_tipo', type: 'enum', options: ['values' => ['LOGO_PORTAL_LARGE', 'LOGO_PORTAL_MEDIUM', 'LOGO_PORTAL_SMALL', 'BG_IMAGEM_PORTAL', 'ICONE_PORTAL', 'LOGO_GESTAO', 'CARROSSEL_IMAGENS_01', 'CARROSSEL_IMAGENS_02', 'CARROSSEL_IMAGENS_03', 'CARROSSEL_IMAGENS_04', 'CARROSSEL_IMAGENS_05', 'ESTILO_CORES', 'ESTILO_PADRAO', 'ESTILO_PADRAO_BOOTSTRAP', 'ESTILO_PORTAL', 'ESTILO_PORTAL_RESPONSIVO', 'ESTILO_INICIAL', 'ESTILO_MANUAL']])]
    private ?string $enumTipo = null;

    #[ORM\Column(name: 'ds_caminho', type: 'string', length: 255, nullable: true)]
    private ?string $dsCaminho = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdColigadaMatriz = null,
        ?string $enumTipo = null,
        ?string $dsCaminho = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->enumTipo = $enumTipo;
        $this->dsCaminho = $dsCaminho;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getEnumTipo(): ?string
    {
        return $this->enumTipo;
    }

    public function setEnumTipo(?string $enumTipo): self
    {
        $this->enumTipo = $enumTipo;
        return $this;
    }

    public function getDsCaminho(): ?string
    {
        return $this->dsCaminho;
    }

    public function setDsCaminho(?string $dsCaminho): self
    {
        $this->dsCaminho = $dsCaminho;
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
