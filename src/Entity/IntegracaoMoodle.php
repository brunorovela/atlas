<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoMoodleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoMoodleRepository::class)]
#[ORM\Table(
    name: 'integracao_moodle',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoMoodle
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_execucao', type: 'integer')]
    private ?int $cdExecucao = null;

    #[ORM\Column(name: 'tp_execucao', type: 'enum', options: ['values' => ['INSERIR', 'ALTERAR', 'EXCLUIR']])]
    private ?string $tpExecucao = null;

    #[ORM\Column(name: 'tp_destino', type: 'enum', options: ['values' => ['UNIMESTRE', 'MOODLE']])]
    private ?string $tpDestino = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    #[ORM\Column(name: 'me_informacao', type: 'text', length: 16777215)]
    private ?string $meInformacao = null;

    #[ORM\Column(name: 'tp_informacao', type: 'enum', options: ['values' => ['COLIGADA', 'CURSO', 'TURMA', 'DISCIPLINA', 'DISCIPLINA_BASE', 'MATRICULA', 'MEDIA', 'ATIVIDADES', 'NOTA', 'PESSOA', 'PROFESSOR']])]
    private ?string $tpInformacao = null;

    #[ORM\Column(name: 'sn_executado', type: 'boolean', options: ['default' => '0'])]
    private bool $snExecutado = false;

    #[ORM\Column(name: 'sn_sucesso', type: 'boolean', options: ['default' => '0'])]
    private bool $snSucesso = false;

    #[ORM\Column(name: 'me_erro', type: 'text', length: 16777215, nullable: true)]
    private ?string $meErro = null;

    public function __construct(
        ?string $tpExecucao = null,
        ?string $tpDestino = null,
        ?\DateTimeInterface $dtInformacao = null,
        ?string $meInformacao = null,
        ?string $tpInformacao = null,
        bool $snExecutado = false,
        bool $snSucesso = false,
        ?string $meErro = null
    ) {
        $this->tpExecucao = $tpExecucao;
        $this->tpDestino = $tpDestino;
        $this->dtInformacao = $dtInformacao;
        $this->meInformacao = $meInformacao;
        $this->tpInformacao = $tpInformacao;
        $this->snExecutado = $snExecutado;
        $this->snSucesso = $snSucesso;
        $this->meErro = $meErro;
    }

    public function getCdExecucao(): ?int
    {
        return $this->cdExecucao;
    }

    public function getTpExecucao(): ?string
    {
        return $this->tpExecucao;
    }

    public function setTpExecucao(?string $tpExecucao): self
    {
        $this->tpExecucao = $tpExecucao;
        return $this;
    }

    public function getTpDestino(): ?string
    {
        return $this->tpDestino;
    }

    public function setTpDestino(?string $tpDestino): self
    {
        $this->tpDestino = $tpDestino;
        return $this;
    }

    public function getDtInformacao(): ?\DateTimeInterface
    {
        return $this->dtInformacao;
    }

    public function setDtInformacao(?\DateTimeInterface $dtInformacao): self
    {
        $this->dtInformacao = $dtInformacao;
        return $this;
    }

    public function getMeInformacao(): ?string
    {
        return $this->meInformacao;
    }

    public function setMeInformacao(?string $meInformacao): self
    {
        $this->meInformacao = $meInformacao;
        return $this;
    }

    public function getTpInformacao(): ?string
    {
        return $this->tpInformacao;
    }

    public function setTpInformacao(?string $tpInformacao): self
    {
        $this->tpInformacao = $tpInformacao;
        return $this;
    }

    public function isSnExecutado(): bool
    {
        return $this->snExecutado;
    }

    public function setSnExecutado(bool $snExecutado): self
    {
        $this->snExecutado = $snExecutado;
        return $this;
    }

    public function isSnSucesso(): bool
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(bool $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
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
}
