<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncCursosConversaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCursosConversaoRepository::class)]
#[ORM\Table(
    name: 'estnc_cursos_conversao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CURSO_IE_ESTNC', columns: ['cd_instituicao', 'ds_curso_original'])]
#[ORM\Index(name: 'IDX_CURSO_ESTNC_CONV', columns: ['cd_curso_estnc'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_CURSO_ESTNC', columns: ['cd_curso_estnc'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ESTNC_CURSO_CONVERSAO', 'colunas' => ['cd_curso_estnc'], 'tabelaAlvo' => 'estnc_cursos', 'colunasAlvo' => ['cd_curso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_INSTITUICAO_ENSINO', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncCursosConversao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conversao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConversao = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\Column(name: 'ds_curso_original', type: 'string', length: 255, nullable: true)]
    private ?string $dsCursoOriginal = null;

    #[ORM\ManyToOne(targetEntity: EstncCursos::class)]
    #[ORM\JoinColumn(name: 'cd_curso_estnc', referencedColumnName: 'cd_curso', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursos $cdCursoEstnc = null;

    public function __construct(
        ?InstituicoesEnsino $cdInstituicao = null,
        ?string $dsCursoOriginal = null,
        ?EstncCursos $cdCursoEstnc = null
    ) {
        $this->cdInstituicao = $cdInstituicao;
        $this->dsCursoOriginal = $dsCursoOriginal;
        $this->cdCursoEstnc = $cdCursoEstnc;
    }

    public function getCdConversao(): ?int
    {
        return $this->cdConversao;
    }

    public function getCdInstituicao(): ?InstituicoesEnsino
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?InstituicoesEnsino $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getDsCursoOriginal(): ?string
    {
        return $this->dsCursoOriginal;
    }

    public function setDsCursoOriginal(?string $dsCursoOriginal): self
    {
        $this->dsCursoOriginal = $dsCursoOriginal;
        return $this;
    }

    public function getCdCursoEstnc(): ?EstncCursos
    {
        return $this->cdCursoEstnc;
    }

    public function setCdCursoEstnc(?EstncCursos $cdCursoEstnc): self
    {
        $this->cdCursoEstnc = $cdCursoEstnc;
        return $this;
    }
}
