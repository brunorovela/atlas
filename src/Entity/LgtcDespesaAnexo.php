<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\LgtcDespesaAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcDespesaAnexoRepository::class)]
#[ORM\Table(
    name: 'lgtc_despesa_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_DESPESA_AULA_DESPESA_ANEXO_CD_DESPESA', columns: ['CD_DESPESA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_DESPESA_AULA_DESPESA_ANEXO_CD_DESPESA', 'colunas' => ['CD_DESPESA'], 'tabelaAlvo' => 'lgtc_despesa_aula', 'colunasAlvo' => ['CD_DESPESA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class LgtcDespesaAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ANEXO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\ManyToOne(targetEntity: LgtcDespesaAula::class)]
    #[ORM\JoinColumn(name: 'CD_DESPESA', referencedColumnName: 'CD_DESPESA', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcDespesaAula $cdDespesa = null;

    #[ORM\Column(name: 'NM_ARQUIVO', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'BB_ANEXO', type: 'blob', length: 16777215)]
    private ?string $bbAnexo = null;

    #[ORM\Column(name: 'NR_TAMANHO', type: 'float', nullable: true)]
    private ?float $nrTamanho = null;

    public function __construct(
        ?LgtcDespesaAula $cdDespesa = null,
        ?string $nmArquivo = null,
        ?string $bbAnexo = null,
        ?float $nrTamanho = null
    ) {
        $this->cdDespesa = $cdDespesa;
        $this->nmArquivo = $nmArquivo;
        $this->bbAnexo = $bbAnexo;
        $this->nrTamanho = $nrTamanho;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdDespesa(): ?LgtcDespesaAula
    {
        return $this->cdDespesa;
    }

    public function setCdDespesa(?LgtcDespesaAula $cdDespesa): self
    {
        $this->cdDespesa = $cdDespesa;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getBbAnexo(): ?string
    {
        return $this->bbAnexo;
    }

    public function setBbAnexo(?string $bbAnexo): self
    {
        $this->bbAnexo = $bbAnexo;
        return $this;
    }

    public function getNrTamanho(): ?float
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?float $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }
}
