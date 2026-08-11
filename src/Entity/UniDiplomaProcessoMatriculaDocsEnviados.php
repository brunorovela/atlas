<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaProcessoMatriculaDocsEnviadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoMatriculaDocsEnviadosRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo_matricula_docs_enviados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_5501241B4755CC79', columns: ['cd_diploma_processo_matricula'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_udpmde_cd_diploma_processo_matricula', 'colunas' => ['cd_diploma_processo_matricula'], 'tabelaAlvo' => 'uni_diploma_processo_matricula', 'colunasAlvo' => ['cd_diploma_processo_matricula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaProcessoMatriculaDocsEnviados
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UniDiplomaProcessoMatricula::class)]
    #[ORM\JoinColumn(name: 'cd_diploma_processo_matricula', referencedColumnName: 'cd_diploma_processo_matricula', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaProcessoMatricula $cdDiplomaProcessoMatricula = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniDiplomaProcessoMatricula $cdDiplomaProcessoMatricula = null,
        ?int $cdDocumento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDiplomaProcessoMatricula = $cdDiplomaProcessoMatricula;
        $this->cdDocumento = $cdDocumento;
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

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
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
