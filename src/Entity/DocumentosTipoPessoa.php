<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DocumentosTipoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentosTipoPessoaRepository::class)]
#[ORM\Table(
    name: 'documentos_tipo_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class DocumentosTipoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'integer')]
    private ?int $cdTipoPessoa = null;

    #[ORM\Column(name: 'ds_tipo_pessoa', type: 'string', length: 100)]
    private ?string $dsTipoPessoa = null;

    public function __construct(
        ?string $dsTipoPessoa = null
    ) {
        $this->dsTipoPessoa = $dsTipoPessoa;
    }

    public function getCdTipoPessoa(): ?int
    {
        return $this->cdTipoPessoa;
    }

    public function getDsTipoPessoa(): ?string
    {
        return $this->dsTipoPessoa;
    }

    public function setDsTipoPessoa(?string $dsTipoPessoa): self
    {
        $this->dsTipoPessoa = $dsTipoPessoa;
        return $this;
    }
}
