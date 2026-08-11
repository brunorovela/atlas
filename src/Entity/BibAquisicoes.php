<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibAquisicoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAquisicoesRepository::class)]
#[ORM\Table(
    name: 'bib_aquisicoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_aquisicao_tipo', columns: ['cd_aquisicao_tipo'])]
#[ORM\Index(name: 'IX_CD_AQUISICAO_TIPO', columns: ['cd_aquisicao_tipo'])]
#[ORM\Index(name: 'FK_bib_aquisicoes_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_aquisicoes_ibfk_1', 'colunas' => ['cd_aquisicao_tipo'], 'tabelaAlvo' => 'bib_aquisicoes_tipos', 'colunasAlvo' => ['cd_aquisicao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_bib_aquisicoes_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibAquisicoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_aquisicao', type: 'integer')]
    private ?int $cdAquisicao = null;

    #[ORM\ManyToOne(targetEntity: BibAquisicoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_aquisicao_tipo', referencedColumnName: 'cd_aquisicao_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAquisicoesTipos $cdAquisicaoTipo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_aquisicao', type: 'datetime')]
    private ?\DateTimeInterface $dtAquisicao = null;

    #[ORM\Column(name: 'ds_aquisicao', type: 'string', length: 255)]
    private ?string $dsAquisicao = null;

    #[ORM\Column(name: 'ds_doador', type: 'string', length: 255, nullable: true)]
    private ?string $dsDoador = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?BibAquisicoesTipos $cdAquisicaoTipo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtAquisicao = null,
        ?string $dsAquisicao = null,
        ?string $dsDoador = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->cdAquisicaoTipo = $cdAquisicaoTipo;
        $this->dtCadastro = $dtCadastro;
        $this->dtAquisicao = $dtAquisicao;
        $this->dsAquisicao = $dsAquisicao;
        $this->dsDoador = $dsDoador;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdAquisicao(): ?int
    {
        return $this->cdAquisicao;
    }

    public function getCdAquisicaoTipo(): ?BibAquisicoesTipos
    {
        return $this->cdAquisicaoTipo;
    }

    public function setCdAquisicaoTipo(?BibAquisicoesTipos $cdAquisicaoTipo): self
    {
        $this->cdAquisicaoTipo = $cdAquisicaoTipo;
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

    public function getDtAquisicao(): ?\DateTimeInterface
    {
        return $this->dtAquisicao;
    }

    public function setDtAquisicao(?\DateTimeInterface $dtAquisicao): self
    {
        $this->dtAquisicao = $dtAquisicao;
        return $this;
    }

    public function getDsAquisicao(): ?string
    {
        return $this->dsAquisicao;
    }

    public function setDsAquisicao(?string $dsAquisicao): self
    {
        $this->dsAquisicao = $dsAquisicao;
        return $this;
    }

    public function getDsDoador(): ?string
    {
        return $this->dsDoador;
    }

    public function setDsDoador(?string $dsDoador): self
    {
        $this->dsDoador = $dsDoador;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
