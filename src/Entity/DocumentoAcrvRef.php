<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DocumentoAcrvRefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentoAcrvRefRepository::class)]
#[ORM\Table(
    name: 'documento_acrv_ref',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_documento_acrv_ref', columns: ['cd_documento', 'cd_referencia'])]
#[ORM\Index(name: 'cd_referencia', columns: ['cd_referencia'])]
#[ORM\Index(name: 'IDX_DF0E872DDCB37A81', columns: ['cd_documento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'documento_acrv_ref_ibfk_1', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'documento_acrv_ref_ibfk_2', 'colunas' => ['cd_referencia'], 'tabelaAlvo' => 'acrv_referencia', 'colunasAlvo' => ['cd_referencia'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DocumentoAcrvRef
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_ref', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoRef = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer', nullable: true)]
    private ?int $cdDocumento = null;

    #[ORM\ManyToOne(targetEntity: AcrvReferencia::class)]
    #[ORM\JoinColumn(name: 'cd_referencia', referencedColumnName: 'cd_referencia', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvReferencia $cdReferencia = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdDocumento = null,
        ?AcrvReferencia $cdReferencia = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->cdReferencia = $cdReferencia;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumentoRef(): ?int
    {
        return $this->cdDocumentoRef;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getCdReferencia(): ?AcrvReferencia
    {
        return $this->cdReferencia;
    }

    public function setCdReferencia(?AcrvReferencia $cdReferencia): self
    {
        $this->cdReferencia = $cdReferencia;
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
