<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncImportacaoTemporariaFaltanteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncImportacaoTemporariaFaltanteRepository::class)]
#[ORM\Table(
    name: 'estnc_importacao_temporaria_faltante',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CPF', columns: ['ds_cpf'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'], options: ['lengths' => [15]])]
#[ORM\Index(name: 'IX_CD_IMPORTACAO', columns: ['cd_importacao'])]
class EstncImportacaoTemporariaFaltante
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importacao_temporaria_faltante', type: 'integer')]
    private ?int $cdImportacaoTemporariaFaltante = null;

    #[ORM\Column(name: 'cd_importacao', type: 'integer')]
    private ?int $cdImportacao = null;

    #[ORM\Column(name: 'ds_cpf', type: 'string', length: 11, nullable: true)]
    private ?string $dsCpf = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true)]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'cd_instituicao', type: 'integer', nullable: true)]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'string', length: 5, nullable: true)]
    private ?string $nrAnosemestre = null;

    public function __construct(
        ?int $cdImportacao = null,
        ?string $dsCpf = null,
        ?string $cdCurso = null,
        ?int $cdSituacao = null,
        ?int $cdInstituicao = null,
        ?string $nrAnosemestre = null
    ) {
        $this->cdImportacao = $cdImportacao;
        $this->dsCpf = $dsCpf;
        $this->cdCurso = $cdCurso;
        $this->cdSituacao = $cdSituacao;
        $this->cdInstituicao = $cdInstituicao;
        $this->nrAnosemestre = $nrAnosemestre;
    }

    public function getCdImportacaoTemporariaFaltante(): ?int
    {
        return $this->cdImportacaoTemporariaFaltante;
    }

    public function getCdImportacao(): ?int
    {
        return $this->cdImportacao;
    }

    public function setCdImportacao(?int $cdImportacao): self
    {
        $this->cdImportacao = $cdImportacao;
        return $this;
    }

    public function getDsCpf(): ?string
    {
        return $this->dsCpf;
    }

    public function setDsCpf(?string $dsCpf): self
    {
        $this->dsCpf = $dsCpf;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getNrAnosemestre(): ?string
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?string $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }
}
