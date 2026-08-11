<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasBonusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasBonusRepository::class)]
#[ORM\Table(
    name: 'pessoas_bonus',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_CD_PESSOA_BENEFICIADA', columns: ['cd_pessoa_beneficiada'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class PessoasBonus
{
    #[ORM\Id]
    #[ORM\Column(name: 'anosemestre', type: 'integer', options: ['default' => '0'])]
    private int $anosemestre = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa_beneficiada', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoaBeneficiada = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    public function __construct(
        int $anosemestre = 0,
        int $cdPessoaBeneficiada = 0,
        int $cdPessoa = 0
    ) {
        $this->anosemestre = $anosemestre;
        $this->cdPessoaBeneficiada = $cdPessoaBeneficiada;
        $this->cdPessoa = $cdPessoa;
    }

    public function getAnosemestre(): int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getCdPessoaBeneficiada(): int
    {
        return $this->cdPessoaBeneficiada;
    }

    public function setCdPessoaBeneficiada(int $cdPessoaBeneficiada): self
    {
        $this->cdPessoaBeneficiada = $cdPessoaBeneficiada;
        return $this;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }
}
