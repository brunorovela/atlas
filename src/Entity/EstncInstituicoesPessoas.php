<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncInstituicoesPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncInstituicoesPessoasRepository::class)]
#[ORM\Table(
    name: 'estnc_instituicoes_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['CD_INSTITUICAO'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_GRUPO', columns: ['CD_GRUPO'])]
class EstncInstituicoesPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'CD_INSTITUICAO', type: 'integer')]
    private ?int $cdInstituicao = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_PESSOA', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Id]
    #[ORM\Column(name: 'CD_GRUPO', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupo = 0;

    #[ORM\Column(name: 'sn_assina', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAssina = 0;

    public function __construct(
        ?int $cdInstituicao = null,
        ?int $cdPessoa = null,
        int $cdGrupo = 0,
        int $snAssina = 0
    ) {
        $this->cdInstituicao = $cdInstituicao;
        $this->cdPessoa = $cdPessoa;
        $this->cdGrupo = $cdGrupo;
        $this->snAssina = $snAssina;
    }

    public function getCdInstituicao(): ?int
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?int $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
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

    public function getCdGrupo(): int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
        return $this;
    }

    public function getSnAssina(): int
    {
        return $this->snAssina;
    }

    public function setSnAssina(int $snAssina): self
    {
        $this->snAssina = $snAssina;
        return $this;
    }
}
