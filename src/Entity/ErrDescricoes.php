<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ErrDescricoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErrDescricoesRepository::class)]
#[ORM\Table(
    name: 'err_descricoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela com mensagens de erro']
)]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_NR_SEQUENCIA', columns: ['nr_sequencia'])]
class ErrDescricoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_modulo', type: 'smallint', options: ['default' => '0'])]
    private int $cdModulo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'nr_sequencia', type: 'integer', options: ['default' => '0'])]
    private int $nrSequencia = 0;

    #[ORM\Column(name: 'sn_mostra_erro', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snMostraErro = null;

    #[ORM\Column(name: 'ds_erro', type: 'string', length: 255, nullable: true)]
    private ?string $dsErro = null;

    #[ORM\Column(name: 'tp_erro', type: 'string', length: 20, nullable: true)]
    private ?string $tpErro = null;

    public function __construct(
        int $cdModulo = 0,
        int $nrSequencia = 0,
        ?string $snMostraErro = null,
        ?string $dsErro = null,
        ?string $tpErro = null
    ) {
        $this->cdModulo = $cdModulo;
        $this->nrSequencia = $nrSequencia;
        $this->snMostraErro = $snMostraErro;
        $this->dsErro = $dsErro;
        $this->tpErro = $tpErro;
    }

    public function getCdModulo(): int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getNrSequencia(): int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getSnMostraErro(): ?string
    {
        return $this->snMostraErro;
    }

    public function setSnMostraErro(?string $snMostraErro): self
    {
        $this->snMostraErro = $snMostraErro;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }

    public function getTpErro(): ?string
    {
        return $this->tpErro;
    }

    public function setTpErro(?string $tpErro): self
    {
        $this->tpErro = $tpErro;
        return $this;
    }
}
