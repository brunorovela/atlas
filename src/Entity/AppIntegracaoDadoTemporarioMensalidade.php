<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTemporarioMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTemporarioMensalidadeRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_temporario_mensalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_integracao_mensalidade', columns: ['cd_mensalidade_origem'])]
class AppIntegracaoDadoTemporarioMensalidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_dado_temporario', type: 'integer')]
    private ?int $cdIntegracaoDadoTemporario = null;

    #[ORM\Column(name: 'cd_mensalidade_origem', type: 'integer')]
    private ?int $cdMensalidadeOrigem = null;

    #[ORM\Column(name: 'cd_pessoa_origem', type: 'integer')]
    private ?int $cdPessoaOrigem = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 255)]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'sn_pago', type: 'boolean')]
    private ?bool $snPago = null;

    #[ORM\Column(name: 'nr_parcela', type: 'smallint')]
    private ?int $nrParcela = null;

    #[ORM\Column(name: 'vl_mensalidade', type: 'decimal', precision: 10, scale: 2)]
    private ?string $vlMensalidade = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'date')]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'ds_codigo_barra', type: 'string', length: 255, nullable: true)]
    private ?string $dsCodigoBarra = null;

    #[ORM\Column(name: 'ds_descricao', type: 'text', nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_link_download', type: 'text', nullable: true)]
    private ?string $dsLinkDownload = null;

    #[ORM\Column(name: 'ds_link_linha_digitavel', type: 'text', nullable: true)]
    private ?string $dsLinkLinhaDigitavel = null;

    #[ORM\Column(name: 'ds_link_instrucao', type: 'text', nullable: true)]
    private ?string $dsLinkInstrucao = null;

    #[ORM\Column(name: 'ds_anosemestre', type: 'smallint')]
    private ?int $dsAnosemestre = null;

    #[ORM\Column(name: 'sn_desconto_condicional', type: 'boolean')]
    private ?bool $snDescontoCondicional = null;

    #[ORM\Column(name: 'ds_nossonumero', type: 'string', length: 30)]
    private ?string $dsNossonumero = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    public function __construct(
        ?int $cdMensalidadeOrigem = null,
        ?int $cdPessoaOrigem = null,
        ?string $dsSituacao = null,
        ?bool $snPago = null,
        ?int $nrParcela = null,
        ?string $vlMensalidade = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?string $dsCodigoBarra = null,
        ?string $dsDescricao = null,
        ?string $dsLinkDownload = null,
        ?string $dsLinkLinhaDigitavel = null,
        ?string $dsLinkInstrucao = null,
        ?int $dsAnosemestre = null,
        ?bool $snDescontoCondicional = null,
        ?string $dsNossonumero = null,
        ?\DateTimeInterface $dtInformacao = null
    ) {
        $this->cdMensalidadeOrigem = $cdMensalidadeOrigem;
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        $this->dsSituacao = $dsSituacao;
        $this->snPago = $snPago;
        $this->nrParcela = $nrParcela;
        $this->vlMensalidade = $vlMensalidade;
        $this->dtVencimento = $dtVencimento;
        $this->dsCodigoBarra = $dsCodigoBarra;
        $this->dsDescricao = $dsDescricao;
        $this->dsLinkDownload = $dsLinkDownload;
        $this->dsLinkLinhaDigitavel = $dsLinkLinhaDigitavel;
        $this->dsLinkInstrucao = $dsLinkInstrucao;
        $this->dsAnosemestre = $dsAnosemestre;
        $this->snDescontoCondicional = $snDescontoCondicional;
        $this->dsNossonumero = $dsNossonumero;
        $this->dtInformacao = $dtInformacao;
    }

    public function getCdIntegracaoDadoTemporario(): ?int
    {
        return $this->cdIntegracaoDadoTemporario;
    }

    public function getCdMensalidadeOrigem(): ?int
    {
        return $this->cdMensalidadeOrigem;
    }

    public function setCdMensalidadeOrigem(?int $cdMensalidadeOrigem): self
    {
        $this->cdMensalidadeOrigem = $cdMensalidadeOrigem;
        return $this;
    }

    public function getCdPessoaOrigem(): ?int
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(?int $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }

    public function isSnPago(): ?bool
    {
        return $this->snPago;
    }

    public function setSnPago(?bool $snPago): self
    {
        $this->snPago = $snPago;
        return $this;
    }

    public function getNrParcela(): ?int
    {
        return $this->nrParcela;
    }

    public function setNrParcela(?int $nrParcela): self
    {
        $this->nrParcela = $nrParcela;
        return $this;
    }

    public function getVlMensalidade(): ?string
    {
        return $this->vlMensalidade;
    }

    public function setVlMensalidade(?string $vlMensalidade): self
    {
        $this->vlMensalidade = $vlMensalidade;
        return $this;
    }

    public function getDtVencimento(): ?\DateTimeInterface
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(?\DateTimeInterface $dtVencimento): self
    {
        $this->dtVencimento = $dtVencimento;
        return $this;
    }

    public function getDsCodigoBarra(): ?string
    {
        return $this->dsCodigoBarra;
    }

    public function setDsCodigoBarra(?string $dsCodigoBarra): self
    {
        $this->dsCodigoBarra = $dsCodigoBarra;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function getDsLinkDownload(): ?string
    {
        return $this->dsLinkDownload;
    }

    public function setDsLinkDownload(?string $dsLinkDownload): self
    {
        $this->dsLinkDownload = $dsLinkDownload;
        return $this;
    }

    public function getDsLinkLinhaDigitavel(): ?string
    {
        return $this->dsLinkLinhaDigitavel;
    }

    public function setDsLinkLinhaDigitavel(?string $dsLinkLinhaDigitavel): self
    {
        $this->dsLinkLinhaDigitavel = $dsLinkLinhaDigitavel;
        return $this;
    }

    public function getDsLinkInstrucao(): ?string
    {
        return $this->dsLinkInstrucao;
    }

    public function setDsLinkInstrucao(?string $dsLinkInstrucao): self
    {
        $this->dsLinkInstrucao = $dsLinkInstrucao;
        return $this;
    }

    public function getDsAnosemestre(): ?int
    {
        return $this->dsAnosemestre;
    }

    public function setDsAnosemestre(?int $dsAnosemestre): self
    {
        $this->dsAnosemestre = $dsAnosemestre;
        return $this;
    }

    public function isSnDescontoCondicional(): ?bool
    {
        return $this->snDescontoCondicional;
    }

    public function setSnDescontoCondicional(?bool $snDescontoCondicional): self
    {
        $this->snDescontoCondicional = $snDescontoCondicional;
        return $this;
    }

    public function getDsNossonumero(): ?string
    {
        return $this->dsNossonumero;
    }

    public function setDsNossonumero(?string $dsNossonumero): self
    {
        $this->dsNossonumero = $dsNossonumero;
        return $this;
    }

    public function getDtInformacao(): ?\DateTimeInterface
    {
        return $this->dtInformacao;
    }

    public function setDtInformacao(?\DateTimeInterface $dtInformacao): self
    {
        $this->dtInformacao = $dtInformacao;
        return $this;
    }
}
