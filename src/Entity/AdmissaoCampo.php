<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AdmissaoCampoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissaoCampoRepository::class)]
#[ORM\Table(
    name: 'admissao_campo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ADMISSAO_CAMPO_DS_CHAVE', columns: ['DS_CHAVE'])]
#[ORM\UniqueConstraint(name: 'UK_ADMISSAO_CAMPO_DS_TITULO', columns: ['DS_TITULO'])]
class AdmissaoCampo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ADMISSAO_CAMPO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdAdmissaoCampo = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'DS_TITULO', type: 'string', length: 64)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'NR_ORDEM', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'SN_HORAS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snHoras = 0;

    #[ORM\Column(name: 'SN_CURSOS', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCursos = 0;

    #[ORM\Column(name: 'SN_CENTRO_CUSTO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snCentroCusto = 0;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsTitulo = null,
        ?int $nrOrdem = null,
        int $snHoras = 0,
        int $snCursos = 0,
        int $snCentroCusto = 0
    ) {
        $this->dsChave = $dsChave;
        $this->dsTitulo = $dsTitulo;
        $this->nrOrdem = $nrOrdem;
        $this->snHoras = $snHoras;
        $this->snCursos = $snCursos;
        $this->snCentroCusto = $snCentroCusto;
    }

    public function getCdAdmissaoCampo(): ?int
    {
        return $this->cdAdmissaoCampo;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getSnHoras(): int
    {
        return $this->snHoras;
    }

    public function setSnHoras(int $snHoras): self
    {
        $this->snHoras = $snHoras;
        return $this;
    }

    public function getSnCursos(): int
    {
        return $this->snCursos;
    }

    public function setSnCursos(int $snCursos): self
    {
        $this->snCursos = $snCursos;
        return $this;
    }

    public function getSnCentroCusto(): int
    {
        return $this->snCentroCusto;
    }

    public function setSnCentroCusto(int $snCentroCusto): self
    {
        $this->snCentroCusto = $snCentroCusto;
        return $this;
    }
}
