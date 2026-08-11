<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ExpoProcessoPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoProcessoPessoasRepository::class)]
#[ORM\Table(
    name: 'expo_processo_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_EXPO_PROC_PESSOAS_PROCESSO', 'colunas' => ['cd_processo'], 'tabelaAlvo' => 'expo_processos', 'colunasAlvo' => ['cd_processo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ExpoProcessoPessoas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: ExpoProcessos::class)]
    #[ORM\JoinColumn(name: 'cd_processo', referencedColumnName: 'cd_processo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ExpoProcessos $cdProcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint')]
    private ?int $nrAnosemestre = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, options: ['default' => ''])]
    private string $cdTurma = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_situacao', type: 'smallint')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'dt_exportado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExportado = null;

    #[ORM\Column(name: 'sn_selecionado', type: 'smallint', options: ['default' => '0'])]
    private int $snSelecionado = 0;

    #[ORM\Column(name: 'cd_situacao_curso', type: 'smallint', options: ['default' => '0', 'comment' => 'Tabela situacoes, cd_modulo 1081'])]
    private int $cdSituacaoCurso = 0;

    #[ORM\Column(name: 'vl_ch', type: 'float', nullable: true)]
    private ?float $vlCh = null;

    public function __construct(
        ?ExpoProcessos $cdProcesso = null,
        ?int $nrAnosemestre = null,
        string $cdTurma = '',
        ?int $cdPessoa = null,
        ?int $cdSituacao = null,
        ?\DateTimeInterface $dtExportado = null,
        int $snSelecionado = 0,
        int $cdSituacaoCurso = 0,
        ?float $vlCh = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->cdSituacao = $cdSituacao;
        $this->dtExportado = $dtExportado;
        $this->snSelecionado = $snSelecionado;
        $this->cdSituacaoCurso = $cdSituacaoCurso;
        $this->vlCh = $vlCh;
    }

    public function getCdProcesso(): ?ExpoProcessos
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?ExpoProcessos $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getCdTurma(): string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDtExportado(): ?\DateTimeInterface
    {
        return $this->dtExportado;
    }

    public function setDtExportado(?\DateTimeInterface $dtExportado): self
    {
        $this->dtExportado = $dtExportado;
        return $this;
    }

    public function getSnSelecionado(): int
    {
        return $this->snSelecionado;
    }

    public function setSnSelecionado(int $snSelecionado): self
    {
        $this->snSelecionado = $snSelecionado;
        return $this;
    }

    public function getCdSituacaoCurso(): int
    {
        return $this->cdSituacaoCurso;
    }

    public function setCdSituacaoCurso(int $cdSituacaoCurso): self
    {
        $this->cdSituacaoCurso = $cdSituacaoCurso;
        return $this;
    }

    public function getVlCh(): ?float
    {
        return $this->vlCh;
    }

    public function setVlCh(?float $vlCh): self
    {
        $this->vlCh = $vlCh;
        return $this;
    }
}
