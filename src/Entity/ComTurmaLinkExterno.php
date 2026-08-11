<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ComTurmaLinkExternoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComTurmaLinkExternoRepository::class)]
#[ORM\Table(
    name: 'com_turma_link_externo',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'id_turma', columns: ['id_turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_com_turma_link_externo_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ComTurmaLinkExterno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\Column(name: 'link_externo', type: 'string', length: 500)]
    private ?string $linkExterno = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Turmas $idTurma = null,
        ?string $linkExterno = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idTurma = $idTurma;
        $this->linkExterno = $linkExterno;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getLinkExterno(): ?string
    {
        return $this->linkExterno;
    }

    public function setLinkExterno(?string $linkExterno): self
    {
        $this->linkExterno = $linkExterno;
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
