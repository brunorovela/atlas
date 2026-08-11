<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieTurmaProjetoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieTurmaProjetoRepository::class)]
#[ORM\Table(
    name: 'omie_turma_projeto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_OMIE_CONTA_CORRENTE_INTEGRACAO', columns: ['cd_integracao_omie', 'id_turma'])]
class OmieTurmaProjeto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_turma_projeto', type: 'integer')]
    private ?int $cdOmieTurmaProjeto = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint')]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'id_turma', type: 'integer')]
    private ?int $idTurma = null;

    #[ORM\Column(name: 'cd_projeto_omie', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdProjetoOmie = null;

    #[ORM\Column(name: 'ds_projeto_omie', type: 'string', length: 255, nullable: true)]
    private ?string $dsProjetoOmie = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?int $idTurma = null,
        ?string $cdProjetoOmie = null,
        ?string $dsProjetoOmie = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->idTurma = $idTurma;
        $this->cdProjetoOmie = $cdProjetoOmie;
        $this->dsProjetoOmie = $dsProjetoOmie;
        $this->dtBase = $dtBase;
    }

    public function getCdOmieTurmaProjeto(): ?int
    {
        return $this->cdOmieTurmaProjeto;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        return $this;
    }

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
    }

    public function setIdTurma(?int $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getCdProjetoOmie(): ?string
    {
        return $this->cdProjetoOmie;
    }

    public function setCdProjetoOmie(?string $cdProjetoOmie): self
    {
        $this->cdProjetoOmie = $cdProjetoOmie;
        return $this;
    }

    public function getDsProjetoOmie(): ?string
    {
        return $this->dsProjetoOmie;
    }

    public function setDsProjetoOmie(?string $dsProjetoOmie): self
    {
        $this->dsProjetoOmie = $dsProjetoOmie;
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
