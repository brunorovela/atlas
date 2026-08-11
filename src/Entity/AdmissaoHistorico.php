<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AdmissaoHistoricoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissaoHistoricoRepository::class)]
#[ORM\Table(
    name: 'admissao_historico',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_ADMISSAO_CD_ADMISSAO_ADMISSAO_HISTORICO_CD_ADMISSAO', columns: ['CD_ADMISSAO'])]
#[ORM\Index(name: 'IX_CD_REGIME', columns: ['CD_REGIME'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ADMISSAO_CD_ADMISSAO_ADMISSAO_HISTORICO_CD_ADMISSAO', 'colunas' => ['CD_ADMISSAO'], 'tabelaAlvo' => 'admissao', 'colunasAlvo' => ['CD_ADMISSAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_FUNC_TIPOS_REGIMES_CD_REGIME_ADMISSAO_HISTORICO_CD_REGIME', 'colunas' => ['CD_REGIME'], 'tabelaAlvo' => 'funcionarios_tipos_regimes', 'colunasAlvo' => ['cd_regime'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AdmissaoHistorico
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ADMISSAO_HISTORICO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAdmissaoHistorico = null;

    #[ORM\ManyToOne(targetEntity: Admissao::class)]
    #[ORM\JoinColumn(name: 'CD_ADMISSAO', referencedColumnName: 'CD_ADMISSAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Admissao $cdAdmissao = null;

    #[ORM\ManyToOne(targetEntity: FuncionariosTiposRegimes::class)]
    #[ORM\JoinColumn(name: 'CD_REGIME', referencedColumnName: 'cd_regime', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?FuncionariosTiposRegimes $cdRegime = null;

    #[ORM\Column(name: 'DT_INICIO', type: 'date')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'DT_FIM', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'SN_SEQUENCIAL', type: 'boolean', options: ['default' => '0'])]
    private bool $snSequencial = false;

    #[ORM\Column(name: 'SN_GRADUACAO_PRESENCIAL', type: 'boolean', options: ['default' => '0'])]
    private bool $snGraduacaoPresencial = false;

    #[ORM\Column(name: 'SN_GRADUACAO_DISTANCIA', type: 'boolean', options: ['default' => '0'])]
    private bool $snGraduacaoDistancia = false;

    #[ORM\Column(name: 'SN_POS_PRESENCIAL', type: 'boolean', options: ['default' => '0'])]
    private bool $snPosPresencial = false;

    #[ORM\Column(name: 'SN_POS_DISTANCIA', type: 'boolean', options: ['default' => '0'])]
    private bool $snPosDistancia = false;

    #[ORM\Column(name: 'SN_PESQUISA', type: 'boolean', options: ['default' => '0'])]
    private bool $snPesquisa = false;

    #[ORM\Column(name: 'SN_EXTENSAO', type: 'boolean', options: ['default' => '0'])]
    private bool $snExtensao = false;

    #[ORM\Column(name: 'SN_GESTAO', type: 'boolean', options: ['default' => '0'])]
    private bool $snGestao = false;

    public function __construct(
        ?Admissao $cdAdmissao = null,
        ?FuncionariosTiposRegimes $cdRegime = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        bool $snSequencial = false,
        bool $snGraduacaoPresencial = false,
        bool $snGraduacaoDistancia = false,
        bool $snPosPresencial = false,
        bool $snPosDistancia = false,
        bool $snPesquisa = false,
        bool $snExtensao = false,
        bool $snGestao = false
    ) {
        $this->cdAdmissao = $cdAdmissao;
        $this->cdRegime = $cdRegime;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->snSequencial = $snSequencial;
        $this->snGraduacaoPresencial = $snGraduacaoPresencial;
        $this->snGraduacaoDistancia = $snGraduacaoDistancia;
        $this->snPosPresencial = $snPosPresencial;
        $this->snPosDistancia = $snPosDistancia;
        $this->snPesquisa = $snPesquisa;
        $this->snExtensao = $snExtensao;
        $this->snGestao = $snGestao;
    }

    public function getCdAdmissaoHistorico(): ?int
    {
        return $this->cdAdmissaoHistorico;
    }

    public function getCdAdmissao(): ?Admissao
    {
        return $this->cdAdmissao;
    }

    public function setCdAdmissao(?Admissao $cdAdmissao): self
    {
        $this->cdAdmissao = $cdAdmissao;
        return $this;
    }

    public function getCdRegime(): ?FuncionariosTiposRegimes
    {
        return $this->cdRegime;
    }

    public function setCdRegime(?FuncionariosTiposRegimes $cdRegime): self
    {
        $this->cdRegime = $cdRegime;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function isSnSequencial(): bool
    {
        return $this->snSequencial;
    }

    public function setSnSequencial(bool $snSequencial): self
    {
        $this->snSequencial = $snSequencial;
        return $this;
    }

    public function isSnGraduacaoPresencial(): bool
    {
        return $this->snGraduacaoPresencial;
    }

    public function setSnGraduacaoPresencial(bool $snGraduacaoPresencial): self
    {
        $this->snGraduacaoPresencial = $snGraduacaoPresencial;
        return $this;
    }

    public function isSnGraduacaoDistancia(): bool
    {
        return $this->snGraduacaoDistancia;
    }

    public function setSnGraduacaoDistancia(bool $snGraduacaoDistancia): self
    {
        $this->snGraduacaoDistancia = $snGraduacaoDistancia;
        return $this;
    }

    public function isSnPosPresencial(): bool
    {
        return $this->snPosPresencial;
    }

    public function setSnPosPresencial(bool $snPosPresencial): self
    {
        $this->snPosPresencial = $snPosPresencial;
        return $this;
    }

    public function isSnPosDistancia(): bool
    {
        return $this->snPosDistancia;
    }

    public function setSnPosDistancia(bool $snPosDistancia): self
    {
        $this->snPosDistancia = $snPosDistancia;
        return $this;
    }

    public function isSnPesquisa(): bool
    {
        return $this->snPesquisa;
    }

    public function setSnPesquisa(bool $snPesquisa): self
    {
        $this->snPesquisa = $snPesquisa;
        return $this;
    }

    public function isSnExtensao(): bool
    {
        return $this->snExtensao;
    }

    public function setSnExtensao(bool $snExtensao): self
    {
        $this->snExtensao = $snExtensao;
        return $this;
    }

    public function isSnGestao(): bool
    {
        return $this->snGestao;
    }

    public function setSnGestao(bool $snGestao): self
    {
        $this->snGestao = $snGestao;
        return $this;
    }
}
