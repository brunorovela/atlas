<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuCadastrosCamposValoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastrosCamposValoresRepository::class)]
#[ORM\Table(
    name: 'nu_cadastros_campos_valores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO', columns: ['cd_cadastro_campo'])]
#[ORM\Index(name: 'IX_CD_CHAVE_TABELA', columns: ['cd_chave_tabela'])]
class NuCadastrosCamposValores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro_campo_valor', type: 'integer')]
    private ?int $cdCadastroCampoValor = null;

    #[ORM\Column(name: 'cd_cadastro_campo', type: 'integer')]
    private ?int $cdCadastroCampo = null;

    #[ORM\Column(name: 'cd_chave_tabela', type: 'integer')]
    private ?int $cdChaveTabela = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'tx_valor', type: 'text', length: 65535, nullable: true)]
    private ?string $txValor = null;

    public function __construct(
        ?int $cdCadastroCampo = null,
        ?int $cdChaveTabela = null,
        ?string $dsValor = null,
        ?string $txValor = null
    ) {
        $this->cdCadastroCampo = $cdCadastroCampo;
        $this->cdChaveTabela = $cdChaveTabela;
        $this->dsValor = $dsValor;
        $this->txValor = $txValor;
    }

    public function getCdCadastroCampoValor(): ?int
    {
        return $this->cdCadastroCampoValor;
    }

    public function getCdCadastroCampo(): ?int
    {
        return $this->cdCadastroCampo;
    }

    public function setCdCadastroCampo(?int $cdCadastroCampo): self
    {
        $this->cdCadastroCampo = $cdCadastroCampo;
        return $this;
    }

    public function getCdChaveTabela(): ?int
    {
        return $this->cdChaveTabela;
    }

    public function setCdChaveTabela(?int $cdChaveTabela): self
    {
        $this->cdChaveTabela = $cdChaveTabela;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getTxValor(): ?string
    {
        return $this->txValor;
    }

    public function setTxValor(?string $txValor): self
    {
        $this->txValor = $txValor;
        return $this;
    }
}
