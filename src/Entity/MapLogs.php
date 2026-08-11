<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MapLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapLogsRepository::class)]
#[ORM\Table(
    name: 'map_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MATERIAL', columns: ['cd_material'])]
#[ORM\Index(name: 'IX_CD_PESSOA_LEU', columns: ['cd_pessoa_leu'])]
class MapLogs
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_material', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdMaterial = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa_leu', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoaLeu = 0;

    #[ORM\Column(name: 'dt_abertura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAbertura = null;

    #[ORM\Column(name: 'sn_recebido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snRecebido = 0;

    #[ORM\Column(name: 'sn_lido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snLido = 0;

    #[ORM\Column(name: 'dt_lido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLido = null;

    public function __construct(
        int $cdPessoa = 0,
        int $cdMaterial = 0,
        int $cdPessoaLeu = 0,
        ?\DateTimeInterface $dtAbertura = null,
        ?int $snRecebido = 0,
        ?int $snLido = 0,
        ?\DateTimeInterface $dtLido = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdMaterial = $cdMaterial;
        $this->cdPessoaLeu = $cdPessoaLeu;
        $this->dtAbertura = $dtAbertura;
        $this->snRecebido = $snRecebido;
        $this->snLido = $snLido;
        $this->dtLido = $dtLido;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdMaterial(): int
    {
        return $this->cdMaterial;
    }

    public function setCdMaterial(int $cdMaterial): self
    {
        $this->cdMaterial = $cdMaterial;
        return $this;
    }

    public function getCdPessoaLeu(): int
    {
        return $this->cdPessoaLeu;
    }

    public function setCdPessoaLeu(int $cdPessoaLeu): self
    {
        $this->cdPessoaLeu = $cdPessoaLeu;
        return $this;
    }

    public function getDtAbertura(): ?\DateTimeInterface
    {
        return $this->dtAbertura;
    }

    public function setDtAbertura(?\DateTimeInterface $dtAbertura): self
    {
        $this->dtAbertura = $dtAbertura;
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
