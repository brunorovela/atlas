<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TaCatracaIdentificacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaIdentificacaoRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_identificacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_IDENTIFICACAO_NR_IDENTIFICACAO', columns: ['NR_IDENTIFICACAO'])]
#[ORM\Index(name: 'FK_TA_CATRACA_ID_CD_CATRACA_ID_TIPO_TA_CATRACA_ID_TIPO', columns: ['CD_CATRACA_IDENTIFICACAO_TIPO'])]
#[ORM\Index(name: 'FK_TA_CATRACA_IDENTIFICACAO_CD_PESSOA_PESSOAS_CD_PESSOA', columns: ['CD_PESSOA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TA_CATRACA_ID_CD_CATRACA_ID_TIPO_TA_CATRACA_ID_TIPO', 'colunas' => ['CD_CATRACA_IDENTIFICACAO_TIPO'], 'tabelaAlvo' => 'ta_catraca_identificacao_tipo', 'colunasAlvo' => ['CD_CATRACA_IDENTIFICACAO_TIPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TA_CATRACA_IDENTIFICACAO_CD_PESSOA_PESSOAS_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TaCatracaIdentificacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_IDENTIFICACAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCatracaIdentificacao = null;

    #[ORM\ManyToOne(targetEntity: TaCatracaIdentificacaoTipo::class)]
    #[ORM\JoinColumn(name: 'CD_CATRACA_IDENTIFICACAO_TIPO', referencedColumnName: 'CD_CATRACA_IDENTIFICACAO_TIPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TaCatracaIdentificacaoTipo $cdCatracaIdentificacaoTipo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'NR_IDENTIFICACAO', type: 'string', length: 64)]
    private ?string $nrIdentificacao = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'SN_MASTER', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snMaster = 0;

    #[ORM\Column(name: 'DT_VALIDADE', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtValidade = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?TaCatracaIdentificacaoTipo $cdCatracaIdentificacaoTipo = null,
        ?Pessoas $cdPessoa = null,
        ?string $nrIdentificacao = null,
        int $snAtivo = 1,
        int $snMaster = 0,
        ?\DateTimeInterface $dtValidade = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdCatracaIdentificacaoTipo = $cdCatracaIdentificacaoTipo;
        $this->cdPessoa = $cdPessoa;
        $this->nrIdentificacao = $nrIdentificacao;
        $this->snAtivo = $snAtivo;
        $this->snMaster = $snMaster;
        $this->dtValidade = $dtValidade;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdCatracaIdentificacao(): ?int
    {
        return $this->cdCatracaIdentificacao;
    }

    public function getCdCatracaIdentificacaoTipo(): ?TaCatracaIdentificacaoTipo
    {
        return $this->cdCatracaIdentificacaoTipo;
    }

    public function setCdCatracaIdentificacaoTipo(?TaCatracaIdentificacaoTipo $cdCatracaIdentificacaoTipo): self
    {
        $this->cdCatracaIdentificacaoTipo = $cdCatracaIdentificacaoTipo;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNrIdentificacao(): ?string
    {
        return $this->nrIdentificacao;
    }

    public function setNrIdentificacao(?string $nrIdentificacao): self
    {
        $this->nrIdentificacao = $nrIdentificacao;
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

    public function getSnMaster(): int
    {
        return $this->snMaster;
    }

    public function setSnMaster(int $snMaster): self
    {
        $this->snMaster = $snMaster;
        return $this;
    }

    public function getDtValidade(): ?\DateTimeInterface
    {
        return $this->dtValidade;
    }

    public function setDtValidade(?\DateTimeInterface $dtValidade): self
    {
        $this->dtValidade = $dtValidade;
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
}
