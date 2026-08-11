<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BibAutoresTiposCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAutoresTiposCamposRepository::class)]
#[ORM\Table(
    name: 'bib_autores_tipos_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_AUTOR', columns: ['cd_tipo_autor'])]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO', columns: ['cd_cadastro_campo'])]
class BibAutoresTiposCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_autor_tipo_campo', type: 'integer')]
    private ?int $cdAutorTipoCampo = null;

    #[ORM\Column(name: 'cd_tipo_autor', type: 'integer')]
    private ?int $cdTipoAutor = null;

    #[ORM\Column(name: 'cd_cadastro_campo', type: 'integer')]
    private ?int $cdCadastroCampo = null;

    public function __construct(
        ?int $cdTipoAutor = null,
        ?int $cdCadastroCampo = null
    ) {
        $this->cdTipoAutor = $cdTipoAutor;
        $this->cdCadastroCampo = $cdCadastroCampo;
    }

    public function getCdAutorTipoCampo(): ?int
    {
        return $this->cdAutorTipoCampo;
    }

    public function getCdTipoAutor(): ?int
    {
        return $this->cdTipoAutor;
    }

    public function setCdTipoAutor(?int $cdTipoAutor): self
    {
        $this->cdTipoAutor = $cdTipoAutor;
        return $this;
    }

    public function getCdCadastroCampo(): ?int
    {
        return $this->cdCadastroCampo;
    }

    public function setCdCadastroCampo(?int $cdCadastroCampo): self
    {
        $this->cdCadastroCampo = $cdCadastroCampo;
        return $this;
    }
}
