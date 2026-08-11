<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniNotificacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniNotificacoesRepository::class)]
#[ORM\Table(
    name: 'uni_notificacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['cd_grupo'])]
class UniNotificacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_notificacao', type: 'integer')]
    private ?int $cdNotificacao = null;

    #[ORM\Column(name: 'ds_notificacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsNotificacao = null;

    #[ORM\Column(name: 'ds_imagem', type: 'string', length: 255, nullable: true)]
    private ?string $dsImagem = null;

    #[ORM\Column(name: 'ds_url', type: 'text', length: 65535, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true)]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer', nullable: true)]
    private ?int $cdGrupo = null;

    #[ORM\Column(name: 'ds_chave_exclusao', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveExclusao = null;

    #[ORM\Column(name: 'sn_visualizado', type: 'boolean', nullable: true)]
    private ?bool $snVisualizado = null;

    public function __construct(
        ?string $dsNotificacao = null,
        ?string $dsImagem = null,
        ?string $dsUrl = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?int $cdPessoa = null,
        ?int $cdGrupo = null,
        ?string $dsChaveExclusao = null,
        ?bool $snVisualizado = null
    ) {
        $this->dsNotificacao = $dsNotificacao;
        $this->dsImagem = $dsImagem;
        $this->dsUrl = $dsUrl;
        $this->dtInclusao = $dtInclusao;
        $this->cdPessoa = $cdPessoa;
        $this->cdGrupo = $cdGrupo;
        $this->dsChaveExclusao = $dsChaveExclusao;
        $this->snVisualizado = $snVisualizado;
    }

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
    }

    public function getDsNotificacao(): ?string
    {
        return $this->dsNotificacao;
    }

    public function setDsNotificacao(?string $dsNotificacao): self
    {
        $this->dsNotificacao = $dsNotificacao;
        return $this;
    }

    public function getDsImagem(): ?string
    {
        return $this->dsImagem;
    }

    public function setDsImagem(?string $dsImagem): self
    {
        $this->dsImagem = $dsImagem;
        return $this;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
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

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getDsChaveExclusao(): ?string
    {
        return $this->dsChaveExclusao;
    }

    public function setDsChaveExclusao(?string $dsChaveExclusao): self
    {
        $this->dsChaveExclusao = $dsChaveExclusao;
        return $this;
    }

    public function isSnVisualizado(): ?bool
    {
        return $this->snVisualizado;
    }

    public function setSnVisualizado(?bool $snVisualizado): self
    {
        $this->snVisualizado = $snVisualizado;
        return $this;
    }
}
