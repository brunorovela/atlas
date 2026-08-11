<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncAvaliacoesDeferidasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncAvaliacoesDeferidasRepository::class)]
#[ORM\Table(
    name: 'estnc_avaliacoes_deferidas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_AVALIACOES_RESPONDIDAS', columns: ['cd_avaliacoes_respondidas'])]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_AVALIACAO', columns: ['cd_avaliacao'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'IX_CD_PESSOA_DEFERIMENTO', columns: ['cd_pessoa_deferimento'])]
#[ORM\Index(name: 'IX_CD_DEFERIMENTO', columns: ['cd_deferimento'])]
class EstncAvaliacoesDeferidas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacoes_deferidas', type: 'integer')]
    private ?int $cdAvaliacoesDeferidas = null;

    #[ORM\Column(name: 'cd_avaliacoes_respondidas', type: 'integer')]
    private ?int $cdAvaliacoesRespondidas = null;

    #[ORM\Column(name: 'cd_estagio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstagio = null;

    #[ORM\Column(name: 'cd_avaliacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAvaliacao = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'cd_pessoa_deferimento', type: 'integer', nullable: true)]
    private ?int $cdPessoaDeferimento = null;

    #[ORM\Column(name: 'dt_deferimento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtDeferimento = null;

    #[ORM\Column(name: 'ds_cnpj_instituicao', type: 'string', length: 255, nullable: true)]
    private ?string $dsCnpjInstituicao = null;

    #[ORM\Column(name: 'cd_deferimento', type: 'string', length: 255, nullable: true)]
    private ?string $cdDeferimento = null;

    #[ORM\Column(name: 'me_comentario', type: 'text', length: 16777215, nullable: true)]
    private ?string $meComentario = null;

    public function __construct(
        ?int $cdAvaliacoesRespondidas = null,
        ?int $cdEstagio = null,
        ?int $cdAvaliacao = null,
        ?int $cdGrupo = null,
        ?int $cdPessoaDeferimento = null,
        ?\DateTimeInterface $dtDeferimento = null,
        ?string $dsCnpjInstituicao = null,
        ?string $cdDeferimento = null,
        ?string $meComentario = null
    ) {
        $this->cdAvaliacoesRespondidas = $cdAvaliacoesRespondidas;
        $this->cdEstagio = $cdEstagio;
        $this->cdAvaliacao = $cdAvaliacao;
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoaDeferimento = $cdPessoaDeferimento;
        $this->dtDeferimento = $dtDeferimento;
        $this->dsCnpjInstituicao = $dsCnpjInstituicao;
        $this->cdDeferimento = $cdDeferimento;
        $this->meComentario = $meComentario;
    }

    public function getCdAvaliacoesDeferidas(): ?int
    {
        return $this->cdAvaliacoesDeferidas;
    }

    public function getCdAvaliacoesRespondidas(): ?int
    {
        return $this->cdAvaliacoesRespondidas;
    }

    public function setCdAvaliacoesRespondidas(?int $cdAvaliacoesRespondidas): self
    {
        $this->cdAvaliacoesRespondidas = $cdAvaliacoesRespondidas;
        return $this;
    }

    public function getCdEstagio(): ?int
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?int $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
        return $this;
    }

    public function getCdAvaliacao(): ?int
    {
        return $this->cdAvaliacao;
    }

    public function setCdAvaliacao(?int $cdAvaliacao): self
    {
        $this->cdAvaliacao = $cdAvaliacao;
        return $this;
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

    public function getCdPessoaDeferimento(): ?int
    {
        return $this->cdPessoaDeferimento;
    }

    public function setCdPessoaDeferimento(?int $cdPessoaDeferimento): self
    {
        $this->cdPessoaDeferimento = $cdPessoaDeferimento;
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

    public function getDsCnpjInstituicao(): ?string
    {
        return $this->dsCnpjInstituicao;
    }

    public function setDsCnpjInstituicao(?string $dsCnpjInstituicao): self
    {
        $this->dsCnpjInstituicao = $dsCnpjInstituicao;
        return $this;
    }

    public function getCdDeferimento(): ?string
    {
        return $this->cdDeferimento;
    }

    public function setCdDeferimento(?string $cdDeferimento): self
    {
        $this->cdDeferimento = $cdDeferimento;
        return $this;
    }

    public function getMeComentario(): ?string
    {
        return $this->meComentario;
    }

    public function setMeComentario(?string $meComentario): self
    {
        $this->meComentario = $meComentario;
        return $this;
    }
}
