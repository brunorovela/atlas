<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RecRecadoLeituraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecRecadoLeituraRepository::class)]
#[ORM\Table(
    name: 'rec_recado_leitura',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Indica quem leu o recado além do aluno']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa_recebeu'])]
class RecRecadoLeitura
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_recado', type: 'integer')]
    private ?int $cdRecado = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa_recebeu', type: 'integer')]
    private ?int $cdPessoaRecebeu = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa_leu', type: 'integer')]
    private ?int $cdPessoaLeu = null;

    #[ORM\Column(name: 'sn_recebido', type: TinyIntType::NAME, nullable: true)]
    private ?int $snRecebido = null;

    #[ORM\Column(name: 'sn_lido', type: TinyIntType::NAME, nullable: true)]
    private ?int $snLido = null;

    #[ORM\Column(name: 'dt_recebido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRecebido = null;

    #[ORM\Column(name: 'dt_lido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLido = null;

    public function __construct(
        ?int $cdRecado = null,
        ?int $cdPessoaRecebeu = null,
        ?int $cdPessoaLeu = null,
        ?int $snRecebido = null,
        ?int $snLido = null,
        ?\DateTimeInterface $dtRecebido = null,
        ?\DateTimeInterface $dtLido = null
    ) {
        $this->cdRecado = $cdRecado;
        $this->cdPessoaRecebeu = $cdPessoaRecebeu;
        $this->cdPessoaLeu = $cdPessoaLeu;
        $this->snRecebido = $snRecebido;
        $this->snLido = $snLido;
        $this->dtRecebido = $dtRecebido;
        $this->dtLido = $dtLido;
    }

    public function getCdRecado(): ?int
    {
        return $this->cdRecado;
    }

    public function setCdRecado(?int $cdRecado): self
    {
        $this->cdRecado = $cdRecado;
        return $this;
    }

    public function getCdPessoaRecebeu(): ?int
    {
        return $this->cdPessoaRecebeu;
    }

    public function setCdPessoaRecebeu(?int $cdPessoaRecebeu): self
    {
        $this->cdPessoaRecebeu = $cdPessoaRecebeu;
        return $this;
    }

    public function getCdPessoaLeu(): ?int
    {
        return $this->cdPessoaLeu;
    }

    public function setCdPessoaLeu(?int $cdPessoaLeu): self
    {
        $this->cdPessoaLeu = $cdPessoaLeu;
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
