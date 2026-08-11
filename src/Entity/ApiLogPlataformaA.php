<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ApiLogPlataformaARepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiLogPlataformaARepository::class)]
#[ORM\Table(
    name: 'api_log_plataforma_a',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ApiLogPlataformaA
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'bigint')]
    private ?string $cdLog = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'ds_url_parametros', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlParametros = null;

    #[ORM\Column(name: 'ds_headers', type: 'text', length: 65535, nullable: true)]
    private ?string $dsHeaders = null;

    #[ORM\Column(name: 'ds_body_enviado', type: 'text', length: 65535, nullable: true)]
    private ?string $dsBodyEnviado = null;

    #[ORM\Column(name: 'ds_resultado', type: 'text', length: 65535, nullable: true)]
    private ?string $dsResultado = null;

    #[ORM\Column(name: 'sn_processado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snProcessado = false;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsUrl = null,
        ?string $dsUrlParametros = null,
        ?string $dsHeaders = null,
        ?string $dsBodyEnviado = null,
        ?string $dsResultado = null,
        ?bool $snProcessado = false,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsUrl = $dsUrl;
        $this->dsUrlParametros = $dsUrlParametros;
        $this->dsHeaders = $dsHeaders;
        $this->dsBodyEnviado = $dsBodyEnviado;
        $this->dsResultado = $dsResultado;
        $this->snProcessado = $snProcessado;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdLog(): ?string
    {
        return $this->cdLog;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDsUrlParametros(): ?string
    {
        return $this->dsUrlParametros;
    }

    public function setDsUrlParametros(?string $dsUrlParametros): self
    {
        $this->dsUrlParametros = $dsUrlParametros;
        return $this;
    }

    public function getDsHeaders(): ?string
    {
        return $this->dsHeaders;
    }

    public function setDsHeaders(?string $dsHeaders): self
    {
        $this->dsHeaders = $dsHeaders;
        return $this;
    }

    public function getDsBodyEnviado(): ?string
    {
        return $this->dsBodyEnviado;
    }

    public function setDsBodyEnviado(?string $dsBodyEnviado): self
    {
        $this->dsBodyEnviado = $dsBodyEnviado;
        return $this;
    }

    public function getDsResultado(): ?string
    {
        return $this->dsResultado;
    }

    public function setDsResultado(?string $dsResultado): self
    {
        $this->dsResultado = $dsResultado;
        return $this;
    }

    public function isSnProcessado(): ?bool
    {
        return $this->snProcessado;
    }

    public function setSnProcessado(?bool $snProcessado): self
    {
        $this->snProcessado = $snProcessado;
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
