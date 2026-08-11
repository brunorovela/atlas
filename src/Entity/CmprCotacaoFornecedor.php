<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CmprCotacaoFornecedorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprCotacaoFornecedorRepository::class)]
#[ORM\Table(
    name: 'cmpr_cotacao_fornecedor',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_cmpr_cotacao_fornecedor_cd_cotacao', columns: ['cd_cotacao'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_fornecedor_cd_pessoa_preencheu', columns: ['cd_pessoa_preencheu'])]
#[ORM\Index(name: 'IX_cmpr_cotacao_fornecedor_cd_pessoa_fornecedor', columns: ['cd_pessoa_fornecedor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_cotacao_fornecedor_ibfk_1', 'colunas' => ['cd_cotacao'], 'tabelaAlvo' => 'cmpr_cotacao', 'colunasAlvo' => ['cd_cotacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cotacao_fornecedor_ibfk_2', 'colunas' => ['cd_pessoa_preencheu'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'cmpr_cotacao_fornecedor_ibfk_3', 'colunas' => ['cd_pessoa_fornecedor'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprCotacaoFornecedor
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cotacao_fornecedor', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCotacaoFornecedor = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_preencheu', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaPreencheu = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_fornecedor', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaFornecedor = null;

    #[ORM\ManyToOne(targetEntity: CmprCotacao::class)]
    #[ORM\JoinColumn(name: 'cd_cotacao', referencedColumnName: 'cd_cotacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprCotacao $cdCotacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'sn_cancela_participacao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCancelaParticipacao = null;

    #[ORM\Column(name: 'me_motivo_cancela', type: 'text', length: 16777215, nullable: true)]
    private ?string $meMotivoCancela = null;

    #[ORM\Column(name: 'ds_protocolo', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsProtocolo = '';

    #[ORM\Column(name: 'sn_visualizou', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snVisualizou = false;

    public function __construct(
        ?Pessoas $cdPessoaPreencheu = null,
        ?Pessoas $cdPessoaFornecedor = null,
        ?CmprCotacao $cdCotacao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $snCancelaParticipacao = null,
        ?string $meMotivoCancela = null,
        ?string $dsProtocolo = '',
        ?bool $snVisualizou = false
    ) {
        $this->cdPessoaPreencheu = $cdPessoaPreencheu;
        $this->cdPessoaFornecedor = $cdPessoaFornecedor;
        $this->cdCotacao = $cdCotacao;
        $this->dtCadastro = $dtCadastro;
        $this->snCancelaParticipacao = $snCancelaParticipacao;
        $this->meMotivoCancela = $meMotivoCancela;
        $this->dsProtocolo = $dsProtocolo;
        $this->snVisualizou = $snVisualizou;
    }

    public function getCdCotacaoFornecedor(): ?int
    {
        return $this->cdCotacaoFornecedor;
    }

    public function getCdPessoaPreencheu(): ?Pessoas
    {
        return $this->cdPessoaPreencheu;
    }

    public function setCdPessoaPreencheu(?Pessoas $cdPessoaPreencheu): self
    {
        $this->cdPessoaPreencheu = $cdPessoaPreencheu;
        return $this;
    }

    public function getCdPessoaFornecedor(): ?Pessoas
    {
        return $this->cdPessoaFornecedor;
    }

    public function setCdPessoaFornecedor(?Pessoas $cdPessoaFornecedor): self
    {
        $this->cdPessoaFornecedor = $cdPessoaFornecedor;
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

    public function getSnCancelaParticipacao(): ?int
    {
        return $this->snCancelaParticipacao;
    }

    public function setSnCancelaParticipacao(?int $snCancelaParticipacao): self
    {
        $this->snCancelaParticipacao = $snCancelaParticipacao;
        return $this;
    }

    public function getMeMotivoCancela(): ?string
    {
        return $this->meMotivoCancela;
    }

    public function setMeMotivoCancela(?string $meMotivoCancela): self
    {
        $this->meMotivoCancela = $meMotivoCancela;
        return $this;
    }

    public function getDsProtocolo(): ?string
    {
        return $this->dsProtocolo;
    }

    public function setDsProtocolo(?string $dsProtocolo): self
    {
        $this->dsProtocolo = $dsProtocolo;
        return $this;
    }

    public function isSnVisualizou(): ?bool
    {
        return $this->snVisualizou;
    }

    public function setSnVisualizou(?bool $snVisualizou): self
    {
        $this->snVisualizou = $snVisualizou;
        return $this;
    }
}
