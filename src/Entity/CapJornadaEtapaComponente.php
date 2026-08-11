<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CapJornadaEtapaComponenteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cap_jornada_componente_un', columns: ['cd_jornada_etapa_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_jornada_componente_cd_jornada_etapa_id', 'colunas' => ['cd_jornada_etapa_id'], 'tabelaAlvo' => 'cap_jornada_etapa', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponente
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapa::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapa $cdJornadaEtapaId = null;

    #[ORM\Column(name: 'enum_chave_componente', type: 'enum', nullable: true, options: ['values' => ['cadastro_lead', 'cadastro_estudante', 'cadastro_resp_fin', 'cadastro_resp_acad', 'cadastro_pai', 'cadastro_mae', 'ficha_saude', 'mensagem', 'campo_adicional', 'entrega_documento', 'selecao_financeiro', 'escolha_disciplina', 'pagamento', 'aceite_documento', 'impressao_documento', 'acesso_portal', 'bloqueio_status_contato', 'bloqueio_data', 'bloqueio_financeiro', 'menu_portal', 'pagamento_express', 'selecao_polo', 'instituicao_origem']])]
    private ?string $enumChaveComponente = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_icone', type: 'string', length: 50, nullable: true)]
    private ?string $dsIcone = null;

    #[ORM\Column(name: 'nr_ordem', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $nrOrdem = 1;

    #[ORM\Column(name: 'sn_esconde_titulo_no_fluxo', type: 'boolean', options: ['default' => '0'])]
    private bool $snEscondeTituloNoFluxo = false;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapa $cdJornadaEtapaId = null,
        ?string $enumChaveComponente = null,
        ?string $dsTitulo = null,
        ?string $dsIcone = null,
        int $nrOrdem = 1,
        bool $snEscondeTituloNoFluxo = false,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaId = $cdJornadaEtapaId;
        $this->enumChaveComponente = $enumChaveComponente;
        $this->dsTitulo = $dsTitulo;
        $this->dsIcone = $dsIcone;
        $this->nrOrdem = $nrOrdem;
        $this->snEscondeTituloNoFluxo = $snEscondeTituloNoFluxo;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaId(): ?CapJornadaEtapa
    {
        return $this->cdJornadaEtapaId;
    }

    public function setCdJornadaEtapaId(?CapJornadaEtapa $cdJornadaEtapaId): self
    {
        $this->cdJornadaEtapaId = $cdJornadaEtapaId;
        return $this;
    }

    public function getEnumChaveComponente(): ?string
    {
        return $this->enumChaveComponente;
    }

    public function setEnumChaveComponente(?string $enumChaveComponente): self
    {
        $this->enumChaveComponente = $enumChaveComponente;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getDsIcone(): ?string
    {
        return $this->dsIcone;
    }

    public function setDsIcone(?string $dsIcone): self
    {
        $this->dsIcone = $dsIcone;
        return $this;
    }

    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function isSnEscondeTituloNoFluxo(): bool
    {
        return $this->snEscondeTituloNoFluxo;
    }

    public function setSnEscondeTituloNoFluxo(bool $snEscondeTituloNoFluxo): self
    {
        $this->snEscondeTituloNoFluxo = $snEscondeTituloNoFluxo;
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
