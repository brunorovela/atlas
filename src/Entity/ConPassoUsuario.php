<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConPassoUsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConPassoUsuarioRepository::class)]
#[ORM\Table(
    name: 'con_passo_usuario',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Utilizado na inscrição personalizada para verificar que qual passo que o usuario parou ']
)]
#[ORM\UniqueConstraint(name: 'cd_pessoa_cd_area', columns: ['cd_pessoa', 'cd_area'])]
class ConPassoUsuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_passo_usuario', type: 'integer')]
    private ?int $cdPassoUsuario = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_area', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'ds_passo', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsPasso = '0';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdArea = null,
        string $dsPasso = '0',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdArea = $cdArea;
        $this->dsPasso = $dsPasso;
        $this->dtBase = $dtBase;
    }

    public function getCdPassoUsuario(): ?int
    {
        return $this->cdPassoUsuario;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getDsPasso(): string
    {
        return $this->dsPasso;
    }

    public function setDsPasso(string $dsPasso): self
    {
        $this->dsPasso = $dsPasso;
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
