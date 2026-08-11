<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\DiarioAcessosPaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAcessosPaisRepository::class)]
#[ORM\Table(
    name: 'diario_acessos_pais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Armazena dados de pessoas que acessaram a escola (geralmente utilizada para pais)']
)]
#[ORM\UniqueConstraint(name: 'dt_acesso', columns: ['cd_pessoa', 'dt_acesso'])]
#[ORM\Index(name: 'IDX_98B293BFAFC694F1', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_diario_acessos_pais_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class DiarioAcessosPais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'me_mensagem', type: 'string', length: 250, nullable: true)]
    private ?string $meMensagem = null;

    #[ORM\Column(name: 'dt_acesso', type: 'datetime')]
    private ?\DateTimeInterface $dtAcesso = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?string $meMensagem = null,
        ?\DateTimeInterface $dtAcesso = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->meMensagem = $meMensagem;
        $this->dtAcesso = $dtAcesso;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMeMensagem(): ?string
    {
        return $this->meMensagem;
    }

    public function setMeMensagem(?string $meMensagem): self
    {
        $this->meMensagem = $meMensagem;
        return $this;
    }

    public function getDtAcesso(): ?\DateTimeInterface
    {
        return $this->dtAcesso;
    }

    public function setDtAcesso(?\DateTimeInterface $dtAcesso): self
    {
        $this->dtAcesso = $dtAcesso;
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
