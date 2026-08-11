<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExpoCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoCamposRepository::class)]
#[ORM\Table(
    name: 'expo_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_NM_TABELA', columns: ['nm_tabela'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_NM_CAMPO', columns: ['nm_campo'], options: ['lengths' => [20]])]
class ExpoCampos
{
    #[ORM\Id]
    #[ORM\Column(name: 'nm_tabela', type: 'string', length: 255, options: ['default' => ''])]
    private string $nmTabela = '';

    #[ORM\Id]
    #[ORM\Column(name: 'nm_campo', type: 'string', length: 255, options: ['default' => ''])]
    private string $nmCampo = '';

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsCampo = '';

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 10, nullable: true)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'ds_consulta', type: 'string', length: 700, nullable: true)]
    private ?string $dsConsulta = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'sn_apagado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snApagado = 0;

    #[ORM\Column(name: 'sn_calculado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCalculado = 0;

    public function __construct(
        string $nmTabela = '',
        string $nmCampo = '',
        string $dsCampo = '',
        ?string $dsTipo = null,
        ?string $dsConsulta = null,
        ?int $snAtivo = 1,
        ?int $snApagado = 0,
        ?int $snCalculado = 0
    ) {
        $this->nmTabela = $nmTabela;
        $this->nmCampo = $nmCampo;
        $this->dsCampo = $dsCampo;
        $this->dsTipo = $dsTipo;
        $this->dsConsulta = $dsConsulta;
        $this->snAtivo = $snAtivo;
        $this->snApagado = $snApagado;
        $this->snCalculado = $snCalculado;
    }

    public function getNmTabela(): string
    {
        return $this->nmTabela;
    }

    public function setNmTabela(string $nmTabela): self
    {
        $this->nmTabela = $nmTabela;
        return $this;
    }

    public function getNmCampo(): string
    {
        return $this->nmCampo;
    }

    public function setNmCampo(string $nmCampo): self
    {
        $this->nmCampo = $nmCampo;
        return $this;
    }

    public function getDsCampo(): string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
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

    public function getDsConsulta(): ?string
    {
        return $this->dsConsulta;
    }

    public function setDsConsulta(?string $dsConsulta): self
    {
        $this->dsConsulta = $dsConsulta;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnApagado(): ?int
    {
        return $this->snApagado;
    }

    public function setSnApagado(?int $snApagado): self
    {
        $this->snApagado = $snApagado;
        return $this;
    }

    public function getSnCalculado(): ?int
    {
        return $this->snCalculado;
    }

    public function setSnCalculado(?int $snCalculado): self
    {
        $this->snCalculado = $snCalculado;
        return $this;
    }
}
