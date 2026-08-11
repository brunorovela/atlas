<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogOperacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogOperacoesRepository::class)]
#[ORM\Table(
    name: 'log_operacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Opera??es que podem ser executadas']
)]
#[ORM\UniqueConstraint(name: 'cd_operacao', columns: ['cd_operacao'])]
#[ORM\UniqueConstraint(name: 'cd_operacao_2', columns: ['cd_chave'])]
class LogOperacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_operacao', type: 'integer')]
    private ?int $cdOperacao = null;

    #[ORM\Column(name: 'ds_operacao', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsOperacao = '';

    #[ORM\Column(name: 'cd_chave', type: 'string', length: 50, options: ['default' => ''])]
    private string $cdChave = '';

    public function __construct(
        string $dsOperacao = '',
        string $cdChave = ''
    ) {
        $this->dsOperacao = $dsOperacao;
        $this->cdChave = $cdChave;
    }

    public function getCdOperacao(): ?int
    {
        return $this->cdOperacao;
    }

    public function getDsOperacao(): string
    {
        return $this->dsOperacao;
    }

    public function setDsOperacao(string $dsOperacao): self
    {
        $this->dsOperacao = $dsOperacao;
        return $this;
    }

    public function getCdChave(): string
    {
        return $this->cdChave;
    }

    public function setCdChave(string $cdChave): self
    {
        $this->cdChave = $cdChave;
        return $this;
    }
}
