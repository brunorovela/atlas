<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaCurriculoDigitalDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaCurriculoDigitalDocumentoRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_curriculo_digital_documento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ID_CURRICULO_DOCUMENTO_PESSOA', columns: ['id_curriculo', 'cd_documento_pessoa'])]
#[ORM\Index(name: 'FK_uni_diploma_curriculo_digital', columns: ['id_curriculo'])]
#[ORM\Index(name: 'FK_acrv_documento_pessoa', columns: ['cd_documento_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_acrv_documento_pessoa', 'colunas' => ['cd_documento_pessoa'], 'tabelaAlvo' => 'acrv_documento_pessoa', 'colunasAlvo' => ['cd_documento_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_curriculo_digital', 'colunas' => ['id_curriculo'], 'tabelaAlvo' => 'uni_diploma_curriculo_digital', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaCurriculoDigitalDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaCurriculoDigital::class)]
    #[ORM\JoinColumn(name: 'id_curriculo', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaCurriculoDigital $idCurriculo = null;

    #[ORM\ManyToOne(targetEntity: AcrvDocumentoPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_documento_pessoa', referencedColumnName: 'cd_documento_pessoa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvDocumentoPessoa $cdDocumentoPessoa = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniDiplomaCurriculoDigital $idCurriculo = null,
        ?AcrvDocumentoPessoa $cdDocumentoPessoa = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idCurriculo = $idCurriculo;
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCurriculo(): ?UniDiplomaCurriculoDigital
    {
        return $this->idCurriculo;
    }

    public function setIdCurriculo(?UniDiplomaCurriculoDigital $idCurriculo): self
    {
        $this->idCurriculo = $idCurriculo;
        return $this;
    }

    public function getCdDocumentoPessoa(): ?AcrvDocumentoPessoa
    {
        return $this->cdDocumentoPessoa;
    }

    public function setCdDocumentoPessoa(?AcrvDocumentoPessoa $cdDocumentoPessoa): self
    {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
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
