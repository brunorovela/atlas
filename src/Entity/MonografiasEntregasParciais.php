<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonografiasEntregasParciaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasEntregasParciaisRepository::class)]
#[ORM\Table(
    name: 'monografias_entregas_parciais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class MonografiasEntregasParciais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_monografia_entrega_parcial', type: 'integer')]
    private ?int $cdMonografiaEntregaParcial = null;

    #[ORM\Column(name: 'cd_monografia_tipo_entrega', type: 'integer')]
    private ?int $cdMonografiaTipoEntrega = null;

    #[ORM\Column(name: 'cd_solicitacao', type: 'integer')]
    private ?int $cdSolicitacao = null;

    #[ORM\Column(name: 'me_informacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meInformacao = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'dt_visualizacao_aluno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVisualizacaoAluno = null;

    #[ORM\Column(name: 'dt_visualizacao_orientador', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVisualizacaoOrientador = null;

    #[ORM\Column(name: 'nr_situacao', type: 'integer', nullable: true)]
    private ?int $nrSituacao = null;

    #[ORM\Column(name: 'ds_motivo_indeferimento', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMotivoIndeferimento = null;

    #[ORM\Column(name: 'dt_visualizacao_coordenador', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtVisualizacaoCoordenador = null;

    public function __construct(
        ?int $cdMonografiaTipoEntrega = null,
        ?int $cdSolicitacao = null,
        ?string $meInformacao = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?\DateTimeInterface $dtVisualizacaoAluno = null,
        ?\DateTimeInterface $dtVisualizacaoOrientador = null,
        ?int $nrSituacao = null,
        ?string $dsMotivoIndeferimento = null,
        ?\DateTimeInterface $dtVisualizacaoCoordenador = null
    ) {
        $this->cdMonografiaTipoEntrega = $cdMonografiaTipoEntrega;
        $this->cdSolicitacao = $cdSolicitacao;
        $this->meInformacao = $meInformacao;
        $this->dtEnvio = $dtEnvio;
        $this->dtVisualizacaoAluno = $dtVisualizacaoAluno;
        $this->dtVisualizacaoOrientador = $dtVisualizacaoOrientador;
        $this->nrSituacao = $nrSituacao;
        $this->dsMotivoIndeferimento = $dsMotivoIndeferimento;
        $this->dtVisualizacaoCoordenador = $dtVisualizacaoCoordenador;
    }

    public function getCdMonografiaEntregaParcial(): ?int
    {
        return $this->cdMonografiaEntregaParcial;
    }

    public function getCdMonografiaTipoEntrega(): ?int
    {
        return $this->cdMonografiaTipoEntrega;
    }

    public function setCdMonografiaTipoEntrega(?int $cdMonografiaTipoEntrega): self
    {
        $this->cdMonografiaTipoEntrega = $cdMonografiaTipoEntrega;
        return $this;
    }

    public function getCdSolicitacao(): ?int
    {
        return $this->cdSolicitacao;
    }

    public function setCdSolicitacao(?int $cdSolicitacao): self
    {
        $this->cdSolicitacao = $cdSolicitacao;
        return $this;
    }

    public function getMeInformacao(): ?string
    {
        return $this->meInformacao;
    }

    public function setMeInformacao(?string $meInformacao): self
    {
        $this->meInformacao = $meInformacao;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getDtVisualizacaoAluno(): ?\DateTimeInterface
    {
        return $this->dtVisualizacaoAluno;
    }

    public function setDtVisualizacaoAluno(?\DateTimeInterface $dtVisualizacaoAluno): self
    {
        $this->dtVisualizacaoAluno = $dtVisualizacaoAluno;
        return $this;
    }

    public function getDtVisualizacaoOrientador(): ?\DateTimeInterface
    {
        return $this->dtVisualizacaoOrientador;
    }

    public function setDtVisualizacaoOrientador(?\DateTimeInterface $dtVisualizacaoOrientador): self
    {
        $this->dtVisualizacaoOrientador = $dtVisualizacaoOrientador;
        return $this;
    }

    public function getNrSituacao(): ?int
    {
        return $this->nrSituacao;
    }

    public function setNrSituacao(?int $nrSituacao): self
    {
        $this->nrSituacao = $nrSituacao;
        return $this;
    }

    public function getDsMotivoIndeferimento(): ?string
    {
        return $this->dsMotivoIndeferimento;
    }

    public function setDsMotivoIndeferimento(?string $dsMotivoIndeferimento): self
    {
        $this->dsMotivoIndeferimento = $dsMotivoIndeferimento;
        return $this;
    }

    public function getDtVisualizacaoCoordenador(): ?\DateTimeInterface
    {
        return $this->dtVisualizacaoCoordenador;
    }

    public function setDtVisualizacaoCoordenador(?\DateTimeInterface $dtVisualizacaoCoordenador): self
    {
        $this->dtVisualizacaoCoordenador = $dtVisualizacaoCoordenador;
        return $this;
    }
}
