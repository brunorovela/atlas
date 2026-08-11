<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PessoasCamposAdicionaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasCamposAdicionaisRepository::class)]
#[ORM\Table(
    name: 'pessoas_campos_adicionais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_OPCAO', columns: ['CD_OPCAO'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['SN_ATIVO'])]
class PessoasCamposAdicionais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CAMPO', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdCampo = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 30, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_campo_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoDescricao = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'ds_pessoa', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsPessoa = null;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'CD_OPCAO', type: 'smallint', nullable: true)]
    private ?int $cdOpcao = null;

    #[ORM\Column(name: 'DS_CATEGORIA', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoria = null;

    #[ORM\Column(name: 'SN_ATIVO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snAtivo = 1;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snObrigatorio = 1;

    #[ORM\Column(name: 'sn_obrigatorio_condicional', type: 'integer', options: ['default' => '0'])]
    private int $snObrigatorioCondicional = 0;

    #[ORM\Column(name: 'cd_campo_obrigatorio_condicional', type: 'integer', nullable: true)]
    private ?int $cdCampoObrigatorioCondicional = null;

    #[ORM\Column(name: 'ds_opcoes_obrigatorio_condicional', type: 'string', length: 255, nullable: true)]
    private ?string $dsOpcoesObrigatorioCondicional = null;

    public function __construct(
        ?string $dsCampo = null,
        ?string $dsCampoDescricao = null,
        ?string $dsTipo = null,
        ?string $dsPessoa = null,
        ?int $nrOrdem = null,
        ?int $cdOpcao = null,
        ?string $dsCategoria = null,
        int $snAtivo = 1,
        ?string $dsChave = null,
        ?int $snObrigatorio = 1,
        int $snObrigatorioCondicional = 0,
        ?int $cdCampoObrigatorioCondicional = null,
        ?string $dsOpcoesObrigatorioCondicional = null
    ) {
        $this->dsCampo = $dsCampo;
        $this->dsCampoDescricao = $dsCampoDescricao;
        $this->dsTipo = $dsTipo;
        $this->dsPessoa = $dsPessoa;
        $this->nrOrdem = $nrOrdem;
        $this->cdOpcao = $cdOpcao;
        $this->dsCategoria = $dsCategoria;
        $this->snAtivo = $snAtivo;
        $this->dsChave = $dsChave;
        $this->snObrigatorio = $snObrigatorio;
        $this->snObrigatorioCondicional = $snObrigatorioCondicional;
        $this->cdCampoObrigatorioCondicional = $cdCampoObrigatorioCondicional;
        $this->dsOpcoesObrigatorioCondicional = $dsOpcoesObrigatorioCondicional;
    }

    public function getCdCampo(): ?int
    {
        return $this->cdCampo;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsCampoDescricao(): ?string
    {
        return $this->dsCampoDescricao;
    }

    public function setDsCampoDescricao(?string $dsCampoDescricao): self
    {
        $this->dsCampoDescricao = $dsCampoDescricao;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getDsPessoa(): ?string
    {
        return $this->dsPessoa;
    }

    public function setDsPessoa(?string $dsPessoa): self
    {
        $this->dsPessoa = $dsPessoa;
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

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
    }

    public function setCdOpcao(?int $cdOpcao): self
    {
        $this->cdOpcao = $cdOpcao;
        return $this;
    }

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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

    public function getSnObrigatorio(): ?int
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(?int $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }

    public function getSnObrigatorioCondicional(): int
    {
        return $this->snObrigatorioCondicional;
    }

    public function setSnObrigatorioCondicional(int $snObrigatorioCondicional): self
    {
        $this->snObrigatorioCondicional = $snObrigatorioCondicional;
        return $this;
    }

    public function getCdCampoObrigatorioCondicional(): ?int
    {
        return $this->cdCampoObrigatorioCondicional;
    }

    public function setCdCampoObrigatorioCondicional(?int $cdCampoObrigatorioCondicional): self
    {
        $this->cdCampoObrigatorioCondicional = $cdCampoObrigatorioCondicional;
        return $this;
    }

    public function getDsOpcoesObrigatorioCondicional(): ?string
    {
        return $this->dsOpcoesObrigatorioCondicional;
    }

    public function setDsOpcoesObrigatorioCondicional(?string $dsOpcoesObrigatorioCondicional): self
    {
        $this->dsOpcoesObrigatorioCondicional = $dsOpcoesObrigatorioCondicional;
        return $this;
    }
}
