<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\MonografiasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonografiasRepository::class)]
#[ORM\Table(
    name: 'monografias',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_area_pessoa', columns: ['cd_area', 'cd_pessoa', 'nr_anosemestre', 'cd_turma'])]
#[ORM\Index(name: 'IX_CD_AREA', columns: ['cd_area'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
class Monografias
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_monografia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMonografia = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Column(name: 'cd_area', type: 'integer')]
    private ?int $cdArea = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'cd_curso', type: 'string', length: 255)]
    private ?string $cdCurso = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer')]
    private ?int $nrAnosemestre = null;

    #[ORM\Column(name: 'cd_orientador', type: 'integer')]
    private ?int $cdOrientador = null;

    #[ORM\Column(name: 'cd_aceitou', type: TinyIntType::NAME, nullable: true)]
    private ?int $cdAceitou = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true)]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'cd_forma_entrega', type: 'integer', nullable: true)]
    private ?int $cdFormaEntrega = null;

    #[ORM\Column(name: 'vl_pago', type: 'float', nullable: true, options: ['unsigned' => true])]
    private ?float $vlPago = null;

    #[ORM\Column(name: 'ds_tema', type: 'text', length: 65535, nullable: true)]
    private ?string $dsTema = null;

    #[ORM\Column(name: 'ds_ideia_inicial', type: 'text', length: 65535, nullable: true)]
    private ?string $dsIdeiaInicial = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'dt_inicio', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'dt_entrega', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtEntrega = null;

    #[ORM\Column(name: 'dt_pag_orientador', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtPagOrientador = null;

    #[ORM\Column(name: 'ds_nota_conceito', type: 'string', length: 255, nullable: true)]
    private ?string $dsNotaConceito = null;

    #[ORM\Column(name: 'sn_indicacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snIndicacao = false;

    #[ORM\Column(name: 'dt_envio_professor', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtEnvioProfessor = null;

    #[ORM\Column(name: 'dt_retorno_professor', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRetornoProfessor = null;

    #[ORM\Column(name: 'dt_certificado', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtCertificado = null;

    #[ORM\Column(name: 'dt_aprovacao', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtAprovacao = null;

    #[ORM\Column(name: 'dt_impressao_monografia', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtImpressaoMonografia = null;

    #[ORM\Column(name: 'ds_taxa', type: 'string', length: 50, nullable: true)]
    private ?string $dsTaxa = null;

    #[ORM\Column(name: 'ds_formato_cd', type: 'string', length: 50, nullable: true)]
    private ?string $dsFormatoCd = null;

    #[ORM\Column(name: 'dt_solicitacao_certificado', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtSolicitacaoCertificado = null;

    #[ORM\Column(name: 'dt_recebimento_certificado', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecebimentoCertificado = null;

    #[ORM\Column(name: 'dt_recebimento_ata', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecebimentoAta = null;

    #[ORM\Column(name: 'dt_recebimento_artigo', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtRecebimentoArtigo = null;

    #[ORM\Column(name: 'cd_unidade_certificadora', type: 'integer', nullable: true)]
    private ?int $cdUnidadeCertificadora = null;

    #[ORM\Column(name: 'DS_TEMA_HTML', type: 'text', length: 65535, nullable: true)]
    private ?string $dsTemaHtml = null;

    #[ORM\Column(name: 'DS_IDEIA_INICIAL_HTML', type: 'text', length: 65535, nullable: true)]
    private ?string $dsIdeiaInicialHtml = null;

    #[ORM\Column(name: 'ds_chave_grupo', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveGrupo = null;

    #[ORM\Column(name: 'sn_entrega_cd', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snEntregaCd = 0;

    #[ORM\Column(name: 'dt_entrega_cd', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntregaCd = null;

    #[ORM\Column(name: 'sn_aprovado_sem_plagio', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAprovadoSemPlagio = false;

    // Sem construtor: 36 propriedades. Use os setters encadeados.

    public function getCdMonografia(): ?int
    {
        return $this->cdMonografia;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdArea(): ?int
    {
        return $this->cdArea;
    }

    public function setCdArea(?int $cdArea): self
    {
        $this->cdArea = $cdArea;
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

    public function getCdCurso(): ?string
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?string $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getCdOrientador(): ?int
    {
        return $this->cdOrientador;
    }

    public function setCdOrientador(?int $cdOrientador): self
    {
        $this->cdOrientador = $cdOrientador;
        return $this;
    }

    public function getCdAceitou(): ?int
    {
        return $this->cdAceitou;
    }

    public function setCdAceitou(?int $cdAceitou): self
    {
        $this->cdAceitou = $cdAceitou;
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

    public function getCdFormaEntrega(): ?int
    {
        return $this->cdFormaEntrega;
    }

    public function setCdFormaEntrega(?int $cdFormaEntrega): self
    {
        $this->cdFormaEntrega = $cdFormaEntrega;
        return $this;
    }

    public function getVlPago(): ?float
    {
        return $this->vlPago;
    }

    public function setVlPago(?float $vlPago): self
    {
        $this->vlPago = $vlPago;
        return $this;
    }

    public function getDsTema(): ?string
    {
        return $this->dsTema;
    }

    public function setDsTema(?string $dsTema): self
    {
        $this->dsTema = $dsTema;
        return $this;
    }

    public function getDsIdeiaInicial(): ?string
    {
        return $this->dsIdeiaInicial;
    }

    public function setDsIdeiaInicial(?string $dsIdeiaInicial): self
    {
        $this->dsIdeiaInicial = $dsIdeiaInicial;
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

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtEntrega(): ?\DateTimeInterface
    {
        return $this->dtEntrega;
    }

    public function setDtEntrega(?\DateTimeInterface $dtEntrega): self
    {
        $this->dtEntrega = $dtEntrega;
        return $this;
    }

    public function getDtPagOrientador(): ?\DateTimeInterface
    {
        return $this->dtPagOrientador;
    }

    public function setDtPagOrientador(?\DateTimeInterface $dtPagOrientador): self
    {
        $this->dtPagOrientador = $dtPagOrientador;
        return $this;
    }

    public function getDsNotaConceito(): ?string
    {
        return $this->dsNotaConceito;
    }

    public function setDsNotaConceito(?string $dsNotaConceito): self
    {
        $this->dsNotaConceito = $dsNotaConceito;
        return $this;
    }

    public function isSnIndicacao(): ?bool
    {
        return $this->snIndicacao;
    }

    public function setSnIndicacao(?bool $snIndicacao): self
    {
        $this->snIndicacao = $snIndicacao;
        return $this;
    }

    public function getDtEnvioProfessor(): ?\DateTimeInterface
    {
        return $this->dtEnvioProfessor;
    }

    public function setDtEnvioProfessor(?\DateTimeInterface $dtEnvioProfessor): self
    {
        $this->dtEnvioProfessor = $dtEnvioProfessor;
        return $this;
    }

    public function getDtRetornoProfessor(): ?\DateTimeInterface
    {
        return $this->dtRetornoProfessor;
    }

    public function setDtRetornoProfessor(?\DateTimeInterface $dtRetornoProfessor): self
    {
        $this->dtRetornoProfessor = $dtRetornoProfessor;
        return $this;
    }

    public function getDtCertificado(): ?\DateTimeInterface
    {
        return $this->dtCertificado;
    }

    public function setDtCertificado(?\DateTimeInterface $dtCertificado): self
    {
        $this->dtCertificado = $dtCertificado;
        return $this;
    }

    public function getDtAprovacao(): ?\DateTimeInterface
    {
        return $this->dtAprovacao;
    }

    public function setDtAprovacao(?\DateTimeInterface $dtAprovacao): self
    {
        $this->dtAprovacao = $dtAprovacao;
        return $this;
    }

    public function getDtImpressaoMonografia(): ?\DateTimeInterface
    {
        return $this->dtImpressaoMonografia;
    }

    public function setDtImpressaoMonografia(?\DateTimeInterface $dtImpressaoMonografia): self
    {
        $this->dtImpressaoMonografia = $dtImpressaoMonografia;
        return $this;
    }

    public function getDsTaxa(): ?string
    {
        return $this->dsTaxa;
    }

    public function setDsTaxa(?string $dsTaxa): self
    {
        $this->dsTaxa = $dsTaxa;
        return $this;
    }

    public function getDsFormatoCd(): ?string
    {
        return $this->dsFormatoCd;
    }

    public function setDsFormatoCd(?string $dsFormatoCd): self
    {
        $this->dsFormatoCd = $dsFormatoCd;
        return $this;
    }

    public function getDtSolicitacaoCertificado(): ?\DateTimeInterface
    {
        return $this->dtSolicitacaoCertificado;
    }

    public function setDtSolicitacaoCertificado(?\DateTimeInterface $dtSolicitacaoCertificado): self
    {
        $this->dtSolicitacaoCertificado = $dtSolicitacaoCertificado;
        return $this;
    }

    public function getDtRecebimentoCertificado(): ?\DateTimeInterface
    {
        return $this->dtRecebimentoCertificado;
    }

    public function setDtRecebimentoCertificado(?\DateTimeInterface $dtRecebimentoCertificado): self
    {
        $this->dtRecebimentoCertificado = $dtRecebimentoCertificado;
        return $this;
    }

    public function getDtRecebimentoAta(): ?\DateTimeInterface
    {
        return $this->dtRecebimentoAta;
    }

    public function setDtRecebimentoAta(?\DateTimeInterface $dtRecebimentoAta): self
    {
        $this->dtRecebimentoAta = $dtRecebimentoAta;
        return $this;
    }

    public function getDtRecebimentoArtigo(): ?\DateTimeInterface
    {
        return $this->dtRecebimentoArtigo;
    }

    public function setDtRecebimentoArtigo(?\DateTimeInterface $dtRecebimentoArtigo): self
    {
        $this->dtRecebimentoArtigo = $dtRecebimentoArtigo;
        return $this;
    }

    public function getCdUnidadeCertificadora(): ?int
    {
        return $this->cdUnidadeCertificadora;
    }

    public function setCdUnidadeCertificadora(?int $cdUnidadeCertificadora): self
    {
        $this->cdUnidadeCertificadora = $cdUnidadeCertificadora;
        return $this;
    }

    public function getDsTemaHtml(): ?string
    {
        return $this->dsTemaHtml;
    }

    public function setDsTemaHtml(?string $dsTemaHtml): self
    {
        $this->dsTemaHtml = $dsTemaHtml;
        return $this;
    }

    public function getDsIdeiaInicialHtml(): ?string
    {
        return $this->dsIdeiaInicialHtml;
    }

    public function setDsIdeiaInicialHtml(?string $dsIdeiaInicialHtml): self
    {
        $this->dsIdeiaInicialHtml = $dsIdeiaInicialHtml;
        return $this;
    }

    public function getDsChaveGrupo(): ?string
    {
        return $this->dsChaveGrupo;
    }

    public function setDsChaveGrupo(?string $dsChaveGrupo): self
    {
        $this->dsChaveGrupo = $dsChaveGrupo;
        return $this;
    }

    public function getSnEntregaCd(): ?int
    {
        return $this->snEntregaCd;
    }

    public function setSnEntregaCd(?int $snEntregaCd): self
    {
        $this->snEntregaCd = $snEntregaCd;
        return $this;
    }

    public function getDtEntregaCd(): ?\DateTimeInterface
    {
        return $this->dtEntregaCd;
    }

    public function setDtEntregaCd(?\DateTimeInterface $dtEntregaCd): self
    {
        $this->dtEntregaCd = $dtEntregaCd;
        return $this;
    }

    public function isSnAprovadoSemPlagio(): ?bool
    {
        return $this->snAprovadoSemPlagio;
    }

    public function setSnAprovadoSemPlagio(?bool $snAprovadoSemPlagio): self
    {
        $this->snAprovadoSemPlagio = $snAprovadoSemPlagio;
        return $this;
    }
}
