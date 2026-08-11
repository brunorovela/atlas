<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprCotacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCotacaoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cotacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cotacao_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_CD_SITUACAO', columns: ['cd_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cotacao_ibfk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cotacao_ibfk_3', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'cmpr_cotacao_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCotacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cotacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCotacao = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacaoSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoSituacao $cdSituacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'ds_cotacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsCotacao = null;

    #[ORM\Column(name: 'sn_gera_compromisso', type: 'boolean', nullable: true)]
    private ?bool $snGeraCompromisso = null;

    public function __construct(
        ?CmprCotacaoSituacao $cdSituacao = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?string $dsCotacao = null,
        ?bool $snGeraCompromisso = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->cdPessoa = $cdPessoa;
        $this->dtCadastro = $dtCadastro;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->dsCotacao = $dsCotacao;
        $this->snGeraCompromisso = $snGeraCompromisso;
    }

    public function getCdCotacao(): ?int
    {
        return $this->cdCotacao;
    }

    public function getCdSituacao(): ?CmprCotacaoSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?CmprCotacaoSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getDsCotacao(): ?string
    {
        return $this->dsCotacao;
    }

    public function setDsCotacao(?string $dsCotacao): self
    {
        $this->dsCotacao = $dsCotacao;
        return $this;
    }

    public function isSnGeraCompromisso(): ?bool
    {
        return $this->snGeraCompromisso;
    }

    public function setSnGeraCompromisso(?bool $snGeraCompromisso): self
    {
        $this->snGeraCompromisso = $snGeraCompromisso;
        return $this;
    }
}
