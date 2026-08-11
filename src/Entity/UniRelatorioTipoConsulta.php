<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniRelatorioTipoConsultaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniRelatorioTipoConsultaRepository::class)]
#[ORM\Table(
    name: 'uni_relatorio_tipo_consulta',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'FK_uni_relatorio_tipo_consulta_rgo_relatorios_portal_api', columns: ['cd_rgo_relatorios_portal_api'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_uni_relatorio_tipo_consulta_rgo_relatorios_portal_api', 'colunas' => ['cd_rgo_relatorios_portal_api'], 'tabelaAlvo' => 'rgo_relatorios_portal_api', 'colunasAlvo' => ['cd_rgo_relatorios_portal_api'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniRelatorioTipoConsulta
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tipo_consulta', type: 'integer')]
    private ?int $cdTipoConsulta = null;

    #[ORM\ManyToOne(targetEntity: RgoRelatoriosPortalApi::class)]
    #[ORM\JoinColumn(name: 'cd_rgo_relatorios_portal_api', referencedColumnName: 'cd_rgo_relatorios_portal_api', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RgoRelatoriosPortalApi $cdRgoRelatoriosPortalApi = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 255)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'ds_informacao_consulta', type: 'string', length: 255)]
    private ?string $dsInformacaoConsulta = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_campos_chave', type: 'text', length: 65535)]
    private ?string $dsCamposChave = null;

    #[ORM\Column(name: 'ds_chave_permissao', type: 'string', length: 50, nullable: true)]
    private ?string $dsChavePermissao = null;

    public function __construct(
        ?RgoRelatoriosPortalApi $cdRgoRelatoriosPortalApi = null,
        ?string $dsNome = null,
        ?string $dsInformacaoConsulta = null,
        ?string $dsChave = null,
        ?string $dsCamposChave = null,
        ?string $dsChavePermissao = null
    ) {
        $this->cdRgoRelatoriosPortalApi = $cdRgoRelatoriosPortalApi;
        $this->dsNome = $dsNome;
        $this->dsInformacaoConsulta = $dsInformacaoConsulta;
        $this->dsChave = $dsChave;
        $this->dsCamposChave = $dsCamposChave;
        $this->dsChavePermissao = $dsChavePermissao;
    }

    public function getCdTipoConsulta(): ?int
    {
        return $this->cdTipoConsulta;
    }

    public function getCdRgoRelatoriosPortalApi(): ?RgoRelatoriosPortalApi
    {
        return $this->cdRgoRelatoriosPortalApi;
    }

    public function setCdRgoRelatoriosPortalApi(?RgoRelatoriosPortalApi $cdRgoRelatoriosPortalApi): self
    {
        $this->cdRgoRelatoriosPortalApi = $cdRgoRelatoriosPortalApi;
        return $this;
    }

    public function getDsNome(): ?string
    {
        return $this->dsNome;
    }

    public function setDsNome(?string $dsNome): self
    {
        $this->dsNome = $dsNome;
        return $this;
    }

    public function getDsInformacaoConsulta(): ?string
    {
        return $this->dsInformacaoConsulta;
    }

    public function setDsInformacaoConsulta(?string $dsInformacaoConsulta): self
    {
        $this->dsInformacaoConsulta = $dsInformacaoConsulta;
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

    public function getDsCamposChave(): ?string
    {
        return $this->dsCamposChave;
    }

    public function setDsCamposChave(?string $dsCamposChave): self
    {
        $this->dsCamposChave = $dsCamposChave;
        return $this;
    }

    public function getDsChavePermissao(): ?string
    {
        return $this->dsChavePermissao;
    }

    public function setDsChavePermissao(?string $dsChavePermissao): self
    {
        $this->dsChavePermissao = $dsChavePermissao;
        return $this;
    }
}
