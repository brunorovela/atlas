<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CursosTurmasCamposOpcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosTurmasCamposOpcoesRepository::class)]
#[ORM\Table(
    name: 'cursos_turmas_campos_opcoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CursosTurmasCamposOpcoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_opcao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdOpcao = 0;

    #[ORM\Column(name: 'ds_opcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsOpcao = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'me_opcoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $meOpcoes = null;

    public function __construct(
        int $cdOpcao = 0,
        ?string $dsOpcao = null,
        ?string $meSql = null,
        ?string $meOpcoes = null
    ) {
        $this->cdOpcao = $cdOpcao;
        $this->dsOpcao = $dsOpcao;
        $this->meSql = $meSql;
        $this->meOpcoes = $meOpcoes;
    }

    public function getCdOpcao(): int
    {
        return $this->cdOpcao;
    }

    public function setCdOpcao(int $cdOpcao): self
    {
        $this->cdOpcao = $cdOpcao;
        return $this;
    }

    public function getDsOpcao(): ?string
    {
        return $this->dsOpcao;
    }

    public function setDsOpcao(?string $dsOpcao): self
    {
        $this->dsOpcao = $dsOpcao;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }

    public function getMeOpcoes(): ?string
    {
        return $this->meOpcoes;
    }

    public function setMeOpcoes(?string $meOpcoes): self
    {
        $this->meOpcoes = $meOpcoes;
        return $this;
    }
}
