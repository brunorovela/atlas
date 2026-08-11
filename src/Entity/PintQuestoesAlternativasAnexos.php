<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PintQuestoesAlternativasAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesAlternativasAnexosRepository::class)]
#[ORM\Table(
    name: 'pint_questoes_alternativas_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_QUEST_ALTERNATIVAS_ANEXOS_QUESTALTERNATIVAS_CD_ALTERNATIVA', columns: ['CD_ALTERNATIVA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_QUEST_ALTERNATIVAS_ANEXOS_QUESTALTERNATIVAS_CD_ALTERNATIVA', 'colunas' => ['CD_ALTERNATIVA'], 'tabelaAlvo' => 'pint_questoes_alternativas', 'colunasAlvo' => ['cd_alternativa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PintQuestoesAlternativasAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ANEXO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\ManyToOne(targetEntity: PintQuestoesAlternativas::class)]
    #[ORM\JoinColumn(name: 'CD_ALTERNATIVA', referencedColumnName: 'cd_alternativa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PintQuestoesAlternativas $cdAlternativa = null;

    #[ORM\Column(name: 'BB_ANEXO', type: 'blob', length: 16777215)]
    private ?string $bbAnexo = null;

    #[ORM\Column(name: 'NM_ARQUIVO', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'NR_TAMANHO', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrTamanho = 0;

    public function __construct(
        ?PintQuestoesAlternativas $cdAlternativa = null,
        ?string $bbAnexo = null,
        ?string $nmArquivo = null,
        int $nrTamanho = 0
    ) {
        $this->cdAlternativa = $cdAlternativa;
        $this->bbAnexo = $bbAnexo;
        $this->nmArquivo = $nmArquivo;
        $this->nrTamanho = $nrTamanho;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdAlternativa(): ?PintQuestoesAlternativas
    {
        return $this->cdAlternativa;
    }

    public function setCdAlternativa(?PintQuestoesAlternativas $cdAlternativa): self
    {
        $this->cdAlternativa = $cdAlternativa;
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

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNrTamanho(): int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }
}
