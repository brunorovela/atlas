<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfseRetencoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseRetencoesRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_retencoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinNfseRetencoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_chave_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdChavePessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_chave_competencia', type: 'string', length: 30, options: ['default' => ''])]
    private string $cdChaveCompetencia = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_chave_grupo_boleto', type: 'string', length: 30, options: ['default' => ''])]
    private string $cdChaveGrupoBoleto = '';

    #[ORM\Column(name: 'aliquota_ir_especial', type: 'float', nullable: true)]
    private ?float $aliquotaIrEspecial = null;

    #[ORM\Column(name: 'cd_chave_vencimento', type: 'string', length: 8, options: ['default' => ''])]
    private string $cdChaveVencimento = '';

    #[ORM\Column(name: 'razaosocial_tomador', type: 'string', length: 100, nullable: true)]
    private ?string $razaosocialTomador = null;

    #[ORM\Column(name: 'cpf_cnpj_tomador', type: 'string', length: 15, nullable: true)]
    private ?string $cpfCnpjTomador = null;

    #[ORM\Column(name: 'optante_simples', type: 'string', length: 5, nullable: true)]
    private ?string $optanteSimples = null;

    #[ORM\Column(name: 'valorservicos', type: 'float', nullable: true)]
    private ?float $valorservicos = null;

    #[ORM\Column(name: 'valorservicos_parc1', type: 'float', nullable: true)]
    private ?float $valorservicosParc1 = null;

    #[ORM\Column(name: 'tipopessoa', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'F'])]
    private ?string $tipopessoa = 'F';

    #[ORM\Column(name: 'cd_mensa_atualizar', type: 'text', length: 65535, nullable: true)]
    private ?string $cdMensaAtualizar = null;

    #[ORM\Column(name: 'valor_pis_nota', type: 'float', nullable: true)]
    private ?float $valorPisNota = null;

    #[ORM\Column(name: 'aliquota_pis_nota', type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?string $aliquotaPisNota = null;

    #[ORM\Column(name: 'valor_cofins_nota', type: 'float', nullable: true)]
    private ?float $valorCofinsNota = null;

    #[ORM\Column(name: 'aliquota_cofins_nota', type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?string $aliquotaCofinsNota = null;

    #[ORM\Column(name: 'valor_csll_nota', type: 'float', nullable: true)]
    private ?float $valorCsllNota = null;

    #[ORM\Column(name: 'aliquota_csll_nota', type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?string $aliquotaCsllNota = null;

    #[ORM\Column(name: 'valor_ir_nota', type: 'float', nullable: true)]
    private ?float $valorIrNota = null;

    #[ORM\Column(name: 'aliquota_ir_nota', type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?string $aliquotaIrNota = null;

    #[ORM\Column(name: 'total_retencoes', type: 'decimal', precision: 15, scale: 2, options: ['default' => '0.00'])]
    private string $totalRetencoes = '0.00';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 22 propriedades. Use os setters encadeados.

    public function getCdChavePessoa(): int
    {
        return $this->cdChavePessoa;
    }

    public function setCdChavePessoa(int $cdChavePessoa): self
    {
        $this->cdChavePessoa = $cdChavePessoa;
        return $this;
    }

    public function getCdChaveCompetencia(): string
    {
        return $this->cdChaveCompetencia;
    }

    public function setCdChaveCompetencia(string $cdChaveCompetencia): self
    {
        $this->cdChaveCompetencia = $cdChaveCompetencia;
        return $this;
    }

    public function getCdChaveGrupoBoleto(): string
    {
        return $this->cdChaveGrupoBoleto;
    }

    public function setCdChaveGrupoBoleto(string $cdChaveGrupoBoleto): self
    {
        $this->cdChaveGrupoBoleto = $cdChaveGrupoBoleto;
        return $this;
    }

    public function getAliquotaIrEspecial(): ?float
    {
        return $this->aliquotaIrEspecial;
    }

    public function setAliquotaIrEspecial(?float $aliquotaIrEspecial): self
    {
        $this->aliquotaIrEspecial = $aliquotaIrEspecial;
        return $this;
    }

    public function getCdChaveVencimento(): string
    {
        return $this->cdChaveVencimento;
    }

    public function setCdChaveVencimento(string $cdChaveVencimento): self
    {
        $this->cdChaveVencimento = $cdChaveVencimento;
        return $this;
    }

    public function getRazaosocialTomador(): ?string
    {
        return $this->razaosocialTomador;
    }

    public function setRazaosocialTomador(?string $razaosocialTomador): self
    {
        $this->razaosocialTomador = $razaosocialTomador;
        return $this;
    }

    public function getCpfCnpjTomador(): ?string
    {
        return $this->cpfCnpjTomador;
    }

    public function setCpfCnpjTomador(?string $cpfCnpjTomador): self
    {
        $this->cpfCnpjTomador = $cpfCnpjTomador;
        return $this;
    }

    public function getOptanteSimples(): ?string
    {
        return $this->optanteSimples;
    }

    public function setOptanteSimples(?string $optanteSimples): self
    {
        $this->optanteSimples = $optanteSimples;
        return $this;
    }

    public function getValorservicos(): ?float
    {
        return $this->valorservicos;
    }

    public function setValorservicos(?float $valorservicos): self
    {
        $this->valorservicos = $valorservicos;
        return $this;
    }

    public function getValorservicosParc1(): ?float
    {
        return $this->valorservicosParc1;
    }

    public function setValorservicosParc1(?float $valorservicosParc1): self
    {
        $this->valorservicosParc1 = $valorservicosParc1;
        return $this;
    }

    public function getTipopessoa(): ?string
    {
        return $this->tipopessoa;
    }

    public function setTipopessoa(?string $tipopessoa): self
    {
        $this->tipopessoa = $tipopessoa;
        return $this;
    }

    public function getCdMensaAtualizar(): ?string
    {
        return $this->cdMensaAtualizar;
    }

    public function setCdMensaAtualizar(?string $cdMensaAtualizar): self
    {
        $this->cdMensaAtualizar = $cdMensaAtualizar;
        return $this;
    }

    public function getValorPisNota(): ?float
    {
        return $this->valorPisNota;
    }

    public function setValorPisNota(?float $valorPisNota): self
    {
        $this->valorPisNota = $valorPisNota;
        return $this;
    }

    public function getAliquotaPisNota(): ?string
    {
        return $this->aliquotaPisNota;
    }

    public function setAliquotaPisNota(?string $aliquotaPisNota): self
    {
        $this->aliquotaPisNota = $aliquotaPisNota;
        return $this;
    }

    public function getValorCofinsNota(): ?float
    {
        return $this->valorCofinsNota;
    }

    public function setValorCofinsNota(?float $valorCofinsNota): self
    {
        $this->valorCofinsNota = $valorCofinsNota;
        return $this;
    }

    public function getAliquotaCofinsNota(): ?string
    {
        return $this->aliquotaCofinsNota;
    }

    public function setAliquotaCofinsNota(?string $aliquotaCofinsNota): self
    {
        $this->aliquotaCofinsNota = $aliquotaCofinsNota;
        return $this;
    }

    public function getValorCsllNota(): ?float
    {
        return $this->valorCsllNota;
    }

    public function setValorCsllNota(?float $valorCsllNota): self
    {
        $this->valorCsllNota = $valorCsllNota;
        return $this;
    }

    public function getAliquotaCsllNota(): ?string
    {
        return $this->aliquotaCsllNota;
    }

    public function setAliquotaCsllNota(?string $aliquotaCsllNota): self
    {
        $this->aliquotaCsllNota = $aliquotaCsllNota;
        return $this;
    }

    public function getValorIrNota(): ?float
    {
        return $this->valorIrNota;
    }

    public function setValorIrNota(?float $valorIrNota): self
    {
        $this->valorIrNota = $valorIrNota;
        return $this;
    }

    public function getAliquotaIrNota(): ?string
    {
        return $this->aliquotaIrNota;
    }

    public function setAliquotaIrNota(?string $aliquotaIrNota): self
    {
        $this->aliquotaIrNota = $aliquotaIrNota;
        return $this;
    }

    public function getTotalRetencoes(): string
    {
        return $this->totalRetencoes;
    }

    public function setTotalRetencoes(string $totalRetencoes): self
    {
        $this->totalRetencoes = $totalRetencoes;
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
