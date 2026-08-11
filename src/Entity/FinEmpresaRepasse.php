<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinEmpresaRepasseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinEmpresaRepasseRepository::class)]
#[ORM\Table(
    name: 'fin_empresa_repasse',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CD_PESSOA_EMPRESA', columns: ['cd_pessoa_empresa'])]
#[ORM\Index(name: 'FK_CD_PESSOA_EMPRESA_PESSOAS_CD_PESSOA', columns: ['cd_pessoa_empresa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_PESSOA_EMPRESA_PESSOAS_CD_PESSOA', 'colunas' => ['cd_pessoa_empresa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinEmpresaRepasse
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_fin_empresa_repasse', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFinEmpresaRepasse = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_empresa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaEmpresa = null;

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoaEmpresa = null,
        ?string $dsObservacao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoaEmpresa = $cdPessoaEmpresa;
        $this->dsObservacao = $dsObservacao;
        $this->dtBase = $dtBase;
    }

    public function getCdFinEmpresaRepasse(): ?int
    {
        return $this->cdFinEmpresaRepasse;
    }

    public function getCdPessoaEmpresa(): ?Pessoas
    {
        return $this->cdPessoaEmpresa;
    }

    public function setCdPessoaEmpresa(?Pessoas $cdPessoaEmpresa): self
    {
        $this->cdPessoaEmpresa = $cdPessoaEmpresa;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
