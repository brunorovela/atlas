<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinConfigPlanoContasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinConfigPlanoContasRepository::class)]
#[ORM\Table(
    name: 'fin_config_plano_contas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'fin_config_plano_contas_unique', columns: ['cd_conta', 'cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[ORM\Index(name: 'IX_CD_CLASS1', columns: ['cd_class1'])]
#[ORM\Index(name: 'IX_CD_CLASS2', columns: ['cd_class2'])]
#[ORM\Index(name: 'IX_CD_CLASS3', columns: ['cd_class3'])]
#[ORM\Index(name: 'IX_CD_CLASS4', columns: ['cd_class4'])]
#[ORM\Index(name: 'IX_CD_CLASS5', columns: ['cd_class5'])]
#[ORM\Index(name: 'IX_CD_CLASS6', columns: ['cd_class6'])]
#[ORM\Index(name: 'IX_CD_CLASS7', columns: ['cd_class7'])]
#[ORM\Index(name: 'IX_CD_CLASS8', columns: ['cd_class8'])]
#[ORM\Index(name: 'IX_CD_CLASS9', columns: ['cd_class9'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
class FinConfigPlanoContas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_conta', type: 'integer')]
    private ?int $idConta = null;

    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdConta = null;

    #[ORM\Column(name: 'cd_coligada_matriz', type: 'smallint', options: ['unsigned' => true])]
    private ?int $cdColigadaMatriz = null;

    #[ORM\Column(name: 'ds_conta', type: 'string', length: 255, nullable: true)]
    private ?string $dsConta = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'cd_classificacao', type: 'string', length: 20, nullable: true)]
    private ?string $cdClassificacao = null;

    #[ORM\Column(name: 'cd_apropriacao', type: 'integer', nullable: true)]
    private ?int $cdApropriacao = null;

    #[ORM\Column(name: 'tp_conta', type: 'smallint', nullable: true)]
    private ?int $tpConta = null;

    #[ORM\Column(name: 'tp_entrada_saida', type: 'smallint', nullable: true, options: ['unsigned' => true])]
    private ?int $tpEntradaSaida = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'cd_conta_contabil', type: 'string', length: 20, nullable: true)]
    private ?string $cdContaContabil = null;

    #[ORM\Column(name: 'cd_grupo_principal', type: 'integer', options: ['default' => '0'])]
    private int $cdGrupoPrincipal = 0;

    #[ORM\Column(name: 'cd_class1', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass1 = 0;

    #[ORM\Column(name: 'cd_class2', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass2 = 0;

    #[ORM\Column(name: 'cd_class3', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass3 = 0;

    #[ORM\Column(name: 'cd_class4', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass4 = 0;

    #[ORM\Column(name: 'cd_class5', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass5 = 0;

    #[ORM\Column(name: 'cd_class6', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass6 = 0;

    #[ORM\Column(name: 'cd_class7', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass7 = 0;

    #[ORM\Column(name: 'cd_class8', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass8 = 0;

    #[ORM\Column(name: 'cd_class9', type: 'smallint', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdClass9 = 0;

    #[ORM\Column(name: 'ds_formula_calculo', type: 'string', length: 200, nullable: true)]
    private ?string $dsFormulaCalculo = null;

    #[ORM\Column(name: 'cd_criterio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCriterio = null;

    #[ORM\Column(name: 'sn_custeio', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snCusteio = 1;

    #[ORM\Column(name: 'cd_grupo_custeio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdGrupoCusteio = null;

    #[ORM\Column(name: 'cd_grupo_contas', type: 'integer', nullable: true)]
    private ?int $cdGrupoContas = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['comment' => 'Código da pessoa para fornecedores'])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP', 'comment' => 'Data e hora padrao da inclusão da conta'])]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'sn_restringir_permissao', type: 'boolean', nullable: true, options: ['default' => '0', 'comment' => 'Restringir uso pela permissao PlanoContasRestrito'])]
    private ?bool $snRestringirPermissao = false;

    // Sem construtor: 28 propriedades. Use os setters encadeados.

    public function getIdConta(): ?int
    {
        return $this->idConta;
    }

    public function getCdConta(): ?int
    {
        return $this->cdConta;
    }

    public function setCdConta(?int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getCdColigadaMatriz(): ?int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsConta(): ?string
    {
        return $this->dsConta;
    }

    public function setDsConta(?string $dsConta): self
    {
        $this->dsConta = $dsConta;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getCdClassificacao(): ?string
    {
        return $this->cdClassificacao;
    }

    public function setCdClassificacao(?string $cdClassificacao): self
    {
        $this->cdClassificacao = $cdClassificacao;
        return $this;
    }

    public function getCdApropriacao(): ?int
    {
        return $this->cdApropriacao;
    }

    public function setCdApropriacao(?int $cdApropriacao): self
    {
        $this->cdApropriacao = $cdApropriacao;
        return $this;
    }

    public function getTpConta(): ?int
    {
        return $this->tpConta;
    }

    public function setTpConta(?int $tpConta): self
    {
        $this->tpConta = $tpConta;
        return $this;
    }

    public function getTpEntradaSaida(): ?int
    {
        return $this->tpEntradaSaida;
    }

    public function setTpEntradaSaida(?int $tpEntradaSaida): self
    {
        $this->tpEntradaSaida = $tpEntradaSaida;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getCdContaContabil(): ?string
    {
        return $this->cdContaContabil;
    }

    public function setCdContaContabil(?string $cdContaContabil): self
    {
        $this->cdContaContabil = $cdContaContabil;
        return $this;
    }

    public function getCdGrupoPrincipal(): int
    {
        return $this->cdGrupoPrincipal;
    }

    public function setCdGrupoPrincipal(int $cdGrupoPrincipal): self
    {
        $this->cdGrupoPrincipal = $cdGrupoPrincipal;
        return $this;
    }

    public function getCdClass1(): ?int
    {
        return $this->cdClass1;
    }

    public function setCdClass1(?int $cdClass1): self
    {
        $this->cdClass1 = $cdClass1;
        return $this;
    }

    public function getCdClass2(): ?int
    {
        return $this->cdClass2;
    }

    public function setCdClass2(?int $cdClass2): self
    {
        $this->cdClass2 = $cdClass2;
        return $this;
    }

    public function getCdClass3(): ?int
    {
        return $this->cdClass3;
    }

    public function setCdClass3(?int $cdClass3): self
    {
        $this->cdClass3 = $cdClass3;
        return $this;
    }

    public function getCdClass4(): ?int
    {
        return $this->cdClass4;
    }

    public function setCdClass4(?int $cdClass4): self
    {
        $this->cdClass4 = $cdClass4;
        return $this;
    }

    public function getCdClass5(): ?int
    {
        return $this->cdClass5;
    }

    public function setCdClass5(?int $cdClass5): self
    {
        $this->cdClass5 = $cdClass5;
        return $this;
    }

    public function getCdClass6(): ?int
    {
        return $this->cdClass6;
    }

    public function setCdClass6(?int $cdClass6): self
    {
        $this->cdClass6 = $cdClass6;
        return $this;
    }

    public function getCdClass7(): ?int
    {
        return $this->cdClass7;
    }

    public function setCdClass7(?int $cdClass7): self
    {
        $this->cdClass7 = $cdClass7;
        return $this;
    }

    public function getCdClass8(): ?int
    {
        return $this->cdClass8;
    }

    public function setCdClass8(?int $cdClass8): self
    {
        $this->cdClass8 = $cdClass8;
        return $this;
    }

    public function getCdClass9(): ?int
    {
        return $this->cdClass9;
    }

    public function setCdClass9(?int $cdClass9): self
    {
        $this->cdClass9 = $cdClass9;
        return $this;
    }

    public function getDsFormulaCalculo(): ?string
    {
        return $this->dsFormulaCalculo;
    }

    public function setDsFormulaCalculo(?string $dsFormulaCalculo): self
    {
        $this->dsFormulaCalculo = $dsFormulaCalculo;
        return $this;
    }

    public function getCdCriterio(): ?int
    {
        return $this->cdCriterio;
    }

    public function setCdCriterio(?int $cdCriterio): self
    {
        $this->cdCriterio = $cdCriterio;
        return $this;
    }

    public function getSnCusteio(): ?int
    {
        return $this->snCusteio;
    }

    public function setSnCusteio(?int $snCusteio): self
    {
        $this->snCusteio = $snCusteio;
        return $this;
    }

    public function getCdGrupoCusteio(): ?int
    {
        return $this->cdGrupoCusteio;
    }

    public function setCdGrupoCusteio(?int $cdGrupoCusteio): self
    {
        $this->cdGrupoCusteio = $cdGrupoCusteio;
        return $this;
    }

    public function getCdGrupoContas(): ?int
    {
        return $this->cdGrupoContas;
    }

    public function setCdGrupoContas(?int $cdGrupoContas): self
    {
        $this->cdGrupoContas = $cdGrupoContas;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
        return $this;
    }

    public function isSnRestringirPermissao(): ?bool
    {
        return $this->snRestringirPermissao;
    }

    public function setSnRestringirPermissao(?bool $snRestringirPermissao): self
    {
        $this->snRestringirPermissao = $snRestringirPermissao;
        return $this;
    }
}
