<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MonografiasSolicitacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasSolicitacoesRepository::class)]
#[ORM\Table(
    name: 'monografias_solicitacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class MonografiasSolicitacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_solicitacao', type: 'integer')]
    private ?int $cdSolicitacao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true)]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'me_ideia_principal', type: 'text', length: 16777215, nullable: true)]
    private ?string $meIdeiaPrincipal = null;

    #[ORM\Column(name: 'me_tema', type: 'text', length: 16777215, nullable: true)]
    private ?string $meTema = null;

    #[ORM\Column(name: 'dt_solicitacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSolicitacao = null;

    #[ORM\Column(name: 'cd_professor_area', type: 'integer', nullable: true)]
    private ?int $cdProfessorArea = null;

    #[ORM\Column(name: 'sn_aceito', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAceito = 0;

    #[ORM\Column(name: 'sn_pendente', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snPendente = 1;

    #[ORM\Column(name: 'sn_finalizado', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snFinalizado = 0;

    #[ORM\Column(name: 'dt_deferimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDeferimento = null;

    #[ORM\Column(name: 'dt_finalizacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFinalizacao = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 100, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'ds_motivo_indeferimento', type: 'string', length: 255, nullable: true)]
    private ?string $dsMotivoIndeferimento = null;

    public function __construct(
        int $cdPessoa = 0,
        ?int $cdProfessor = null,
        ?string $meIdeiaPrincipal = null,
        ?string $meTema = null,
        ?\DateTimeInterface $dtSolicitacao = null,
        ?int $cdProfessorArea = null,
        ?int $snAceito = 0,
        ?int $snPendente = 1,
        ?int $snFinalizado = 0,
        ?\DateTimeInterface $dtDeferimento = null,
        ?\DateTimeInterface $dtFinalizacao = null,
        ?string $cdCurso = null,
        ?string $dsMotivoIndeferimento = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdProfessor = $cdProfessor;
        $this->meIdeiaPrincipal = $meIdeiaPrincipal;
        $this->meTema = $meTema;
        $this->dtSolicitacao = $dtSolicitacao;
        $this->cdProfessorArea = $cdProfessorArea;
        $this->snAceito = $snAceito;
        $this->snPendente = $snPendente;
        $this->snFinalizado = $snFinalizado;
        $this->dtDeferimento = $dtDeferimento;
        $this->dtFinalizacao = $dtFinalizacao;
        $this->cdCurso = $cdCurso;
        $this->dsMotivoIndeferimento = $dsMotivoIndeferimento;
    }

    public function getCdSolicitacao(): ?int
    {
        return $this->cdSolicitacao;
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

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getMeIdeiaPrincipal(): ?string
    {
        return $this->meIdeiaPrincipal;
    }

    public function setMeIdeiaPrincipal(?string $meIdeiaPrincipal): self
    {
        $this->meIdeiaPrincipal = $meIdeiaPrincipal;
        return $this;
    }

    public function getMeTema(): ?string
    {
        return $this->meTema;
    }

    public function setMeTema(?string $meTema): self
    {
        $this->meTema = $meTema;
        return $this;
    }

    public function getDtSolicitacao(): ?\DateTimeInterface
    {
        return $this->dtSolicitacao;
    }

    public function setDtSolicitacao(?\DateTimeInterface $dtSolicitacao): self
    {
        $this->dtSolicitacao = $dtSolicitacao;
        return $this;
    }

    public function getCdProfessorArea(): ?int
    {
        return $this->cdProfessorArea;
    }

    public function setCdProfessorArea(?int $cdProfessorArea): self
    {
        $this->cdProfessorArea = $cdProfessorArea;
        return $this;
    }

    public function getSnAceito(): ?int
    {
        return $this->snAceito;
    }

    public function setSnAceito(?int $snAceito): self
    {
        $this->snAceito = $snAceito;
        return $this;
    }

    public function getSnPendente(): ?int
    {
        return $this->snPendente;
    }

    public function setSnPendente(?int $snPendente): self
    {
        $this->snPendente = $snPendente;
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

    public function getDtDeferimento(): ?\DateTimeInterface
    {
        return $this->dtDeferimento;
    }

    public function setDtDeferimento(?\DateTimeInterface $dtDeferimento): self
    {
        $this->dtDeferimento = $dtDeferimento;
        return $this;
    }

    public function getDtFinalizacao(): ?\DateTimeInterface
    {
        return $this->dtFinalizacao;
    }

    public function setDtFinalizacao(?\DateTimeInterface $dtFinalizacao): self
    {
        $this->dtFinalizacao = $dtFinalizacao;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getDsMotivoIndeferimento(): ?string
    {
        return $this->dsMotivoIndeferimento;
    }

    public function setDsMotivoIndeferimento(?string $dsMotivoIndeferimento): self
    {
        $this->dsMotivoIndeferimento = $dsMotivoIndeferimento;
        return $this;
    }
}
