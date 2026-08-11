<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolProcessoEtapaCampoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessoEtapaCampoPessoaRepository::class)]
#[ORM\Table(
    name: 'mol_processo_etapa_campo_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PROCESSO_ETAPA', columns: ['cd_processo_etapa'])]
class MolProcessoEtapaCampoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_campo_pessoa', type: 'integer')]
    private ?int $cdCampoPessoa = null;

    #[ORM\Column(name: 'cd_processo_etapa', type: 'integer')]
    private ?int $cdProcessoEtapa = null;

    #[ORM\Column(name: 'cd_campo_de', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdCampoDe = '';

    #[ORM\Column(name: 'cd_campo_para', type: 'string', length: 255, options: ['default' => ''])]
    private string $cdCampoPara = '';

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snObrigatorio = false;

    #[ORM\Column(name: 'tp_campo', type: 'enum', nullable: true, options: ['values' => ['CHECKBOX', 'TEXT', 'MEMO', 'MULTISELECT', 'SELECT']])]
    private ?string $tpCampo = null;

    #[ORM\Column(name: 'tp_cadastro', type: 'enum', nullable: true, options: ['default' => 'FICHA', 'values' => ['FICHA', 'PARENTESCO', 'AUTORIZACAO']])]
    private ?string $tpCadastro = 'FICHA';

    public function __construct(
        ?int $cdProcessoEtapa = null,
        string $cdCampoDe = '',
        string $cdCampoPara = '',
        ?int $nrOrdem = null,
        ?bool $snObrigatorio = false,
        ?string $tpCampo = null,
        ?string $tpCadastro = 'FICHA'
    ) {
        $this->cdProcessoEtapa = $cdProcessoEtapa;
        $this->cdCampoDe = $cdCampoDe;
        $this->cdCampoPara = $cdCampoPara;
        $this->nrOrdem = $nrOrdem;
        $this->snObrigatorio = $snObrigatorio;
        $this->tpCampo = $tpCampo;
        $this->tpCadastro = $tpCadastro;
    }

    public function getCdCampoPessoa(): ?int
    {
        return $this->cdCampoPessoa;
    }

    public function getCdProcessoEtapa(): ?int
    {
        return $this->cdProcessoEtapa;
    }

    public function setCdProcessoEtapa(?int $cdProcessoEtapa): self
    {
        $this->cdProcessoEtapa = $cdProcessoEtapa;
        return $this;
    }

    public function getCdCampoDe(): string
    {
        return $this->cdCampoDe;
    }

    public function setCdCampoDe(string $cdCampoDe): self
    {
        $this->cdCampoDe = $cdCampoDe;
        return $this;
    }

    public function getCdCampoPara(): string
    {
        return $this->cdCampoPara;
    }

    public function setCdCampoPara(string $cdCampoPara): self
    {
        $this->cdCampoPara = $cdCampoPara;
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

    public function getTpCampo(): ?string
    {
        return $this->tpCampo;
    }

    public function setTpCampo(?string $tpCampo): self
    {
        $this->tpCampo = $tpCampo;
        return $this;
    }

    public function getTpCadastro(): ?string
    {
        return $this->tpCadastro;
    }

    public function setTpCadastro(?string $tpCadastro): self
    {
        $this->tpCadastro = $tpCadastro;
        return $this;
    }
}
