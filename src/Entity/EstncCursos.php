<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCursosRepository::class)]
#[ORM\Table(
    name: 'estnc_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_COORDENADOR', columns: ['cd_coordenador'])]
#[ORM\Index(name: 'IX_DS_CODIGO', columns: ['ds_codigo'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['ds_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_CURSOS_CD_INSTITUICAO', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_CURSOS_CD_PESSOA', 'colunas' => ['cd_coordenador'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncCursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCurso = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_coordenador', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdCoordenador = null;

    #[ORM\Column(name: 'ds_codigo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodigo = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255, nullable: true)]
    private ?string $dsCurso = null;

    public function __construct(
        ?InstituicoesEnsino $cdInstituicao = null,
        ?Pessoas $cdCoordenador = null,
        ?string $dsCodigo = null,
        ?string $dsCurso = null
    ) {
        $this->cdInstituicao = $cdInstituicao;
        $this->cdCoordenador = $cdCoordenador;
        $this->dsCodigo = $dsCodigo;
        $this->dsCurso = $dsCurso;
    }

    public function getCdCurso(): ?int
    {
        return $this->cdCurso;
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

    public function getCdCoordenador(): ?Pessoas
    {
        return $this->cdCoordenador;
    }

    public function setCdCoordenador(?Pessoas $cdCoordenador): self
    {
        $this->cdCoordenador = $cdCoordenador;
        return $this;
    }

    public function getDsCodigo(): ?string
    {
        return $this->dsCodigo;
    }

    public function setDsCodigo(?string $dsCodigo): self
    {
        $this->dsCodigo = $dsCodigo;
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
}
