<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniDiplomaProcessoMatriculaSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoMatriculaSituacaoRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo_matricula_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
class UniDiplomaProcessoMatriculaSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diploma_processo_matricula_situacao', type: 'integer')]
    private ?int $cdDiplomaProcessoMatriculaSituacao = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 50, nullable: true)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_nome_amigavel', type: 'string', length: 50, nullable: true)]
    private ?string $dsNomeAmigavel = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsNome = null,
        ?string $dsNomeAmigavel = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsNome = $dsNome;
        $this->dsNomeAmigavel = $dsNomeAmigavel;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
    }

    public function getCdDiplomaProcessoMatriculaSituacao(): ?int
    {
        return $this->cdDiplomaProcessoMatriculaSituacao;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsNomeAmigavel(): ?string
    {
        return $this->dsNomeAmigavel;
    }

    public function setDsNomeAmigavel(?string $dsNomeAmigavel): self
    {
        $this->dsNomeAmigavel = $dsNomeAmigavel;
        return $this;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
