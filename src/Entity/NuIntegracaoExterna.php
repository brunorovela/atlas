<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuIntegracaoExternaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuIntegracaoExternaRepository::class)]
#[ORM\Table(
    name: 'nu_integracao_externa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_INTEGRACAO_EXTERNA_CHAVE', columns: ['ds_chave'])]
#[ORM\UniqueConstraint(name: 'UK_INTEGRACAO_EXTERNA_DESCRICAO', columns: ['ds_sistema'])]
class NuIntegracaoExterna
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_sistema', type: 'smallint')]
    private ?int $cdSistema = null;

    #[ORM\Column(name: 'ds_sistema', type: 'string', length: 120)]
    private ?string $dsSistema = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 30)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_email_responsavel', type: 'string', length: 50, nullable: true)]
    private ?string $dsEmailResponsavel = null;

    #[ORM\Column(name: 'ds_url_integracao', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrlIntegracao = null;

    #[ORM\Column(name: 'dt_ultima_sincronizacao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtUltimaSincronizacao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snAtivo = 0;

    #[ORM\Column(name: 'sn_exibir', type: 'integer')]
    private ?int $snExibir = null;

    public function __construct(
        ?string $dsSistema = null,
        ?string $dsChave = null,
        ?string $dsEmailResponsavel = null,
        ?string $dsUrlIntegracao = null,
        ?\DateTimeInterface $dtUltimaSincronizacao = null,
        int $snAtivo = 0,
        ?int $snExibir = null
    ) {
        $this->dsSistema = $dsSistema;
        $this->dsChave = $dsChave;
        $this->dsEmailResponsavel = $dsEmailResponsavel;
        $this->dsUrlIntegracao = $dsUrlIntegracao;
        $this->dtUltimaSincronizacao = $dtUltimaSincronizacao;
        $this->snAtivo = $snAtivo;
        $this->snExibir = $snExibir;
    }

    public function getCdSistema(): ?int
    {
        return $this->cdSistema;
    }

    public function getDsSistema(): ?string
    {
        return $this->dsSistema;
    }

    public function setDsSistema(?string $dsSistema): self
    {
        $this->dsSistema = $dsSistema;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsEmailResponsavel(): ?string
    {
        return $this->dsEmailResponsavel;
    }

    public function setDsEmailResponsavel(?string $dsEmailResponsavel): self
    {
        $this->dsEmailResponsavel = $dsEmailResponsavel;
        return $this;
    }

    public function getDsUrlIntegracao(): ?string
    {
        return $this->dsUrlIntegracao;
    }

    public function setDsUrlIntegracao(?string $dsUrlIntegracao): self
    {
        $this->dsUrlIntegracao = $dsUrlIntegracao;
        return $this;
    }

    public function getDtUltimaSincronizacao(): ?\DateTimeInterface
    {
        return $this->dtUltimaSincronizacao;
    }

    public function setDtUltimaSincronizacao(?\DateTimeInterface $dtUltimaSincronizacao): self
    {
        $this->dtUltimaSincronizacao = $dtUltimaSincronizacao;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnExibir(): ?int
    {
        return $this->snExibir;
    }

    public function setSnExibir(?int $snExibir): self
    {
        $this->snExibir = $snExibir;
        return $this;
    }
}
