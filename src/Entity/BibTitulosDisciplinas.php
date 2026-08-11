<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibTitulosDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosDisciplinasRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA', columns: ['cd_disciplina'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_disciplinas_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'bib_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibTitulosDisciplinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_curso_disciplina', type: 'integer')]
    private ?int $cdTituloCursoDisciplina = null;

    #[ORM\ManyToOne(targetEntity: BibTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulos $cdTitulo = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_disciplina', type: 'integer', nullable: true)]
    private ?int $cdDisciplina = null;

    #[ORM\Column(name: 'sn_basica', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snBasica = 0;

    #[ORM\Column(name: 'sn_complementar', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snComplementar = 0;

    public function __construct(
        ?BibTitulos $cdTitulo = null,
        ?string $cdCurso = null,
        ?int $cdDisciplina = null,
        int $snBasica = 0,
        int $snComplementar = 0
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdCurso = $cdCurso;
        $this->cdDisciplina = $cdDisciplina;
        $this->snBasica = $snBasica;
        $this->snComplementar = $snComplementar;
    }

    public function getCdTituloCursoDisciplina(): ?int
    {
        return $this->cdTituloCursoDisciplina;
    }

    public function getCdTitulo(): ?BibTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?BibTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
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

    public function getCdDisciplina(): ?int
    {
        return $this->cdDisciplina;
    }

    public function setCdDisciplina(?int $cdDisciplina): self
    {
        $this->cdDisciplina = $cdDisciplina;
        return $this;
    }

    public function getSnBasica(): int
    {
        return $this->snBasica;
    }

    public function setSnBasica(int $snBasica): self
    {
        $this->snBasica = $snBasica;
        return $this;
    }

    public function getSnComplementar(): int
    {
        return $this->snComplementar;
    }

    public function setSnComplementar(int $snComplementar): self
    {
        $this->snComplementar = $snComplementar;
        return $this;
    }
}
