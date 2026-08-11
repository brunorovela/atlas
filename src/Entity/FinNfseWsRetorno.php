<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinNfseWsRetornoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseWsRetornoRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_ws_retorno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_LOTE', columns: ['CD_LOTE'])]
#[ORM\Index(name: 'IX_CD_SERVICO', columns: ['CD_SERVICO'])]
class FinNfseWsRetorno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_RETORNO', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdRetorno = null;

    #[ORM\Column(name: 'CD_LOTE', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLote = null;

    #[ORM\Column(name: 'CD_SERVICO', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $cdServico = null;

    #[ORM\Column(name: 'DT_CONSULTA', type: 'datetime')]
    private ?\DateTimeInterface $dtConsulta = null;

    #[ORM\Column(name: 'DS_CODIGO', type: 'string', length: 4, options: ['fixed' => true])]
    private ?string $dsCodigo = null;

    #[ORM\Column(name: 'DS_MENSAGEM', type: 'text', length: 65535)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'DS_CORRECAO', type: 'text', length: 65535)]
    private ?string $dsCorrecao = null;

    public function __construct(
        ?int $cdLote = null,
        ?int $cdServico = null,
        ?\DateTimeInterface $dtConsulta = null,
        ?string $dsCodigo = null,
        ?string $dsMensagem = null,
        ?string $dsCorrecao = null
    ) {
        $this->cdLote = $cdLote;
        $this->cdServico = $cdServico;
        $this->dtConsulta = $dtConsulta;
        $this->dsCodigo = $dsCodigo;
        $this->dsMensagem = $dsMensagem;
        $this->dsCorrecao = $dsCorrecao;
    }

    public function getCdRetorno(): ?string
    {
        return $this->cdRetorno;
    }

    public function getCdLote(): ?int
    {
        return $this->cdLote;
    }

    public function setCdLote(?int $cdLote): self
    {
        $this->cdLote = $cdLote;
        return $this;
    }

    public function getCdServico(): ?int
    {
        return $this->cdServico;
    }

    public function setCdServico(?int $cdServico): self
    {
        $this->cdServico = $cdServico;
        return $this;
    }

    public function getDtConsulta(): ?\DateTimeInterface
    {
        return $this->dtConsulta;
    }

    public function setDtConsulta(?\DateTimeInterface $dtConsulta): self
    {
        $this->dtConsulta = $dtConsulta;
        return $this;
    }

    public function getDsCodigo(): ?string
    {
        return $this->dsCodigo;
    }

    public function setDsCodigo(?string $dsCodigo): self
    {
        $this->dsCodigo = $dsCodigo;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }

    public function getDsCorrecao(): ?string
    {
        return $this->dsCorrecao;
    }

    public function setDsCorrecao(?string $dsCorrecao): self
    {
        $this->dsCorrecao = $dsCorrecao;
        return $this;
    }
}
