<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CapJornadaEtapaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_cap_jornada_etapa_cd_jornada_id', columns: ['cd_jornada_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_etapa_cd_jornada_id', 'colunas' => ['cd_jornada_id'], 'tabelaAlvo' => 'cap_jornada', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornada::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornada $cdJornadaId = null;

    #[ORM\Column(name: 'enum_tipo_etapa', type: 'enum', nullable: true, options: ['values' => ['pre_cadastro', 'fluxo', 'finalizacao']])]
    private ?string $enumTipoEtapa = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_botao_voltar', type: 'string', length: 255)]
    private ?string $dsBotaoVoltar = null;

    #[ORM\Column(name: 'ds_botao_avancar', type: 'string', length: 255)]
    private ?string $dsBotaoAvancar = null;

    #[ORM\Column(name: 'ds_icone', type: 'string', length: 50, nullable: true)]
    private ?string $dsIcone = null;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrOrdem = 1;

    #[ORM\Column(name: 'sn_efetiva_matricula', type: 'boolean', options: ['default' => '0'])]
    private bool $snEfetivaMatricula = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornada $cdJornadaId = null,
        ?string $enumTipoEtapa = null,
        ?string $dsTitulo = null,
        ?string $dsBotaoVoltar = null,
        ?string $dsBotaoAvancar = null,
        ?string $dsIcone = null,
        int $nrOrdem = 1,
        bool $snEfetivaMatricula = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaId = $cdJornadaId;
        $this->enumTipoEtapa = $enumTipoEtapa;
        $this->dsTitulo = $dsTitulo;
        $this->dsBotaoVoltar = $dsBotaoVoltar;
        $this->dsBotaoAvancar = $dsBotaoAvancar;
        $this->dsIcone = $dsIcone;
        $this->nrOrdem = $nrOrdem;
        $this->snEfetivaMatricula = $snEfetivaMatricula;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaId(): ?CapJornada
    {
        return $this->cdJornadaId;
    }

    public function setCdJornadaId(?CapJornada $cdJornadaId): self
    {
        $this->cdJornadaId = $cdJornadaId;
        return $this;
    }

    public function getEnumTipoEtapa(): ?string
    {
        return $this->enumTipoEtapa;
    }

    public function setEnumTipoEtapa(?string $enumTipoEtapa): self
    {
        $this->enumTipoEtapa = $enumTipoEtapa;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsBotaoVoltar(): ?string
    {
        return $this->dsBotaoVoltar;
    }

    public function setDsBotaoVoltar(?string $dsBotaoVoltar): self
    {
        $this->dsBotaoVoltar = $dsBotaoVoltar;
        return $this;
    }

    public function getDsBotaoAvancar(): ?string
    {
        return $this->dsBotaoAvancar;
    }

    public function setDsBotaoAvancar(?string $dsBotaoAvancar): self
    {
        $this->dsBotaoAvancar = $dsBotaoAvancar;
        return $this;
    }

    public function getDsIcone(): ?string
    {
        return $this->dsIcone;
    }

    public function setDsIcone(?string $dsIcone): self
    {
        $this->dsIcone = $dsIcone;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnEfetivaMatricula(): bool
    {
        return $this->snEfetivaMatricula;
    }

    public function setSnEfetivaMatricula(bool $snEfetivaMatricula): self
    {
        $this->snEfetivaMatricula = $snEfetivaMatricula;
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
