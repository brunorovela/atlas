<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\KonvivaUsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KonvivaUsuariosRepository::class)]
#[ORM\Table(
    name: 'konviva_usuarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_KONVIVA_USUARIO', columns: ['cd_konviva_usuario'])]
class KonvivaUsuarios
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_konviva_usuario', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdKonvivaUsuario = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_senha', type: 'string', length: 32, options: ['fixed' => true])]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?int $cdKonvivaUsuario = null,
        ?int $cdPessoa = null,
        ?string $dsSenha = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdKonvivaUsuario = $cdKonvivaUsuario;
        $this->cdPessoa = $cdPessoa;
        $this->dsSenha = $dsSenha;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdKonvivaUsuario(): ?int
    {
        return $this->cdKonvivaUsuario;
    }

    public function setCdKonvivaUsuario(?int $cdKonvivaUsuario): self
    {
        $this->cdKonvivaUsuario = $cdKonvivaUsuario;
        return $this;
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

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }
}
