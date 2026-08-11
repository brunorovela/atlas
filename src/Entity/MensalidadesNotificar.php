<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MensalidadesNotificarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensalidadesNotificarRepository::class)]
#[ORM\Table(
    name: 'mensalidades_notificar',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IX_CD_PESSOA_SOLICITANTE', columns: ['cd_pessoa_solicitante'])]
class MensalidadesNotificar
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensalidade_notificacao', type: 'integer')]
    private ?int $cdMensalidadeNotificacao = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer')]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'dt_solicitacao', type: 'datetime')]
    private ?\DateTimeInterface $dtSolicitacao = null;

    #[ORM\Column(name: 'cd_pessoa_solicitante', type: 'integer')]
    private ?int $cdPessoaSolicitante = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?\DateTimeInterface $dtSolicitacao = null,
        ?int $cdPessoaSolicitante = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->dtSolicitacao = $dtSolicitacao;
        $this->cdPessoaSolicitante = $cdPessoaSolicitante;
    }

    public function getCdMensalidadeNotificacao(): ?int
    {
        return $this->cdMensalidadeNotificacao;
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

    public function getDtSolicitacao(): ?\DateTimeInterface
    {
        return $this->dtSolicitacao;
    }

    public function setDtSolicitacao(?\DateTimeInterface $dtSolicitacao): self
    {
        $this->dtSolicitacao = $dtSolicitacao;
        return $this;
    }

    public function getCdPessoaSolicitante(): ?int
    {
        return $this->cdPessoaSolicitante;
    }

    public function setCdPessoaSolicitante(?int $cdPessoaSolicitante): self
    {
        $this->cdPessoaSolicitante = $cdPessoaSolicitante;
        return $this;
    }
}
