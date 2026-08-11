<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExpoTabelasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoTabelasRepository::class)]
#[ORM\Table(
    name: 'expo_tabelas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
#[ORM\Index(name: 'IX_SN_APAGADA', columns: ['sn_apagada'])]
class ExpoTabelas
{
    #[ORM\Id]
    #[ORM\Column(name: 'nm_tabela', type: 'string', length: 255, options: ['default' => ''])]
    private string $nmTabela = '';

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'sn_apagada', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snApagada = 0;

    public function __construct(
        string $nmTabela = '',
        ?string $dsDescricao = null,
        ?int $snAtivo = 1,
        ?int $snApagada = 0
    ) {
        $this->nmTabela = $nmTabela;
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
        $this->snApagada = $snApagada;
    }

    public function getNmTabela(): string
    {
        return $this->nmTabela;
    }

    public function setNmTabela(string $nmTabela): self
    {
        $this->nmTabela = $nmTabela;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnApagada(): ?int
    {
        return $this->snApagada;
    }

    public function setSnApagada(?int $snApagada): self
    {
        $this->snApagada = $snApagada;
        return $this;
    }
}
