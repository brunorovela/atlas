<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaProcessoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaProcessoRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_processo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_uni_diploma_processo_instituicoes_ensino', columns: ['cd_instituicao_ensino'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_uni_diploma_processo_tipo', columns: ['cd_diploma_processo_tipo'])]
#[ORM\Index(name: 'FK_uni_diploma_processo_uni_diploma_configuracao_ambiente', columns: ['cd_diploma_configuracao_ambiente'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_uni_diploma_processo_instituicoes_ensino', 'colunas' => ['cd_instituicao_ensino'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_processo_uni_diploma_configuracao_ambiente', 'colunas' => ['cd_diploma_configuracao_ambiente'], 'tabelaAlvo' => 'uni_diploma_configuracao_ambiente', 'colunasAlvo' => ['cd_diploma_configuracao_ambiente'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_processo_uni_diploma_processo_tipo', 'colunas' => ['cd_diploma_processo_tipo'], 'tabelaAlvo' => 'uni_diploma_processo_tipo', 'colunasAlvo' => ['cd_diploma_processo_tipo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaProcesso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diploma_processo', type: 'integer')]
    private ?int $cdDiplomaProcesso = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 50)]
    private ?string $dsNome = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao_ensino', referencedColumnName: 'cd_instituicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicaoEnsino = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaProcessoTipo::class)]
    #[ORM\JoinColumn(name: 'cd_diploma_processo_tipo', referencedColumnName: 'cd_diploma_processo_tipo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaProcessoTipo $cdDiplomaProcessoTipo = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'ds_template_documento', type: 'string', length: 300, nullable: true)]
    private ?string $dsTemplateDocumento = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaConfiguracaoAmbiente::class)]
    #[ORM\JoinColumn(name: 'cd_diploma_configuracao_ambiente', referencedColumnName: 'cd_diploma_configuracao_ambiente', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaConfiguracaoAmbiente $cdDiplomaConfiguracaoAmbiente = null;

    public function __construct(
        ?string $dsNome = null,
        ?InstituicoesEnsino $cdInstituicaoEnsino = null,
        ?UniDiplomaProcessoTipo $cdDiplomaProcessoTipo = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null,
        ?string $dsTemplateDocumento = null,
        ?UniDiplomaConfiguracaoAmbiente $cdDiplomaConfiguracaoAmbiente = null
    ) {
        $this->dsNome = $dsNome;
        $this->cdInstituicaoEnsino = $cdInstituicaoEnsino;
        $this->cdDiplomaProcessoTipo = $cdDiplomaProcessoTipo;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
        $this->dsTemplateDocumento = $dsTemplateDocumento;
        $this->cdDiplomaConfiguracaoAmbiente = $cdDiplomaConfiguracaoAmbiente;
    }

    public function getCdDiplomaProcesso(): ?int
    {
        return $this->cdDiplomaProcesso;
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

    public function getCdInstituicaoEnsino(): ?InstituicoesEnsino
    {
        return $this->cdInstituicaoEnsino;
    }

    public function setCdInstituicaoEnsino(?InstituicoesEnsino $cdInstituicaoEnsino): self
    {
        $this->cdInstituicaoEnsino = $cdInstituicaoEnsino;
        return $this;
    }

    public function getCdDiplomaProcessoTipo(): ?UniDiplomaProcessoTipo
    {
        return $this->cdDiplomaProcessoTipo;
    }

    public function setCdDiplomaProcessoTipo(?UniDiplomaProcessoTipo $cdDiplomaProcessoTipo): self
    {
        $this->cdDiplomaProcessoTipo = $cdDiplomaProcessoTipo;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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

    public function getDsTemplateDocumento(): ?string
    {
        return $this->dsTemplateDocumento;
    }

    public function setDsTemplateDocumento(?string $dsTemplateDocumento): self
    {
        $this->dsTemplateDocumento = $dsTemplateDocumento;
        return $this;
    }

    public function getCdDiplomaConfiguracaoAmbiente(): ?UniDiplomaConfiguracaoAmbiente
    {
        return $this->cdDiplomaConfiguracaoAmbiente;
    }

    public function setCdDiplomaConfiguracaoAmbiente(?UniDiplomaConfiguracaoAmbiente $cdDiplomaConfiguracaoAmbiente): self
    {
        $this->cdDiplomaConfiguracaoAmbiente = $cdDiplomaConfiguracaoAmbiente;
        return $this;
    }
}
