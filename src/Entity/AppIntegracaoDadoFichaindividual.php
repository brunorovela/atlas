<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoFichaindividualRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoFichaindividualRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_fichaindividual',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_fichaindividual_sn_integrado_sn_excluido', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_fichaindividual_pks', columns: ['id_fichaindividual', 'cd_prazo'])]
class AppIntegracaoDadoFichaindividual
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_fichaindividual', type: 'integer', options: ['unsigned' => true])]
    private ?int $idFichaindividual = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_prazo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPrazo = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $idFichaindividual = null,
        ?int $cdPrazo = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->idFichaindividual = $idFichaindividual;
        $this->cdPrazo = $cdPrazo;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getIdFichaindividual(): ?int
    {
        return $this->idFichaindividual;
    }

    public function setIdFichaindividual(?int $idFichaindividual): self
    {
        $this->idFichaindividual = $idFichaindividual;
        return $this;
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
