<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfeConveniosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeConveniosRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_convenios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class FinNfeConvenios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_convenio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConvenio = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'me_pdf', type: 'blob', length: 16777215, nullable: true)]
    private ?string $mePdf = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?string $mePdf = null,
        ?int $snAtivo = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->mePdf = $mePdf;
        $this->snAtivo = $snAtivo;
    }

    public function getCdConvenio(): ?int
    {
        return $this->cdConvenio;
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

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function getMePdf(): ?string
    {
        return $this->mePdf;
    }

    public function setMePdf(?string $mePdf): self
    {
        $this->mePdf = $mePdf;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
