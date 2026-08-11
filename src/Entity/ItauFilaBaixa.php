<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ItauFilaBaixaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItauFilaBaixaRepository::class)]
#[ORM\Table(
    name: 'itau_fila_baixa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_mensalidade', columns: ['cd_mensalidade'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'itau_fila_baixa_ibfk_1', 'colunas' => ['cd_mensalidade'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ItauFilaBaixa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'enum_tipo', type: 'enum', options: ['values' => ['BOLETO', 'PIX']])]
    private ?string $enumTipo = null;

    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'cd_mensalidade', referencedColumnName: 'cd_mensalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\Column(name: 'dt_validacao', type: 'datetime')]
    private ?\DateTimeInterface $dtValidacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $enumTipo = null,
        ?Mensalidades $cdMensalidade = null,
        ?\DateTimeInterface $dtValidacao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->enumTipo = $enumTipo;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtValidacao = $dtValidacao;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnumTipo(): ?string
    {
        return $this->enumTipo;
    }

    public function setEnumTipo(?string $enumTipo): self
    {
        $this->enumTipo = $enumTipo;
        return $this;
    }

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDtValidacao(): ?\DateTimeInterface
    {
        return $this->dtValidacao;
    }

    public function setDtValidacao(?\DateTimeInterface $dtValidacao): self
    {
        $this->dtValidacao = $dtValidacao;
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
