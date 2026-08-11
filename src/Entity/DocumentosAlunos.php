<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DocumentosAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentosAlunosRepository::class)]
#[ORM\Table(
    name: 'documentos_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'PrimaryKey', columns: ['codigoaluno', 'cod_documento'])]
#[ORM\Index(name: 'IX_CODIGOALUNO', columns: ['codigoaluno'])]
#[ORM\Index(name: 'IX_COD_DOCUMENTO', columns: ['cod_documento'])]
class DocumentosAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento_aluno', type: 'integer')]
    private ?int $cdDocumentoAluno = null;

    #[ORM\Column(name: 'codigoaluno', type: 'integer', nullable: true)]
    private ?int $codigoaluno = null;

    #[ORM\Column(name: 'cod_documento', type: 'integer', nullable: true)]
    private ?int $codDocumento = null;

    #[ORM\Column(name: 'apresentou', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $apresentou = null;

    #[ORM\Column(name: 'observacao', type: 'string', length: 255, nullable: true)]
    private ?string $observacao = null;

    #[ORM\Column(name: 'sn_digitalizado', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snDigitalizado = null;

    #[ORM\Column(name: 'dt_entrega', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrega = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_conferencia', type: 'integer', nullable: true)]
    private ?int $cdConferencia = null;

    #[ORM\Column(name: 'dt_conferencia', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtConferencia = null;

    #[ORM\Column(name: 'usuario_conferencia', type: 'integer', nullable: true)]
    private ?int $usuarioConferencia = null;

    #[ORM\Column(name: 'cd_conferencia_final', type: 'integer', nullable: true)]
    private ?int $cdConferenciaFinal = null;

    #[ORM\Column(name: 'dt_conferencia_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtConferenciaFinal = null;

    #[ORM\Column(name: 'usuario_conferencia_final', type: 'integer', nullable: true)]
    private ?int $usuarioConferenciaFinal = null;

    public function __construct(
        ?int $codigoaluno = null,
        ?int $codDocumento = null,
        ?string $apresentou = null,
        ?string $observacao = null,
        ?string $snDigitalizado = null,
        ?\DateTimeInterface $dtEntrega = null,
        ?\DateTimeInterface $dtBase = null,
        ?int $cdConferencia = null,
        ?\DateTimeInterface $dtConferencia = null,
        ?int $usuarioConferencia = null,
        ?int $cdConferenciaFinal = null,
        ?\DateTimeInterface $dtConferenciaFinal = null,
        ?int $usuarioConferenciaFinal = null
    ) {
        $this->codigoaluno = $codigoaluno;
        $this->codDocumento = $codDocumento;
        $this->apresentou = $apresentou;
        $this->observacao = $observacao;
        $this->snDigitalizado = $snDigitalizado;
        $this->dtEntrega = $dtEntrega;
        $this->dtBase = $dtBase;
        $this->cdConferencia = $cdConferencia;
        $this->dtConferencia = $dtConferencia;
        $this->usuarioConferencia = $usuarioConferencia;
        $this->cdConferenciaFinal = $cdConferenciaFinal;
        $this->dtConferenciaFinal = $dtConferenciaFinal;
        $this->usuarioConferenciaFinal = $usuarioConferenciaFinal;
    }

    public function getCdDocumentoAluno(): ?int
    {
        return $this->cdDocumentoAluno;
    }

    public function getCodigoaluno(): ?int
    {
        return $this->codigoaluno;
    }

    public function setCodigoaluno(?int $codigoaluno): self
    {
        $this->codigoaluno = $codigoaluno;
        return $this;
    }

    public function getCodDocumento(): ?int
    {
        return $this->codDocumento;
    }

    public function setCodDocumento(?int $codDocumento): self
    {
        $this->codDocumento = $codDocumento;
        return $this;
    }

    public function getApresentou(): ?string
    {
        return $this->apresentou;
    }

    public function setApresentou(?string $apresentou): self
    {
        $this->apresentou = $apresentou;
        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): self
    {
        $this->observacao = $observacao;
        return $this;
    }

    public function getSnDigitalizado(): ?string
    {
        return $this->snDigitalizado;
    }

    public function setSnDigitalizado(?string $snDigitalizado): self
    {
        $this->snDigitalizado = $snDigitalizado;
        return $this;
    }

    public function getDtEntrega(): ?\DateTimeInterface
    {
        return $this->dtEntrega;
    }

    public function setDtEntrega(?\DateTimeInterface $dtEntrega): self
    {
        $this->dtEntrega = $dtEntrega;
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

    public function getCdConferencia(): ?int
    {
        return $this->cdConferencia;
    }

    public function setCdConferencia(?int $cdConferencia): self
    {
        $this->cdConferencia = $cdConferencia;
        return $this;
    }

    public function getDtConferencia(): ?\DateTimeInterface
    {
        return $this->dtConferencia;
    }

    public function setDtConferencia(?\DateTimeInterface $dtConferencia): self
    {
        $this->dtConferencia = $dtConferencia;
        return $this;
    }

    public function getUsuarioConferencia(): ?int
    {
        return $this->usuarioConferencia;
    }

    public function setUsuarioConferencia(?int $usuarioConferencia): self
    {
        $this->usuarioConferencia = $usuarioConferencia;
        return $this;
    }

    public function getCdConferenciaFinal(): ?int
    {
        return $this->cdConferenciaFinal;
    }

    public function setCdConferenciaFinal(?int $cdConferenciaFinal): self
    {
        $this->cdConferenciaFinal = $cdConferenciaFinal;
        return $this;
    }

    public function getDtConferenciaFinal(): ?\DateTimeInterface
    {
        return $this->dtConferenciaFinal;
    }

    public function setDtConferenciaFinal(?\DateTimeInterface $dtConferenciaFinal): self
    {
        $this->dtConferenciaFinal = $dtConferenciaFinal;
        return $this;
    }

    public function getUsuarioConferenciaFinal(): ?int
    {
        return $this->usuarioConferenciaFinal;
    }

    public function setUsuarioConferenciaFinal(?int $usuarioConferenciaFinal): self
    {
        $this->usuarioConferenciaFinal = $usuarioConferenciaFinal;
        return $this;
    }
}
