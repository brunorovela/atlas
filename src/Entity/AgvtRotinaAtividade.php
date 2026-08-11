<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AgvtRotinaAtividadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtRotinaAtividadeRepository::class)]
#[ORM\Table(
    name: 'agvt_rotina_atividade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Representa uma atividade da rotina diária: 
 Tarefas Alimentação Higiene Hora do soninho']
)]
#[ORM\Index(name: 'IX_DT_ALTERACAO', columns: ['dt_alteracao'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
class AgvtRotinaAtividade
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_atividade', type: 'integer')]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'ds_atividade', type: 'string', length: 255, nullable: true)]
    private ?string $dsAtividade = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_descritiva', type: TinyIntType::NAME, nullable: true)]
    private ?int $snDescritiva = null;

    #[ORM\Column(name: 'sn_multipla_escolha', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snMultiplaEscolha = 0;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 25, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdAtividade = null,
        ?string $dsAtividade = null,
        ?int $nrOrdem = null,
        ?int $snDescritiva = null,
        ?int $snMultiplaEscolha = 0,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->dsAtividade = $dsAtividade;
        $this->nrOrdem = $nrOrdem;
        $this->snDescritiva = $snDescritiva;
        $this->snMultiplaEscolha = $snMultiplaEscolha;
        $this->dsChave = $dsChave;
        $this->dtAlteracao = $dtAlteracao;
        $this->dtBase = $dtBase;
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

    public function getDsAtividade(): ?string
    {
        return $this->dsAtividade;
    }

    public function setDsAtividade(?string $dsAtividade): self
    {
        $this->dsAtividade = $dsAtividade;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getSnDescritiva(): ?int
    {
        return $this->snDescritiva;
    }

    public function setSnDescritiva(?int $snDescritiva): self
    {
        $this->snDescritiva = $snDescritiva;
        return $this;
    }

    public function getSnMultiplaEscolha(): ?int
    {
        return $this->snMultiplaEscolha;
    }

    public function setSnMultiplaEscolha(?int $snMultiplaEscolha): self
    {
        $this->snMultiplaEscolha = $snMultiplaEscolha;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
