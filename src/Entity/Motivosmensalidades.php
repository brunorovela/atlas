<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MotivosmensalidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotivosmensalidadesRepository::class)]
#[ORM\Table(
    name: 'motivosmensalidades',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_PARCELA', columns: ['parcela'])]
#[ORM\Index(name: 'IX_DATAMOTIVO', columns: ['datamotivo'])]
#[ORM\Index(name: 'IX_TURMA', columns: ['turma'], options: ['lengths' => [20]])]
class Motivosmensalidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'codigoaluno', type: 'integer', options: ['default' => '0'])]
    private int $codigoaluno = 0;

    #[ORM\Column(name: 'parcela', type: 'smallint', options: ['default' => '0'])]
    private int $parcela = 0;

    #[ORM\Column(name: 'datamotivo', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $datamotivo = null;

    #[ORM\Column(name: 'motivo', type: 'text', length: 16777215, nullable: true)]
    private ?string $motivo = null;

    #[ORM\Column(name: 'autorizadopor', type: 'integer', nullable: true)]
    private ?int $autorizadopor = null;

    #[ORM\Column(name: 'turma', type: 'string', length: 50)]
    private ?string $turma = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $codigoaluno = 0,
        int $parcela = 0,
        ?\DateTimeInterface $datamotivo = null,
        ?string $motivo = null,
        ?int $autorizadopor = null,
        ?string $turma = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->codigoaluno = $codigoaluno;
        $this->parcela = $parcela;
        $this->datamotivo = $datamotivo;
        $this->motivo = $motivo;
        $this->autorizadopor = $autorizadopor;
        $this->turma = $turma;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigoaluno(): int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getParcela(): int
    {
        return $this->parcela;
    }

    public function setParcela(int $parcela): self
    {
        $this->parcela = $parcela;
        return $this;
    }

    public function getDatamotivo(): ?\DateTimeInterface
    {
        return $this->datamotivo;
    }

    public function setDatamotivo(?\DateTimeInterface $datamotivo): self
    {
        $this->datamotivo = $datamotivo;
        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): self
    {
        $this->motivo = $motivo;
        return $this;
    }

    public function getAutorizadopor(): ?int
    {
        return $this->autorizadopor;
    }

    public function setAutorizadopor(?int $autorizadopor): self
    {
        $this->autorizadopor = $autorizadopor;
        return $this;
    }

    public function getTurma(): ?string
    {
        return $this->turma;
    }

    public function setTurma(?string $turma): self
    {
        $this->turma = $turma;
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
