<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CapModalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapModalidadeRepository::class)]
#[ORM\Table(
    name: 'cap_modalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CapModalidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_modalidade', type: 'integer')]
    private ?int $cdModalidade = null;

    #[ORM\Column(name: 'ds_modalidade', type: 'string', length: 100)]
    private ?string $dsModalidade = null;

    #[ORM\Column(name: 'sn_esconder_etapa_disciplina', type: 'boolean', options: ['default' => '0'])]
    private bool $snEsconderEtapaDisciplina = false;

    #[ORM\Column(name: 'sn_esconder_etapa_documentos', type: 'boolean', options: ['default' => '0'])]
    private bool $snEsconderEtapaDocumentos = false;

    #[ORM\Column(name: 'sn_esconder_etapa_empresa', type: 'boolean', options: ['default' => '0'])]
    private bool $snEsconderEtapaEmpresa = false;

    #[ORM\Column(name: 'ds_icone', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsIcone = '0';

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsModalidade = null,
        bool $snEsconderEtapaDisciplina = false,
        bool $snEsconderEtapaDocumentos = false,
        bool $snEsconderEtapaEmpresa = false,
        string $dsIcone = '0',
        bool $snAtivo = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsModalidade = $dsModalidade;
        $this->snEsconderEtapaDisciplina = $snEsconderEtapaDisciplina;
        $this->snEsconderEtapaDocumentos = $snEsconderEtapaDocumentos;
        $this->snEsconderEtapaEmpresa = $snEsconderEtapaEmpresa;
        $this->dsIcone = $dsIcone;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdModalidade(): ?int
    {
        return $this->cdModalidade;
    }

    public function getDsModalidade(): ?string
    {
        return $this->dsModalidade;
    }

    public function setDsModalidade(?string $dsModalidade): self
    {
        $this->dsModalidade = $dsModalidade;
        return $this;
    }

    public function isSnEsconderEtapaDisciplina(): bool
    {
        return $this->snEsconderEtapaDisciplina;
    }

    public function setSnEsconderEtapaDisciplina(bool $snEsconderEtapaDisciplina): self
    {
        $this->snEsconderEtapaDisciplina = $snEsconderEtapaDisciplina;
        return $this;
    }

    public function isSnEsconderEtapaDocumentos(): bool
    {
        return $this->snEsconderEtapaDocumentos;
    }

    public function setSnEsconderEtapaDocumentos(bool $snEsconderEtapaDocumentos): self
    {
        $this->snEsconderEtapaDocumentos = $snEsconderEtapaDocumentos;
        return $this;
    }

    public function isSnEsconderEtapaEmpresa(): bool
    {
        return $this->snEsconderEtapaEmpresa;
    }

    public function setSnEsconderEtapaEmpresa(bool $snEsconderEtapaEmpresa): self
    {
        $this->snEsconderEtapaEmpresa = $snEsconderEtapaEmpresa;
        return $this;
    }

    public function getDsIcone(): string
    {
        return $this->dsIcone;
    }

    public function setDsIcone(string $dsIcone): self
    {
        $this->dsIcone = $dsIcone;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
