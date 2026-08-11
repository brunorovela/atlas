<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncImportacaoTemporariaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncImportacaoTemporariaRepository::class)]
#[ORM\Table(
    name: 'estnc_importacao_temporaria',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_IMPORTACAO', columns: ['cd_importacao'])]
#[ORM\Index(name: 'IX_DS_CPF', columns: ['ds_cpf'])]
#[ORM\Index(name: 'IX_DS_EMAIL', columns: ['ds_email'], options: ['lengths' => [20]])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_IMPORTACAO', 'colunas' => ['cd_importacao'], 'tabelaAlvo' => 'estnc_importacoes', 'colunasAlvo' => ['cd_importacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncImportacaoTemporaria
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_importacao_temporaria', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdImportacaoTemporaria = null;

    #[ORM\ManyToOne(targetEntity: EstncImportacoes::class)]
    #[ORM\JoinColumn(name: 'cd_importacao', referencedColumnName: 'cd_importacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncImportacoes $cdImportacao = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'string', length: 255)]
    private ?string $nrAnosemestre = null;

    #[ORM\Column(name: 'ds_curso', type: 'string', length: 255)]
    private ?string $dsCurso = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre_inicial', type: 'string', length: 255, nullable: true)]
    private ?string $nrAnosemestreInicial = null;

    #[ORM\Column(name: 'nr_anosemestre_final', type: 'string', length: 255, nullable: true)]
    private ?string $nrAnosemestreFinal = null;

    #[ORM\Column(name: 'nr_carga_horaria', type: 'string', length: 255, nullable: true)]
    private ?string $nrCargaHoraria = null;

    #[ORM\Column(name: 'nr_semestre', type: 'string', length: 255)]
    private ?string $nrSemestre = null;

    #[ORM\Column(name: 'ds_turma', type: 'string', length: 255, nullable: true)]
    private ?string $dsTurma = null;

    #[ORM\Column(name: 'nr_hora_aula', type: 'string', length: 255, nullable: true)]
    private ?string $nrHoraAula = null;

    #[ORM\Column(name: 'sn_matriculado', type: 'boolean', options: ['default' => '0'])]
    private bool $snMatriculado = false;

    #[ORM\Column(name: 'ds_cpf', type: 'string', length: 11)]
    private ?string $dsCpf = null;

    #[ORM\Column(name: 'nm_pessoa', type: 'string', length: 255)]
    private ?string $nmPessoa = null;

    #[ORM\Column(name: 'ds_matricula', type: 'string', length: 255)]
    private ?string $dsMatricula = null;

    #[ORM\Column(name: 'dt_nascimento', type: 'string', length: 255)]
    private ?string $dtNascimento = null;

    #[ORM\Column(name: 'nm_pai', type: 'string', length: 255, nullable: true)]
    private ?string $nmPai = null;

    #[ORM\Column(name: 'nm_mae', type: 'string', length: 255, nullable: true)]
    private ?string $nmMae = null;

    #[ORM\Column(name: 'ds_cpf_responsavel', type: 'string', length: 11, nullable: true)]
    private ?string $dsCpfResponsavel = null;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 255, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 3)]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'ds_cidade', type: 'string', length: 255)]
    private ?string $dsCidade = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 255, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_logradouro', type: 'string', length: 255, nullable: true)]
    private ?string $dsLogradouro = null;

    #[ORM\Column(name: 'ds_logradouro_numero', type: 'string', length: 255, nullable: true)]
    private ?string $dsLogradouroNumero = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 255, nullable: true)]
    private ?string $dsComplemento = null;

    #[ORM\Column(name: 'ds_telefone', type: 'string', length: 255, nullable: true)]
    private ?string $dsTelefone = null;

    #[ORM\Column(name: 'ds_celular', type: 'string', length: 255, nullable: true)]
    private ?string $dsCelular = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'cd_situacao', type: 'boolean', nullable: true)]
    private ?bool $cdSituacao = null;

    #[ORM\Column(name: 'nr_linha', type: 'bigint', nullable: true)]
    private ?string $nrLinha = null;

    #[ORM\Column(name: 'ds_erro', type: 'string', length: 255, nullable: true)]
    private ?string $dsErro = null;

    // Sem construtor: 31 propriedades. Use os setters encadeados.

    public function getCdImportacaoTemporaria(): ?int
    {
        return $this->cdImportacaoTemporaria;
    }

    public function getCdImportacao(): ?EstncImportacoes
    {
        return $this->cdImportacao;
    }

    public function setCdImportacao(?EstncImportacoes $cdImportacao): self
    {
        $this->cdImportacao = $cdImportacao;
        return $this;
    }

    public function getNrAnosemestre(): ?string
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?string $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDsCurso(): ?string
    {
        return $this->dsCurso;
    }

    public function setDsCurso(?string $dsCurso): self
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getNrAnosemestreInicial(): ?string
    {
        return $this->nrAnosemestreInicial;
    }

    public function setNrAnosemestreInicial(?string $nrAnosemestreInicial): self
    {
        $this->nrAnosemestreInicial = $nrAnosemestreInicial;
        return $this;
    }

    public function getNrAnosemestreFinal(): ?string
    {
        return $this->nrAnosemestreFinal;
    }

    public function setNrAnosemestreFinal(?string $nrAnosemestreFinal): self
    {
        $this->nrAnosemestreFinal = $nrAnosemestreFinal;
        return $this;
    }

    public function getNrCargaHoraria(): ?string
    {
        return $this->nrCargaHoraria;
    }

    public function setNrCargaHoraria(?string $nrCargaHoraria): self
    {
        $this->nrCargaHoraria = $nrCargaHoraria;
        return $this;
    }

    public function getNrSemestre(): ?string
    {
        return $this->nrSemestre;
    }

    public function setNrSemestre(?string $nrSemestre): self
    {
        $this->nrSemestre = $nrSemestre;
        return $this;
    }

    public function getDsTurma(): ?string
    {
        return $this->dsTurma;
    }

    public function setDsTurma(?string $dsTurma): self
    {
        $this->dsTurma = $dsTurma;
        return $this;
    }

    public function getNrHoraAula(): ?string
    {
        return $this->nrHoraAula;
    }

    public function setNrHoraAula(?string $nrHoraAula): self
    {
        $this->nrHoraAula = $nrHoraAula;
        return $this;
    }

    public function isSnMatriculado(): bool
    {
        return $this->snMatriculado;
    }

    public function setSnMatriculado(bool $snMatriculado): self
    {
        $this->snMatriculado = $snMatriculado;
        return $this;
    }

    public function getDsCpf(): ?string
    {
        return $this->dsCpf;
    }

    public function setDsCpf(?string $dsCpf): self
    {
        $this->dsCpf = $dsCpf;
        return $this;
    }

    public function getNmPessoa(): ?string
    {
        return $this->nmPessoa;
    }

    public function setNmPessoa(?string $nmPessoa): self
    {
        $this->nmPessoa = $nmPessoa;
        return $this;
    }

    public function getDsMatricula(): ?string
    {
        return $this->dsMatricula;
    }

    public function setDsMatricula(?string $dsMatricula): self
    {
        $this->dsMatricula = $dsMatricula;
        return $this;
    }

    public function getDtNascimento(): ?string
    {
        return $this->dtNascimento;
    }

    public function setDtNascimento(?string $dtNascimento): self
    {
        $this->dtNascimento = $dtNascimento;
        return $this;
    }

    public function getNmPai(): ?string
    {
        return $this->nmPai;
    }

    public function setNmPai(?string $nmPai): self
    {
        $this->nmPai = $nmPai;
        return $this;
    }

    public function getNmMae(): ?string
    {
        return $this->nmMae;
    }

    public function setNmMae(?string $nmMae): self
    {
        $this->nmMae = $nmMae;
        return $this;
    }

    public function getDsCpfResponsavel(): ?string
    {
        return $this->dsCpfResponsavel;
    }

    public function setDsCpfResponsavel(?string $dsCpfResponsavel): self
    {
        $this->dsCpfResponsavel = $dsCpfResponsavel;
        return $this;
    }

    public function getDsCep(): ?string
    {
        return $this->dsCep;
    }

    public function setDsCep(?string $dsCep): self
    {
        $this->dsCep = $dsCep;
        return $this;
    }

    public function getDsUf(): ?string
    {
        return $this->dsUf;
    }

    public function setDsUf(?string $dsUf): self
    {
        $this->dsUf = $dsUf;
        return $this;
    }

    public function getDsCidade(): ?string
    {
        return $this->dsCidade;
    }

    public function setDsCidade(?string $dsCidade): self
    {
        $this->dsCidade = $dsCidade;
        return $this;
    }

    public function getDsBairro(): ?string
    {
        return $this->dsBairro;
    }

    public function setDsBairro(?string $dsBairro): self
    {
        $this->dsBairro = $dsBairro;
        return $this;
    }

    public function getDsLogradouro(): ?string
    {
        return $this->dsLogradouro;
    }

    public function setDsLogradouro(?string $dsLogradouro): self
    {
        $this->dsLogradouro = $dsLogradouro;
        return $this;
    }

    public function getDsLogradouroNumero(): ?string
    {
        return $this->dsLogradouroNumero;
    }

    public function setDsLogradouroNumero(?string $dsLogradouroNumero): self
    {
        $this->dsLogradouroNumero = $dsLogradouroNumero;
        return $this;
    }

    public function getDsComplemento(): ?string
    {
        return $this->dsComplemento;
    }

    public function setDsComplemento(?string $dsComplemento): self
    {
        $this->dsComplemento = $dsComplemento;
        return $this;
    }

    public function getDsTelefone(): ?string
    {
        return $this->dsTelefone;
    }

    public function setDsTelefone(?string $dsTelefone): self
    {
        $this->dsTelefone = $dsTelefone;
        return $this;
    }

    public function getDsCelular(): ?string
    {
        return $this->dsCelular;
    }

    public function setDsCelular(?string $dsCelular): self
    {
        $this->dsCelular = $dsCelular;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function isCdSituacao(): ?bool
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?bool $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getNrLinha(): ?string
    {
        return $this->nrLinha;
    }

    public function setNrLinha(?string $nrLinha): self
    {
        $this->nrLinha = $nrLinha;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }
}
