<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BibInventariosProcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibInventariosProcRepository::class)]
#[ORM\Table(
    name: 'bib_inventarios_proc',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
class BibInventariosProc
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_PROCESSO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'CD_PESSOA', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'DS_PROCESSO', type: 'string', length: 255)]
    private ?string $dsProcesso = null;

    #[ORM\Column(name: 'DT_INICIO', type: 'datetime')]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'DT_FIM', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'SN_FINALIZADO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snFinalizado = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $dsProcesso = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        ?int $snFinalizado = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsProcesso = $dsProcesso;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->snFinalizado = $snFinalizado;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
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

    public function getDsProcesso(): ?string
    {
        return $this->dsProcesso;
    }

    public function setDsProcesso(?string $dsProcesso): self
    {
        $this->dsProcesso = $dsProcesso;
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

    public function getSnFinalizado(): ?int
    {
        return $this->snFinalizado;
    }

    public function setSnFinalizado(?int $snFinalizado): self
    {
        $this->snFinalizado = $snFinalizado;
        return $this;
    }
}
