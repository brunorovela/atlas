<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoPlataformaaPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoPlataformaaPessoaRepository::class)]
#[ORM\Table(
    name: 'integracao_plataformaa_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_integracao_plataformaa_pessoa', columns: ['plataformaa_ambiente_id', 'cd_pessoa'])]
#[ORM\Index(name: 'integracao_plataformaa_pessoa_pessoas_FK', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IDX_A526055EAA6F8A', columns: ['plataformaa_ambiente_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'integracao_plataformaa_pessoa_ambiente_FK', 'colunas' => ['plataformaa_ambiente_id'], 'tabelaAlvo' => 'integracao_plataformaa_ambiente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'integracao_plataformaa_pessoa_pessoas_FK', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoPlataformaaPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoPlataformaaAmbiente::class)]
    #[ORM\JoinColumn(name: 'plataformaa_ambiente_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_external_id', type: 'string', length: 255, nullable: true)]
    private ?string $dsExternalId = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId = null,
        ?Pessoas $cdPessoa = null,
        ?string $dsExternalId = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        $this->cdPessoa = $cdPessoa;
        $this->dsExternalId = $dsExternalId;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlataformaaAmbienteId(): ?IntegracaoPlataformaaAmbiente
    {
        return $this->plataformaaAmbienteId;
    }

    public function setPlataformaaAmbienteId(?IntegracaoPlataformaaAmbiente $plataformaaAmbienteId): self
    {
        $this->plataformaaAmbienteId = $plataformaaAmbienteId;
        return $this;
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

    public function getDsExternalId(): ?string
    {
        return $this->dsExternalId;
    }

    public function setDsExternalId(?string $dsExternalId): self
    {
        $this->dsExternalId = $dsExternalId;
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
