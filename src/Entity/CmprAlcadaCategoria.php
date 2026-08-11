<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprAlcadaCategoriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprAlcadaCategoriaRepository::class)]
#[ORM\Table(
    name: 'cmpr_alcada_categoria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cmpr_alcada_categoria_fk', columns: ['cd_categoria'])]
#[ORM\Index(name: 'IDX_11B2D4A1AFC694F1', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_alcada_categoria_fk', 'colunas' => ['cd_categoria'], 'tabelaAlvo' => 'cmpr_categoria', 'colunasAlvo' => ['cd_categoria'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_alcada_categoria_fk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprAlcadaCategoria
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CmprCategoria::class)]
    #[ORM\JoinColumn(name: 'cd_categoria', referencedColumnName: 'cd_categoria', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCategoria $cdCategoria = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?CmprCategoria $cdCategoria = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdCategoria = $cdCategoria;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdCategoria(): ?CmprCategoria
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?CmprCategoria $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }
}
