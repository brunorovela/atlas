<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuModulosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuModulosRepository::class)]
#[ORM\Table(
    name: 'nu_modulos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_modulo', columns: ['cd_modulo'])]
#[ORM\UniqueConstraint(name: 'cd_modulo_2', columns: ['ds_chave'])]
class NuModulos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_modulo', type: 'integer')]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_nome_modulo', type: 'string', length: 100, options: ['default' => '0'])]
    private string $dsNomeModulo = '0';

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true, options: ['default' => '0'])]
    private ?string $dsDescricao = '0';

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsChave = '0';

    #[ORM\Column(name: 'sn_fixo', type: 'boolean', options: ['default' => '0'])]
    private bool $snFixo = false;

    #[ORM\Column(name: 'sn_online', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snOnline = false;

    #[ORM\Column(name: 'me_icone', type: 'blob', length: 65535, nullable: true)]
    private ?string $meIcone = null;

    #[ORM\Column(name: 'sn_visual', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snVisual = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'DS_LICENCA', type: 'string', length: 255, nullable: true)]
    private ?string $dsLicenca = null;

    #[ORM\Column(name: 'ds_icone', type: 'string', length: 255, nullable: true, options: ['default' => 'language'])]
    private ?string $dsIcone = 'language';

    #[ORM\Column(name: 'ds_cor', type: 'string', length: 255, nullable: true, options: ['default' => '#c0ca33'])]
    private ?string $dsCor = '#c0ca33';

    public function __construct(
        string $dsNomeModulo = '0',
        ?string $dsDescricao = '0',
        string $dsChave = '0',
        bool $snFixo = false,
        ?bool $snOnline = false,
        ?string $meIcone = null,
        ?int $snVisual = null,
        ?int $nrOrdem = null,
        ?int $snAtivo = 1,
        ?string $dsLicenca = null,
        ?string $dsIcone = 'language',
        ?string $dsCor = '#c0ca33'
    ) {
        $this->dsNomeModulo = $dsNomeModulo;
        $this->dsDescricao = $dsDescricao;
        $this->dsChave = $dsChave;
        $this->snFixo = $snFixo;
        $this->snOnline = $snOnline;
        $this->meIcone = $meIcone;
        $this->snVisual = $snVisual;
        $this->nrOrdem = $nrOrdem;
        $this->snAtivo = $snAtivo;
        $this->dsLicenca = $dsLicenca;
        $this->dsIcone = $dsIcone;
        $this->dsCor = $dsCor;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function getDsNomeModulo(): string
    {
        return $this->dsNomeModulo;
    }

    public function setDsNomeModulo(string $dsNomeModulo): self
    {
        $this->dsNomeModulo = $dsNomeModulo;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function isSnFixo(): bool
    {
        return $this->snFixo;
    }

    public function setSnFixo(bool $snFixo): self
    {
        $this->snFixo = $snFixo;
        return $this;
    }

    public function isSnOnline(): ?bool
    {
        return $this->snOnline;
    }

    public function setSnOnline(?bool $snOnline): self
    {
        $this->snOnline = $snOnline;
        return $this;
    }

    public function getMeIcone(): ?string
    {
        return $this->meIcone;
    }

    public function setMeIcone(?string $meIcone): self
    {
        $this->meIcone = $meIcone;
        return $this;
    }

    public function getSnVisual(): ?int
    {
        return $this->snVisual;
    }

    public function setSnVisual(?int $snVisual): self
    {
        $this->snVisual = $snVisual;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

    public function getDsIcone(): ?string
    {
        return $this->dsIcone;
    }

    public function setDsIcone(?string $dsIcone): self
    {
        $this->dsIcone = $dsIcone;
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
