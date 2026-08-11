<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNegociaSimulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNegociaSimulaRepository::class)]
#[ORM\Table(
    name: 'fin_negocia_simula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PRIMEIRA_PARC', columns: ['cd_primeira_parc'])]
#[ORM\Index(name: 'IX_CD_TIPO_TITULO', columns: ['cd_tipo_titulo'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class FinNegociaSimula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_simulacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSimulacao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_simulacao', type: 'string', length: 100, nullable: true)]
    private ?string $dsSimulacao = null;

    #[ORM\Column(name: 'vl_bruto', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlBruto = null;

    #[ORM\Column(name: 'vl_juros', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlJuros = null;

    #[ORM\Column(name: 'vl_entrada', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlEntrada = null;

    #[ORM\Column(name: 'vl_creditos', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlCreditos = null;

    #[ORM\Column(name: 'dt_simulacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSimulacao = null;

    #[ORM\Column(name: 'dt_prazo', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrazo = null;

    #[ORM\Column(name: 'lst_mensa_origem', type: 'text', length: 65535, nullable: true)]
    private ?string $lstMensaOrigem = null;

    #[ORM\Column(name: 'nr_parcelas', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrParcelas = null;

    #[ORM\Column(name: 'dt_apartir_de', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtApartirDe = null;

    #[ORM\Column(name: 'sn_dt_entrada', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snDtEntrada = 0;

    #[ORM\Column(name: 'ds_taxa_juros', type: 'string', length: 50, nullable: true)]
    private ?string $dsTaxaJuros = null;

    #[ORM\Column(name: 'sn_taxa_simples', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snTaxaSimples = 0;

    #[ORM\Column(name: 'ds_turma_base', type: 'string', length: 50)]
    private ?string $dsTurmaBase = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'me_negocia', type: 'blob', nullable: true)]
    private ?string $meNegocia = null;

    #[ORM\Column(name: 'sn_corrige', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCorrige = 0;

    #[ORM\Column(name: 'cd_primeira_parc', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPrimeiraParc = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdSituacao = 0;

    #[ORM\Column(name: 'vl_entrada_parte2', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlEntradaParte2 = null;

    #[ORM\Column(name: 'nr_parcelas_parte2', type: 'integer', nullable: true)]
    private ?int $nrParcelasParte2 = null;

    #[ORM\Column(name: 'dt_apartir_de_parte2', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtApartirDeParte2 = null;

    #[ORM\Column(name: 'sn_dt_entrada_parte2', type: 'boolean', nullable: true)]
    private ?bool $snDtEntradaParte2 = null;

    #[ORM\Column(name: 'ds_taxa_juros_parte2', type: 'string', length: 50, nullable: true)]
    private ?string $dsTaxaJurosParte2 = null;

    #[ORM\Column(name: 'sn_taxa_simples_parte2', type: 'boolean', nullable: true)]
    private ?bool $snTaxaSimplesParte2 = null;

    #[ORM\Column(name: 'ds_turma_base_parte2', type: 'string', length: 50, nullable: true)]
    private ?string $dsTurmaBaseParte2 = null;

    #[ORM\Column(name: 'cd_tipo_titulo_parte2', type: 'integer', nullable: true)]
    private ?int $cdTipoTituloParte2 = null;

    #[ORM\Column(name: 'me_parcelas_geradas', type: 'blob', nullable: true)]
    private ?string $meParcelasGeradas = null;

    #[ORM\Column(name: 'dt_corrigir_valores', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCorrigirValores = null;

    #[ORM\Column(name: 'vl_total_parte1', type: 'float', options: ['default' => '0.00'])]
    private float $vlTotalParte1 = 0.0;

    #[ORM\Column(name: 'vl_total_parte2', type: 'float', options: ['default' => '0.00'])]
    private float $vlTotalParte2 = 0.0;

    #[ORM\Column(name: 'cd_responsavel_parte1', type: 'integer', nullable: true)]
    private ?int $cdResponsavelParte1 = null;

    #[ORM\Column(name: 'cd_responsavel_parte2', type: 'integer', nullable: true)]
    private ?int $cdResponsavelParte2 = null;

    // Sem construtor: 35 propriedades. Use os setters encadeados.

    public function getCdSimulacao(): ?int
    {
        return $this->cdSimulacao;
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

    public function getDsSimulacao(): ?string
    {
        return $this->dsSimulacao;
    }

    public function setDsSimulacao(?string $dsSimulacao): self
    {
        $this->dsSimulacao = $dsSimulacao;
        return $this;
    }

    public function getVlBruto(): ?float
    {
        return $this->vlBruto;
    }

    public function setVlBruto(?float $vlBruto): self
    {
        $this->vlBruto = $vlBruto;
        return $this;
    }

    public function getVlJuros(): ?float
    {
        return $this->vlJuros;
    }

    public function setVlJuros(?float $vlJuros): self
    {
        $this->vlJuros = $vlJuros;
        return $this;
    }

    public function getVlEntrada(): ?float
    {
        return $this->vlEntrada;
    }

    public function setVlEntrada(?float $vlEntrada): self
    {
        $this->vlEntrada = $vlEntrada;
        return $this;
    }

    public function getVlCreditos(): ?float
    {
        return $this->vlCreditos;
    }

    public function setVlCreditos(?float $vlCreditos): self
    {
        $this->vlCreditos = $vlCreditos;
        return $this;
    }

    public function getDtSimulacao(): ?\DateTimeInterface
    {
        return $this->dtSimulacao;
    }

    public function setDtSimulacao(?\DateTimeInterface $dtSimulacao): self
    {
        $this->dtSimulacao = $dtSimulacao;
        return $this;
    }

    public function getDtPrazo(): ?\DateTimeInterface
    {
        return $this->dtPrazo;
    }

    public function setDtPrazo(?\DateTimeInterface $dtPrazo): self
    {
        $this->dtPrazo = $dtPrazo;
        return $this;
    }

    public function getLstMensaOrigem(): ?string
    {
        return $this->lstMensaOrigem;
    }

    public function setLstMensaOrigem(?string $lstMensaOrigem): self
    {
        $this->lstMensaOrigem = $lstMensaOrigem;
        return $this;
    }

    public function getNrParcelas(): ?int
    {
        return $this->nrParcelas;
    }

    public function setNrParcelas(?int $nrParcelas): self
    {
        $this->nrParcelas = $nrParcelas;
        return $this;
    }

    public function getDtApartirDe(): ?\DateTimeInterface
    {
        return $this->dtApartirDe;
    }

    public function setDtApartirDe(?\DateTimeInterface $dtApartirDe): self
    {
        $this->dtApartirDe = $dtApartirDe;
        return $this;
    }

    public function getSnDtEntrada(): ?int
    {
        return $this->snDtEntrada;
    }

    public function setSnDtEntrada(?int $snDtEntrada): self
    {
        $this->snDtEntrada = $snDtEntrada;
        return $this;
    }

    public function getDsTaxaJuros(): ?string
    {
        return $this->dsTaxaJuros;
    }

    public function setDsTaxaJuros(?string $dsTaxaJuros): self
    {
        $this->dsTaxaJuros = $dsTaxaJuros;
        return $this;
    }

    public function getSnTaxaSimples(): ?int
    {
        return $this->snTaxaSimples;
    }

    public function setSnTaxaSimples(?int $snTaxaSimples): self
    {
        $this->snTaxaSimples = $snTaxaSimples;
        return $this;
    }

    public function getDsTurmaBase(): ?string
    {
        return $this->dsTurmaBase;
    }

    public function setDsTurmaBase(?string $dsTurmaBase): self
    {
        $this->dsTurmaBase = $dsTurmaBase;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getMeNegocia(): ?string
    {
        return $this->meNegocia;
    }

    public function setMeNegocia(?string $meNegocia): self
    {
        $this->meNegocia = $meNegocia;
        return $this;
    }

    public function getSnCorrige(): ?int
    {
        return $this->snCorrige;
    }

    public function setSnCorrige(?int $snCorrige): self
    {
        $this->snCorrige = $snCorrige;
        return $this;
    }

    public function getCdPrimeiraParc(): ?int
    {
        return $this->cdPrimeiraParc;
    }

    public function setCdPrimeiraParc(?int $cdPrimeiraParc): self
    {
        $this->cdPrimeiraParc = $cdPrimeiraParc;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getVlEntradaParte2(): ?float
    {
        return $this->vlEntradaParte2;
    }

    public function setVlEntradaParte2(?float $vlEntradaParte2): self
    {
        $this->vlEntradaParte2 = $vlEntradaParte2;
        return $this;
    }

    public function getNrParcelasParte2(): ?int
    {
        return $this->nrParcelasParte2;
    }

    public function setNrParcelasParte2(?int $nrParcelasParte2): self
    {
        $this->nrParcelasParte2 = $nrParcelasParte2;
        return $this;
    }

    public function getDtApartirDeParte2(): ?\DateTimeInterface
    {
        return $this->dtApartirDeParte2;
    }

    public function setDtApartirDeParte2(?\DateTimeInterface $dtApartirDeParte2): self
    {
        $this->dtApartirDeParte2 = $dtApartirDeParte2;
        return $this;
    }

    public function isSnDtEntradaParte2(): ?bool
    {
        return $this->snDtEntradaParte2;
    }

    public function setSnDtEntradaParte2(?bool $snDtEntradaParte2): self
    {
        $this->snDtEntradaParte2 = $snDtEntradaParte2;
        return $this;
    }

    public function getDsTaxaJurosParte2(): ?string
    {
        return $this->dsTaxaJurosParte2;
    }

    public function setDsTaxaJurosParte2(?string $dsTaxaJurosParte2): self
    {
        $this->dsTaxaJurosParte2 = $dsTaxaJurosParte2;
        return $this;
    }

    public function isSnTaxaSimplesParte2(): ?bool
    {
        return $this->snTaxaSimplesParte2;
    }

    public function setSnTaxaSimplesParte2(?bool $snTaxaSimplesParte2): self
    {
        $this->snTaxaSimplesParte2 = $snTaxaSimplesParte2;
        return $this;
    }

    public function getDsTurmaBaseParte2(): ?string
    {
        return $this->dsTurmaBaseParte2;
    }

    public function setDsTurmaBaseParte2(?string $dsTurmaBaseParte2): self
    {
        $this->dsTurmaBaseParte2 = $dsTurmaBaseParte2;
        return $this;
    }

    public function getCdTipoTituloParte2(): ?int
    {
        return $this->cdTipoTituloParte2;
    }

    public function setCdTipoTituloParte2(?int $cdTipoTituloParte2): self
    {
        $this->cdTipoTituloParte2 = $cdTipoTituloParte2;
        return $this;
    }

    public function getMeParcelasGeradas(): ?string
    {
        return $this->meParcelasGeradas;
    }

    public function setMeParcelasGeradas(?string $meParcelasGeradas): self
    {
        $this->meParcelasGeradas = $meParcelasGeradas;
        return $this;
    }

    public function getDtCorrigirValores(): ?\DateTimeInterface
    {
        return $this->dtCorrigirValores;
    }

    public function setDtCorrigirValores(?\DateTimeInterface $dtCorrigirValores): self
    {
        $this->dtCorrigirValores = $dtCorrigirValores;
        return $this;
    }

    public function getVlTotalParte1(): float
    {
        return $this->vlTotalParte1;
    }

    public function setVlTotalParte1(float $vlTotalParte1): self
    {
        $this->vlTotalParte1 = $vlTotalParte1;
        return $this;
    }

    public function getVlTotalParte2(): float
    {
        return $this->vlTotalParte2;
    }

    public function setVlTotalParte2(float $vlTotalParte2): self
    {
        $this->vlTotalParte2 = $vlTotalParte2;
        return $this;
    }

    public function getCdResponsavelParte1(): ?int
    {
        return $this->cdResponsavelParte1;
    }

    public function setCdResponsavelParte1(?int $cdResponsavelParte1): self
    {
        $this->cdResponsavelParte1 = $cdResponsavelParte1;
        return $this;
    }

    public function getCdResponsavelParte2(): ?int
    {
        return $this->cdResponsavelParte2;
    }

    public function setCdResponsavelParte2(?int $cdResponsavelParte2): self
    {
        $this->cdResponsavelParte2 = $cdResponsavelParte2;
        return $this;
    }
}
