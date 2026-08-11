<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GeAlunosAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeAlunosAnexoRepository::class)]
#[ORM\Table(
    name: 'ge_alunos_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'ge_alunos_anexo_unique', columns: ['ds_chave'])]
#[ORM\Index(name: 'idx_ge_alunos_anexo_cd_ge_aluno', columns: ['cd_ge_aluno'])]
class GeAlunosAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ge_aluno_anexo', type: 'integer')]
    private ?int $cdGeAlunoAnexo = null;

    #[ORM\Column(name: 'cd_ge_aluno', type: 'integer')]
    private ?int $cdGeAluno = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'mb_anexo', type: 'blob')]
    private ?string $mbAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 100)]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_tamanho', type: 'string', length: 30)]
    private ?string $dsTamanho = null;

    public function __construct(
        ?int $cdGeAluno = null,
        ?string $dsChave = null,
        ?string $mbAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsTamanho = null
    ) {
        $this->cdGeAluno = $cdGeAluno;
        $this->dsChave = $dsChave;
        $this->mbAnexo = $mbAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsTamanho = $dsTamanho;
    }

    public function getCdGeAlunoAnexo(): ?int
    {
        return $this->cdGeAlunoAnexo;
    }

    public function getCdGeAluno(): ?int
    {
        return $this->cdGeAluno;
    }

    public function setCdGeAluno(?int $cdGeAluno): self
    {
        $this->cdGeAluno = $cdGeAluno;
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
