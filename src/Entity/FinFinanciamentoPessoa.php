<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinFinanciamentoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinFinanciamentoPessoaRepository::class)]
#[ORM\Table(
    name: 'fin_financiamento_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_FIN_FINANC_PESSOA_FIN_CONFIG_FINANCIAMENTO_CD_FINANCIAMENTO', columns: ['CD_FINANCIAMENTO'])]
#[ORM\Index(name: 'FK_FIN_FINANC_PESSOA_MATRICULAS_CODIGOALUNO_TURMA_ANOSEMESTRE', columns: ['CD_PESSOA', 'CD_TURMA', 'NR_ANOSEMESTRE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FIN_FINANC_PESSOA_FIN_CONFIG_FINANCIAMENTO_CD_FINANCIAMENTO', 'colunas' => ['CD_FINANCIAMENTO'], 'tabelaAlvo' => 'fin_config_financiamento', 'colunasAlvo' => ['CD_FINANCIAMENTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FIN_FINANC_PESSOA_MATRICULAS_CODIGOALUNO_TURMA_ANOSEMESTRE', 'colunas' => ['CD_PESSOA', 'CD_TURMA', 'NR_ANOSEMESTRE'], 'tabelaAlvo' => 'matriculas', 'colunasAlvo' => ['codigoaluno', 'turma', 'anosemestre'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinFinanciamentoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_FINANCIAMENTO_PESSOA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinanciamentoPessoa = null;

    #[ORM\ManyToOne(targetEntity: FinConfigFinanciamento::class)]
    #[ORM\JoinColumn(name: 'CD_FINANCIAMENTO', referencedColumnName: 'CD_FINANCIAMENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinConfigFinanciamento $cdFinanciamento = null;

    #[ORM\ManyToOne(targetEntity: Matriculas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'codigoaluno', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    #[ORM\JoinColumn(name: 'CD_TURMA', referencedColumnName: 'turma', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    #[ORM\JoinColumn(name: 'NR_ANOSEMESTRE', referencedColumnName: 'anosemestre', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Matriculas $cdPessoa = null;

    #[ORM\Column(name: 'VL_PERCENTUAL', type: 'decimal', precision: 5, scale: 2, options: ['default' => '0.00'])]
    private string $vlPercentual = '0.00';

    #[ORM\Column(name: 'ME_CONTRATO', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meContrato = null;

    #[ORM\Column(name: 'DT_INCLUSAO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'DT_EXCLUSAO', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtExclusao = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'SN_RENOVACAO_AUTO', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snRenovacaoAuto = 0;

    #[ORM\Column(name: 'NR_ANOSEMESTRE_FIM', type: 'smallint', nullable: true)]
    private ?int $nrAnosemestreFim = null;

    public function __construct(
        ?FinConfigFinanciamento $cdFinanciamento = null,
        ?Matriculas $cdPessoa = null,
        string $vlPercentual = '0.00',
        ?string $meContrato = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtExclusao = null,
        int $snAtivo = 1,
        ?int $snRenovacaoAuto = 0,
        ?int $nrAnosemestreFim = null
    ) {
        $this->cdFinanciamento = $cdFinanciamento;
        $this->cdPessoa = $cdPessoa;
        $this->vlPercentual = $vlPercentual;
        $this->meContrato = $meContrato;
        $this->dtInclusao = $dtInclusao;
        $this->dtExclusao = $dtExclusao;
        $this->snAtivo = $snAtivo;
        $this->snRenovacaoAuto = $snRenovacaoAuto;
        $this->nrAnosemestreFim = $nrAnosemestreFim;
    }

    public function getCdFinanciamentoPessoa(): ?int
    {
        return $this->cdFinanciamentoPessoa;
    }

    public function getCdFinanciamento(): ?FinConfigFinanciamento
    {
        return $this->cdFinanciamento;
    }

    public function setCdFinanciamento(?FinConfigFinanciamento $cdFinanciamento): self
    {
        $this->cdFinanciamento = $cdFinanciamento;
        return $this;
    }

    public function getCdPessoa(): ?Matriculas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Matriculas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getVlPercentual(): string
    {
        return $this->vlPercentual;
    }

    public function setVlPercentual(string $vlPercentual): self
    {
        $this->vlPercentual = $vlPercentual;
        return $this;
    }

    public function getMeContrato(): ?string
    {
        return $this->meContrato;
    }

    public function setMeContrato(?string $meContrato): self
    {
        $this->meContrato = $meContrato;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getDtExclusao(): ?\DateTimeInterface
    {
        return $this->dtExclusao;
    }

    public function setDtExclusao(?\DateTimeInterface $dtExclusao): self
    {
        $this->dtExclusao = $dtExclusao;
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

    public function getSnRenovacaoAuto(): ?int
    {
        return $this->snRenovacaoAuto;
    }

    public function setSnRenovacaoAuto(?int $snRenovacaoAuto): self
    {
        $this->snRenovacaoAuto = $snRenovacaoAuto;
        return $this;
    }

    public function getNrAnosemestreFim(): ?int
    {
        return $this->nrAnosemestreFim;
    }

    public function setNrAnosemestreFim(?int $nrAnosemestreFim): self
    {
        $this->nrAnosemestreFim = $nrAnosemestreFim;
        return $this;
    }
}
