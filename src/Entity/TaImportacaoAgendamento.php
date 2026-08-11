<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaImportacaoAgendamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaImportacaoAgendamentoRepository::class)]
#[ORM\Table(
    name: 'ta_importacao_agendamento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_AGENDAMENTO_IMPORTACAO', columns: ['hr_execucao'])]
class TaImportacaoAgendamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_agendamento', type: 'integer')]
    private ?int $cdAgendamento = null;

    #[ORM\Column(name: 'hr_execucao', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrExecucao = null;

    #[ORM\Column(name: 'sn_executar_importacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snExecutarImportacao = false;

    #[ORM\Column(name: 'sn_encerrar_periodo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEncerrarPeriodo = false;

    public function __construct(
        ?\DateTimeInterface $hrExecucao = null,
        ?bool $snExecutarImportacao = false,
        ?bool $snEncerrarPeriodo = false
    ) {
        $this->hrExecucao = $hrExecucao;
        $this->snExecutarImportacao = $snExecutarImportacao;
        $this->snEncerrarPeriodo = $snEncerrarPeriodo;
    }

    public function getCdAgendamento(): ?int
    {
        return $this->cdAgendamento;
    }

    public function getHrExecucao(): ?\DateTimeInterface
    {
        return $this->hrExecucao;
    }

    public function setHrExecucao(?\DateTimeInterface $hrExecucao): self
    {
        $this->hrExecucao = $hrExecucao;
        return $this;
    }

    public function isSnExecutarImportacao(): ?bool
    {
        return $this->snExecutarImportacao;
    }

    public function setSnExecutarImportacao(?bool $snExecutarImportacao): self
    {
        $this->snExecutarImportacao = $snExecutarImportacao;
        return $this;
    }

    public function isSnEncerrarPeriodo(): ?bool
    {
        return $this->snEncerrarPeriodo;
    }

    public function setSnEncerrarPeriodo(?bool $snEncerrarPeriodo): self
    {
        $this->snEncerrarPeriodo = $snEncerrarPeriodo;
        return $this;
    }
}
