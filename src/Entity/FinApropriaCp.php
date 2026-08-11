<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinApropriaCpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinApropriaCpRepository::class)]
#[ORM\Table(
    name: 'fin_apropria_cp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_CENTRO', columns: ['cd_centro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_CONTA', 'colunas' => ['cd_conta'], 'tabelaAlvo' => 'fin_config_plano_contas', 'colunasAlvo' => ['cd_conta'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinApropriaCp
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['default' => '0'])]
    private int $cdTitulo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'smallint', options: ['default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdConta = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_centro', type: 'integer', options: ['default' => '0'])]
    private int $cdCentro = 0;

    #[ORM\Column(name: 'vl_movimento', type: 'float', nullable: true)]
    private ?float $vlMovimento = null;

    public function __construct(
        int $cdTitulo = 0,
        int $cdColigada = 1,
        int $cdConta = 0,
        int $cdCentro = 0,
        ?float $vlMovimento = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdColigada = $cdColigada;
        $this->cdConta = $cdConta;
        $this->cdCentro = $cdCentro;
        $this->vlMovimento = $vlMovimento;
    }

    public function getCdTitulo(): int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdConta(): int
    {
        return $this->cdConta;
    }

    public function setCdConta(int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getCdCentro(): int
    {
        return $this->cdCentro;
    }

    public function setCdCentro(int $cdCentro): self
    {
        $this->cdCentro = $cdCentro;
        return $this;
    }

    public function getVlMovimento(): ?float
    {
        return $this->vlMovimento;
    }

    public function setVlMovimento(?float $vlMovimento): self
    {
        $this->vlMovimento = $vlMovimento;
        return $this;
    }
}
