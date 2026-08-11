<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaRepository::class)]
#[ORM\Table(
    name: 'cap_jornada',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_cap_jornada_matriculas_ingresso', columns: ['cd_ingresso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_matriculas_ingresso', 'colunas' => ['cd_ingresso'], 'tabelaAlvo' => 'matriculas_ingresso', 'colunasAlvo' => ['cd_ingresso'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornada
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'enum_chave_requerente', type: 'enum', options: ['default' => 'ALUNO', 'values' => ['ALUNO', 'RESPONSAVEL']])]
    private string $enumChaveRequerente = 'ALUNO';

    #[ORM\ManyToOne(targetEntity: MatriculasIngresso::class)]
    #[ORM\JoinColumn(name: 'cd_ingresso', referencedColumnName: 'cd_ingresso', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?MatriculasIngresso $cdIngresso = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsTitulo = null,
        string $enumChaveRequerente = 'ALUNO',
        ?MatriculasIngresso $cdIngresso = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->enumChaveRequerente = $enumChaveRequerente;
        $this->cdIngresso = $cdIngresso;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getEnumChaveRequerente(): string
    {
        return $this->enumChaveRequerente;
    }

    public function setEnumChaveRequerente(string $enumChaveRequerente): self
    {
        $this->enumChaveRequerente = $enumChaveRequerente;
        return $this;
    }

    public function getCdIngresso(): ?MatriculasIngresso
    {
        return $this->cdIngresso;
    }

    public function setCdIngresso(?MatriculasIngresso $cdIngresso): self
    {
        $this->cdIngresso = $cdIngresso;
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
