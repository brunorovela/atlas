<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RecibosParcelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecibosParcelasRepository::class)]
#[ORM\Table(
    name: 'recibos_parcelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class RecibosParcelas
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_parcela', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrParcela = 0;

    #[ORM\Column(name: 'ds_mensagem', type: 'string', length: 150, nullable: true, options: ['default' => '0'])]
    private ?string $dsMensagem = '0';

    public function __construct(
        int $nrParcela = 0,
        ?string $dsMensagem = '0'
    ) {
        $this->nrParcela = $nrParcela;
        $this->dsMensagem = $dsMensagem;
    }

    public function getNrParcela(): int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }
}
