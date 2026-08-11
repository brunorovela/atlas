<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponenteBloqueioFinanceiroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteBloqueioFinanceiroRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_bloqueio_financeiro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cap_jornada_componente_bloqueio_status_contato_un', columns: ['cd_jornada_etapa_componente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cjec_bloqueio_financeiro_cd_jornada_componente_id', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteBloqueioFinanceiro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\Column(name: 'vl_ignorado', type: 'float', nullable: true)]
    private ?float $vlIgnorado = null;

    #[ORM\Column(name: 'dt_vencimento_inicio', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVencimentoInicio = null;

    #[ORM\Column(name: 'dt_vencimento_fim', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtVencimentoFim = null;

    #[ORM\Column(name: 'id_tipo_titulo_considerado', type: 'string', length: 1000, nullable: true)]
    private ?string $idTipoTituloConsiderado = null;

    #[ORM\Column(name: 'enum_considerar_parcelas', type: 'enum', nullable: true, options: ['values' => ['APENAS_VENCIDAS', 'PENDENTES_E_RESERVADAS', 'APENAS_PENDENTES']])]
    private ?string $enumConsiderarParcelas = null;

    #[ORM\Column(name: 'me_texto_bloqueio', type: 'text', length: 65535)]
    private ?string $meTextoBloqueio = null;

    #[ORM\Column(name: 'me_texto_desbloqueio', type: 'text', length: 65535, nullable: true)]
    private ?string $meTextoDesbloqueio = null;

    #[ORM\Column(name: 'sn_exibir_pendencias', type: 'boolean', options: ['default' => '0'])]
    private bool $snExibirPendencias = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?float $vlIgnorado = null,
        ?\DateTimeInterface $dtVencimentoInicio = null,
        ?\DateTimeInterface $dtVencimentoFim = null,
        ?string $idTipoTituloConsiderado = null,
        ?string $enumConsiderarParcelas = null,
        ?string $meTextoBloqueio = null,
        ?string $meTextoDesbloqueio = null,
        bool $snExibirPendencias = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->vlIgnorado = $vlIgnorado;
        $this->dtVencimentoInicio = $dtVencimentoInicio;
        $this->dtVencimentoFim = $dtVencimentoFim;
        $this->idTipoTituloConsiderado = $idTipoTituloConsiderado;
        $this->enumConsiderarParcelas = $enumConsiderarParcelas;
        $this->meTextoBloqueio = $meTextoBloqueio;
        $this->meTextoDesbloqueio = $meTextoDesbloqueio;
        $this->snExibirPendencias = $snExibirPendencias;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function getVlIgnorado(): ?float
    {
        return $this->vlIgnorado;
    }

    public function setVlIgnorado(?float $vlIgnorado): self
    {
        $this->vlIgnorado = $vlIgnorado;
        return $this;
    }

    public function getDtVencimentoInicio(): ?\DateTimeInterface
    {
        return $this->dtVencimentoInicio;
    }

    public function setDtVencimentoInicio(?\DateTimeInterface $dtVencimentoInicio): self
    {
        $this->dtVencimentoInicio = $dtVencimentoInicio;
        return $this;
    }

    public function getDtVencimentoFim(): ?\DateTimeInterface
    {
        return $this->dtVencimentoFim;
    }

    public function setDtVencimentoFim(?\DateTimeInterface $dtVencimentoFim): self
    {
        $this->dtVencimentoFim = $dtVencimentoFim;
        return $this;
    }

    public function getIdTipoTituloConsiderado(): ?string
    {
        return $this->idTipoTituloConsiderado;
    }

    public function setIdTipoTituloConsiderado(?string $idTipoTituloConsiderado): self
    {
        $this->idTipoTituloConsiderado = $idTipoTituloConsiderado;
        return $this;
    }

    public function getEnumConsiderarParcelas(): ?string
    {
        return $this->enumConsiderarParcelas;
    }

    public function setEnumConsiderarParcelas(?string $enumConsiderarParcelas): self
    {
        $this->enumConsiderarParcelas = $enumConsiderarParcelas;
        return $this;
    }

    public function getMeTextoBloqueio(): ?string
    {
        return $this->meTextoBloqueio;
    }

    public function setMeTextoBloqueio(?string $meTextoBloqueio): self
    {
        $this->meTextoBloqueio = $meTextoBloqueio;
        return $this;
    }

    public function getMeTextoDesbloqueio(): ?string
    {
        return $this->meTextoDesbloqueio;
    }

    public function setMeTextoDesbloqueio(?string $meTextoDesbloqueio): self
    {
        $this->meTextoDesbloqueio = $meTextoDesbloqueio;
        return $this;
    }

    public function isSnExibirPendencias(): bool
    {
        return $this->snExibirPendencias;
    }

    public function setSnExibirPendencias(bool $snExibirPendencias): self
    {
        $this->snExibirPendencias = $snExibirPendencias;
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
