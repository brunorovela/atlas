<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TamEventosAssinaturasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TamEventosAssinaturasRepository::class)]
#[ORM\Table(
    name: 'tam_eventos_assinaturas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EVENTO', columns: ['cd_evento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'tam_eventos_assinaturas_ibfk_1', 'colunas' => ['cd_evento'], 'tabelaAlvo' => 'tam_eventos', 'colunasAlvo' => ['CD_EVENTO'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class TamEventosAssinaturas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_evento_assinatura', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEventoAssinatura = null;

    #[ORM\ManyToOne(targetEntity: TamEventos::class)]
    #[ORM\JoinColumn(name: 'cd_evento', referencedColumnName: 'CD_EVENTO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?TamEventos $cdEvento = null;

    #[ORM\Column(name: 'nm_assinatura', type: 'string', length: 255, nullable: true)]
    private ?string $nmAssinatura = null;

    #[ORM\Column(name: 'me_assinatura', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meAssinatura = null;

    #[ORM\Column(name: 'num_assinatura', type: 'integer')]
    private ?int $numAssinatura = null;

    #[ORM\Column(name: 'nr_altura_assinatura', type: 'integer', nullable: true)]
    private ?int $nrAlturaAssinatura = null;

    #[ORM\Column(name: 'nr_largura_assinatura', type: 'integer', nullable: true)]
    private ?int $nrLarguraAssinatura = null;

    public function __construct(
        ?TamEventos $cdEvento = null,
        ?string $nmAssinatura = null,
        ?string $meAssinatura = null,
        ?int $numAssinatura = null,
        ?int $nrAlturaAssinatura = null,
        ?int $nrLarguraAssinatura = null
    ) {
        $this->cdEvento = $cdEvento;
        $this->nmAssinatura = $nmAssinatura;
        $this->meAssinatura = $meAssinatura;
        $this->numAssinatura = $numAssinatura;
        $this->nrAlturaAssinatura = $nrAlturaAssinatura;
        $this->nrLarguraAssinatura = $nrLarguraAssinatura;
    }

    public function getCdEventoAssinatura(): ?int
    {
        return $this->cdEventoAssinatura;
    }

    public function getCdEvento(): ?TamEventos
    {
        return $this->cdEvento;
    }

    public function setCdEvento(?TamEventos $cdEvento): self
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    public function getNmAssinatura(): ?string
    {
        return $this->nmAssinatura;
    }

    public function setNmAssinatura(?string $nmAssinatura): self
    {
        $this->nmAssinatura = $nmAssinatura;
        return $this;
    }

    public function getMeAssinatura(): ?string
    {
        return $this->meAssinatura;
    }

    public function setMeAssinatura(?string $meAssinatura): self
    {
        $this->meAssinatura = $meAssinatura;
        return $this;
    }

    public function getNumAssinatura(): ?int
    {
        return $this->numAssinatura;
    }

    public function setNumAssinatura(?int $numAssinatura): self
    {
        $this->numAssinatura = $numAssinatura;
        return $this;
    }

    public function getNrAlturaAssinatura(): ?int
    {
        return $this->nrAlturaAssinatura;
    }

    public function setNrAlturaAssinatura(?int $nrAlturaAssinatura): self
    {
        $this->nrAlturaAssinatura = $nrAlturaAssinatura;
        return $this;
    }

    public function getNrLarguraAssinatura(): ?int
    {
        return $this->nrLarguraAssinatura;
    }

    public function setNrLarguraAssinatura(?int $nrLarguraAssinatura): self
    {
        $this->nrLarguraAssinatura = $nrLarguraAssinatura;
        return $this;
    }
}
