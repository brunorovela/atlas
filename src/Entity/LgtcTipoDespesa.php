<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\LgtcTipoDespesaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcTipoDespesaRepository::class)]
#[ORM\Table(
    name: 'lgtc_tipo_despesa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TIPO_DESPESA_DS_TIPO_DESPESA', columns: ['DS_TIPO_DESPESA'])]
#[ORM\Index(name: 'FK_TD_TIPO_TIPO_DESPESA_CD_TIPO', columns: ['CD_TIPO'])]
#[ORM\Index(name: 'FK_TD_VALOR_TIPO_DESPESA_CD_VALOR', columns: ['CD_VALOR'])]
#[ORM\Index(name: 'FK_PLANO_CONTAS_TIPO_DESPESA_CD_CONTA_CD_COLIGADA_MATRIZ', columns: ['CD_CONTA', 'CD_COLIGADA_MATRIZ'])]
#[ORM\Index(name: 'FK_TIPO_DESPESA_CD_FORNECEDOR_TD_FORNECEDOR_CD_FORNECEDOR', columns: ['CD_FORNECEDOR'])]
#[ORM\Index(name: 'FK_TIPO_DESPESA_CD_CAMPO_PESSOAS_CAMPOS_ADICIONAIS_CD_CAMPO', columns: ['CD_CAMPO'])]
#[ORM\Index(name: 'FK_TIPO_DESPESA_TIPOS_TITULO_CD_TIPO_TITULO_CD_COLIGADA_MATRIZ', columns: ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PLANO_CONTAS_TIPO_DESPESA_CD_CONTA_CD_COLIGADA_MATRIZ', 'colunas' => ['CD_CONTA', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_plano_contas', 'colunasAlvo' => ['cd_conta', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TD_TIPO_TIPO_DESPESA_CD_TIPO', 'colunas' => ['CD_TIPO'], 'tabelaAlvo' => 'lgtc_td_tipo', 'colunasAlvo' => ['CD_TIPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TD_VALOR_TIPO_DESPESA_CD_VALOR', 'colunas' => ['CD_VALOR'], 'tabelaAlvo' => 'lgtc_td_valor', 'colunasAlvo' => ['CD_VALOR'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TIPO_DESPESA_CD_CAMPO_PESSOAS_CAMPOS_ADICIONAIS_CD_CAMPO', 'colunas' => ['CD_CAMPO'], 'tabelaAlvo' => 'pessoas_campos_adicionais', 'colunasAlvo' => ['CD_CAMPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TIPO_DESPESA_CD_FORNECEDOR_TD_FORNECEDOR_CD_FORNECEDOR', 'colunas' => ['CD_FORNECEDOR'], 'tabelaAlvo' => 'lgtc_td_fornecedor', 'colunasAlvo' => ['CD_FORNECEDOR'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TIPO_DESPESA_TIPOS_TITULO_CD_TIPO_TITULO_CD_COLIGADA_MATRIZ', 'colunas' => ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_tipos_titulo', 'colunasAlvo' => ['cd_tipo_titulo', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class LgtcTipoDespesa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_TIPO_DESPESA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipoDespesa = null;

    #[ORM\ManyToOne(targetEntity: LgtcTdTipo::class)]
    #[ORM\JoinColumn(name: 'CD_TIPO', referencedColumnName: 'CD_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcTdTipo $cdTipo = null;

    #[ORM\ManyToOne(targetEntity: LgtcTdValor::class)]
    #[ORM\JoinColumn(name: 'CD_VALOR', referencedColumnName: 'CD_VALOR', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcTdValor $cdValor = null;

    #[ORM\Column(name: 'CD_CONTA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdConta = null;

    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'DS_TIPO_DESPESA', type: 'string', length: 64)]
    private ?string $dsTipoDespesa = null;

    #[ORM\Column(name: 'SN_PADRAO', type: 'boolean', options: ['default' => '0'])]
    private bool $snPadrao = false;

    #[ORM\Column(name: 'SN_ATIVO', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'NR_ICONE', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $nrIcone = null;

    #[ORM\Column(name: 'DT_CADASTRO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\ManyToOne(targetEntity: PessoasCamposAdicionais::class)]
    #[ORM\JoinColumn(name: 'CD_CAMPO', referencedColumnName: 'CD_CAMPO', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PessoasCamposAdicionais $cdCampo = null;

    #[ORM\ManyToOne(targetEntity: LgtcTdFornecedor::class)]
    #[ORM\JoinColumn(name: 'CD_FORNECEDOR', referencedColumnName: 'CD_FORNECEDOR', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcTdFornecedor $cdFornecedor = null;

    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'cd_historico_cp', type: 'integer', nullable: true)]
    private ?int $cdHistoricoCp = null;

    #[ORM\Column(name: 'nr_dias_vencimento', type: 'integer', nullable: true)]
    private ?int $nrDiasVencimento = null;

    public function __construct(
        ?LgtcTdTipo $cdTipo = null,
        ?LgtcTdValor $cdValor = null,
        ?int $cdConta = null,
        ?int $cdColigadaMatriz = null,
        ?string $dsTipoDespesa = null,
        bool $snPadrao = false,
        bool $snAtivo = true,
        ?int $nrIcone = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?PessoasCamposAdicionais $cdCampo = null,
        ?LgtcTdFornecedor $cdFornecedor = null,
        ?int $cdTipoTitulo = null,
        ?int $cdHistoricoCp = null,
        ?int $nrDiasVencimento = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdValor = $cdValor;
        $this->cdConta = $cdConta;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dsTipoDespesa = $dsTipoDespesa;
        $this->snPadrao = $snPadrao;
        $this->snAtivo = $snAtivo;
        $this->nrIcone = $nrIcone;
        $this->dtCadastro = $dtCadastro;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdCampo = $cdCampo;
        $this->cdFornecedor = $cdFornecedor;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdHistoricoCp = $cdHistoricoCp;
        $this->nrDiasVencimento = $nrDiasVencimento;
    }

    public function getCdTipoDespesa(): ?int
    {
        return $this->cdTipoDespesa;
    }

    public function getCdTipo(): ?LgtcTdTipo
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?LgtcTdTipo $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdValor(): ?LgtcTdValor
    {
        return $this->cdValor;
    }

    public function setCdValor(?LgtcTdValor $cdValor): self
    {
        $this->cdValor = $cdValor;
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

    public function getDsTipoDespesa(): ?string
    {
        return $this->dsTipoDespesa;
    }

    public function setDsTipoDespesa(?string $dsTipoDespesa): self
    {
        $this->dsTipoDespesa = $dsTipoDespesa;
        return $this;
    }

    public function isSnPadrao(): bool
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(bool $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getNrIcone(): ?int
    {
        return $this->nrIcone;
    }

    public function setNrIcone(?int $nrIcone): self
    {
        $this->nrIcone = $nrIcone;
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

    public function getCdCampo(): ?PessoasCamposAdicionais
    {
        return $this->cdCampo;
    }

    public function setCdCampo(?PessoasCamposAdicionais $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getCdFornecedor(): ?LgtcTdFornecedor
    {
        return $this->cdFornecedor;
    }

    public function setCdFornecedor(?LgtcTdFornecedor $cdFornecedor): self
    {
        $this->cdFornecedor = $cdFornecedor;
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

    public function getCdHistoricoCp(): ?int
    {
        return $this->cdHistoricoCp;
    }

    public function setCdHistoricoCp(?int $cdHistoricoCp): self
    {
        $this->cdHistoricoCp = $cdHistoricoCp;
        return $this;
    }

    public function getNrDiasVencimento(): ?int
    {
        return $this->nrDiasVencimento;
    }

    public function setNrDiasVencimento(?int $nrDiasVencimento): self
    {
        $this->nrDiasVencimento = $nrDiasVencimento;
        return $this;
    }
}
