<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BsFilaPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsFilaPessoaRepository::class)]
#[ORM\Table(
    name: 'bs_fila_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IDX_BS_FIP_PESSOA', columns: ['cd_pessoa'])]
class BsFilaPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_qtd_tentativas', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdTentativas = 0;

    #[ORM\Column(name: 'me_ultimo_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $meUltimoErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $nrQtdTentativas = 0,
        ?string $meUltimoErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
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
