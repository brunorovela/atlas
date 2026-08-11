<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ResHorariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResHorariosRepository::class)]
#[ORM\Table(
    name: 'res_horarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_horario', columns: ['cd_horario'])]
#[ORM\Index(name: 'cd_categoria', columns: ['cd_categoria'])]
#[ORM\Index(name: 'IX_CD_CATEGORIA', columns: ['cd_categoria'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'res_horarios_categoria_fk', 'colunas' => ['cd_categoria'], 'tabelaAlvo' => 'res_horarios_categorias', 'colunasAlvo' => ['cd_categoria'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ResHorarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_horario', type: 'integer')]
    private ?int $cdHorario = null;

    #[ORM\ManyToOne(targetEntity: ResHorariosCategorias::class)]
    #[ORM\JoinColumn(name: 'cd_categoria', referencedColumnName: 'cd_categoria', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ResHorariosCategorias $cdCategoria = null;

    #[ORM\Column(name: 'hr_inicio', type: 'time')]
    private ?\DateTimeInterface $hrInicio = null;

    #[ORM\Column(name: 'hr_fim', type: 'time')]
    private ?\DateTimeInterface $hrFim = null;

    #[ORM\Column(name: 'nr_dias_antes', type: 'integer', options: ['default' => '0'])]
    private int $nrDiasAntes = 0;

    #[ORM\Column(name: 'hr_hora', type: 'time', options: ['default' => '00:00:00'])]
    private ?\DateTimeInterface $hrHora = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?ResHorariosCategorias $cdCategoria = null,
        ?\DateTimeInterface $hrInicio = null,
        ?\DateTimeInterface $hrFim = null,
        int $nrDiasAntes = 0,
        ?\DateTimeInterface $hrHora = null,
        bool $snAtivo = true,
        bool $snExcluido = false
    ) {
        $this->cdCategoria = $cdCategoria;
        $this->hrInicio = $hrInicio;
        $this->hrFim = $hrFim;
        $this->nrDiasAntes = $nrDiasAntes;
        $this->hrHora = $hrHora;
        $this->snAtivo = $snAtivo;
        $this->snExcluido = $snExcluido;
    }

    public function getCdHorario(): ?int
    {
        return $this->cdHorario;
    }

    public function getCdCategoria(): ?ResHorariosCategorias
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?ResHorariosCategorias $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getHrInicio(): ?\DateTimeInterface
    {
        return $this->hrInicio;
    }

    public function setHrInicio(?\DateTimeInterface $hrInicio): self
    {
        $this->hrInicio = $hrInicio;
        return $this;
    }

    public function getHrFim(): ?\DateTimeInterface
    {
        return $this->hrFim;
    }

    public function setHrFim(?\DateTimeInterface $hrFim): self
    {
        $this->hrFim = $hrFim;
        return $this;
    }

    public function getNrDiasAntes(): int
    {
        return $this->nrDiasAntes;
    }

    public function setNrDiasAntes(int $nrDiasAntes): self
    {
        $this->nrDiasAntes = $nrDiasAntes;
        return $this;
    }

    public function getHrHora(): ?\DateTimeInterface
    {
        return $this->hrHora;
    }

    public function setHrHora(?\DateTimeInterface $hrHora): self
    {
        $this->hrHora = $hrHora;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
