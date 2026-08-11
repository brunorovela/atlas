<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprCvCompromissoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCvCompromissoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cv_compromisso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cv_compromisso_cd_titulo', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_cmpr_cv_compromisso_cd_vencedor', columns: ['cd_vencedor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cv_compromisso_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'fin_contas_pagar', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cv_compromisso_ibfk_2', 'colunas' => ['cd_vencedor'], 'tabelaAlvo' => 'cmpr_cotacao_vencedor', 'colunasAlvo' => ['cd_vencedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCvCompromisso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_compromisso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCompromisso = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacaoVencedor::class)]
    #[ORM\JoinColumn(name: 'cd_vencedor', referencedColumnName: 'cd_vencedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoVencedor $cdVencedor = null;

    public function __construct(
        ?int $cdTitulo = null,
        ?CmprCotacaoVencedor $cdVencedor = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdVencedor = $cdVencedor;
    }

    public function getCdCompromisso(): ?int
    {
        return $this->cdCompromisso;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdVencedor(): ?CmprCotacaoVencedor
    {
        return $this->cdVencedor;
    }

    public function setCdVencedor(?CmprCotacaoVencedor $cdVencedor): self
    {
        $this->cdVencedor = $cdVencedor;
        return $this;
    }
}
