<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibAssuntosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAssuntosRepository::class)]
#[ORM\Table(
    name: 'bib_assuntos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ASSUNTO_TIPO', columns: ['cd_assunto_tipo'])]
#[ORM\Index(name: 'IX_ME_TERMOS_NAO_AUTORIZADOS', columns: ['me_termos_nao_autorizados'], options: ['lengths' => [100]])]
#[ORM\Index(name: 'FK_bib_assuntos_coligadas_matriz', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_bib_assuntos_coligadas_matriz', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BibAssuntos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_assunto', type: 'integer')]
    private ?int $cdAssunto = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'cd_assunto_tipo', type: 'integer', nullable: true)]
    private ?int $cdAssuntoTipo = null;

    #[ORM\Column(name: 'me_termos_nao_autorizados', type: 'text', length: 65535, nullable: true)]
    private ?string $meTermosNaoAutorizados = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    public function __construct(
        ?string $dsAssunto = null,
        ?int $cdAssuntoTipo = null,
        ?string $meTermosNaoAutorizados = null,
        ?ColigadasMatriz $cdColigadaMatriz = null
    ) {
        $this->dsAssunto = $dsAssunto;
        $this->cdAssuntoTipo = $cdAssuntoTipo;
        $this->meTermosNaoAutorizados = $meTermosNaoAutorizados;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
    }

    public function getCdAssunto(): ?int
    {
        return $this->cdAssunto;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getCdAssuntoTipo(): ?int
    {
        return $this->cdAssuntoTipo;
    }

    public function setCdAssuntoTipo(?int $cdAssuntoTipo): self
    {
        $this->cdAssuntoTipo = $cdAssuntoTipo;
        return $this;
    }

    public function getMeTermosNaoAutorizados(): ?string
    {
        return $this->meTermosNaoAutorizados;
    }

    public function setMeTermosNaoAutorizados(?string $meTermosNaoAutorizados): self
    {
        $this->meTermosNaoAutorizados = $meTermosNaoAutorizados;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }
}
