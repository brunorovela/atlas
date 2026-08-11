<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AvaliacoesProvasTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacoesProvasTiposRepository::class)]
#[ORM\Table(
    name: 'avaliacoes_provas_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'AVALIACOES_PROVAS_TIPOS_AVALIA', columns: ['CD_AVALIACAO'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['CD_AVALIACAO'])]
#[ORM\Index(name: 'IX_CD_PROVA_TIPO', columns: ['CD_PROVA_TIPO'])]
#[ORM\Index(name: 'IX_CD_TIPO_AVALIACAO', columns: ['CD_TIPO_AVALIACAO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'avaliacoes_provas_tipos_ibfk_1', 'colunas' => ['CD_AVALIACAO'], 'tabelaAlvo' => 'avaliacoes_parametros_matriz', 'colunasAlvo' => ['cd_avaliacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'avaliacoes_provas_tipos_ibfk_2', 'colunas' => ['CD_PROVA_TIPO'], 'tabelaAlvo' => 'diario_provas_tipos', 'colunasAlvo' => ['cd_prova_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_avaliacoes_provas_tipos_avaliacoes_parametros_matriz', 'colunas' => ['CD_AVALIACAO'], 'tabelaAlvo' => 'avaliacoes_parametros_matriz', 'colunasAlvo' => ['cd_avaliacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AvaliacoesProvasTipos
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: DiarioProvasTipos::class)]
    #[ORM\JoinColumn(name: 'CD_PROVA_TIPO', referencedColumnName: 'cd_prova_tipo', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?DiarioProvasTipos $cdProvaTipo = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: AvaliacoesParametrosMatriz::class)]
    #[ORM\JoinColumn(name: 'CD_AVALIACAO', referencedColumnName: 'cd_avaliacao', nullable: false, options: ['default' => '0', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AvaliacoesParametrosMatriz $cdAvaliacao = null;

    #[ORM\Column(name: 'SN_PROFESSOR', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProfessor = false;

    #[ORM\Column(name: 'SN_SEM_LIMITE', type: 'boolean', options: ['default' => '1'])]
    private bool $snSemLimite = true;

    #[ORM\Column(name: 'SN_PADRAO_BLOQUEADO', type: 'boolean', options: ['default' => '0'])]
    private bool $snPadraoBloqueado = false;

    #[ORM\Column(name: 'NR_QUANTIDADE_MAXIMA', type: 'integer', options: ['default' => '0'])]
    private int $nrQuantidadeMaxima = 0;

    #[ORM\Column(name: 'CD_TIPO_AVALIACAO', type: 'integer', options: ['default' => '1'])]
    private int $cdTipoAvaliacao = 1;

    #[ORM\Column(name: 'SN_PROVA_ONLINE', type: 'boolean', options: ['default' => '0'])]
    private bool $snProvaOnline = false;

    public function __construct(
        ?DiarioProvasTipos $cdProvaTipo = null,
        ?AvaliacoesParametrosMatriz $cdAvaliacao = null,
        ?bool $snProfessor = false,
        bool $snSemLimite = true,
        bool $snPadraoBloqueado = false,
        int $nrQuantidadeMaxima = 0,
        int $cdTipoAvaliacao = 1,
        bool $snProvaOnline = false
    ) {
        $this->cdProvaTipo = $cdProvaTipo;
        $this->cdAvaliacao = $cdAvaliacao;
        $this->snProfessor = $snProfessor;
        $this->snSemLimite = $snSemLimite;
        $this->snPadraoBloqueado = $snPadraoBloqueado;
        $this->nrQuantidadeMaxima = $nrQuantidadeMaxima;
        $this->cdTipoAvaliacao = $cdTipoAvaliacao;
        $this->snProvaOnline = $snProvaOnline;
    }

    public function getCdProvaTipo(): ?DiarioProvasTipos
    {
        return $this->cdProvaTipo;
    }

    public function setCdProvaTipo(?DiarioProvasTipos $cdProvaTipo): self
    {
        $this->cdProvaTipo = $cdProvaTipo;
        return $this;
    }

    public function getCdAvaliacao(): ?AvaliacoesParametrosMatriz
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?AvaliacoesParametrosMatriz $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
    }

    public function isSnProfessor(): ?bool
    {
        return $this->snProfessor;
    }

    public function setSnProfessor(?bool $snProfessor): self
    {
        $this->snProfessor = $snProfessor;
        return $this;
    }

    public function isSnSemLimite(): bool
    {
        return $this->snSemLimite;
    }

    public function setSnSemLimite(bool $snSemLimite): self
    {
        $this->snSemLimite = $snSemLimite;
        return $this;
    }

    public function isSnPadraoBloqueado(): bool
    {
        return $this->snPadraoBloqueado;
    }

    public function setSnPadraoBloqueado(bool $snPadraoBloqueado): self
    {
        $this->snPadraoBloqueado = $snPadraoBloqueado;
        return $this;
    }

    public function getNrQuantidadeMaxima(): int
    {
        return $this->nrQuantidadeMaxima;
    }

    public function setNrQuantidadeMaxima(int $nrQuantidadeMaxima): self
    {
        $this->nrQuantidadeMaxima = $nrQuantidadeMaxima;
        return $this;
    }

    public function getCdTipoAvaliacao(): int
    {
        return $this->cdTipoAvaliacao;
    }

    public function setCdTipoAvaliacao(int $cdTipoAvaliacao): self
    {
        $this->cdTipoAvaliacao = $cdTipoAvaliacao;
        return $this;
    }

    public function isSnProvaOnline(): bool
    {
        return $this->snProvaOnline;
    }

    public function setSnProvaOnline(bool $snProvaOnline): self
    {
        $this->snProvaOnline = $snProvaOnline;
        return $this;
    }
}
