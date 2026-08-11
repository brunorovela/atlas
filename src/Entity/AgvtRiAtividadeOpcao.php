<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AgvtRiAtividadeOpcaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtRiAtividadeOpcaoRepository::class)]
#[ORM\Table(
    name: 'agvt_ri_atividade_opcao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Representa a opção de uma atividade 
 Exemplo Para a atividade Higiene as opções são: Escovou os dentes ou  Não escovou.']
)]
#[ORM\Index(name: 'IX_DT_ALTERACAO', columns: ['dt_alteracao'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'ix_dt_base', columns: ['dt_base'])]
class AgvtRiAtividadeOpcao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_opcao', type: 'integer')]
    private ?int $cdOpcao = null;

    #[ORM\Column(name: 'cd_atividade', type: 'integer', nullable: true)]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'ds_opcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsOpcao = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'ds_imagem', type: 'string', length: 50, nullable: true)]
    private ?string $dsImagem = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdAtividade = null,
        ?string $dsOpcao = null,
        ?int $nrOrdem = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?string $dsImagem = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->dsOpcao = $dsOpcao;
        $this->nrOrdem = $nrOrdem;
        $this->dtAlteracao = $dtAlteracao;
        $this->dsImagem = $dsImagem;
        $this->dtBase = $dtBase;
    }

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
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

    public function getDsOpcao(): ?string
    {
        return $this->dsOpcao;
    }

    public function setDsOpcao(?string $dsOpcao): self
    {
        $this->dsOpcao = $dsOpcao;
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

    public function getDtAlteracao(): ?\DateTimeInterface
    {
        return $this->dtAlteracao;
    }

    public function setDtAlteracao(?\DateTimeInterface $dtAlteracao): self
    {
        $this->dtAlteracao = $dtAlteracao;
        return $this;
    }

    public function getDsImagem(): ?string
    {
        return $this->dsImagem;
    }

    public function setDsImagem(?string $dsImagem): self
    {
        $this->dsImagem = $dsImagem;
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
