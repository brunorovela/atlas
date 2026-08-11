<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniDebugRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniDebugRepository::class)]
#[ORM\Table(
    name: 'uni_debug',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'engine' => 'MyISAM']
)]
#[ORM\Index(name: 'IX_DT_EXECUCAO', columns: ['dt_execucao'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
class UniDebug
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_sql', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdSql = null;

    #[ORM\Column(name: 'ds_sql', type: 'text', length: 16777215)]
    private ?string $dsSql = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_origem', type: 'string', length: 255)]
    private ?string $dsOrigem = null;

    #[ORM\Column(name: 'me_erro', type: 'text', length: 16777215, nullable: true)]
    private ?string $meErro = null;

    #[ORM\Column(name: 'nr_segundos', type: 'float')]
    private ?float $nrSegundos = null;

    #[ORM\Column(name: 'dt_execucao', type: 'datetime')]
    private ?\DateTimeInterface $dtExecucao = null;

    public function __construct(
        ?string $dsSql = null,
        ?string $dsChave = null,
        ?string $dsOrigem = null,
        ?string $meErro = null,
        ?float $nrSegundos = null,
        ?\DateTimeInterface $dtExecucao = null
    ) {
        $this->dsSql = $dsSql;
        $this->dsChave = $dsChave;
        $this->dsOrigem = $dsOrigem;
        $this->meErro = $meErro;
        $this->nrSegundos = $nrSegundos;
        $this->dtExecucao = $dtExecucao;
    }

    public function getCdSql(): ?string
    {
        return $this->cdSql;
    }

    public function getDsSql(): ?string
    {
        return $this->dsSql;
    }

    public function setDsSql(?string $dsSql): self
    {
        $this->dsSql = $dsSql;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsOrigem(): ?string
    {
        return $this->dsOrigem;
    }

    public function setDsOrigem(?string $dsOrigem): self
    {
        $this->dsOrigem = $dsOrigem;
        return $this;
    }

    public function getMeErro(): ?string
    {
        return $this->meErro;
    }

    public function setMeErro(?string $meErro): self
    {
        $this->meErro = $meErro;
        return $this;
    }

    public function getNrSegundos(): ?float
    {
        return $this->nrSegundos;
    }

    public function setNrSegundos(?float $nrSegundos): self
    {
        $this->nrSegundos = $nrSegundos;
        return $this;
    }

    public function getDtExecucao(): ?\DateTimeInterface
    {
        return $this->dtExecucao;
    }

    public function setDtExecucao(?\DateTimeInterface $dtExecucao): self
    {
        $this->dtExecucao = $dtExecucao;
        return $this;
    }
}
