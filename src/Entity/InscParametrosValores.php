<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\InscParametrosValoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscParametrosValoresRepository::class)]
#[ORM\Table(
    name: 'insc_parametros_valores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_parametros_valor_chave', columns: ['ds_chave'])]
#[ORM\Index(name: 'FK_PARAMETRO_VALOR', columns: ['cd_parametro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PARAMETRO_VALOR', 'colunas' => ['cd_parametro'], 'tabelaAlvo' => 'insc_parametros', 'colunasAlvo' => ['cd_parametro'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class InscParametrosValores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro_valor', type: 'integer')]
    private ?int $cdParametroValor = null;

    #[ORM\ManyToOne(targetEntity: InscParametros::class)]
    #[ORM\JoinColumn(name: 'cd_parametro', referencedColumnName: 'cd_parametro', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InscParametros $cdParametro = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsChave = '';

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'me_insrucao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meInsrucao = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?InscParametros $cdParametro = null,
        string $dsChave = '',
        ?string $dsValor = null,
        ?string $meInsrucao = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdParametro = $cdParametro;
        $this->dsChave = $dsChave;
        $this->dsValor = $dsValor;
        $this->meInsrucao = $meInsrucao;
        $this->dtInclusao = $dtInclusao;
        $this->dtBase = $dtBase;
    }

    public function getCdParametroValor(): ?int
    {
        return $this->cdParametroValor;
    }

    public function getCdParametro(): ?InscParametros
    {
        return $this->cdParametro;
    }

    public function setCdParametro(?InscParametros $cdParametro): self
    {
        $this->cdParametro = $cdParametro;
        return $this;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }

    public function getMeInsrucao(): ?string
    {
        return $this->meInsrucao;
    }

    public function setMeInsrucao(?string $meInsrucao): self
    {
        $this->meInsrucao = $meInsrucao;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
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
