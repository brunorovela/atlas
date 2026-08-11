<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RetornoCpItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetornoCpItensRepository::class)]
#[ORM\Table(
    name: 'retorno_cp_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RETORNO', columns: ['cd_retorno'])]
#[ORM\Index(name: 'IX_NR_LINHA', columns: ['nr_linha'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
class RetornoCpItens
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_retorno', type: 'integer', options: ['default' => '0'])]
    private int $cdRetorno = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_linha', type: 'integer', options: ['default' => '0'])]
    private int $nrLinha = 0;

    #[ORM\Column(name: 'me_linha', type: 'text', length: 65535, nullable: true)]
    private ?string $meLinha = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', nullable: true)]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'dt_debito', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDebito = null;

    #[ORM\Column(name: 'vl_debito', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlDebito = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'string', length: 10, nullable: true)]
    private ?string $cdOcorrencia = null;

    #[ORM\Column(name: 'ds_motivos', type: 'string', length: 200, nullable: true)]
    private ?string $dsMotivos = null;

    #[ORM\Column(name: 'sn_baixado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snBaixado = 0;

    #[ORM\Column(name: 'ds_autenticacao', type: 'string', length: 150, nullable: true, options: ['default' => ''])]
    private ?string $dsAutenticacao = '';

    public function __construct(
        int $cdRetorno = 0,
        int $nrLinha = 0,
        ?string $meLinha = null,
        ?int $cdTitulo = null,
        ?\DateTimeInterface $dtDebito = null,
        ?float $vlDebito = null,
        ?string $cdOcorrencia = null,
        ?string $dsMotivos = null,
        ?int $snBaixado = 0,
        ?string $dsAutenticacao = ''
    ) {
        $this->cdRetorno = $cdRetorno;
        $this->nrLinha = $nrLinha;
        $this->meLinha = $meLinha;
        $this->cdTitulo = $cdTitulo;
        $this->dtDebito = $dtDebito;
        $this->vlDebito = $vlDebito;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->dsMotivos = $dsMotivos;
        $this->snBaixado = $snBaixado;
        $this->dsAutenticacao = $dsAutenticacao;
    }

    public function getCdRetorno(): int
    {
        return $this->cdRetorno;
    }

    public function setCdRetorno(int $cdRetorno): self
    {
        $this->cdRetorno = $cdRetorno;
        return $this;
    }

    public function getNrLinha(): int
    {
        return $this->nrLinha;
    }

    public function setNrLinha(int $nrLinha): self
    {
        $this->nrLinha = $nrLinha;
        return $this;
    }

    public function getMeLinha(): ?string
    {
        return $this->meLinha;
    }

    public function setMeLinha(?string $meLinha): self
    {
        $this->meLinha = $meLinha;
        return $this;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getDtDebito(): ?\DateTimeInterface
    {
        return $this->dtDebito;
    }

    public function setDtDebito(?\DateTimeInterface $dtDebito): self
    {
        $this->dtDebito = $dtDebito;
        return $this;
    }

    public function getVlDebito(): ?float
    {
        return $this->vlDebito;
    }

    public function setVlDebito(?float $vlDebito): self
    {
        $this->vlDebito = $vlDebito;
        return $this;
    }

    public function getCdOcorrencia(): ?string
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?string $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getDsMotivos(): ?string
    {
        return $this->dsMotivos;
    }

    public function setDsMotivos(?string $dsMotivos): self
    {
        $this->dsMotivos = $dsMotivos;
        return $this;
    }

    public function getSnBaixado(): ?int
    {
        return $this->snBaixado;
    }

    public function setSnBaixado(?int $snBaixado): self
    {
        $this->snBaixado = $snBaixado;
        return $this;
    }

    public function getDsAutenticacao(): ?string
    {
        return $this->dsAutenticacao;
    }

    public function setDsAutenticacao(?string $dsAutenticacao): self
    {
        $this->dsAutenticacao = $dsAutenticacao;
        return $this;
    }
}
