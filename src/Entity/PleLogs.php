<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PleLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleLogsRepository::class)]
#[ORM\Table(
    name: 'ple_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_ACAO', columns: ['cd_acao'])]
#[ORM\Index(name: 'IX_CD_TIPO_DOCUMENTO', columns: ['cd_tipo_documento'])]
#[ORM\Index(name: 'IX_CD_TURMASPROFESSORES', columns: ['cd_turmasprofessores'])]
class PleLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'codigo', type: 'integer')]
    private ?int $codigo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_acao', type: 'integer')]
    private ?int $cdAcao = null;

    #[ORM\Column(name: 'cd_tipo_documento', type: 'integer')]
    private ?int $cdTipoDocumento = null;

    #[ORM\Column(name: 'cd_turmasprofessores', type: 'integer')]
    private ?int $cdTurmasprofessores = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime')]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $descricao = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdAcao = null,
        ?int $cdTipoDocumento = null,
        ?int $cdTurmasprofessores = null,
        ?\DateTimeInterface $dtLog = null,
        ?string $descricao = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdAcao = $cdAcao;
        $this->cdTipoDocumento = $cdTipoDocumento;
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        $this->dtLog = $dtLog;
        $this->descricao = $descricao;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
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

    public function getCdAcao(): ?int
    {
        return $this->cdAcao;
    }

    public function setCdAcao(?int $cdAcao): self
    {
        $this->cdAcao = $cdAcao;
        return $this;
    }

    public function getCdTipoDocumento(): ?int
    {
        return $this->cdTipoDocumento;
    }

    public function setCdTipoDocumento(?int $cdTipoDocumento): self
    {
        $this->cdTipoDocumento = $cdTipoDocumento;
        return $this;
    }

    public function getCdTurmasprofessores(): ?int
    {
        return $this->cdTurmasprofessores;
    }

    public function setCdTurmasprofessores(?int $cdTurmasprofessores): self
    {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }
}
