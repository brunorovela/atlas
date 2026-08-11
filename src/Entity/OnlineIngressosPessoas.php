<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OnlineIngressosPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OnlineIngressosPessoasRepository::class)]
#[ORM\Table(
    name: 'online_ingressos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_INGRESSO_ONLINE', columns: ['cd_ingresso_online'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class OnlineIngressosPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_ingresso_online', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdIngressoOnline = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrAnosemestre = 0;

    public function __construct(
        int $cdPessoa = 0,
        int $cdIngressoOnline = 0,
        int $nrAnosemestre = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdIngressoOnline = $cdIngressoOnline;
        $this->nrAnosemestre = $nrAnosemestre;
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

    public function getCdIngressoOnline(): int
    {
        return $this->cdIngressoOnline;
    }

    public function setCdIngressoOnline(int $cdIngressoOnline): self
    {
        $this->cdIngressoOnline = $cdIngressoOnline;
        return $this;
    }

    public function getNrAnosemestre(): int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }
}
