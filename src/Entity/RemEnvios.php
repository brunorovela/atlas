<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RemEnviosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemEnviosRepository::class)]
#[ORM\Table(
    name: 'rem_envios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_REM_ENVIOS', columns: ['nr_nossonumero', 'nr_sequencia'])]
#[ORM\Index(name: 'FK_REM_ENVIOS_CD_LAYOUT', columns: ['cd_layout'])]
#[ORM\Index(name: 'FK_REM_ENVIOS_CD_RESP', columns: ['cd_resp'])]
#[ORM\Index(name: 'FK_REM_ENVIOS_CD_BOLETO', columns: ['cd_boleto'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_REM_ENVIOS_CD_BOLETO', 'colunas' => ['cd_boleto'], 'tabelaAlvo' => 'fin_boleto', 'colunasAlvo' => ['cd_boleto'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_REM_ENVIOS_CD_LAYOUT', 'colunas' => ['cd_layout'], 'tabelaAlvo' => 'rem_layouts', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_REM_ENVIOS_CD_RESP', 'colunas' => ['cd_resp'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RemEnvios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_envio', type: 'integer')]
    private ?int $cdEnvio = null;

    #[ORM\ManyToOne(targetEntity: RemLayouts::class)]
    #[ORM\JoinColumn(name: 'cd_layout', referencedColumnName: 'cd_layout', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => 'Referencia tabela rem_layouts.cd_layout'])]
    private ?RemLayouts $cdLayout = null;

    #[ORM\Column(name: 'nr_nossonumero', type: 'string', length: 30)]
    private ?string $nrNossonumero = null;

    #[ORM\Column(name: 'nr_sequencia', type: 'smallint')]
    private ?int $nrSequencia = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_resp', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Referencia tabela mensalidades.cd_mensalidade'])]
    private ?Pessoas $cdResp = null;

    #[ORM\Column(name: 'dt_vencimento', type: 'datetime')]
    private ?\DateTimeInterface $dtVencimento = null;

    #[ORM\Column(name: 'vl_nominal', type: 'float', options: ['comment' => 'valorbruto-descontoextra+valorjuros+valorextra (não entra desconto condicional)'])]
    private ?float $vlNominal = null;

    #[ORM\Column(name: 'vl_desconto', type: 'float', nullable: true, options: ['comment' => 'Valor do desconto condicional (vem da GET_DESCONTOS)'])]
    private ?float $vlDesconto = null;

    #[ORM\Column(name: 'cd_ocorrencia', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdOcorrencia = null;

    #[ORM\ManyToOne(targetEntity: FinBoleto::class)]
    #[ORM\JoinColumn(name: 'cd_boleto', referencedColumnName: 'cd_boleto', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Referencia tabela fin_boletos.cd_boleto'])]
    private ?FinBoleto $cdBoleto = null;

    #[ORM\Column(name: 'cd_arquivo', type: 'integer', nullable: true, options: ['comment' => 'Referencia tabela rem_arquivo.cd_arquivo'])]
    private ?int $cdArquivo = null;

    #[ORM\Column(name: 'sn_ignorado', type: TinyIntType::NAME, options: ['default' => '0', 'comment' => 'Indica que o registro foi ignorados, foi substituído por outro envio.'])]
    private int $snIgnorado = 0;

    #[ORM\Column(name: 'dt_ignorado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIgnorado = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime')]
    private ?\DateTimeInterface $dtInclusao = null;

    public function __construct(
        ?RemLayouts $cdLayout = null,
        ?string $nrNossonumero = null,
        ?int $nrSequencia = null,
        ?Pessoas $cdResp = null,
        ?\DateTimeInterface $dtVencimento = null,
        ?float $vlNominal = null,
        ?float $vlDesconto = null,
        ?int $cdOcorrencia = null,
        ?FinBoleto $cdBoleto = null,
        ?int $cdArquivo = null,
        int $snIgnorado = 0,
        ?\DateTimeInterface $dtIgnorado = null,
        ?\DateTimeInterface $dtInclusao = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->nrNossonumero = $nrNossonumero;
        $this->nrSequencia = $nrSequencia;
        $this->cdResp = $cdResp;
        $this->dtVencimento = $dtVencimento;
        $this->vlNominal = $vlNominal;
        $this->vlDesconto = $vlDesconto;
        $this->cdOcorrencia = $cdOcorrencia;
        $this->cdBoleto = $cdBoleto;
        $this->cdArquivo = $cdArquivo;
        $this->snIgnorado = $snIgnorado;
        $this->dtIgnorado = $dtIgnorado;
        $this->dtInclusao = $dtInclusao;
    }

    public function getCdEnvio(): ?int
    {
        return $this->cdEnvio;
    }

    public function getCdLayout(): ?RemLayouts
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?RemLayouts $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getNrNossonumero(): ?string
    {
        return $this->nrNossonumero;
    }

    public function setNrNossonumero(?string $nrNossonumero): self
    {
        $this->nrNossonumero = $nrNossonumero;
        return $this;
    }

    public function getNrSequencia(): ?int
    {
        return $this->nrSequencia;
    }

    public function setNrSequencia(?int $nrSequencia): self
    {
        $this->nrSequencia = $nrSequencia;
        return $this;
    }

    public function getCdResp(): ?Pessoas
    {
        return $this->cdResp;
    }

    public function setCdResp(?Pessoas $cdResp): self
    {
        $this->cdResp = $cdResp;
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

    public function getVlNominal(): ?float
    {
        return $this->vlNominal;
    }

    public function setVlNominal(?float $vlNominal): self
    {
        $this->vlNominal = $vlNominal;
        return $this;
    }

    public function getVlDesconto(): ?float
    {
        return $this->vlDesconto;
    }

    public function setVlDesconto(?float $vlDesconto): self
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    public function getCdOcorrencia(): ?int
    {
        return $this->cdOcorrencia;
    }

    public function setCdOcorrencia(?int $cdOcorrencia): self
    {
        $this->cdOcorrencia = $cdOcorrencia;
        return $this;
    }

    public function getCdBoleto(): ?FinBoleto
    {
        return $this->cdBoleto;
    }

    public function setCdBoleto(?FinBoleto $cdBoleto): self
    {
        $this->cdBoleto = $cdBoleto;
        return $this;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function setCdArquivo(?int $cdArquivo): self
    {
        $this->cdArquivo = $cdArquivo;
        return $this;
    }

    public function getSnIgnorado(): int
    {
        return $this->snIgnorado;
    }

    public function setSnIgnorado(int $snIgnorado): self
    {
        $this->snIgnorado = $snIgnorado;
        return $this;
    }

    public function getDtIgnorado(): ?\DateTimeInterface
    {
        return $this->dtIgnorado;
    }

    public function setDtIgnorado(?\DateTimeInterface $dtIgnorado): self
    {
        $this->dtIgnorado = $dtIgnorado;
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
}
