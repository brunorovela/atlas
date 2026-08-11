<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AvaliacoesTiposParametrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacoesTiposParametrosRepository::class)]
#[ORM\Table(
    name: 'avaliacoes_tipos_parametros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO_TIPO', columns: ['cd_avaliacao_tipo'])]
class AvaliacoesTiposParametros
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_avaliacao', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdAvaliacao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer')]
    private ?int $cdAvaliacaoTipo = null;

    #[ORM\Column(name: 'nr_qtd_minima', type: 'integer', nullable: true)]
    private ?int $nrQtdMinima = null;

    #[ORM\Column(name: 'sn_sem_limite_minima', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snSemLimiteMinima = 1;

    #[ORM\Column(name: 'nr_qtd_maxima', type: 'integer', nullable: true)]
    private ?int $nrQtdMaxima = null;

    #[ORM\Column(name: 'sn_sem_limite_maxima', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snSemLimiteMaxima = 1;

    #[ORM\Column(name: 'sn_bloqueada', type: 'boolean', options: ['default' => '0'])]
    private bool $snBloqueada = false;

    #[ORM\Column(name: 'nr_peso', type: 'integer', nullable: true)]
    private ?int $nrPeso = null;

    #[ORM\Column(name: 'sn_sem_peso_fixo', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snSemPesoFixo = 1;

    #[ORM\Column(name: 'sn_considerar_participacao', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snConsiderarParticipacao = 0;

    #[ORM\Column(name: 'sn_ocultar_prova_aluno', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snOcultarProvaAluno = 0;

    public function __construct(
        ?int $cdAvaliacao = null,
        ?int $cdAvaliacaoTipo = null,
        ?int $nrQtdMinima = null,
        int $snSemLimiteMinima = 1,
        ?int $nrQtdMaxima = null,
        int $snSemLimiteMaxima = 1,
        bool $snBloqueada = false,
        ?int $nrPeso = null,
        int $snSemPesoFixo = 1,
        int $snConsiderarParticipacao = 0,
        int $snOcultarProvaAluno = 0
    ) {
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        $this->nrQtdMinima = $nrQtdMinima;
        $this->snSemLimiteMinima = $snSemLimiteMinima;
        $this->nrQtdMaxima = $nrQtdMaxima;
        $this->snSemLimiteMaxima = $snSemLimiteMaxima;
        $this->snBloqueada = $snBloqueada;
        $this->nrPeso = $nrPeso;
        $this->snSemPesoFixo = $snSemPesoFixo;
        $this->snConsiderarParticipacao = $snConsiderarParticipacao;
        $this->snOcultarProvaAluno = $snOcultarProvaAluno;
    }

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?int $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }

    public function getNrQtdMinima(): ?int
    {
        return $this->nrQtdMinima;
    }

    public function setNrQtdMinima(?int $nrQtdMinima): self
    {
        $this->nrQtdMinima = $nrQtdMinima;
        return $this;
    }

    public function getSnSemLimiteMinima(): int
    {
        return $this->snSemLimiteMinima;
    }

    public function setSnSemLimiteMinima(int $snSemLimiteMinima): self
    {
        $this->snSemLimiteMinima = $snSemLimiteMinima;
        return $this;
    }

    public function getNrQtdMaxima(): ?int
    {
        return $this->nrQtdMaxima;
    }

    public function setNrQtdMaxima(?int $nrQtdMaxima): self
    {
        $this->nrQtdMaxima = $nrQtdMaxima;
        return $this;
    }

    public function getSnSemLimiteMaxima(): int
    {
        return $this->snSemLimiteMaxima;
    }

    public function setSnSemLimiteMaxima(int $snSemLimiteMaxima): self
    {
        $this->snSemLimiteMaxima = $snSemLimiteMaxima;
        return $this;
    }

    public function isSnBloqueada(): bool
    {
        return $this->snBloqueada;
    }

    public function setSnBloqueada(bool $snBloqueada): self
    {
        $this->snBloqueada = $snBloqueada;
        return $this;
    }

    public function getNrPeso(): ?int
    {
        return $this->nrPeso;
    }

    public function setNrPeso(?int $nrPeso): self
    {
        $this->nrPeso = $nrPeso;
        return $this;
    }

    public function getSnSemPesoFixo(): int
    {
        return $this->snSemPesoFixo;
    }

    public function setSnSemPesoFixo(int $snSemPesoFixo): self
    {
        $this->snSemPesoFixo = $snSemPesoFixo;
        return $this;
    }

    public function getSnConsiderarParticipacao(): int
    {
        return $this->snConsiderarParticipacao;
    }

    public function setSnConsiderarParticipacao(int $snConsiderarParticipacao): self
    {
        $this->snConsiderarParticipacao = $snConsiderarParticipacao;
        return $this;
    }

    public function getSnOcultarProvaAluno(): int
    {
        return $this->snOcultarProvaAluno;
    }

    public function setSnOcultarProvaAluno(int $snOcultarProvaAluno): self
    {
        $this->snOcultarProvaAluno = $snOcultarProvaAluno;
        return $this;
    }
}
