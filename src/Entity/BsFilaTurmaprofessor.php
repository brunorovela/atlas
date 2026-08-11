<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BsFilaTurmaprofessorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsFilaTurmaprofessorRepository::class)]
#[ORM\Table(
    name: 'bs_fila_turmaprofessor',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\UniqueConstraint(name: 'UDX_BS_PESSOA_CD_PESSOA', columns: ['bs_id_pessoa', 'bs_id_oferta'])]
#[ORM\Index(name: 'IDX_BS_TP_TP', columns: ['cd_turmaprofessor'])]
#[ORM\Index(name: 'IDX_BS_TP_CTD', columns: ['cd_curso_disciplina'])]
#[ORM\Index(name: 'IDX_BS_TP_BSPESSOA', columns: ['bs_id_pessoa'])]
#[ORM\Index(name: 'IDX_BS_TP_BSOFERTA', columns: ['bs_id_oferta'])]
class BsFilaTurmaprofessor
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_turmaprofessor', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTurmaprofessor = null;

    #[ORM\Column(name: 'cd_curso_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCursoDisciplina = null;

    #[ORM\Column(name: 'bs_id_pessoa', type: 'integer')]
    private ?int $bsIdPessoa = null;

    #[ORM\Column(name: 'bs_id_oferta', type: 'integer')]
    private ?int $bsIdOferta = null;

    #[ORM\Column(name: 'nr_qtd_tentativas', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $nrQtdTentativas = 0;

    #[ORM\Column(name: 'me_ultimo_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $meUltimoErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdTurmaprofessor = null,
        ?int $cdCursoDisciplina = null,
        ?int $bsIdPessoa = null,
        ?int $bsIdOferta = null,
        ?int $nrQtdTentativas = 0,
        ?string $meUltimoErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        $this->cdCursoDisciplina = $cdCursoDisciplina;
        $this->bsIdPessoa = $bsIdPessoa;
        $this->bsIdOferta = $bsIdOferta;
        $this->nrQtdTentativas = $nrQtdTentativas;
        $this->meUltimoErro = $meUltimoErro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdTurmaprofessor(): ?int
    {
        return $this->cdTurmaprofessor;
    }

    public function setCdTurmaprofessor(?int $cdTurmaprofessor): self
    {
        $this->cdTurmaprofessor = $cdTurmaprofessor;
        return $this;
    }

    public function getCdCursoDisciplina(): ?int
    {
        return $this->cdCursoDisciplina;
    }

    public function setCdCursoDisciplina(?int $cdCursoDisciplina): self
    {
        $this->cdCursoDisciplina = $cdCursoDisciplina;
        return $this;
    }

    public function getBsIdPessoa(): ?int
    {
        return $this->bsIdPessoa;
    }

    public function setBsIdPessoa(?int $bsIdPessoa): self
    {
        $this->bsIdPessoa = $bsIdPessoa;
        return $this;
    }

    public function getBsIdOferta(): ?int
    {
        return $this->bsIdOferta;
    }

    public function setBsIdOferta(?int $bsIdOferta): self
    {
        $this->bsIdOferta = $bsIdOferta;
        return $this;
    }

    public function getNrQtdTentativas(): ?int
    {
        return $this->nrQtdTentativas;
    }

    public function setNrQtdTentativas(?int $nrQtdTentativas): self
    {
        $this->nrQtdTentativas = $nrQtdTentativas;
        return $this;
    }

    public function getMeUltimoErro(): ?string
    {
        return $this->meUltimoErro;
    }

    public function setMeUltimoErro(?string $meUltimoErro): self
    {
        $this->meUltimoErro = $meUltimoErro;
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
