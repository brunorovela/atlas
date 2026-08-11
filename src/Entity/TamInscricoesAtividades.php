<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\TamInscricoesAtividadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamInscricoesAtividadesRepository::class)]
#[ORM\Table(
    name: 'tam_inscricoes_atividades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TAM_INSCRICOES_ATIVIDADES', columns: ['cd_atividade', 'cd_inscricao'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO_ATIVIDADE', columns: ['cd_inscricao_atividade'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_INSCRICAO', columns: ['cd_inscricao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_tam_inscricoes_atividades_tam_atividades', 'colunas' => ['cd_atividade'], 'tabelaAlvo' => 'tam_atividades', 'colunasAlvo' => ['cd_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_tam_inscricoes_atividades_tam_inscricoes', 'colunas' => ['cd_inscricao'], 'tabelaAlvo' => 'tam_inscricoes', 'colunasAlvo' => ['CD_INSCRICAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TamInscricoesAtividades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInscricaoAtividade = null;

    #[ORM\ManyToOne(targetEntity: TamAtividades::class)]
    #[ORM\JoinColumn(name: 'cd_atividade', referencedColumnName: 'cd_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamAtividades $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: TamInscricoes::class)]
    #[ORM\JoinColumn(name: 'cd_inscricao', referencedColumnName: 'CD_INSCRICAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamInscricoes $cdInscricao = null;

    #[ORM\Column(name: 'sn_fila', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snFila = null;

    #[ORM\Column(name: 'sn_contato', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snContato = null;

    public function __construct(
        ?TamAtividades $cdAtividade = null,
        ?TamInscricoes $cdInscricao = null,
        ?int $snFila = null,
        ?int $snContato = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->cdInscricao = $cdInscricao;
        $this->snFila = $snFila;
        $this->snContato = $snContato;
    }

    public function getCdInscricaoAtividade(): ?int
    {
        return $this->cdInscricaoAtividade;
    }

    public function getCdAtividade(): ?TamAtividades
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?TamAtividades $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdInscricao(): ?TamInscricoes
    {
        return $this->cdInscricao;
    }

    public function setCdInscricao(?TamInscricoes $cdInscricao): self
    {
        $this->cdInscricao = $cdInscricao;
        return $this;
    }

    public function getSnFila(): ?int
    {
        return $this->snFila;
    }

    public function setSnFila(?int $snFila): self
    {
        $this->snFila = $snFila;
        return $this;
    }

    public function getSnContato(): ?int
    {
        return $this->snContato;
    }

    public function setSnContato(?int $snContato): self
    {
        $this->snContato = $snContato;
        return $this;
    }
}
