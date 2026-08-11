<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CapConfiguracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapConfiguracaoRepository::class)]
#[ORM\Table(
    name: 'cap_configuracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CONFIGURACAO', columns: ['ds_configuracao'])]
class CapConfiguracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_configuracao', type: 'integer')]
    private ?int $cdConfiguracao = null;

    #[ORM\Column(name: 'ds_configuracao', type: 'string', length: 50, nullable: true)]
    private ?string $dsConfiguracao = null;

    #[ORM\Column(name: 'me_configuracao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meConfiguracao = null;

    #[ORM\Column(name: 'ds_instrucao_configuracao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsInstrucaoConfiguracao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsConfiguracao = null,
        ?string $meConfiguracao = null,
        ?string $dsInstrucaoConfiguracao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsConfiguracao = $dsConfiguracao;
        $this->meConfiguracao = $meConfiguracao;
        $this->dsInstrucaoConfiguracao = $dsInstrucaoConfiguracao;
        $this->dtBase = $dtBase;
    }

    public function getCdConfiguracao(): ?int
    {
        return $this->cdConfiguracao;
    }

    public function getDsConfiguracao(): ?string
    {
        return $this->dsConfiguracao;
    }

    public function setDsConfiguracao(?string $dsConfiguracao): self
    {
        $this->dsConfiguracao = $dsConfiguracao;
        return $this;
    }

    public function getMeConfiguracao(): ?string
    {
        return $this->meConfiguracao;
    }

    public function setMeConfiguracao(?string $meConfiguracao): self
    {
        $this->meConfiguracao = $meConfiguracao;
        return $this;
    }

    public function getDsInstrucaoConfiguracao(): ?string
    {
        return $this->dsInstrucaoConfiguracao;
    }

    public function setDsInstrucaoConfiguracao(?string $dsInstrucaoConfiguracao): self
    {
        $this->dsInstrucaoConfiguracao = $dsInstrucaoConfiguracao;
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
