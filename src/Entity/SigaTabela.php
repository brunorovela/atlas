<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\SigaTabelaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigaTabelaRepository::class)]
#[ORM\Table(
    name: 'siga_tabela',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_SIGA_PAI', columns: ['cd_siga_pai'])]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_LOCAL', columns: ['cd_local'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'siga_tabela_ibfk_1', 'colunas' => ['cd_siga_pai'], 'tabelaAlvo' => 'siga_tabela', 'colunasAlvo' => ['cd_siga'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_tabela_ibfk_2', 'colunas' => ['cd_tipo'], 'tabelaAlvo' => 'siga_tipo_tabela', 'colunasAlvo' => ['cd_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_tabela_ibfk_3', 'colunas' => ['cd_local'], 'tabelaAlvo' => 'siga_locais', 'colunasAlvo' => ['cd_local'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SigaTabela
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_siga', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSiga = null;

    #[ORM\ManyToOne(targetEntity: SigaTabela::class)]
    #[ORM\JoinColumn(name: 'cd_siga_pai', referencedColumnName: 'cd_siga', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaTabela $cdSigaPai = null;

    #[ORM\ManyToOne(targetEntity: SigaTipoTabela::class)]
    #[ORM\JoinColumn(name: 'cd_tipo', referencedColumnName: 'cd_tipo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaTipoTabela $cdTipo = null;

    #[ORM\ManyToOne(targetEntity: SigaLocais::class)]
    #[ORM\JoinColumn(name: 'cd_local', referencedColumnName: 'cd_local', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaLocais $cdLocal = null;

    #[ORM\Column(name: 'ds_codigo_siga', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodigoSiga = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'ds_fase_corrente', type: 'string', length: 255, nullable: true)]
    private ?string $dsFaseCorrente = null;

    #[ORM\Column(name: 'ds_fase_intermediaria', type: 'string', length: 255, nullable: true)]
    private ?string $dsFaseIntermediaria = null;

    #[ORM\Column(name: 'ds_fase_final', type: 'string', length: 255, nullable: true)]
    private ?string $dsFaseFinal = null;

    #[ORM\Column(name: 'ds_destinacao_final', type: 'string', length: 255, nullable: true)]
    private ?string $dsDestinacaoFinal = null;

    #[ORM\Column(name: 'me_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'sn_mec', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMec = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?SigaTabela $cdSigaPai = null,
        ?SigaTipoTabela $cdTipo = null,
        ?SigaLocais $cdLocal = null,
        ?string $dsCodigoSiga = null,
        ?string $dsAssunto = null,
        ?string $dsFaseCorrente = null,
        ?string $dsFaseIntermediaria = null,
        ?string $dsFaseFinal = null,
        ?string $dsDestinacaoFinal = null,
        ?string $meObservacao = null,
        ?int $snMec = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSigaPai = $cdSigaPai;
        $this->cdTipo = $cdTipo;
        $this->cdLocal = $cdLocal;
        $this->dsCodigoSiga = $dsCodigoSiga;
        $this->dsAssunto = $dsAssunto;
        $this->dsFaseCorrente = $dsFaseCorrente;
        $this->dsFaseIntermediaria = $dsFaseIntermediaria;
        $this->dsFaseFinal = $dsFaseFinal;
        $this->dsDestinacaoFinal = $dsDestinacaoFinal;
        $this->meObservacao = $meObservacao;
        $this->snMec = $snMec;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdSiga(): ?int
    {
        return $this->cdSiga;
    }

    public function getCdSigaPai(): ?SigaTabela
    {
        return $this->cdSigaPai;
    }

    public function setCdSigaPai(?SigaTabela $cdSigaPai): self
    {
        $this->cdSigaPai = $cdSigaPai;
        return $this;
    }

    public function getCdTipo(): ?SigaTipoTabela
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?SigaTipoTabela $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdLocal(): ?SigaLocais
    {
        return $this->cdLocal;
    }

    public function setCdLocal(?SigaLocais $cdLocal): self
    {
        $this->cdLocal = $cdLocal;
        return $this;
    }

    public function getDsCodigoSiga(): ?string
    {
        return $this->dsCodigoSiga;
    }

    public function setDsCodigoSiga(?string $dsCodigoSiga): self
    {
        $this->dsCodigoSiga = $dsCodigoSiga;
        return $this;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getDsFaseCorrente(): ?string
    {
        return $this->dsFaseCorrente;
    }

    public function setDsFaseCorrente(?string $dsFaseCorrente): self
    {
        $this->dsFaseCorrente = $dsFaseCorrente;
        return $this;
    }

    public function getDsFaseIntermediaria(): ?string
    {
        return $this->dsFaseIntermediaria;
    }

    public function setDsFaseIntermediaria(?string $dsFaseIntermediaria): self
    {
        $this->dsFaseIntermediaria = $dsFaseIntermediaria;
        return $this;
    }

    public function getDsFaseFinal(): ?string
    {
        return $this->dsFaseFinal;
    }

    public function setDsFaseFinal(?string $dsFaseFinal): self
    {
        $this->dsFaseFinal = $dsFaseFinal;
        return $this;
    }

    public function getDsDestinacaoFinal(): ?string
    {
        return $this->dsDestinacaoFinal;
    }

    public function setDsDestinacaoFinal(?string $dsDestinacaoFinal): self
    {
        $this->dsDestinacaoFinal = $dsDestinacaoFinal;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getSnMec(): ?int
    {
        return $this->snMec;
    }

    public function setSnMec(?int $snMec): self
    {
        $this->snMec = $snMec;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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
