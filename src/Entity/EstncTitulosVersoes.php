<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncTitulosVersoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncTitulosVersoesRepository::class)]
#[ORM\Table(
    name: 'estnc_titulos_versoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TITULOS_VERSOES_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TITULOS_VERSOES_TITULO', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'estnc_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncTitulosVersoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_titulo_versao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTituloVersao = null;

    #[ORM\ManyToOne(targetEntity: EstncTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncTitulos $cdTitulo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsArquivo = null;

    public function __construct(
        ?EstncTitulos $cdTitulo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsArquivo = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->dtCadastro = $dtCadastro;
        $this->dsArquivo = $dsArquivo;
    }

    public function getCdTituloVersao(): ?int
    {
        return $this->cdTituloVersao;
    }

    public function getCdTitulo(): ?EstncTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?EstncTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
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

    public function getDsArquivo(): ?string
    {
        return $this->dsArquivo;
    }

    public function setDsArquivo(?string $dsArquivo): self
    {
        $this->dsArquivo = $dsArquivo;
        return $this;
    }
}
