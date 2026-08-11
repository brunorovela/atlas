<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PrgAlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrgAlunoRepository::class)]
#[ORM\Table(
    name: 'prg_aluno',
    options: ['charset' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_cd_pessoa_prg_aluno', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'idx_prg_aluno_dt_integracao', columns: ['dt_integracao'])]
#[ORM\Index(name: 'idx_prg_aluno_id_integracao_ambiente', columns: ['id_integracao_ambiente'])]
#[ORM\Index(name: 'idx_prg_aluno_ds_lote_uuid', columns: ['ds_lote_uuid'])]
#[ORM\Index(name: 'idx_prg_aluno_id_situacao_integracao', columns: ['id_situacao_integracao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_prg_aluno_integracao_ambiente', 'colunas' => ['id_integracao_ambiente'], 'tabelaAlvo' => 'prg_integracao_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'fk_prg_aluno_situacao_integracao', 'colunas' => ['id_situacao_integracao'], 'tabelaAlvo' => 'prg_situacoes', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]]
    ],
    autoIncremento: []
)]
class PrgAluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\ManyToOne(targetEntity: PrgSituacoes::class)]
    #[ORM\JoinColumn(name: 'id_situacao_integracao', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgSituacoes $idSituacaoIntegracao = null;

    #[ORM\ManyToOne(targetEntity: PrgIntegracaoAmbiente::class)]
    #[ORM\JoinColumn(name: 'id_integracao_ambiente', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PrgIntegracaoAmbiente $idIntegracaoAmbiente = null;

    #[ORM\Column(name: 'ds_lote_uuid', type: 'string', length: 255, nullable: true)]
    private ?string $dsLoteUuid = null;

    #[ORM\Column(name: 'dt_integracao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIntegracao = null;

    #[ORM\Column(name: 'ds_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $dsErro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        int $cdPessoa = 0,
        ?PrgSituacoes $idSituacaoIntegracao = null,
        ?PrgIntegracaoAmbiente $idIntegracaoAmbiente = null,
        ?string $dsLoteUuid = null,
        ?\DateTimeInterface $dtIntegracao = null,
        ?string $dsErro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->idSituacaoIntegracao = $idSituacaoIntegracao;
        $this->idIntegracaoAmbiente = $idIntegracaoAmbiente;
        $this->dsLoteUuid = $dsLoteUuid;
        $this->dtIntegracao = $dtIntegracao;
        $this->dsErro = $dsErro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdSituacaoIntegracao(): ?PrgSituacoes
    {
        return $this->idSituacaoIntegracao;
    }

    public function setIdSituacaoIntegracao(?PrgSituacoes $idSituacaoIntegracao): self
    {
        $this->idSituacaoIntegracao = $idSituacaoIntegracao;
        return $this;
    }

    public function getIdIntegracaoAmbiente(): ?PrgIntegracaoAmbiente
    {
        return $this->idIntegracaoAmbiente;
    }

    public function setIdIntegracaoAmbiente(?PrgIntegracaoAmbiente $idIntegracaoAmbiente): self
    {
        $this->idIntegracaoAmbiente = $idIntegracaoAmbiente;
        return $this;
    }

    public function getDsLoteUuid(): ?string
    {
        return $this->dsLoteUuid;
    }

    public function setDsLoteUuid(?string $dsLoteUuid): self
    {
        $this->dsLoteUuid = $dsLoteUuid;
        return $this;
    }

    public function getDtIntegracao(): ?\DateTimeInterface
    {
        return $this->dtIntegracao;
    }

    public function setDtIntegracao(?\DateTimeInterface $dtIntegracao): self
    {
        $this->dtIntegracao = $dtIntegracao;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
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
