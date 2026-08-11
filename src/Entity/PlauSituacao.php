<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\PlauSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauSituacaoRepository::class)]
#[ORM\Table(
    name: 'plau_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class PlauSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAtivo = null;

    #[ORM\Column(name: 'sn_finalizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snFinalizado = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?int $snAtivo = null,
        ?int $snFinalizado = null,
        ?string $dsChave = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
        $this->snFinalizado = $snFinalizado;
        $this->dsChave = $dsChave;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
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

    public function getSnFinalizado(): ?int
    {
        return $this->snFinalizado;
    }

    public function setSnFinalizado(?int $snFinalizado): self
    {
        $this->snFinalizado = $snFinalizado;
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
}
