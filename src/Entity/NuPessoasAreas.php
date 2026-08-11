<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\NuPessoasAreasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuPessoasAreasRepository::class)]
#[ORM\Table(
    name: 'nu_pessoas_areas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'codigo', columns: ['codigo'])]
#[ORM\UniqueConstraint(name: 'ChaveUnica', columns: ['cd_area', 'cd_chave', 'cd_pessoa'])]
#[ORM\Index(name: 'cd_area', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_CHAVE', columns: ['cd_chave'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'nu_pessoas_areas_ibfk_1', 'colunas' => ['cd_area'], 'tabelaAlvo' => 'nu_areas', 'colunasAlvo' => ['cd_area'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class NuPessoasAreas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer', options: ['unsigned' => true])]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_chave', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdChave = 0;

    #[ORM\ManyToOne(targetEntity: NuAreas::class)]
    #[ORM\JoinColumn(name: 'cd_area', referencedColumnName: 'cd_area', nullable: false, options: ['default' => '1', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuAreas $cdArea = null;

    #[ORM\Column(name: 'sn_padrao', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPadrao = 0;

    public function __construct(
        ?int $cdPessoa = null,
        int $cdChave = 0,
        ?NuAreas $cdArea = null,
        int $snPadrao = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdChave = $cdChave;
        $this->cdArea = $cdArea;
        $this->snPadrao = $snPadrao;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdChave(): int
    {
        return $this->cdChave;
    }

    public function setCdChave(int $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }

    public function getCdArea(): ?NuAreas
    {
        return $this->cdArea;
    }

    public function setCdArea(?NuAreas $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getSnPadrao(): int
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(int $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }
}
