<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncCurriculosValoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncCurriculosValoresRepository::class)]
#[ORM\Table(
    name: 'estnc_curriculos_valores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_CURRICULOS_VAR', columns: ['cd_curriculos_variaveis'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_CURR_VAL_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_CURR_VAL_CD_VAR', 'colunas' => ['cd_curriculos_variaveis'], 'tabelaAlvo' => 'estnc_curriculos_variaveis', 'colunasAlvo' => ['cd_curriculos_variaveis'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncCurriculosValores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_curriculos_valores', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCurriculosValores = null;

    #[ORM\ManyToOne(targetEntity: EstncCurriculosVariaveis::class)]
    #[ORM\JoinColumn(name: 'cd_curriculos_variaveis', referencedColumnName: 'cd_curriculos_variaveis', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCurriculosVariaveis $cdCurriculosVariaveis = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    #[ORM\Column(name: 'ds_valor_blob', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsValorBlob = null;

    public function __construct(
        ?EstncCurriculosVariaveis $cdCurriculosVariaveis = null,
        ?Pessoas $cdPessoa = null,
        ?string $dsValor = null,
        ?string $dsValorBlob = null
    ) {
        $this->cdCurriculosVariaveis = $cdCurriculosVariaveis;
        $this->cdPessoa = $cdPessoa;
        $this->dsValor = $dsValor;
        $this->dsValorBlob = $dsValorBlob;
    }

    public function getCdCurriculosValores(): ?int
    {
        return $this->cdCurriculosValores;
    }

    public function getCdCurriculosVariaveis(): ?EstncCurriculosVariaveis
    {
        return $this->cdCurriculosVariaveis;
    }

    public function setCdCurriculosVariaveis(?EstncCurriculosVariaveis $cdCurriculosVariaveis): self
    {
        $this->cdCurriculosVariaveis = $cdCurriculosVariaveis;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
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

    public function getDsValorBlob(): ?string
    {
        return $this->dsValorBlob;
    }

    public function setDsValorBlob(?string $dsValorBlob): self
    {
        $this->dsValorBlob = $dsValorBlob;
        return $this;
    }
}
