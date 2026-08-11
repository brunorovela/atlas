<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaProcessoMatriculaDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoMatriculaDocumentoRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo_matricula_documento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela responsavel por vincular os registros do uni_diploma_processo_matricula com o acrv_documento_pessoa']
)]
#[ORM\Index(name: 'FK__uni_diploma_processo_matricula', columns: ['cd_diploma_processo_matricula'])]
#[ORM\Index(name: 'FK__acrv_documento_pessoa', columns: ['cd_documento_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK__acrv_documento_pessoa', 'colunas' => ['cd_documento_pessoa'], 'tabelaAlvo' => 'acrv_documento_pessoa', 'colunasAlvo' => ['cd_documento_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK__uni_diploma_processo_matricula', 'colunas' => ['cd_diploma_processo_matricula'], 'tabelaAlvo' => 'uni_diploma_processo_matricula', 'colunasAlvo' => ['cd_diploma_processo_matricula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaProcessoMatriculaDocumento
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UniDiplomaProcessoMatricula::class)]
    #[ORM\JoinColumn(name: 'cd_diploma_processo_matricula', referencedColumnName: 'cd_diploma_processo_matricula', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaProcessoMatricula $cdDiplomaProcessoMatricula = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: AcrvDocumentoPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_documento_pessoa', referencedColumnName: 'cd_documento_pessoa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvDocumentoPessoa $cdDocumentoPessoa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniDiplomaProcessoMatricula $cdDiplomaProcessoMatricula = null,
        ?AcrvDocumentoPessoa $cdDocumentoPessoa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDiplomaProcessoMatricula = $cdDiplomaProcessoMatricula;
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        $this->dtBase = $dtBase;
    }

    public function getCdDiplomaProcessoMatricula(): ?UniDiplomaProcessoMatricula
    {
        return $this->cdDiplomaProcessoMatricula;
    }

    public function setCdDiplomaProcessoMatricula(?UniDiplomaProcessoMatricula $cdDiplomaProcessoMatricula): self
    {
        $this->cdDiplomaProcessoMatricula = $cdDiplomaProcessoMatricula;
        return $this;
    }

    public function getCdDocumentoPessoa(): ?AcrvDocumentoPessoa
    {
        return $this->cdDocumentoPessoa;
    }

    public function setCdDocumentoPessoa(?AcrvDocumentoPessoa $cdDocumentoPessoa): self
    {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
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
