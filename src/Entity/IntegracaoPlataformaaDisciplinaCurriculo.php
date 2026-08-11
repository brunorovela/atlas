<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoPlataformaaDisciplinaCurriculoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaDisciplinaCurriculoRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_disciplina_curriculo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_integracao_plataformaa_disciplina_curriculo', columns: ['plataformaa_ambiente_id', 'ds_external_curriculo_id', 'ds_external_disciplina_id'])]
#[ORM\Index(name: 'IDX_2188B1635EAA6F8A', columns: ['plataformaa_ambiente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'integracao_plataformaa_disciplina_curriculo_ambiente_FK', 'colunas' => ['plataformaa_ambiente_id'], 'tabelaAlvo' => 'integracao_plataformaa_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoPlataformaaDisciplinaCurriculo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoPlataformaaAmbiente::class)]
    #[ORM\JoinColumn(name: 'plataformaa_ambiente_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null;

    #[ORM\Column(name: 'ds_external_disciplina_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsExternalDisciplinaId = null;

    #[ORM\Column(name: 'ds_external_curriculo_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsExternalCurriculoId = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null,
        ?string $dsExternalDisciplinaId = null,
        ?string $dsExternalCurriculoId = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        $this->dsExternalDisciplinaId = $dsExternalDisciplinaId;
        $this->dsExternalCurriculoId = $dsExternalCurriculoId;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlataformaaAmbienteId(): ?IntegracaoPlataformaaAmbiente
    {
        return $this->plataformaaAmbienteId;
    }

    public function setPlataformaaAmbienteId(?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId): self
    {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        return $this;
    }

    public function getDsExternalDisciplinaId(): ?string
    {
        return $this->dsExternalDisciplinaId;
    }

    public function setDsExternalDisciplinaId(?string $dsExternalDisciplinaId): self
    {
        $this->dsExternalDisciplinaId = $dsExternalDisciplinaId;
        return $this;
    }

    public function getDsExternalCurriculoId(): ?string
    {
        return $this->dsExternalCurriculoId;
    }

    public function setDsExternalCurriculoId(?string $dsExternalCurriculoId): self
    {
        $this->dsExternalCurriculoId = $dsExternalCurriculoId;
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
