<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExpoLayoutFiltrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoLayoutFiltrosRepository::class)]
#[ORM\Table(
    name: 'expo_layout_filtros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ITEM', columns: ['cd_item'])]
class ExpoLayoutFiltros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_layout_filtro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLayoutFiltro = null;

    #[ORM\Column(name: 'cd_item', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdItem = null;

    #[ORM\Column(name: 'ds_ligacao', type: 'string', length: 10, nullable: true)]
    private ?string $dsLigacao = null;

    #[ORM\Column(name: 'ds_grupo1', type: 'string', length: 10, nullable: true)]
    private ?string $dsGrupo1 = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_operador', type: 'string', length: 50, nullable: true)]
    private ?string $dsOperador = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'ds_grupo2', type: 'string', length: 10, nullable: true)]
    private ?string $dsGrupo2 = null;

    #[ORM\Column(name: 'sn_fixo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snFixo = 1;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 30, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_dialogo', type: 'string', length: 100, nullable: true)]
    private ?string $dsDialogo = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'sn_checa_permissao_coligadas', type: TinyIntType::NAME, options: ['default' => '0', 'comment' => 'Quando habilitado (1) verifica se o usuário que está exportando o layout possui permissão para nas coligadas dos departamentos informados no filtro.'])]
    private int $snChecaPermissaoColigadas = 0;

    public function __construct(
        ?int $cdItem = null,
        ?string $dsLigacao = null,
        ?string $dsGrupo1 = null,
        ?string $dsCampo = null,
        ?string $dsOperador = null,
        ?string $dsValor = null,
        ?string $dsGrupo2 = null,
        ?int $snFixo = 1,
        ?int $nrOrdem = null,
        ?string $dsChave = null,
        ?string $dsDialogo = null,
        ?string $dsTipo = null,
        int $snChecaPermissaoColigadas = 0
    ) {
        $this->cdItem = $cdItem;
        $this->dsLigacao = $dsLigacao;
        $this->dsGrupo1 = $dsGrupo1;
        $this->dsCampo = $dsCampo;
        $this->dsOperador = $dsOperador;
        $this->dsValor = $dsValor;
        $this->dsGrupo2 = $dsGrupo2;
        $this->snFixo = $snFixo;
        $this->nrOrdem = $nrOrdem;
        $this->dsChave = $dsChave;
        $this->dsDialogo = $dsDialogo;
        $this->dsTipo = $dsTipo;
        $this->snChecaPermissaoColigadas = $snChecaPermissaoColigadas;
    }

    public function getCdLayoutFiltro(): ?int
    {
        return $this->cdLayoutFiltro;
    }

    public function getCdItem(): ?int
    {
        return $this->cdItem;
    }

    public function setCdItem(?int $cdItem): self
    {
        $this->cdItem = $cdItem;
        return $this;
    }

    public function getDsLigacao(): ?string
    {
        return $this->dsLigacao;
    }

    public function setDsLigacao(?string $dsLigacao): self
    {
        $this->dsLigacao = $dsLigacao;
        return $this;
    }

    public function getDsGrupo1(): ?string
    {
        return $this->dsGrupo1;
    }

    public function setDsGrupo1(?string $dsGrupo1): self
    {
        $this->dsGrupo1 = $dsGrupo1;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsOperador(): ?string
    {
        return $this->dsOperador;
    }

    public function setDsOperador(?string $dsOperador): self
    {
        $this->dsOperador = $dsOperador;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getDsGrupo2(): ?string
    {
        return $this->dsGrupo2;
    }

    public function setDsGrupo2(?string $dsGrupo2): self
    {
        $this->dsGrupo2 = $dsGrupo2;
        return $this;
    }

    public function getSnFixo(): ?int
    {
        return $this->snFixo;
    }

    public function setSnFixo(?int $snFixo): self
    {
        $this->snFixo = $snFixo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsDialogo(): ?string
    {
        return $this->dsDialogo;
    }

    public function setDsDialogo(?string $dsDialogo): self
    {
        $this->dsDialogo = $dsDialogo;
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

    public function getSnChecaPermissaoColigadas(): int
    {
        return $this->snChecaPermissaoColigadas;
    }

    public function setSnChecaPermissaoColigadas(int $snChecaPermissaoColigadas): self
    {
        $this->snChecaPermissaoColigadas = $snChecaPermissaoColigadas;
        return $this;
    }
}
