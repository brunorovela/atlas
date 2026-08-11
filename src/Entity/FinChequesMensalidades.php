<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinChequesMensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinChequesMensalidadesRepository::class)]
#[ORM\Table(
    name: 'fin_cheques_mensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_cheque_mensalidade', columns: ['cd_cheque_mensalidade'])]
#[ORM\Index(name: 'IX_CD_CHEQUE', columns: ['cd_cheque'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
class FinChequesMensalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cheque_mensalidade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdChequeMensalidade = null;

    #[ORM\Column(name: 'cd_cheque', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCheque = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?int $cdCheque = null,
        ?int $cdMensalidade = null
    ) {
        $this->cdCheque = $cdCheque;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getCdChequeMensalidade(): ?int
    {
        return $this->cdChequeMensalidade;
    }

    public function getCdCheque(): ?int
    {
        return $this->cdCheque;
    }

    public function setCdCheque(?int $cdCheque): self
    {
        $this->cdCheque = $cdCheque;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
