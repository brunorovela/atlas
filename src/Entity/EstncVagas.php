<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncVagasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncVagasRepository::class)]
#[ORM\Table(
    name: 'estnc_vagas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_EMPRESA', columns: ['cd_empresa'])]
#[ORM\Index(name: 'IX_CD_SETOR', columns: ['cd_setor'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_PESSOA_AUTORIZACAO', columns: ['cd_pessoa_autorizacao'])]
#[ORM\Index(name: 'IX_CD_SUPERVISOR', columns: ['cd_supervisor'])]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL_CADASTRO', columns: ['cd_responsavel_cadastro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_VAGAS_CD_AREA', 'colunas' => ['cd_area'], 'tabelaAlvo' => 'estnc_areas', 'colunasAlvo' => ['cd_area'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_VAGAS_CD_EMPRESA', 'colunas' => ['cd_empresa'], 'tabelaAlvo' => 'empresas', 'colunasAlvo' => ['cd_empresa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_VAGAS_CD_SETOR', 'colunas' => ['cd_setor'], 'tabelaAlvo' => 'estnc_setores', 'colunasAlvo' => ['cd_setor'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncVagas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_vaga', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdVaga = null;

    #[ORM\Column(name: 'cd_empresa', type: 'integer')]
    private ?int $cdEmpresa = null;

    #[ORM\ManyToOne(targetEntity: EstncAreas::class)]
    #[ORM\JoinColumn(name: 'cd_area', referencedColumnName: 'cd_area', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncAreas $cdArea = null;

    #[ORM\ManyToOne(targetEntity: EstncSetores::class)]
    #[ORM\JoinColumn(name: 'cd_setor', referencedColumnName: 'cd_setor', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncSetores $cdSetor = null;

    #[ORM\Column(name: 'ds_titulo', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_atividades', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsAtividades = null;

    #[ORM\Column(name: 'ds_horario_atividades', type: 'string', length: 255, nullable: true)]
    private ?string $dsHorarioAtividades = null;

    #[ORM\Column(name: 'ds_previsao_inicio', type: 'string', length: 255, nullable: true)]
    private ?string $dsPrevisaoInicio = null;

    #[ORM\Column(name: 'vl_bolsa', type: 'float', nullable: true)]
    private ?float $vlBolsa = null;

    #[ORM\Column(name: 'qtd_vagas', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $qtdVagas = null;

    #[ORM\Column(name: 'ds_obs', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsObs = null;

    #[ORM\Column(name: 'sn_autorizado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAutorizado = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'cd_pessoa_autorizacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoaAutorizacao = null;

    #[ORM\Column(name: 'nm_supervisor', type: 'string', length: 255, nullable: true)]
    private ?string $nmSupervisor = null;

    #[ORM\Column(name: 'nr_registro', type: 'string', length: 255, nullable: true)]
    private ?string $nrRegistro = null;

    #[ORM\Column(name: 'ds_supervisor_cpf', type: 'string', length: 11, nullable: true)]
    private ?string $dsSupervisorCpf = null;

    #[ORM\Column(name: 'ds_local_estagio', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsLocalEstagio = null;

    #[ORM\Column(name: 'vl_auxilio_transporte', type: 'float', nullable: true)]
    private ?float $vlAuxilioTransporte = null;

    #[ORM\Column(name: 'ds_adicionais', type: 'text', length: 16777215, nullable: true, options: ['comment' => 'Campo com informações adicionais como por exemplo eventuais benefícios'])]
    private ?string $dsAdicionais = null;

    #[ORM\Column(name: 'cd_supervisor', type: 'integer', nullable: true)]
    private ?int $cdSupervisor = null;

    #[ORM\Column(name: 'ds_vl_bolsa', type: 'text', length: 65535, nullable: true)]
    private ?string $dsVlBolsa = null;

    #[ORM\Column(name: 'ds_vl_auxilio_transporte', type: 'text', length: 65535, nullable: true)]
    private ?string $dsVlAuxilioTransporte = null;

    #[ORM\Column(name: 'ds_carga', type: 'string', length: 255, nullable: true)]
    private ?string $dsCarga = null;

    #[ORM\Column(name: 'cd_responsavel_cadastro', type: 'integer')]
    private ?int $cdResponsavelCadastro = null;

    #[ORM\Column(name: 'me_propaganda', type: 'text', length: 16777215, nullable: true)]
    private ?string $mePropaganda = null;

    // Sem construtor: 25 propriedades. Use os setters encadeados.

    public function getCdVaga(): ?int
    {
        return $this->cdVaga;
    }

    public function getCdEmpresa(): ?int
    {
        return $this->cdEmpresa;
    }

    public function setCdEmpresa(?int $cdEmpresa): self
    {
        $this->cdEmpresa = $cdEmpresa;
        return $this;
    }

    public function getCdArea(): ?EstncAreas
    {
        return $this->cdArea;
    }

    public function setCdArea(?EstncAreas $cdArea): self
    {
        $this->cdArea = $cdArea;
        return $this;
    }

    public function getCdSetor(): ?EstncSetores
    {
        return $this->cdSetor;
    }

    public function setCdSetor(?EstncSetores $cdSetor): self
    {
        $this->cdSetor = $cdSetor;
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

    public function getDsAtividades(): ?string
    {
        return $this->dsAtividades;
    }

    public function setDsAtividades(?string $dsAtividades): self
    {
        $this->dsAtividades = $dsAtividades;
        return $this;
    }

    public function getDsHorarioAtividades(): ?string
    {
        return $this->dsHorarioAtividades;
    }

    public function setDsHorarioAtividades(?string $dsHorarioAtividades): self
    {
        $this->dsHorarioAtividades = $dsHorarioAtividades;
        return $this;
    }

    public function getDsPrevisaoInicio(): ?string
    {
        return $this->dsPrevisaoInicio;
    }

    public function setDsPrevisaoInicio(?string $dsPrevisaoInicio): self
    {
        $this->dsPrevisaoInicio = $dsPrevisaoInicio;
        return $this;
    }

    public function getVlBolsa(): ?float
    {
        return $this->vlBolsa;
    }

    public function setVlBolsa(?float $vlBolsa): self
    {
        $this->vlBolsa = $vlBolsa;
        return $this;
    }

    public function getQtdVagas(): ?int
    {
        return $this->qtdVagas;
    }

    public function setQtdVagas(?int $qtdVagas): self
    {
        $this->qtdVagas = $qtdVagas;
        return $this;
    }

    public function getDsObs(): ?string
    {
        return $this->dsObs;
    }

    public function setDsObs(?string $dsObs): self
    {
        $this->dsObs = $dsObs;
        return $this;
    }

    public function getSnAutorizado(): ?int
    {
        return $this->snAutorizado;
    }

    public function setSnAutorizado(?int $snAutorizado): self
    {
        $this->snAutorizado = $snAutorizado;
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

    public function getCdPessoaAutorizacao(): ?int
    {
        return $this->cdPessoaAutorizacao;
    }

    public function setCdPessoaAutorizacao(?int $cdPessoaAutorizacao): self
    {
        $this->cdPessoaAutorizacao = $cdPessoaAutorizacao;
        return $this;
    }

    public function getNmSupervisor(): ?string
    {
        return $this->nmSupervisor;
    }

    public function setNmSupervisor(?string $nmSupervisor): self
    {
        $this->nmSupervisor = $nmSupervisor;
        return $this;
    }

    public function getNrRegistro(): ?string
    {
        return $this->nrRegistro;
    }

    public function setNrRegistro(?string $nrRegistro): self
    {
        $this->nrRegistro = $nrRegistro;
        return $this;
    }

    public function getDsSupervisorCpf(): ?string
    {
        return $this->dsSupervisorCpf;
    }

    public function setDsSupervisorCpf(?string $dsSupervisorCpf): self
    {
        $this->dsSupervisorCpf = $dsSupervisorCpf;
        return $this;
    }

    public function getDsLocalEstagio(): ?string
    {
        return $this->dsLocalEstagio;
    }

    public function setDsLocalEstagio(?string $dsLocalEstagio): self
    {
        $this->dsLocalEstagio = $dsLocalEstagio;
        return $this;
    }

    public function getVlAuxilioTransporte(): ?float
    {
        return $this->vlAuxilioTransporte;
    }

    public function setVlAuxilioTransporte(?float $vlAuxilioTransporte): self
    {
        $this->vlAuxilioTransporte = $vlAuxilioTransporte;
        return $this;
    }

    public function getDsAdicionais(): ?string
    {
        return $this->dsAdicionais;
    }

    public function setDsAdicionais(?string $dsAdicionais): self
    {
        $this->dsAdicionais = $dsAdicionais;
        return $this;
    }

    public function getCdSupervisor(): ?int
    {
        return $this->cdSupervisor;
    }

    public function setCdSupervisor(?int $cdSupervisor): self
    {
        $this->cdSupervisor = $cdSupervisor;
        return $this;
    }

    public function getDsVlBolsa(): ?string
    {
        return $this->dsVlBolsa;
    }

    public function setDsVlBolsa(?string $dsVlBolsa): self
    {
        $this->dsVlBolsa = $dsVlBolsa;
        return $this;
    }

    public function getDsVlAuxilioTransporte(): ?string
    {
        return $this->dsVlAuxilioTransporte;
    }

    public function setDsVlAuxilioTransporte(?string $dsVlAuxilioTransporte): self
    {
        $this->dsVlAuxilioTransporte = $dsVlAuxilioTransporte;
        return $this;
    }

    public function getDsCarga(): ?string
    {
        return $this->dsCarga;
    }

    public function setDsCarga(?string $dsCarga): self
    {
        $this->dsCarga = $dsCarga;
        return $this;
    }

    public function getCdResponsavelCadastro(): ?int
    {
        return $this->cdResponsavelCadastro;
    }

    public function setCdResponsavelCadastro(?int $cdResponsavelCadastro): self
    {
        $this->cdResponsavelCadastro = $cdResponsavelCadastro;
        return $this;
    }

    public function getMePropaganda(): ?string
    {
        return $this->mePropaganda;
    }

    public function setMePropaganda(?string $mePropaganda): self
    {
        $this->mePropaganda = $mePropaganda;
        return $this;
    }
}
