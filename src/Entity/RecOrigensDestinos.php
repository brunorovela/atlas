<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RecOrigensDestinosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecOrigensDestinosRepository::class)]
#[ORM\Table(
    name: 'rec_origens_destinos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_origem', columns: ['cd_origem', 'cd_destino', 'cd_categoria'])]
#[ORM\Index(name: 'IX_CD_ORIGEM', columns: ['cd_origem'])]
#[ORM\Index(name: 'IX_CD_DESTINO', columns: ['cd_destino'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RecOrigensDestinos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_origem_destino', type: 'integer')]
    private ?int $cdOrigemDestino = null;

    #[ORM\Column(name: 'cd_origem', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdOrigem = 0;

    #[ORM\Column(name: 'cd_destino', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdDestino = 0;

    #[ORM\Column(name: 'sn_depto', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snDepto = 'N';

    #[ORM\Column(name: 'sn_curso', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snCurso = 'N';

    #[ORM\Column(name: 'sn_turma', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snTurma = 'N';

    #[ORM\Column(name: 'sn_pessoa', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snPessoa = 'N';

    #[ORM\Column(name: 'sn_disciplina', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snDisciplina = 'N';

    #[ORM\Column(name: 'ds_situacoes', type: 'string', length: 255, nullable: true, options: ['fixed' => true, 'default' => '(0,1,2,9,11,12)'])]
    private ?string $dsSituacoes = null;

    #[ORM\Column(name: 'sn_anexo', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snAnexo = 'N';

    #[ORM\Column(name: 'sn_sms', type: 'boolean', options: ['default' => '0'])]
    private bool $snSms = false;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdCategoria = 1;

    #[ORM\Column(name: 'sn_ativo', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snAtivo = 'N';

    #[ORM\Column(name: 'sn_confirmacao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snConfirmacao = 'N';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'sn_mostra_visualizado', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snMostraVisualizado = false;

    #[ORM\Column(name: 'sn_agenda_mais', type: 'boolean', options: ['default' => '0'])]
    private bool $snAgendaMais = false;

    public function __construct(
        int $cdOrigem = 0,
        int $cdDestino = 0,
        string $snDepto = 'N',
        string $snCurso = 'N',
        string $snTurma = 'N',
        string $snPessoa = 'N',
        string $snDisciplina = 'N',
        ?string $dsSituacoes = null,
        ?string $snAnexo = 'N',
        bool $snSms = false,
        ?int $cdCategoria = 1,
        ?string $snAtivo = 'N',
        ?string $snConfirmacao = 'N',
        ?\DateTimeInterface $dtBase = null,
        ?bool $snMostraVisualizado = false,
        bool $snAgendaMais = false
    ) {
        $this->cdOrigem = $cdOrigem;
        $this->cdDestino = $cdDestino;
        $this->snDepto = $snDepto;
        $this->snCurso = $snCurso;
        $this->snTurma = $snTurma;
        $this->snPessoa = $snPessoa;
        $this->snDisciplina = $snDisciplina;
        $this->dsSituacoes = $dsSituacoes;
        $this->snAnexo = $snAnexo;
        $this->snSms = $snSms;
        $this->cdCategoria = $cdCategoria;
        $this->snAtivo = $snAtivo;
        $this->snConfirmacao = $snConfirmacao;
        $this->dtBase = $dtBase;
        $this->snMostraVisualizado = $snMostraVisualizado;
        $this->snAgendaMais = $snAgendaMais;
    }

    public function getCdOrigemDestino(): ?int
    {
        return $this->cdOrigemDestino;
    }

    public function getCdOrigem(): int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getCdDestino(): int
    {
        return $this->cdDestino;
    }

    public function setCdDestino(int $cdDestino): self
    {
        $this->cdDestino = $cdDestino;
        return $this;
    }

    public function getSnDepto(): string
    {
        return $this->snDepto;
    }

    public function setSnDepto(string $snDepto): self
    {
        $this->snDepto = $snDepto;
        return $this;
    }

    public function getSnCurso(): string
    {
        return $this->snCurso;
    }

    public function setSnCurso(string $snCurso): self
    {
        $this->snCurso = $snCurso;
        return $this;
    }

    public function getSnTurma(): string
    {
        return $this->snTurma;
    }

    public function setSnTurma(string $snTurma): self
    {
        $this->snTurma = $snTurma;
        return $this;
    }

    public function getSnPessoa(): string
    {
        return $this->snPessoa;
    }

    public function setSnPessoa(string $snPessoa): self
    {
        $this->snPessoa = $snPessoa;
        return $this;
    }

    public function getSnDisciplina(): string
    {
        return $this->snDisciplina;
    }

    public function setSnDisciplina(string $snDisciplina): self
    {
        $this->snDisciplina = $snDisciplina;
        return $this;
    }

    public function getDsSituacoes(): ?string
    {
        return $this->dsSituacoes;
    }

    public function setDsSituacoes(?string $dsSituacoes): self
    {
        $this->dsSituacoes = $dsSituacoes;
        return $this;
    }

    public function getSnAnexo(): ?string
    {
        return $this->snAnexo;
    }

    public function setSnAnexo(?string $snAnexo): self
    {
        $this->snAnexo = $snAnexo;
        return $this;
    }

    public function isSnSms(): bool
    {
        return $this->snSms;
    }

    public function setSnSms(bool $snSms): self
    {
        $this->snSms = $snSms;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getSnAtivo(): ?string
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?string $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnConfirmacao(): ?string
    {
        return $this->snConfirmacao;
    }

    public function setSnConfirmacao(?string $snConfirmacao): self
    {
        $this->snConfirmacao = $snConfirmacao;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }

    public function isSnMostraVisualizado(): ?bool
    {
        return $this->snMostraVisualizado;
    }

    public function setSnMostraVisualizado(?bool $snMostraVisualizado): self
    {
        $this->snMostraVisualizado = $snMostraVisualizado;
        return $this;
    }

    public function isSnAgendaMais(): bool
    {
        return $this->snAgendaMais;
    }

    public function setSnAgendaMais(bool $snAgendaMais): self
    {
        $this->snAgendaMais = $snAgendaMais;
        return $this;
    }
}
