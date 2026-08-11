<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ConveniosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConveniosRepository::class)]
#[ORM\Table(
    name: 'convenios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_DESCONTO', columns: ['cd_desconto'])]
class Convenios
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_desconto', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdDesconto = 0;

    #[ORM\Column(name: 'dt_convenio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtConvenio = null;

    #[ORM\Column(name: 'dt_validade', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtValidade = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdDesconto = 0,
        ?\DateTimeInterface $dtConvenio = null,
        ?\DateTimeInterface $dtValidade = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdDesconto = $cdDesconto;
        $this->dtConvenio = $dtConvenio;
        $this->dtValidade = $dtValidade;
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

    public function getCdDesconto(): ?int
    {
        return $this->cdDesconto;
    }

    public function setCdDesconto(?int $cdDesconto): self
    {
        $this->cdDesconto = $cdDesconto;
        return $this;
    }

    public function getDtConvenio(): ?\DateTimeInterface
    {
        return $this->dtConvenio;
    }

    public function setDtConvenio(?\DateTimeInterface $dtConvenio): self
    {
        $this->dtConvenio = $dtConvenio;
        return $this;
    }

    public function getDtValidade(): ?\DateTimeInterface
    {
        return $this->dtValidade;
    }

    public function setDtValidade(?\DateTimeInterface $dtValidade): self
    {
        $this->dtValidade = $dtValidade;
        return $this;
    }
}
