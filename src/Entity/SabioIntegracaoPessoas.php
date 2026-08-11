<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SabioIntegracaoPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SabioIntegracaoPessoasRepository::class)]
#[ORM\Table(
    name: 'sabio_integracao_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_CD_USUARIO_PROVISORIO', columns: ['cd_usuario'])]
class SabioIntegracaoPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'nr_integracao', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrIntegracao = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer')]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', options: ['default' => '0'])]
    private int $cdCategoria = 0;

    #[ORM\Column(name: 'pvNome', type: 'string', length: 255, nullable: true)]
    private ?string $pvnome = null;

    #[ORM\Column(name: 'ds_End', type: 'string', length: 255, nullable: true)]
    private ?string $dsEnd = null;

    #[ORM\Column(name: 'ds_Bairro', type: 'string', length: 255, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_Cidade', type: 'string', length: 255, nullable: true)]
    private ?string $dsCidade = null;

    #[ORM\Column(name: 'ds_Uf', type: 'string', length: 2, nullable: true, options: ['fixed' => true])]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'ds_Cep', type: 'string', length: 20, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'ds_Telefone', type: 'string', length: 30, nullable: true)]
    private ?string $dsTelefone = null;

    #[ORM\Column(name: 'ds_Sexo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsSexo = null;

    #[ORM\Column(name: 'ds_Email', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'ds_Senha', type: 'string', length: 255, nullable: true)]
    private ?string $dsSenha = null;

    #[ORM\Column(name: 'cd_Curso', type: 'string', length: 30, nullable: true)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'cd_Turma', type: 'string', length: 30, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_Periodo', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $cdPeriodo = null;

    #[ORM\Column(name: 'ds_DataNasc', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dsDatanasc = null;

    #[ORM\Column(name: 'ds_DataValidade', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dsDatavalidade = null;

    #[ORM\Column(name: 'ds_Celular', type: 'string', length: 30, nullable: true)]
    private ?string $dsCelular = null;

    #[ORM\Column(name: 'ds_LocaldeTrabalho', type: 'string', length: 255, nullable: true)]
    private ?string $dsLocaldetrabalho = null;

    #[ORM\Column(name: 'ds_RuaTrabalho', type: 'string', length: 255, nullable: true)]
    private ?string $dsRuatrabalho = null;

    #[ORM\Column(name: 'ds_CepTrabalho', type: 'string', length: 20, nullable: true)]
    private ?string $dsCeptrabalho = null;

    #[ORM\Column(name: 'ds_BairroTrabalho', type: 'string', length: 255, nullable: true)]
    private ?string $dsBairrotrabalho = null;

    #[ORM\Column(name: 'ds_CidadeTrabalho', type: 'string', length: 255, nullable: true)]
    private ?string $dsCidadetrabalho = null;

    #[ORM\Column(name: 'ds_UfTrabalho', type: 'string', length: 2, nullable: true, options: ['fixed' => true])]
    private ?string $dsUftrabalho = null;

    #[ORM\Column(name: 'ds_FoneTrabalho', type: 'string', length: 30, nullable: true)]
    private ?string $dsFonetrabalho = null;

    #[ORM\Column(name: 'ds_CarteiraIdentidade', type: 'string', length: 30, nullable: true)]
    private ?string $dsCarteiraidentidade = null;

    #[ORM\Column(name: 'ds_OrgaoExpedicao', type: 'string', length: 10, nullable: true)]
    private ?string $dsOrgaoexpedicao = null;

    #[ORM\Column(name: 'im_Foto', type: 'blob', length: 16777215, nullable: true)]
    private ?string $imFoto = null;

    #[ORM\Column(name: 'fl_acao', type: 'string', length: 1, options: ['fixed' => true, 'default' => ''])]
    private string $flAcao = '';

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'sn_trancada', type: 'boolean', options: ['default' => '0'])]
    private bool $snTrancada = false;

    #[ORM\Column(name: 'ds_CPF', type: 'string', length: 11, nullable: true)]
    private ?string $dsCpf = null;

    // Sem construtor: 32 propriedades. Use os setters encadeados.

    public function getNrIntegracao(): ?int
    {
        return $this->nrIntegracao;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getCdCategoria(): int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function getPvnome(): ?string
    {
        return $this->pvnome;
    }

    public function setPvnome(?string $pvnome): self
    {
        $this->pvnome = $pvnome;
        return $this;
    }

    public function getDsEnd(): ?string
    {
        return $this->dsEnd;
    }

    public function setDsEnd(?string $dsEnd): self
    {
        $this->dsEnd = $dsEnd;
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

    public function getDsCidade(): ?string
    {
        return $this->dsCidade;
    }

    public function setDsCidade(?string $dsCidade): self
    {
        $this->dsCidade = $dsCidade;
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

    public function getDsCep(): ?string
    {
        return $this->dsCep;
    }

    public function setDsCep(?string $dsCep): self
    {
        $this->dsCep = $dsCep;
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

    public function getDsSexo(): ?string
    {
        return $this->dsSexo;
    }

    public function setDsSexo(?string $dsSexo): self
    {
        $this->dsSexo = $dsSexo;
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

    public function getDsSenha(): ?string
    {
        return $this->dsSenha;
    }

    public function setDsSenha(?string $dsSenha): self
    {
        $this->dsSenha = $dsSenha;
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

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getCdPeriodo(): ?string
    {
        return $this->cdPeriodo;
    }

    public function setCdPeriodo(?string $cdPeriodo): self
    {
        $this->cdPeriodo = $cdPeriodo;
        return $this;
    }

    public function getDsDatanasc(): ?\DateTimeInterface
    {
        return $this->dsDatanasc;
    }

    public function setDsDatanasc(?\DateTimeInterface $dsDatanasc): self
    {
        $this->dsDatanasc = $dsDatanasc;
        return $this;
    }

    public function getDsDatavalidade(): ?\DateTimeInterface
    {
        return $this->dsDatavalidade;
    }

    public function setDsDatavalidade(?\DateTimeInterface $dsDatavalidade): self
    {
        $this->dsDatavalidade = $dsDatavalidade;
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

    public function getDsLocaldetrabalho(): ?string
    {
        return $this->dsLocaldetrabalho;
    }

    public function setDsLocaldetrabalho(?string $dsLocaldetrabalho): self
    {
        $this->dsLocaldetrabalho = $dsLocaldetrabalho;
        return $this;
    }

    public function getDsRuatrabalho(): ?string
    {
        return $this->dsRuatrabalho;
    }

    public function setDsRuatrabalho(?string $dsRuatrabalho): self
    {
        $this->dsRuatrabalho = $dsRuatrabalho;
        return $this;
    }

    public function getDsCeptrabalho(): ?string
    {
        return $this->dsCeptrabalho;
    }

    public function setDsCeptrabalho(?string $dsCeptrabalho): self
    {
        $this->dsCeptrabalho = $dsCeptrabalho;
        return $this;
    }

    public function getDsBairrotrabalho(): ?string
    {
        return $this->dsBairrotrabalho;
    }

    public function setDsBairrotrabalho(?string $dsBairrotrabalho): self
    {
        $this->dsBairrotrabalho = $dsBairrotrabalho;
        return $this;
    }

    public function getDsCidadetrabalho(): ?string
    {
        return $this->dsCidadetrabalho;
    }

    public function setDsCidadetrabalho(?string $dsCidadetrabalho): self
    {
        $this->dsCidadetrabalho = $dsCidadetrabalho;
        return $this;
    }

    public function getDsUftrabalho(): ?string
    {
        return $this->dsUftrabalho;
    }

    public function setDsUftrabalho(?string $dsUftrabalho): self
    {
        $this->dsUftrabalho = $dsUftrabalho;
        return $this;
    }

    public function getDsFonetrabalho(): ?string
    {
        return $this->dsFonetrabalho;
    }

    public function setDsFonetrabalho(?string $dsFonetrabalho): self
    {
        $this->dsFonetrabalho = $dsFonetrabalho;
        return $this;
    }

    public function getDsCarteiraidentidade(): ?string
    {
        return $this->dsCarteiraidentidade;
    }

    public function setDsCarteiraidentidade(?string $dsCarteiraidentidade): self
    {
        $this->dsCarteiraidentidade = $dsCarteiraidentidade;
        return $this;
    }

    public function getDsOrgaoexpedicao(): ?string
    {
        return $this->dsOrgaoexpedicao;
    }

    public function setDsOrgaoexpedicao(?string $dsOrgaoexpedicao): self
    {
        $this->dsOrgaoexpedicao = $dsOrgaoexpedicao;
        return $this;
    }

    public function getImFoto(): ?string
    {
        return $this->imFoto;
    }

    public function setImFoto(?string $imFoto): self
    {
        $this->imFoto = $imFoto;
        return $this;
    }

    public function getFlAcao(): string
    {
        return $this->flAcao;
    }

    public function setFlAcao(string $flAcao): self
    {
        $this->flAcao = $flAcao;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function isSnTrancada(): bool
    {
        return $this->snTrancada;
    }

    public function setSnTrancada(bool $snTrancada): self
    {
        $this->snTrancada = $snTrancada;
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
}
