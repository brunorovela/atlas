<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuCadastrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastrosRepository::class)]
#[ORM\Table(
    name: 'nu_cadastros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_MODELO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class NuCadastros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro', type: 'integer')]
    private ?int $cdCadastro = null;

    #[ORM\Column(name: 'ds_cadastro', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsCadastro = '';

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsTitulo = '';

    #[ORM\Column(name: 'cd_modulo', type: 'integer')]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_fixo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snFixo = 0;

    #[ORM\Column(name: 'sn_abas', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAbas = 1;

    #[ORM\Column(name: 'ds_permissao', type: 'string', length: 50, nullable: true)]
    private ?string $dsPermissao = null;

    public function __construct(
        string $dsCadastro = '',
        string $dsTitulo = '',
        ?int $cdModulo = null,
        ?string $dsChave = null,
        int $snFixo = 0,
        int $snAbas = 1,
        ?string $dsPermissao = null
    ) {
        $this->dsCadastro = $dsCadastro;
        $this->dsTitulo = $dsTitulo;
        $this->cdModulo = $cdModulo;
        $this->dsChave = $dsChave;
        $this->snFixo = $snFixo;
        $this->snAbas = $snAbas;
        $this->dsPermissao = $dsPermissao;
    }

    public function getCdCadastro(): ?int
    {
        return $this->cdCadastro;
    }

    public function getDsCadastro(): string
    {
        return $this->dsCadastro;
    }

    public function setDsCadastro(string $dsCadastro): self
    {
        $this->dsCadastro = $dsCadastro;
        return $this;
    }

    public function getDsTitulo(): string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
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

    public function getSnFixo(): int
    {
        return $this->snFixo;
    }

    public function setSnFixo(int $snFixo): self
    {
        $this->snFixo = $snFixo;
        return $this;
    }

    public function getSnAbas(): int
    {
        return $this->snAbas;
    }

    public function setSnAbas(int $snAbas): self
    {
        $this->snAbas = $snAbas;
        return $this;
    }

    public function getDsPermissao(): ?string
    {
        return $this->dsPermissao;
    }

    public function setDsPermissao(?string $dsPermissao): self
    {
        $this->dsPermissao = $dsPermissao;
        return $this;
    }
}
