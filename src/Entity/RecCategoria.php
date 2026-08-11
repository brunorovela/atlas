<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RecCategoriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecCategoriaRepository::class)]
#[ORM\Table(
    name: 'rec_categoria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'newtable_un', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RecCategoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'integer')]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_anexo', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snAnexo = 'N';

    #[ORM\Column(name: 'sn_confirmacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snConfirmacao = 'N';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsCategoria = null,
        ?string $dsChave = null,
        ?string $snAnexo = 'N',
        ?string $snConfirmacao = 'N',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsCategoria = $dsCategoria;
        $this->dsChave = $dsChave;
        $this->snAnexo = $snAnexo;
        $this->snConfirmacao = $snConfirmacao;
        $this->dtBase = $dtBase;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getSnAnexo(): ?string
    {
        return $this->snAnexo;
    }

    public function setSnAnexo(?string $snAnexo): self
    {
        $this->snAnexo = $snAnexo;
        return $this;
    }

    public function getSnConfirmacao(): ?string
    {
        return $this->snConfirmacao;
    }

    public function setSnConfirmacao(?string $snConfirmacao): self
    {
        $this->snConfirmacao = $snConfirmacao;
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
