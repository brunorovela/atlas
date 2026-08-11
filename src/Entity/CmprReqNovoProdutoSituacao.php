<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CmprReqNovoProdutoSituacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprReqNovoProdutoSituacaoRepository::class)]
#[ORM\Table(
    name: 'cmpr_req_novo_produto_situacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_REQ_NOVO_PROD_SITUACAO_DS_CHAVE', columns: ['ds_chave'])]
class CmprReqNovoProdutoSituacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_situacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsSituacao = null,
        ?string $dsChave = null
    ) {
        $this->dsSituacao = $dsSituacao;
        $this->dsChave = $dsChave;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
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
