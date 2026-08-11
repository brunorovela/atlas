<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinContasUsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinContasUsuariosRepository::class)]
#[ORM\Table(
    name: 'fin_contas_usuarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CAIXA', columns: ['cd_caixa'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['CD_COLIGADA'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'IDX_57AA51447E3A6581C4EAABBA', columns: ['cd_caixa', 'CD_COLIGADA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_FIN_CONTAS_USUARIOS_FIN_CADASTRO_CONTAS_CD_CAIXA_CD_COLIGADA', 'colunas' => ['cd_caixa', 'CD_COLIGADA'], 'tabelaAlvo' => 'fin_cadastro_contas', 'colunasAlvo' => ['cd_caixa', 'cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinContasUsuarios
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_caixa', type: 'integer')]
    private ?int $cdCaixa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_COLIGADA', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigada = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_usuario', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'sn_padrao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snPadrao = false;

    public function __construct(
        ?int $cdCaixa = null,
        ?int $cdColigada = null,
        ?int $cdUsuario = null,
        ?bool $snPadrao = false
    ) {
        $this->cdCaixa = $cdCaixa;
        $this->cdColigada = $cdColigada;
        $this->cdUsuario = $cdUsuario;
        $this->snPadrao = $snPadrao;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function isSnPadrao(): ?bool
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(?bool $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }
}
