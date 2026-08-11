<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BoletosVariaveisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoletosVariaveisRepository::class)]
#[ORM\Table(
    name: 'boletos_variaveis',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Vari?veis e fun??es da composi??o da linha e do c?digo']
)]
#[ORM\UniqueConstraint(name: 'cd_variavel', columns: ['cd_variavel'])]
#[ORM\Index(name: 'IX_CD_BOLETO', columns: ['cd_boleto'])]
#[ORM\Index(name: 'IX_DS_NOME_VARIAVEL', columns: ['ds_nome_variavel'], options: ['lengths' => [20]])]
class BoletosVariaveis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_variavel', type: 'integer')]
    private ?int $cdVariavel = null;

    #[ORM\Column(name: 'cd_boleto', type: 'integer', options: ['default' => '0'])]
    private int $cdBoleto = 0;

    #[ORM\Column(name: 'ds_variavel', type: 'string', length: 150, options: ['default' => ''])]
    private string $dsVariavel = '';

    #[ORM\Column(name: 'ds_nome_variavel', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsNomeVariavel = '0';

    #[ORM\Column(name: 'ds_composicao', type: 'text', length: 16777215)]
    private ?string $dsComposicao = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    public function __construct(
        int $cdBoleto = 0,
        string $dsVariavel = '',
        string $dsNomeVariavel = '0',
        ?string $dsComposicao = null,
        ?int $nrOrdem = null
    ) {
        $this->cdBoleto = $cdBoleto;
        $this->dsVariavel = $dsVariavel;
        $this->dsNomeVariavel = $dsNomeVariavel;
        $this->dsComposicao = $dsComposicao;
        $this->nrOrdem = $nrOrdem;
    }

    public function getCdVariavel(): ?int
    {
        return $this->cdVariavel;
    }

    public function getCdBoleto(): int
    {
        return $this->cdBoleto;
    }

    public function setCdBoleto(int $cdBoleto): self
    {
        $this->cdBoleto = $cdBoleto;
        return $this;
    }

    public function getDsVariavel(): string
    {
        return $this->dsVariavel;
    }

    public function setDsVariavel(string $dsVariavel): self
    {
        $this->dsVariavel = $dsVariavel;
        return $this;
    }

    public function getDsNomeVariavel(): string
    {
        return $this->dsNomeVariavel;
    }

    public function setDsNomeVariavel(string $dsNomeVariavel): self
    {
        $this->dsNomeVariavel = $dsNomeVariavel;
        return $this;
    }

    public function getDsComposicao(): ?string
    {
        return $this->dsComposicao;
    }

    public function setDsComposicao(?string $dsComposicao): self
    {
        $this->dsComposicao = $dsComposicao;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }
}
