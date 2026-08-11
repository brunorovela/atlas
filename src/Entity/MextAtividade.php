<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\MextAtividadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MextAtividadeRepository::class)]
#[ORM\Table(
    name: 'mext_atividade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_grupo_atividade', columns: ['cd_grupo_atividade'])]
#[ORM\Index(name: 'cd_termo_modelo', columns: ['cd_termo_modelo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'mext_atividade_ibfk_1', 'colunas' => ['cd_grupo_atividade'], 'tabelaAlvo' => 'mext_grupo_atividade', 'colunasAlvo' => ['cd_grupo_atividade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'mext_atividade_ibfk_2', 'colunas' => ['cd_termo_modelo'], 'tabelaAlvo' => 'mext_termo_modelo', 'colunasAlvo' => ['cd_termo_modelo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MextAtividade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atividade', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAtividade = null;

    #[ORM\ManyToOne(targetEntity: MextGrupoAtividade::class)]
    #[ORM\JoinColumn(name: 'cd_grupo_atividade', referencedColumnName: 'cd_grupo_atividade', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextGrupoAtividade $cdGrupoAtividade = null;

    #[ORM\ManyToOne(targetEntity: MextTermoModelo::class)]
    #[ORM\JoinColumn(name: 'cd_termo_modelo', referencedColumnName: 'cd_termo_modelo', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?MextTermoModelo $cdTermoModelo = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?MextGrupoAtividade $cdGrupoAtividade = null,
        ?MextTermoModelo $cdTermoModelo = null,
        ?string $dsNome = null,
        ?string $meDescricao = null,
        ?int $snAtivo = null
    ) {
        $this->cdGrupoAtividade = $cdGrupoAtividade;
        $this->cdTermoModelo = $cdTermoModelo;
        $this->dsNome = $dsNome;
        $this->meDescricao = $meDescricao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
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

    public function getCdTermoModelo(): ?MextTermoModelo
    {
        return $this->cdTermoModelo;
    }

    public function setCdTermoModelo(?MextTermoModelo $cdTermoModelo): self
    {
        $this->cdTermoModelo = $cdTermoModelo;
        return $this;
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
