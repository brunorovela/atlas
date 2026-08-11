<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinCreditoCpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCreditoCpRepository::class)]
#[ORM\Table(
    name: 'fin_credito_cp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_FIN_CREDITO_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fin_credito_cp_ibfk_1', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'fin_contas_pagar', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fin_credito_cp_ibfk_2', 'colunas' => ['cd_usuario'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinCreditoCp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_credito', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCredito = null;

    #[ORM\Column(name: 'cd_titulo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTitulo = null;

    #[ORM\Column(name: 'vl_credito', type: 'float')]
    private ?float $vlCredito = null;

    #[ORM\Column(name: 'ds_motivo', type: 'string', length: 255)]
    private ?string $dsMotivo = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime')]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'dt_alteracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAlteracao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_usuario', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdUsuario = null;

    public function __construct(
        ?int $cdTitulo = null,
        ?float $vlCredito = null,
        ?string $dsMotivo = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?\DateTimeInterface $dtAlteracao = null,
        ?Pessoas $cdUsuario = null
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->vlCredito = $vlCredito;
        $this->dsMotivo = $dsMotivo;
        $this->dtRegistro = $dtRegistro;
        $this->dtAlteracao = $dtAlteracao;
        $this->cdUsuario = $cdUsuario;
    }

    public function getCdCredito(): ?int
    {
        return $this->cdCredito;
    }

    public function getCdTitulo(): ?int
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?int $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getVlCredito(): ?float
    {
        return $this->vlCredito;
    }

    public function setVlCredito(?float $vlCredito): self
    {
        $this->vlCredito = $vlCredito;
        return $this;
    }

    public function getDsMotivo(): ?string
    {
        return $this->dsMotivo;
    }

    public function setDsMotivo(?string $dsMotivo): self
    {
        $this->dsMotivo = $dsMotivo;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
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

    public function getCdUsuario(): ?Pessoas
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?Pessoas $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }
}
