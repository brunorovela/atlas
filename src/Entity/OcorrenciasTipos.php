<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OcorrenciasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasTiposRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'tabela dos tipos de ocorrencias']
)]
class OcorrenciasTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 255)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'sn_carta', type: 'integer', options: ['default' => '1'])]
    private int $snCarta = 1;

    #[ORM\Column(name: 'sn_email', type: 'integer', options: ['default' => '1'])]
    private int $snEmail = 1;

    #[ORM\Column(name: 'vl_peso', type: 'float', nullable: true, options: ['default' => '0'])]
    private ?float $vlPeso = 0.0;

    #[ORM\Column(name: 'ds_ultima_mensagem', type: 'text', length: 65535, nullable: true)]
    private ?string $dsUltimaMensagem = null;

    #[ORM\Column(name: 'sn_libera_responsavel', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $snLiberaResponsavel = 0;

    #[ORM\Column(name: 'sn_libera_coordenador', type: 'smallint')]
    private ?int $snLiberaCoordenador = null;

    public function __construct(
        ?string $dsTipo = null,
        int $snCarta = 1,
        int $snEmail = 1,
        ?float $vlPeso = 0.0,
        ?string $dsUltimaMensagem = null,
        int $snLiberaResponsavel = 0,
        ?int $snLiberaCoordenador = null
    ) {
        $this->dsTipo = $dsTipo;
        $this->snCarta = $snCarta;
        $this->snEmail = $snEmail;
        $this->vlPeso = $vlPeso;
        $this->dsUltimaMensagem = $dsUltimaMensagem;
        $this->snLiberaResponsavel = $snLiberaResponsavel;
        $this->snLiberaCoordenador = $snLiberaCoordenador;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getSnCarta(): int
    {
        return $this->snCarta;
    }

    public function setSnCarta(int $snCarta): self
    {
        $this->snCarta = $snCarta;
        return $this;
    }

    public function getSnEmail(): int
    {
        return $this->snEmail;
    }

    public function setSnEmail(int $snEmail): self
    {
        $this->snEmail = $snEmail;
        return $this;
    }

    public function getVlPeso(): ?float
    {
        return $this->vlPeso;
    }

    public function setVlPeso(?float $vlPeso): self
    {
        $this->vlPeso = $vlPeso;
        return $this;
    }

    public function getDsUltimaMensagem(): ?string
    {
        return $this->dsUltimaMensagem;
    }

    public function setDsUltimaMensagem(?string $dsUltimaMensagem): self
    {
        $this->dsUltimaMensagem = $dsUltimaMensagem;
        return $this;
    }

    public function getSnLiberaResponsavel(): int
    {
        return $this->snLiberaResponsavel;
    }

    public function setSnLiberaResponsavel(int $snLiberaResponsavel): self
    {
        $this->snLiberaResponsavel = $snLiberaResponsavel;
        return $this;
    }

    public function getSnLiberaCoordenador(): ?int
    {
        return $this->snLiberaCoordenador;
    }

    public function setSnLiberaCoordenador(?int $snLiberaCoordenador): self
    {
        $this->snLiberaCoordenador = $snLiberaCoordenador;
        return $this;
    }
}
