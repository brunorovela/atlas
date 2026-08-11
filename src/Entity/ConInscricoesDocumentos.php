<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConInscricoesDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricoesDocumentosRepository::class)]
#[ORM\Table(
    name: 'con_inscricoes_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Relaciona a Inscrição com o Contrato e Termo de Aceite']
)]
#[ORM\UniqueConstraint(name: 'UK_INSCRICAO_TERMO_DOCUMENTO', columns: ['cd_inscricao_area', 'cd_termo', 'cd_documento'])]
class ConInscricoesDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao_documento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoDocumento = null;

    #[ORM\Column(name: 'cd_inscricao_area', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'origem: con_inscricoes_areas'])]
    private ?int $cdInscricaoArea = null;

    #[ORM\Column(name: 'cd_termo', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'origem: nu_termos_aceite'])]
    private ?int $cdTermo = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'origem: integracao_autentique_documento'])]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdInscricaoArea = null,
        ?int $cdTermo = null,
        ?int $cdDocumento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdInscricaoArea = $cdInscricaoArea;
        $this->cdTermo = $cdTermo;
        $this->cdDocumento = $cdDocumento;
        $this->dtBase = $dtBase;
    }

    public function getCdInscricaoDocumento(): ?int
    {
        return $this->cdInscricaoDocumento;
    }

    public function getCdInscricaoArea(): ?int
    {
        return $this->cdInscricaoArea;
    }

    public function setCdInscricaoArea(?int $cdInscricaoArea): self
    {
        $this->cdInscricaoArea = $cdInscricaoArea;
        return $this;
    }

    public function getCdTermo(): ?int
    {
        return $this->cdTermo;
    }

    public function setCdTermo(?int $cdTermo): self
    {
        $this->cdTermo = $cdTermo;
        return $this;
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
