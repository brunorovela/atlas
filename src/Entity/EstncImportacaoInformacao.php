<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncImportacaoInformacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncImportacaoInformacaoRepository::class)]
#[ORM\Table(
    name: 'estnc_importacao_informacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_IMPORTACAO', columns: ['cd_importacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA_IMPORTADA', columns: ['cd_pessoa_importada'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_IMPORTACAO_INFO', 'colunas' => ['cd_importacao'], 'tabelaAlvo' => 'estnc_importacoes', 'colunasAlvo' => ['cd_importacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOA_IMPORTADA', 'colunas' => ['cd_pessoa_importada'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncImportacaoInformacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importacao_informacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdImportacaoInformacao = null;

    #[ORM\ManyToOne(targetEntity: EstncImportacoes::class)]
    #[ORM\JoinColumn(name: 'cd_importacao', referencedColumnName: 'cd_importacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncImportacoes $cdImportacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_importada', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaImportada = null;

    #[ORM\Column(name: 'ds_cpf', type: 'string', length: 11)]
    private ?string $dsCpf = null;

    #[ORM\Column(name: 'sn_corrigir', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCorrigir = 0;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 255, nullable: true)]
    private ?string $dsAcao = null;

    public function __construct(
        ?EstncImportacoes $cdImportacao = null,
        ?Pessoas $cdPessoaImportada = null,
        ?string $dsCpf = null,
        int $snCorrigir = 0,
        ?string $dsAcao = null
    ) {
        $this->cdImportacao = $cdImportacao;
        $this->cdPessoaImportada = $cdPessoaImportada;
        $this->dsCpf = $dsCpf;
        $this->snCorrigir = $snCorrigir;
        $this->dsAcao = $dsAcao;
    }

    public function getCdImportacaoInformacao(): ?int
    {
        return $this->cdImportacaoInformacao;
    }

    public function getCdImportacao(): ?EstncImportacoes
    {
        return $this->cdImportacao;
    }

    public function setCdImportacao(?EstncImportacoes $cdImportacao): self
    {
        $this->cdImportacao = $cdImportacao;
        return $this;
    }

    public function getCdPessoaImportada(): ?Pessoas
    {
        return $this->cdPessoaImportada;
    }

    public function setCdPessoaImportada(?Pessoas $cdPessoaImportada): self
    {
        $this->cdPessoaImportada = $cdPessoaImportada;
        return $this;
    }

    public function getDsCpf(): ?string
    {
        return $this->dsCpf;
    }

    public function setDsCpf(?string $dsCpf): self
    {
        $this->dsCpf = $dsCpf;
        return $this;
    }

    public function getSnCorrigir(): int
    {
        return $this->snCorrigir;
    }

    public function setSnCorrigir(int $snCorrigir): self
    {
        $this->snCorrigir = $snCorrigir;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }
}
