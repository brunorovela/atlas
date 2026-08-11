<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PlauAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauAnexoRepository::class)]
#[ORM\Table(
    name: 'plau_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_ARQUIVO', columns: ['cd_arquivo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_anexo_ibfk_1', 'colunas' => ['cd_arquivo'], 'tabelaAlvo' => 'plau_anexo_arquivo', 'colunasAlvo' => ['cd_arquivo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_anexo_ibfk_2', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'plau_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\ManyToOne(targetEntity: PlauAnexoArquivo::class)]
    #[ORM\JoinColumn(name: 'cd_arquivo', referencedColumnName: 'cd_arquivo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAnexoArquivo $cdArquivo = null;

    #[ORM\ManyToOne(targetEntity: PlauAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAtividade $cdAtividade = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_copia', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCopia = null;

    #[ORM\Column(name: 'sn_frente_verso', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snFrenteVerso = null;

    #[ORM\Column(name: 'sn_colorido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snColorido = null;

    #[ORM\Column(name: 'nr_copia', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrCopia = null;

    public function __construct(
        ?PlauAnexoArquivo $cdArquivo = null,
        ?PlauAtividade $cdAtividade = null,
        ?string $dsDescricao = null,
        ?int $snCopia = null,
        ?int $snFrenteVerso = null,
        ?int $snColorido = null,
        ?int $nrCopia = null
    ) {
        $this->cdArquivo = $cdArquivo;
        $this->cdAtividade = $cdAtividade;
        $this->dsDescricao = $dsDescricao;
        $this->snCopia = $snCopia;
        $this->snFrenteVerso = $snFrenteVerso;
        $this->snColorido = $snColorido;
        $this->nrCopia = $nrCopia;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdArquivo(): ?PlauAnexoArquivo
    {
        return $this->cdArquivo;
    }

    public function setCdArquivo(?PlauAnexoArquivo $cdArquivo): self
    {
        $this->cdArquivo = $cdArquivo;
        return $this;
    }

    public function getCdAtividade(): ?PlauAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?PlauAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getSnCopia(): ?int
    {
        return $this->snCopia;
    }

    public function setSnCopia(?int $snCopia): self
    {
        $this->snCopia = $snCopia;
        return $this;
    }

    public function getSnFrenteVerso(): ?int
    {
        return $this->snFrenteVerso;
    }

    public function setSnFrenteVerso(?int $snFrenteVerso): self
    {
        $this->snFrenteVerso = $snFrenteVerso;
        return $this;
    }

    public function getSnColorido(): ?int
    {
        return $this->snColorido;
    }

    public function setSnColorido(?int $snColorido): self
    {
        $this->snColorido = $snColorido;
        return $this;
    }

    public function getNrCopia(): ?int
    {
        return $this->nrCopia;
    }

    public function setNrCopia(?int $nrCopia): self
    {
        $this->nrCopia = $nrCopia;
        return $this;
    }
}
