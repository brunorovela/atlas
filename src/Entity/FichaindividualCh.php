<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FichaindividualChRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichaindividualChRepository::class)]
#[ORM\Table(
    name: 'fichaindividual_ch',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'id_fichaindividual', columns: ['id_fichaindividual'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_fichaindividual_id_id_fichaindividual', 'colunas' => ['id_fichaindividual'], 'tabelaAlvo' => 'fichaindividual', 'colunasAlvo' => ['id_fichaindividual'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FichaindividualCh
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_fichaindividual', type: 'integer', options: ['unsigned' => true])]
    private ?int $idFichaindividual = null;

    #[ORM\Column(name: 'vl_ch_etapa1', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa1 = null;

    #[ORM\Column(name: 'vl_ch_etapa2', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa2 = null;

    #[ORM\Column(name: 'vl_ch_etapa3', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa3 = null;

    #[ORM\Column(name: 'vl_ch_etapa4', type: 'smallfloat', nullable: true)]
    private ?float $vlChEtapa4 = null;

    public function __construct(
        ?float $vlChEtapa1 = null,
        ?float $vlChEtapa2 = null,
        ?float $vlChEtapa3 = null,
        ?float $vlChEtapa4 = null
    ) {
        $this->vlChEtapa1 = $vlChEtapa1;
        $this->vlChEtapa2 = $vlChEtapa2;
        $this->vlChEtapa3 = $vlChEtapa3;
        $this->vlChEtapa4 = $vlChEtapa4;
    }

    public function getIdFichaindividual(): ?int
    {
        return $this->idFichaindividual;
    }

    public function getVlChEtapa1(): ?float
    {
        return $this->vlChEtapa1;
    }

    public function setVlChEtapa1(?float $vlChEtapa1): self
    {
        $this->vlChEtapa1 = $vlChEtapa1;
        return $this;
    }

    public function getVlChEtapa2(): ?float
    {
        return $this->vlChEtapa2;
    }

    public function setVlChEtapa2(?float $vlChEtapa2): self
    {
        $this->vlChEtapa2 = $vlChEtapa2;
        return $this;
    }

    public function getVlChEtapa3(): ?float
    {
        return $this->vlChEtapa3;
    }

    public function setVlChEtapa3(?float $vlChEtapa3): self
    {
        $this->vlChEtapa3 = $vlChEtapa3;
        return $this;
    }

    public function getVlChEtapa4(): ?float
    {
        return $this->vlChEtapa4;
    }

    public function setVlChEtapa4(?float $vlChEtapa4): self
    {
        $this->vlChEtapa4 = $vlChEtapa4;
        return $this;
    }
}
