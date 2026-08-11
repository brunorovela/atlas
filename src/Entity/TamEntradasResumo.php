<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TamEntradasResumoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEntradasResumoRepository::class)]
#[ORM\Table(
    name: 'tam_entradas_resumo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ENTRADA', columns: ['CD_ENTRADA'])]
#[ORM\Index(name: 'IX_DT_ENTRADA', columns: ['DT_ENTRADA'])]
#[ORM\Index(name: 'IX_DT_SAIDA', columns: ['DT_SAIDA'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_ATIVIDADE', columns: ['CD_INSCRICAO_ATIVIDADE'])]
class TamEntradasResumo
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_ENTRADA', type: 'integer', options: ['default' => '0'])]
    private int $cdEntrada = 0;

    #[ORM\Column(name: 'DT_ENTRADA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'DT_SAIDA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'CD_INSCRICAO_ATIVIDADE', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdInscricaoAtividade = null;

    public function __construct(
        int $cdEntrada = 0,
        ?\DateTimeInterface $dtEntrada = null,
        ?\DateTimeInterface $dtSaida = null,
        ?int $cdInscricaoAtividade = null
    ) {
        $this->cdEntrada = $cdEntrada;
        $this->dtEntrada = $dtEntrada;
        $this->dtSaida = $dtSaida;
        $this->cdInscricaoAtividade = $cdInscricaoAtividade;
    }

    public function getCdEntrada(): int
    {
        return $this->cdEntrada;
    }

    public function setCdEntrada(int $cdEntrada): self
    {
        $this->cdEntrada = $cdEntrada;
        return $this;
    }

    public function getDtEntrada(): ?\DateTimeInterface
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada(?\DateTimeInterface $dtEntrada): self
    {
        $this->dtEntrada = $dtEntrada;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
        return $this;
    }

    public function getCdInscricaoAtividade(): ?int
    {
        return $this->cdInscricaoAtividade;
    }

    public function setCdInscricaoAtividade(?int $cdInscricaoAtividade): self
    {
        $this->cdInscricaoAtividade = $cdInscricaoAtividade;
        return $this;
    }
}
