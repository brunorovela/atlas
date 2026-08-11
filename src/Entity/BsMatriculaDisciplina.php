<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BsMatriculaDisciplinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BsMatriculaDisciplinaRepository::class)]
#[ORM\Table(
    name: 'bs_matricula_disciplina',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UDX_BS_PESSOA_CD_PESSOA', columns: ['id_fichaindividual', 'cd_curso_disciplina', 'bs_id_pessoa', 'bs_id_oferta'])]
#[ORM\Index(name: 'IDX_BS_FI', columns: ['id_fichaindividual'])]
#[ORM\Index(name: 'IDX_BS_CD', columns: ['cd_curso_disciplina'])]
#[ORM\Index(name: 'IDX_BS_DT_EXCL', columns: ['dt_excluido'])]
#[ORM\Index(name: 'IDX_BS_FM_FICHA', columns: ['id_fichaindividual'])]
#[ORM\Index(name: 'IDX_BS_FM_CTD', columns: ['cd_curso_disciplina'])]
#[ORM\Index(name: 'IDX_BS_FM_BSPESSOA', columns: ['bs_id_pessoa'])]
#[ORM\Index(name: 'IDX_BS_FM_BSOFERTA', columns: ['bs_id_oferta'])]
class BsMatriculaDisciplina
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'id_fichaindividual', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $idFichaindividual = null;

    #[ORM\Column(name: 'cd_curso_disciplina', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCursoDisciplina = null;

    #[ORM\Column(name: 'bs_id_pessoa', type: 'integer')]
    private ?int $bsIdPessoa = null;

    #[ORM\Column(name: 'bs_id_oferta', type: 'integer')]
    private ?int $bsIdOferta = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $idFichaindividual = null,
        ?int $cdCursoDisciplina = null,
        ?int $bsIdPessoa = null,
        ?int $bsIdOferta = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idFichaindividual = $idFichaindividual;
        $this->cdCursoDisciplina = $cdCursoDisciplina;
        $this->bsIdPessoa = $bsIdPessoa;
        $this->bsIdOferta = $bsIdOferta;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFichaindividual(): ?int
    {
        return $this->idFichaindividual;
    }

    public function setIdFichaindividual(?int $idFichaindividual): self
    {
        $this->idFichaindividual = $idFichaindividual;
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

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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
