<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BlackboardLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlackboardLogRepository::class)]
#[ORM\Table(
    name: 'blackboard_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class BlackboardLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_blackboard_log', type: 'integer')]
    private ?int $cdBlackboardLog = null;

    #[ORM\Column(name: 'dt_integracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIntegracao = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'nr_erros', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $nrErros = 0;

    #[ORM\Column(name: 'ds_retorno', type: 'text', length: 65535, nullable: true)]
    private ?string $dsRetorno = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?\DateTimeInterface $dtIntegracao = null,
        ?string $nmArquivo = null,
        ?int $nrErros = 0,
        ?string $dsRetorno = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dtIntegracao = $dtIntegracao;
        $this->nmArquivo = $nmArquivo;
        $this->nrErros = $nrErros;
        $this->dsRetorno = $dsRetorno;
        $this->dtBase = $dtBase;
    }

    public function getCdBlackboardLog(): ?int
    {
        return $this->cdBlackboardLog;
    }

    public function getDtIntegracao(): ?\DateTimeInterface
    {
        return $this->dtIntegracao;
    }

    public function setDtIntegracao(?\DateTimeInterface $dtIntegracao): self
    {
        $this->dtIntegracao = $dtIntegracao;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNrErros(): ?int
    {
        return $this->nrErros;
    }

    public function setNrErros(?int $nrErros): self
    {
        $this->nrErros = $nrErros;
        return $this;
    }

    public function getDsRetorno(): ?string
    {
        return $this->dsRetorno;
    }

    public function setDsRetorno(?string $dsRetorno): self
    {
        $this->dsRetorno = $dsRetorno;
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
