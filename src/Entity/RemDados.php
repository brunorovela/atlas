<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RemDadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemDadosRepository::class)]
#[ORM\Table(
    name: 'rem_dados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_remessa', columns: ['cd_remessa'])]
#[ORM\Index(name: 'IX_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'IX_CD_OCORRENCIA', columns: ['cd_ocorrencia'])]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_DT_ACAO', columns: ['dt_acao'])]
class RemDados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_remessa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRemessa = null;

    #[ORM\Column(name: 'cd_layout', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdLayout = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdOcorrencia = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'dt_acao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAcao = null;

    #[ORM\Column(name: 'sn_enviado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEnviado = 0;

    public function __construct(
        ?int $cdLayout = null,
        ?int $cdOcorrencia = null,
        ?int $cdMensalidade = null,
        ?\DateTimeInterface $dtAcao = null,
        ?int $snEnviado = 0
    ) {
        $this->cdLayout = $cdLayout;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtAcao = $dtAcao;
        $this->snEnviado = $snEnviado;
    }

    public function getCdRemessa(): ?int
    {
        return $this->cdRemessa;
    }

    public function getCdLayout(): ?int
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?int $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getCdOcorrencia(): ?int
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?int $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDtAcao(): ?\DateTimeInterface
    {
        return $this->dtAcao;
    }

    public function setDtAcao(?\DateTimeInterface $dtAcao): self
    {
        $this->dtAcao = $dtAcao;
        return $this;
    }

    public function getSnEnviado(): ?int
    {
        return $this->snEnviado;
    }

    public function setSnEnviado(?int $snEnviado): self
    {
        $this->snEnviado = $snEnviado;
        return $this;
    }
}
