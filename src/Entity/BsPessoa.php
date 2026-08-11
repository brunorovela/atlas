<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BsPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsPessoaRepository::class)]
#[ORM\Table(
    name: 'bs_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UDX_BS_PESSOA_CD_PESSOA', columns: ['cd_pessoa', 'bs_id'])]
#[ORM\Index(name: 'IDX_BS_PESSOA_BS_ID', columns: ['bs_id'])]
#[ORM\Index(name: 'IDX_BS_PESSOA_DT_EXCL', columns: ['dt_excluido'])]
#[ORM\Index(name: 'IDX_BS_STATUS', columns: ['sn_ativo'])]
class BsPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'bs_id', type: 'integer')]
    private ?int $bsId = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $bsId = null,
        ?int $snAtivo = 1,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->bsId = $bsId;
        $this->snAtivo = $snAtivo;
        $this->dtExcluido = $dtExcluido;
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

    public function getBsId(): ?int
    {
        return $this->bsId;
    }

    public function setBsId(?int $bsId): self
    {
        $this->bsId = $bsId;
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

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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
