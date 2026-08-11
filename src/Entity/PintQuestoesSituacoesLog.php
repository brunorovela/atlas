<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintQuestoesSituacoesLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesSituacoesLogRepository::class)]
#[ORM\Table(
    name: 'pint_questoes_situacoes_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class PintQuestoesSituacoesLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao_log', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestaoLog = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nr_situacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrSituacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?int $cdProva = null,
        ?int $cdPessoa = null,
        ?int $nrSituacao = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->cdProva = $cdProva;
        $this->cdPessoa = $cdPessoa;
        $this->nrSituacao = $nrSituacao;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdQuestaoLog(): ?int
    {
        return $this->cdQuestaoLog;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
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

    public function getNrSituacao(): ?int
    {
        return $this->nrSituacao;
    }

    public function setNrSituacao(?int $nrSituacao): self
    {
        $this->nrSituacao = $nrSituacao;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }
}
