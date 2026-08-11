<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintQuestoesAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesAnexosRepository::class)]
#[ORM\Table(
    name: 'pint_questoes_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'ix_pinst_questoes_anexo_questoes', columns: ['cd_questao'])]
class PintQuestoesAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAnexo = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'mb_anexo', type: 'blob', nullable: true)]
    private ?string $mbAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 250, nullable: true)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_tamanho', type: 'string', length: 250, nullable: true)]
    private ?string $dsTamanho = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?string $mbAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsTamanho = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->mbAnexo = $mbAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsTamanho = $dsTamanho;
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
}
