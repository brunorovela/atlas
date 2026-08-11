<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoAgendamaisFilaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoAgendamaisFilaRepository::class)]
#[ORM\Table(
    name: 'integracao_agendamais_fila',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_CD_PESSOA_UNI', columns: ['cd_pessoa_unimestre'])]
class IntegracaoAgendamaisFila
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'bigint')]
    private ?string $id = null;

    #[ORM\Column(name: 'cd_pessoa_unimestre', type: 'integer')]
    private ?int $cdPessoaUnimestre = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_integrado_novo', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegradoNovo = false;

    public function __construct(
        ?int $cdPessoaUnimestre = null,
        bool $snIntegrado = false,
        ?\DateTimeInterface $dtBase = null,
        bool $snIntegradoNovo = false
    ) {
        $this->cdPessoaUnimestre = $cdPessoaUnimestre;
        $this->snIntegrado = $snIntegrado;
        $this->dtBase = $dtBase;
        $this->snIntegradoNovo = $snIntegradoNovo;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCdPessoaUnimestre(): ?int
    {
        return $this->cdPessoaUnimestre;
    }

    public function setCdPessoaUnimestre(?int $cdPessoaUnimestre): self
    {
        $this->cdPessoaUnimestre = $cdPessoaUnimestre;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
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

    public function isSnIntegradoNovo(): bool
    {
        return $this->snIntegradoNovo;
    }

    public function setSnIntegradoNovo(bool $snIntegradoNovo): self
    {
        $this->snIntegradoNovo = $snIntegradoNovo;
        return $this;
    }
}
