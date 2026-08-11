<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimModalComunicadoAcademicoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimModalComunicadoAcademicoRepository::class)]
#[ORM\Table(
    name: 'unim_modal_comunicado_academico',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_general_ci']
)]
#[ORM\UniqueConstraint(name: 'ds_chave', columns: ['ds_chave'])]
#[ORM\Index(name: 'idx_unim_modal_comunicado_academico_dt_base', columns: ['dt_base'])]
class UnimModalComunicadoAcademico
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true, options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_html', type: 'text', length: 16777215, nullable: true, options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $dsHtml = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '0'])]
    private bool $snAtivo = false;

    #[ORM\Column(name: 'dt_fim_ativo', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtFimAtivo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsTitulo = null,
        ?string $dsHtml = null,
        bool $snAtivo = false,
        ?\DateTimeInterface $dtFimAtivo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsChave = $dsChave;
        $this->dsTitulo = $dsTitulo;
        $this->dsHtml = $dsHtml;
        $this->snAtivo = $snAtivo;
        $this->dtFimAtivo = $dtFimAtivo;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsHtml(): ?string
    {
        return $this->dsHtml;
    }

    public function setDsHtml(?string $dsHtml): self
    {
        $this->dsHtml = $dsHtml;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getDtFimAtivo(): ?\DateTimeInterface
    {
        return $this->dtFimAtivo;
    }

    public function setDtFimAtivo(?\DateTimeInterface $dtFimAtivo): self
    {
        $this->dtFimAtivo = $dtFimAtivo;
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
