<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprFornecedorContratoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprFornecedorContratoRepository::class)]
#[ORM\Table(
    name: 'cmpr_fornecedor_contrato',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_FORNECEDOR_CONTRATO_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_fornecedor_contrato_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprFornecedorContrato
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contrato', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdContrato = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_inicio_vigencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicioVigencia = null;

    #[ORM\Column(name: 'dt_fim_vigencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFimVigencia = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtInicioVigencia = null,
        ?\DateTimeInterface $dtFimVigencia = null,
        bool $snAtivo = false
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtInicioVigencia = $dtInicioVigencia;
        $this->dtFimVigencia = $dtFimVigencia;
        $this->snAtivo = $snAtivo;
    }

    public function getCdContrato(): ?int
    {
        return $this->cdContrato;
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

    public function getDtInicioVigencia(): ?\DateTimeInterface
    {
        return $this->dtInicioVigencia;
    }

    public function setDtInicioVigencia(?\DateTimeInterface $dtInicioVigencia): self
    {
        $this->dtInicioVigencia = $dtInicioVigencia;
        return $this;
    }

    public function getDtFimVigencia(): ?\DateTimeInterface
    {
        return $this->dtFimVigencia;
    }

    public function setDtFimVigencia(?\DateTimeInterface $dtFimVigencia): self
    {
        $this->dtFimVigencia = $dtFimVigencia;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
