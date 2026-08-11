<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinNfeG2kaColigadasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfeG2kaColigadasRepository::class)]
#[ORM\Table(
    name: 'fin_nfe_g2ka_coligadas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_emitente', columns: ['cd_emitente'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO', columns: ['cd_municipio'])]
class FinNfeG2kaColigadas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['default' => '0'])]
    private int $cdColigada = 0;

    #[ORM\Column(name: 'cd_emitente', type: 'integer', nullable: true)]
    private ?int $cdEmitente = null;

    #[ORM\Column(name: 'cd_municipio', type: 'integer', nullable: true)]
    private ?int $cdMunicipio = null;

    #[ORM\Column(name: 'nr_inscricao_municipal', type: 'string', length: 30, nullable: true)]
    private ?string $nrInscricaoMunicipal = null;

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 20, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'nm_coligada', type: 'string', length: 50, nullable: true)]
    private ?string $nmColigada = null;

    #[ORM\Column(name: 'ds_ddd_prestador', type: 'string', length: 5, nullable: true)]
    private ?string $dsDddPrestador = null;

    #[ORM\Column(name: 'ds_fone_prestador', type: 'string', length: 20, nullable: true)]
    private ?string $dsFonePrestador = null;

    #[ORM\Column(name: 'nr_serieprestacao', type: 'string', length: 30, options: ['default' => '1'])]
    private string $nrSerieprestacao = '1';

    #[ORM\Column(name: 'ds_nome_municipio', type: 'string', length: 30, nullable: true)]
    private ?string $dsNomeMunicipio = null;

    #[ORM\Column(name: 'sn_servico_ativo', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snServicoAtivo = false;

    #[ORM\Column(name: 'nr_limite_lote', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $nrLimiteLote = 1;

    #[ORM\Column(name: 'nr_intervalo_envio_segundos', type: 'integer', nullable: true, options: ['comment' => 'Intervalo minimo em segundos entre envios individuais de NFSe no envio automatico. NULL/0 = sem intervalo. SUS-1274'])]
    private ?int $nrIntervaloEnvioSegundos = null;

    #[ORM\Column(name: 'ds_emails_retorno', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmailsRetorno = null;

    #[ORM\Column(name: 'dt_ultimo_retorno', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtUltimoRetorno = null;

    #[ORM\Column(name: 'nfse_site_prefeitura', type: 'string', length: 255, nullable: true)]
    private ?string $nfseSitePrefeitura = null;

    #[ORM\Column(name: 'nfse_consulta_direta', type: 'string', length: 255, nullable: true)]
    private ?string $nfseConsultaDireta = null;

    #[ORM\Column(name: 'cd_centro_custo', type: 'integer', nullable: true)]
    private ?int $cdCentroCusto = null;

    #[ORM\Column(name: 'cd_caixa', type: 'integer', nullable: true)]
    private ?int $cdCaixa = null;

    #[ORM\Column(name: 'sn_atualiza_competencia', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snAtualizaCompetencia = false;

    #[ORM\Column(name: 'me_info_consulta', type: 'text', length: 16777215, nullable: true)]
    private ?string $meInfoConsulta = null;

    #[ORM\Column(name: 'dt_validade_certificado', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtValidadeCertificado = null;

    #[ORM\Column(name: 'cd_fin_situacao_padrao', type: 'integer', nullable: true, options: ['default' => '-1'])]
    private ?int $cdFinSituacaoPadrao = -1;

    #[ORM\Column(name: 'ds_observacoes', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacoes = null;

    #[ORM\Column(name: 'ds_horarios_envio', type: 'string', length: 255, nullable: true)]
    private ?string $dsHorariosEnvio = null;

    #[ORM\Column(name: 'cd_integracao', type: 'string', length: 255, nullable: true)]
    private ?string $cdIntegracao = null;

    #[ORM\Column(name: 'sn_tipo_nota', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snTipoNota = 1;

    #[ORM\Column(name: 'cd_coligada_usuario', type: 'integer', nullable: true, options: ['comment' => 'Campo criado para vincular essa coligada de nfe a uma coligada do sistema. Inicialmente usado para permissões de usuários'])]
    private ?int $cdColigadaUsuario = null;

    // Sem construtor: 28 propriedades. Use os setters encadeados.

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdEmitente(): ?int
    {
        return $this->cdEmitente;
    }

    public function setCdEmitente(?int $cdEmitente): self
    {
        $this->cdEmitente = $cdEmitente;
        return $this;
    }

    public function getCdMunicipio(): ?int
    {
        return $this->cdMunicipio;
    }

    public function setCdMunicipio(?int $cdMunicipio): self
    {
        $this->cdMunicipio = $cdMunicipio;
        return $this;
    }

    public function getNrInscricaoMunicipal(): ?string
    {
        return $this->nrInscricaoMunicipal;
    }

    public function setNrInscricaoMunicipal(?string $nrInscricaoMunicipal): self
    {
        $this->nrInscricaoMunicipal = $nrInscricaoMunicipal;
        return $this;
    }

    public function getDsCnpj(): ?string
    {
        return $this->dsCnpj;
    }

    public function setDsCnpj(?string $dsCnpj): self
    {
        $this->dsCnpj = $dsCnpj;
        return $this;
    }

    public function getNmColigada(): ?string
    {
        return $this->nmColigada;
    }

    public function setNmColigada(?string $nmColigada): self
    {
        $this->nmColigada = $nmColigada;
        return $this;
    }

    public function getDsDddPrestador(): ?string
    {
        return $this->dsDddPrestador;
    }

    public function setDsDddPrestador(?string $dsDddPrestador): self
    {
        $this->dsDddPrestador = $dsDddPrestador;
        return $this;
    }

    public function getDsFonePrestador(): ?string
    {
        return $this->dsFonePrestador;
    }

    public function setDsFonePrestador(?string $dsFonePrestador): self
    {
        $this->dsFonePrestador = $dsFonePrestador;
        return $this;
    }

    public function getNrSerieprestacao(): string
    {
        return $this->nrSerieprestacao;
    }

    public function setNrSerieprestacao(string $nrSerieprestacao): self
    {
        $this->nrSerieprestacao = $nrSerieprestacao;
        return $this;
    }

    public function getDsNomeMunicipio(): ?string
    {
        return $this->dsNomeMunicipio;
    }

    public function setDsNomeMunicipio(?string $dsNomeMunicipio): self
    {
        $this->dsNomeMunicipio = $dsNomeMunicipio;
        return $this;
    }

    public function isSnServicoAtivo(): ?bool
    {
        return $this->snServicoAtivo;
    }

    public function setSnServicoAtivo(?bool $snServicoAtivo): self
    {
        $this->snServicoAtivo = $snServicoAtivo;
        return $this;
    }

    public function getNrLimiteLote(): ?int
    {
        return $this->nrLimiteLote;
    }

    public function setNrLimiteLote(?int $nrLimiteLote): self
    {
        $this->nrLimiteLote = $nrLimiteLote;
        return $this;
    }

    public function getNrIntervaloEnvioSegundos(): ?int
    {
        return $this->nrIntervaloEnvioSegundos;
    }

    public function setNrIntervaloEnvioSegundos(?int $nrIntervaloEnvioSegundos): self
    {
        $this->nrIntervaloEnvioSegundos = $nrIntervaloEnvioSegundos;
        return $this;
    }

    public function getDsEmailsRetorno(): ?string
    {
        return $this->dsEmailsRetorno;
    }

    public function setDsEmailsRetorno(?string $dsEmailsRetorno): self
    {
        $this->dsEmailsRetorno = $dsEmailsRetorno;
        return $this;
    }

    public function getDtUltimoRetorno(): ?\DateTimeInterface
    {
        return $this->dtUltimoRetorno;
    }

    public function setDtUltimoRetorno(?\DateTimeInterface $dtUltimoRetorno): self
    {
        $this->dtUltimoRetorno = $dtUltimoRetorno;
        return $this;
    }

    public function getNfseSitePrefeitura(): ?string
    {
        return $this->nfseSitePrefeitura;
    }

    public function setNfseSitePrefeitura(?string $nfseSitePrefeitura): self
    {
        $this->nfseSitePrefeitura = $nfseSitePrefeitura;
        return $this;
    }

    public function getNfseConsultaDireta(): ?string
    {
        return $this->nfseConsultaDireta;
    }

    public function setNfseConsultaDireta(?string $nfseConsultaDireta): self
    {
        $this->nfseConsultaDireta = $nfseConsultaDireta;
        return $this;
    }

    public function getCdCentroCusto(): ?int
    {
        return $this->cdCentroCusto;
    }

    public function setCdCentroCusto(?int $cdCentroCusto): self
    {
        $this->cdCentroCusto = $cdCentroCusto;
        return $this;
    }

    public function getCdCaixa(): ?int
    {
        return $this->cdCaixa;
    }

    public function setCdCaixa(?int $cdCaixa): self
    {
        $this->cdCaixa = $cdCaixa;
        return $this;
    }

    public function isSnAtualizaCompetencia(): ?bool
    {
        return $this->snAtualizaCompetencia;
    }

    public function setSnAtualizaCompetencia(?bool $snAtualizaCompetencia): self
    {
        $this->snAtualizaCompetencia = $snAtualizaCompetencia;
        return $this;
    }

    public function getMeInfoConsulta(): ?string
    {
        return $this->meInfoConsulta;
    }

    public function setMeInfoConsulta(?string $meInfoConsulta): self
    {
        $this->meInfoConsulta = $meInfoConsulta;
        return $this;
    }

    public function getDtValidadeCertificado(): ?\DateTimeInterface
    {
        return $this->dtValidadeCertificado;
    }

    public function setDtValidadeCertificado(?\DateTimeInterface $dtValidadeCertificado): self
    {
        $this->dtValidadeCertificado = $dtValidadeCertificado;
        return $this;
    }

    public function getCdFinSituacaoPadrao(): ?int
    {
        return $this->cdFinSituacaoPadrao;
    }

    public function setCdFinSituacaoPadrao(?int $cdFinSituacaoPadrao): self
    {
        $this->cdFinSituacaoPadrao = $cdFinSituacaoPadrao;
        return $this;
    }

    public function getDsObservacoes(): ?string
    {
        return $this->dsObservacoes;
    }

    public function setDsObservacoes(?string $dsObservacoes): self
    {
        $this->dsObservacoes = $dsObservacoes;
        return $this;
    }

    public function getDsHorariosEnvio(): ?string
    {
        return $this->dsHorariosEnvio;
    }

    public function setDsHorariosEnvio(?string $dsHorariosEnvio): self
    {
        $this->dsHorariosEnvio = $dsHorariosEnvio;
        return $this;
    }

    public function getCdIntegracao(): ?string
    {
        return $this->cdIntegracao;
    }

    public function setCdIntegracao(?string $cdIntegracao): self
    {
        $this->cdIntegracao = $cdIntegracao;
        return $this;
    }

    public function getSnTipoNota(): ?int
    {
        return $this->snTipoNota;
    }

    public function setSnTipoNota(?int $snTipoNota): self
    {
        $this->snTipoNota = $snTipoNota;
        return $this;
    }

    public function getCdColigadaUsuario(): ?int
    {
        return $this->cdColigadaUsuario;
    }

    public function setCdColigadaUsuario(?int $cdColigadaUsuario): self
    {
        $this->cdColigadaUsuario = $cdColigadaUsuario;
        return $this;
    }
}
