<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasBolsasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasBolsasRepository::class)]
#[ORM\Table(
    name: 'pessoas_bolsas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_pessoa_curso_ano', columns: ['cd_pessoa', 'nr_ano_censo', 'cd_curso'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class PessoasBolsas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_bolsa', type: 'integer')]
    private ?int $cdPessoaBolsa = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_re_fies', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snReFies = false;

    #[ORM\Column(name: 'sn_re_governo_estadual', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snReGovernoEstadual = false;

    #[ORM\Column(name: 'sn_re_governo_municipal', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snReGovernoMunicipal = false;

    #[ORM\Column(name: 'sn_re_ies', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snReIes = false;

    #[ORM\Column(name: 'sn_re_entidades_externas', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snReEntidadesExternas = false;

    #[ORM\Column(name: 'sn_re_outros', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snReOutros = false;

    #[ORM\Column(name: 'sn_nre_prouni_integral', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreProuniIntegral = false;

    #[ORM\Column(name: 'sn_nre_prouni_parcial', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreProuniParcial = false;

    #[ORM\Column(name: 'sn_nre_ies', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreIes = false;

    #[ORM\Column(name: 'sn_nre_governo_estadual', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreGovernoEstadual = false;

    #[ORM\Column(name: 'sn_nre_governo_municipal', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreGovernoMunicipal = false;

    #[ORM\Column(name: 'sn_nre_entidades_externas', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreEntidadesExternas = false;

    #[ORM\Column(name: 'sn_nre_outros', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snNreOutros = false;

    #[ORM\Column(name: 'sn_as_alimentacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAsAlimentacao = false;

    #[ORM\Column(name: 'sn_as_moradia', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAsMoradia = false;

    #[ORM\Column(name: 'sn_as_transporte', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAsTransporte = false;

    #[ORM\Column(name: 'sn_as_mat_didatico', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAsMatDidatico = false;

    #[ORM\Column(name: 'sn_as_bolsa_trabalho', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAsBolsaTrabalho = false;

    #[ORM\Column(name: 'sn_as_bolsa_permanencia', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAsBolsaPermanencia = false;

    #[ORM\Column(name: 'sn_at_complementar', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtComplementar = false;

    #[ORM\Column(name: 'sn_at_pesquisa', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtPesquisa = false;

    #[ORM\Column(name: 'sn_at_extensao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtExtensao = false;

    #[ORM\Column(name: 'sn_at_monitoria', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtMonitoria = false;

    #[ORM\Column(name: 'sn_at_extracurricular', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtExtracurricular = false;

    #[ORM\Column(name: 'sn_at_re_pesquisa', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtRePesquisa = false;

    #[ORM\Column(name: 'sn_at_re_extensao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtReExtensao = false;

    #[ORM\Column(name: 'sn_at_re_monitoria', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtReMonitoria = false;

    #[ORM\Column(name: 'sn_at_re_extracurricular', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtReExtracurricular = false;

    #[ORM\Column(name: 'nr_ano_censo', type: 'integer', nullable: true)]
    private ?int $nrAnoCenso = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 15, nullable: true, options: ['default' => ''])]
    private ?string $cdCurso = '';

    #[ORM\Column(name: 'sn_parfor', type: 'boolean', nullable: true)]
    private ?bool $snParfor = null;

    #[ORM\Column(name: 'sn_bolsa_educa_mais_brasil', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snBolsaEducaMaisBrasil = 0;

    // Sem construtor: 33 propriedades. Use os setters encadeados.

    public function getCdPessoaBolsa(): ?int
    {
        return $this->cdPessoaBolsa;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function isSnReFies(): ?bool
    {
        return $this->snReFies;
    }

    public function setSnReFies(?bool $snReFies): self
    {
        $this->snReFies = $snReFies;
        return $this;
    }

    public function isSnReGovernoEstadual(): ?bool
    {
        return $this->snReGovernoEstadual;
    }

    public function setSnReGovernoEstadual(?bool $snReGovernoEstadual): self
    {
        $this->snReGovernoEstadual = $snReGovernoEstadual;
        return $this;
    }

    public function isSnReGovernoMunicipal(): ?bool
    {
        return $this->snReGovernoMunicipal;
    }

    public function setSnReGovernoMunicipal(?bool $snReGovernoMunicipal): self
    {
        $this->snReGovernoMunicipal = $snReGovernoMunicipal;
        return $this;
    }

    public function isSnReIes(): ?bool
    {
        return $this->snReIes;
    }

    public function setSnReIes(?bool $snReIes): self
    {
        $this->snReIes = $snReIes;
        return $this;
    }

    public function isSnReEntidadesExternas(): ?bool
    {
        return $this->snReEntidadesExternas;
    }

    public function setSnReEntidadesExternas(?bool $snReEntidadesExternas): self
    {
        $this->snReEntidadesExternas = $snReEntidadesExternas;
        return $this;
    }

    public function isSnReOutros(): ?bool
    {
        return $this->snReOutros;
    }

    public function setSnReOutros(?bool $snReOutros): self
    {
        $this->snReOutros = $snReOutros;
        return $this;
    }

    public function isSnNreProuniIntegral(): ?bool
    {
        return $this->snNreProuniIntegral;
    }

    public function setSnNreProuniIntegral(?bool $snNreProuniIntegral): self
    {
        $this->snNreProuniIntegral = $snNreProuniIntegral;
        return $this;
    }

    public function isSnNreProuniParcial(): ?bool
    {
        return $this->snNreProuniParcial;
    }

    public function setSnNreProuniParcial(?bool $snNreProuniParcial): self
    {
        $this->snNreProuniParcial = $snNreProuniParcial;
        return $this;
    }

    public function isSnNreIes(): ?bool
    {
        return $this->snNreIes;
    }

    public function setSnNreIes(?bool $snNreIes): self
    {
        $this->snNreIes = $snNreIes;
        return $this;
    }

    public function isSnNreGovernoEstadual(): ?bool
    {
        return $this->snNreGovernoEstadual;
    }

    public function setSnNreGovernoEstadual(?bool $snNreGovernoEstadual): self
    {
        $this->snNreGovernoEstadual = $snNreGovernoEstadual;
        return $this;
    }

    public function isSnNreGovernoMunicipal(): ?bool
    {
        return $this->snNreGovernoMunicipal;
    }

    public function setSnNreGovernoMunicipal(?bool $snNreGovernoMunicipal): self
    {
        $this->snNreGovernoMunicipal = $snNreGovernoMunicipal;
        return $this;
    }

    public function isSnNreEntidadesExternas(): ?bool
    {
        return $this->snNreEntidadesExternas;
    }

    public function setSnNreEntidadesExternas(?bool $snNreEntidadesExternas): self
    {
        $this->snNreEntidadesExternas = $snNreEntidadesExternas;
        return $this;
    }

    public function isSnNreOutros(): ?bool
    {
        return $this->snNreOutros;
    }

    public function setSnNreOutros(?bool $snNreOutros): self
    {
        $this->snNreOutros = $snNreOutros;
        return $this;
    }

    public function isSnAsAlimentacao(): ?bool
    {
        return $this->snAsAlimentacao;
    }

    public function setSnAsAlimentacao(?bool $snAsAlimentacao): self
    {
        $this->snAsAlimentacao = $snAsAlimentacao;
        return $this;
    }

    public function isSnAsMoradia(): ?bool
    {
        return $this->snAsMoradia;
    }

    public function setSnAsMoradia(?bool $snAsMoradia): self
    {
        $this->snAsMoradia = $snAsMoradia;
        return $this;
    }

    public function isSnAsTransporte(): ?bool
    {
        return $this->snAsTransporte;
    }

    public function setSnAsTransporte(?bool $snAsTransporte): self
    {
        $this->snAsTransporte = $snAsTransporte;
        return $this;
    }

    public function isSnAsMatDidatico(): ?bool
    {
        return $this->snAsMatDidatico;
    }

    public function setSnAsMatDidatico(?bool $snAsMatDidatico): self
    {
        $this->snAsMatDidatico = $snAsMatDidatico;
        return $this;
    }

    public function isSnAsBolsaTrabalho(): ?bool
    {
        return $this->snAsBolsaTrabalho;
    }

    public function setSnAsBolsaTrabalho(?bool $snAsBolsaTrabalho): self
    {
        $this->snAsBolsaTrabalho = $snAsBolsaTrabalho;
        return $this;
    }

    public function isSnAsBolsaPermanencia(): ?bool
    {
        return $this->snAsBolsaPermanencia;
    }

    public function setSnAsBolsaPermanencia(?bool $snAsBolsaPermanencia): self
    {
        $this->snAsBolsaPermanencia = $snAsBolsaPermanencia;
        return $this;
    }

    public function isSnAtComplementar(): ?bool
    {
        return $this->snAtComplementar;
    }

    public function setSnAtComplementar(?bool $snAtComplementar): self
    {
        $this->snAtComplementar = $snAtComplementar;
        return $this;
    }

    public function isSnAtPesquisa(): ?bool
    {
        return $this->snAtPesquisa;
    }

    public function setSnAtPesquisa(?bool $snAtPesquisa): self
    {
        $this->snAtPesquisa = $snAtPesquisa;
        return $this;
    }

    public function isSnAtExtensao(): ?bool
    {
        return $this->snAtExtensao;
    }

    public function setSnAtExtensao(?bool $snAtExtensao): self
    {
        $this->snAtExtensao = $snAtExtensao;
        return $this;
    }

    public function isSnAtMonitoria(): ?bool
    {
        return $this->snAtMonitoria;
    }

    public function setSnAtMonitoria(?bool $snAtMonitoria): self
    {
        $this->snAtMonitoria = $snAtMonitoria;
        return $this;
    }

    public function isSnAtExtracurricular(): ?bool
    {
        return $this->snAtExtracurricular;
    }

    public function setSnAtExtracurricular(?bool $snAtExtracurricular): self
    {
        $this->snAtExtracurricular = $snAtExtracurricular;
        return $this;
    }

    public function isSnAtRePesquisa(): ?bool
    {
        return $this->snAtRePesquisa;
    }

    public function setSnAtRePesquisa(?bool $snAtRePesquisa): self
    {
        $this->snAtRePesquisa = $snAtRePesquisa;
        return $this;
    }

    public function isSnAtReExtensao(): ?bool
    {
        return $this->snAtReExtensao;
    }

    public function setSnAtReExtensao(?bool $snAtReExtensao): self
    {
        $this->snAtReExtensao = $snAtReExtensao;
        return $this;
    }

    public function isSnAtReMonitoria(): ?bool
    {
        return $this->snAtReMonitoria;
    }

    public function setSnAtReMonitoria(?bool $snAtReMonitoria): self
    {
        $this->snAtReMonitoria = $snAtReMonitoria;
        return $this;
    }

    public function isSnAtReExtracurricular(): ?bool
    {
        return $this->snAtReExtracurricular;
    }

    public function setSnAtReExtracurricular(?bool $snAtReExtracurricular): self
    {
        $this->snAtReExtracurricular = $snAtReExtracurricular;
        return $this;
    }

    public function getNrAnoCenso(): ?int
    {
        return $this->nrAnoCenso;
    }

    public function setNrAnoCenso(?int $nrAnoCenso): self
    {
        $this->nrAnoCenso = $nrAnoCenso;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function isSnParfor(): ?bool
    {
        return $this->snParfor;
    }

    public function setSnParfor(?bool $snParfor): self
    {
        $this->snParfor = $snParfor;
        return $this;
    }

    public function getSnBolsaEducaMaisBrasil(): ?int
    {
        return $this->snBolsaEducaMaisBrasil;
    }

    public function setSnBolsaEducaMaisBrasil(?int $snBolsaEducaMaisBrasil): self
    {
        $this->snBolsaEducaMaisBrasil = $snBolsaEducaMaisBrasil;
        return $this;
    }
}
