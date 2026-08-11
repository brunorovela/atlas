<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\DiarioTerminalAcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioTerminalAcessosRepository::class)]
#[ORM\Table(
    name: 'diario_terminal_acessos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'NOVA TABELA']
)]
#[ORM\UniqueConstraint(name: 'idxUnico', columns: ['cd_pessoa', 'dt_entrada'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[ORM\Index(name: 'IX_DT_ENTRADA', columns: ['dt_entrada'])]
#[ORM\Index(name: 'IX_DT_SAIDA', columns: ['dt_saida'])]
#[ORM\Index(name: 'FK_DIARIO_TERMINAL_ACESSOS_CD_CATRACA_SAIDA_TA_CATRACA_CD_CAT', columns: ['CD_CATRACA_ENTRADA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DIARIO_TERMINAL_ACESSOS_CD_CATRACA_ENTRADA_TA_CATRACA_CD_CAT', 'colunas' => ['CD_CATRACA_ENTRADA'], 'tabelaAlvo' => 'ta_catraca', 'colunasAlvo' => ['CD_CATRACA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DIARIO_TERMINAL_ACESSOS_CD_CATRACA_SAIDA_TA_CATRACA_CD_CAT', 'colunas' => ['CD_CATRACA_ENTRADA'], 'tabelaAlvo' => 'ta_catraca', 'colunasAlvo' => ['CD_CATRACA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiarioTerminalAcessos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer')]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'dt_entrada', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'dt_saida', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'sn_especial', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEspecial = 0;

    #[ORM\Column(name: 'sn_finalizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snFinalizado = 0;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true)]
    private ?int $cdResponsavel = null;

    #[ORM\ManyToOne(targetEntity: TaCatraca::class)]
    #[ORM\JoinColumn(name: 'CD_CATRACA_ENTRADA', referencedColumnName: 'CD_CATRACA', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TaCatraca $cdCatracaEntrada = null;

    #[ORM\Column(name: 'CD_CATRACA_SAIDA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCatracaSaida = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $nrAnosemestre = null,
        ?\DateTimeInterface $dtEntrada = null,
        ?\DateTimeInterface $dtSaida = null,
        ?int $snEspecial = 0,
        ?int $snFinalizado = 0,
        ?int $cdResponsavel = null,
        ?TaCatraca $cdCatracaEntrada = null,
        ?int $cdCatracaSaida = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtEntrada = $dtEntrada;
        $this->dtSaida = $dtSaida;
        $this->snEspecial = $snEspecial;
        $this->snFinalizado = $snFinalizado;
        $this->cdResponsavel = $cdResponsavel;
        $this->cdCatracaEntrada = $cdCatracaEntrada;
        $this->cdCatracaSaida = $cdCatracaSaida;
        $this->dtBase = $dtBase;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
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

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDtEntrada(): ?\DateTimeInterface
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada(?\DateTimeInterface $dtEntrada): self
    {
        $this->dtEntrada = $dtEntrada;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
        return $this;
    }

    public function getSnEspecial(): ?int
    {
        return $this->snEspecial;
    }

    public function setSnEspecial(?int $snEspecial): self
    {
        $this->snEspecial = $snEspecial;
        return $this;
    }

    public function getSnFinalizado(): ?int
    {
        return $this->snFinalizado;
    }

    public function setSnFinalizado(?int $snFinalizado): self
    {
        $this->snFinalizado = $snFinalizado;
        return $this;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getCdCatracaEntrada(): ?TaCatraca
    {
        return $this->cdCatracaEntrada;
    }

    public function setCdCatracaEntrada(?TaCatraca $cdCatracaEntrada): self
    {
        $this->cdCatracaEntrada = $cdCatracaEntrada;
        return $this;
    }

    public function getCdCatracaSaida(): ?int
    {
        return $this->cdCatracaSaida;
    }

    public function setCdCatracaSaida(?int $cdCatracaSaida): self
    {
        $this->cdCatracaSaida = $cdCatracaSaida;
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
