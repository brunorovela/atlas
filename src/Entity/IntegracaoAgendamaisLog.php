<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\IntegracaoAgendamaisLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoAgendamaisLogRepository::class)]
#[ORM\Table(
    name: 'integracao_agendamais_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoAgendamaisLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 1000, options: ['default' => '0'])]
    private string $dsUrl = '0';

    #[ORM\Column(name: 'ds_mensagem', type: 'text', length: 65535, nullable: true)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'sn_sucesso', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snSucesso = 0;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        string $dsUrl = '0',
        ?string $dsMensagem = null,
        ?string $dsRetorno = null,
        int $snSucesso = 0,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsUrl = $dsUrl;
        $this->dsMensagem = $dsMensagem;
        $this->dsRetorno = $dsRetorno;
        $this->snSucesso = $snSucesso;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
    }

    public function getDsUrl(): string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }

    public function getDsRetorno(): ?string
    {
        return $this->dsRetorno;
    }

    public function setDsRetorno(?string $dsRetorno): self
    {
        $this->dsRetorno = $dsRetorno;
        return $this;
    }

    public function getSnSucesso(): int
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(int $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
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
