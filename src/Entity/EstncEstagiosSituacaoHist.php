<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncEstagiosSituacaoHistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncEstagiosSituacaoHistRepository::class)]
#[ORM\Table(
    name: 'estnc_estagios_situacao_hist',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class EstncEstagiosSituacaoHist
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_historico', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHistorico = null;

    #[ORM\Column(name: 'cd_estagio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdEstagio = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?int $cdEstagio = null,
        ?int $cdSituacao = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdEstagio = $cdEstagio;
        $this->cdSituacao = $cdSituacao;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdHistorico(): ?int
    {
        return $this->cdHistorico;
    }

    public function getCdEstagio(): ?int
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?int $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
        return $this;
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

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
