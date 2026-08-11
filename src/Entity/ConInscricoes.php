<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConInscricoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConInscricoesRepository::class)]
#[ORM\Table(
    name: 'con_inscricoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_inscricao', columns: ['cd_inscricao'])]
#[ORM\UniqueConstraint(name: 'UK_INSCRICAO', columns: ['cd_concurso', 'cd_pessoa', 'cd_area'])]
#[ORM\Index(name: 'IX_CD_CONCURSO', columns: ['cd_concurso'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class ConInscricoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricao = null;

    #[ORM\Column(name: 'cd_concurso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConcurso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'nr_classificacao', type: 'integer', nullable: true)]
    private ?int $nrClassificacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'nr_media', type: 'float', nullable: true)]
    private ?float $nrMedia = null;

    #[ORM\Column(name: 'nr_classificacao_interna', type: 'integer', nullable: true)]
    private ?int $nrClassificacaoInterna = null;

    #[ORM\Column(name: 'sn_faltante', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snFaltante = false;

    #[ORM\Column(name: 'cd_area', type: 'integer', nullable: true)]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'sn_apto', type: 'boolean', nullable: true)]
    private ?bool $snApto = null;

    public function __construct(
        ?int $cdConcurso = null,
        ?int $cdPessoa = null,
        ?int $cdSituacao = null,
        ?int $nrClassificacao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?float $nrMedia = null,
        ?int $nrClassificacaoInterna = null,
        ?bool $snFaltante = false,
        ?int $cdArea = null,
        ?bool $snApto = null
    ) {
        $this->cdConcurso = $cdConcurso;
        $this->cdPessoa = $cdPessoa;
        $this->cdSituacao = $cdSituacao;
        $this->nrClassificacao = $nrClassificacao;
        $this->dtCadastro = $dtCadastro;
        $this->nrMedia = $nrMedia;
        $this->nrClassificacaoInterna = $nrClassificacaoInterna;
        $this->snFaltante = $snFaltante;
        $this->cdArea = $cdArea;
        $this->snApto = $snApto;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function getCdConcurso(): ?int
    {
        return $this->cdConcurso;
    }

    public function setCdConcurso(?int $cdConcurso): self
    {
        $this->cdConcurso = $cdConcurso;
        return $this;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrClassificacao(): ?int
    {
        return $this->nrClassificacao;
    }

    public function setNrClassificacao(?int $nrClassificacao): self
    {
        $this->nrClassificacao = $nrClassificacao;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    public function getNrMedia(): ?float
    {
        return $this->nrMedia;
    }

    public function setNrMedia(?float $nrMedia): self
    {
        $this->nrMedia = $nrMedia;
        return $this;
    }

    public function getNrClassificacaoInterna(): ?int
    {
        return $this->nrClassificacaoInterna;
    }

    public function setNrClassificacaoInterna(?int $nrClassificacaoInterna): self
    {
        $this->nrClassificacaoInterna = $nrClassificacaoInterna;
        return $this;
    }

    public function isSnFaltante(): ?bool
    {
        return $this->snFaltante;
    }

    public function setSnFaltante(?bool $snFaltante): self
    {
        $this->snFaltante = $snFaltante;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function isSnApto(): ?bool
    {
        return $this->snApto;
    }

    public function setSnApto(?bool $snApto): self
    {
        $this->snApto = $snApto;
        return $this;
    }
}
