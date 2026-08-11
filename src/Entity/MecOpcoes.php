<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MecOpcoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MecOpcoesRepository::class)]
#[ORM\Table(
    name: 'mec_opcoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_OPCAO', columns: ['cd_opcao'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class MecOpcoes
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_opcao', type: 'integer', options: ['default' => '0'])]
    private int $cdOpcao = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, options: ['default' => ''])]
    private string $dsChave = '';

    #[ORM\Column(name: 'ds_opcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsOpcao = null;

    public function __construct(
        int $cdOpcao = 0,
        string $dsChave = '',
        ?string $dsOpcao = null
    ) {
        $this->cdOpcao = $cdOpcao;
        $this->dsChave = $dsChave;
        $this->dsOpcao = $dsOpcao;
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

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
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
}
