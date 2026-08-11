<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasUnimestreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasUnimestreRepository::class)]
#[ORM\Table(
    name: 'pessoas_unimestre',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA_UNIMESTRE', columns: ['cd_pessoa_unimestre'])]
class PessoasUnimestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_busca', type: 'integer')]
    private ?int $cdPessoaBusca = null;

    #[ORM\Column(name: 'cd_pessoa_unimestre', type: 'integer')]
    private ?int $cdPessoaUnimestre = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_consoantes_nome', type: 'string', length: 255, nullable: true)]
    private ?string $dsConsoantesNome = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'ds_turma', type: 'string', length: 255, nullable: true)]
    private ?string $dsTurma = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'ds_telefone', type: 'string', length: 255, nullable: true)]
    private ?string $dsTelefone = null;

    public function __construct(
        ?int $cdPessoaUnimestre = null,
        ?string $dsNome = null,
        ?string $dsConsoantesNome = null,
        ?string $dsCurso = null,
        ?string $dsTurma = null,
        ?string $dsEmail = null,
        ?string $dsTelefone = null
    ) {
        $this->cdPessoaUnimestre = $cdPessoaUnimestre;
        $this->dsNome = $dsNome;
        $this->dsConsoantesNome = $dsConsoantesNome;
        $this->dsCurso = $dsCurso;
        $this->dsTurma = $dsTurma;
        $this->dsEmail = $dsEmail;
        $this->dsTelefone = $dsTelefone;
    }

    public function getCdPessoaBusca(): ?int
    {
        return $this->cdPessoaBusca;
    }

    public function getCdPessoaUnimestre(): ?int
    {
        return $this->cdPessoaUnimestre;
    }

    public function setCdPessoaUnimestre(?int $cdPessoaUnimestre): self
    {
        $this->cdPessoaUnimestre = $cdPessoaUnimestre;
        return $this;
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

    public function getDsConsoantesNome(): ?string
    {
        return $this->dsConsoantesNome;
    }

    public function setDsConsoantesNome(?string $dsConsoantesNome): self
    {
        $this->dsConsoantesNome = $dsConsoantesNome;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getDsTurma(): ?string
    {
        return $this->dsTurma;
    }

    public function setDsTurma(?string $dsTurma): self
    {
        $this->dsTurma = $dsTurma;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function getDsTelefone(): ?string
    {
        return $this->dsTelefone;
    }

    public function setDsTelefone(?string $dsTelefone): self
    {
        $this->dsTelefone = $dsTelefone;
        return $this;
    }
}
