<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DiarioGruposPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioGruposPessoasRepository::class)]
#[ORM\Table(
    name: 'diario_grupos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_cd_pessoa', columns: ['cd_pessoa'])]
class DiarioGruposPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'dt_entrada', type: 'datetime')]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'dt_saida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtEntrada = null,
        ?\DateTimeInterface $dtSaida = null
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
        $this->dtEntrada = $dtEntrada;
        $this->dtSaida = $dtSaida;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function getDtEntrada(): ?\DateTimeInterface
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada(?\DateTimeInterface $dtEntrada): self
    {
        $this->dtEntrada = $dtEntrada;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
        return $this;
    }
}
