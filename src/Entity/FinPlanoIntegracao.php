<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoIntegracaoRepository::class)]
#[ORM\Table(
    name: 'fin_plano_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'UK_FIN_PLANO', columns: ['cd_plano'])]
class FinPlanoIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_plano_integracao', type: 'integer')]
    private ?int $cdPlanoIntegracao = null;

    #[ORM\Column(name: 'cd_plano', type: 'integer')]
    private ?int $cdPlano = null;

    #[ORM\Column(name: 'sn_libera_primeira', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snLiberaPrimeira = false;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?int $cdPlano = null,
        ?bool $snLiberaPrimeira = false,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdPlano = $cdPlano;
        $this->snLiberaPrimeira = $snLiberaPrimeira;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdPlanoIntegracao(): ?int
    {
        return $this->cdPlanoIntegracao;
    }

    public function getCdPlano(): ?int
    {
        return $this->cdPlano;
    }

    public function setCdPlano(?int $cdPlano): self
    {
        $this->cdPlano = $cdPlano;
        return $this;
    }

    public function isSnLiberaPrimeira(): ?bool
    {
        return $this->snLiberaPrimeira;
    }

    public function setSnLiberaPrimeira(?bool $snLiberaPrimeira): self
    {
        $this->snLiberaPrimeira = $snLiberaPrimeira;
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
