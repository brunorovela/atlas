<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolDocumentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolDocumentosRepository::class)]
#[ORM\Table(
    name: 'mol_documentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_PROCESSO', columns: ['cd_processo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class MolDocumentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'cd_processo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProcesso = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nm_documento', type: 'string', length: 250, nullable: true)]
    private ?string $nmDocumento = null;

    #[ORM\Column(name: 'me_conteudo', type: 'text', length: 16777215, nullable: true)]
    private ?string $meConteudo = null;

    #[ORM\Column(name: 'sn_usa_templates_gestao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snUsaTemplatesGestao = false;

    #[ORM\Column(name: 'sn_tipo_template_gestao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snTipoTemplateGestao = false;

    #[ORM\Column(name: 'cd_template_documento', type: 'integer', nullable: true)]
    private ?int $cdTemplateDocumento = null;

    #[ORM\Column(name: 'cd_template_relatorio', type: 'integer', nullable: true)]
    private ?int $cdTemplateRelatorio = null;

    public function __construct(
        ?int $cdTipo = null,
        ?int $cdProcesso = null,
        ?string $dsChave = null,
        ?string $nmDocumento = null,
        ?string $meConteudo = null,
        ?bool $snUsaTemplatesGestao = false,
        ?bool $snTipoTemplateGestao = false,
        ?int $cdTemplateDocumento = null,
        ?int $cdTemplateRelatorio = null
    ) {
        $this->cdTipo = $cdTipo;
        $this->cdProcesso = $cdProcesso;
        $this->dsChave = $dsChave;
        $this->nmDocumento = $nmDocumento;
        $this->meConteudo = $meConteudo;
        $this->snUsaTemplatesGestao = $snUsaTemplatesGestao;
        $this->snTipoTemplateGestao = $snTipoTemplateGestao;
        $this->cdTemplateDocumento = $cdTemplateDocumento;
        $this->cdTemplateRelatorio = $cdTemplateRelatorio;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getCdProcesso(): ?int
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?int $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
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

    public function getNmDocumento(): ?string
    {
        return $this->nmDocumento;
    }

    public function setNmDocumento(?string $nmDocumento): self
    {
        $this->nmDocumento = $nmDocumento;
        return $this;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
        return $this;
    }

    public function isSnUsaTemplatesGestao(): ?bool
    {
        return $this->snUsaTemplatesGestao;
    }

    public function setSnUsaTemplatesGestao(?bool $snUsaTemplatesGestao): self
    {
        $this->snUsaTemplatesGestao = $snUsaTemplatesGestao;
        return $this;
    }

    public function isSnTipoTemplateGestao(): ?bool
    {
        return $this->snTipoTemplateGestao;
    }

    public function setSnTipoTemplateGestao(?bool $snTipoTemplateGestao): self
    {
        $this->snTipoTemplateGestao = $snTipoTemplateGestao;
        return $this;
    }

    public function getCdTemplateDocumento(): ?int
    {
        return $this->cdTemplateDocumento;
    }

    public function setCdTemplateDocumento(?int $cdTemplateDocumento): self
    {
        $this->cdTemplateDocumento = $cdTemplateDocumento;
        return $this;
    }

    public function getCdTemplateRelatorio(): ?int
    {
        return $this->cdTemplateRelatorio;
    }

    public function setCdTemplateRelatorio(?int $cdTemplateRelatorio): self
    {
        $this->cdTemplateRelatorio = $cdTemplateRelatorio;
        return $this;
    }
}
