<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BibTitulosExemplaresArqRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibTitulosExemplaresArqRepository::class)]
#[ORM\Table(
    name: 'bib_titulos_exemplares_arq',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_exemplar', columns: ['cd_exemplar'])]
#[ORM\Index(name: 'IX_CD_EXEMPLAR', columns: ['cd_exemplar'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_titulos_exemplares_arq_ibfk_1', 'colunas' => ['cd_exemplar'], 'tabelaAlvo' => 'bib_titulos_exemplares', 'colunasAlvo' => ['cd_exemplar'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibTitulosExemplaresArq
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_exemplar_arquivo', type: 'integer')]
    private ?int $cdExemplarArquivo = null;

    #[ORM\ManyToOne(targetEntity: BibTitulosExemplares::class)]
    #[ORM\JoinColumn(name: 'cd_exemplar', referencedColumnName: 'cd_exemplar', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibTitulosExemplares $cdExemplar = null;

    #[ORM\Column(name: 'sn_capa', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCapa = 0;

    #[ORM\Column(name: 'ds_nome_original', type: 'string', length: 255)]
    private ?string $dsNomeOriginal = null;

    #[ORM\Column(name: 'ds_nome_servidor', type: 'string', length: 40, nullable: true)]
    private ?string $dsNomeServidor = null;

    #[ORM\Column(name: 'bb_arquivo', type: 'blob', length: 65535, nullable: true)]
    private ?string $bbArquivo = null;

    public function __construct(
        ?BibTitulosExemplares $cdExemplar = null,
        int $snCapa = 0,
        ?string $dsNomeOriginal = null,
        ?string $dsNomeServidor = null,
        ?string $bbArquivo = null
    ) {
        $this->cdExemplar = $cdExemplar;
        $this->snCapa = $snCapa;
        $this->dsNomeOriginal = $dsNomeOriginal;
        $this->dsNomeServidor = $dsNomeServidor;
        $this->bbArquivo = $bbArquivo;
    }

    public function getCdExemplarArquivo(): ?int
    {
        return $this->cdExemplarArquivo;
    }

    public function getCdExemplar(): ?BibTitulosExemplares
    {
        return $this->cdExemplar;
    }

    public function setCdExemplar(?BibTitulosExemplares $cdExemplar): self
    {
        $this->cdExemplar = $cdExemplar;
        return $this;
    }

    public function getSnCapa(): int
    {
        return $this->snCapa;
    }

    public function setSnCapa(int $snCapa): self
    {
        $this->snCapa = $snCapa;
        return $this;
    }

    public function getDsNomeOriginal(): ?string
    {
        return $this->dsNomeOriginal;
    }

    public function setDsNomeOriginal(?string $dsNomeOriginal): self
    {
        $this->dsNomeOriginal = $dsNomeOriginal;
        return $this;
    }

    public function getDsNomeServidor(): ?string
    {
        return $this->dsNomeServidor;
    }

    public function setDsNomeServidor(?string $dsNomeServidor): self
    {
        $this->dsNomeServidor = $dsNomeServidor;
        return $this;
    }

    public function getBbArquivo(): ?string
    {
        return $this->bbArquivo;
    }

    public function setBbArquivo(?string $bbArquivo): self
    {
        $this->bbArquivo = $bbArquivo;
        return $this;
    }
}
