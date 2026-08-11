<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasMatriculaCursoCadastroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasMatriculaCursoCadastroRepository::class)]
#[ORM\Table(
    name: 'pessoas_matricula_curso_cadastro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
#[ORM\Index(name: 'IX_CD_MATRICULA_CURSO', columns: ['cd_matricula_curso'])]
class PessoasMatriculaCursoCadastro
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCampo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_matricula_curso', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdMatriculaCurso = 0;

    #[ORM\Column(name: 'ds_conteudo', type: 'string', length: 100, nullable: true)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPessoa = 0,
        int $cdCampo = 0,
        int $cdMatriculaCurso = 0,
        ?string $dsConteudo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdCampo = $cdCampo;
        $this->cdMatriculaCurso = $cdMatriculaCurso;
        $this->dsConteudo = $dsConteudo;
        $this->dtBase = $dtBase;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdCampo(): int
    {
        return $this->cdCampo;
    }

    public function setCdCampo(int $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getCdMatriculaCurso(): int
    {
        return $this->cdMatriculaCurso;
    }

    public function setCdMatriculaCurso(int $cdMatriculaCurso): self
    {
        $this->cdMatriculaCurso = $cdMatriculaCurso;
        return $this;
    }

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
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
