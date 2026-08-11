<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaConfiguracoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaConfiguracoesRepository::class)]
#[ORM\Table(
    name: 'ta_configuracoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class TaConfiguracoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_configuracao', type: 'integer', options: ['default' => '0'])]
    private int $cdConfiguracao = 0;

    #[ORM\Column(name: 'ds_configuracao', type: 'string', length: 50, options: ['fixed' => true])]
    private ?string $dsConfiguracao = null;

    #[ORM\Column(name: 'tx_ajuda', type: 'text', length: 65535)]
    private ?string $txAjuda = null;

    #[ORM\Column(name: 'ds_msg_terminal', type: 'string', length: 255)]
    private ?string $dsMsgTerminal = null;

    #[ORM\Column(name: 'cor_msg_terminal', type: 'string', length: 6, options: ['fixed' => true])]
    private ?string $corMsgTerminal = null;

    #[ORM\Column(name: 'me_som_terminal', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meSomTerminal = null;

    #[ORM\Column(name: 'cd_tipo_ocorrencia', type: 'integer', nullable: true)]
    private ?int $cdTipoOcorrencia = null;

    #[ORM\Column(name: 'tx_msg_ocorrencia', type: 'text', length: 65535, nullable: true)]
    private ?string $txMsgOcorrencia = null;

    #[ORM\Column(name: 'tx_sql_ocorrencia', type: 'text', length: 65535, nullable: true)]
    private ?string $txSqlOcorrencia = null;

    #[ORM\Column(name: 'sn_envia_ocorrencia', type: 'boolean', options: ['default' => '0'])]
    private bool $snEnviaOcorrencia = false;

    #[ORM\Column(name: 'sn_permite_ocorrencia', type: 'boolean', options: ['default' => '0'])]
    private bool $snPermiteOcorrencia = false;

    public function __construct(
        int $cdConfiguracao = 0,
        ?string $dsConfiguracao = null,
        ?string $txAjuda = null,
        ?string $dsMsgTerminal = null,
        ?string $corMsgTerminal = null,
        ?string $meSomTerminal = null,
        ?int $cdTipoOcorrencia = null,
        ?string $txMsgOcorrencia = null,
        ?string $txSqlOcorrencia = null,
        bool $snEnviaOcorrencia = false,
        bool $snPermiteOcorrencia = false
    ) {
        $this->cdConfiguracao = $cdConfiguracao;
        $this->dsConfiguracao = $dsConfiguracao;
        $this->txAjuda = $txAjuda;
        $this->dsMsgTerminal = $dsMsgTerminal;
        $this->corMsgTerminal = $corMsgTerminal;
        $this->meSomTerminal = $meSomTerminal;
        $this->cdTipoOcorrencia = $cdTipoOcorrencia;
        $this->txMsgOcorrencia = $txMsgOcorrencia;
        $this->txSqlOcorrencia = $txSqlOcorrencia;
        $this->snEnviaOcorrencia = $snEnviaOcorrencia;
        $this->snPermiteOcorrencia = $snPermiteOcorrencia;
    }

    public function getCdConfiguracao(): int
    {
        return $this->cdConfiguracao;
    }

    public function setCdConfiguracao(int $cdConfiguracao): self
    {
        $this->cdConfiguracao = $cdConfiguracao;
        return $this;
    }

    public function getDsConfiguracao(): ?string
    {
        return $this->dsConfiguracao;
    }

    public function setDsConfiguracao(?string $dsConfiguracao): self
    {
        $this->dsConfiguracao = $dsConfiguracao;
        return $this;
    }

    public function getTxAjuda(): ?string
    {
        return $this->txAjuda;
    }

    public function setTxAjuda(?string $txAjuda): self
    {
        $this->txAjuda = $txAjuda;
        return $this;
    }

    public function getDsMsgTerminal(): ?string
    {
        return $this->dsMsgTerminal;
    }

    public function setDsMsgTerminal(?string $dsMsgTerminal): self
    {
        $this->dsMsgTerminal = $dsMsgTerminal;
        return $this;
    }

    public function getCorMsgTerminal(): ?string
    {
        return $this->corMsgTerminal;
    }

    public function setCorMsgTerminal(?string $corMsgTerminal): self
    {
        $this->corMsgTerminal = $corMsgTerminal;
        return $this;
    }

    public function getMeSomTerminal(): ?string
    {
        return $this->meSomTerminal;
    }

    public function setMeSomTerminal(?string $meSomTerminal): self
    {
        $this->meSomTerminal = $meSomTerminal;
        return $this;
    }

    public function getCdTipoOcorrencia(): ?int
    {
        return $this->cdTipoOcorrencia;
    }

    public function setCdTipoOcorrencia(?int $cdTipoOcorrencia): self
    {
        $this->cdTipoOcorrencia = $cdTipoOcorrencia;
        return $this;
    }

    public function getTxMsgOcorrencia(): ?string
    {
        return $this->txMsgOcorrencia;
    }

    public function setTxMsgOcorrencia(?string $txMsgOcorrencia): self
    {
        $this->txMsgOcorrencia = $txMsgOcorrencia;
        return $this;
    }

    public function getTxSqlOcorrencia(): ?string
    {
        return $this->txSqlOcorrencia;
    }

    public function setTxSqlOcorrencia(?string $txSqlOcorrencia): self
    {
        $this->txSqlOcorrencia = $txSqlOcorrencia;
        return $this;
    }

    public function isSnEnviaOcorrencia(): bool
    {
        return $this->snEnviaOcorrencia;
    }

    public function setSnEnviaOcorrencia(bool $snEnviaOcorrencia): self
    {
        $this->snEnviaOcorrencia = $snEnviaOcorrencia;
        return $this;
    }

    public function isSnPermiteOcorrencia(): bool
    {
        return $this->snPermiteOcorrencia;
    }

    public function setSnPermiteOcorrencia(bool $snPermiteOcorrencia): self
    {
        $this->snPermiteOcorrencia = $snPermiteOcorrencia;
        return $this;
    }
}
