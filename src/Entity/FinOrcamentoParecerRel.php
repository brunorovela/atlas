<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinOrcamentoParecerRelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentoParecerRelRepository::class)]
#[ORM\Table(
    name: 'fin_orcamento_parecer_rel',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ORCAMENTO_PARECER_REL', columns: ['cd_orcamento_parecer_rel'])]
#[ORM\Index(name: 'IX_CD_PERIODO', columns: ['cd_periodo'])]
#[ORM\Index(name: 'IX_CD_ORCAMENTO', columns: ['cd_orcamento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_orcamento_parecer_rel']
)]
class FinOrcamentoParecerRel
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento_parecer_rel', type: 'integer')]
    private ?int $cdOrcamentoParecerRel = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_periodo', type: 'string', length: 50, options: ['default' => ''])]
    private string $cdPeriodo = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento', type: 'integer', options: ['default' => '0'])]
    private int $cdOrcamento = 0;

    #[ORM\Column(name: 'ds_periodo', type: 'string', length: 100, nullable: true)]
    private ?string $dsPeriodo = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'me_cabecalho', type: 'text', length: 16777215, nullable: true)]
    private ?string $meCabecalho = null;

    #[ORM\Column(name: 'me_rodape', type: 'text', length: 16777215, nullable: true)]
    private ?string $meRodape = null;

    public function __construct(
        ?int $cdOrcamentoParecerRel = null,
        string $cdPeriodo = '',
        int $cdOrcamento = 0,
        ?string $dsPeriodo = null,
        ?string $dsTitulo = null,
        ?string $meCabecalho = null,
        ?string $meRodape = null
    ) {
        $this->cdOrcamentoParecerRel = $cdOrcamentoParecerRel;
        $this->cdPeriodo = $cdPeriodo;
        $this->cdOrcamento = $cdOrcamento;
        $this->dsPeriodo = $dsPeriodo;
        $this->dsTitulo = $dsTitulo;
        $this->meCabecalho = $meCabecalho;
        $this->meRodape = $meRodape;
    }

    public function getCdOrcamentoParecerRel(): ?int
    {
        return $this->cdOrcamentoParecerRel;
    }

    public function setCdOrcamentoParecerRel(?int $cdOrcamentoParecerRel): self
    {
        $this->cdOrcamentoParecerRel = $cdOrcamentoParecerRel;
        return $this;
    }

    public function getCdPeriodo(): string
    {
        return $this->cdPeriodo;
    }

    public function setCdPeriodo(string $cdPeriodo): self
    {
        $this->cdPeriodo = $cdPeriodo;
        return $this;
    }

    public function getCdOrcamento(): int
    {
        return $this->cdOrcamento;
    }

    public function setCdOrcamento(int $cdOrcamento): self
    {
        $this->cdOrcamento = $cdOrcamento;
        return $this;
    }

    public function getDsPeriodo(): ?string
    {
        return $this->dsPeriodo;
    }

    public function setDsPeriodo(?string $dsPeriodo): self
    {
        $this->dsPeriodo = $dsPeriodo;
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

    public function getMeCabecalho(): ?string
    {
        return $this->meCabecalho;
    }

    public function setMeCabecalho(?string $meCabecalho): self
    {
        $this->meCabecalho = $meCabecalho;
        return $this;
    }

    public function getMeRodape(): ?string
    {
        return $this->meRodape;
    }

    public function setMeRodape(?string $meRodape): self
    {
        $this->meRodape = $meRodape;
        return $this;
    }
}
