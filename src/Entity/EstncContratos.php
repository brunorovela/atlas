<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncContratosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncContratosRepository::class)]
#[ORM\Table(
    name: 'estnc_contratos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
class EstncContratos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contrato', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdContrato = null;

    #[ORM\Column(name: 'cd_tipo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'nm_contrato', type: 'string', length: 255, nullable: true)]
    private ?string $nmContrato = null;

    #[ORM\Column(name: 'ds_contrato', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsContrato = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_visivel', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snVisivel = 1;

    #[ORM\Column(name: 'sn_pdf', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPdf = 0;

    public function __construct(
        ?int $cdTipo = null,
        ?string $nmContrato = null,
        ?string $dsContrato = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $snAtivo = null,
        int $snVisivel = 1,
        int $snPdf = 0
    ) {
        $this->cdTipo = $cdTipo;
        $this->nmContrato = $nmContrato;
        $this->dsContrato = $dsContrato;
        $this->dtCadastro = $dtCadastro;
        $this->snAtivo = $snAtivo;
        $this->snVisivel = $snVisivel;
        $this->snPdf = $snPdf;
    }

    public function getCdContrato(): ?int
    {
        return $this->cdContrato;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getNmContrato(): ?string
    {
        return $this->nmContrato;
    }

    public function setNmContrato(?string $nmContrato): self
    {
        $this->nmContrato = $nmContrato;
        return $this;
    }

    public function getDsContrato(): ?string
    {
        return $this->dsContrato;
    }

    public function setDsContrato(?string $dsContrato): self
    {
        $this->dsContrato = $dsContrato;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnVisivel(): int
    {
        return $this->snVisivel;
    }

    public function setSnVisivel(int $snVisivel): self
    {
        $this->snVisivel = $snVisivel;
        return $this;
    }

    public function getSnPdf(): int
    {
        return $this->snPdf;
    }

    public function setSnPdf(int $snPdf): self
    {
        $this->snPdf = $snPdf;
        return $this;
    }
}
