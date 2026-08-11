<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PessoasCadastroMemoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasCadastroMemoRepository::class)]
#[ORM\Table(
    name: 'pessoas_cadastro_memo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
class PessoasCadastroMemo
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCampo = 0;

    #[ORM\Column(name: 'ds_conteudo', type: 'text', length: 65535, nullable: true)]
    private ?string $dsConteudo = null;

    public function __construct(
        int $cdPessoa = 0,
        int $cdCampo = 0,
        ?string $dsConteudo = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdCampo = $cdCampo;
        $this->dsConteudo = $dsConteudo;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
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

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
        return $this;
    }
}
