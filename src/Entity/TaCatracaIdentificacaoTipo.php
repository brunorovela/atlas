<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\TaCatracaIdentificacaoTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaCatracaIdentificacaoTipoRepository::class)]
#[ORM\Table(
    name: 'ta_catraca_identificacao_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_IDENTIFICACAO_TIPO_DS_CHAVE', columns: ['DS_CHAVE'])]
#[ORM\UniqueConstraint(name: 'UK_TA_CATRACA_IDENTIFICACAO_TIPO_NM_IDENTIFICACAO', columns: ['NM_IDENTIFICACAO'])]
class TaCatracaIdentificacaoTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_CATRACA_IDENTIFICACAO_TIPO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdCatracaIdentificacaoTipo = null;

    #[ORM\Column(name: 'NM_IDENTIFICACAO', type: 'string', length: 255)]
    private ?string $nmIdentificacao = null;

    #[ORM\Column(name: 'DS_CHAVE', type: 'string', length: 32)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $nmIdentificacao = null,
        ?string $dsChave = null
    ) {
        $this->nmIdentificacao = $nmIdentificacao;
        $this->dsChave = $dsChave;
    }

    public function getCdCatracaIdentificacaoTipo(): ?int
    {
        return $this->cdCatracaIdentificacaoTipo;
    }

    public function getNmIdentificacao(): ?string
    {
        return $this->nmIdentificacao;
    }

    public function setNmIdentificacao(?string $nmIdentificacao): self
    {
        $this->nmIdentificacao = $nmIdentificacao;
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
