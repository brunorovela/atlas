<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgLiquidacaoAcordoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgLiquidacaoAcordoRepository::class)]
#[ORM\Table(
    name: 'prg_liquidacao_acordo',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'uq_prg_liquidacao_acordo_acordo_mensalidade', columns: ['id_acordo', 'cd_mensalidade'])]
#[ORM\Index(name: 'IDX_ACORDO', columns: ['id_acordo'])]
#[ORM\Index(name: 'idx_prg_liquidacao_acordo_cd_mensalidade', columns: ['cd_mensalidade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ACORDO', 'colunas' => ['id_acordo'], 'tabelaAlvo' => 'prg_acordo', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PrgLiquidacaoAcordo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: PrgAcordo::class)]
    #[ORM\JoinColumn(name: 'id_acordo', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PrgAcordo $idAcordo = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    public function __construct(
        ?PrgAcordo $idAcordo = null,
        ?int $cdMensalidade = null
    ) {
        $this->idAcordo = $idAcordo;
        $this->cdMensalidade = $cdMensalidade;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAcordo(): ?PrgAcordo
    {
        return $this->idAcordo;
    }

    public function setIdAcordo(?PrgAcordo $idAcordo): self
    {
        $this->idAcordo = $idAcordo;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }
}
