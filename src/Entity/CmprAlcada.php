<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprAlcadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprAlcadaRepository::class)]
#[ORM\Table(
    name: 'cmpr_alcada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_alcada_pessoa_fk', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['cd_pessoa']
)]
class CmprAlcada
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'vl_ate', type: 'float', nullable: true)]
    private ?float $vlAte = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?float $vlAte = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->vlAte = $vlAte;
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

    public function getVlAte(): ?float
    {
        return $this->vlAte;
    }

    public function setVlAte(?float $vlAte): self
    {
        $this->vlAte = $vlAte;
        return $this;
    }
}
