<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OmieTipoTituloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OmieTipoTituloRepository::class)]
#[ORM\Table(
    name: 'omie_tipo_titulo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_OMIE_TIPO_TITULO_TIPO_TITULO', columns: ['cd_integracao_omie', 'cd_tipo_titulo'])]
class OmieTipoTitulo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_omie_tipo_titulo', type: 'integer')]
    private ?int $cdOmieTipoTitulo = null;

    #[ORM\Column(name: 'cd_integracao_omie', type: 'smallint')]
    private ?int $cdIntegracaoOmie = null;

    #[ORM\Column(name: 'cd_tipo_titulo', type: 'smallint')]
    private ?int $cdTipoTitulo = null;

    #[ORM\Column(name: 'ds_documento_omie_pk', type: 'string', length: 255)]
    private ?string $dsDocumentoOmiePk = null;

    #[ORM\Column(name: 'ds_categoria_omie_pk', type: 'string', length: 255, nullable: true)]
    private ?string $dsCategoriaOmiePk = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdIntegracaoOmie = null,
        ?int $cdTipoTitulo = null,
        ?string $dsDocumentoOmiePk = null,
        ?string $dsCategoriaOmiePk = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        $this->cdTipoTitulo = $cdTipoTitulo;
        $this->dsDocumentoOmiePk = $dsDocumentoOmiePk;
        $this->dsCategoriaOmiePk = $dsCategoriaOmiePk;
        $this->dtBase = $dtBase;
    }

    public function getCdOmieTipoTitulo(): ?int
    {
        return $this->cdOmieTipoTitulo;
    }

    public function getCdIntegracaoOmie(): ?int
    {
        return $this->cdIntegracaoOmie;
    }

    public function setCdIntegracaoOmie(?int $cdIntegracaoOmie): self
    {
        $this->cdIntegracaoOmie = $cdIntegracaoOmie;
        return $this;
    }

    public function getCdTipoTitulo(): ?int
    {
        return $this->cdTipoTitulo;
    }

    public function setCdTipoTitulo(?int $cdTipoTitulo): self
    {
        $this->cdTipoTitulo = $cdTipoTitulo;
        return $this;
    }

    public function getDsDocumentoOmiePk(): ?string
    {
        return $this->dsDocumentoOmiePk;
    }

    public function setDsDocumentoOmiePk(?string $dsDocumentoOmiePk): self
    {
        $this->dsDocumentoOmiePk = $dsDocumentoOmiePk;
        return $this;
    }

    public function getDsCategoriaOmiePk(): ?string
    {
        return $this->dsCategoriaOmiePk;
    }

    public function setDsCategoriaOmiePk(?string $dsCategoriaOmiePk): self
    {
        $this->dsCategoriaOmiePk = $dsCategoriaOmiePk;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
