<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintPpBackupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintPpBackupRepository::class)]
#[ORM\Table(
    name: 'pint_pp_backup',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PROVAS_PESSOAS_PROVA_PESSOA', columns: ['cd_prova', 'cd_pessoa', 'ds_chave_prova'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
class PintPpBackup
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdProvaPessoa = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_impressao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtImpressao = null;

    #[ORM\Column(name: 'nr_qtd_alternativas', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrQtdAlternativas = 0;

    #[ORM\Column(name: 'nr_nota', type: 'smallfloat', nullable: true, options: ['default' => '0'])]
    private ?float $nrNota = 0.0;

    #[ORM\Column(name: 'ds_chave_prova', type: 'string', length: 32, nullable: true, options: ['fixed' => true])]
    private ?string $dsChaveProva = null;

    #[ORM\Column(name: 'sn_nota_atribuida', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNotaAtribuida = false;

    #[ORM\Column(name: 'sn_segunda_chamada', type: 'boolean', nullable: true)]
    private ?bool $snSegundaChamada = null;

    public function __construct(
        ?int $cdProva = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtImpressao = null,
        ?int $nrQtdAlternativas = 0,
        ?float $nrNota = 0.0,
        ?string $dsChaveProva = null,
        ?bool $snNotaAtribuida = false,
        ?bool $snSegundaChamada = null
    ) {
        $this->cdProva = $cdProva;
        $this->cdPessoa = $cdPessoa;
        $this->dtImpressao = $dtImpressao;
        $this->nrQtdAlternativas = $nrQtdAlternativas;
        $this->nrNota = $nrNota;
        $this->dsChaveProva = $dsChaveProva;
        $this->snNotaAtribuida = $snNotaAtribuida;
        $this->snSegundaChamada = $snSegundaChamada;
    }

    public function getCdProvaPessoa(): ?string
    {
        return $this->cdProvaPessoa;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDtImpressao(): ?\DateTimeInterface
    {
        return $this->dtImpressao;
    }

    public function setDtImpressao(?\DateTimeInterface $dtImpressao): self
    {
        $this->dtImpressao = $dtImpressao;
        return $this;
    }

    public function getNrQtdAlternativas(): ?int
    {
        return $this->nrQtdAlternativas;
    }

    public function setNrQtdAlternativas(?int $nrQtdAlternativas): self
    {
        $this->nrQtdAlternativas = $nrQtdAlternativas;
        return $this;
    }

    public function getNrNota(): ?float
    {
        return $this->nrNota;
    }

    public function setNrNota(?float $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }

    public function getDsChaveProva(): ?string
    {
        return $this->dsChaveProva;
    }

    public function setDsChaveProva(?string $dsChaveProva): self
    {
        $this->dsChaveProva = $dsChaveProva;
        return $this;
    }

    public function isSnNotaAtribuida(): ?bool
    {
        return $this->snNotaAtribuida;
    }

    public function setSnNotaAtribuida(?bool $snNotaAtribuida): self
    {
        $this->snNotaAtribuida = $snNotaAtribuida;
        return $this;
    }

    public function isSnSegundaChamada(): ?bool
    {
        return $this->snSegundaChamada;
    }

    public function setSnSegundaChamada(?bool $snSegundaChamada): self
    {
        $this->snSegundaChamada = $snSegundaChamada;
        return $this;
    }
}
