<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponenteSelecaoDisciplinasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteSelecaoDisciplinasRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_selecao_disciplinas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'FK_cd_jornada_componente_id_selecao_disciplinas', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cd_jornada_componente_id_selecao_disciplinas', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteSelecaoDisciplinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'sn_permitir_selecao_disciplinas', type: 'boolean', options: ['default' => '1'])]
    private bool $snPermitirSelecaoDisciplinas = true;

    #[ORM\Column(name: 'sn_mostrar_codigo_turma', type: 'boolean', options: ['default' => '0'])]
    private bool $snMostrarCodigoTurma = false;

    #[ORM\Column(name: 'sn_mostrar_descricao_turma', type: 'boolean', options: ['default' => '0'])]
    private bool $snMostrarDescricaoTurma = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        bool $snPermitirSelecaoDisciplinas = true,
        bool $snMostrarCodigoTurma = false,
        bool $snMostrarDescricaoTurma = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->snPermitirSelecaoDisciplinas = $snPermitirSelecaoDisciplinas;
        $this->snMostrarCodigoTurma = $snMostrarCodigoTurma;
        $this->snMostrarDescricaoTurma = $snMostrarDescricaoTurma;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function isSnPermitirSelecaoDisciplinas(): bool
    {
        return $this->snPermitirSelecaoDisciplinas;
    }

    public function setSnPermitirSelecaoDisciplinas(bool $snPermitirSelecaoDisciplinas): self
    {
        $this->snPermitirSelecaoDisciplinas = $snPermitirSelecaoDisciplinas;
        return $this;
    }

    public function isSnMostrarCodigoTurma(): bool
    {
        return $this->snMostrarCodigoTurma;
    }

    public function setSnMostrarCodigoTurma(bool $snMostrarCodigoTurma): self
    {
        $this->snMostrarCodigoTurma = $snMostrarCodigoTurma;
        return $this;
    }

    public function isSnMostrarDescricaoTurma(): bool
    {
        return $this->snMostrarDescricaoTurma;
    }

    public function setSnMostrarDescricaoTurma(bool $snMostrarDescricaoTurma): self
    {
        $this->snMostrarDescricaoTurma = $snMostrarDescricaoTurma;
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
