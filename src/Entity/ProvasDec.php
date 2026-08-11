<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ProvasDecRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvasDecRepository::class)]
#[ORM\Table(
    name: 'provas_dec',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_declaracao', columns: ['cd_declaracao'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_PROFESSOR', columns: ['cd_professor'])]
class ProvasDec
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_declaracao', type: 'integer')]
    private ?int $cdDeclaracao = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdProfessor = 0;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 120, nullable: true, options: ['default' => '0'])]
    private ?string $dsTitulo = '0';

    #[ORM\Column(name: 'me_declaracao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDeclaracao = null;

    #[ORM\Column(name: 'sn_resposta', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snResposta = null;

    #[ORM\Column(name: 'ds_anexo', type: 'string', length: 140, nullable: true)]
    private ?string $dsAnexo = null;

    #[ORM\Column(name: 'cd_prova_origem', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdProvaOrigem = 0;

    #[ORM\Column(name: 'sn_ativa', type: 'boolean', nullable: true)]
    private ?bool $snAtiva = null;

    #[ORM\Column(name: 'sn_aprovada', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAprovada = 0;

    public function __construct(
        ?int $cdGrupo = null,
        ?int $cdProfessor = 0,
        ?string $dsTitulo = '0',
        ?string $meDeclaracao = null,
        ?string $snResposta = null,
        ?string $dsAnexo = null,
        ?int $cdProvaOrigem = 0,
        ?bool $snAtiva = null,
        ?int $snAprovada = 0
    ) {
        $this->cdGrupo = $cdGrupo;
        $this->cdProfessor = $cdProfessor;
        $this->dsTitulo = $dsTitulo;
        $this->meDeclaracao = $meDeclaracao;
        $this->snResposta = $snResposta;
        $this->dsAnexo = $dsAnexo;
        $this->cdProvaOrigem = $cdProvaOrigem;
        $this->snAtiva = $snAtiva;
        $this->snAprovada = $snAprovada;
    }

    public function getCdDeclaracao(): ?int
    {
        return $this->cdDeclaracao;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getMeDeclaracao(): ?string
    {
        return $this->meDeclaracao;
    }

    public function setMeDeclaracao(?string $meDeclaracao): self
    {
        $this->meDeclaracao = $meDeclaracao;
        return $this;
    }

    public function getSnResposta(): ?string
    {
        return $this->snResposta;
    }

    public function setSnResposta(?string $snResposta): self
    {
        $this->snResposta = $snResposta;
        return $this;
    }

    public function getDsAnexo(): ?string
    {
        return $this->dsAnexo;
    }

    public function setDsAnexo(?string $dsAnexo): self
    {
        $this->dsAnexo = $dsAnexo;
        return $this;
    }

    public function getCdProvaOrigem(): ?int
    {
        return $this->cdProvaOrigem;
    }

    public function setCdProvaOrigem(?int $cdProvaOrigem): self
    {
        $this->cdProvaOrigem = $cdProvaOrigem;
        return $this;
    }

    public function isSnAtiva(): ?bool
    {
        return $this->snAtiva;
    }

    public function setSnAtiva(?bool $snAtiva): self
    {
        $this->snAtiva = $snAtiva;
        return $this;
    }

    public function getSnAprovada(): ?int
    {
        return $this->snAprovada;
    }

    public function setSnAprovada(?int $snAprovada): self
    {
        $this->snAprovada = $snAprovada;
        return $this;
    }
}
