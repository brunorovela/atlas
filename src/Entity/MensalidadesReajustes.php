<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\MensalidadesReajustesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensalidadesReajustesRepository::class)]
#[ORM\Table(
    name: 'mensalidades_reajustes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_MENSALIDADES_REAJUSTES_CD_MENSAL_MENSALIDADES_CD_MENSALIDADE', columns: ['CD_MENSALIDADE'])]
#[ORM\Index(name: 'IDX_91C05D861E81B5F4', columns: ['CD_POUPANCA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_MENSALIDADES_REAJUSTES_CD_MENSAL_MENSALIDADES_CD_MENSALIDADE', 'colunas' => ['CD_MENSALIDADE'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_MENSALIDADES_REAJUSTES_CD_POUPANCA_POUPANCA_CD_POUPANCA', 'colunas' => ['CD_POUPANCA'], 'tabelaAlvo' => 'poupanca', 'colunasAlvo' => ['CD_POUPANCA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class MensalidadesReajustes
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Poupanca::class)]
    #[ORM\JoinColumn(name: 'CD_POUPANCA', referencedColumnName: 'CD_POUPANCA', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Poupanca $cdPoupanca = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'CD_MENSALIDADE', referencedColumnName: 'cd_mensalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\Id]
    #[ORM\Column(name: 'NR_REAJUSTE', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $nrReajuste = null;

    #[ORM\Column(name: 'DT_ALTERACAO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\Column(name: 'VL_INDICE', type: 'decimal', precision: 18, scale: 9)]
    private ?string $vlIndice = null;

    #[ORM\Column(name: 'VL_ANTIGO', type: 'decimal', precision: 18, scale: 9)]
    private ?string $vlAntigo = null;

    #[ORM\Column(name: 'VL_NOVO', type: 'decimal', precision: 18, scale: 9)]
    private ?string $vlNovo = null;

    #[ORM\Column(name: 'VL_EXTRA', type: 'decimal', precision: 18, scale: 9, nullable: true)]
    private ?string $vlExtra = null;

    #[ORM\Column(name: 'VL_DESCONTO_ANTIGO', type: 'decimal', precision: 18, scale: 9, nullable: true)]
    private ?string $vlDescontoAntigo = null;

    #[ORM\Column(name: 'VL_DESCONTO_NOVO', type: 'decimal', precision: 18, scale: 9, nullable: true)]
    private ?string $vlDescontoNovo = null;

    #[ORM\Column(name: 'VL_DESC_EXTRA_ANTIGO', type: 'decimal', precision: 18, scale: 9, nullable: true)]
    private ?string $vlDescExtraAntigo = null;

    #[ORM\Column(name: 'VL_DESC_EXTRA_NOVO', type: 'decimal', precision: 18, scale: 9, nullable: true)]
    private ?string $vlDescExtraNovo = null;

    #[ORM\Column(name: 'SN_ATUALIZADO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAtualizado = 0;

    public function __construct(
        ?Poupanca $cdPoupanca = null,
        ?Mensalidades $cdMensalidade = null,
        ?int $nrReajuste = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?string $vlIndice = null,
        ?string $vlAntigo = null,
        ?string $vlNovo = null,
        ?string $vlExtra = null,
        ?string $vlDescontoAntigo = null,
        ?string $vlDescontoNovo = null,
        ?string $vlDescExtraAntigo = null,
        ?string $vlDescExtraNovo = null,
        int $snAtualizado = 0
    ) {
        $this->cdPoupanca = $cdPoupanca;
        $this->cdMensalidade = $cdMensalidade;
        $this->nrReajuste = $nrReajuste;
        $this->dtAlteracao = $dtAlteracao;
        $this->vlIndice = $vlIndice;
        $this->vlAntigo = $vlAntigo;
        $this->vlNovo = $vlNovo;
        $this->vlExtra = $vlExtra;
        $this->vlDescontoAntigo = $vlDescontoAntigo;
        $this->vlDescontoNovo = $vlDescontoNovo;
        $this->vlDescExtraAntigo = $vlDescExtraAntigo;
        $this->vlDescExtraNovo = $vlDescExtraNovo;
        $this->snAtualizado = $snAtualizado;
    }

    public function getCdPoupanca(): ?Poupanca
    {
        return $this->cdPoupanca;
    }

    public function setCdPoupanca(?Poupanca $cdPoupanca): self
    {
        $this->cdPoupanca = $cdPoupanca;
        return $this;
    }

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getNrReajuste(): ?int
    {
        return $this->nrReajuste;
    }

    public function setNrReajuste(?int $nrReajuste): self
    {
        $this->nrReajuste = $nrReajuste;
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

    public function getVlIndice(): ?string
    {
        return $this->vlIndice;
    }

    public function setVlIndice(?string $vlIndice): self
    {
        $this->vlIndice = $vlIndice;
        return $this;
    }

    public function getVlAntigo(): ?string
    {
        return $this->vlAntigo;
    }

    public function setVlAntigo(?string $vlAntigo): self
    {
        $this->vlAntigo = $vlAntigo;
        return $this;
    }

    public function getVlNovo(): ?string
    {
        return $this->vlNovo;
    }

    public function setVlNovo(?string $vlNovo): self
    {
        $this->vlNovo = $vlNovo;
        return $this;
    }

    public function getVlExtra(): ?string
    {
        return $this->vlExtra;
    }

    public function setVlExtra(?string $vlExtra): self
    {
        $this->vlExtra = $vlExtra;
        return $this;
    }

    public function getVlDescontoAntigo(): ?string
    {
        return $this->vlDescontoAntigo;
    }

    public function setVlDescontoAntigo(?string $vlDescontoAntigo): self
    {
        $this->vlDescontoAntigo = $vlDescontoAntigo;
        return $this;
    }

    public function getVlDescontoNovo(): ?string
    {
        return $this->vlDescontoNovo;
    }

    public function setVlDescontoNovo(?string $vlDescontoNovo): self
    {
        $this->vlDescontoNovo = $vlDescontoNovo;
        return $this;
    }

    public function getVlDescExtraAntigo(): ?string
    {
        return $this->vlDescExtraAntigo;
    }

    public function setVlDescExtraAntigo(?string $vlDescExtraAntigo): self
    {
        $this->vlDescExtraAntigo = $vlDescExtraAntigo;
        return $this;
    }

    public function getVlDescExtraNovo(): ?string
    {
        return $this->vlDescExtraNovo;
    }

    public function setVlDescExtraNovo(?string $vlDescExtraNovo): self
    {
        $this->vlDescExtraNovo = $vlDescExtraNovo;
        return $this;
    }

    public function getSnAtualizado(): int
    {
        return $this->snAtualizado;
    }

    public function setSnAtualizado(int $snAtualizado): self
    {
        $this->snAtualizado = $snAtualizado;
        return $this;
    }
}
