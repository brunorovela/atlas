<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibBibliotecasLocalizacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibBibliotecasLocalizacoesRepository::class)]
#[ORM\Table(
    name: 'bib_bibliotecas_localizacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_biblioteca', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'cd_localizacao_tipo', columns: ['cd_localizacao_tipo'])]
#[ORM\Index(name: 'IX_CD_BIBLIOTECA', columns: ['cd_biblioteca'])]
#[ORM\Index(name: 'IX_CD_LOCALIZACAO_TIPO', columns: ['cd_localizacao_tipo'])]
#[ORM\Index(name: 'IX_CD_LOCALIZACAO_MAE', columns: ['cd_localizacao_mae'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_bibliotecas_localizacoes_ibfk_1', 'colunas' => ['cd_biblioteca'], 'tabelaAlvo' => 'bib_bibliotecas', 'colunasAlvo' => ['cd_biblioteca'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'bib_bibliotecas_localizacoes_ibfk_2', 'colunas' => ['cd_localizacao_tipo'], 'tabelaAlvo' => 'bib_localizacoes_tipos', 'colunasAlvo' => ['cd_localizacao_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibBibliotecasLocalizacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_localizacao', type: 'integer')]
    private ?int $cdLocalizacao = null;

    #[ORM\ManyToOne(targetEntity: BibBibliotecas::class)]
    #[ORM\JoinColumn(name: 'cd_biblioteca', referencedColumnName: 'cd_biblioteca', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibBibliotecas $cdBiblioteca = null;

    #[ORM\Column(name: 'nr_posicao', type: 'integer', nullable: true)]
    private ?int $nrPosicao = null;

    #[ORM\Column(name: 'ds_localizacao', type: 'string', length: 100, nullable: true)]
    private ?string $dsLocalizacao = null;

    #[ORM\ManyToOne(targetEntity: BibLocalizacoesTipos::class)]
    #[ORM\JoinColumn(name: 'cd_localizacao_tipo', referencedColumnName: 'cd_localizacao_tipo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibLocalizacoesTipos $cdLocalizacaoTipo = null;

    #[ORM\Column(name: 'cd_localizacao_mae', type: 'integer', nullable: true)]
    private ?int $cdLocalizacaoMae = null;

    public function __construct(
        ?BibBibliotecas $cdBiblioteca = null,
        ?int $nrPosicao = null,
        ?string $dsLocalizacao = null,
        ?BibLocalizacoesTipos $cdLocalizacaoTipo = null,
        ?int $cdLocalizacaoMae = null
    ) {
        $this->cdBiblioteca = $cdBiblioteca;
        $this->nrPosicao = $nrPosicao;
        $this->dsLocalizacao = $dsLocalizacao;
        $this->cdLocalizacaoTipo = $cdLocalizacaoTipo;
        $this->cdLocalizacaoMae = $cdLocalizacaoMae;
    }

    public function getCdLocalizacao(): ?int
    {
        return $this->cdLocalizacao;
    }

    public function getCdBiblioteca(): ?BibBibliotecas
    {
        return $this->cdBiblioteca;
    }

    public function setCdBiblioteca(?BibBibliotecas $cdBiblioteca): self
    {
        $this->cdBiblioteca = $cdBiblioteca;
        return $this;
    }

    public function getNrPosicao(): ?int
    {
        return $this->nrPosicao;
    }

    public function setNrPosicao(?int $nrPosicao): self
    {
        $this->nrPosicao = $nrPosicao;
        return $this;
    }

    public function getDsLocalizacao(): ?string
    {
        return $this->dsLocalizacao;
    }

    public function setDsLocalizacao(?string $dsLocalizacao): self
    {
        $this->dsLocalizacao = $dsLocalizacao;
        return $this;
    }

    public function getCdLocalizacaoTipo(): ?BibLocalizacoesTipos
    {
        return $this->cdLocalizacaoTipo;
    }

    public function setCdLocalizacaoTipo(?BibLocalizacoesTipos $cdLocalizacaoTipo): self
    {
        $this->cdLocalizacaoTipo = $cdLocalizacaoTipo;
        return $this;
    }

    public function getCdLocalizacaoMae(): ?int
    {
        return $this->cdLocalizacaoMae;
    }

    public function setCdLocalizacaoMae(?int $cdLocalizacaoMae): self
    {
        $this->cdLocalizacaoMae = $cdLocalizacaoMae;
        return $this;
    }
}
