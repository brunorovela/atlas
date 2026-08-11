<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsSituacaoDeparaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsSituacaoDeparaRepository::class)]
#[ORM\Table(
    name: 'bs_situacao_depara',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'UDX_SDP_SITUACAO', columns: ['cd_situacao'])]
#[ORM\Index(name: 'UDX_SDP_ENUMACAO', columns: ['enum_acao'])]
#[ORM\Index(name: 'UDX_SDP_EXCLUIDO', columns: ['dt_excluido'])]
class BsSituacaoDepara
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer')]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'enum_acao', type: 'enum', nullable: true, options: ['values' => ['VER_REGRA', 'CONTINUAR_CURSANDO']])]
    private ?string $enumAcao = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdSituacao = null,
        ?string $enumAcao = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->enumAcao = $enumAcao;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getEnumAcao(): ?string
    {
        return $this->enumAcao;
    }

    public function setEnumAcao(?string $enumAcao): self
    {
        $this->enumAcao = $enumAcao;
        return $this;
    }

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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
