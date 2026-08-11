<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RelatoriosImpressosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelatoriosImpressosRepository::class)]
#[ORM\Table(
    name: 'relatorios_impressos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RELATORIO', columns: ['cd_relatorio'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_ANOSEMESTRE', columns: ['anosemestre'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
class RelatoriosImpressos
{
    #[ORM\Id]
    #[ORM\Column(name: 'nr_impresso', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrImpresso = 0;

    #[ORM\Column(name: 'cd_relatorio', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdRelatorio = 0;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdPessoa = 0;

    #[ORM\Column(name: 'anosemestre', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $anosemestre = 0;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'dt_relatorio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRelatorio = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    public function __construct(
        int $nrImpresso = 0,
        ?int $cdRelatorio = 0,
        ?int $cdPessoa = 0,
        ?int $anosemestre = 0,
        ?string $turma = null,
        ?\DateTimeInterface $dtRelatorio = null,
        ?int $cdUsuario = null
    ) {
        $this->nrImpresso = $nrImpresso;
        $this->cdRelatorio = $cdRelatorio;
        $this->cdPessoa = $cdPessoa;
        $this->anosemestre = $anosemestre;
        $this->turma = $turma;
        $this->dtRelatorio = $dtRelatorio;
        $this->cdUsuario = $cdUsuario;
    }

    public function getNrImpresso(): int
    {
        return $this->nrImpresso;
    }

    public function setNrImpresso(int $nrImpresso): self
    {
        $this->nrImpresso = $nrImpresso;
        return $this;
    }

    public function getCdRelatorio(): ?int
    {
        return $this->cdRelatorio;
    }

    public function setCdRelatorio(?int $cdRelatorio): self
    {
        $this->cdRelatorio = $cdRelatorio;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getAnosemestre(): ?int
    {
        return $this->anosemestre;
    }

    public function setAnosemestre(?int $anosemestre): self
    {
        $this->anosemestre = $anosemestre;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
        return $this;
    }

    public function getDtRelatorio(): ?\DateTimeInterface
    {
        return $this->dtRelatorio;
    }

    public function setDtRelatorio(?\DateTimeInterface $dtRelatorio): self
    {
        $this->dtRelatorio = $dtRelatorio;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }
}
