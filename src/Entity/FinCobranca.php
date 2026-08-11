<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinCobrancaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCobrancaRepository::class)]
#[ORM\Table(
    name: 'fin_cobranca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxPessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class FinCobranca
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cobranca', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCobranca = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'sn_spc', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snSpc = 0;

    #[ORM\Column(name: 'dt_spc_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSpcInclusao = null;

    #[ORM\Column(name: 'dt_spc_retirada', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSpcRetirada = null;

    #[ORM\Column(name: 'sn_juridico', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snJuridico = 0;

    #[ORM\Column(name: 'dt_juridico_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtJuridicoInclusao = null;

    #[ORM\Column(name: 'dt_juridico_retirada', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtJuridicoRetirada = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'dt_retorno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRetorno = null;

    #[ORM\Column(name: 'SN_SERASA', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snSerasa = 0;

    #[ORM\Column(name: 'dt_serasa_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSerasaInclusao = null;

    #[ORM\Column(name: 'dt_serasa_retirada', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSerasaRetirada = null;

    #[ORM\Column(name: 'sn_cartorio', type: 'boolean', nullable: true)]
    private ?bool $snCartorio = null;

    #[ORM\Column(name: 'dt_cartorio_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCartorioInclusao = null;

    #[ORM\Column(name: 'dt_cartorio_retirada', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCartorioRetirada = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?int $cdSituacao = null,
        ?int $snSpc = 0,
        ?\DateTimeInterface $dtSpcInclusao = null,
        ?\DateTimeInterface $dtSpcRetirada = null,
        ?int $snJuridico = 0,
        ?\DateTimeInterface $dtJuridicoInclusao = null,
        ?\DateTimeInterface $dtJuridicoRetirada = null,
        ?int $cdResponsavel = null,
        ?\DateTimeInterface $dtRetorno = null,
        ?int $snSerasa = 0,
        ?\DateTimeInterface $dtSerasaInclusao = null,
        ?\DateTimeInterface $dtSerasaRetirada = null,
        ?bool $snCartorio = null,
        ?\DateTimeInterface $dtCartorioInclusao = null,
        ?\DateTimeInterface $dtCartorioRetirada = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtRegistro = $dtRegistro;
        $this->cdSituacao = $cdSituacao;
        $this->snSpc = $snSpc;
        $this->dtSpcInclusao = $dtSpcInclusao;
        $this->dtSpcRetirada = $dtSpcRetirada;
        $this->snJuridico = $snJuridico;
        $this->dtJuridicoInclusao = $dtJuridicoInclusao;
        $this->dtJuridicoRetirada = $dtJuridicoRetirada;
        $this->cdResponsavel = $cdResponsavel;
        $this->dtRetorno = $dtRetorno;
        $this->snSerasa = $snSerasa;
        $this->dtSerasaInclusao = $dtSerasaInclusao;
        $this->dtSerasaRetirada = $dtSerasaRetirada;
        $this->snCartorio = $snCartorio;
        $this->dtCartorioInclusao = $dtCartorioInclusao;
        $this->dtCartorioRetirada = $dtCartorioRetirada;
    }

    public function getCdCobranca(): ?int
    {
        return $this->cdCobranca;
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

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
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

    public function getSnSpc(): ?int
    {
        return $this->snSpc;
    }

    public function setSnSpc(?int $snSpc): self
    {
        $this->snSpc = $snSpc;
        return $this;
    }

    public function getDtSpcInclusao(): ?\DateTimeInterface
    {
        return $this->dtSpcInclusao;
    }

    public function setDtSpcInclusao(?\DateTimeInterface $dtSpcInclusao): self
    {
        $this->dtSpcInclusao = $dtSpcInclusao;
        return $this;
    }

    public function getDtSpcRetirada(): ?\DateTimeInterface
    {
        return $this->dtSpcRetirada;
    }

    public function setDtSpcRetirada(?\DateTimeInterface $dtSpcRetirada): self
    {
        $this->dtSpcRetirada = $dtSpcRetirada;
        return $this;
    }

    public function getSnJuridico(): ?int
    {
        return $this->snJuridico;
    }

    public function setSnJuridico(?int $snJuridico): self
    {
        $this->snJuridico = $snJuridico;
        return $this;
    }

    public function getDtJuridicoInclusao(): ?\DateTimeInterface
    {
        return $this->dtJuridicoInclusao;
    }

    public function setDtJuridicoInclusao(?\DateTimeInterface $dtJuridicoInclusao): self
    {
        $this->dtJuridicoInclusao = $dtJuridicoInclusao;
        return $this;
    }

    public function getDtJuridicoRetirada(): ?\DateTimeInterface
    {
        return $this->dtJuridicoRetirada;
    }

    public function setDtJuridicoRetirada(?\DateTimeInterface $dtJuridicoRetirada): self
    {
        $this->dtJuridicoRetirada = $dtJuridicoRetirada;
        return $this;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getDtRetorno(): ?\DateTimeInterface
    {
        return $this->dtRetorno;
    }

    public function setDtRetorno(?\DateTimeInterface $dtRetorno): self
    {
        $this->dtRetorno = $dtRetorno;
        return $this;
    }

    public function getSnSerasa(): ?int
    {
        return $this->snSerasa;
    }

    public function setSnSerasa(?int $snSerasa): self
    {
        $this->snSerasa = $snSerasa;
        return $this;
    }

    public function getDtSerasaInclusao(): ?\DateTimeInterface
    {
        return $this->dtSerasaInclusao;
    }

    public function setDtSerasaInclusao(?\DateTimeInterface $dtSerasaInclusao): self
    {
        $this->dtSerasaInclusao = $dtSerasaInclusao;
        return $this;
    }

    public function getDtSerasaRetirada(): ?\DateTimeInterface
    {
        return $this->dtSerasaRetirada;
    }

    public function setDtSerasaRetirada(?\DateTimeInterface $dtSerasaRetirada): self
    {
        $this->dtSerasaRetirada = $dtSerasaRetirada;
        return $this;
    }

    public function isSnCartorio(): ?bool
    {
        return $this->snCartorio;
    }

    public function setSnCartorio(?bool $snCartorio): self
    {
        $this->snCartorio = $snCartorio;
        return $this;
    }

    public function getDtCartorioInclusao(): ?\DateTimeInterface
    {
        return $this->dtCartorioInclusao;
    }

    public function setDtCartorioInclusao(?\DateTimeInterface $dtCartorioInclusao): self
    {
        $this->dtCartorioInclusao = $dtCartorioInclusao;
        return $this;
    }

    public function getDtCartorioRetirada(): ?\DateTimeInterface
    {
        return $this->dtCartorioRetirada;
    }

    public function setDtCartorioRetirada(?\DateTimeInterface $dtCartorioRetirada): self
    {
        $this->dtCartorioRetirada = $dtCartorioRetirada;
        return $this;
    }
}
