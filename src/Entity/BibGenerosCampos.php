<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibGenerosCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibGenerosCamposRepository::class)]
#[ORM\Table(
    name: 'bib_generos_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_genero', columns: ['cd_genero'])]
#[ORM\Index(name: 'IX_CD_GENERO', columns: ['cd_genero'])]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO', columns: ['cd_cadastro_campo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_generos_campos_ibfk_1', 'colunas' => ['cd_genero'], 'tabelaAlvo' => 'bib_generos', 'colunasAlvo' => ['cd_genero'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibGenerosCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_genero_campo', type: 'integer')]
    private ?int $cdGeneroCampo = null;

    #[ORM\ManyToOne(targetEntity: BibGeneros::class)]
    #[ORM\JoinColumn(name: 'cd_genero', referencedColumnName: 'cd_genero', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibGeneros $cdGenero = null;

    #[ORM\Column(name: 'cd_cadastro_campo', type: 'integer')]
    private ?int $cdCadastroCampo = null;

    public function __construct(
        ?BibGeneros $cdGenero = null,
        ?int $cdCadastroCampo = null
    ) {
        $this->cdGenero = $cdGenero;
        $this->cdCadastroCampo = $cdCadastroCampo;
    }

    public function getCdGeneroCampo(): ?int
    {
        return $this->cdGeneroCampo;
    }

    public function getCdGenero(): ?BibGeneros
    {
        return $this->cdGenero;
    }

    public function setCdGenero(?BibGeneros $cdGenero): self
    {
        $this->cdGenero = $cdGenero;
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
