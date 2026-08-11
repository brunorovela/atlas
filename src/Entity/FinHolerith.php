<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinHolerithRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinHolerithRepository::class)]
#[ORM\Table(
    name: 'fin_holerith',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_holerith', columns: ['cd_tipo_folha', 'cd_pessoa', 'nr_mes', 'nr_ano'])]
#[ORM\Index(name: 'fk_holerith_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_TIPO_FOLHA', columns: ['cd_tipo_folha'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_NR_MES', columns: ['nr_mes'])]
#[ORM\Index(name: 'IX_NR_ANO', columns: ['nr_ano'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_holerith_pessoa', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinHolerith
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_holerith', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdHolerith = null;

    #[ORM\Column(name: 'cd_tipo_folha', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdTipoFolha = 1;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'nr_mes', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrMes = null;

    #[ORM\Column(name: 'nr_ano', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrAno = null;

    #[ORM\Column(name: 'me_holerith', type: 'blob', length: 16777215)]
    private ?string $meHolerith = null;

    public function __construct(
        int $cdTipoFolha = 1,
        ?Pessoas $cdPessoa = null,
        ?int $nrMes = null,
        ?int $nrAno = null,
        ?string $meHolerith = null
    ) {
        $this->cdTipoFolha = $cdTipoFolha;
        $this->cdPessoa = $cdPessoa;
        $this->nrMes = $nrMes;
        $this->nrAno = $nrAno;
        $this->meHolerith = $meHolerith;
    }

    public function getCdHolerith(): ?int
    {
        return $this->cdHolerith;
    }

    public function getCdTipoFolha(): int
    {
        return $this->cdTipoFolha;
    }

    public function setCdTipoFolha(int $cdTipoFolha): self
    {
        $this->cdTipoFolha = $cdTipoFolha;
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

    public function getNrMes(): ?int
    {
        return $this->nrMes;
    }

    public function setNrMes(?int $nrMes): self
    {
        $this->nrMes = $nrMes;
        return $this;
    }

    public function getNrAno(): ?int
    {
        return $this->nrAno;
    }

    public function setNrAno(?int $nrAno): self
    {
        $this->nrAno = $nrAno;
        return $this;
    }

    public function getMeHolerith(): ?string
    {
        return $this->meHolerith;
    }

    public function setMeHolerith(?string $meHolerith): self
    {
        $this->meHolerith = $meHolerith;
        return $this;
    }
}
