<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\MextProcessoAtividadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextProcessoAtividadeRepository::class)]
#[ORM\Table(
    name: 'mext_processo_atividade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_atividade', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IDX_C946EDF1A4910C3C', columns: ['cd_processo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_processo_atividade_ibfk_1', 'colunas' => ['cd_processo'], 'tabelaAlvo' => 'mext_processo', 'colunasAlvo' => ['cd_processo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_processo_atividade_ibfk_2', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'mext_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextProcessoAtividade
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: MextProcesso::class)]
    #[ORM\JoinColumn(name: 'cd_processo', referencedColumnName: 'cd_processo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextProcesso $cdProcesso = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: MextAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextAtividade $cdAtividade = null;

    #[ORM\Column(name: 'sn_manter_turma_extra', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snManterTurmaExtra = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_ignorar_horario_turma_extra', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snIgnorarHorarioTurmaExtra = null;

    #[ORM\Column(name: 'sn_ignorar_horario_turma_regul', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snIgnorarHorarioTurmaRegul = null;

    public function __construct(
        ?MextProcesso $cdProcesso = null,
        ?MextAtividade $cdAtividade = null,
        ?int $snManterTurmaExtra = null,
        ?int $snAtivo = null,
        ?int $snIgnorarHorarioTurmaExtra = null,
        ?int $snIgnorarHorarioTurmaRegul = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdAtividade = $cdAtividade;
        $this->snManterTurmaExtra = $snManterTurmaExtra;
        $this->snAtivo = $snAtivo;
        $this->snIgnorarHorarioTurmaExtra = $snIgnorarHorarioTurmaExtra;
        $this->snIgnorarHorarioTurmaRegul = $snIgnorarHorarioTurmaRegul;
    }

    public function getCdProcesso(): ?MextProcesso
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?MextProcesso $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getCdAtividade(): ?MextAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?MextAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getSnManterTurmaExtra(): ?int
    {
        return $this->snManterTurmaExtra;
    }

    public function setSnManterTurmaExtra(?int $snManterTurmaExtra): self
    {
        $this->snManterTurmaExtra = $snManterTurmaExtra;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnIgnorarHorarioTurmaExtra(): ?int
    {
        return $this->snIgnorarHorarioTurmaExtra;
    }

    public function setSnIgnorarHorarioTurmaExtra(?int $snIgnorarHorarioTurmaExtra): self
    {
        $this->snIgnorarHorarioTurmaExtra = $snIgnorarHorarioTurmaExtra;
        return $this;
    }

    public function getSnIgnorarHorarioTurmaRegul(): ?int
    {
        return $this->snIgnorarHorarioTurmaRegul;
    }

    public function setSnIgnorarHorarioTurmaRegul(?int $snIgnorarHorarioTurmaRegul): self
    {
        $this->snIgnorarHorarioTurmaRegul = $snIgnorarHorarioTurmaRegul;
        return $this;
    }
}
