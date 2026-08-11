<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\InscParametrosValoresColigadaMatrizRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscParametrosValoresColigadaMatrizRepository::class)]
#[ORM\Table(
    name: 'insc_parametros_valores_coligada_matriz',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PARAMETRO_VALOR_COLIGADA', columns: ['cd_parametro_valor'])]
#[ORM\Index(name: 'FK_PARAMETRO_VALOR_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PARAMETRO_VALOR_COLIGADA', 'colunas' => ['cd_parametro_valor'], 'tabelaAlvo' => 'insc_parametros_valores', 'colunasAlvo' => ['cd_parametro_valor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PARAMETRO_VALOR_COLIGADA_MATRIZ', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class InscParametrosValoresColigadaMatriz
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro_valor_regra', type: 'integer')]
    private ?int $cdParametroValorRegra = null;

    #[ORM\ManyToOne(targetEntity: InscParametrosValores::class)]
    #[ORM\JoinColumn(name: 'cd_parametro_valor', referencedColumnName: 'cd_parametro_valor', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InscParametrosValores $cdParametroValor = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?InscParametrosValores $cdParametroValor = null,
        ?ColigadasMatriz $cdColigadaMatriz = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdParametroValor = $cdParametroValor;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
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

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
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
