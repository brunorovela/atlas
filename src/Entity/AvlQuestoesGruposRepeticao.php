<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvlQuestoesGruposRepeticaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvlQuestoesGruposRepeticaoRepository::class)]
#[ORM\Table(
    name: 'avl_questoes_grupos_repeticao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_percorrer', columns: ['cd_repeticao'])]
class AvlQuestoesGruposRepeticao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_repeticao', type: 'integer')]
    private ?int $cdRepeticao = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsDescricao = '';

    public function __construct(
        string $dsDescricao = ''
    ) {
        $this->dsDescricao = $dsDescricao;
    }

    public function getCdRepeticao(): ?int
    {
        return $this->cdRepeticao;
    }

    public function getDsDescricao(): string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }
}
