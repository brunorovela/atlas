<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ArvoreLivroColigadaFilhaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArvoreLivroColigadaFilhaRepository::class)]
#[ORM\Table(
    name: 'arvore_livro_coligada_filha',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_coligada_filha_cd_coligada_filha', columns: ['cd_coligada_filha'])]
#[ORM\UniqueConstraint(name: 'UN_arvore_livro_coligada_filha_coligada_filha_arvore', columns: ['coligada_filha_arvore'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_arvore_livro_coligada_filha_coligadas', 'colunas' => ['cd_coligada_filha'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ArvoreLivroColigadaFilha
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_filha', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigadaFilha = null;

    #[ORM\Column(name: 'coligada_filha_arvore', type: 'string', length: 255, options: ['default' => ''])]
    private string $coligadaFilhaArvore = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Coligadas $cdColigadaFilha = null,
        string $coligadaFilhaArvore = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigadaFilha = $cdColigadaFilha;
        $this->coligadaFilhaArvore = $coligadaFilhaArvore;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdColigadaFilha(): ?Coligadas
    {
        return $this->cdColigadaFilha;
    }

    public function setCdColigadaFilha(?Coligadas $cdColigadaFilha): self
    {
        $this->cdColigadaFilha = $cdColigadaFilha;
        return $this;
    }

    public function getColigadaFilhaArvore(): string
    {
        return $this->coligadaFilhaArvore;
    }

    public function setColigadaFilhaArvore(string $coligadaFilhaArvore): self
    {
        $this->coligadaFilhaArvore = $coligadaFilhaArvore;
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
