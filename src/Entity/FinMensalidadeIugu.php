<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinMensalidadeIuguRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinMensalidadeIuguRepository::class)]
#[ORM\Table(
    name: 'fin_mensalidade_iugu',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UNQ_CD_MENSALIDADE_DS_HASH', columns: ['ds_hash_integracao', 'cd_mensalidade'])]
#[ORM\Index(name: 'FK_fin_mensalidade_iugu_mensalidades', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'FK_fin_mensalidade_iugu_fin_iugu_situacao', columns: ['cd_iugu_situacao'])]
class FinMensalidadeIugu
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensalidade_iugu', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensalidadeIugu = null;

    #[ORM\Column(name: 'cd_mensalidade', type: 'integer', nullable: true)]
    private ?int $cdMensalidade = null;

    #[ORM\Column(name: 'ds_hash_integracao', type: 'string', length: 255)]
    private ?string $dsHashIntegracao = null;

    #[ORM\Column(name: 'cd_iugu_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdIuguSituacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_ultimo_log', type: 'text', length: 65535, nullable: true)]
    private ?string $dsUltimoLog = null;

    #[ORM\Column(name: 'vl_titulo', type: 'smallfloat', nullable: true)]
    private ?float $vlTitulo = null;

    #[ORM\Column(name: 'vl_desconto', type: 'smallfloat', nullable: true)]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'ds_link_iugu', type: 'string', length: 100, nullable: true)]
    private ?string $dsLinkIugu = null;

    public function __construct(
        ?int $cdMensalidade = null,
        ?string $dsHashIntegracao = null,
        ?int $cdIuguSituacao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsUltimoLog = null,
        ?float $vlTitulo = null,
        ?float $vlDesconto = null,
        ?string $dsLinkIugu = null
    ) {
        $this->cdMensalidade = $cdMensalidade;
        $this->dsHashIntegracao = $dsHashIntegracao;
        $this->cdIuguSituacao = $cdIuguSituacao;
        $this->dtCadastro = $dtCadastro;
        $this->dsUltimoLog = $dsUltimoLog;
        $this->vlTitulo = $vlTitulo;
        $this->vlDesconto = $vlDesconto;
        $this->dsLinkIugu = $dsLinkIugu;
    }

    public function getCdMensalidadeIugu(): ?int
    {
        return $this->cdMensalidadeIugu;
    }

    public function getCdMensalidade(): ?int
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?int $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
        return $this;
    }

    public function getDsHashIntegracao(): ?string
    {
        return $this->dsHashIntegracao;
    }

    public function setDsHashIntegracao(?string $dsHashIntegracao): self
    {
        $this->dsHashIntegracao = $dsHashIntegracao;
        return $this;
    }

    public function getCdIuguSituacao(): ?int
    {
        return $this->cdIuguSituacao;
    }

    public function setCdIuguSituacao(?int $cdIuguSituacao): self
    {
        $this->cdIuguSituacao = $cdIuguSituacao;
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

    public function getDsUltimoLog(): ?string
    {
        return $this->dsUltimoLog;
    }

    public function setDsUltimoLog(?string $dsUltimoLog): self
    {
        $this->dsUltimoLog = $dsUltimoLog;
        return $this;
    }

    public function getVlTitulo(): ?float
    {
        return $this->vlTitulo;
    }

    public function setVlTitulo(?float $vlTitulo): self
    {
        $this->vlTitulo = $vlTitulo;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getDsLinkIugu(): ?string
    {
        return $this->dsLinkIugu;
    }

    public function setDsLinkIugu(?string $dsLinkIugu): self
    {
        $this->dsLinkIugu = $dsLinkIugu;
        return $this;
    }
}
