<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TaCatracaIdentificacaoLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaIdentificacaoLogRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_identificacao_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TA_CATRACA_ID_LOG_TA_CATRACA_IDENTIFICACAO_CD_CATRACA_ID', columns: ['CD_CATRACA_IDENTIFICACAO'])]
#[ORM\Index(name: 'FK_TA_CATRACA_IDENTIFICACAO_LOG_CD_USUARIO_PESSOAS_CD_PESSOA', columns: ['CD_USUARIO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TA_CATRACA_ID_LOG_TA_CATRACA_IDENTIFICACAO_CD_CATRACA_ID', 'colunas' => ['CD_CATRACA_IDENTIFICACAO'], 'tabelaAlvo' => 'ta_catraca_identificacao', 'colunasAlvo' => ['CD_CATRACA_IDENTIFICACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TA_CATRACA_IDENTIFICACAO_LOG_CD_USUARIO_PESSOAS_CD_PESSOA', 'colunas' => ['CD_USUARIO'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TaCatracaIdentificacaoLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_IDENTIFICACAO_LOG', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdCatracaIdentificacaoLog = null;

    #[ORM\ManyToOne(targetEntity: TaCatracaIdentificacao::class)]
    #[ORM\JoinColumn(name: 'CD_CATRACA_IDENTIFICACAO', referencedColumnName: 'CD_CATRACA_IDENTIFICACAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TaCatracaIdentificacao $cdCatracaIdentificacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_USUARIO', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdUsuario = null;

    #[ORM\Column(name: 'TX_LOG', type: 'text', length: 65535)]
    private ?string $txLog = null;

    #[ORM\Column(name: 'DS_OBSERVACOES', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    public function __construct(
        ?TaCatracaIdentificacao $cdCatracaIdentificacao = null,
        ?Pessoas $cdUsuario = null,
        ?string $txLog = null,
        ?string $dsObservacoes = null,
        ?\DateTimeInterface $dtAlteracao = null
    ) {
        $this->cdCatracaIdentificacao = $cdCatracaIdentificacao;
        $this->cdUsuario = $cdUsuario;
        $this->txLog = $txLog;
        $this->dsObservacoes = $dsObservacoes;
        $this->dtAlteracao = $dtAlteracao;
    }

    public function getCdCatracaIdentificacaoLog(): ?string
    {
        return $this->cdCatracaIdentificacaoLog;
    }

    public function getCdCatracaIdentificacao(): ?TaCatracaIdentificacao
    {
        return $this->cdCatracaIdentificacao;
    }

    public function setCdCatracaIdentificacao(?TaCatracaIdentificacao $cdCatracaIdentificacao): self
    {
        $this->cdCatracaIdentificacao = $cdCatracaIdentificacao;
        return $this;
    }

    public function getCdUsuario(): ?Pessoas
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?Pessoas $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getTxLog(): ?string
    {
        return $this->txLog;
    }

    public function setTxLog(?string $txLog): self
    {
        $this->txLog = $txLog;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
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
