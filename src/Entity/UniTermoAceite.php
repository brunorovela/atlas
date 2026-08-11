<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\UniTermoAceiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniTermoAceiteRepository::class)]
#[ORM\Table(
    name: 'uni_termo_aceite',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniTermoAceite
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_termo_aceite', type: 'integer')]
    private ?int $cdTermoAceite = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'sn_bloqueia_aluno', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snBloqueiaAluno = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'me_conteudo', type: 'text')]
    private ?string $meConteudo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?int $snBloqueiaAluno = null,
        ?int $snAtivo = null,
        ?string $meConteudo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->snBloqueiaAluno = $snBloqueiaAluno;
        $this->snAtivo = $snAtivo;
        $this->meConteudo = $meConteudo;
        $this->dtBase = $dtBase;
    }

    public function getCdTermoAceite(): ?int
    {
        return $this->cdTermoAceite;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getSnBloqueiaAluno(): ?int
    {
        return $this->snBloqueiaAluno;
    }

    public function setSnBloqueiaAluno(?int $snBloqueiaAluno): self
    {
        $this->snBloqueiaAluno = $snBloqueiaAluno;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
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
