<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCotacaoVencedorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCotacaoVencedorRepository::class)]
#[ORM\Table(
    name: 'cmpr_cotacao_vencedor',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cotacao_vendedor_cd_cotacao_fornecedor', columns: ['cd_cotacao_fornecedor'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_vendedor_cd_cotacao', columns: ['cd_cotacao'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_vencedor_cd_cotacao_fornecedor', columns: ['cd_cotacao_fornecedor'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_vencedor_cd_cotacao', columns: ['cd_cotacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cotacao_vendedor_ibfk_1', 'colunas' => ['cd_cotacao'], 'tabelaAlvo' => 'cmpr_cotacao', 'colunasAlvo' => ['cd_cotacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cotacao_vendedor_ibfk_2', 'colunas' => ['cd_cotacao_fornecedor'], 'tabelaAlvo' => 'cmpr_cotacao_fornecedor', 'colunasAlvo' => ['cd_cotacao_fornecedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCotacaoVencedor
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vencedor', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVencedor = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacaoFornecedor::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao_fornecedor', referencedColumnName: 'cd_cotacao_fornecedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacao::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao', referencedColumnName: 'cd_cotacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacao $cdCotacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'me_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacoes = null;

    #[ORM\Column(name: 'sn_deferido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snDeferido = null;

    #[ORM\Column(name: 'dt_deferimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDeferimento = null;

    #[ORM\Column(name: 'me_indeferido', type: 'text', length: 16777215, nullable: true)]
    private ?string $meIndeferido = null;

    public function __construct(
        ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null,
        ?CmprCotacao $cdCotacao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $meObservacoes = null,
        ?int $snDeferido = null,
        ?\DateTimeInterface $dtDeferimento = null,
        ?string $meIndeferido = null
    ) {
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
        $this->cdCotacao = $cdCotacao;
        $this->dtCadastro = $dtCadastro;
        $this->meObservacoes = $meObservacoes;
        $this->snDeferido = $snDeferido;
        $this->dtDeferimento = $dtDeferimento;
        $this->meIndeferido = $meIndeferido;
    }

    public function getCdVencedor(): ?int
    {
        return $this->cdVencedor;
    }

    public function getCdCotacaoFornecedor(): ?CmprCotacaoFornecedor
    {
        return $this->cdCotacaoFornecedor;
    }

    public function setCdCotacaoFornecedor(?CmprCotacaoFornecedor $cdCotacaoFornecedor): self
    {
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
        return $this;
    }

    public function getCdCotacao(): ?CmprCotacao
    {
        return $this->cdCotacao;
    }

    public function setCdCotacao(?CmprCotacao $cdCotacao): self
    {
        $this->cdCotacao = $cdCotacao;
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

    public function getMeObservacoes(): ?string
    {
        return $this->meObservacoes;
    }

    public function setMeObservacoes(?string $meObservacoes): self
    {
        $this->meObservacoes = $meObservacoes;
        return $this;
    }

    public function getSnDeferido(): ?int
    {
        return $this->snDeferido;
    }

    public function setSnDeferido(?int $snDeferido): self
    {
        $this->snDeferido = $snDeferido;
        return $this;
    }

    public function getDtDeferimento(): ?\DateTimeInterface
    {
        return $this->dtDeferimento;
    }

    public function setDtDeferimento(?\DateTimeInterface $dtDeferimento): self
    {
        $this->dtDeferimento = $dtDeferimento;
        return $this;
    }

    public function getMeIndeferido(): ?string
    {
        return $this->meIndeferido;
    }

    public function setMeIndeferido(?string $meIndeferido): self
    {
        $this->meIndeferido = $meIndeferido;
        return $this;
    }
}
