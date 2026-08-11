<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncImportacaoEstagiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncImportacaoEstagiosRepository::class)]
#[ORM\Table(
    name: 'estnc_importacao_estagios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_ESTAGIO_PENDENTE', columns: ['cd_estagio', 'cd_importacao', 'ds_cpf', 'cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_IMPORTACAO', columns: ['cd_importacao'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ESTAGIO', 'colunas' => ['cd_estagio'], 'tabelaAlvo' => 'estnc_estagios', 'colunasAlvo' => ['cd_estagio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_IMPORTACAO_ESTAGIO', 'colunas' => ['cd_importacao'], 'tabelaAlvo' => 'estnc_importacoes', 'colunasAlvo' => ['cd_importacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOA_ESTAGIO', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncImportacaoEstagios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importacao_estagio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdImportacaoEstagio = null;

    #[ORM\ManyToOne(targetEntity: EstncEstagios::class)]
    #[ORM\JoinColumn(name: 'cd_estagio', referencedColumnName: 'cd_estagio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncEstagios $cdEstagio = null;

    #[ORM\ManyToOne(targetEntity: EstncImportacoes::class)]
    #[ORM\JoinColumn(name: 'cd_importacao', referencedColumnName: 'cd_importacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncImportacoes $cdImportacao = null;

    #[ORM\Column(name: 'ds_cpf', type: 'string', length: 11)]
    private ?string $dsCpf = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?EstncEstagios $cdEstagio = null,
        ?EstncImportacoes $cdImportacao = null,
        ?string $dsCpf = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdEstagio = $cdEstagio;
        $this->cdImportacao = $cdImportacao;
        $this->dsCpf = $dsCpf;
        $this->cdPessoa = $cdPessoa;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdImportacaoEstagio(): ?int
    {
        return $this->cdImportacaoEstagio;
    }

    public function getCdEstagio(): ?EstncEstagios
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?EstncEstagios $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
        return $this;
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

    public function getDsCpf(): ?string
    {
        return $this->dsCpf;
    }

    public function setDsCpf(?string $dsCpf): self
    {
        $this->dsCpf = $dsCpf;
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
}
