<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\ReqRegistroItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReqRegistroItensRepository::class)]
#[ORM\Table(
    name: 'req_registro_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_registro_itens_registros', columns: ['cd_req_registros'])]
#[ORM\Index(name: 'fk_registros_itens_cd_tramite', columns: ['cd_tramite'])]
#[ORM\Index(name: 'IX_CD_REQ_REGISTROS', columns: ['cd_req_registros'])]
#[ORM\Index(name: 'IX_CD_TRAMITE', columns: ['cd_tramite'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_registro_itens_registros', 'colunas' => ['cd_req_registros'], 'tabelaAlvo' => 'req_registros', 'colunasAlvo' => ['cd_req_registros'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_registros_itens_cd_tramite', 'colunas' => ['cd_tramite'], 'tabelaAlvo' => 'req_tramite', 'colunasAlvo' => ['cd_tramite'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ReqRegistroItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_item', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdItem = null;

    #[ORM\ManyToOne(targetEntity: ReqRegistros::class)]
    #[ORM\JoinColumn(name: 'cd_req_registros', referencedColumnName: 'cd_req_registros', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqRegistros $cdReqRegistros = null;

    #[ORM\ManyToOne(targetEntity: ReqTramite::class)]
    #[ORM\JoinColumn(name: 'cd_tramite', referencedColumnName: 'cd_tramite', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?ReqTramite $cdTramite = null;

    #[ORM\Column(name: 'dt_item', type: 'datetime')]
    private ?\DateTimeInterface $dtItem = null;

    #[ORM\Column(name: 'sn_relatorio', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snRelatorio = null;

    #[ORM\Column(name: 'cd_tramite_retorno', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTramiteRetorno = null;

    #[ORM\Column(name: 'me_obs', type: 'text', length: 65535)]
    private ?string $meObs = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_lido', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $snLido = 1;

    #[ORM\Column(name: 'cd_resp_tramite', type: 'integer', nullable: true)]
    private ?int $cdRespTramite = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ReqRegistros $cdReqRegistros = null,
        ?ReqTramite $cdTramite = null,
        ?\DateTimeInterface $dtItem = null,
        ?int $snRelatorio = null,
        ?int $cdTramiteRetorno = null,
        ?string $meObs = null,
        ?int $cdPessoa = null,
        ?int $snLido = 1,
        ?int $cdRespTramite = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdReqRegistros = $cdReqRegistros;
        $this->cdTramite = $cdTramite;
        $this->dtItem = $dtItem;
        $this->snRelatorio = $snRelatorio;
        $this->cdTramiteRetorno = $cdTramiteRetorno;
        $this->meObs = $meObs;
        $this->cdPessoa = $cdPessoa;
        $this->snLido = $snLido;
        $this->cdRespTramite = $cdRespTramite;
        $this->dtBase = $dtBase;
    }

    public function getCdItem(): ?int
    {
        return $this->cdItem;
    }

    public function getCdReqRegistros(): ?ReqRegistros
    {
        return $this->cdReqRegistros;
    }

    public function setCdReqRegistros(?ReqRegistros $cdReqRegistros): self
    {
        $this->cdReqRegistros = $cdReqRegistros;
        return $this;
    }

    public function getCdTramite(): ?ReqTramite
    {
        return $this->cdTramite;
    }

    public function setCdTramite(?ReqTramite $cdTramite): self
    {
        $this->cdTramite = $cdTramite;
        return $this;
    }

    public function getDtItem(): ?\DateTimeInterface
    {
        return $this->dtItem;
    }

    public function setDtItem(?\DateTimeInterface $dtItem): self
    {
        $this->dtItem = $dtItem;
        return $this;
    }

    public function getSnRelatorio(): ?int
    {
        return $this->snRelatorio;
    }

    public function setSnRelatorio(?int $snRelatorio): self
    {
        $this->snRelatorio = $snRelatorio;
        return $this;
    }

    public function getCdTramiteRetorno(): ?int
    {
        return $this->cdTramiteRetorno;
    }

    public function setCdTramiteRetorno(?int $cdTramiteRetorno): self
    {
        $this->cdTramiteRetorno = $cdTramiteRetorno;
        return $this;
    }

    public function getMeObs(): ?string
    {
        return $this->meObs;
    }

    public function setMeObs(?string $meObs): self
    {
        $this->meObs = $meObs;
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

    public function getSnLido(): ?int
    {
        return $this->snLido;
    }

    public function setSnLido(?int $snLido): self
    {
        $this->snLido = $snLido;
        return $this;
    }

    public function getCdRespTramite(): ?int
    {
        return $this->cdRespTramite;
    }

    public function setCdRespTramite(?int $cdRespTramite): self
    {
        $this->cdRespTramite = $cdRespTramite;
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
