<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamEntradasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEntradasRepository::class)]
#[ORM\Table(
    name: 'tam_entradas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ENTRADA', columns: ['CD_ENTRADA'])]
#[ORM\Index(name: 'IX_DT_ENTRADA', columns: ['DT_ENTRADA'])]
#[ORM\Index(name: 'IX_DT_SAIDA', columns: ['DT_SAIDA'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_ATIVIDADE', columns: ['cd_inscricao_atividade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_entradas_ibfk_1', 'colunas' => ['cd_inscricao_atividade'], 'tabelaAlvo' => 'tam_inscricoes_atividades', 'colunasAlvo' => ['cd_inscricao_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamEntradas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ENTRADA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEntrada = null;

    #[ORM\Column(name: 'DT_ENTRADA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrada = null;

    #[ORM\Column(name: 'DT_SAIDA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\ManyToOne(targetEntity: TamInscricoesAtividades::class)]
    #[ORM\JoinColumn(name: 'cd_inscricao_atividade', referencedColumnName: 'cd_inscricao_atividade', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamInscricoesAtividades $cdInscricaoAtividade = null;

    public function __construct(
        ?\DateTimeInterface $dtEntrada = null,
        ?\DateTimeInterface $dtSaida = null,
        ?TamInscricoesAtividades $cdInscricaoAtividade = null
    ) {
        $this->dtEntrada = $dtEntrada;
        $this->dtSaida = $dtSaida;
        $this->cdInscricaoAtividade = $cdInscricaoAtividade;
    }

    public function getCdEntrada(): ?int
    {
        return $this->cdEntrada;
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

    public function getCdInscricaoAtividade(): ?TamInscricoesAtividades
    {
        return $this->cdInscricaoAtividade;
    }

    public function setCdInscricaoAtividade(?TamInscricoesAtividades $cdInscricaoAtividade): self
    {
        $this->cdInscricaoAtividade = $cdInscricaoAtividade;
        return $this;
    }
}
