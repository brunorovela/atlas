<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\LgtcDespesaAulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcDespesaAulaRepository::class)]
#[ORM\Table(
    name: 'lgtc_despesa_aula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TIPO_DESPESA_DESPESA_AULA_CD_TIPO_DESPESA', columns: ['CD_TIPO_DESPESA'])]
#[ORM\Index(name: 'FK_DESPESA_SITUACAO_DESPESA_AULA_CD_SITUACAO', columns: ['CD_SITUACAO'])]
#[ORM\Index(name: 'FK_DIARIO_AULAS_DESPESA_AULA_CD_DIARIO_AULA', columns: ['CD_DIARIO_AULA'])]
#[ORM\Index(name: 'FK_PLANO_CONTAS_DESPESA_AULA_CD_CONTA_CD_COLIGADA_MATRIZ', columns: ['CD_CONTA', 'CD_COLIGADA_MATRIZ'])]
#[ORM\Index(name: 'FK_PESSOAS_DESPESA_AULA_CD_PESSOA', columns: ['CD_FORNECEDOR'])]
#[ORM\Index(name: 'FK_DESPESA_AULA_CD_TITULO_FIN_CONTAS_PAGAR_CD_TITULO', columns: ['CD_TITULO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DESPESA_AULA_CD_TITULO_FIN_CONTAS_PAGAR_CD_TITULO', 'colunas' => ['CD_TITULO'], 'tabelaAlvo' => 'fin_contas_pagar', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DESPESA_SITUACAO_DESPESA_AULA_CD_SITUACAO', 'colunas' => ['CD_SITUACAO'], 'tabelaAlvo' => 'lgtc_despesa_situacao', 'colunasAlvo' => ['CD_SITUACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_DIARIO_AULAS_DESPESA_AULA_CD_DIARIO_AULA', 'colunas' => ['CD_DIARIO_AULA'], 'tabelaAlvo' => 'diario_aulas', 'colunasAlvo' => ['cd_diario_aula'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOAS_DESPESA_AULA_CD_PESSOA', 'colunas' => ['CD_FORNECEDOR'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PLANO_CONTAS_DESPESA_AULA_CD_CONTA_CD_COLIGADA_MATRIZ', 'colunas' => ['CD_CONTA', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_plano_contas', 'colunasAlvo' => ['cd_conta', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TIPO_DESPESA_DESPESA_AULA_CD_TIPO_DESPESA', 'colunas' => ['CD_TIPO_DESPESA'], 'tabelaAlvo' => 'lgtc_tipo_despesa', 'colunasAlvo' => ['CD_TIPO_DESPESA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class LgtcDespesaAula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_DESPESA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDespesa = null;

    #[ORM\ManyToOne(targetEntity: LgtcTipoDespesa::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO_DESPESA', referencedColumnName: 'CD_TIPO_DESPESA', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcTipoDespesa $cdTipoDespesa = null;

    #[ORM\ManyToOne(targetEntity: DiarioAulas::class)]
    #[ORM\JoinColumn(name: 'CD_DIARIO_AULA', referencedColumnName: 'cd_diario_aula', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?DiarioAulas $cdDiarioAula = null;

    #[ORM\ManyToOne(targetEntity: LgtcDespesaSituacao::class)]
    #[ORM\JoinColumn(name: 'CD_SITUACAO', referencedColumnName: 'CD_SITUACAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcDespesaSituacao $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_FORNECEDOR', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdFornecedor = null;

    #[ORM\Column(name: 'CD_CONTA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConta = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'DT_COMPROMISSO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtCompromisso = null;

    #[ORM\Column(name: 'VL_TOTAL', type: 'float', nullable: true)]
    private ?float $vlTotal = null;

    #[ORM\Column(name: 'ME_JSON_VALOR', type: 'text', length: 65535, nullable: true)]
    private ?string $meJsonValor = null;

    #[ORM\Column(name: 'DT_CADASTRO', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'CD_TITULO', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    public function __construct(
        ?LgtcTipoDespesa $cdTipoDespesa = null,
        ?DiarioAulas $cdDiarioAula = null,
        ?LgtcDespesaSituacao $cdSituacao = null,
        ?Pessoas $cdFornecedor = null,
        ?int $cdConta = null,
        ?int $cdColigadaMatriz = null,
        ?string $dsObservacao = null,
        ?\DateTimeInterface $dtCompromisso = null,
        ?float $vlTotal = null,
        ?string $meJsonValor = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?int $cdTitulo = null,
        ?int $cdTipoTitulo = null
    ) {
        $this->cdTipoDespesa = $cdTipoDespesa;
        $this->cdDiarioAula = $cdDiarioAula;
        $this->cdSituacao = $cdSituacao;
        $this->cdFornecedor = $cdFornecedor;
        $this->cdConta = $cdConta;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dsObservacao = $dsObservacao;
        $this->dtCompromisso = $dtCompromisso;
        $this->vlTotal = $vlTotal;
        $this->meJsonValor = $meJsonValor;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdTitulo = $cdTitulo;
        $this->cdTipoTitulo = $cdTipoTitulo;
    }

    public function getCdDespesa(): ?int
    {
        return $this->cdDespesa;
    }

    public function getCdTipoDespesa(): ?LgtcTipoDespesa
    {
        return $this->cdTipoDespesa;
    }

    public function setCdTipoDespesa(?LgtcTipoDespesa $cdTipoDespesa): self
    {
        $this->cdTipoDespesa = $cdTipoDespesa;
        return $this;
    }

    public function getCdDiarioAula(): ?DiarioAulas
    {
        return $this->cdDiarioAula;
    }

    public function setCdDiarioAula(?DiarioAulas $cdDiarioAula): self
    {
        $this->cdDiarioAula = $cdDiarioAula;
        return $this;
    }

    public function getCdSituacao(): ?LgtcDespesaSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?LgtcDespesaSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdFornecedor(): ?Pessoas
    {
        return $this->cdFornecedor;
    }

    public function setCdFornecedor(?Pessoas $cdFornecedor): self
    {
        $this->cdFornecedor = $cdFornecedor;
        return $this;
    }

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getDtCompromisso(): ?\DateTimeInterface
    {
        return $this->dtCompromisso;
    }

    public function setDtCompromisso(?\DateTimeInterface $dtCompromisso): self
    {
        $this->dtCompromisso = $dtCompromisso;
        return $this;
    }

    public function getVlTotal(): ?float
    {
        return $this->vlTotal;
    }

    public function setVlTotal(?float $vlTotal): self
    {
        $this->vlTotal = $vlTotal;
        return $this;
    }

    public function getMeJsonValor(): ?string
    {
        return $this->meJsonValor;
    }

    public function setMeJsonValor(?string $meJsonValor): self
    {
        $this->meJsonValor = $meJsonValor;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }
}
