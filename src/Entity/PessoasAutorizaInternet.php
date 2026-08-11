<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PessoasAutorizaInternetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasAutorizaInternetRepository::class)]
#[ORM\Table(
    name: 'pessoas_autoriza_internet',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_AUTORIZA_INTERNET', columns: ['cd_pessoa', 'cd_resp'])]
class PessoasAutorizaInternet
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoas_autoriza_internet', type: 'integer')]
    private ?int $cdPessoasAutorizaInternet = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_resp', type: 'integer', nullable: true)]
    private ?int $cdResp = null;

    #[ORM\Column(name: 'sn_aceito', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAceito = null;

    #[ORM\Column(name: 'me_termo', type: 'text', nullable: true)]
    private ?string $meTermo = null;

    #[ORM\Column(name: 'ds_mac_address', type: 'string', length: 255, nullable: true)]
    private ?string $dsMacAddress = null;

    #[ORM\Column(name: 'dt_aceite', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAceite = null;

    #[ORM\Column(name: 'dt_ultima_utilizacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaUtilizacao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdResp = null,
        ?int $snAceito = null,
        ?string $meTermo = null,
        ?string $dsMacAddress = null,
        ?\DateTimeInterface $dtAceite = null,
        ?\DateTimeInterface $dtUltimaUtilizacao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdResp = $cdResp;
        $this->snAceito = $snAceito;
        $this->meTermo = $meTermo;
        $this->dsMacAddress = $dsMacAddress;
        $this->dtAceite = $dtAceite;
        $this->dtUltimaUtilizacao = $dtUltimaUtilizacao;
    }

    public function getCdPessoasAutorizaInternet(): ?int
    {
        return $this->cdPessoasAutorizaInternet;
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

    public function getCdResp(): ?int
    {
        return $this->cdResp;
    }

    public function setCdResp(?int $cdResp): self
    {
        $this->cdResp = $cdResp;
        return $this;
    }

    public function getSnAceito(): ?int
    {
        return $this->snAceito;
    }

    public function setSnAceito(?int $snAceito): self
    {
        $this->snAceito = $snAceito;
        return $this;
    }

    public function getMeTermo(): ?string
    {
        return $this->meTermo;
    }

    public function setMeTermo(?string $meTermo): self
    {
        $this->meTermo = $meTermo;
        return $this;
    }

    public function getDsMacAddress(): ?string
    {
        return $this->dsMacAddress;
    }

    public function setDsMacAddress(?string $dsMacAddress): self
    {
        $this->dsMacAddress = $dsMacAddress;
        return $this;
    }

    public function getDtAceite(): ?\DateTimeInterface
    {
        return $this->dtAceite;
    }

    public function setDtAceite(?\DateTimeInterface $dtAceite): self
    {
        $this->dtAceite = $dtAceite;
        return $this;
    }

    public function getDtUltimaUtilizacao(): ?\DateTimeInterface
    {
        return $this->dtUltimaUtilizacao;
    }

    public function setDtUltimaUtilizacao(?\DateTimeInterface $dtUltimaUtilizacao): self
    {
        $this->dtUltimaUtilizacao = $dtUltimaUtilizacao;
        return $this;
    }
}
