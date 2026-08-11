<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinCadastroContaLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCadastroContaLogRepository::class)]
#[ORM\Table(
    name: 'fin_cadastro_conta_log',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']
)]
#[ORM\Index(name: 'idx_fin_cadastro_conta_log_conta', columns: ['fin_cadastro_contas_id'])]
#[ORM\Index(name: 'idx_fin_cadastro_conta_log_usuario', columns: ['cd_usuario'])]
class FinCadastroContaLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'fin_cadastro_contas_id', type: 'integer')]
    private ?int $finCadastroContasId = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'me_dados', type: 'text', length: 16777215)]
    private ?string $meDados = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $finCadastroContasId = null,
        ?int $cdUsuario = null,
        ?string $meDados = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->finCadastroContasId = $finCadastroContasId;
        $this->cdUsuario = $cdUsuario;
        $this->meDados = $meDados;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFinCadastroContasId(): ?int
    {
        return $this->finCadastroContasId;
    }

    public function setFinCadastroContasId(?int $finCadastroContasId): self
    {
        $this->finCadastroContasId = $finCadastroContasId;
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

    public function getMeDados(): ?string
    {
        return $this->meDados;
    }

    public function setMeDados(?string $meDados): self
    {
        $this->meDados = $meDados;
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
