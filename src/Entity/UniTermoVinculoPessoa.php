<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniTermoVinculoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniTermoVinculoPessoaRepository::class)]
#[ORM\Table(
    name: 'uni_termo_vinculo_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_termo_aceite', columns: ['cd_termo_aceite'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'uni_termo_vinculo_pessoa_ibfk_1', 'colunas' => ['cd_termo_aceite'], 'tabelaAlvo' => 'uni_termo_aceite', 'colunasAlvo' => ['cd_termo_aceite'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniTermoVinculoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_termo_vinculo_pessoa', type: 'integer')]
    private ?int $cdTermoVinculoPessoa = null;

    #[ORM\ManyToOne(targetEntity: UniTermoAceite::class)]
    #[ORM\JoinColumn(name: 'cd_termo_aceite', referencedColumnName: 'cd_termo_aceite', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniTermoAceite $cdTermoAceite = null;

    #[ORM\Column(name: 'cd_pessoa_aceite', type: 'integer')]
    private ?int $cdPessoaAceite = null;

    #[ORM\Column(name: 'cd_pessoa_refere', type: 'integer')]
    private ?int $cdPessoaRefere = null;

    #[ORM\Column(name: 'cd_grupo_aceite', type: 'integer', nullable: true)]
    private ?int $cdGrupoAceite = null;

    #[ORM\Column(name: 'cd_grupo_refere', type: 'integer', nullable: true)]
    private ?int $cdGrupoRefere = null;

    #[ORM\Column(name: 'dt_aceite', type: 'datetime')]
    private ?\DateTimeInterface $dtAceite = null;

    #[ORM\Column(name: 'ds_ip_pessoa_aceite', type: 'string', length: 255, nullable: true)]
    private ?string $dsIpPessoaAceite = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?UniTermoAceite $cdTermoAceite = null,
        ?int $cdPessoaAceite = null,
        ?int $cdPessoaRefere = null,
        ?int $cdGrupoAceite = null,
        ?int $cdGrupoRefere = null,
        ?\DateTimeInterface $dtAceite = null,
        ?string $dsIpPessoaAceite = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTermoAceite = $cdTermoAceite;
        $this->cdPessoaAceite = $cdPessoaAceite;
        $this->cdPessoaRefere = $cdPessoaRefere;
        $this->cdGrupoAceite = $cdGrupoAceite;
        $this->cdGrupoRefere = $cdGrupoRefere;
        $this->dtAceite = $dtAceite;
        $this->dsIpPessoaAceite = $dsIpPessoaAceite;
        $this->dtBase = $dtBase;
    }

    public function getCdTermoVinculoPessoa(): ?int
    {
        return $this->cdTermoVinculoPessoa;
    }

    public function getCdTermoAceite(): ?UniTermoAceite
    {
        return $this->cdTermoAceite;
    }

    public function setCdTermoAceite(?UniTermoAceite $cdTermoAceite): self
    {
        $this->cdTermoAceite = $cdTermoAceite;
        return $this;
    }

    public function getCdPessoaAceite(): ?int
    {
        return $this->cdPessoaAceite;
    }

    public function setCdPessoaAceite(?int $cdPessoaAceite): self
    {
        $this->cdPessoaAceite = $cdPessoaAceite;
        return $this;
    }

    public function getCdPessoaRefere(): ?int
    {
        return $this->cdPessoaRefere;
    }

    public function setCdPessoaRefere(?int $cdPessoaRefere): self
    {
        $this->cdPessoaRefere = $cdPessoaRefere;
        return $this;
    }

    public function getCdGrupoAceite(): ?int
    {
        return $this->cdGrupoAceite;
    }

    public function setCdGrupoAceite(?int $cdGrupoAceite): self
    {
        $this->cdGrupoAceite = $cdGrupoAceite;
        return $this;
    }

    public function getCdGrupoRefere(): ?int
    {
        return $this->cdGrupoRefere;
    }

    public function setCdGrupoRefere(?int $cdGrupoRefere): self
    {
        $this->cdGrupoRefere = $cdGrupoRefere;
        return $this;
    }

    public function getDtAceite(): ?\DateTimeInterface
    {
        return $this->dtAceite;
    }

    public function setDtAceite(?\DateTimeInterface $dtAceite): self
    {
        $this->dtAceite = $dtAceite;
        return $this;
    }

    public function getDsIpPessoaAceite(): ?string
    {
        return $this->dsIpPessoaAceite;
    }

    public function setDsIpPessoaAceite(?string $dsIpPessoaAceite): self
    {
        $this->dsIpPessoaAceite = $dsIpPessoaAceite;
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
}
