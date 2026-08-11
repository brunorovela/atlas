<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvasPessoasLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvasPessoasLogRepository::class)]
#[ORM\Table(
    name: 'pol_provas_pessoas_log',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_PROVA_LOG_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_PROVA_LOG_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_PROVA_LOG_CD_TURMA', columns: ['cd_turma'])]
#[ORM\Index(name: 'IX_PROVA_LOG_CD_USUARIO', columns: ['cd_usuario'])]
class PolProvasPessoasLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa_log', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaPessoaLog = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 20, nullable: true)]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    public function __construct(
        ?int $cdProva = null,
        ?string $cdTurma = null,
        ?int $cdPessoa = null,
        ?int $cdUsuario = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsAcao = null,
        ?string $meDescricao = null
    ) {
        $this->cdProva = $cdProva;
        $this->cdTurma = $cdTurma;
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
        $this->dtCadastro = $dtCadastro;
        $this->dsAcao = $dsAcao;
        $this->meDescricao = $meDescricao;
    }

    public function getCdProvaPessoaLog(): ?int
    {
        return $this->cdProvaPessoaLog;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
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

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
        return $this;
    }
}
