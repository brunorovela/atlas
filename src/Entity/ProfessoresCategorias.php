<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProfessoresCategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessoresCategoriasRepository::class)]
#[ORM\Table(
    name: 'professores_categorias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_professores_categorias_ds_chave', columns: ['ds_chave'])]
#[ORM\UniqueConstraint(name: 'idxCategoriaUnica', columns: ['ds_categoria'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DS_CATEGORIA', columns: ['ds_categoria'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'idx_professores_categorias_ds_categoria', columns: ['ds_categoria'])]
class ProfessoresCategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_categoria', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdCategoria = null;

    #[ORM\Column(name: 'ds_categoria', type: 'string', length: 30, nullable: true, options: ['default' => '0'])]
    private ?string $dsCategoria = '0';

    #[ORM\Column(name: 'ds_descricao_funcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricaoFuncao = null;

    #[ORM\Column(name: 'sn_presencial', type: 'boolean', options: ['default' => '1'])]
    private bool $snPresencial = true;

    #[ORM\Column(name: 'sn_ead', type: 'boolean', options: ['default' => '1'])]
    private bool $snEad = true;

    #[ORM\Column(name: 'ds_ascensao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsAscensao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    public function __construct(
        ?string $dsCategoria = '0',
        ?string $dsDescricaoFuncao = null,
        bool $snPresencial = true,
        bool $snEad = true,
        ?string $dsAscensao = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtBase = null,
        ?\DateTimeInterface $dtExcluido = null
    ) {
        $this->dsCategoria = $dsCategoria;
        $this->dsDescricaoFuncao = $dsDescricaoFuncao;
        $this->snPresencial = $snPresencial;
        $this->snEad = $snEad;
        $this->dsAscensao = $dsAscensao;
        $this->dsChave = $dsChave;
        $this->dtBase = $dtBase;
        $this->dtExcluido = $dtExcluido;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    public function setDsCategoria(?string $dsCategoria): self
    {
        $this->dsCategoria = $dsCategoria;
        return $this;
    }

    public function getDsDescricaoFuncao(): ?string
    {
        return $this->dsDescricaoFuncao;
    }

    public function setDsDescricaoFuncao(?string $dsDescricaoFuncao): self
    {
        $this->dsDescricaoFuncao = $dsDescricaoFuncao;
        return $this;
    }

    public function isSnPresencial(): bool
    {
        return $this->snPresencial;
    }

    public function setSnPresencial(bool $snPresencial): self
    {
        $this->snPresencial = $snPresencial;
        return $this;
    }

    public function isSnEad(): bool
    {
        return $this->snEad;
    }

    public function setSnEad(bool $snEad): self
    {
        $this->snEad = $snEad;
        return $this;
    }

    public function getDsAscensao(): ?string
    {
        return $this->dsAscensao;
    }

    public function setDsAscensao(?string $dsAscensao): self
    {
        $this->dsAscensao = $dsAscensao;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
        return $this;
    }
}
