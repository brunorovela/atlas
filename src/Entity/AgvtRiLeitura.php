<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AgvtRiLeituraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtRiLeituraRepository::class)]
#[ORM\Table(
    name: 'agvt_ri_leitura',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Informa quem leu e acessou a leitura']
)]
#[ORM\Index(name: 'IX_CD_ROTINA', columns: ['cd_rotina'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class AgvtRiLeitura
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_rotina', type: 'integer')]
    private ?int $cdRotina = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_recebido', type: TinyIntType::NAME, nullable: true)]
    private ?int $snRecebido = null;

    #[ORM\Column(name: 'sn_lido', type: TinyIntType::NAME, nullable: true)]
    private ?int $snLido = null;

    #[ORM\Column(name: 'dt_recebido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRecebido = null;

    #[ORM\Column(name: 'dt_lido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLido = null;

    public function __construct(
        ?int $cdRotina = null,
        ?int $cdPessoa = null,
        ?int $snRecebido = null,
        ?int $snLido = null,
        ?\DateTimeInterface $dtRecebido = null,
        ?\DateTimeInterface $dtLido = null
    ) {
        $this->cdRotina = $cdRotina;
        $this->cdPessoa = $cdPessoa;
        $this->snRecebido = $snRecebido;
        $this->snLido = $snLido;
        $this->dtRecebido = $dtRecebido;
        $this->dtLido = $dtLido;
    }

    public function getCdRotina(): ?int
    {
        return $this->cdRotina;
    }

    public function setCdRotina(?int $cdRotina): self
    {
        $this->cdRotina = $cdRotina;
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

    public function getSnRecebido(): ?int
    {
        return $this->snRecebido;
    }

    public function setSnRecebido(?int $snRecebido): self
    {
        $this->snRecebido = $snRecebido;
        return $this;
    }

    public function getSnLido(): ?int
    {
        return $this->snLido;
    }

    public function setSnLido(?int $snLido): self
    {
        $this->snLido = $snLido;
        return $this;
    }

    public function getDtRecebido(): ?\DateTimeInterface
    {
        return $this->dtRecebido;
    }

    public function setDtRecebido(?\DateTimeInterface $dtRecebido): self
    {
        $this->dtRecebido = $dtRecebido;
        return $this;
    }

    public function getDtLido(): ?\DateTimeInterface
    {
        return $this->dtLido;
    }

    public function setDtLido(?\DateTimeInterface $dtLido): self
    {
        $this->dtLido = $dtLido;
        return $this;
    }
}
