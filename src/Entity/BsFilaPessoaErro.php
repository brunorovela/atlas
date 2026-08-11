<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsFilaPessoaErroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsFilaPessoaErroRepository::class)]
#[ORM\Table(
    name: 'bs_fila_pessoa_erro',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_0900_ai_ci']
)]
#[ORM\Index(name: 'IDX_BS_FP_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IDX_BS_FP_DT_BASE', columns: ['dt_base'])]
class BsFilaPessoaErro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'me_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $meErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $meErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->meErro = $meErro;
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

    public function getMeErro(): ?string
    {
        return $this->meErro;
    }

    public function setMeErro(?string $meErro): self
    {
        $this->meErro = $meErro;
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
