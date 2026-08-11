<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SvcRecadosEnviosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcRecadosEnviosRepository::class)]
#[ORM\Table(
    name: 'svc_recados_envios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_recados_envios', columns: ['cd_recado', 'dt_envio'])]
#[ORM\Index(name: 'IX_CD_RECADO', columns: ['cd_recado'])]
#[ORM\Index(name: 'IX_DT_ENVIO', columns: ['dt_envio'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_recados_envios_recado', 'colunas' => ['cd_recado'], 'tabelaAlvo' => 'svc_recados', 'colunasAlvo' => ['cd_recado'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SvcRecadosEnvios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recado_envio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecadoEnvio = null;

    #[ORM\ManyToOne(targetEntity: SvcRecados::class)]
    #[ORM\JoinColumn(name: 'cd_recado', referencedColumnName: 'cd_recado', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SvcRecados $cdRecado = null;

    #[ORM\Column(name: 'tp_recado', type: 'enum', options: ['default' => '1', 'values' => ['1', '2', '3', '4', '5', '6', '7', '8', '32']])]
    private string $tpRecado = '1';

    #[ORM\Column(name: 'dt_envio', type: 'datetime')]
    private ?\DateTimeInterface $dtEnvio = null;

    public function __construct(
        ?SvcRecados $cdRecado = null,
        string $tpRecado = '1',
        ?\DateTimeInterface $dtEnvio = null
    ) {
        $this->cdRecado = $cdRecado;
        $this->tpRecado = $tpRecado;
        $this->dtEnvio = $dtEnvio;
    }

    public function getCdRecadoEnvio(): ?int
    {
        return $this->cdRecadoEnvio;
    }

    public function getCdRecado(): ?SvcRecados
    {
        return $this->cdRecado;
    }

    public function setCdRecado(?SvcRecados $cdRecado): self
    {
        $this->cdRecado = $cdRecado;
        return $this;
    }

    public function getTpRecado(): string
    {
        return $this->tpRecado;
    }

    public function setTpRecado(string $tpRecado): self
    {
        $this->tpRecado = $tpRecado;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }
}
