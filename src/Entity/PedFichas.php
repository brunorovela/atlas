<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PedFichasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedFichasRepository::class)]
#[ORM\Table(
    name: 'ped_fichas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_ped_fichas_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ped_fichas_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PedFichas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ficha', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFicha = null;

    #[ORM\Column(name: 'nm_ficha', type: 'string', length: 255)]
    private ?string $nmFicha = null;

    #[ORM\Column(name: 'sn_observacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snObservacao = 0;

    #[ORM\Column(name: 'sn_observacao_disciplina', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snObservacaoDisciplina = 1;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $nmFicha = null,
        ?int $snObservacao = 0,
        ?int $snObservacaoDisciplina = 1,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->nmFicha = $nmFicha;
        $this->snObservacao = $snObservacao;
        $this->snObservacaoDisciplina = $snObservacaoDisciplina;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdFicha(): ?int
    {
        return $this->cdFicha;
    }

    public function getNmFicha(): ?string
    {
        return $this->nmFicha;
    }

    public function setNmFicha(?string $nmFicha): self
    {
        $this->nmFicha = $nmFicha;
        return $this;
    }

    public function getSnObservacao(): ?int
    {
        return $this->snObservacao;
    }

    public function setSnObservacao(?int $snObservacao): self
    {
        $this->snObservacao = $snObservacao;
        return $this;
    }

    public function getSnObservacaoDisciplina(): ?int
    {
        return $this->snObservacaoDisciplina;
    }

    public function setSnObservacaoDisciplina(?int $snObservacaoDisciplina): self
    {
        $this->snObservacaoDisciplina = $snObservacaoDisciplina;
        return $this;
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
}
