<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasCamposAdicionaisOpcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasCamposAdicionaisOpcRepository::class)]
#[ORM\Table(
    name: 'pessoas_campos_adicionais_opc',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_opcao', columns: ['cd_opcao'])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
class PessoasCamposAdicionaisOpc
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_opcao', type: 'integer')]
    private ?int $cdOpcao = null;

    #[ORM\Column(name: 'cd_campo', type: 'integer', options: ['default' => '0'])]
    private int $cdCampo = 0;

    #[ORM\Column(name: 'ds_opcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsOpcao = null;

    public function __construct(
        int $cdCampo = 0,
        ?string $dsOpcao = null
    ) {
        $this->cdCampo = $cdCampo;
        $this->dsOpcao = $dsOpcao;
    }

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
    }

    public function getCdCampo(): int
    {
        return $this->cdCampo;
    }

    public function setCdCampo(int $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
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
