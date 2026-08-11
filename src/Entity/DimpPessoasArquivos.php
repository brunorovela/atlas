<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DimpPessoasArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DimpPessoasArquivosRepository::class)]
#[ORM\Table(
    name: 'dimp_pessoas_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DOCUMENTO', columns: ['cd_documento'])]
#[ORM\Index(name: 'IX_CD_DOCUMENTO_ARQUIVO', columns: ['cd_documento_arquivo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
class DimpPessoasArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_doc_arquivo', type: 'integer')]
    private ?int $cdPessoaDocArquivo = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'cd_documento_arquivo', type: 'integer')]
    private ?int $cdDocumentoArquivo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 255)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer')]
    private ?int $cdDisciplina = null;

    public function __construct(
        ?int $cdDocumento = null,
        ?int $cdDocumentoArquivo = null,
        ?int $cdPessoa = null,
        ?int $nrAnosemestre = null,
        ?string $cdTurma = null,
        ?int $cdDisciplina = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->cdDocumentoArquivo = $cdDocumentoArquivo;
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdDisciplina = $cdDisciplina;
    }

    public function getCdPessoaDocArquivo(): ?int
    {
        return $this->cdPessoaDocArquivo;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getCdDocumentoArquivo(): ?int
    {
        return $this->cdDocumentoArquivo;
    }

    public function setCdDocumentoArquivo(?int $cdDocumentoArquivo): self
    {
        $this->cdDocumentoArquivo = $cdDocumentoArquivo;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }
}
