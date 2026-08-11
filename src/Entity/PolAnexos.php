<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolAnexosRepository::class)]
#[ORM\Table(
    name: 'pol_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
class PolAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer')]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', nullable: true)]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'mb_anexo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $mbAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 100, nullable: true)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_tamanho', type: 'string', length: 30, nullable: true)]
    private ?string $dsTamanho = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?string $mbAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsTamanho = null,
        ?\DateTimeInterface $dtEnvio = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->mbAnexo = $mbAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsTamanho = $dsTamanho;
        $this->dtEnvio = $dtEnvio;
    }

    public function getCdAnexo(): ?int
    {
        return $this->cdAnexo;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getMbAnexo(): ?string
    {
        return $this->mbAnexo;
    }

    public function setMbAnexo(?string $mbAnexo): self
    {
        $this->mbAnexo = $mbAnexo;
        return $this;
    }

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getDsTamanho(): ?string
    {
        return $this->dsTamanho;
    }

    public function setDsTamanho(?string $dsTamanho): self
    {
        $this->dsTamanho = $dsTamanho;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }
}
