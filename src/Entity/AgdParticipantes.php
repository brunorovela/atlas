<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AgdParticipantesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgdParticipantesRepository::class)]
#[ORM\Table(
    name: 'agd_participantes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_participante_UNIQUE', columns: ['cd_participante'])]
#[ORM\Index(name: 'IDX_AGD_PARTICIPANTES_CD_AGENDA', columns: ['cd_agenda'])]
#[ORM\Index(name: 'IDX_AGD_PARTICIPANTES_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_AGENDA', columns: ['cd_agenda'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_AGD_PARTICIPANTES_AGD_AGENDAS_CD_AGENDA', 'colunas' => ['cd_agenda'], 'tabelaAlvo' => 'agd_agendas', 'colunasAlvo' => ['cd_agenda'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']],
        ['nome' => 'FK_AGD_PARTICIPANTES_PESSOAS_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AgdParticipantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_participante', type: 'integer')]
    private ?int $cdParticipante = null;

    #[ORM\ManyToOne(targetEntity: AgdAgendas::class)]
    #[ORM\JoinColumn(name: 'cd_agenda', referencedColumnName: 'cd_agenda', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AgdAgendas $cdAgenda = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    public function __construct(
        ?AgdAgendas $cdAgenda = null,
        ?Pessoas $cdPessoa = null
    ) {
        $this->cdAgenda = $cdAgenda;
        $this->cdPessoa = $cdPessoa;
    }

    public function getCdParticipante(): ?int
    {
        return $this->cdParticipante;
    }

    public function getCdAgenda(): ?AgdAgendas
    {
        return $this->cdAgenda;
    }

    public function setCdAgenda(?AgdAgendas $cdAgenda): self
    {
        $this->cdAgenda = $cdAgenda;
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
}
