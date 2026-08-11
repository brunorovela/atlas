<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimSalaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimSalaRepository::class)]
#[ORM\Table(
    name: 'unim_sala',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_coligada', columns: ['cd_coligada'])]
#[ORM\Index(name: 'cd_pessoa_fornecedor', columns: ['cd_pessoa_fornecedor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'unim_sala_ibfk_1', 'colunas' => ['cd_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_sala_ibfk_2', 'colunas' => ['cd_pessoa_fornecedor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimSala
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'cd_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $cdColigada = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_fornecedor', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaFornecedor = null;

    #[ORM\Column(name: 'ds_sala', type: 'string', length: 255, nullable: true)]
    private ?string $dsSala = null;

    #[ORM\Column(name: 'nr_qtd_vagas', type: 'integer', nullable: true)]
    private ?int $nrQtdVagas = null;

    #[ORM\Column(name: 'nr_intervalo_uso', type: 'integer', nullable: true)]
    private ?int $nrIntervaloUso = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true)]
    private ?bool $snAtivo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Coligadas $cdColigada = null,
        ?Pessoas $cdPessoaFornecedor = null,
        ?string $dsSala = null,
        ?int $nrQtdVagas = null,
        ?int $nrIntervaloUso = null,
        ?bool $snAtivo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdColigada = $cdColigada;
        $this->cdPessoaFornecedor = $cdPessoaFornecedor;
        $this->dsSala = $dsSala;
        $this->nrQtdVagas = $nrQtdVagas;
        $this->nrIntervaloUso = $nrIntervaloUso;
        $this->snAtivo = $snAtivo;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdColigada(): ?Coligadas
    {
        return $this->cdColigada;
    }

    public function setCdColigada(?Coligadas $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdPessoaFornecedor(): ?Pessoas
    {
        return $this->cdPessoaFornecedor;
    }

    public function setCdPessoaFornecedor(?Pessoas $cdPessoaFornecedor): self
    {
        $this->cdPessoaFornecedor = $cdPessoaFornecedor;
        return $this;
    }

    public function getDsSala(): ?string
    {
        return $this->dsSala;
    }

    public function setDsSala(?string $dsSala): self
    {
        $this->dsSala = $dsSala;
        return $this;
    }

    public function getNrQtdVagas(): ?int
    {
        return $this->nrQtdVagas;
    }

    public function setNrQtdVagas(?int $nrQtdVagas): self
    {
        $this->nrQtdVagas = $nrQtdVagas;
        return $this;
    }

    public function getNrIntervaloUso(): ?int
    {
        return $this->nrIntervaloUso;
    }

    public function setNrIntervaloUso(?int $nrIntervaloUso): self
    {
        $this->nrIntervaloUso = $nrIntervaloUso;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
