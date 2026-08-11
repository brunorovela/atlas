<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IolRelatoriosImpressosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IolRelatoriosImpressosRepository::class)]
#[ORM\Table(
    name: 'iol_relatorios_impressos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_RELATORIOS_IMPRESSOS_CD_RELATORIO_RELATORIOS_CD_RELATORIO', columns: ['CD_RELATORIO'])]
#[ORM\Index(name: 'FK_RELATORIOS_IMPRESSOS_CD_PESSOA_PESSOAS_CD_PESSOA', columns: ['CD_PESSOA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_RELATORIOS_IMPRESSOS_CD_PESSOA_PESSOAS_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_RELATORIOS_IMPRESSOS_CD_RELATORIO_RELATORIOS_CD_RELATORIO', 'colunas' => ['CD_RELATORIO'], 'tabelaAlvo' => 'iol_relatorios', 'colunasAlvo' => ['cd_relatorio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IolRelatoriosImpressos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_RELATORIO_IMPRESSO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRelatorioImpresso = null;

    #[ORM\ManyToOne(targetEntity: IolRelatorios::class)]
    #[ORM\JoinColumn(name: 'CD_RELATORIO', referencedColumnName: 'cd_relatorio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?IolRelatorios $cdRelatorio = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32, options: ['fixed' => true])]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'NM_ARQUIVO', type: 'string', length: 64)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'NR_TAMANHO', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'DT_INCLUSAO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?IolRelatorios $cdRelatorio = null,
        ?Pessoas $cdPessoa = null,
        ?string $dsChave = null,
        ?string $nmArquivo = null,
        ?int $nrTamanho = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->cdRelatorio = $cdRelatorio;
        $this->cdPessoa = $cdPessoa;
        $this->dsChave = $dsChave;
        $this->nmArquivo = $nmArquivo;
        $this->nrTamanho = $nrTamanho;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdRelatorioImpresso(): ?int
    {
        return $this->cdRelatorioImpresso;
    }

    public function getCdRelatorio(): ?IolRelatorios
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?IolRelatorios $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }
}
