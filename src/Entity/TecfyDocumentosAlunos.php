<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TecfyDocumentosAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TecfyDocumentosAlunosRepository::class)]
#[ORM\Table(
    name: 'tecfy_documentos_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_documentos_alunos', columns: ['cd_documento_aluno'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_documentos_alunos', 'colunas' => ['cd_documento_aluno'], 'tabelaAlvo' => 'documentos_alunos', 'colunasAlvo' => ['cd_documento_aluno'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TecfyDocumentosAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_aluno_tecfy', type: 'integer')]
    private ?int $cdDocumentoAlunoTecfy = null;

    #[ORM\ManyToOne(targetEntity: DocumentosAlunos::class)]
    #[ORM\JoinColumn(name: 'cd_documento_aluno', referencedColumnName: 'cd_documento_aluno', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?DocumentosAlunos $cdDocumentoAluno = null;

    #[ORM\Column(name: 'ds_documento_tecfy', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsDocumentoTecfy = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?DocumentosAlunos $cdDocumentoAluno = null,
        string $dsDocumentoTecfy = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDocumentoAluno = $cdDocumentoAluno;
        $this->dsDocumentoTecfy = $dsDocumentoTecfy;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumentoAlunoTecfy(): ?int
    {
        return $this->cdDocumentoAlunoTecfy;
    }

    public function getCdDocumentoAluno(): ?DocumentosAlunos
    {
        return $this->cdDocumentoAluno;
    }

    public function setCdDocumentoAluno(?DocumentosAlunos $cdDocumentoAluno): self
    {
        $this->cdDocumentoAluno = $cdDocumentoAluno;
        return $this;
    }

    public function getDsDocumentoTecfy(): string
    {
        return $this->dsDocumentoTecfy;
    }

    public function setDsDocumentoTecfy(string $dsDocumentoTecfy): self
    {
        $this->dsDocumentoTecfy = $dsDocumentoTecfy;
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
