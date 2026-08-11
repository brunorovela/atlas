<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AlimRestricaoAlimenticiaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimRestricaoAlimenticiaRepository::class)]
#[ORM\Table(
    name: 'alim_restricao_alimenticia',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_PESSOA_ALIMENTO', columns: ['cd_alimento', 'cd_pessoa'])]
#[ORM\Index(name: 'FK_cd_pessoa_pessoas', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IDX_53DBB37611B72182', columns: ['cd_alimento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_cd_alimento_alim_alimento', 'colunas' => ['cd_alimento'], 'tabelaAlvo' => 'alim_alimento', 'colunasAlvo' => ['cd_alimento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_pessoa_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AlimRestricaoAlimenticia
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_restricao_alimenticia', type: 'integer')]
    private ?int $cdRestricaoAlimenticia = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: AlimAlimento::class)]
    #[ORM\JoinColumn(name: 'cd_alimento', referencedColumnName: 'cd_alimento', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?AlimAlimento $cdAlimento = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?AlimAlimento $cdAlimento = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdAlimento = $cdAlimento;
        $this->dtBase = $dtBase;
    }

    public function getCdRestricaoAlimenticia(): ?int
    {
        return $this->cdRestricaoAlimenticia;
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

    public function getCdAlimento(): ?AlimAlimento
    {
        return $this->cdAlimento;
    }

    public function setCdAlimento(?AlimAlimento $cdAlimento): self
    {
        $this->cdAlimento = $cdAlimento;
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
