<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlauApMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauApMediaRepository::class)]
#[ORM\Table(
    name: 'plau_ap_media',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_ATIVIDADE_PESSOA', columns: ['cd_atividade', 'cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_ap_media_ibfk_1', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'plau_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_ap_media_ibfk_2', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauApMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_media', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMedia = null;

    #[ORM\ManyToOne(targetEntity: PlauAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAtividade $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'vl_media', type: 'float', nullable: true)]
    private ?float $vlMedia = null;

    public function __construct(
        ?PlauAtividade $cdAtividade = null,
        ?Pessoas $cdPessoa = null,
        ?float $vlMedia = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->cdPessoa = $cdPessoa;
        $this->vlMedia = $vlMedia;
    }

    public function getCdMedia(): ?int
    {
        return $this->cdMedia;
    }

    public function getCdAtividade(): ?PlauAtividade
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?PlauAtividade $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
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

    public function getVlMedia(): ?float
    {
        return $this->vlMedia;
    }

    public function setVlMedia(?float $vlMedia): self
    {
        $this->vlMedia = $vlMedia;
        return $this;
    }
}
