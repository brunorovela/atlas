<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ContatosCadastroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContatosCadastroRepository::class)]
#[ORM\Table(
    name: 'contatos_cadastro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ContatosCadastro
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_informacao', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdInformacao = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_campo', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdCampo = 0;

    #[ORM\Column(name: 'ds_conteudo', type: 'string', length: 255, nullable: true)]
    private ?string $dsConteudo = null;

    public function __construct(
        int $cdInformacao = 0,
        int $cdCampo = 0,
        ?string $dsConteudo = null
    ) {
        $this->cdInformacao = $cdInformacao;
        $this->cdCampo = $cdCampo;
        $this->dsConteudo = $dsConteudo;
    }

    public function getCdInformacao(): int
    {
        return $this->cdInformacao;
    }

    public function setCdInformacao(int $cdInformacao): self
    {
        $this->cdInformacao = $cdInformacao;
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
