<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ConvContratosTurmasPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvContratosTurmasPessoasRepository::class)]
#[ORM\Table(
    name: 'conv_contratos_turmas_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_BAE20CEBDBEFC17995D8DD2438476D82', columns: ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONT_TURMAS_PESSOAS_CONT_TURMAS_CD_CONT_CD_TURMA_NR_ANOSEM', 'colunas' => ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'], 'tabelaAlvo' => 'conv_contratos_turmas', 'colunasAlvo' => ['CD_CONTRATO', 'CD_TURMA', 'NR_ANOSEMESTRE'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ConvContratosTurmasPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_CONTRATO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdContrato = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TURMA', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_ANOSEMESTRE', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_PESSOA', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'NR_PARCELAS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $nrParcelas = 1;

    #[ORM\Column(name: 'VL_REPASSE', type: 'decimal', precision: 15, scale: 9, options: ['default' => '0.000000000'])]
    private string $vlRepasse = '0.000000000';

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    public function __construct(
        ?int $cdContrato = null,
        ?string $cdTurma = null,
        ?int $nrAnosemestre = null,
        ?int $cdPessoa = null,
        int $nrParcelas = 1,
        string $vlRepasse = '0.000000000',
        int $snAtivo = 1
    ) {
        $this->cdContrato = $cdContrato;
        $this->cdTurma = $cdTurma;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdPessoa = $cdPessoa;
        $this->nrParcelas = $nrParcelas;
        $this->vlRepasse = $vlRepasse;
        $this->snAtivo = $snAtivo;
    }

    public function getCdContrato(): ?int
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?int $cdContrato): self
    {
        $this->cdContrato = $cdContrato;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getNrParcelas(): int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getVlRepasse(): string
    {
        return $this->vlRepasse;
    }

    public function setVlRepasse(string $vlRepasse): self
    {
        $this->vlRepasse = $vlRepasse;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
