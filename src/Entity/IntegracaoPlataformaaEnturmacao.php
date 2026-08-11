<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoPlataformaaEnturmacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaEnturmacaoRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_enturmacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_integracao_plataformaa_enturmacao', columns: ['plataformaa_ambiente_id', 'id_matricula', 'ds_external_class_subject_id'])]
#[ORM\Index(name: 'IDX_ID_MATRICULA', columns: ['id_matricula'])]
#[ORM\Index(name: 'IDX_EXTERNAL_CLASS_SUBJECT', columns: ['ds_external_class_subject_id'])]
#[ORM\Index(name: 'IDX_C1B58AF65EAA6F8A', columns: ['plataformaa_ambiente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'integracao_plataformaa_enturmacao_ambiente_FK', 'colunas' => ['plataformaa_ambiente_id'], 'tabelaAlvo' => 'integracao_plataformaa_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoPlataformaaEnturmacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoPlataformaaAmbiente::class)]
    #[ORM\JoinColumn(name: 'plataformaa_ambiente_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null;

    #[ORM\Column(name: 'id_matricula', type: 'integer')]
    private ?int $idMatricula = null;

    #[ORM\Column(name: 'ds_external_class_subject_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsExternalClassSubjectId = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null,
        ?int $idMatricula = null,
        ?string $dsExternalClassSubjectId = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        $this->idMatricula = $idMatricula;
        $this->dsExternalClassSubjectId = $dsExternalClassSubjectId;
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

    public function getIdMatricula(): ?int
    {
        return $this->idMatricula;
    }

    public function setIdMatricula(?int $idMatricula): self
    {
        $this->idMatricula = $idMatricula;
        return $this;
    }

    public function getDsExternalClassSubjectId(): ?string
    {
        return $this->dsExternalClassSubjectId;
    }

    public function setDsExternalClassSubjectId(?string $dsExternalClassSubjectId): self
    {
        $this->dsExternalClassSubjectId = $dsExternalClassSubjectId;
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
