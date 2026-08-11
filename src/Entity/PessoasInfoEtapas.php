<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PessoasInfoEtapasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasInfoEtapasRepository::class)]
#[ORM\Table(
    name: 'pessoas_info_etapas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PessoasInfoEtapas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_info_etapa', type: 'integer')]
    private ?int $cdPessoaInfoEtapa = null;

    #[ORM\Column(name: 'ds_etapa', type: 'string', length: 50)]
    private ?string $dsEtapa = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'nr_dias_parado_para_aviso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrDiasParadoParaAviso = null;

    #[ORM\Column(name: 'ds_aviso_apos_dias_parado', type: 'text', length: 65535, nullable: true)]
    private ?string $dsAvisoAposDiasParado = null;

    #[ORM\Column(name: 'sn_etapa_final', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snEtapaFinal = 0;

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 10, nullable: true)]
    private ?string $dsCor = null;

    public function __construct(
        ?string $dsEtapa = null,
        ?int $nrOrdem = null,
        ?int $nrDiasParadoParaAviso = null,
        ?string $dsAvisoAposDiasParado = null,
        int $snEtapaFinal = 0,
        ?string $dsCor = null
    ) {
        $this->dsEtapa = $dsEtapa;
        $this->nrOrdem = $nrOrdem;
        $this->nrDiasParadoParaAviso = $nrDiasParadoParaAviso;
        $this->dsAvisoAposDiasParado = $dsAvisoAposDiasParado;
        $this->snEtapaFinal = $snEtapaFinal;
        $this->dsCor = $dsCor;
    }

    public function getCdPessoaInfoEtapa(): ?int
    {
        return $this->cdPessoaInfoEtapa;
    }

    public function getDsEtapa(): ?string
    {
        return $this->dsEtapa;
    }

    public function setDsEtapa(?string $dsEtapa): self
    {
        $this->dsEtapa = $dsEtapa;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getNrDiasParadoParaAviso(): ?int
    {
        return $this->nrDiasParadoParaAviso;
    }

    public function setNrDiasParadoParaAviso(?int $nrDiasParadoParaAviso): self
    {
        $this->nrDiasParadoParaAviso = $nrDiasParadoParaAviso;
        return $this;
    }

    public function getDsAvisoAposDiasParado(): ?string
    {
        return $this->dsAvisoAposDiasParado;
    }

    public function setDsAvisoAposDiasParado(?string $dsAvisoAposDiasParado): self
    {
        $this->dsAvisoAposDiasParado = $dsAvisoAposDiasParado;
        return $this;
    }

    public function getSnEtapaFinal(): int
    {
        return $this->snEtapaFinal;
    }

    public function setSnEtapaFinal(int $snEtapaFinal): self
    {
        $this->snEtapaFinal = $snEtapaFinal;
        return $this;
    }

    public function getDsCor(): ?string
    {
        return $this->dsCor;
    }

    public function setDsCor(?string $dsCor): self
    {
        $this->dsCor = $dsCor;
        return $this;
    }
}
