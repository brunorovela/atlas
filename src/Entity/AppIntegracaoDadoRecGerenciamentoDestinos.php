<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoRecGerenciamentoDestinosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoRecGerenciamentoDestinosRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_rec_gerenciamento_destinos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_GERENCIAMENTO_DESTINOS', columns: ['cd_rec_destinos_origem', 'cd_pessoa_origem', 'id_curso', 'id_turma', 'id_disciplina'])]
#[ORM\Index(name: 'idx_app_integracao_rec_gerenciamento_destinos_sn', columns: ['sn_integrado', 'sn_excluido'])]
class AppIntegracaoDadoRecGerenciamentoDestinos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_rec_gerenciamento_destinos', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecGerenciamentoDestinos = null;

    #[ORM\Column(name: 'cd_rec_destinos_origem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecDestinosOrigem = null;

    #[ORM\Column(name: 'cd_pessoa_origem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoaOrigem = null;

    #[ORM\Column(name: 'id_curso', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $idCurso = null;

    #[ORM\Column(name: 'id_turma', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $idTurma = null;

    #[ORM\Column(name: 'id_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $idDisciplina = null;

    #[ORM\Column(name: 'ds_papel', type: 'string', length: 255)]
    private ?string $dsPapel = null;

    #[ORM\Column(name: 'ds_papel_amigavel', type: 'string', length: 255)]
    private ?string $dsPapelAmigavel = null;

    #[ORM\Column(name: 'ds_papel_origem', type: 'string', length: 255)]
    private ?string $dsPapelOrigem = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $cdRecDestinosOrigem = null,
        ?int $cdPessoaOrigem = null,
        ?int $idCurso = null,
        ?int $idTurma = null,
        ?int $idDisciplina = null,
        ?string $dsPapel = null,
        ?string $dsPapelAmigavel = null,
        ?string $dsPapelOrigem = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->cdRecDestinosOrigem = $cdRecDestinosOrigem;
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        $this->idCurso = $idCurso;
        $this->idTurma = $idTurma;
        $this->idDisciplina = $idDisciplina;
        $this->dsPapel = $dsPapel;
        $this->dsPapelAmigavel = $dsPapelAmigavel;
        $this->dsPapelOrigem = $dsPapelOrigem;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCdRecGerenciamentoDestinos(): ?int
    {
        return $this->cdRecGerenciamentoDestinos;
    }

    public function getCdRecDestinosOrigem(): ?int
    {
        return $this->cdRecDestinosOrigem;
    }

    public function setCdRecDestinosOrigem(?int $cdRecDestinosOrigem): self
    {
        $this->cdRecDestinosOrigem = $cdRecDestinosOrigem;
        return $this;
    }

    public function getCdPessoaOrigem(): ?int
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(?int $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        return $this;
    }

    public function getIdCurso(): ?int
    {
        return $this->idCurso;
    }

    public function setIdCurso(?int $idCurso): self
    {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function getIdTurma(): ?int
    {
        return $this->idTurma;
    }

    public function setIdTurma(?int $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getIdDisciplina(): ?int
    {
        return $this->idDisciplina;
    }

    public function setIdDisciplina(?int $idDisciplina): self
    {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function getDsPapel(): ?string
    {
        return $this->dsPapel;
    }

    public function setDsPapel(?string $dsPapel): self
    {
        $this->dsPapel = $dsPapel;
        return $this;
    }

    public function getDsPapelAmigavel(): ?string
    {
        return $this->dsPapelAmigavel;
    }

    public function setDsPapelAmigavel(?string $dsPapelAmigavel): self
    {
        $this->dsPapelAmigavel = $dsPapelAmigavel;
        return $this;
    }

    public function getDsPapelOrigem(): ?string
    {
        return $this->dsPapelOrigem;
    }

    public function setDsPapelOrigem(?string $dsPapelOrigem): self
    {
        $this->dsPapelOrigem = $dsPapelOrigem;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
