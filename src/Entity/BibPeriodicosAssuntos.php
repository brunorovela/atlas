<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibPeriodicosAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibPeriodicosAssuntosRepository::class)]
#[ORM\Table(
    name: 'bib_periodicos_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PER_ASS_PER_CD_PERIODICO', columns: ['CD_PERIODICO'])]
#[ORM\Index(name: 'FK_PER_ASS_ASSUNTOS_CD_ASSUNTO', columns: ['CD_ASSUNTO'])]
#[ORM\Index(name: 'IX_CD_PERIODICO', columns: ['CD_PERIODICO'])]
#[ORM\Index(name: 'IX_CD_ASSUNTO', columns: ['CD_ASSUNTO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PER_ASS_ASSUNTOS_CD_ASSUNTO', 'colunas' => ['CD_ASSUNTO'], 'tabelaAlvo' => 'bib_assuntos', 'colunasAlvo' => ['cd_assunto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PER_ASS_PER_CD_PERIODICO', 'colunas' => ['CD_PERIODICO'], 'tabelaAlvo' => 'bib_periodicos', 'colunasAlvo' => ['CD_PERIODICO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibPeriodicosAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PERIODICO_ASSUNTO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPeriodicoAssunto = null;

    #[ORM\ManyToOne(targetEntity: BibPeriodicos::class)]
    #[ORM\JoinColumn(name: 'CD_PERIODICO', referencedColumnName: 'CD_PERIODICO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?BibPeriodicos $cdPeriodico = null;

    #[ORM\ManyToOne(targetEntity: BibAssuntos::class)]
    #[ORM\JoinColumn(name: 'CD_ASSUNTO', referencedColumnName: 'cd_assunto', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAssuntos $cdAssunto = null;

    public function __construct(
        ?BibPeriodicos $cdPeriodico = null,
        ?BibAssuntos $cdAssunto = null
    ) {
        $this->cdPeriodico = $cdPeriodico;
        $this->cdAssunto = $cdAssunto;
    }

    public function getCdPeriodicoAssunto(): ?int
    {
        return $this->cdPeriodicoAssunto;
    }

    public function getCdPeriodico(): ?BibPeriodicos
    {
        return $this->cdPeriodico;
    }

    public function setCdPeriodico(?BibPeriodicos $cdPeriodico): self
    {
        $this->cdPeriodico = $cdPeriodico;
        return $this;
    }

    public function getCdAssunto(): ?BibAssuntos
    {
        return $this->cdAssunto;
    }

    public function setCdAssunto(?BibAssuntos $cdAssunto): self
    {
        $this->cdAssunto = $cdAssunto;
        return $this;
    }
}
