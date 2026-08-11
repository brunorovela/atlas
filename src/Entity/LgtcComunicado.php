<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\LgtcComunicadoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LgtcComunicadoRepository::class)]
#[ORM\Table(
    name: 'lgtc_comunicado',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_COMUNICADO_CD_OBJETIVO_COMUNICADO_OBJETIVO_CD_OBJETIVO', columns: ['CD_OBJETIVO'])]
#[ORM\Index(name: 'FK_COMUNICADO_CD_SITUACAO_DESPESA_DESPESA_SITUACAO_CD_SITUACAO', columns: ['CD_SITUACAO_DESPESA'])]
#[ORM\Index(name: 'FK_COMUNICADO_CD_SITUACAO_AULA_SITUACOES_CD_SITUACAO', columns: ['CD_SITUACAO_AULA'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_COMUNICADO_CD_OBJETIVO_COMUNICADO_OBJETIVO_CD_OBJETIVO', 'colunas' => ['CD_OBJETIVO'], 'tabelaAlvo' => 'lgtc_comunicado_objetivo', 'colunasAlvo' => ['CD_OBJETIVO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_COMUNICADO_CD_SITUACAO_AULA_SITUACOES_CD_SITUACAO', 'colunas' => ['CD_SITUACAO_AULA'], 'tabelaAlvo' => 'situacoes', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_COMUNICADO_CD_SITUACAO_DESPESA_DESPESA_SITUACAO_CD_SITUACAO', 'colunas' => ['CD_SITUACAO_DESPESA'], 'tabelaAlvo' => 'lgtc_despesa_situacao', 'colunasAlvo' => ['CD_SITUACAO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class LgtcComunicado
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_COMUNICADO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdComunicado = null;

    #[ORM\ManyToOne(targetEntity: LgtcComunicadoObjetivo::class)]
    #[ORM\JoinColumn(name: 'CD_OBJETIVO', referencedColumnName: 'CD_OBJETIVO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcComunicadoObjetivo $cdObjetivo = null;

    #[ORM\Column(name: 'SN_NOTIFICAR_PROFESSOR', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snNotificarProfessor = 0;

    #[ORM\Column(name: 'SN_NOTIFICAR_COORDENADOR', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snNotificarCoordenador = 0;

    #[ORM\Column(name: 'SN_NOTIFICAR_CONSULTOR', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snNotificarConsultor = 0;

    #[ORM\Column(name: 'DS_EMAIL_OUTROS', type: 'text', length: 65535, nullable: true)]
    private ?string $dsEmailOutros = null;

    #[ORM\ManyToOne(targetEntity: LgtcDespesaSituacao::class)]
    #[ORM\JoinColumn(name: 'CD_SITUACAO_DESPESA', referencedColumnName: 'CD_SITUACAO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?LgtcDespesaSituacao $cdSituacaoDespesa = null;

    #[ORM\Column(name: 'CD_SITUACAO_AULA', type: 'integer', nullable: true)]
    private ?int $cdSituacaoAula = null;

    #[ORM\Column(name: 'ME_COMPLEMENTO_MENSAGEM', type: 'text', length: 65535, nullable: true)]
    private ?string $meComplementoMensagem = null;

    #[ORM\Column(name: 'ME_TEMPLATE', type: 'text', length: 16777215, nullable: true)]
    private ?string $meTemplate = null;

    public function __construct(
        ?LgtcComunicadoObjetivo $cdObjetivo = null,
        int $snNotificarProfessor = 0,
        int $snNotificarCoordenador = 0,
        int $snNotificarConsultor = 0,
        ?string $dsEmailOutros = null,
        ?LgtcDespesaSituacao $cdSituacaoDespesa = null,
        ?int $cdSituacaoAula = null,
        ?string $meComplementoMensagem = null,
        ?string $meTemplate = null
    ) {
        $this->cdObjetivo = $cdObjetivo;
        $this->snNotificarProfessor = $snNotificarProfessor;
        $this->snNotificarCoordenador = $snNotificarCoordenador;
        $this->snNotificarConsultor = $snNotificarConsultor;
        $this->dsEmailOutros = $dsEmailOutros;
        $this->cdSituacaoDespesa = $cdSituacaoDespesa;
        $this->cdSituacaoAula = $cdSituacaoAula;
        $this->meComplementoMensagem = $meComplementoMensagem;
        $this->meTemplate = $meTemplate;
    }

    public function getCdComunicado(): ?int
    {
        return $this->cdComunicado;
    }

    public function getCdObjetivo(): ?LgtcComunicadoObjetivo
    {
        return $this->cdObjetivo;
    }

    public function setCdObjetivo(?LgtcComunicadoObjetivo $cdObjetivo): self
    {
        $this->cdObjetivo = $cdObjetivo;
        return $this;
    }

    public function getSnNotificarProfessor(): int
    {
        return $this->snNotificarProfessor;
    }

    public function setSnNotificarProfessor(int $snNotificarProfessor): self
    {
        $this->snNotificarProfessor = $snNotificarProfessor;
        return $this;
    }

    public function getSnNotificarCoordenador(): int
    {
        return $this->snNotificarCoordenador;
    }

    public function setSnNotificarCoordenador(int $snNotificarCoordenador): self
    {
        $this->snNotificarCoordenador = $snNotificarCoordenador;
        return $this;
    }

    public function getSnNotificarConsultor(): int
    {
        return $this->snNotificarConsultor;
    }

    public function setSnNotificarConsultor(int $snNotificarConsultor): self
    {
        $this->snNotificarConsultor = $snNotificarConsultor;
        return $this;
    }

    public function getDsEmailOutros(): ?string
    {
        return $this->dsEmailOutros;
    }

    public function setDsEmailOutros(?string $dsEmailOutros): self
    {
        $this->dsEmailOutros = $dsEmailOutros;
        return $this;
    }

    public function getCdSituacaoDespesa(): ?LgtcDespesaSituacao
    {
        return $this->cdSituacaoDespesa;
    }

    public function setCdSituacaoDespesa(?LgtcDespesaSituacao $cdSituacaoDespesa): self
    {
        $this->cdSituacaoDespesa = $cdSituacaoDespesa;
        return $this;
    }

    public function getCdSituacaoAula(): ?int
    {
        return $this->cdSituacaoAula;
    }

    public function setCdSituacaoAula(?int $cdSituacaoAula): self
    {
        $this->cdSituacaoAula = $cdSituacaoAula;
        return $this;
    }

    public function getMeComplementoMensagem(): ?string
    {
        return $this->meComplementoMensagem;
    }

    public function setMeComplementoMensagem(?string $meComplementoMensagem): self
    {
        $this->meComplementoMensagem = $meComplementoMensagem;
        return $this;
    }

    public function getMeTemplate(): ?string
    {
        return $this->meTemplate;
    }

    public function setMeTemplate(?string $meTemplate): self
    {
        $this->meTemplate = $meTemplate;
        return $this;
    }
}
