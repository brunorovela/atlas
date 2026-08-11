<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapInscricaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapInscricaoRepository::class)]
#[ORM\Table(
    name: 'cap_inscricao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IDX_DS_HASH', columns: ['ds_hash'])]
#[ORM\Index(name: 'IX_cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_cd_oferta', columns: ['cd_oferta'])]
#[ORM\Index(name: 'IX_id_turma', columns: ['id_turma'])]
#[ORM\Index(name: 'FK_cap_inscricao_polos', columns: ['cd_polo'])]
#[ORM\Index(name: 'IX_CAP_JORNADA_ETAPA_ID', columns: ['cap_jornada_etapa_id_atual'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cap_inscricao_cap_jornada_etapa', 'colunas' => ['cap_jornada_etapa_id_atual'], 'tabelaAlvo' => 'cap_jornada_etapa', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_inscricao_cap_oferta', 'colunas' => ['cd_oferta'], 'tabelaAlvo' => 'cap_oferta', 'colunasAlvo' => ['cd_oferta'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_inscricao_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_inscricao_polos', 'colunas' => ['cd_polo'], 'tabelaAlvo' => 'unim_polo', 'colunasAlvo' => ['cd_polo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_inscricao_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapInscricao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_inscricao', type: 'integer')]
    private ?int $cdInscricao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: CapOferta::class)]
    #[ORM\JoinColumn(name: 'cd_oferta', referencedColumnName: 'cd_oferta', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapOferta $cdOferta = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapa::class)]
    #[ORM\JoinColumn(name: 'cap_jornada_etapa_id_atual', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapa $capJornadaEtapaIdAtual = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\ManyToOne(targetEntity: UnimPolo::class)]
    #[ORM\JoinColumn(name: 'cd_polo', referencedColumnName: 'cd_polo', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?UnimPolo $cdPolo = null;

    #[ORM\Column(name: 'cd_instituicao_origem', type: 'integer', nullable: true)]
    private ?int $cdInstituicaoOrigem = null;

    #[ORM\Column(name: 'ds_hash', type: 'string', length: 255)]
    private ?string $dsHash = null;

    #[ORM\Column(name: 'enum_chave_forma_pagamento_express', type: 'enum', nullable: true, options: ['values' => ['PIX', 'CARTAO', 'BOLETO', 'RECORRENCIA', 'PARCELAMENTO_OPERADORA']])]
    private ?string $enumChaveFormaPagamentoExpress = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?CapOferta $cdOferta = null,
        ?CapJornadaEtapa $capJornadaEtapaIdAtual = null,
        ?Turmas $idTurma = null,
        ?UnimPolo $cdPolo = null,
        ?int $cdInstituicaoOrigem = null,
        ?string $dsHash = null,
        ?string $enumChaveFormaPagamentoExpress = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdOferta = $cdOferta;
        $this->capJornadaEtapaIdAtual = $capJornadaEtapaIdAtual;
        $this->idTurma = $idTurma;
        $this->cdPolo = $cdPolo;
        $this->cdInstituicaoOrigem = $cdInstituicaoOrigem;
        $this->dsHash = $dsHash;
        $this->enumChaveFormaPagamentoExpress = $enumChaveFormaPagamentoExpress;
        $this->dtBase = $dtBase;
    }

    public function getCdInscricao(): ?int
    {
        return $this->cdInscricao;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdOferta(): ?CapOferta
    {
        return $this->cdOferta;
    }

    public function setCdOferta(?CapOferta $cdOferta): self
    {
        $this->cdOferta = $cdOferta;
        return $this;
    }

    public function getCapJornadaEtapaIdAtual(): ?CapJornadaEtapa
    {
        return $this->capJornadaEtapaIdAtual;
    }

    public function setCapJornadaEtapaIdAtual(?CapJornadaEtapa $capJornadaEtapaIdAtual): self
    {
        $this->capJornadaEtapaIdAtual = $capJornadaEtapaIdAtual;
        return $this;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getCdPolo(): ?UnimPolo
    {
        return $this->cdPolo;
    }

    public function setCdPolo(?UnimPolo $cdPolo): self
    {
        $this->cdPolo = $cdPolo;
        return $this;
    }

    public function getCdInstituicaoOrigem(): ?int
    {
        return $this->cdInstituicaoOrigem;
    }

    public function setCdInstituicaoOrigem(?int $cdInstituicaoOrigem): self
    {
        $this->cdInstituicaoOrigem = $cdInstituicaoOrigem;
        return $this;
    }

    public function getDsHash(): ?string
    {
        return $this->dsHash;
    }

    public function setDsHash(?string $dsHash): self
    {
        $this->dsHash = $dsHash;
        return $this;
    }

    public function getEnumChaveFormaPagamentoExpress(): ?string
    {
        return $this->enumChaveFormaPagamentoExpress;
    }

    public function setEnumChaveFormaPagamentoExpress(?string $enumChaveFormaPagamentoExpress): self
    {
        $this->enumChaveFormaPagamentoExpress = $enumChaveFormaPagamentoExpress;
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
