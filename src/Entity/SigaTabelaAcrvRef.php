<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SigaTabelaAcrvRefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigaTabelaAcrvRefRepository::class)]
#[ORM\Table(
    name: 'siga_tabela_acrv_ref',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_siga', columns: ['cd_siga'])]
#[ORM\Index(name: 'cd_referencia', columns: ['cd_referencia'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'siga_tabela_acrv_ref_ibfk_1', 'colunas' => ['cd_siga'], 'tabelaAlvo' => 'siga_tabela', 'colunasAlvo' => ['cd_siga'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'siga_tabela_acrv_ref_ibfk_2', 'colunas' => ['cd_referencia'], 'tabelaAlvo' => 'acrv_referencia', 'colunasAlvo' => ['cd_referencia'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SigaTabelaAcrvRef
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tabela_ref', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTabelaRef = null;

    #[ORM\ManyToOne(targetEntity: SigaTabela::class)]
    #[ORM\JoinColumn(name: 'cd_siga', referencedColumnName: 'cd_siga', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaTabela $cdSiga = null;

    #[ORM\ManyToOne(targetEntity: AcrvReferencia::class)]
    #[ORM\JoinColumn(name: 'cd_referencia', referencedColumnName: 'cd_referencia', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvReferencia $cdReferencia = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?SigaTabela $cdSiga = null,
        ?AcrvReferencia $cdReferencia = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSiga = $cdSiga;
        $this->cdReferencia = $cdReferencia;
        $this->dtBase = $dtBase;
    }

    public function getCdTabelaRef(): ?int
    {
        return $this->cdTabelaRef;
    }

    public function getCdSiga(): ?SigaTabela
    {
        return $this->cdSiga;
    }

    public function setCdSiga(?SigaTabela $cdSiga): self
    {
        $this->cdSiga = $cdSiga;
        return $this;
    }

    public function getCdReferencia(): ?AcrvReferencia
    {
        return $this->cdReferencia;
    }

    public function setCdReferencia(?AcrvReferencia $cdReferencia): self
    {
        $this->cdReferencia = $cdReferencia;
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
