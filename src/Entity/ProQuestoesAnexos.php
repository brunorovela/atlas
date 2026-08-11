<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProQuestoesAnexosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProQuestoesAnexosRepository::class)]
#[ORM\Table(
    name: 'pro_questoes_anexos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Tabela de Anexos de Questões']
)]
#[ORM\UniqueConstraint(name: 'UK_QUESTAO', columns: ['cd_questao'])]
class ProQuestoesAnexos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestaoAnexo = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer')]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'me_anexo', type: 'blob', length: 65535, nullable: true)]
    private ?string $meAnexo = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    public function __construct(
        ?int $cdQuestao = null,
        ?string $meAnexo = null,
        ?string $nmArquivo = null
    ) {
        $this->cdQuestao = $cdQuestao;
        $this->meAnexo = $meAnexo;
        $this->nmArquivo = $nmArquivo;
    }

    public function getCdQuestaoAnexo(): ?int
    {
        return $this->cdQuestaoAnexo;
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

    public function getMeAnexo(): ?string
    {
        return $this->meAnexo;
    }

    public function setMeAnexo(?string $meAnexo): self
    {
        $this->meAnexo = $meAnexo;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }
}
