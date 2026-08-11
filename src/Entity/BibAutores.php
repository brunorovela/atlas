<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\BibAutoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibAutoresRepository::class)]
#[ORM\Table(
    name: 'bib_autores',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_tipo_autor', columns: ['cd_tipo_autor'])]
#[ORM\Index(name: 'IX_CD_TIPO_AUTOR', columns: ['cd_tipo_autor'])]
#[ORM\Index(name: 'IX_CD_SUPER_AUTOR', columns: ['cd_super_autor'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'bib_autores_ibfk_1', 'colunas' => ['cd_tipo_autor'], 'tabelaAlvo' => 'bib_autores_tipos', 'colunasAlvo' => ['cd_tipo_autor'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class BibAutores
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_autor', type: 'integer')]
    private ?int $cdAutor = null;

    #[ORM\Column(name: 'cd_super_autor', type: 'integer', nullable: true)]
    private ?int $cdSuperAutor = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_sobrenome', type: 'string', length: 100)]
    private ?string $dsSobrenome = null;

    #[ORM\ManyToOne(targetEntity: BibAutoresTipos::class)]
    #[ORM\JoinColumn(name: 'cd_tipo_autor', referencedColumnName: 'cd_tipo_autor', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BibAutoresTipos $cdTipoAutor = null;

    #[ORM\Column(name: 'nr_evento', type: 'integer', nullable: true)]
    private ?int $nrEvento = null;

    #[ORM\Column(name: 'ds_datas', type: 'string', length: 50, nullable: true)]
    private ?string $dsDatas = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 200, nullable: true)]
    private ?string $dsLocal = null;

    #[ORM\Column(name: 'ds_cutter', type: 'string', length: 10, nullable: true)]
    private ?string $dsCutter = null;

    #[ORM\Column(name: 'dt_nascimento_autor', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtNascimentoAutor = null;

    #[ORM\Column(name: 'dt_falecimento_autor', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtFalecimentoAutor = null;

    public function __construct(
        ?int $cdSuperAutor = null,
        ?string $dsNome = null,
        ?string $dsSobrenome = null,
        ?BibAutoresTipos $cdTipoAutor = null,
        ?int $nrEvento = null,
        ?string $dsDatas = null,
        ?string $dsLocal = null,
        ?string $dsCutter = null,
        ?\DateTimeInterface $dtNascimentoAutor = null,
        ?\DateTimeInterface $dtFalecimentoAutor = null
    ) {
        $this->cdSuperAutor = $cdSuperAutor;
        $this->dsNome = $dsNome;
        $this->dsSobrenome = $dsSobrenome;
        $this->cdTipoAutor = $cdTipoAutor;
        $this->nrEvento = $nrEvento;
        $this->dsDatas = $dsDatas;
        $this->dsLocal = $dsLocal;
        $this->dsCutter = $dsCutter;
        $this->dtNascimentoAutor = $dtNascimentoAutor;
        $this->dtFalecimentoAutor = $dtFalecimentoAutor;
    }

    public function getCdAutor(): ?int
    {
        return $this->cdAutor;
    }

    public function getCdSuperAutor(): ?int
    {
        return $this->cdSuperAutor;
    }

    public function setCdSuperAutor(?int $cdSuperAutor): self
    {
        $this->cdSuperAutor = $cdSuperAutor;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsSobrenome(): ?string
    {
        return $this->dsSobrenome;
    }

    public function setDsSobrenome(?string $dsSobrenome): self
    {
        $this->dsSobrenome = $dsSobrenome;
        return $this;
    }

    public function getCdTipoAutor(): ?BibAutoresTipos
    {
        return $this->cdTipoAutor;
    }

    public function setCdTipoAutor(?BibAutoresTipos $cdTipoAutor): self
    {
        $this->cdTipoAutor = $cdTipoAutor;
        return $this;
    }

    public function getNrEvento(): ?int
    {
        return $this->nrEvento;
    }

    public function setNrEvento(?int $nrEvento): self
    {
        $this->nrEvento = $nrEvento;
        return $this;
    }

    public function getDsDatas(): ?string
    {
        return $this->dsDatas;
    }

    public function setDsDatas(?string $dsDatas): self
    {
        $this->dsDatas = $dsDatas;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }

    public function getDsCutter(): ?string
    {
        return $this->dsCutter;
    }

    public function setDsCutter(?string $dsCutter): self
    {
        $this->dsCutter = $dsCutter;
        return $this;
    }

    public function getDtNascimentoAutor(): ?\DateTimeInterface
    {
        return $this->dtNascimentoAutor;
    }

    public function setDtNascimentoAutor(?\DateTimeInterface $dtNascimentoAutor): self
    {
        $this->dtNascimentoAutor = $dtNascimentoAutor;
        return $this;
    }

    public function getDtFalecimentoAutor(): ?\DateTimeInterface
    {
        return $this->dtFalecimentoAutor;
    }

    public function setDtFalecimentoAutor(?\DateTimeInterface $dtFalecimentoAutor): self
    {
        $this->dtFalecimentoAutor = $dtFalecimentoAutor;
        return $this;
    }
}
