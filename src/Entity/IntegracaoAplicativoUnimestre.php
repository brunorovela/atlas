<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoAplicativoUnimestreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoAplicativoUnimestreRepository::class)]
#[ORM\Table(
    name: 'integracao_aplicativo_unimestre',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoAplicativoUnimestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_execucao', type: 'integer')]
    private ?int $cdExecucao = null;

    #[ORM\Column(name: 'tp_execucao', type: 'enum', options: ['values' => ['SET', 'GET', 'DELETE']])]
    private ?string $tpExecucao = null;

    #[ORM\Column(name: 'tp_destino', type: 'enum', options: ['values' => ['UNIMESTRE', 'APLICATIVO']])]
    private ?string $tpDestino = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    #[ORM\Column(name: 'me_informacao', type: 'text', length: 16777215)]
    private ?string $meInformacao = null;

    #[ORM\Column(name: 'tp_informacao', type: 'enum', nullable: true, options: ['values' => ['TEMA', 'PESSOA', 'CURSO', 'TURMA', 'DISCIPLINA', 'PERFIL', 'MATRICULA', 'FICHA', 'PROVA', 'PROVA-ALUNO', 'AULA', 'AULA-ALUNO', 'MATERIAL', 'BOLETO', 'HORARIO', 'COLIGADA', 'COLIGADA-CURSO', 'CALENDARIO', 'RECADO-CATEGORIA', 'RECADO-ORIGEM', 'RECADO', 'NOTICIA', 'AVALIACAO', 'AVALIACAO-PARAMETRO', 'PESQUISADO', 'PESSOA-TOKEN', 'CANTINA-SALDO', 'CANTINA-EXTRATO-CONSUMO', 'ROTINA', 'TAREFA', 'NU-PARAMETRO']])]
    private ?string $tpInformacao = null;

    #[ORM\Column(name: 'me_erro', type: 'text', length: 16777215, nullable: true)]
    private ?string $meErro = null;

    public function __construct(
        ?string $tpExecucao = null,
        ?string $tpDestino = null,
        ?\DateTimeInterface $dtInformacao = null,
        ?string $meInformacao = null,
        ?string $tpInformacao = null,
        ?string $meErro = null
    ) {
        $this->tpExecucao = $tpExecucao;
        $this->tpDestino = $tpDestino;
        $this->dtInformacao = $dtInformacao;
        $this->meInformacao = $meInformacao;
        $this->tpInformacao = $tpInformacao;
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
