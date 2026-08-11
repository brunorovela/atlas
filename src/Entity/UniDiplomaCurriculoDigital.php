<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniDiplomaCurriculoDigitalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDiplomaCurriculoDigitalRepository::class)]
#[ORM\Table(
    name: 'uni_diploma_curriculo_digital',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ID_GRADE', columns: ['id_grade'])]
#[ORM\Index(name: 'FK_uni_diploma_curriculo_uni_diploma_configuracao_ambiente', columns: ['id_diploma_configuracao_ambiente'])]
#[ORM\Index(name: 'FK_id_grade_grades', columns: ['id_grade'])]
#[ORM\Index(name: 'uni_diploma_curriculo_digital_instituicoes_ensino_FK', columns: ['id_instituicao_ensino'])]
#[ORM\Index(name: 'uni_diploma_curriculo_digital_coligadas_FK', columns: ['id_coligada'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_id_grade_grades', 'colunas' => ['id_grade'], 'tabelaAlvo' => 'grades', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_uni_diploma_curriculo_uni_diploma_configuracao_ambiente', 'colunas' => ['id_diploma_configuracao_ambiente'], 'tabelaAlvo' => 'uni_diploma_configuracao_ambiente', 'colunasAlvo' => ['cd_diploma_configuracao_ambiente'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'uni_diploma_curriculo_digital_coligadas_FK', 'colunas' => ['id_coligada'], 'tabelaAlvo' => 'coligadas', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'uni_diploma_curriculo_digital_instituicoes_ensino_FK', 'colunas' => ['id_instituicao_ensino'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniDiplomaCurriculoDigital
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Grades::class)]
    #[ORM\JoinColumn(name: 'id_grade', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Grades $idGrade = null;

    #[ORM\ManyToOne(targetEntity: UniDiplomaConfiguracaoAmbiente::class)]
    #[ORM\JoinColumn(name: 'id_diploma_configuracao_ambiente', referencedColumnName: 'cd_diploma_configuracao_ambiente', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UniDiplomaConfiguracaoAmbiente $idDiplomaConfiguracaoAmbiente = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'id_instituicao_ensino', referencedColumnName: 'cd_instituicao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $idInstituicaoEnsino = null;

    #[ORM\ManyToOne(targetEntity: Coligadas::class)]
    #[ORM\JoinColumn(name: 'id_coligada', referencedColumnName: 'cd_coligada', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Coligadas $idColigada = null;

    #[ORM\Column(name: 'ds_nome', type: 'string', length: 50)]
    private ?string $dsNome = null;

    #[ORM\Column(name: 'enum_situacao', type: 'enum', nullable: true, options: ['values' => ['NAO_ENVIADO', 'ENVIADO_COM_ERRO', 'ENVIADO_COM_SUCESSO', 'FINALIZADO']])]
    private ?string $enumSituacao = null;

    #[ORM\Column(name: 'id_curriculo_externo', type: 'integer', nullable: true)]
    private ?int $idCurriculoExterno = null;

    #[ORM\Column(name: 'ds_codigo_validacao_externo', type: 'string', length: 50, nullable: true)]
    private ?string $dsCodigoValidacaoExterno = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Grades $idGrade = null,
        ?UniDiplomaConfiguracaoAmbiente $idDiplomaConfiguracaoAmbiente = null,
        ?InstituicoesEnsino $idInstituicaoEnsino = null,
        ?Coligadas $idColigada = null,
        ?string $dsNome = null,
        ?string $enumSituacao = null,
        ?int $idCurriculoExterno = null,
        ?string $dsCodigoValidacaoExterno = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->idGrade = $idGrade;
        $this->idDiplomaConfiguracaoAmbiente = $idDiplomaConfiguracaoAmbiente;
        $this->idInstituicaoEnsino = $idInstituicaoEnsino;
        $this->idColigada = $idColigada;
        $this->dsNome = $dsNome;
        $this->enumSituacao = $enumSituacao;
        $this->idCurriculoExterno = $idCurriculoExterno;
        $this->dsCodigoValidacaoExterno = $dsCodigoValidacaoExterno;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGrade(): ?Grades
    {
        return $this->idGrade;
    }

    public function setIdGrade(?Grades $idGrade): self
    {
        $this->idGrade = $idGrade;
        return $this;
    }

    public function getIdDiplomaConfiguracaoAmbiente(): ?UniDiplomaConfiguracaoAmbiente
    {
        return $this->idDiplomaConfiguracaoAmbiente;
    }

    public function setIdDiplomaConfiguracaoAmbiente(?UniDiplomaConfiguracaoAmbiente $idDiplomaConfiguracaoAmbiente): self
    {
        $this->idDiplomaConfiguracaoAmbiente = $idDiplomaConfiguracaoAmbiente;
        return $this;
    }

    public function getIdInstituicaoEnsino(): ?InstituicoesEnsino
    {
        return $this->idInstituicaoEnsino;
    }

    public function setIdInstituicaoEnsino(?InstituicoesEnsino $idInstituicaoEnsino): self
    {
        $this->idInstituicaoEnsino = $idInstituicaoEnsino;
        return $this;
    }

    public function getIdColigada(): ?Coligadas
    {
        return $this->idColigada;
    }

    public function setIdColigada(?Coligadas $idColigada): self
    {
        $this->idColigada = $idColigada;
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

    public function getEnumSituacao(): ?string
    {
        return $this->enumSituacao;
    }

    public function setEnumSituacao(?string $enumSituacao): self
    {
        $this->enumSituacao = $enumSituacao;
        return $this;
    }

    public function getIdCurriculoExterno(): ?int
    {
        return $this->idCurriculoExterno;
    }

    public function setIdCurriculoExterno(?int $idCurriculoExterno): self
    {
        $this->idCurriculoExterno = $idCurriculoExterno;
        return $this;
    }

    public function getDsCodigoValidacaoExterno(): ?string
    {
        return $this->dsCodigoValidacaoExterno;
    }

    public function setDsCodigoValidacaoExterno(?string $dsCodigoValidacaoExterno): self
    {
        $this->dsCodigoValidacaoExterno = $dsCodigoValidacaoExterno;
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
}
