<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\CursosTurmasExtrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosTurmasExtrasRepository::class)]
#[ORM\Table(
    name: 'cursos_turmas_extras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'unique_index', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_CD_OPCAO', columns: ['cd_opcao'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class CursosTurmasExtras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_campo', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdCampo = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 60, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_campo_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoDescricao = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'nr_ordem', type: 'smallint', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_curso', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCurso = null;

    #[ORM\Column(name: 'cd_opcao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $cdOpcao = null;

    #[ORM\Column(name: 'nr_ordem_externa', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $nrOrdemExterna = null;

    #[ORM\Column(name: 'sn_apenas_cadastro', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snApenasCadastro = 0;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    public function __construct(
        ?string $dsCampo = null,
        ?string $dsCampoDescricao = null,
        ?string $dsTipo = null,
        ?int $nrOrdem = null,
        ?int $snCurso = null,
        ?int $cdOpcao = null,
        ?int $nrOrdemExterna = null,
        ?int $snApenasCadastro = 0,
        ?string $dsChave = null
    ) {
        $this->dsCampo = $dsCampo;
        $this->dsCampoDescricao = $dsCampoDescricao;
        $this->dsTipo = $dsTipo;
        $this->nrOrdem = $nrOrdem;
        $this->snCurso = $snCurso;
        $this->cdOpcao = $cdOpcao;
        $this->nrOrdemExterna = $nrOrdemExterna;
        $this->snApenasCadastro = $snApenasCadastro;
        $this->dsChave = $dsChave;
    }

    public function getCdCampo(): ?int
    {
        return $this->cdCampo;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsCampoDescricao(): ?string
    {
        return $this->dsCampoDescricao;
    }

    public function setDsCampoDescricao(?string $dsCampoDescricao): self
    {
        $this->dsCampoDescricao = $dsCampoDescricao;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getSnCurso(): ?int
    {
        return $this->snCurso;
    }

    public function setSnCurso(?int $snCurso): self
    {
        $this->snCurso = $snCurso;
        return $this;
    }

    public function getCdOpcao(): ?int
    {
        return $this->cdOpcao;
    }

    public function setCdOpcao(?int $cdOpcao): self
    {
        $this->cdOpcao = $cdOpcao;
        return $this;
    }

    public function getNrOrdemExterna(): ?int
    {
        return $this->nrOrdemExterna;
    }

    public function setNrOrdemExterna(?int $nrOrdemExterna): self
    {
        $this->nrOrdemExterna = $nrOrdemExterna;
        return $this;
    }

    public function getSnApenasCadastro(): ?int
    {
        return $this->snApenasCadastro;
    }

    public function setSnApenasCadastro(?int $snApenasCadastro): self
    {
        $this->snApenasCadastro = $snApenasCadastro;
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
