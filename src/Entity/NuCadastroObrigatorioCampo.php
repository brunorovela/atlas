<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\NuCadastroObrigatorioCampoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastroObrigatorioCampoRepository::class)]
#[ORM\Table(
    name: 'nu_cadastro_obrigatorio_campo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_cadastro', columns: ['cd_cadastro'])]
#[ORM\Index(name: 'IX_CD_CADASTRO', columns: ['cd_cadastro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cd_cadastro', 'colunas' => ['cd_cadastro'], 'tabelaAlvo' => 'nu_cadastro_obrigatorio', 'colunasAlvo' => ['cd_cadastro'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuCadastroObrigatorioCampo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro_campo', type: 'integer')]
    private ?int $cdCadastroCampo = null;

    #[ORM\ManyToOne(targetEntity: NuCadastroObrigatorio::class)]
    #[ORM\JoinColumn(name: 'cd_cadastro', referencedColumnName: 'cd_cadastro', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuCadastroObrigatorio $cdCadastro = null;

    #[ORM\Column(name: 'nm_campo', type: 'string', length: 60, nullable: true)]
    private ?string $nmCampo = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 60, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'boolean', nullable: true)]
    private ?bool $snObrigatorio = null;

    #[ORM\Column(name: 'sn_opcional', type: 'boolean', nullable: true)]
    private ?bool $snOpcional = null;

    #[ORM\Column(name: 'sn_visivel', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snVisivel = 0;

    #[ORM\Column(name: 'ds_chave_campo', type: 'string', length: 60, nullable: true)]
    private ?string $dsChaveCampo = null;

    #[ORM\Column(name: 'ds_chave_gestao', type: 'string', length: 60, nullable: true)]
    private ?string $dsChaveGestao = null;

    public function __construct(
        ?NuCadastroObrigatorio $cdCadastro = null,
        ?string $nmCampo = null,
        ?string $dsChave = null,
        ?int $nrOrdem = null,
        ?bool $snObrigatorio = null,
        ?bool $snOpcional = null,
        ?int $snVisivel = 0,
        ?string $dsChaveCampo = null,
        ?string $dsChaveGestao = null
    ) {
        $this->cdCadastro = $cdCadastro;
        $this->nmCampo = $nmCampo;
        $this->dsChave = $dsChave;
        $this->nrOrdem = $nrOrdem;
        $this->snObrigatorio = $snObrigatorio;
        $this->snOpcional = $snOpcional;
        $this->snVisivel = $snVisivel;
        $this->dsChaveCampo = $dsChaveCampo;
        $this->dsChaveGestao = $dsChaveGestao;
    }

    public function getCdCadastroCampo(): ?int
    {
        return $this->cdCadastroCampo;
    }

    public function getCdCadastro(): ?NuCadastroObrigatorio
    {
        return $this->cdCadastro;
    }

    public function setCdCadastro(?NuCadastroObrigatorio $cdCadastro): self
    {
        $this->cdCadastro = $cdCadastro;
        return $this;
    }

    public function getNmCampo(): ?string
    {
        return $this->nmCampo;
    }

    public function setNmCampo(?string $nmCampo): self
    {
        $this->nmCampo = $nmCampo;
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

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnObrigatorio(): ?bool
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(?bool $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }

    public function isSnOpcional(): ?bool
    {
        return $this->snOpcional;
    }

    public function setSnOpcional(?bool $snOpcional): self
    {
        $this->snOpcional = $snOpcional;
        return $this;
    }

    public function getSnVisivel(): ?int
    {
        return $this->snVisivel;
    }

    public function setSnVisivel(?int $snVisivel): self
    {
        $this->snVisivel = $snVisivel;
        return $this;
    }

    public function getDsChaveCampo(): ?string
    {
        return $this->dsChaveCampo;
    }

    public function setDsChaveCampo(?string $dsChaveCampo): self
    {
        $this->dsChaveCampo = $dsChaveCampo;
        return $this;
    }

    public function getDsChaveGestao(): ?string
    {
        return $this->dsChaveGestao;
    }

    public function setDsChaveGestao(?string $dsChaveGestao): self
    {
        $this->dsChaveGestao = $dsChaveGestao;
        return $this;
    }
}
