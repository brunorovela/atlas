<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\InscParametrosValoresDepartamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscParametrosValoresDepartamentoRepository::class)]
#[ORM\Table(
    name: 'insc_parametros_valores_departamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PARAMETRO_VALORES_DEPARTAMENTO_VALOR', columns: ['cd_parametro_valor'])]
#[ORM\Index(name: 'FK_PARAMETRO_VALORES_DEPARTAMENTO', columns: ['cd_depto'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PARAMETRO_VALORES_DEPARTAMENTO', 'colunas' => ['cd_depto'], 'tabelaAlvo' => 'departamentos', 'colunasAlvo' => ['codigo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PARAMETRO_VALORES_DEPARTAMENTO_VALOR', 'colunas' => ['cd_parametro_valor'], 'tabelaAlvo' => 'insc_parametros_valores', 'colunasAlvo' => ['cd_parametro_valor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class InscParametrosValoresDepartamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro_valor_regra', type: 'integer')]
    private ?int $cdParametroValorRegra = null;

    #[ORM\ManyToOne(targetEntity: InscParametrosValores::class)]
    #[ORM\JoinColumn(name: 'cd_parametro_valor', referencedColumnName: 'cd_parametro_valor', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InscParametrosValores $cdParametroValor = null;

    #[ORM\Column(name: 'cd_depto', type: 'smallint')]
    private ?int $cdDepto = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?InscParametrosValores $cdParametroValor = null,
        ?int $cdDepto = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdParametroValor = $cdParametroValor;
        $this->cdDepto = $cdDepto;
        $this->dtInclusao = $dtInclusao;
        $this->dtBase = $dtBase;
    }

    public function getCdParametroValorRegra(): ?int
    {
        return $this->cdParametroValorRegra;
    }

    public function getCdParametroValor(): ?InscParametrosValores
    {
        return $this->cdParametroValor;
    }

    public function setCdParametroValor(?InscParametrosValores $cdParametroValor): self
    {
        $this->cdParametroValor = $cdParametroValor;
        return $this;
    }

    public function getCdDepto(): ?int
    {
        return $this->cdDepto;
    }

    public function setCdDepto(?int $cdDepto): self
    {
        $this->cdDepto = $cdDepto;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
