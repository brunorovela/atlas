<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\RemEnviosMensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemEnviosMensalidadesRepository::class)]
#[ORM\Table(
    name: 'rem_envios_mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_4FD0A326A026A2D', columns: ['cd_envio'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_REM_ENVIOS_CD_ENVIO', 'colunas' => ['cd_envio'], 'tabelaAlvo' => 'rem_envios', 'colunasAlvo' => ['cd_envio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RemEnviosMensalidades
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: RemEnvios::class)]
    #[ORM\JoinColumn(name: 'cd_envio', referencedColumnName: 'cd_envio', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Referencia tabela rem_envios.cd_envio'])]
    private ?RemEnvios $cdEnvio = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', options: ['comment' => 'Esse campo armazena o código das mensalidades que estavam vinculadas ao NN no momento que foi realizada a operação (independente se a operação foi realizada em apenas um título, como a baixa manual por exemplo) '])]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?RemEnvios $cdEnvio = null,
        ?int $cdMensalidade = null
    ) {
        $this->cdEnvio = $cdEnvio;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdEnvio(): ?RemEnvios
    {
        return $this->cdEnvio;
    }

    public function setCdEnvio(?RemEnvios $cdEnvio): self
    {
        $this->cdEnvio = $cdEnvio;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
