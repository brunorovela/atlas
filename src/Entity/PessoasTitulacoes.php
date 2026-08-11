<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasTitulacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasTitulacoesRepository::class)]
#[ORM\Table(
    name: 'pessoas_titulacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_enum_tipo_diploma_emissao', columns: ['enum_tipo_diploma_emissao'])]
class PessoasTitulacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulacao', type: 'integer')]
    private ?int $cdTitulacao = null;

    #[ORM\Column(name: 'ds_titulacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulacao = null;

    #[ORM\Column(name: 'ds_titulacao_masculino', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulacaoMasculino = null;

    #[ORM\Column(name: 'ds_titulacao_feminino', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulacaoFeminino = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'enum_tipo_diploma_emissao', type: 'string', length: 100, nullable: true)]
    private ?string $enumTipoDiplomaEmissao = null;

    public function __construct(
        ?string $dsTitulacao = null,
        ?string $dsTitulacaoMasculino = null,
        ?string $dsTitulacaoFeminino = null,
        ?string $dsChave = null,
        ?string $enumTipoDiplomaEmissao = null
    ) {
        $this->dsTitulacao = $dsTitulacao;
        $this->dsTitulacaoMasculino = $dsTitulacaoMasculino;
        $this->dsTitulacaoFeminino = $dsTitulacaoFeminino;
        $this->dsChave = $dsChave;
        $this->enumTipoDiplomaEmissao = $enumTipoDiplomaEmissao;
    }

    public function getCdTitulacao(): ?int
    {
        return $this->cdTitulacao;
    }

    public function getDsTitulacao(): ?string
    {
        return $this->dsTitulacao;
    }

    public function setDsTitulacao(?string $dsTitulacao): self
    {
        $this->dsTitulacao = $dsTitulacao;
        return $this;
    }

    public function getDsTitulacaoMasculino(): ?string
    {
        return $this->dsTitulacaoMasculino;
    }

    public function setDsTitulacaoMasculino(?string $dsTitulacaoMasculino): self
    {
        $this->dsTitulacaoMasculino = $dsTitulacaoMasculino;
        return $this;
    }

    public function getDsTitulacaoFeminino(): ?string
    {
        return $this->dsTitulacaoFeminino;
    }

    public function setDsTitulacaoFeminino(?string $dsTitulacaoFeminino): self
    {
        $this->dsTitulacaoFeminino = $dsTitulacaoFeminino;
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

    public function getEnumTipoDiplomaEmissao(): ?string
    {
        return $this->enumTipoDiplomaEmissao;
    }

    public function setEnumTipoDiplomaEmissao(?string $enumTipoDiplomaEmissao): self
    {
        $this->enumTipoDiplomaEmissao = $enumTipoDiplomaEmissao;
        return $this;
    }
}
