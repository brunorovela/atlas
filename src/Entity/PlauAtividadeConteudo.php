<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PlauAtividadeConteudoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauAtividadeConteudoRepository::class)]
#[ORM\Table(
    name: 'plau_atividade_conteudo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CONTEUDO', columns: ['cd_conteudo'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'plau_atividade_conteudo_ibfk_1', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'plau_atividade', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'plau_atividade_conteudo_ibfk_2', 'colunas' => ['cd_conteudo'], 'tabelaAlvo' => 'plau_conteudo', 'colunasAlvo' => ['cd_conteudo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PlauAtividadeConteudo
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PlauAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauAtividade $cdAtividade = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: PlauConteudo::class)]
    #[ORM\JoinColumn(name: 'cd_conteudo', referencedColumnName: 'cd_conteudo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PlauConteudo $cdConteudo = null;

    public function __construct(
        ?PlauAtividade $cdAtividade = null,
        ?PlauConteudo $cdConteudo = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->cdConteudo = $cdConteudo;
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

    public function getCdConteudo(): ?PlauConteudo
    {
        return $this->cdConteudo;
    }

    public function setCdConteudo(?PlauConteudo $cdConteudo): self
    {
        $this->cdConteudo = $cdConteudo;
        return $this;
    }
}
