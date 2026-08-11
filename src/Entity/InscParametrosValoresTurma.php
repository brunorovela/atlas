<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\InscParametrosValoresTurmaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscParametrosValoresTurmaRepository::class)]
#[ORM\Table(
    name: 'insc_parametros_valores_turma',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_insc_parametros_valores_turma_valor', columns: ['cd_parametro_valor'])]
#[ORM\Index(name: 'fk_insc_parametros_valores_turma_curso', columns: ['id_turma'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_insc_parametros_valores_turma_curso', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_insc_parametros_valores_turma_valor', 'colunas' => ['cd_parametro_valor'], 'tabelaAlvo' => 'insc_parametros_valores', 'colunasAlvo' => ['cd_parametro_valor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class InscParametrosValoresTurma
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro_valor_regra', type: 'integer')]
    private ?int $cdParametroValorRegra = null;

    #[ORM\ManyToOne(targetEntity: InscParametrosValores::class)]
    #[ORM\JoinColumn(name: 'cd_parametro_valor', referencedColumnName: 'cd_parametro_valor', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InscParametrosValores $cdParametroValor = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?InscParametrosValores $cdParametroValor = null,
        ?Turmas $idTurma = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdParametroValor = $cdParametroValor;
        $this->idTurma = $idTurma;
        $this->dtInclusao = $dtInclusao;
        $this->dtBase = $dtBase;
    }

    public function getCdParametroValorRegra(): ?int
    {
        return $this->cdParametroValorRegra;
    }

    public function getCdParametroValor(): ?InscParametrosValores
    {
        return $this->cdParametroValor;
    }

    public function setCdParametroValor(?InscParametrosValores $cdParametroValor): self
    {
        $this->cdParametroValor = $cdParametroValor;
        return $this;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
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
