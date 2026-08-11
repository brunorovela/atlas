<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncInstituicoesPolosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncInstituicoesPolosRepository::class)]
#[ORM\Table(
    name: 'estnc_instituicoes_polos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['CD_INSTITUICAO'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO_CORREIO', columns: ['CD_MUNICIPIO_CORREIO'])]
#[ORM\Index(name: 'IX_CD_BAIRRO', columns: ['CD_BAIRRO'])]
class EstncInstituicoesPolos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_POLO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPolo = null;

    #[ORM\Column(name: 'CD_INSTITUICAO', type: 'integer')]
    private ?int $cdInstituicao = null;

    #[ORM\Column(name: 'NM_POLO', type: 'string', length: 255, nullable: true)]
    private ?string $nmPolo = null;

    #[ORM\Column(name: 'DS_UF', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'CD_MUNICIPIO_CORREIO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMunicipioCorreio = null;

    #[ORM\Column(name: 'CD_BAIRRO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdBairro = null;

    #[ORM\Column(name: 'DS_ENDERECO', type: 'string', length: 255, nullable: true)]
    private ?string $dsEndereco = null;

    #[ORM\Column(name: 'DS_TELEFONE', type: 'string', length: 255, nullable: true)]
    private ?string $dsTelefone = null;

    #[ORM\Column(name: 'DS_EMAIL', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmail = null;

    public function __construct(
        ?int $cdInstituicao = null,
        ?string $nmPolo = null,
        ?string $dsUf = null,
        ?int $cdMunicipioCorreio = null,
        ?int $cdBairro = null,
        ?string $dsEndereco = null,
        ?string $dsTelefone = null,
        ?string $dsEmail = null
    ) {
        $this->cdInstituicao = $cdInstituicao;
        $this->nmPolo = $nmPolo;
        $this->dsUf = $dsUf;
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        $this->cdBairro = $cdBairro;
        $this->dsEndereco = $dsEndereco;
        $this->dsTelefone = $dsTelefone;
        $this->dsEmail = $dsEmail;
    }

    public function getCdPolo(): ?int
    {
        return $this->cdPolo;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getNmPolo(): ?string
    {
        return $this->nmPolo;
    }

    public function setNmPolo(?string $nmPolo): self
    {
        $this->nmPolo = $nmPolo;
        return $this;
    }

    public function getDsUf(): ?string
    {
        return $this->dsUf;
    }

    public function setDsUf(?string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }

    public function getCdMunicipioCorreio(): ?int
    {
        return $this->cdMunicipioCorreio;
    }

    public function setCdMunicipioCorreio(?int $cdMunicipioCorreio): self
    {
        $this->cdMunicipioCorreio = $cdMunicipioCorreio;
        return $this;
    }

    public function getCdBairro(): ?int
    {
        return $this->cdBairro;
    }

    public function setCdBairro(?int $cdBairro): self
    {
        $this->cdBairro = $cdBairro;
        return $this;
    }

    public function getDsEndereco(): ?string
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco(?string $dsEndereco): self
    {
        $this->dsEndereco = $dsEndereco;
        return $this;
    }

    public function getDsTelefone(): ?string
    {
        return $this->dsTelefone;
    }

    public function setDsTelefone(?string $dsTelefone): self
    {
        $this->dsTelefone = $dsTelefone;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }
}
