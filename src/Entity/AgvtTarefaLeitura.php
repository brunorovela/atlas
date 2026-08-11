<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\AgvtTarefaLeituraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgvtTarefaLeituraRepository::class)]
#[ORM\Table(
    name: 'agvt_tarefa_leitura',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Informa quem leu e acessou a tarefa']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa_leu'])]
class AgvtTarefaLeitura
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tarefa', type: 'integer')]
    private ?int $cdTarefa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa_leu', type: 'integer')]
    private ?int $cdPessoaLeu = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa_recebeu', type: 'integer')]
    private ?int $cdPessoaRecebeu = null;

    #[ORM\Column(name: 'sn_recebido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snRecebido = 0;

    #[ORM\Column(name: 'sn_lido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snLido = 0;

    #[ORM\Column(name: 'dt_recebido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRecebido = null;

    #[ORM\Column(name: 'dt_lido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLido = null;

    public function __construct(
        ?int $cdTarefa = null,
        ?int $cdPessoaLeu = null,
        ?int $cdPessoaRecebeu = null,
        ?int $snRecebido = 0,
        ?int $snLido = 0,
        ?\DateTimeInterface $dtRecebido = null,
        ?\DateTimeInterface $dtLido = null
    ) {
        $this->cdTarefa = $cdTarefa;
        $this->cdPessoaLeu = $cdPessoaLeu;
        $this->cdPessoaRecebeu = $cdPessoaRecebeu;
        $this->snRecebido = $snRecebido;
        $this->snLido = $snLido;
        $this->dtRecebido = $dtRecebido;
        $this->dtLido = $dtLido;
    }

    public function getCdTarefa(): ?int
    {
        return $this->cdTarefa;
    }

    public function setCdTarefa(?int $cdTarefa): self
    {
        $this->cdTarefa = $cdTarefa;
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

    public function getCdPessoaRecebeu(): ?int
    {
        return $this->cdPessoaRecebeu;
    }

    public function setCdPessoaRecebeu(?int $cdPessoaRecebeu): self
    {
        $this->cdPessoaRecebeu = $cdPessoaRecebeu;
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
