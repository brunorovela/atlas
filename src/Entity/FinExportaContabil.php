<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinExportaContabilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinExportaContabilRepository::class)]
#[ORM\Table(
    name: 'fin_exporta_contabil',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_DEBITO', columns: ['cd_debito'])]
#[ORM\Index(name: 'IX_CD_CREDITO', columns: ['cd_credito'])]
class FinExportaContabil
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_exporta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExporta = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'dt_movimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtMovimento = null;

    #[ORM\Column(name: 'cd_debito', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdDebito = null;

    #[ORM\Column(name: 'cd_credito', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCredito = null;

    #[ORM\Column(name: 'vl_movimento', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlMovimento = null;

    #[ORM\Column(name: 'ds_historico', type: 'string', length: 150, nullable: true)]
    private ?string $dsHistorico = null;

    #[ORM\Column(name: 'sn_exportado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExportado = 0;

    public function __construct(
        ?int $cdAcao = null,
        ?int $cdTitulo = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?\DateTimeInterface $dtMovimento = null,
        ?int $cdDebito = null,
        ?int $cdCredito = null,
        ?float $vlMovimento = null,
        ?string $dsHistorico = null,
        ?int $snExportado = 0
    ) {
        $this->cdAcao = $cdAcao;
        $this->cdTitulo = $cdTitulo;
        $this->dtRegistro = $dtRegistro;
        $this->dtMovimento = $dtMovimento;
        $this->cdDebito = $cdDebito;
        $this->cdCredito = $cdCredito;
        $this->vlMovimento = $vlMovimento;
        $this->dsHistorico = $dsHistorico;
        $this->snExportado = $snExportado;
    }

    public function getCdExporta(): ?int
    {
        return $this->cdExporta;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
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

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getDtMovimento(): ?\DateTimeInterface
    {
        return $this->dtMovimento;
    }

    public function setDtMovimento(?\DateTimeInterface $dtMovimento): self
    {
        $this->dtMovimento = $dtMovimento;
        return $this;
    }

    public function getCdDebito(): ?int
    {
        return $this->cdDebito;
    }

    public function setCdDebito(?int $cdDebito): self
    {
        $this->cdDebito = $cdDebito;
        return $this;
    }

    public function getCdCredito(): ?int
    {
        return $this->cdCredito;
    }

    public function setCdCredito(?int $cdCredito): self
    {
        $this->cdCredito = $cdCredito;
        return $this;
    }

    public function getVlMovimento(): ?float
    {
        return $this->vlMovimento;
    }

    public function setVlMovimento(?float $vlMovimento): self
    {
        $this->vlMovimento = $vlMovimento;
        return $this;
    }

    public function getDsHistorico(): ?string
    {
        return $this->dsHistorico;
    }

    public function setDsHistorico(?string $dsHistorico): self
    {
        $this->dsHistorico = $dsHistorico;
        return $this;
    }

    public function getSnExportado(): ?int
    {
        return $this->snExportado;
    }

    public function setSnExportado(?int $snExportado): self
    {
        $this->snExportado = $snExportado;
        return $this;
    }
}
