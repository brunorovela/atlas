<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DocumentosDigitalizadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentosDigitalizadosRepository::class)]
#[ORM\Table(
    name: 'documentos_digitalizados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_pessoa', columns: ['cd_pessoa', 'cd_documento'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_DOCUMENTO', columns: ['cd_documento'])]
class DocumentosDigitalizados
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_documento', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDocumento = 0;

    #[ORM\Column(name: 'im_doc1', type: 'blob', nullable: true)]
    private ?string $imDoc1 = null;

    #[ORM\Column(name: 'im_doc2', type: 'blob', nullable: true)]
    private ?string $imDoc2 = null;

    #[ORM\Column(name: 'im_doc3', type: 'blob', nullable: true)]
    private ?string $imDoc3 = null;

    #[ORM\Column(name: 'im_doc4', type: 'blob', nullable: true)]
    private ?string $imDoc4 = null;

    public function __construct(
        int $cdPessoa = 0,
        int $cdDocumento = 0,
        ?string $imDoc1 = null,
        ?string $imDoc2 = null,
        ?string $imDoc3 = null,
        ?string $imDoc4 = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdDocumento = $cdDocumento;
        $this->imDoc1 = $imDoc1;
        $this->imDoc2 = $imDoc2;
        $this->imDoc3 = $imDoc3;
        $this->imDoc4 = $imDoc4;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdDocumento(): int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getImDoc1(): ?string
    {
        return $this->imDoc1;
    }

    public function setImDoc1(?string $imDoc1): self
    {
        $this->imDoc1 = $imDoc1;
        return $this;
    }

    public function getImDoc2(): ?string
    {
        return $this->imDoc2;
    }

    public function setImDoc2(?string $imDoc2): self
    {
        $this->imDoc2 = $imDoc2;
        return $this;
    }

    public function getImDoc3(): ?string
    {
        return $this->imDoc3;
    }

    public function setImDoc3(?string $imDoc3): self
    {
        $this->imDoc3 = $imDoc3;
        return $this;
    }

    public function getImDoc4(): ?string
    {
        return $this->imDoc4;
    }

    public function setImDoc4(?string $imDoc4): self
    {
        $this->imDoc4 = $imDoc4;
        return $this;
    }
}
