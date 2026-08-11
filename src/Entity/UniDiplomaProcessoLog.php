<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniDiplomaProcessoLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoLogRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniDiplomaProcessoLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diploma_processo_log', type: 'integer')]
    private ?int $cdDiplomaProcessoLog = null;

    #[ORM\Column(name: 'cd_diploma_processo', type: 'integer')]
    private ?int $cdDiplomaProcesso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'me_log', type: 'text', length: 65535, nullable: true)]
    private ?string $meLog = null;

    #[ORM\Column(name: 'me_json', type: 'text', length: 65535, nullable: true)]
    private ?string $meJson = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdDiplomaProcesso = null,
        ?int $cdPessoa = null,
        ?string $dsChave = null,
        ?string $meLog = null,
        ?string $meJson = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdDiplomaProcesso = $cdDiplomaProcesso;
        $this->cdPessoa = $cdPessoa;
        $this->dsChave = $dsChave;
        $this->meLog = $meLog;
        $this->meJson = $meJson;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdDiplomaProcessoLog(): ?int
    {
        return $this->cdDiplomaProcessoLog;
    }

    public function getCdDiplomaProcesso(): ?int
    {
        return $this->cdDiplomaProcesso;
    }

    public function setCdDiplomaProcesso(?int $cdDiplomaProcesso): self
    {
        $this->cdDiplomaProcesso = $cdDiplomaProcesso;
        return $this;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getMeLog(): ?string
    {
        return $this->meLog;
    }

    public function setMeLog(?string $meLog): self
    {
        $this->meLog = $meLog;
        return $this;
    }

    public function getMeJson(): ?string
    {
        return $this->meJson;
    }

    public function setMeJson(?string $meJson): self
    {
        $this->meJson = $meJson;
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
