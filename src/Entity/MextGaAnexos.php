<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\MextGaAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextGaAnexosRepository::class)]
#[ORM\Table(
    name: 'mext_ga_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_grupo_atividade', columns: ['cd_grupo_atividade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_ga_anexos_ibfk_1', 'colunas' => ['cd_grupo_atividade'], 'tabelaAlvo' => 'mext_grupo_atividade', 'colunasAlvo' => ['cd_grupo_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextGaAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\ManyToOne(targetEntity: MextGrupoAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_atividade', referencedColumnName: 'cd_grupo_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextGrupoAtividade $cdGrupoAtividade = null;

    #[ORM\Column(name: 'me_conteudo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meConteudo = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    public function __construct(
        ?MextGrupoAtividade $cdGrupoAtividade = null,
        ?string $meConteudo = null,
        ?int $nrTamanho = null
    ) {
        $this->cdGrupoAtividade = $cdGrupoAtividade;
        $this->meConteudo = $meConteudo;
        $this->nrTamanho = $nrTamanho;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdGrupoAtividade(): ?MextGrupoAtividade
    {
        return $this->cdGrupoAtividade;
    }

    public function setCdGrupoAtividade(?MextGrupoAtividade $cdGrupoAtividade): self
    {
        $this->cdGrupoAtividade = $cdGrupoAtividade;
        return $this;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }
}
