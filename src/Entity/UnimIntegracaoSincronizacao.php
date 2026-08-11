<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimIntegracaoSincronizacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimIntegracaoSincronizacaoRepository::class)]
#[ORM\Table(
    name: 'unim_integracao_sincronizacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INTEGRACAO', columns: ['cd_integracao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_CD_INTEGRACAO', 'colunas' => ['cd_integracao'], 'tabelaAlvo' => 'unim_integracao', 'colunasAlvo' => ['cd_integracao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimIntegracaoSincronizacao
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UnimIntegracao::class)]
    #[ORM\JoinColumn(name: 'cd_integracao', referencedColumnName: 'cd_integracao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimIntegracao $cdIntegracao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'dt_inicio', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'nr_pid', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPid = null;

    #[ORM\Column(name: 'SN_CONTINUAR', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snContinuar = 0;

    public function __construct(
        ?UnimIntegracao $cdIntegracao = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?int $nrPid = null,
        ?int $snContinuar = 0
    ) {
        $this->cdIntegracao = $cdIntegracao;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->nrPid = $nrPid;
        $this->snContinuar = $snContinuar;
    }

    public function getCdIntegracao(): ?UnimIntegracao
    {
        return $this->cdIntegracao;
    }

    public function setCdIntegracao(?UnimIntegracao $cdIntegracao): self
    {
        $this->cdIntegracao = $cdIntegracao;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getNrPid(): ?int
    {
        return $this->nrPid;
    }

    public function setNrPid(?int $nrPid): self
    {
        $this->nrPid = $nrPid;
        return $this;
    }

    public function getSnContinuar(): ?int
    {
        return $this->snContinuar;
    }

    public function setSnContinuar(?int $snContinuar): self
    {
        $this->snContinuar = $snContinuar;
        return $this;
    }
}
