<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuModulosAcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuModulosAcoesRepository::class)]
#[ORM\Table(
    name: 'nu_modulos_acoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_acao', columns: ['cd_acao'])]
#[ORM\UniqueConstraint(name: 'ChaveUnica', columns: ['cd_modulo', 'ds_chave'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class NuModulosAcoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', options: ['default' => '0'])]
    private int $cdModulo = 0;

    #[ORM\Column(name: 'ds_nome_acao', type: 'string', length: 255, options: ['default' => '0'])]
    private string $dsNomeAcao = '0';

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsChave = '0';

    #[ORM\Column(name: 'ds_licenca', type: 'string', length: 150)]
    private ?string $dsLicenca = null;

    public function __construct(
        int $cdModulo = 0,
        string $dsNomeAcao = '0',
        string $dsChave = '0',
        ?string $dsLicenca = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->dsNomeAcao = $dsNomeAcao;
        $this->dsChave = $dsChave;
        $this->dsLicenca = $dsLicenca;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function getCdModulo(): int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getDsNomeAcao(): string
    {
        return $this->dsNomeAcao;
    }

    public function setDsNomeAcao(string $dsNomeAcao): self
    {
        $this->dsNomeAcao = $dsNomeAcao;
        return $this;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsLicenca(): ?string
    {
        return $this->dsLicenca;
    }

    public function setDsLicenca(?string $dsLicenca): self
    {
        $this->dsLicenca = $dsLicenca;
        return $this;
    }
}
