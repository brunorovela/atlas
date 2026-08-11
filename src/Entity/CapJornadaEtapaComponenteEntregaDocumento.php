<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CapJornadaEtapaComponenteEntregaDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteEntregaDocumentoRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_entrega_documento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'FK_cd_jornada_componente_id', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cd_jornada_componente_entrega_documento_id', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteEntregaDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'sn_entrega_somente_documentos_curso', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snEntregaSomenteDocumentosCurso = 0;

    #[ORM\Column(name: 'me_json_documentos_utilizados', type: 'text', length: 65535, nullable: true)]
    private ?string $meJsonDocumentosUtilizados = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        int $snEntregaSomenteDocumentosCurso = 0,
        ?string $meJsonDocumentosUtilizados = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->snEntregaSomenteDocumentosCurso = $snEntregaSomenteDocumentosCurso;
        $this->meJsonDocumentosUtilizados = $meJsonDocumentosUtilizados;
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

    public function getSnEntregaSomenteDocumentosCurso(): int
    {
        return $this->snEntregaSomenteDocumentosCurso;
    }

    public function setSnEntregaSomenteDocumentosCurso(int $snEntregaSomenteDocumentosCurso): self
    {
        $this->snEntregaSomenteDocumentosCurso = $snEntregaSomenteDocumentosCurso;
        return $this;
    }

    public function getMeJsonDocumentosUtilizados(): ?string
    {
        return $this->meJsonDocumentosUtilizados;
    }

    public function setMeJsonDocumentosUtilizados(?string $meJsonDocumentosUtilizados): self
    {
        $this->meJsonDocumentosUtilizados = $meJsonDocumentosUtilizados;
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
