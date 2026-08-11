<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinIndicadoresArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinIndicadoresArquivosRepository::class)]
#[ORM\Table(
    name: 'fin_indicadores_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class FinIndicadoresArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_indicador_arquivo', type: 'integer')]
    private ?int $cdIndicadorArquivo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_periodo_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPeriodoInicial = null;

    #[ORM\Column(name: 'dt_periodo_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPeriodoFinal = null;

    #[ORM\Column(name: 'sn_forcar_atualizacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snForcarAtualizacao = false;

    #[ORM\Column(name: 'dt_atualizacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAtualizacao = null;

    #[ORM\Column(name: 'me_arquivo', type: 'text', nullable: true)]
    private ?string $meArquivo = null;

    public function __construct(
        ?string $dsChave = null,
        ?\DateTimeInterface $dtPeriodoInicial = null,
        ?\DateTimeInterface $dtPeriodoFinal = null,
        ?bool $snForcarAtualizacao = false,
        ?\DateTimeInterface $dtAtualizacao = null,
        ?string $meArquivo = null
    ) {
        $this->dsChave = $dsChave;
        $this->dtPeriodoInicial = $dtPeriodoInicial;
        $this->dtPeriodoFinal = $dtPeriodoFinal;
        $this->snForcarAtualizacao = $snForcarAtualizacao;
        $this->dtAtualizacao = $dtAtualizacao;
        $this->meArquivo = $meArquivo;
    }

    public function getCdIndicadorArquivo(): ?int
    {
        return $this->cdIndicadorArquivo;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDtPeriodoInicial(): ?\DateTimeInterface
    {
        return $this->dtPeriodoInicial;
    }

    public function setDtPeriodoInicial(?\DateTimeInterface $dtPeriodoInicial): self
    {
        $this->dtPeriodoInicial = $dtPeriodoInicial;
        return $this;
    }

    public function getDtPeriodoFinal(): ?\DateTimeInterface
    {
        return $this->dtPeriodoFinal;
    }

    public function setDtPeriodoFinal(?\DateTimeInterface $dtPeriodoFinal): self
    {
        $this->dtPeriodoFinal = $dtPeriodoFinal;
        return $this;
    }

    public function isSnForcarAtualizacao(): ?bool
    {
        return $this->snForcarAtualizacao;
    }

    public function setSnForcarAtualizacao(?bool $snForcarAtualizacao): self
    {
        $this->snForcarAtualizacao = $snForcarAtualizacao;
        return $this;
    }

    public function getDtAtualizacao(): ?\DateTimeInterface
    {
        return $this->dtAtualizacao;
    }

    public function setDtAtualizacao(?\DateTimeInterface $dtAtualizacao): self
    {
        $this->dtAtualizacao = $dtAtualizacao;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }
}
