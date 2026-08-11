<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoDiaPrazosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoDiaPrazosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_dia_prazos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_dia_prazos_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_dia_prazos_pks', columns: ['cd_prazo', 'id_turma', 'id_disciplina'])]
class AppIntegracaoDadoDiaPrazos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_prazo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPrazo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'id_turma', type: 'integer', options: ['unsigned' => true])]
    private ?int $idTurma = null;

    #[ORM\Id]
    #[ORM\Column(name: 'id_disciplina', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'cd_tipo_prazo', type: 'integer')]
    private ?int $cdTipoPrazo = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdPrazo = null,
        ?int $idTurma = null,
        ?int $idDisciplina = null,
        ?int $cdTipoPrazo = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdPrazo = $cdPrazo;
        $this->idTurma = $idTurma;
        $this->idDisciplina = $idDisciplina;
        $this->cdTipoPrazo = $cdTipoPrazo;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdPrazo(): ?int
    {
        return $this->cdPrazo;
    }

    public function setCdPrazo(?int $cdPrazo): self
    {
        $this->cdPrazo = $cdPrazo;
        return $this;
    }

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
    }

    public function setIdTurma(?int $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getCdTipoPrazo(): ?int
    {
        return $this->cdTipoPrazo;
    }

    public function setCdTipoPrazo(?int $cdTipoPrazo): self
    {
        $this->cdTipoPrazo = $cdTipoPrazo;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
