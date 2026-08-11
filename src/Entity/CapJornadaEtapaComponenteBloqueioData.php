<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponenteBloqueioDataRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteBloqueioDataRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_bloqueio_data',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cap_jornada_componente_bloqueio_status_contato_un', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cjec_bloqueio_data_cd_jornada_componente_id', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteBloqueioData
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'dt_bloqueio', type: 'datetime')]
    private ?\DateTimeInterface $dtBloqueio = null;

    #[ORM\Column(name: 'me_texto_bloqueio', type: 'text', length: 65535)]
    private ?string $meTextoBloqueio = null;

    #[ORM\Column(name: 'me_texto_desbloqueio', type: 'text', length: 65535, nullable: true)]
    private ?string $meTextoDesbloqueio = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?\DateTimeInterface $dtBloqueio = null,
        ?string $meTextoBloqueio = null,
        ?string $meTextoDesbloqueio = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->dtBloqueio = $dtBloqueio;
        $this->meTextoBloqueio = $meTextoBloqueio;
        $this->meTextoDesbloqueio = $meTextoDesbloqueio;
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

    public function getDtBloqueio(): ?\DateTimeInterface
    {
        return $this->dtBloqueio;
    }

    public function setDtBloqueio(?\DateTimeInterface $dtBloqueio): self
    {
        $this->dtBloqueio = $dtBloqueio;
        return $this;
    }

    public function getMeTextoBloqueio(): ?string
    {
        return $this->meTextoBloqueio;
    }

    public function setMeTextoBloqueio(?string $meTextoBloqueio): self
    {
        $this->meTextoBloqueio = $meTextoBloqueio;
        return $this;
    }

    public function getMeTextoDesbloqueio(): ?string
    {
        return $this->meTextoDesbloqueio;
    }

    public function setMeTextoDesbloqueio(?string $meTextoDesbloqueio): self
    {
        $this->meTextoDesbloqueio = $meTextoDesbloqueio;
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
