<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimPessoaIndicacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimPessoaIndicacaoRepository::class)]
#[ORM\Table(
    name: 'unim_pessoa_indicacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UnimPessoaIndicacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_indicacao', type: 'integer')]
    private ?int $cdIndicacao = null;

    #[ORM\Column(name: 'cd_pessoa_indicou', type: 'integer')]
    private ?int $cdPessoaIndicou = null;

    #[ORM\Column(name: 'cd_pessoa_indicada', type: 'integer')]
    private ?int $cdPessoaIndicada = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_coligada', type: 'integer', nullable: true)]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'sn_indicacao_externa', type: 'integer', options: ['default' => '0'])]
    private int $snIndicacaoExterna = 0;

    public function __construct(
        ?int $cdPessoaIndicou = null,
        ?int $cdPessoaIndicada = null,
        ?string $cdCurso = null,
        ?int $cdColigada = null,
        ?\DateTimeInterface $dtRegistro = null,
        int $snIndicacaoExterna = 0
    ) {
        $this->cdPessoaIndicou = $cdPessoaIndicou;
        $this->cdPessoaIndicada = $cdPessoaIndicada;
        $this->cdCurso = $cdCurso;
        $this->cdColigada = $cdColigada;
        $this->dtRegistro = $dtRegistro;
        $this->snIndicacaoExterna = $snIndicacaoExterna;
    }

    public function getCdIndicacao(): ?int
    {
        return $this->cdIndicacao;
    }

    public function getCdPessoaIndicou(): ?int
    {
        return $this->cdPessoaIndicou;
    }

    public function setCdPessoaIndicou(?int $cdPessoaIndicou): self
    {
        $this->cdPessoaIndicou = $cdPessoaIndicou;
        return $this;
    }

    public function getCdPessoaIndicada(): ?int
    {
        return $this->cdPessoaIndicada;
    }

    public function setCdPessoaIndicada(?int $cdPessoaIndicada): self
    {
        $this->cdPessoaIndicada = $cdPessoaIndicada;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getSnIndicacaoExterna(): int
    {
        return $this->snIndicacaoExterna;
    }

    public function setSnIndicacaoExterna(int $snIndicacaoExterna): self
    {
        $this->snIndicacaoExterna = $snIndicacaoExterna;
        return $this;
    }
}
