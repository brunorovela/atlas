<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CapJornadaEtapaComponenteCampoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteCampoRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_campo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_COMPONENTE_CAMPO_CHAVE', columns: ['cd_jornada_etapa_componente_id', 'enum_campo_chave'])]
#[ORM\UniqueConstraint(name: 'cap_jornada_componente_campo_un', columns: ['cd_jornada_etapa_componente_id', 'enum_campo_chave'])]
#[ORM\Index(name: 'IDX_99B0700BDA281AE9', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_componente_campo_cd_jornada_componente_id', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteCampo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'enum_campo_chave', type: 'enum', nullable: true, options: ['values' => ['pre_cadastro_nm_aluno', 'pre_cadastro_ds_email_aluno', 'pre_cadastro_ds_telefone_celular_aluno', 'pre_cadastro_ds_telefone_residencial_aluno', 'pre_cadastro_ds_telefone_comercial_aluno', 'pre_cadastro_dt_nascimento_aluno', 'pre_cadastro_nm_responsavel', 'pre_cadastro_ds_email_responsavel', 'pre_cadastro_ds_telefone_celular_responsavel', 'pre_cadastro_ds_telefone_residencial_responsavel', 'pre_cadastro_ds_telefone_comercial_responsavel', 'pre_cadastro_forma_conheceu', 'pre_cadastro_ds_cpf_aluno', 'pre_cadastro_ds_cpf_responsavel', 'pre_cadastro_polo', 'fluxo_ds_cnpj', 'fluxo_ds_cpf', 'fluxo_dt_expedicao_rg', 'fluxo_dt_nascimento', 'fluxo_ds_email', 'fluxo_ds_endereco', 'fluxo_ds_estado_civil', 'fluxo_ds_genero', 'fluxo_ds_local_nascimento', 'fluxo_nm_pessoa', 'fluxo_ds_orgao_emissor', 'fluxo_ds_profissao', 'fluxo_ds_raca', 'fluxo_ds_razao_social', 'fluxo_ds_rg', 'fluxo_ds_senha', 'fluxo_ds_telefone_celular', 'fluxo_ds_telefone_comercial', 'fluxo_ds_telefone_residencial', 'fluxo_nm_conjuge', 'fluxo_ds_religiao', 'fluxo_cd_necessidades_especiais', 'fluxo_sn_emancipado']])]
    private ?string $enumCampoChave = null;

    #[ORM\Column(name: 'ds_label', type: 'string', length: 255, nullable: true)]
    private ?string $dsLabel = null;

    #[ORM\Column(name: 'sn_obrigatorio', type: 'boolean', options: ['default' => '0'])]
    private bool $snObrigatorio = false;

    #[ORM\Column(name: 'sn_editavel', type: 'boolean', options: ['default' => '1'])]
    private bool $snEditavel = true;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrOrdem = 1;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?string $enumCampoChave = null,
        ?string $dsLabel = null,
        bool $snObrigatorio = false,
        bool $snEditavel = true,
        int $nrOrdem = 1,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->enumCampoChave = $enumCampoChave;
        $this->dsLabel = $dsLabel;
        $this->snObrigatorio = $snObrigatorio;
        $this->snEditavel = $snEditavel;
        $this->nrOrdem = $nrOrdem;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function getEnumCampoChave(): ?string
    {
        return $this->enumCampoChave;
    }

    public function setEnumCampoChave(?string $enumCampoChave): self
    {
        $this->enumCampoChave = $enumCampoChave;
        return $this;
    }

    public function getDsLabel(): ?string
    {
        return $this->dsLabel;
    }

    public function setDsLabel(?string $dsLabel): self
    {
        $this->dsLabel = $dsLabel;
        return $this;
    }

    public function isSnObrigatorio(): bool
    {
        return $this->snObrigatorio;
    }

    public function setSnObrigatorio(bool $snObrigatorio): self
    {
        $this->snObrigatorio = $snObrigatorio;
        return $this;
    }

    public function isSnEditavel(): bool
    {
        return $this->snEditavel;
    }

    public function setSnEditavel(bool $snEditavel): self
    {
        $this->snEditavel = $snEditavel;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
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
