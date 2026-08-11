<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncDocumentosFaltantesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncDocumentosFaltantesRepository::class)]
#[ORM\Table(
    name: 'estnc_documentos_faltantes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class EstncDocumentosFaltantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_faltante', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDocumentoFaltante = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_documento', type: 'string', length: 255, nullable: true)]
    private ?string $dsDocumento = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsDocumento = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsDocumento = $dsDocumento;
    }

    public function getCdDocumentoFaltante(): ?int
    {
        return $this->cdDocumentoFaltante;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDsDocumento(): ?string
    {
        return $this->dsDocumento;
    }

    public function setDsDocumento(?string $dsDocumento): self
    {
        $this->dsDocumento = $dsDocumento;
        return $this;
    }
}
