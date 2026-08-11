<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ArvoreLivroColigadaMatrizRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArvoreLivroColigadaMatrizRepository::class)]
#[ORM\Table(
    name: 'arvore_livro_coligada_matriz',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_coligada_matriz_cd_coligada_matriz', columns: ['cd_coligada_matriz'])]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_coligada_matriz_coligada_matriz_arvore', columns: ['coligada_matriz_arvore'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_arvore_livro_coligada_matriz_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ArvoreLivroColigadaMatriz
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'coligada_matriz_arvore', type: 'string', length: 255, options: ['default' => ''])]
    private string $coligadaMatrizArvore = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ColigadasMatriz $cdColigadaMatriz = null,
        string $coligadaMatrizArvore = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->coligadaMatrizArvore = $coligadaMatrizArvore;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getColigadaMatrizArvore(): string
    {
        return $this->coligadaMatrizArvore;
    }

    public function setColigadaMatrizArvore(string $coligadaMatrizArvore): self
    {
        $this->coligadaMatrizArvore = $coligadaMatrizArvore;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
