<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RemStatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemStatusRepository::class)]
#[ORM\Table(
    name: 'rem_status',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_REM_STATUS_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'FK_REM_STATUS_CD_ENVIO_REGISTRO', columns: ['cd_envio_registro'])]
#[ORM\Index(name: 'FK_REM_STATUS_CD_ENVIO_ATUAL', columns: ['cd_envio_atual'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_REM_STATUS_CD_ENVIO_ATUAL', 'colunas' => ['cd_envio_atual'], 'tabelaAlvo' => 'rem_envios', 'colunasAlvo' => ['cd_envio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_REM_STATUS_CD_ENVIO_REGISTRO', 'colunas' => ['cd_envio_registro'], 'tabelaAlvo' => 'rem_envios', 'colunasAlvo' => ['cd_envio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_REM_STATUS_CD_LAYOUT', 'colunas' => ['cd_layout'], 'tabelaAlvo' => 'rem_layouts', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RemStatus
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_nossonumero', type: 'string', length: 30)]
    private ?string $nrNossonumero = null;

    #[ORM\ManyToOne(targetEntity: RemLayouts::class)]
    #[ORM\JoinColumn(name: 'cd_layout', referencedColumnName: 'cd_layout', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => 'Referencia tabela rem_layouts.cd_layout'])]
    private ?RemLayouts $cdLayout = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 3, options: ['comment' => 'Status mais atual do nosso número'])]
    private ?string $dsSituacao = null;

    #[ORM\ManyToOne(targetEntity: RemEnvios::class)]
    #[ORM\JoinColumn(name: 'cd_envio_registro', referencedColumnName: 'cd_envio', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Referencia tabela rem_envios.cd_envio que registrou no banco'])]
    private ?RemEnvios $cdEnvioRegistro = null;

    #[ORM\ManyToOne(targetEntity: RemEnvios::class)]
    #[ORM\JoinColumn(name: 'cd_envio_atual', referencedColumnName: 'cd_envio', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Referencia tabela rem_envios.cd_envio última alteração que teve'])]
    private ?RemEnvios $cdEnvioAtual = null;

    public function __construct(
        ?string $nrNossonumero = null,
        ?RemLayouts $cdLayout = null,
        ?string $dsSituacao = null,
        ?RemEnvios $cdEnvioRegistro = null,
        ?RemEnvios $cdEnvioAtual = null
    ) {
        $this->nrNossonumero = $nrNossonumero;
        $this->cdLayout = $cdLayout;
        $this->dsSituacao = $dsSituacao;
        $this->cdEnvioRegistro = $cdEnvioRegistro;
        $this->cdEnvioAtual = $cdEnvioAtual;
    }

    public function getNrNossonumero(): ?string
    {
        return $this->nrNossonumero;
    }

    public function setNrNossonumero(?string $nrNossonumero): self
    {
        $this->nrNossonumero = $nrNossonumero;
        return $this;
    }

    public function getCdLayout(): ?RemLayouts
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?RemLayouts $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }

    public function getCdEnvioRegistro(): ?RemEnvios
    {
        return $this->cdEnvioRegistro;
    }

    public function setCdEnvioRegistro(?RemEnvios $cdEnvioRegistro): self
    {
        $this->cdEnvioRegistro = $cdEnvioRegistro;
        return $this;
    }

    public function getCdEnvioAtual(): ?RemEnvios
    {
        return $this->cdEnvioAtual;
    }

    public function setCdEnvioAtual(?RemEnvios $cdEnvioAtual): self
    {
        $this->cdEnvioAtual = $cdEnvioAtual;
        return $this;
    }
}
