<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuCacheHashRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCacheHashRepository::class)]
#[ORM\Table(
    name: 'nu_cache_hash',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_HASH', columns: ['ds_hash'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
class NuCacheHash
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_hash', type: 'integer')]
    private ?int $cdHash = null;

    #[ORM\Column(name: 'ds_nome_arquivo', type: 'string', length: 255, options: ['comment' => 'Nome do arquivo que será gravado no servidor'])]
    private ?string $dsNomeArquivo = null;

    #[ORM\Column(name: 'ds_hash', type: 'string', length: 32, options: ['comment' => 'Hash MD5 de uma chave única que identifica o arquivo e é capaz de dizer se ele foi modificado ou não. (ex.: array serializada de resultados de um gráfico).'])]
    private ?string $dsHash = null;

    #[ORM\Column(name: 'cd_modulo', type: 'integer', options: ['comment' => 'Código do módulo a que se refere o arquivo.'])]
    private ?int $cdModulo = null;

    public function __construct(
        ?string $dsNomeArquivo = null,
        ?string $dsHash = null,
        ?int $cdModulo = null
    ) {
        $this->dsNomeArquivo = $dsNomeArquivo;
        $this->dsHash = $dsHash;
        $this->cdModulo = $cdModulo;
    }

    public function getCdHash(): ?int
    {
        return $this->cdHash;
    }

    public function getDsNomeArquivo(): ?string
    {
        return $this->dsNomeArquivo;
    }

    public function setDsNomeArquivo(?string $dsNomeArquivo): self
    {
        $this->dsNomeArquivo = $dsNomeArquivo;
        return $this;
    }

    public function getDsHash(): ?string
    {
        return $this->dsHash;
    }

    public function setDsHash(?string $dsHash): self
    {
        $this->dsHash = $dsHash;
        return $this;
    }

    public function getCdModulo(): ?int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(?int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
        return $this;
    }
}
