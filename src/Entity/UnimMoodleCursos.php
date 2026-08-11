<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimMoodleCursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleCursosRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_cursos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_sigla', columns: ['ds_sigla'])]
#[ORM\Index(name: 'FK_unim_moodle_cursos_cd_coligada', columns: ['cd_coligada'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_moodle_cursos_cd_coligada', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimMoodleCursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_moodle_curso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMoodleCurso = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_sigla', type: 'string', length: 255, nullable: true)]
    private ?string $dsSigla = null;

    #[ORM\Column(name: 'dt_revisao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtRevisao = null;

    #[ORM\Column(name: 'cd_integracao_externa', type: 'smallint', nullable: true)]
    private ?int $cdIntegracaoExterna = null;

    #[ORM\Column(name: 'sn_separar_turma', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSepararTurma = false;

    #[ORM\Column(name: 'sn_separar_mensal', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSepararMensal = false;

    #[ORM\Column(name: 'ds_metodo_importacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsMetodoImportacao = null;

    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer', nullable: true)]
    private ?int $cdAvaliacaoTipo = null;

    #[ORM\Column(name: 'nr_separar_turma', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0', 'comment' => '0 = Esse campo terá valor default ZERO quando não utilizado.
1 = Organizar os alunos no LMS na turma geral.
2 = Organizar os alunos no LMS na mesma turma que vem do Unimestre.
3 = Organizar os alunos no LMS em turmas mensais.'])]
    private int $nrSepararTurma = 0;

    #[ORM\Column(name: 'sn_separar_agrupamento', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSepararAgrupamento = false;

    #[ORM\Column(name: 'nr_conteiner_brightspace', type: 'string', length: 255, nullable: true)]
    private ?string $nrConteinerBrightspace = null;

    #[ORM\Column(name: 'nr_oferta_matriz_brightspace', type: 'string', length: 255, nullable: true)]
    private ?string $nrOfertaMatrizBrightspace = null;

    #[ORM\Column(name: 'sn_curso_modelo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCursoModelo = false;

    #[ORM\Column(name: 'cd_curso_modelo', type: 'integer', nullable: true)]
    private ?int $cdCursoModelo = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?string $dsSigla = null,
        ?\DateTimeInterface $dtRevisao = null,
        ?int $cdIntegracaoExterna = null,
        ?bool $snSepararTurma = false,
        ?bool $snSepararMensal = false,
        ?string $dsMetodoImportacao = null,
        ?int $cdAvaliacaoTipo = null,
        int $nrSepararTurma = 0,
        ?bool $snSepararAgrupamento = false,
        ?string $nrConteinerBrightspace = null,
        ?string $nrOfertaMatrizBrightspace = null,
        ?bool $snCursoModelo = false,
        ?int $cdCursoModelo = null,
        ?Coligadas $cdColigada = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->dsSigla = $dsSigla;
        $this->dtRevisao = $dtRevisao;
        $this->cdIntegracaoExterna = $cdIntegracaoExterna;
        $this->snSepararTurma = $snSepararTurma;
        $this->snSepararMensal = $snSepararMensal;
        $this->dsMetodoImportacao = $dsMetodoImportacao;
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        $this->nrSepararTurma = $nrSepararTurma;
        $this->snSepararAgrupamento = $snSepararAgrupamento;
        $this->nrConteinerBrightspace = $nrConteinerBrightspace;
        $this->nrOfertaMatrizBrightspace = $nrOfertaMatrizBrightspace;
        $this->snCursoModelo = $snCursoModelo;
        $this->cdCursoModelo = $cdCursoModelo;
        $this->cdColigada = $cdColigada;
    }

    public function getCdMoodleCurso(): ?int
    {
        return $this->cdMoodleCurso;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getDsSigla(): ?string
    {
        return $this->dsSigla;
    }

    public function setDsSigla(?string $dsSigla): self
    {
        $this->dsSigla = $dsSigla;
        return $this;
    }

    public function getDtRevisao(): ?\DateTimeInterface
    {
        return $this->dtRevisao;
    }

    public function setDtRevisao(?\DateTimeInterface $dtRevisao): self
    {
        $this->dtRevisao = $dtRevisao;
        return $this;
    }

    public function getCdIntegracaoExterna(): ?int
    {
        return $this->cdIntegracaoExterna;
    }

    public function setCdIntegracaoExterna(?int $cdIntegracaoExterna): self
    {
        $this->cdIntegracaoExterna = $cdIntegracaoExterna;
        return $this;
    }

    public function isSnSepararTurma(): ?bool
    {
        return $this->snSepararTurma;
    }

    public function setSnSepararTurma(?bool $snSepararTurma): self
    {
        $this->snSepararTurma = $snSepararTurma;
        return $this;
    }

    public function isSnSepararMensal(): ?bool
    {
        return $this->snSepararMensal;
    }

    public function setSnSepararMensal(?bool $snSepararMensal): self
    {
        $this->snSepararMensal = $snSepararMensal;
        return $this;
    }

    public function getDsMetodoImportacao(): ?string
    {
        return $this->dsMetodoImportacao;
    }

    public function setDsMetodoImportacao(?string $dsMetodoImportacao): self
    {
        $this->dsMetodoImportacao = $dsMetodoImportacao;
        return $this;
    }

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?int $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }

    public function getNrSepararTurma(): int
    {
        return $this->nrSepararTurma;
    }

    public function setNrSepararTurma(int $nrSepararTurma): self
    {
        $this->nrSepararTurma = $nrSepararTurma;
        return $this;
    }

    public function isSnSepararAgrupamento(): ?bool
    {
        return $this->snSepararAgrupamento;
    }

    public function setSnSepararAgrupamento(?bool $snSepararAgrupamento): self
    {
        $this->snSepararAgrupamento = $snSepararAgrupamento;
        return $this;
    }

    public function getNrConteinerBrightspace(): ?string
    {
        return $this->nrConteinerBrightspace;
    }

    public function setNrConteinerBrightspace(?string $nrConteinerBrightspace): self
    {
        $this->nrConteinerBrightspace = $nrConteinerBrightspace;
        return $this;
    }

    public function getNrOfertaMatrizBrightspace(): ?string
    {
        return $this->nrOfertaMatrizBrightspace;
    }

    public function setNrOfertaMatrizBrightspace(?string $nrOfertaMatrizBrightspace): self
    {
        $this->nrOfertaMatrizBrightspace = $nrOfertaMatrizBrightspace;
        return $this;
    }

    public function isSnCursoModelo(): ?bool
    {
        return $this->snCursoModelo;
    }

    public function setSnCursoModelo(?bool $snCursoModelo): self
    {
        $this->snCursoModelo = $snCursoModelo;
        return $this;
    }

    public function getCdCursoModelo(): ?int
    {
        return $this->cdCursoModelo;
    }

    public function setCdCursoModelo(?int $cdCursoModelo): self
    {
        $this->cdCursoModelo = $cdCursoModelo;
        return $this;
    }

    public function getCdColigada(): ?Coligadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?Coligadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
