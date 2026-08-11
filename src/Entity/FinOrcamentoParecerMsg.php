<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinOrcamentoParecerMsgRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinOrcamentoParecerMsgRepository::class)]
#[ORM\Table(
    name: 'fin_orcamento_parecer_msg',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ORCAMENTO_PARECER_MSG', columns: ['cd_orcamento_parecer_msg'])]
#[ORM\Index(name: 'IX_CD_ORCAMENTO_PARECER', columns: ['cd_orcamento_parecer'])]
#[ORM\Index(name: 'IX_CD_GRUPO_ORIGEM', columns: ['cd_grupo_origem'])]
#[ORM\Index(name: 'IX_CD_GRUPO_DESTINO', columns: ['cd_grupo_destino'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_orcamento_parecer_msg']
)]
class FinOrcamentoParecerMsg
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento_parecer_msg', type: 'integer')]
    private ?int $cdOrcamentoParecerMsg = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_orcamento_parecer', type: 'integer', options: ['default' => '0'])]
    private int $cdOrcamentoParecer = 0;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'cd_grupo_origem', type: 'integer', nullable: true)]
    private ?int $cdGrupoOrigem = null;

    #[ORM\Column(name: 'cd_grupo_destino', type: 'integer', nullable: true)]
    private ?int $cdGrupoDestino = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_respondido', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snRespondido = false;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'sn_cometario_comite', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snCometarioComite = false;

    public function __construct(
        ?int $cdOrcamentoParecerMsg = null,
        int $cdOrcamentoParecer = 0,
        ?string $dsDescricao = null,
        ?int $cdGrupoOrigem = null,
        ?int $cdGrupoDestino = null,
        ?int $cdPessoa = null,
        ?bool $snRespondido = false,
        ?\DateTimeInterface $dtRegistro = null,
        ?bool $snCometarioComite = false
    ) {
        $this->cdOrcamentoParecerMsg = $cdOrcamentoParecerMsg;
        $this->cdOrcamentoParecer = $cdOrcamentoParecer;
        $this->dsDescricao = $dsDescricao;
        $this->cdGrupoOrigem = $cdGrupoOrigem;
        $this->cdGrupoDestino = $cdGrupoDestino;
        $this->cdPessoa = $cdPessoa;
        $this->snRespondido = $snRespondido;
        $this->dtRegistro = $dtRegistro;
        $this->snCometarioComite = $snCometarioComite;
    }

    public function getCdOrcamentoParecerMsg(): ?int
    {
        return $this->cdOrcamentoParecerMsg;
    }

    public function setCdOrcamentoParecerMsg(?int $cdOrcamentoParecerMsg): self
    {
        $this->cdOrcamentoParecerMsg = $cdOrcamentoParecerMsg;
        return $this;
    }

    public function getCdOrcamentoParecer(): int
    {
        return $this->cdOrcamentoParecer;
    }

    public function setCdOrcamentoParecer(int $cdOrcamentoParecer): self
    {
        $this->cdOrcamentoParecer = $cdOrcamentoParecer;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getCdGrupoOrigem(): ?int
    {
        return $this->cdGrupoOrigem;
    }

    public function setCdGrupoOrigem(?int $cdGrupoOrigem): self
    {
        $this->cdGrupoOrigem = $cdGrupoOrigem;
        return $this;
    }

    public function getCdGrupoDestino(): ?int
    {
        return $this->cdGrupoDestino;
    }

    public function setCdGrupoDestino(?int $cdGrupoDestino): self
    {
        $this->cdGrupoDestino = $cdGrupoDestino;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function isSnRespondido(): ?bool
    {
        return $this->snRespondido;
    }

    public function setSnRespondido(?bool $snRespondido): self
    {
        $this->snRespondido = $snRespondido;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function isSnCometarioComite(): ?bool
    {
        return $this->snCometarioComite;
    }

    public function setSnCometarioComite(?bool $snCometarioComite): self
    {
        $this->snCometarioComite = $snCometarioComite;
        return $this;
    }
}
