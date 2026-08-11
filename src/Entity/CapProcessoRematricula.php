<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapProcessoRematriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapProcessoRematriculaRepository::class)]
#[ORM\Table(
    name: 'cap_processo_rematricula',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_cap_processo_rematricula_cap_jornada', columns: ['cd_jornada_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_processo_rematricula_cap_jornada', 'colunas' => ['cd_jornada_id'], 'tabelaAlvo' => 'cap_jornada', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapProcessoRematricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornada::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornada $cdJornadaId = null;

    #[ORM\Column(name: 'ds_processo', type: 'string', length: 50, nullable: true)]
    private ?string $dsProcesso = null;

    #[ORM\Column(name: 'dt_abertura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAbertura = null;

    #[ORM\Column(name: 'dt_fechamento', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtFechamento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornada $cdJornadaId = null,
        ?string $dsProcesso = null,
        ?\DateTimeInterface $dtAbertura = null,
        ?\DateTimeInterface $dtFechamento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaId = $cdJornadaId;
        $this->dsProcesso = $dsProcesso;
        $this->dtAbertura = $dtAbertura;
        $this->dtFechamento = $dtFechamento;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaId(): ?CapJornada
    {
        return $this->cdJornadaId;
    }

    public function setCdJornadaId(?CapJornada $cdJornadaId): self
    {
        $this->cdJornadaId = $cdJornadaId;
        return $this;
    }

    public function getDsProcesso(): ?string
    {
        return $this->dsProcesso;
    }

    public function setDsProcesso(?string $dsProcesso): self
    {
        $this->dsProcesso = $dsProcesso;
        return $this;
    }

    public function getDtAbertura(): ?\DateTimeInterface
    {
        return $this->dtAbertura;
    }

    public function setDtAbertura(?\DateTimeInterface $dtAbertura): self
    {
        $this->dtAbertura = $dtAbertura;
        return $this;
    }

    public function getDtFechamento(): ?\DateTimeInterface
    {
        return $this->dtFechamento;
    }

    public function setDtFechamento(?\DateTimeInterface $dtFechamento): self
    {
        $this->dtFechamento = $dtFechamento;
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
