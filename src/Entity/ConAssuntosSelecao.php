<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConAssuntosSelecaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConAssuntosSelecaoRepository::class)]
#[ORM\Table(
    name: 'con_assuntos_selecao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ConAssuntosSelecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_assunto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'nr_questoes_aplicar_prova', type: 'smallint', options: ['unsigned' => true])]
    private ?int $nrQuestoesAplicarProva = null;

    public function __construct(
        ?string $dsAssunto = null,
        ?int $nrQuestoesAplicarProva = null
    ) {
        $this->dsAssunto = $dsAssunto;
        $this->nrQuestoesAplicarProva = $nrQuestoesAplicarProva;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getNrQuestoesAplicarProva(): ?int
    {
        return $this->nrQuestoesAplicarProva;
    }

    public function setNrQuestoesAplicarProva(?int $nrQuestoesAplicarProva): self
    {
        $this->nrQuestoesAplicarProva = $nrQuestoesAplicarProva;
        return $this;
    }
}
