<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinEstudantilResponsavelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinEstudantilResponsavelRepository::class)]
#[ORM\Table(
    name: 'fin_estudantil_responsavel',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_FIN_ESTUDANTIL_ID', columns: ['fin_estudantil_id'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_DT_EXCLUIDO', columns: ['dt_excluido'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_estudantil_id', 'colunas' => ['fin_estudantil_id'], 'tabelaAlvo' => 'fin_estudantil', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_fin_estudantil_cd_pessoa', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinEstudantilResponsavel
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: FinEstudantil::class)]
    #[ORM\JoinColumn(name: 'fin_estudantil_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinEstudantil $finEstudantilId = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?FinEstudantil $finEstudantilId = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->finEstudantilId = $finEstudantilId;
        $this->cdPessoa = $cdPessoa;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFinEstudantilId(): ?FinEstudantil
    {
        return $this->finEstudantilId;
    }

    public function setFinEstudantilId(?FinEstudantil $finEstudantilId): self
    {
        $this->finEstudantilId = $finEstudantilId;
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

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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
