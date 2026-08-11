<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoAutentiqueDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoAutentiqueDocumentoRepository::class)]
#[ORM\Table(
    name: 'integracao_autentique_documento',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoAutentiqueDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'ds_uuid', type: 'string', length: 255)]
    private ?string $dsUuid = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_assinatura', type: 'string', length: 255)]
    private ?string $dsAssinatura = null;

    #[ORM\Column(name: 'dt_criacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCriacao = null;

    #[ORM\Column(name: 'dt_publicado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPublicado = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsUuid = null,
        ?string $dsNome = null,
        ?string $dsAssinatura = null,
        ?\DateTimeInterface $dtCriacao = null,
        ?\DateTimeInterface $dtPublicado = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsUuid = $dsUuid;
        $this->dsNome = $dsNome;
        $this->dsAssinatura = $dsAssinatura;
        $this->dtCriacao = $dtCriacao;
        $this->dtPublicado = $dtPublicado;
        $this->dtBase = $dtBase;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function getDsUuid(): ?string
    {
        return $this->dsUuid;
    }

    public function setDsUuid(?string $dsUuid): self
    {
        $this->dsUuid = $dsUuid;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsAssinatura(): ?string
    {
        return $this->dsAssinatura;
    }

    public function setDsAssinatura(?string $dsAssinatura): self
    {
        $this->dsAssinatura = $dsAssinatura;
        return $this;
    }

    public function getDtCriacao(): ?\DateTimeInterface
    {
        return $this->dtCriacao;
    }

    public function setDtCriacao(?\DateTimeInterface $dtCriacao): self
    {
        $this->dtCriacao = $dtCriacao;
        return $this;
    }

    public function getDtPublicado(): ?\DateTimeInterface
    {
        return $this->dtPublicado;
    }

    public function setDtPublicado(?\DateTimeInterface $dtPublicado): self
    {
        $this->dtPublicado = $dtPublicado;
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
