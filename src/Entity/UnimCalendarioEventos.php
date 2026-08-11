<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimCalendarioEventosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimCalendarioEventosRepository::class)]
#[ORM\Table(
    name: 'unim_calendario_eventos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_cd_calendario', columns: ['cd_calendario', 'cd_evento'])]
#[ORM\Index(name: 'IX_DT_ALTERACAO', columns: ['dt_alteracao'])]
#[ORM\Index(name: 'IX_CD_CALENDARIO', columns: ['cd_calendario'])]
#[ORM\Index(name: 'FK_unim_calendario_eventos_unim_calendario_categorias', columns: ['cd_categoria'])]
#[ORM\Index(name: 'FK_unim_calendario_eventos_unim_calendario_eventos', columns: ['cd_evento_pai'])]
#[ORM\Index(name: 'FK_unim_calendario_eventos_unim_calendario_repeticao', columns: ['cd_tipo_repeticao'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[ORM\Index(name: 'IX_CD_MENU', columns: ['cd_menu'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_calendario_eventos_calendario', 'colunas' => ['cd_calendario'], 'tabelaAlvo' => 'calendario', 'colunasAlvo' => ['cd_calendario'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_calendario_eventos_unim_calendario_categorias', 'colunas' => ['cd_categoria'], 'tabelaAlvo' => 'unim_calendario_categorias', 'colunasAlvo' => ['cd_categoria'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_calendario_eventos_unim_calendario_eventos', 'colunas' => ['cd_evento_pai'], 'tabelaAlvo' => 'unim_calendario_eventos', 'colunasAlvo' => ['cd_evento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_calendario_eventos_unim_calendario_repeticao', 'colunas' => ['cd_tipo_repeticao'], 'tabelaAlvo' => 'unim_calendario_repeticao', 'colunasAlvo' => ['cd_tipo_repeticao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimCalendarioEventos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_evento', type: 'integer')]
    private ?int $cdEvento = null;

    #[ORM\ManyToOne(targetEntity: Calendario::class)]
    #[ORM\JoinColumn(name: 'cd_calendario', referencedColumnName: 'cd_calendario', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Calendario $cdCalendario = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'hr_inicio', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrInicio = null;

    #[ORM\Column(name: 'hr_fim', type: 'time', nullable: true)]
    private ?\DateTimeInterface $hrFim = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\ManyToOne(targetEntity: UnimCalendarioEventos::class)]
    #[ORM\JoinColumn(name: 'cd_evento_pai', referencedColumnName: 'cd_evento', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimCalendarioEventos $cdEventoPai = null;

    #[ORM\ManyToOne(targetEntity: UnimCalendarioCategorias::class)]
    #[ORM\JoinColumn(name: 'cd_categoria', referencedColumnName: 'cd_categoria', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimCalendarioCategorias $cdCategoria = null;

    #[ORM\ManyToOne(targetEntity: UnimCalendarioRepeticao::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_repeticao', referencedColumnName: 'cd_tipo_repeticao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimCalendarioRepeticao $cdTipoRepeticao = null;

    #[ORM\Column(name: 'cd_menu', type: 'integer', nullable: true)]
    private ?int $cdMenu = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'sn_restricao', type: TinyIntType::NAME, nullable: true)]
    private ?int $snRestricao = null;

    #[ORM\Column(name: 'sn_exibir_portal', type: TinyIntType::NAME, nullable: true)]
    private ?int $snExibirPortal = null;

    #[ORM\Column(name: 'cd_agrupador', type: 'integer', nullable: true)]
    private ?int $cdAgrupador = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Calendario $cdCalendario = null,
        ?string $dsDescricao = null,
        ?\DateTimeInterface $hrInicio = null,
        ?\DateTimeInterface $hrFim = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?UnimCalendarioEventos $cdEventoPai = null,
        ?UnimCalendarioCategorias $cdCategoria = null,
        ?UnimCalendarioRepeticao $cdTipoRepeticao = null,
        ?int $cdMenu = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?int $snRestricao = null,
        ?int $snExibirPortal = null,
        ?int $cdAgrupador = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdCalendario = $cdCalendario;
        $this->dsDescricao = $dsDescricao;
        $this->hrInicio = $hrInicio;
        $this->hrFim = $hrFim;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdEventoPai = $cdEventoPai;
        $this->cdCategoria = $cdCategoria;
        $this->cdTipoRepeticao = $cdTipoRepeticao;
        $this->cdMenu = $cdMenu;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->snRestricao = $snRestricao;
        $this->snExibirPortal = $snExibirPortal;
        $this->cdAgrupador = $cdAgrupador;
        $this->dtBase = $dtBase;
    }

    public function getCdEvento(): ?int
    {
        return $this->cdEvento;
    }

    public function getCdCalendario(): ?Calendario
    {
        return $this->cdCalendario;
    }

    public function setCdCalendario(?Calendario $cdCalendario): self
    {
        $this->cdCalendario = $cdCalendario;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function getCdEventoPai(): ?UnimCalendarioEventos
    {
        return $this->cdEventoPai;
    }

    public function setCdEventoPai(?UnimCalendarioEventos $cdEventoPai): self
    {
        $this->cdEventoPai = $cdEventoPai;
        return $this;
    }

    public function getCdCategoria(): ?UnimCalendarioCategorias
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?UnimCalendarioCategorias $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getCdTipoRepeticao(): ?UnimCalendarioRepeticao
    {
        return $this->cdTipoRepeticao;
    }

    public function setCdTipoRepeticao(?UnimCalendarioRepeticao $cdTipoRepeticao): self
    {
        $this->cdTipoRepeticao = $cdTipoRepeticao;
        return $this;
    }

    public function getCdMenu(): ?int
    {
        return $this->cdMenu;
    }

    public function setCdMenu(?int $cdMenu): self
    {
        $this->cdMenu = $cdMenu;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function getSnRestricao(): ?int
    {
        return $this->snRestricao;
    }

    public function setSnRestricao(?int $snRestricao): self
    {
        $this->snRestricao = $snRestricao;
        return $this;
    }

    public function getSnExibirPortal(): ?int
    {
        return $this->snExibirPortal;
    }

    public function setSnExibirPortal(?int $snExibirPortal): self
    {
        $this->snExibirPortal = $snExibirPortal;
        return $this;
    }

    public function getCdAgrupador(): ?int
    {
        return $this->cdAgrupador;
    }

    public function setCdAgrupador(?int $cdAgrupador): self
    {
        $this->cdAgrupador = $cdAgrupador;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
