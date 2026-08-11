<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TamInscricoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamInscricoesRepository::class)]
#[ORM\Table(
    name: 'tam_inscricoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_INSCRICOES', columns: ['CD_PESSOA', 'CD_EVENTO'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['CD_INSCRICAO'])]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['CD_EVENTO'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['CD_MENSALIDADE'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TAM_INSCRICOES_CD_GRUPO_NU_GRUPOS_CD_GRUPO', 'colunas' => ['CD_GRUPO'], 'tabelaAlvo' => 'nu_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'tam_inscricoes_ibfk_1', 'colunas' => ['CD_EVENTO'], 'tabelaAlvo' => 'tam_eventos', 'colunasAlvo' => ['CD_EVENTO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamInscricoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_INSCRICAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricao = null;

    #[ORM\ManyToOne(targetEntity: TamEventos::class)]
    #[ORM\JoinColumn(name: 'CD_EVENTO', referencedColumnName: 'CD_EVENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventos $cdEvento = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: NuGrupos::class)]
    #[ORM\JoinColumn(name: 'CD_GRUPO', referencedColumnName: 'cd_grupo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuGrupos $cdGrupo = null;

    #[ORM\Column(name: 'NM_PESSOA', type: 'string', length: 255, nullable: true)]
    private ?string $nmPessoa = null;

    #[ORM\Column(name: 'SN_INSCRICAO_EVENTO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snInscricaoEvento = null;

    #[ORM\Column(name: 'CD_MENSALIDADE', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'DT_INSCRICAO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInscricao = null;

    #[ORM\Column(name: 'SN_COMUNIDADE', type: 'boolean', nullable: true)]
    private ?bool $snComunidade = null;

    #[ORM\Column(name: 'SN_GERAR_INSCRICAO', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snGerarInscricao = 0;

    #[ORM\Column(name: 'NR_ORIGEM', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0', 'comment' => 'Origem da inscrição.
	0: Não identificado
	1: Administração do módulo
	2: Próprio usuário
	3: Terminal de acesso'])]
    private int $nrOrigem = 0;

    public function __construct(
        ?TamEventos $cdEvento = null,
        ?int $cdPessoa = null,
        ?NuGrupos $cdGrupo = null,
        ?string $nmPessoa = null,
        ?int $snInscricaoEvento = null,
        ?int $cdMensalidade = null,
        ?\DateTimeInterface $dtInscricao = null,
        ?bool $snComunidade = null,
        ?int $snGerarInscricao = 0,
        int $nrOrigem = 0
    ) {
        $this->cdEvento = $cdEvento;
        $this->cdPessoa = $cdPessoa;
        $this->cdGrupo = $cdGrupo;
        $this->nmPessoa = $nmPessoa;
        $this->snInscricaoEvento = $snInscricaoEvento;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtInscricao = $dtInscricao;
        $this->snComunidade = $snComunidade;
        $this->snGerarInscricao = $snGerarInscricao;
        $this->nrOrigem = $nrOrigem;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function getCdEvento(): ?TamEventos
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?TamEventos $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
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

    public function getCdGrupo(): ?NuGrupos
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?NuGrupos $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getNmPessoa(): ?string
    {
        return $this->nmPessoa;
    }

    public function setNmPessoa(?string $nmPessoa): self
    {
        $this->nmPessoa = $nmPessoa;
        return $this;
    }

    public function getSnInscricaoEvento(): ?int
    {
        return $this->snInscricaoEvento;
    }

    public function setSnInscricaoEvento(?int $snInscricaoEvento): self
    {
        $this->snInscricaoEvento = $snInscricaoEvento;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDtInscricao(): ?\DateTimeInterface
    {
        return $this->dtInscricao;
    }

    public function setDtInscricao(?\DateTimeInterface $dtInscricao): self
    {
        $this->dtInscricao = $dtInscricao;
        return $this;
    }

    public function isSnComunidade(): ?bool
    {
        return $this->snComunidade;
    }

    public function setSnComunidade(?bool $snComunidade): self
    {
        $this->snComunidade = $snComunidade;
        return $this;
    }

    public function getSnGerarInscricao(): ?int
    {
        return $this->snGerarInscricao;
    }

    public function setSnGerarInscricao(?int $snGerarInscricao): self
    {
        $this->snGerarInscricao = $snGerarInscricao;
        return $this;
    }

    public function getNrOrigem(): int
    {
        return $this->nrOrigem;
    }

    public function setNrOrigem(int $nrOrigem): self
    {
        $this->nrOrigem = $nrOrigem;
        return $this;
    }
}
