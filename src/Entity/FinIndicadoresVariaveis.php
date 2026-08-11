<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinIndicadoresVariaveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinIndicadoresVariaveisRepository::class)]
#[ORM\Table(
    name: 'fin_indicadores_variaveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinIndicadoresVariaveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_indicador_variavel', type: 'integer')]
    private ?int $cdIndicadorVariavel = null;

    #[ORM\Column(name: 'ds_variaveis', type: 'string', length: 255, nullable: true)]
    private ?string $dsVariaveis = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'nr_tipo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $nrTipo = false;

    #[ORM\Column(name: 'sn_negrito', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNegrito = false;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtivo = false;

    #[ORM\Column(name: 'sn_dinamico', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snDinamico = false;

    #[ORM\Column(name: 'sn_por_curso', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snPorCurso = false;

    #[ORM\Column(name: 'ds_grupos_extras', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsGruposExtras = null;

    #[ORM\Column(name: 'ds_filtros_fixos', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsFiltrosFixos = null;

    #[ORM\Column(name: 'nm_funcao', type: 'string', length: 50, nullable: true)]
    private ?string $nmFuncao = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $meSql = null;

    public function __construct(
        ?string $dsVariaveis = null,
        ?string $dsDescricao = null,
        ?bool $nrTipo = false,
        ?bool $snNegrito = false,
        ?bool $snAtivo = false,
        ?bool $snDinamico = false,
        ?bool $snPorCurso = false,
        ?string $dsGruposExtras = null,
        ?string $dsFiltrosFixos = null,
        ?string $nmFuncao = null,
        ?string $meSql = null
    ) {
        $this->dsVariaveis = $dsVariaveis;
        $this->dsDescricao = $dsDescricao;
        $this->nrTipo = $nrTipo;
        $this->snNegrito = $snNegrito;
        $this->snAtivo = $snAtivo;
        $this->snDinamico = $snDinamico;
        $this->snPorCurso = $snPorCurso;
        $this->dsGruposExtras = $dsGruposExtras;
        $this->dsFiltrosFixos = $dsFiltrosFixos;
        $this->nmFuncao = $nmFuncao;
        $this->meSql = $meSql;
    }

    public function getCdIndicadorVariavel(): ?int
    {
        return $this->cdIndicadorVariavel;
    }

    public function getDsVariaveis(): ?string
    {
        return $this->dsVariaveis;
    }

    public function setDsVariaveis(?string $dsVariaveis): self
    {
        $this->dsVariaveis = $dsVariaveis;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function isNrTipo(): ?bool
    {
        return $this->nrTipo;
    }

    public function setNrTipo(?bool $nrTipo): self
    {
        $this->nrTipo = $nrTipo;
        return $this;
    }

    public function isSnNegrito(): ?bool
    {
        return $this->snNegrito;
    }

    public function setSnNegrito(?bool $snNegrito): self
    {
        $this->snNegrito = $snNegrito;
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

    public function isSnDinamico(): ?bool
    {
        return $this->snDinamico;
    }

    public function setSnDinamico(?bool $snDinamico): self
    {
        $this->snDinamico = $snDinamico;
        return $this;
    }

    public function isSnPorCurso(): ?bool
    {
        return $this->snPorCurso;
    }

    public function setSnPorCurso(?bool $snPorCurso): self
    {
        $this->snPorCurso = $snPorCurso;
        return $this;
    }

    public function getDsGruposExtras(): ?string
    {
        return $this->dsGruposExtras;
    }

    public function setDsGruposExtras(?string $dsGruposExtras): self
    {
        $this->dsGruposExtras = $dsGruposExtras;
        return $this;
    }

    public function getDsFiltrosFixos(): ?string
    {
        return $this->dsFiltrosFixos;
    }

    public function setDsFiltrosFixos(?string $dsFiltrosFixos): self
    {
        $this->dsFiltrosFixos = $dsFiltrosFixos;
        return $this;
    }

    public function getNmFuncao(): ?string
    {
        return $this->nmFuncao;
    }

    public function setNmFuncao(?string $nmFuncao): self
    {
        $this->nmFuncao = $nmFuncao;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }
}
