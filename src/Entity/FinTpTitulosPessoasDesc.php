<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinTpTitulosPessoasDescRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinTpTitulosPessoasDescRepository::class)]
#[ORM\Table(
    name: 'fin_tp_titulos_pessoas_desc',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DESCONTO_PESSOA', columns: ['CD_DESCONTO_PESSOA'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['CD_TIPO_TITULO'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['CD_COLIGADA'])]
class FinTpTitulosPessoasDesc
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_DESCONTO_PESSOA', type: 'integer')]
    private ?int $cdDescontoPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_TIPO_TITULO', type: 'smallint')]
    private ?int $cdTipoTitulo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_COLIGADA', type: 'smallint')]
    private ?int $cdColigada = null;

    public function __construct(
        ?int $cdDescontoPessoa = null,
        ?int $cdTipoTitulo = null,
        ?int $cdColigada = null
    ) {
        $this->cdDescontoPessoa = $cdDescontoPessoa;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->cdColigada = $cdColigada;
    }

    public function getCdDescontoPessoa(): ?int
    {
        return $this->cdDescontoPessoa;
    }

    public function setCdDescontoPessoa(?int $cdDescontoPessoa): self
    {
        $this->cdDescontoPessoa = $cdDescontoPessoa;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }
}
