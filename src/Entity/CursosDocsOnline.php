<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosDocsOnlineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosDocsOnlineRepository::class)]
#[ORM\Table(
    name: 'cursos_docs_online',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_CD_TIPO_DOC', columns: ['cd_tipo_doc'])]
class CursosDocsOnline
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_doc', type: 'smallint')]
    private ?int $cdDoc = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 200, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'ds_doc', type: 'text', length: 65535, nullable: true)]
    private ?string $dsDoc = null;

    #[ORM\Column(name: 'cd_tipo_doc', type: 'string', length: 1, options: ['fixed' => true, 'default' => ''])]
    private string $cdTipoDoc = '';

    public function __construct(
        ?string $dsTitulo = null,
        ?int $nrAnosemestre = null,
        ?string $dsDoc = null,
        string $cdTipoDoc = ''
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dsDoc = $dsDoc;
        $this->cdTipoDoc = $cdTipoDoc;
    }

    public function getCdDoc(): ?int
    {
        return $this->cdDoc;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
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

    public function getDsDoc(): ?string
    {
        return $this->dsDoc;
    }

    public function setDsDoc(?string $dsDoc): self
    {
        $this->dsDoc = $dsDoc;
        return $this;
    }

    public function getCdTipoDoc(): string
    {
        return $this->cdTipoDoc;
    }

    public function setCdTipoDoc(string $cdTipoDoc): self
    {
        $this->cdTipoDoc = $cdTipoDoc;
        return $this;
    }
}
