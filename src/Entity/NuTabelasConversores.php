<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuTabelasConversoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTabelasConversoresRepository::class)]
#[ORM\Table(
    name: 'nu_tabelas_conversores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_cd_banco_destino', columns: ['cd_banco_destino'])]
#[ORM\Index(name: 'fk_cd_banco_origem', columns: ['cd_banco_origem'])]
#[ORM\Index(name: 'IX_CD_BANCO_DESTINO', columns: ['cd_banco_destino'])]
#[ORM\Index(name: 'IX_CD_BANCO_ORIGEM', columns: ['cd_banco_origem'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_banco_destino', 'colunas' => ['cd_banco_destino'], 'tabelaAlvo' => 'nu_tabelas_bancos', 'colunasAlvo' => ['cd_banco'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cd_banco_origem', 'colunas' => ['cd_banco_origem'], 'tabelaAlvo' => 'nu_tabelas_bancos', 'colunasAlvo' => ['cd_banco'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuTabelasConversores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conversao', type: 'integer')]
    private ?int $cdConversao = null;

    #[ORM\ManyToOne(targetEntity: NuTabelasBancos::class)]
    #[ORM\JoinColumn(name: 'cd_banco_destino', referencedColumnName: 'cd_banco', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuTabelasBancos $cdBancoDestino = null;

    #[ORM\ManyToOne(targetEntity: NuTabelasBancos::class)]
    #[ORM\JoinColumn(name: 'cd_banco_origem', referencedColumnName: 'cd_banco', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuTabelasBancos $cdBancoOrigem = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    #[ORM\Column(name: 'sn_backup', type: 'boolean', nullable: true)]
    private ?bool $snBackup = null;

    public function __construct(
        ?NuTabelasBancos $cdBancoDestino = null,
        ?NuTabelasBancos $cdBancoOrigem = null,
        ?bool $snAtivo = null,
        ?bool $snBackup = null
    ) {
        $this->cdBancoDestino = $cdBancoDestino;
        $this->cdBancoOrigem = $cdBancoOrigem;
        $this->snAtivo = $snAtivo;
        $this->snBackup = $snBackup;
    }

    public function getCdConversao(): ?int
    {
        return $this->cdConversao;
    }

    public function getCdBancoDestino(): ?NuTabelasBancos
    {
        return $this->cdBancoDestino;
    }

    public function setCdBancoDestino(?NuTabelasBancos $cdBancoDestino): self
    {
        $this->cdBancoDestino = $cdBancoDestino;
        return $this;
    }

    public function getCdBancoOrigem(): ?NuTabelasBancos
    {
        return $this->cdBancoOrigem;
    }

    public function setCdBancoOrigem(?NuTabelasBancos $cdBancoOrigem): self
    {
        $this->cdBancoOrigem = $cdBancoOrigem;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function isSnBackup(): ?bool
    {
        return $this->snBackup;
    }

    public function setSnBackup(?bool $snBackup): self
    {
        $this->snBackup = $snBackup;
        return $this;
    }
}
