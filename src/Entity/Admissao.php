<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AdmissaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissaoRepository::class)]
#[ORM\Table(
    name: 'admissao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_PESSOAS_CD_PESSOA_ADMISSAO_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'FK_PESSOAS_OCUPACOES_CD_FUNCAO_ADMISSAO_CD_FUNCAO', columns: ['CD_FUNCAO'])]
#[ORM\Index(name: 'FK_SITUACOES_CD_SITUACAO_ADMISSAO_CD_SITUACAO', columns: ['CD_SITUACAO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_PESSOAS_CD_PESSOA_ADMISSAO_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_PESSOAS_OCUPACOES_CD_FUNCAO_ADMISSAO_CD_FUNCAO', 'colunas' => ['CD_FUNCAO'], 'tabelaAlvo' => 'pessoas_ocupacoes', 'colunasAlvo' => ['cd_funcao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_SITUACOES_CD_SITUACAO_ADMISSAO_CD_SITUACAO', 'colunas' => ['CD_SITUACAO'], 'tabelaAlvo' => 'situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Admissao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ADMISSAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAdmissao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'CD_FUNCAO', type: 'smallint')]
    private ?int $cdFuncao = null;

    #[ORM\Column(name: 'CD_SITUACAO', type: 'integer', nullable: true)]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'DT_ADMISSAO', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtAdmissao = null;

    #[ORM\Column(name: 'DT_SAIDA', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtSaida = null;

    #[ORM\Column(name: 'VL_HORAS_SEMANAIS', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlHorasSemanais = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 255, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'DS_CODIGO_EXTERNO', type: 'string', length: 16, nullable: true)]
    private ?string $dsCodigoExterno = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?int $cdFuncao = null,
        ?int $cdSituacao = null,
        ?\DateTimeInterface $dtAdmissao = null,
        ?\DateTimeInterface $dtSaida = null,
        ?float $vlHorasSemanais = null,
        ?string $dsObservacao = null,
        ?string $dsCodigoExterno = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdFuncao = $cdFuncao;
        $this->cdSituacao = $cdSituacao;
        $this->dtAdmissao = $dtAdmissao;
        $this->dtSaida = $dtSaida;
        $this->vlHorasSemanais = $vlHorasSemanais;
        $this->dsObservacao = $dsObservacao;
        $this->dsCodigoExterno = $dsCodigoExterno;
    }

    public function getCdAdmissao(): ?int
    {
        return $this->cdAdmissao;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdFuncao(): ?int
    {
        return $this->cdFuncao;
    }

    public function setCdFuncao(?int $cdFuncao): self
    {
        $this->cdFuncao = $cdFuncao;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDtAdmissao(): ?\DateTimeInterface
    {
        return $this->dtAdmissao;
    }

    public function setDtAdmissao(?\DateTimeInterface $dtAdmissao): self
    {
        $this->dtAdmissao = $dtAdmissao;
        return $this;
    }

    public function getDtSaida(): ?\DateTimeInterface
    {
        return $this->dtSaida;
    }

    public function setDtSaida(?\DateTimeInterface $dtSaida): self
    {
        $this->dtSaida = $dtSaida;
        return $this;
    }

    public function getVlHorasSemanais(): ?float
    {
        return $this->vlHorasSemanais;
    }

    public function setVlHorasSemanais(?float $vlHorasSemanais): self
    {
        $this->vlHorasSemanais = $vlHorasSemanais;
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

    public function getDsCodigoExterno(): ?string
    {
        return $this->dsCodigoExterno;
    }

    public function setDsCodigoExterno(?string $dsCodigoExterno): self
    {
        $this->dsCodigoExterno = $dsCodigoExterno;
        return $this;
    }
}
