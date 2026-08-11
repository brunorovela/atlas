<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoMapMaterialprofessorArquivoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoMapMaterialprofessorArquivoRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_map_materialprofessor_arquivo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_app_integracao_dado_map_materialprofessor_arquivo_integracao', columns: ['sn_integrado', 'sn_excluido'])]
#[ORM\Index(name: 'idx_app_integracao_dado_map_materialprofessor_arquivo_pk', columns: ['codanexo', 'codmaterial'])]
class AppIntegracaoDadoMapMaterialprofessorArquivo
{
    #[ORM\Id]
    #[ORM\Column(name: 'codanexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $codanexo = null;

    #[ORM\Id]
    #[ORM\Column(name: 'codmaterial', type: 'integer', options: ['unsigned' => true])]
    private ?int $codmaterial = null;

    #[ORM\Column(name: 'dt_insercao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercao = null;

    #[ORM\Column(name: 'sn_integrado', type: 'boolean', options: ['default' => '0'])]
    private bool $snIntegrado = false;

    #[ORM\Column(name: 'sn_excluido', type: 'boolean', options: ['default' => '0'])]
    private bool $snExcluido = false;

    public function __construct(
        ?int $codanexo = null,
        ?int $codmaterial = null,
        ?\DateTimeInterface $dtInsercao = null,
        bool $snIntegrado = false,
        bool $snExcluido = false
    ) {
        $this->codanexo = $codanexo;
        $this->codmaterial = $codmaterial;
        $this->dtInsercao = $dtInsercao;
        $this->snIntegrado = $snIntegrado;
        $this->snExcluido = $snExcluido;
    }

    public function getCodanexo(): ?int
    {
        return $this->codanexo;
    }

    public function setCodanexo(?int $codanexo): self
    {
        $this->codanexo = $codanexo;
        return $this;
    }

    public function getCodmaterial(): ?int
    {
        return $this->codmaterial;
    }

    public function setCodmaterial(?int $codmaterial): self
    {
        $this->codmaterial = $codmaterial;
        return $this;
    }

    public function getDtInsercao(): ?\DateTimeInterface
    {
        return $this->dtInsercao;
    }

    public function setDtInsercao(?\DateTimeInterface $dtInsercao): self
    {
        $this->dtInsercao = $dtInsercao;
        return $this;
    }

    public function isSnIntegrado(): bool
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(bool $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function isSnExcluido(): bool
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(bool $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
        return $this;
    }
}
