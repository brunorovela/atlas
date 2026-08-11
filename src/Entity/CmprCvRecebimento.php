<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCvRecebimentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCvRecebimentoRepository::class)]
#[ORM\Table(
    name: 'cmpr_cv_recebimento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cv_recebimento_cd_vencedor', columns: ['cd_vencedor'])]
#[ORM\Index(name: 'IX_cmpr_cv_recebimento_cd_recebimento', columns: ['cd_recebimento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cv_recebimento_ibfk_1', 'colunas' => ['cd_vencedor'], 'tabelaAlvo' => 'cmpr_cotacao_vencedor', 'colunasAlvo' => ['cd_vencedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCvRecebimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recebimento', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecebimento = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacaoVencedor::class)]
    #[ORM\JoinColumn(name: 'cd_vencedor', referencedColumnName: 'cd_vencedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoVencedor $cdVencedor = null;

    #[ORM\Column(name: 'dt_entrega', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrega = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'cd_situacao_pedido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoPedido = null;

    #[ORM\Column(name: 'ds_nota_fiscal', type: 'string', length: 255, nullable: true)]
    private ?string $dsNotaFiscal = null;

    #[ORM\Column(name: 'cd_almoxarifado', type: 'integer', nullable: true)]
    private ?int $cdAlmoxarifado = null;

    public function __construct(
        ?CmprCotacaoVencedor $cdVencedor = null,
        ?\DateTimeInterface $dtEntrega = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $meObservacao = null,
        ?int $cdSituacaoPedido = null,
        ?string $dsNotaFiscal = null,
        ?int $cdAlmoxarifado = null
    ) {
        $this->cdVencedor = $cdVencedor;
        $this->dtEntrega = $dtEntrega;
        $this->dtCadastro = $dtCadastro;
        $this->meObservacao = $meObservacao;
        $this->cdSituacaoPedido = $cdSituacaoPedido;
        $this->dsNotaFiscal = $dsNotaFiscal;
        $this->cdAlmoxarifado = $cdAlmoxarifado;
    }

    public function getCdRecebimento(): ?int
    {
        return $this->cdRecebimento;
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

    public function getDtEntrega(): ?\DateTimeInterface
    {
        return $this->dtEntrega;
    }

    public function setDtEntrega(?\DateTimeInterface $dtEntrega): self
    {
        $this->dtEntrega = $dtEntrega;
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

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getCdSituacaoPedido(): ?int
    {
        return $this->cdSituacaoPedido;
    }

    public function setCdSituacaoPedido(?int $cdSituacaoPedido): self
    {
        $this->cdSituacaoPedido = $cdSituacaoPedido;
        return $this;
    }

    public function getDsNotaFiscal(): ?string
    {
        return $this->dsNotaFiscal;
    }

    public function setDsNotaFiscal(?string $dsNotaFiscal): self
    {
        $this->dsNotaFiscal = $dsNotaFiscal;
        return $this;
    }

    public function getCdAlmoxarifado(): ?int
    {
        return $this->cdAlmoxarifado;
    }

    public function setCdAlmoxarifado(?int $cdAlmoxarifado): self
    {
        $this->cdAlmoxarifado = $cdAlmoxarifado;
        return $this;
    }
}
