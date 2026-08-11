<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MextGrupoAtividadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextGrupoAtividadeRepository::class)]
#[ORM\Table(
    name: 'mext_grupo_atividade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MextGrupoAtividade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_grupo_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdGrupoAtividade = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'nr_max_inscricoes', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrMaxInscricoes = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $meDescricao = null,
        ?int $nrMaxInscricoes = null,
        ?int $snAtivo = null
    ) {
        $this->dsNome = $dsNome;
        $this->meDescricao = $meDescricao;
        $this->nrMaxInscricoes = $nrMaxInscricoes;
        $this->snAtivo = $snAtivo;
    }

    public function getCdGrupoAtividade(): ?int
    {
        return $this->cdGrupoAtividade;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }

    public function getNrMaxInscricoes(): ?int
    {
        return $this->nrMaxInscricoes;
    }

    public function setNrMaxInscricoes(?int $nrMaxInscricoes): self
    {
        $this->nrMaxInscricoes = $nrMaxInscricoes;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
