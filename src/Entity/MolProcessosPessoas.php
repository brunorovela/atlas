<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MolProcessosPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolProcessosPessoasRepository::class)]
#[ORM\Table(
    name: 'mol_processos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['cd_processo', 'cd_pessoa', 'cd_curso'])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class MolProcessosPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo_pessoa', type: 'integer')]
    private ?int $cdProcessoPessoa = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer', nullable: true)]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 50, options: ['default' => ''])]
    private string $cdCurso = '';

    #[ORM\Column(name: 'cd_etapa_atual', type: 'integer', nullable: true)]
    private ?int $cdEtapaAtual = null;

    #[ORM\Column(name: 'sn_finalizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snFinalizado = 0;

    #[ORM\Column(name: 'dt_ultimo_acesso', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimoAcesso = null;

    #[ORM\Column(name: 'dt_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    public function __construct(
        ?int $cdProcesso = null,
        ?int $cdPessoa = null,
        string $cdCurso = '',
        ?int $cdEtapaAtual = null,
        ?int $snFinalizado = 0,
        ?\DateTimeInterface $dtUltimoAcesso = null,
        ?\DateTimeInterface $dtInicio = null
    ) {
        $this->cdProcesso = $cdProcesso;
        $this->cdPessoa = $cdPessoa;
        $this->cdCurso = $cdCurso;
        $this->cdEtapaAtual = $cdEtapaAtual;
        $this->snFinalizado = $snFinalizado;
        $this->dtUltimoAcesso = $dtUltimoAcesso;
        $this->dtInicio = $dtInicio;
    }

    public function getCdProcessoPessoa(): ?int
    {
        return $this->cdProcessoPessoa;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getCdCurso(): string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdEtapaAtual(): ?int
    {
        return $this->cdEtapaAtual;
    }

    public function setCdEtapaAtual(?int $cdEtapaAtual): self
    {
        $this->cdEtapaAtual = $cdEtapaAtual;
        return $this;
    }

    public function getSnFinalizado(): ?int
    {
        return $this->snFinalizado;
    }

    public function setSnFinalizado(?int $snFinalizado): self
    {
        $this->snFinalizado = $snFinalizado;
        return $this;
    }

    public function getDtUltimoAcesso(): ?\DateTimeInterface
    {
        return $this->dtUltimoAcesso;
    }

    public function setDtUltimoAcesso(?\DateTimeInterface $dtUltimoAcesso): self
    {
        $this->dtUltimoAcesso = $dtUltimoAcesso;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }
}
