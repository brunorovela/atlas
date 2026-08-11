<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\OcorrenciasDisciplinaTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OcorrenciasDisciplinaTipoRepository::class)]
#[ORM\Table(
    name: 'ocorrencias_disciplina_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Irá substituir a tabela ocorrencias_tipos_disciplinas quando for implementada a versão definitiva ']
)]
#[ORM\Index(name: 'FK_ocorrencias_disciplina_tipo_ocorrencias_disciplina', columns: ['cd_ocorrencia_disciplina'])]
#[ORM\Index(name: 'FK_ocorrencias_disciplina_tipo_ocorrencias_tipos', columns: ['cd_tipo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ocorrencias_disciplina_tipo_ocorrencias_disciplina', 'colunas' => ['cd_ocorrencia_disciplina'], 'tabelaAlvo' => 'ocorrencias_disciplina', 'colunasAlvo' => ['cd_ocorrencia_disciplina'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_ocorrencias_disciplina_tipo_ocorrencias_tipos', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'ocorrencias_tipos', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OcorrenciasDisciplinaTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ocorrencia_disciplina_tipo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOcorrenciaDisciplinaTipo = null;

    #[ORM\ManyToOne(targetEntity: OcorrenciasDisciplina::class)]
    #[ORM\JoinColumn(name: 'cd_ocorrencia_disciplina', referencedColumnName: 'cd_ocorrencia_disciplina', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OcorrenciasDisciplina $cdOcorrenciaDisciplina = null;

    #[ORM\ManyToOne(targetEntity: OcorrenciasTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => 'chave com ocorrencias_tipos'])]
    private ?OcorrenciasTipos $cdTipo = null;

    #[ORM\Column(name: 'vl_peso', type: 'smallfloat', nullable: true, options: ['comment' => 'aumento ou desconto'])]
    private ?float $vlPeso = null;

    #[ORM\Column(name: 'sn_carta', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCarta = null;

    #[ORM\Column(name: 'sn_email', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEmail = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?OcorrenciasDisciplina $cdOcorrenciaDisciplina = null,
        ?OcorrenciasTipos $cdTipo = null,
        ?float $vlPeso = null,
        ?int $snCarta = null,
        ?int $snEmail = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdOcorrenciaDisciplina = $cdOcorrenciaDisciplina;
        $this->cdTipo = $cdTipo;
        $this->vlPeso = $vlPeso;
        $this->snCarta = $snCarta;
        $this->snEmail = $snEmail;
        $this->dtBase = $dtBase;
    }

    public function getCdOcorrenciaDisciplinaTipo(): ?int
    {
        return $this->cdOcorrenciaDisciplinaTipo;
    }

    public function getCdOcorrenciaDisciplina(): ?OcorrenciasDisciplina
    {
        return $this->cdOcorrenciaDisciplina;
    }

    public function setCdOcorrenciaDisciplina(?OcorrenciasDisciplina $cdOcorrenciaDisciplina): self
    {
        $this->cdOcorrenciaDisciplina = $cdOcorrenciaDisciplina;
        return $this;
    }

    public function getCdTipo(): ?OcorrenciasTipos
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?OcorrenciasTipos $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
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

    public function getSnCarta(): ?int
    {
        return $this->snCarta;
    }

    public function setSnCarta(?int $snCarta): self
    {
        $this->snCarta = $snCarta;
        return $this;
    }

    public function getSnEmail(): ?int
    {
        return $this->snEmail;
    }

    public function setSnEmail(?int $snEmail): self
    {
        $this->snEmail = $snEmail;
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
