<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasInfoObservacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasInfoObservacoesRepository::class)]
#[ORM\Table(
    name: 'pessoas_info_observacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INFORMACAO', columns: ['cd_informacao'])]
#[ORM\Index(name: 'IX_CD_USUARIO_REGISTROU', columns: ['cd_usuario_registrou'])]
class PessoasInfoObservacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_info_obs', type: 'integer')]
    private ?int $cdInfoObs = null;

    #[ORM\Column(name: 'cd_informacao', type: 'integer', nullable: true)]
    private ?int $cdInformacao = null;

    #[ORM\Column(name: 'cd_usuario_registrou', type: 'integer', nullable: true)]
    private ?int $cdUsuarioRegistrou = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'dt_observacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtObservacao = null;

    #[ORM\Column(name: 'ds_status', type: 'string', length: 255, nullable: true)]
    private ?string $dsStatus = null;

    public function __construct(
        ?int $cdInformacao = null,
        ?int $cdUsuarioRegistrou = null,
        ?string $meObservacao = null,
        ?\DateTimeInterface $dtObservacao = null,
        ?string $dsStatus = null
    ) {
        $this->cdInformacao = $cdInformacao;
        $this->cdUsuarioRegistrou = $cdUsuarioRegistrou;
        $this->meObservacao = $meObservacao;
        $this->dtObservacao = $dtObservacao;
        $this->dsStatus = $dsStatus;
    }

    public function getCdInfoObs(): ?int
    {
        return $this->cdInfoObs;
    }

    public function getCdInformacao(): ?int
    {
        return $this->cdInformacao;
    }

    public function setCdInformacao(?int $cdInformacao): self
    {
        $this->cdInformacao = $cdInformacao;
        return $this;
    }

    public function getCdUsuarioRegistrou(): ?int
    {
        return $this->cdUsuarioRegistrou;
    }

    public function setCdUsuarioRegistrou(?int $cdUsuarioRegistrou): self
    {
        $this->cdUsuarioRegistrou = $cdUsuarioRegistrou;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getDtObservacao(): ?\DateTimeInterface
    {
        return $this->dtObservacao;
    }

    public function setDtObservacao(?\DateTimeInterface $dtObservacao): self
    {
        $this->dtObservacao = $dtObservacao;
        return $this;
    }

    public function getDsStatus(): ?string
    {
        return $this->dsStatus;
    }

    public function setDsStatus(?string $dsStatus): self
    {
        $this->dsStatus = $dsStatus;
        return $this;
    }
}
