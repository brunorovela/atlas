<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ContatosPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContatosPessoasRepository::class)]
#[ORM\Table(
    name: 'contatos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CONTATO', columns: ['cd_contato'])]
#[ORM\Index(name: 'IX_ID_CONTATO', columns: ['id_contato'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'contatos_pessoas_contatos_tipos_FK', 'colunas' => ['cd_contato'], 'tabelaAlvo' => 'contatos_tipos', 'colunasAlvo' => ['cd_contato'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: ['id_contato']
)]
class ContatosPessoas
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: ContatosTipos::class)]
    #[ORM\JoinColumn(name: 'cd_contato', referencedColumnName: 'cd_contato', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ContatosTipos $cdContato = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'ds_contato', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsContato = '';

    #[ORM\Column(name: 'ds_observacao', type: 'string', length: 500, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'id_contato', type: 'integer')]
    private ?int $idContato = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?ContatosTipos $cdContato = null,
        int $cdPessoa = 0,
        string $dsContato = '',
        ?string $dsObservacao = null,
        ?int $idContato = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdContato = $cdContato;
        $this->cdPessoa = $cdPessoa;
        $this->dsContato = $dsContato;
        $this->dsObservacao = $dsObservacao;
        $this->idContato = $idContato;
        $this->dtBase = $dtBase;
    }

    public function getCdContato(): ?ContatosTipos
    {
        return $this->cdContato;
    }

    public function setCdContato(?ContatosTipos $cdContato): self
    {
        $this->cdContato = $cdContato;
        return $this;
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

    public function getDsContato(): string
    {
        return $this->dsContato;
    }

    public function setDsContato(string $dsContato): self
    {
        $this->dsContato = $dsContato;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getIdContato(): ?int
    {
        return $this->idContato;
    }

    public function setIdContato(?int $idContato): self
    {
        $this->idContato = $idContato;
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
