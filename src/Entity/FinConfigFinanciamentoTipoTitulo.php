<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinConfigFinanciamentoTipoTituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinConfigFinanciamentoTipoTituloRepository::class)]
#[ORM\Table(
    name: 'fin_config_financiamento_tipo_titulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_CONFIG_FINANC_TIPO_TIT_CON_TIPO_TIT_CD_TIPO_TIT_CD_COL_MATRIZ', columns: ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'])]
#[ORM\Index(name: 'IDX_13703824753D51DC', columns: ['CD_FINANCIAMENTO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CONFIG_FINANC_TIPO_TIT_CON_TIPO_TIT_CD_TIPO_TIT_CD_COL_MATRIZ', 'colunas' => ['CD_TIPO_TITULO', 'CD_COLIGADA_MATRIZ'], 'tabelaAlvo' => 'fin_config_tipos_titulo', 'colunasAlvo' => ['cd_tipo_titulo', 'cd_coligada_matriz'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_CONFIG_FINANC_TIPO_TITULO_CONFIG_FINANC_CD_FINANCIAMENTO', 'colunas' => ['CD_FINANCIAMENTO'], 'tabelaAlvo' => 'fin_config_financiamento', 'colunasAlvo' => ['CD_FINANCIAMENTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinConfigFinanciamentoTipoTitulo
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: FinConfigFinanciamento::class)]
    #[ORM\JoinColumn(name: 'CD_FINANCIAMENTO', referencedColumnName: 'CD_FINANCIAMENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinConfigFinanciamento $cdFinanciamento = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdTipoTitulo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_COLIGADA_MATRIZ', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdColigadaMatriz = 0;

    public function __construct(
        ?FinConfigFinanciamento $cdFinanciamento = null,
        int $cdTipoTitulo = 0,
        int $cdColigadaMatriz = 0
    ) {
        $this->cdFinanciamento = $cdFinanciamento;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdFinanciamento(): ?FinConfigFinanciamento
    {
        return $this->cdFinanciamento;
    }

    public function setCdFinanciamento(?FinConfigFinanciamento $cdFinanciamento): self
    {
        $this->cdFinanciamento = $cdFinanciamento;
        return $this;
    }

    public function getCdTipoTitulo(): int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdColigadaMatriz(): int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
