<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCfMensagemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCfMensagemRepository::class)]
#[ORM\Table(
    name: 'cmpr_cf_mensagem',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cf_produto_cd_cotacao_fornecedor', columns: ['cd_cotacao_fornecedor'])]
#[ORM\Index(name: 'IX_cmpr_cf_produto_cd_pessoa', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cf_mensagem_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cf_mensagem_ibfk_2', 'colunas' => ['cd_cotacao_fornecedor'], 'tabelaAlvo' => 'cmpr_cotacao_fornecedor', 'colunasAlvo' => ['cd_cotacao_fornecedor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCfMensagem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensagem = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacaoFornecedor::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao_fornecedor', referencedColumnName: 'cd_cotacao_fornecedor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_importante', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snImportante = null;

    public function __construct(
        ?CmprCotacaoFornecedor $cdCotacaoFornecedor = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsDescricao = null,
        ?int $snImportante = null
    ) {
        $this->cdCotacaoFornecedor = $cdCotacaoFornecedor;
        $this->cdPessoa = $cdPessoa;
        $this->dtCadastro = $dtCadastro;
        $this->dsDescricao = $dsDescricao;
        $this->snImportante = $snImportante;
    }

    public function getCdMensagem(): ?int
    {
        return $this->cdMensagem;
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

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getSnImportante(): ?int
    {
        return $this->snImportante;
    }

    public function setSnImportante(?int $snImportante): self
    {
        $this->snImportante = $snImportante;
        return $this;
    }
}
