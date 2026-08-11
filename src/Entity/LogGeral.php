<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogGeralRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogGeralRepository::class)]
#[ORM\Table(
    name: 'log_geral',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Todos os logs do sistema']
)]
#[ORM\UniqueConstraint(name: 'cd_log', columns: ['cd_log'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DT_LOG', columns: ['dt_log'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_CD_CHAVE', columns: ['cd_chave'], options: ['lengths' => [20]])]
class LogGeral
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', nullable: true)]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 255, nullable: true)]
    private ?string $cdChave = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true)]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_operacao', type: 'integer', options: ['default' => '0'])]
    private int $cdOperacao = 0;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdColigada = 0;

    #[ORM\Column(name: 'ds_observacoes', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacoes = null;

    public function __construct(
        ?int $cdPessoa = 0,
        ?int $cdUsuario = null,
        ?\DateTimeInterface $dtLog = null,
        ?int $cdModulo = null,
        ?string $cdChave = null,
        ?int $cdAcao = null,
        int $cdOperacao = 0,
        ?int $cdColigada = 0,
        ?string $dsObservacoes = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
        $this->dtLog = $dtLog;
        $this->cdModulo = $cdModulo;
        $this->cdChave = $cdChave;
        $this->cdAcao = $cdAcao;
        $this->cdOperacao = $cdOperacao;
        $this->cdColigada = $cdColigada;
        $this->dsObservacoes = $dsObservacoes;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdChave(): ?string
    {
        return $this->cdChave;
    }

    public function setCdChave(?string $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getCdOperacao(): int
    {
        return $this->cdOperacao;
    }

    public function setCdOperacao(int $cdOperacao): self
    {
        $this->cdOperacao = $cdOperacao;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
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
}
