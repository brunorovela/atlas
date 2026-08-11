<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoPlataformaaMatriculaPeriodoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaMatriculaPeriodoRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_matricula_periodo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_integracao_plataformaa_matricula_periodo', columns: ['plataformaa_ambiente_id', 'id_matricula'])]
#[ORM\Index(name: 'IDX_ID_MATRICULA', columns: ['id_matricula'])]
#[ORM\Index(name: 'IDX_64050D5EAA6F8A', columns: ['plataformaa_ambiente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'integracao_plataformaa_matricula_periodo_ambiente_FK', 'colunas' => ['plataformaa_ambiente_id'], 'tabelaAlvo' => 'integracao_plataformaa_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoPlataformaaMatriculaPeriodo
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

    #[ORM\Column(name: 'ds_external_enrollment_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsExternalEnrollmentId = null;

    #[ORM\Column(name: 'ds_external_period_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsExternalPeriodId = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null,
        ?int $idMatricula = null,
        ?string $dsExternalEnrollmentId = null,
        ?string $dsExternalPeriodId = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        $this->idMatricula = $idMatricula;
        $this->dsExternalEnrollmentId = $dsExternalEnrollmentId;
        $this->dsExternalPeriodId = $dsExternalPeriodId;
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

    public function getDsExternalEnrollmentId(): ?string
    {
        return $this->dsExternalEnrollmentId;
    }

    public function setDsExternalEnrollmentId(?string $dsExternalEnrollmentId): self
    {
        $this->dsExternalEnrollmentId = $dsExternalEnrollmentId;
        return $this;
    }

    public function getDsExternalPeriodId(): ?string
    {
        return $this->dsExternalPeriodId;
    }

    public function setDsExternalPeriodId(?string $dsExternalPeriodId): self
    {
        $this->dsExternalPeriodId = $dsExternalPeriodId;
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
