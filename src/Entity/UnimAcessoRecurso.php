<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimAcessoRecursoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimAcessoRecursoRepository::class)]
#[ORM\Table(
    name: 'unim_acesso_recurso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'unim_acesso_recurso_unique', columns: ['cd_pessoa', 'ds_chave_recurso'])]
class UnimAcessoRecurso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_acesso_recurso', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdAcessoRecurso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_chave_recurso', type: 'string', length: 255)]
    private ?string $dsChaveRecurso = null;

    #[ORM\Column(name: 'nr_qtd_acesso', type: 'bigint', options: ['unsigned' => true, 'default' => '0'])]
    private string $nrQtdAcesso = '0';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsChaveRecurso = null,
        string $nrQtdAcesso = '0',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsChaveRecurso = $dsChaveRecurso;
        $this->nrQtdAcesso = $nrQtdAcesso;
        $this->dtBase = $dtBase;
    }

    public function getCdAcessoRecurso(): ?string
    {
        return $this->cdAcessoRecurso;
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

    public function getDsChaveRecurso(): ?string
    {
        return $this->dsChaveRecurso;
    }

    public function setDsChaveRecurso(?string $dsChaveRecurso): self
    {
        $this->dsChaveRecurso = $dsChaveRecurso;
        return $this;
    }

    public function getNrQtdAcesso(): string
    {
        return $this->nrQtdAcesso;
    }

    public function setNrQtdAcesso(string $nrQtdAcesso): self
    {
        $this->nrQtdAcesso = $nrQtdAcesso;
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
