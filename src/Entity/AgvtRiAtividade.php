<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgvtRiAtividadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtRiAtividadeRepository::class)]
#[ORM\Table(
    name: 'agvt_ri_atividade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Representa uma atividade realizada por aluno aluno em uma rotina integral e qual opção de atividade foi escolhida. 
 Exemplo> Higiene o profesor escolheu a opção "Não escovou"']
)]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_ROTINA', columns: ['cd_rotina'])]
#[ORM\Index(name: 'IX_CD_OPCAO', columns: ['cd_opcao'])]
#[ORM\Index(name: 'IX_DT_ALTERACAO', columns: ['dt_alteracao'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
class AgvtRiAtividade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ri_atividade', type: 'integer')]
    private ?int $cdRiAtividade = null;

    #[ORM\Column(name: 'cd_rotina', type: 'integer', nullable: true)]
    private ?int $cdRotina = null;

    #[ORM\Column(name: 'cd_atividade', type: 'integer', nullable: true)]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'cd_opcao', type: 'integer', nullable: true)]
    private ?int $cdOpcao = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 65535, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdRotina = null,
        ?int $cdAtividade = null,
        ?int $cdOpcao = null,
        ?string $meDescricao = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdRotina = $cdRotina;
        $this->cdAtividade = $cdAtividade;
        $this->cdOpcao = $cdOpcao;
        $this->meDescricao = $meDescricao;
        $this->dtAlteracao = $dtAlteracao;
        $this->dtBase = $dtBase;
    }

    public function getCdRiAtividade(): ?int
    {
        return $this->cdRiAtividade;
    }

    public function getCdRotina(): ?int
    {
        return $this->cdRotina;
    }

    public function setCdRotina(?int $cdRotina): self
    {
        $this->cdRotina = $cdRotina;
        return $this;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?int $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
    }

    public function setCdOpcao(?int $cdOpcao): self
    {
        $this->cdOpcao = $cdOpcao;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
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
