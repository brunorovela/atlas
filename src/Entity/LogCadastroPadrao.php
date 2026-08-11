<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogCadastroPadraoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogCadastroPadraoRepository::class)]
#[ORM\Table(
    name: 'log_cadastro_padrao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
class LogCadastroPadrao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro_padrao', type: 'integer')]
    private ?int $cdCadastroPadrao = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer')]
    private ?int $cdModulo = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'ds_chaves', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsChaves = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsDescricao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdModulo = null,
        ?int $cdAcao = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $dsChaves = null,
        ?string $dsDescricao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdModulo = $cdModulo;
        $this->cdAcao = $cdAcao;
        $this->dtLog = $dtLog;
        $this->dsChaves = $dsChaves;
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdCadastroPadrao(): ?int
    {
        return $this->cdCadastroPadrao;
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

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function getDsChaves(): ?string
    {
        return $this->dsChaves;
    }

    public function setDsChaves(?string $dsChaves): self
    {
        $this->dsChaves = $dsChaves;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
