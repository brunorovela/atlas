<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgLiquidacaoMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgLiquidacaoMensalidadeRepository::class)]
#[ORM\Table(
    name: 'prg_liquidacao_mensalidade',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_LM_CD_LIQUIDACAO', columns: ['cd_prg_liquidacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'prg_liquidacao_mensalidade_prg_liquidacao_FK', 'colunas' => ['cd_prg_liquidacao'], 'tabelaAlvo' => 'prg_liquidacao', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PrgLiquidacaoMensalidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: PrgLiquidacao::class)]
    #[ORM\JoinColumn(name: 'cd_prg_liquidacao', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PrgLiquidacao $cdPrgLiquidacao = null;

    #[ORM\Column(name: 'vl_baixado', type: 'float', options: ['default' => '0.00'])]
    private float $vlBaixado = 0.0;

    #[ORM\Column(name: 'cd_situacao_mensalidade', type: 'integer')]
    private ?int $cdSituacaoMensalidade = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'sn_erro', type: 'boolean', options: ['default' => '0'])]
    private bool $snErro = false;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime')]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?PrgLiquidacao $cdPrgLiquidacao = null,
        float $vlBaixado = 0.0,
        ?int $cdSituacaoMensalidade = null,
        ?string $dsObservacao = null,
        bool $snErro = false,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdPrgLiquidacao = $cdPrgLiquidacao;
        $this->vlBaixado = $vlBaixado;
        $this->cdSituacaoMensalidade = $cdSituacaoMensalidade;
        $this->dsObservacao = $dsObservacao;
        $this->snErro = $snErro;
        $this->dtCadastro = $dtCadastro;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdPrgLiquidacao(): ?PrgLiquidacao
    {
        return $this->cdPrgLiquidacao;
    }

    public function setCdPrgLiquidacao(?PrgLiquidacao $cdPrgLiquidacao): self
    {
        $this->cdPrgLiquidacao = $cdPrgLiquidacao;
        return $this;
    }

    public function getVlBaixado(): float
    {
        return $this->vlBaixado;
    }

    public function setVlBaixado(float $vlBaixado): self
    {
        $this->vlBaixado = $vlBaixado;
        return $this;
    }

    public function getCdSituacaoMensalidade(): ?int
    {
        return $this->cdSituacaoMensalidade;
    }

    public function setCdSituacaoMensalidade(?int $cdSituacaoMensalidade): self
    {
        $this->cdSituacaoMensalidade = $cdSituacaoMensalidade;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function isSnErro(): bool
    {
        return $this->snErro;
    }

    public function setSnErro(bool $snErro): self
    {
        $this->snErro = $snErro;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
