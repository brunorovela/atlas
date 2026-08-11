<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BsFilaPessoaStatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsFilaPessoaStatusRepository::class)]
#[ORM\Table(
    name: 'bs_fila_pessoa_status',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UDX_BS_PESSOA_STATUS', columns: ['bs_id_pessoa'])]
#[ORM\Index(name: 'IDX_BS_PS_CDP', columns: ['cd_pessoa'])]
class BsFilaPessoaStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'bs_id_pessoa', type: 'integer')]
    private ?int $bsIdPessoa = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true)]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'nr_qtd_tentativas', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdTentativas = 0;

    #[ORM\Column(name: 'me_ultimo_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $meUltimoErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $bsIdPessoa = null,
        ?int $snAtivo = null,
        ?int $nrQtdTentativas = 0,
        ?string $meUltimoErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->bsIdPessoa = $bsIdPessoa;
        $this->snAtivo = $snAtivo;
        $this->nrQtdTentativas = $nrQtdTentativas;
        $this->meUltimoErro = $meUltimoErro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBsIdPessoa(): ?int
    {
        return $this->bsIdPessoa;
    }

    public function setBsIdPessoa(?int $bsIdPessoa): self
    {
        $this->bsIdPessoa = $bsIdPessoa;
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

    public function getNrQtdTentativas(): ?int
    {
        return $this->nrQtdTentativas;
    }

    public function setNrQtdTentativas(?int $nrQtdTentativas): self
    {
        $this->nrQtdTentativas = $nrQtdTentativas;
        return $this;
    }

    public function getMeUltimoErro(): ?string
    {
        return $this->meUltimoErro;
    }

    public function setMeUltimoErro(?string $meUltimoErro): self
    {
        $this->meUltimoErro = $meUltimoErro;
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
