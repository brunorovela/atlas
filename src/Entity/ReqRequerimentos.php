<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ReqRequerimentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRequerimentosRepository::class)]
#[ORM\Table(
    name: 'req_requerimentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ReqRequerimentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_req', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdReq = null;

    #[ORM\Column(name: 'cd_tipo', type: 'string', length: 45)]
    private ?string $cdTipo = null;

    #[ORM\Column(name: 'ds_req', type: 'string', length: 100, nullable: true)]
    private ?string $dsReq = null;

    #[ORM\Column(name: 'me_obs', type: 'text', length: 65535)]
    private ?string $meObs = null;

    #[ORM\Column(name: 'cd_situacao_deferido', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoDeferido = null;

    #[ORM\Column(name: 'cd_situacao_indeferido', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacaoIndeferido = null;

    #[ORM\Column(name: 'cd_rotina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdRotina = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_contar_por_disc', type: 'boolean', nullable: true)]
    private ?bool $snContarPorDisc = null;

    #[ORM\Column(name: 'dt_prazo_inicio', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrazoInicio = null;

    #[ORM\Column(name: 'dt_prazo_fim', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrazoFim = null;

    #[ORM\Column(name: 'dt_prazo_inicio2', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrazoInicio2 = null;

    #[ORM\Column(name: 'dt_prazo_fim2', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrazoFim2 = null;

    #[ORM\Column(name: 'dt_prazo_inicio3', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrazoInicio3 = null;

    #[ORM\Column(name: 'dt_prazo_fim3', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPrazoFim3 = null;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'sn_envia_email', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snEnviaEmail = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $cdTipo = null,
        ?string $dsReq = null,
        ?string $meObs = null,
        ?int $cdSituacaoDeferido = null,
        ?int $cdSituacaoIndeferido = null,
        ?int $cdRotina = null,
        ?int $snAtivo = null,
        ?bool $snContarPorDisc = null,
        ?\DateTimeInterface $dtPrazoInicio = null,
        ?\DateTimeInterface $dtPrazoFim = null,
        ?\DateTimeInterface $dtPrazoInicio2 = null,
        ?\DateTimeInterface $dtPrazoFim2 = null,
        ?\DateTimeInterface $dtPrazoInicio3 = null,
        ?\DateTimeInterface $dtPrazoFim3 = null,
        ?int $snExcluido = 0,
        ?bool $snEnviaEmail = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->dsReq = $dsReq;
        $this->meObs = $meObs;
        $this->cdSituacaoDeferido = $cdSituacaoDeferido;
        $this->cdSituacaoIndeferido = $cdSituacaoIndeferido;
        $this->cdRotina = $cdRotina;
        $this->snAtivo = $snAtivo;
        $this->snContarPorDisc = $snContarPorDisc;
        $this->dtPrazoInicio = $dtPrazoInicio;
        $this->dtPrazoFim = $dtPrazoFim;
        $this->dtPrazoInicio2 = $dtPrazoInicio2;
        $this->dtPrazoFim2 = $dtPrazoFim2;
        $this->dtPrazoInicio3 = $dtPrazoInicio3;
        $this->dtPrazoFim3 = $dtPrazoFim3;
        $this->snExcluido = $snExcluido;
        $this->snEnviaEmail = $snEnviaEmail;
        $this->dtBase = $dtBase;
    }

    public function getCdReq(): ?int
    {
        return $this->cdReq;
    }

    public function getCdTipo(): ?string
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?string $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsReq(): ?string
    {
        return $this->dsReq;
    }

    public function setDsReq(?string $dsReq): self
    {
        $this->dsReq = $dsReq;
        return $this;
    }

    public function getMeObs(): ?string
    {
        return $this->meObs;
    }

    public function setMeObs(?string $meObs): self
    {
        $this->meObs = $meObs;
        return $this;
    }

    public function getCdSituacaoDeferido(): ?int
    {
        return $this->cdSituacaoDeferido;
    }

    public function setCdSituacaoDeferido(?int $cdSituacaoDeferido): self
    {
        $this->cdSituacaoDeferido = $cdSituacaoDeferido;
        return $this;
    }

    public function getCdSituacaoIndeferido(): ?int
    {
        return $this->cdSituacaoIndeferido;
    }

    public function setCdSituacaoIndeferido(?int $cdSituacaoIndeferido): self
    {
        $this->cdSituacaoIndeferido = $cdSituacaoIndeferido;
        return $this;
    }

    public function getCdRotina(): ?int
    {
        return $this->cdRotina;
    }

    public function setCdRotina(?int $cdRotina): self
    {
        $this->cdRotina = $cdRotina;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function isSnContarPorDisc(): ?bool
    {
        return $this->snContarPorDisc;
    }

    public function setSnContarPorDisc(?bool $snContarPorDisc): self
    {
        $this->snContarPorDisc = $snContarPorDisc;
        return $this;
    }

    public function getDtPrazoInicio(): ?\DateTimeInterface
    {
        return $this->dtPrazoInicio;
    }

    public function setDtPrazoInicio(?\DateTimeInterface $dtPrazoInicio): self
    {
        $this->dtPrazoInicio = $dtPrazoInicio;
        return $this;
    }

    public function getDtPrazoFim(): ?\DateTimeInterface
    {
        return $this->dtPrazoFim;
    }

    public function setDtPrazoFim(?\DateTimeInterface $dtPrazoFim): self
    {
        $this->dtPrazoFim = $dtPrazoFim;
        return $this;
    }

    public function getDtPrazoInicio2(): ?\DateTimeInterface
    {
        return $this->dtPrazoInicio2;
    }

    public function setDtPrazoInicio2(?\DateTimeInterface $dtPrazoInicio2): self
    {
        $this->dtPrazoInicio2 = $dtPrazoInicio2;
        return $this;
    }

    public function getDtPrazoFim2(): ?\DateTimeInterface
    {
        return $this->dtPrazoFim2;
    }

    public function setDtPrazoFim2(?\DateTimeInterface $dtPrazoFim2): self
    {
        $this->dtPrazoFim2 = $dtPrazoFim2;
        return $this;
    }

    public function getDtPrazoInicio3(): ?\DateTimeInterface
    {
        return $this->dtPrazoInicio3;
    }

    public function setDtPrazoInicio3(?\DateTimeInterface $dtPrazoInicio3): self
    {
        $this->dtPrazoInicio3 = $dtPrazoInicio3;
        return $this;
    }

    public function getDtPrazoFim3(): ?\DateTimeInterface
    {
        return $this->dtPrazoFim3;
    }

    public function setDtPrazoFim3(?\DateTimeInterface $dtPrazoFim3): self
    {
        $this->dtPrazoFim3 = $dtPrazoFim3;
        return $this;
    }

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }

    public function isSnEnviaEmail(): ?bool
    {
        return $this->snEnviaEmail;
    }

    public function setSnEnviaEmail(?bool $snEnviaEmail): self
    {
        $this->snEnviaEmail = $snEnviaEmail;
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
