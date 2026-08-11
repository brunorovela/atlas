<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PleAjustePlanoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleAjustePlanoRepository::class)]
#[ORM\Table(
    name: 'ple_ajuste_plano',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TURMASPROFESSORES', columns: ['cd_turmasprofessores'])]
#[ORM\Index(name: 'IX_CD_PESSOA_REGISTROU', columns: ['cd_pessoa_registrou'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ple_ajuste_plano_ibfk_2', 'colunas' => ['cd_pessoa_registrou'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PleAjustePlano
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_ajuste_plano', type: 'integer')]
    private ?int $cdAjustePlano = null;

    #[ORM\Column(name: 'cd_turmasprofessores', type: 'integer', nullable: true)]
    private ?int $cdTurmasprofessores = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_registrou', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaRegistrou = null;

    #[ORM\Column(name: 'me_obs', type: 'text', length: 16777215, nullable: true)]
    private ?string $meObs = null;

    #[ORM\Column(name: 'dt_ajuste', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAjuste = null;

    public function __construct(
        ?int $cdTurmasprofessores = null,
        ?Pessoas $cdPessoaRegistrou = null,
        ?string $meObs = null,
        ?\DateTimeInterface $dtAjuste = null
    ) {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        $this->cdPessoaRegistrou = $cdPessoaRegistrou;
        $this->meObs = $meObs;
        $this->dtAjuste = $dtAjuste;
    }

    public function getCdAjustePlano(): ?int
    {
        return $this->cdAjustePlano;
    }

    public function getCdTurmasprofessores(): ?int
    {
        return $this->cdTurmasprofessores;
    }

    public function setCdTurmasprofessores(?int $cdTurmasprofessores): self
    {
        $this->cdTurmasprofessores = $cdTurmasprofessores;
        return $this;
    }

    public function getCdPessoaRegistrou(): ?Pessoas
    {
        return $this->cdPessoaRegistrou;
    }

    public function setCdPessoaRegistrou(?Pessoas $cdPessoaRegistrou): self
    {
        $this->cdPessoaRegistrou = $cdPessoaRegistrou;
        return $this;
    }

    public function getMeObs(): ?string
    {
        return $this->meObs;
    }

    public function setMeObs(?string $meObs): self
    {
        $this->meObs = $meObs;
        return $this;
    }

    public function getDtAjuste(): ?\DateTimeInterface
    {
        return $this->dtAjuste;
    }

    public function setDtAjuste(?\DateTimeInterface $dtAjuste): self
    {
        $this->dtAjuste = $dtAjuste;
        return $this;
    }
}
